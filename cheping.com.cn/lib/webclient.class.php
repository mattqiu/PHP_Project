<?php

/**
 * WebClient.class.php
 * $Id: webclient.class.php 1619 2016-01-27 09:50:21Z david $
 * @author David Shaw <tudibao@163.com>
 * require cURL v7.0+
 */
class webClient {

    var $result;
    var $url;
    var $ch;
    var $mod_status = 1;
    var $useragent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.2.6) Gecko/20100625 Firefox/3.6.6";
    var $cookieFile = '';
    var $postVar = array();
    var $login_match_str = '';
    var $login_url;
    var $login_formdata = array();
    var $login_return = false;
    var $reffer_url;
    var $proxy = "";

    function __construct() {
        $this->ch = curl_init();
        curl_setopt($this->ch, 10018, $this->useragent);
    }

    function getContent($return = true) {
        $this->setReturns();
        #$this->setRedirectStatus();
        $this->setRedirectCount(2);
        $this->setRedirect();

        if ($this->cookieFile) {
            $this->loadCookieFile($this->cookieFile);
            $this->saveCookieFile($this->cookieFile);
        }

        if (!empty($this->postVar)) {
            $this->setPostVars($this->postVar);
        }

        $this->result = curl_exec($this->ch);

        if ($this->checkLogin()) {
            $tmp_url = $this->url;
            $this->login();

            #if need return back url
            if ($this->login_return) {
                $this->setRedirect(0);
                $this->login_return = false;
                $this->setUrl($tmp_url);
                $this->getContent($this->url);
            }
        }
        if($return){
            return $this->result;
        }
    }

    function setUrl($url) {
        $this->url = $url;
        curl_setopt($this->ch, 10002, $url); #10002
        return $this;
    }

    function setUserAgent($ua) {
        curl_setopt($this->ch, 10018, $ua);
        return $this;
    }

    function setPostVars($var = array()) {
        if (!empty($var)) {
            curl_setopt($this->ch, 00047, 1); #00047
            curl_setopt($this->ch, 10015, http_build_query($var)); #10015
        }
        return $this;
    }

    function saveCookieFile($f) {
        curl_setopt($this->ch, 10082, $f); #10082
        return $this;
    }

    function setReferer($ref) {
        curl_setopt($this->ch, 10016, $ref); #10016
        return $this;
    }

    function setHeaderFunc($func) {
        curl_setopt($this->ch, 20079, $func); #20079
        return $this;
    }
    
    /**
     * send customer `http request header infomation`
     * @param type $header_array
     */
    function setHttpHeader($header_array = array()) {
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $header_array);
        return $this;
    }
    
    function setReturns($bool = true) {
        curl_setopt($this->ch, 19913, $bool);
        return $this;
    }

    function loadCookieFile($f) {
        curl_setopt($this->ch, 10031, $f); #10031
        return $this;
    }

    function setRedirectCount($c = 2) {
        curl_setopt($this->ch, 00068, $c);
        return $this;
    }

    function setCookies($c) {
        curl_setopt($this->ch, 10022, $_c);  #10022
        return $this;
    }

    function getError() {
        return curl_error($this->ch);
    }

    function checkLogin() {
        return !empty($this->login_formdata) && preg_match('%' . $this->login_match_str . '%si', $this->result);
    }

    function login() {
        #curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        $this->setUrl($this->login_url);
        $this->setPostVars($this->login_formdata);
        $this->setReferer($this->reffer_url);
        $this->result = curl_exec($this->ch);
        return $this->result;
    }

    function setRedirect($bool = true) {
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, $bool);
        return $this;
    }

    /**
     * set Header `Accept-Encoding`
     * @param type $ae
     */
    function setAcceptEncode($ae = '') {
        if ($ae) {
            curl_setopt($this->ch, CURLOPT_ENCODING, $ae);
        }
        return $this;
    }
    
    function setProxy($proxy = '', $user = '', $pwd = '') {
        $proxy = $proxy ? $proxy : $this->proxy;
        if ($proxy){
            curl_setopt($this->ch, 10004, $proxy);
        }
        if($user && $pwd){
            curl_setopt($this->ch, CURLOPT_PROXYUSERPWD, "{$user}:{$pwd}");
        }
        return $this;
    }

    function stripOfficeTag($v) {
        $v = str_replace('<p>&nbsp;</p>', '', $v);
        $v = str_replace('<p />', '', $v);
        $v = preg_replace('%(<span\s*[^>]*>(.*)</span>)%Usi', '\2', $v);
        #$v = preg_replace('%(<span\s*lang="EN-US">(.*)</span>)%Usi', '\2', $v);
        $v = preg_replace('%(\s+class="Mso[^"]+")%si', '', $v);
        $v = preg_replace('%( style="[^"]*mso[^>]*)%si', '', $v);
        $v = preg_replace('%(<table[^>]*>)%si', '<table cellspacing="0" cellpadding="0" bordercolor="#000000" border="1" style="border-collapse: collapse;">', $v);
        $v = preg_replace('/<b><\/b>/', '', $v);
        return $v;
    }

}

?>