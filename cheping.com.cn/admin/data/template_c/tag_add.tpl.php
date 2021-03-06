<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>添加用户</title>
        <link rel="stylesheet" href="css/issue.css" />
        <script src="<?=$admin_path?>js/jquery.js" type="text/javascript"></script>
        <script src="<?=$admin_path?>js/jquery-form.js" type="text/javascript"></script>
        <script src="<?=$admin_path?>js/jquery.ui.datepicker.js" type="text/javascript"></script>
        <script src="<?=$admin_path?>js/jquery-ui.min.js" type="text/javascript"></script> 
        <script src="<?=$admin_path?>js/jquery.blockUI.js" type="text/javascript"></script> 
        <script src="<?=$admin_path?>js/common.js" type="text/javascript"></script> 
        <script src="<?=$admin_path?>js/global.func.js" type="text/javascript"></script> 
        <script src="<?=$admin_path?>js/jquery.ui.datepicker-zh-CN.js" type="text/javascript"></script> 
        <script src="<?=$admin_path?>js/jtip.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(".nav ul li a").click(function () {
                if ($(this).has(".song")) {
                    $(this).addClass("song").parent("li").siblings("li").find("a").removeClass("song");
                }
            })
        </script>
 
    </head>

    <body>
        <div class="user-add">
            <div class="nav">
                <ul>
                    <li><a href="<?=$php_self?>">标签列表</a></li>
                    <li ><a href="<?=$php_self?>add" class="song"><? if ($tag['id']) { ?>编辑标签<? } else { ?>新增标签<? } ?></a></li>
                    <li><a href="<?=$php_self?>tagtag">导出/导入标签</a></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="user-add-con">
                <div style=" padding:0 10px;">
                    <form name="tag_form" id="tag_form" action="index.php?action=tag-add" method="post" enctype="multipart/form-data">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="right" >标签名称：</td>
                                <td class="margin46">
                                    <input type="text" name="tag_name" id="tag_name" size="40" value="<?=$tag['tag_name']?>"/>
                                    <a name="btn_checktitle" id="btn_checktitle" style="cursor: pointer;">检查标签名称是否重复</a>
                                </td>
                            </tr>
                            <? if ($tag['id']) { ?>
                            <tr>
                                <td class="right" >标签名全拼：</td>
                                <td class="margin46"><input type="text" name="pinyin" id="pinyin" size="40" value="<?=$tag['pinyin']?>"/></td>
                            </tr>
                            <? } ?>
                            <tr>
                                <td colspan="2" align="center" style="border:none;" >
                                    <input type="hidden" name="id" id="id" value="<?=$tag['id']?>">
                                    <button type=" submit" name="add">提交</button> 
                                    <button type=" reset" name="add">重填</button> 
                                </td>
                            </tr>
                        </table> 
                    </form>
                </div>  
            </div>
        </div>  
        <script type="text/javascript">

            $('#tag_btn').click(function () {
                if ($('#tag_name').val() == '') {
                    alert('标签名称为必填项!');
                    return false;
                }
                if ($('#pinyin').val() == '') {
                    alert('标签名全拼为必填项!');
                    return false;
                }
                $('#tag_btn').attr("disabled", "value");
                $('#tag_form').submit();
            });

            $().ready(function () {
                $('#btn_checktitle').click(function () {
                    if ($.trim($('#tag_name').val()) == '') {
                        alert('标签名称不能为空！');
                        $('#tag_name').focus();
                        return false;
                    }
                    $.blockUI({
                        message: "<h1><p>标签名称检查中，请稍等...</p></h1>"
                    });
                    $.post("<?=$php_self?>rtitle", {tag_name: $('#tag_name').val()}, function (ret) {
                        if ($.trim(ret) != 1) {
                            alert('标签名称可用，没有重复！')
                        } else {
                            alert('已经有相同标签存在！')
                        }
                        $.unblockUI();
                    });
                });
            })
        </script>
    </body>
</html>
