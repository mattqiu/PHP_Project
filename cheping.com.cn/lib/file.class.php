<?php
/**
 * file static function in here
 * $Id: file.class.php 1072 2015-10-27 09:19:44Z xiaodawei $
 * @author David.Shaw <tudibao@163.com>
 */
class file {

    public function __construct() {
        die("Class file can not instantiated!");
    }

    public static function forcemkdir($path) {
        if (!file_exists($path)) {
            self::forcemkdir(dirname($path));
            mkdir($path, 0777);
        }
    }

    public static function iswriteable($file) {
        $writeable = 0;
        if (is_dir($file)) {
            $dir = $file;
            if ($fp = @fopen("$dir/test.txt", 'w')) {
                @fclose($fp);
                @unlink("$dir/test.txt");
                $writeable = 1;
            }
        } else {
            if ($fp = @fopen($file, 'a+')) {
                @fclose($fp);
                $writeable = 1;
            }
        }
        return $writeable;
    }

    public static function cleardir($dir, $forceclear = false) {
        if (!is_dir($dir)) {
            return;
        }
        $directory = dir($dir);
        while ($entry = $directory->read()) {
            $filename = $dir . '/' . $entry;
            if (is_file($filename)) {
                @unlink($filename);
            } elseif (is_dir($filename) && $forceclear && $entry != '.' && $entry != '..') {
                chmod($filename, 0777);
                self::cleardir($filename, $forceclear);
                rmdir($filename);
            }
        }
        $directory->close();
    }

    public static function removedir($dir) {
        if (is_dir($dir) && !is_link($dir)) {
            if ($dh = opendir($dir)) {
                while (($sf = readdir($dh)) !== false) {
                    if ('.' == $sf || '..' == $sf) {
                        continue;
                    }
                    self::removedir($dir . '/' . $sf);
                }
                closedir($dh);
            }
            return rmdir($dir);
        }
        return @unlink($dir);
    }

    public static function copydir($srcdir, $dstdir) {
        if (!is_dir($dstdir))
            mkdir($dstdir);
        if ($curdir = opendir($srcdir)) {
            while ($file = readdir($curdir)) {
                if ($file != '.' && $file != '..') {
                    $srcfile = $srcdir . '/' . $file;
                    $dstfile = $dstdir . '/' . $file;
                    if (is_file($srcfile)) {
                        copy($srcfile, $dstfile);
                    } else if (is_dir($srcfile)) {
                        self::copydir($srcfile, $dstfile);
                    }
                }
            }
            closedir($curdir);
        }
    }

    public static function readfromfile($filename) {
        if ($fp = @fopen($filename, 'rb')) {
            if (PHP_VERSION >= '4.3.0' && function_exists('file_get_contents')) {
                return file_get_contents($filename);
            } else {
                flock($fp, LOCK_EX);
                $data = fread($fp, filesize($filename));
                flock($fp, LOCK_UN);
                fclose($fp);
                return $data;
            }
        } else {
            return '';
        }
    }

    public static function writetofile($filename, &$data, $type = 0) {
        //$type为0时,写文件不追加.为1是,写文件追加
        $wtype = $type ? 'ab' : 'wb';
        if ($fp = @fopen($filename, $wtype)) {
            if (PHP_VERSION >= '4.3.0' && function_exists('file_put_contents')) {
                if ($type) {
                    return @file_put_contents($filename, $data, FILE_APPEND);
                } else {
                    return @file_put_contents($filename, $data);
                }
            } else {
                flock($fp, LOCK_EX);
                $bytes = fwrite($fp, $data);
                flock($fp, LOCK_UN);
                fclose($fp);
                return $bytes;
            }
        } else {
            return 0;
        }
    }

    public static function uploadfile($attachment, $target, $maxsize = 1024, $is_image = 1) {
        $result = array('result' => false, 'msg' => 'upload mistake');
        if ($is_image) {
            $attach = $attachment;
            $filesize = $attach['size'] / 1024;
            if (0 == $filesize) {
                $result['msg'] = '&#19978;&#20256;&#38169;&#35823;';
                return $result;
            }
            if (substr($attach['type'], 0, 6) != 'image/') {
                $result['msg'] = '&#26684;&#24335;&#38169;&#35823;';
                return $result;
            }
            if ($filesize > $maxsize) {
                $result['msg'] = '&#25991;&#20214;&#36807;&#22823;';
                return $result;
            }
        } else {
            $attach['tmp_name'] = $attachment;
        }
        $filedir = dirname($target);
        self::forcemkdir($filedir);
        if (@copy($attach['tmp_name'], $target) || @move_uploaded_file($attach['tmp_name'], $target)) {
            $result['result'] = true;
            $result['msg'] = '&#19978;&#20256;&#25104;&#21151;';
        }
        if (!$result['result'] && @is_readable($attach['tmp_name'])) {
            @$fp = fopen($attach['tmp_name'], 'rb');
            @flock($fp, 2);
            @$attachedfile = fread($fp, $attach['size']);
            @fclose($fp);
            @$fp = fopen($target, 'wb');
            @flock($fp, 2);
            if (@fwrite($fp, $attachedfile)) {
                @unlink($attach['tmp_name']);
                $result['result'] = true;
                $result['msg'] = '&#19978;&#20256;&#22833;&#36133;';
            }
            @fclose($fp);
        }
        return $result;
    }

    public static function hheader($string, $replace = true, $http_response_code = 0) {
        $string = str_replace(array("\r", "\n"), array('', ''), $string);
        if (empty($http_response_code) || PHP_VERSION < '4.3') {
            @header($string, $replace);
        } else {
            @header($string, $replace, $http_response_code);
        }
        if (preg_match('/^\s*location:/is', $string)) {
            exit();
        }
    }

    public static function downloadfile($filepath, $filename = '') {
        if (!file_exists($filepath)) {
            return 1;
        }
        if ('' == $filename) {
            $tem = explode('/', $filepath);
            $num = count($tem) - 1;
            $filename = $tem[$num];
            $filetype = substr($filepath, strrpos($filepath, ".") + 1);
        } else {
            $filetype = substr($filename, strrpos($filename, ".") + 1);
        }
        $filename_utf = function_exists(mb_convert_encoding) ? mb_convert_encoding($filename, "gbk", 'utf-8') : urldecode($filename);
        $filename = '"' . (strtolower(WIKI_CHARSET) == 'utf-8' && !(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') === FALSE) ? $filename_utf : $filename) . '"';
        $filesize = filesize($filepath);
        $dateline = time();
        self::hheader('date: ' . gmdate('d, d m y h:i:s', $dateline) . ' gmt');
        self::hheader('last-modified: ' . gmdate('d, d m y h:i:s', $dateline) . ' gmt');
        self::hheader('content-encoding: none');
        self::hheader('content-disposition: attachment; filename=' . $filename);
        self::hheader('content-type: ' . $filetype);
        self::hheader('content-length: ' . $filesize);
        self::hheader('accept-ranges: bytes');
        if (!@empty($_SERVER['HTTP_RANGE'])) {
            list($range) = explode('-', (str_replace('bytes=', '', $_SERVER['HTTP_RANGE'])));
            $rangesize = ($filesize - $range) > 0 ? ($filesize - $range) : 0;
            self::hheader('content-length: ' . $rangesize);
            self::hheader('http/1.1 206 partial content');
            self::hheader('content-range: bytes=' . $range . '-' . ($filesize - 1) . '/' . ($filesize));
        }
        if ($fp = @fopen($filepath, 'rb')) {
            @fseek($fp, $range);
            echo fread($fp, filesize($filepath));
        }
        fclose($fp);
        flush();
        ob_flush();
    }

    public static function extname($filename) {
        $pathinfo = pathinfo($filename);
        return strtolower($pathinfo['extension']);
    }

    public static function createaccessfile($path) {
        if (!file_exists($path . 'index.htm')) {
            $content = ' ';
            self::writetofile($path . 'index.htm', $content);
        }
        if (!file_exists($path . '.htaccess')) {
            $content = 'Deny from all';
            self::writetofile($path . '.htaccess', $content);
        }
    }

    public static function getdirsize($filedir) {
        $handle = opendir($filedir);
        while ($filename = readdir($handle)) {
            if ('.' != $filename && '..' != $filename) {
                $totalsize += is_dir($filedir . '/' . $filename) ? self::getdirsize($filedir . '/' . $filename) : (int) filesize($filedir . '/' . $filename);
            }
        }
        return $totalsize;
    }

    //在目录$dir中，找出后缀属于$ext的文件。
    public static function get_file_by_ext($dir, $ext = array()) {
        $returnarray = array();
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                if (!empty($ext)) {
                    $ext = is_array($ext) ? $ext : array($ext);
                    while (($file = readdir($dh)) !== false) {
                        if (in_array(strtolower(substr($file, strrpos($file, '.') + 1)), $ext))
                            $returnarray[] = $file;
                    }
                }else {
                    while (($file = readdir($dh)) !== false) {
                        $returnarray[] = $file;
                    }
                }
            }
            return $returnarray;
        }
        return false;
    }

    public static function getfileinfo($dir, $forceget = false, &$fileinfo) {
        if (empty($fileinfo))
            $fileinfo = array();
        if (!is_dir($dir)) {
            return;
        }
        $directory = dir($dir);
        while ($entry = $directory->read()) {
            $filename = $dir . '/' . $entry;
            if (is_file($filename)) {
                $filepath = pathinfo($filename);
                $fileinfo[$filename]['dirname'] = $filepath['dirname'];
                $fileinfo[$filename]['basename'] = $filepath['basename'];
                $fileinfo[$filename]['extension'] = $filepath['extension'];
                $fileinfo[$filename]['filename'] = $filepath['filename'];
                $fileinfo[$filename]['filesize'] = filesize($filename);
                $fileinfo[$filename]['fileatime'] = fileatime($filename);
                $fileinfo[$filename]['filemtime'] = filemtime($filename);
            } elseif (is_dir($filename) && $forceget && $entry != '.' && $entry != '..') {
                self::getfileinfo($filename, $forceget, $fileinfo);
            }
        }
        $directory->close();
        return $fileinfo;
    }

    public static function getfilename($filename) {
        $pathinfo = pathinfo($filename);
        return $pathinfo['filename'];
    }

}

?>