<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
        <div class="user-add">
            <div class="nav">
                <ul>
                    <li><a href="<?=$php_self?>add"  class="song"><?=$page_title?></a></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="user-add-con">
                <div style=" padding:0 10px;">
                    <form name="add_user" id="add_user" method="post" action="<?=$php_self?>addandupdate">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="right" >用户名：</td>
                                <td class="margin46">
                                    <input type="text" maxlength="20" name="username" id="username" size="20" value="<?=$user['username']?>" <? if ($user['id']) { ?>readonly="true"<? } ?>/>
                                           <? if (empty($user['id'])) { ?><input type="button" name="btn_checktitle" id="btn_checktitle" value="检查是否重复"/><? } ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="right" >手机号：</td>
                                <td class="margin46">
                                    <input type="text" maxlength="11" name="mobile" id="mobile" size="20" value="<?=$user['mobile']?>" />
                                    <input type="button" name="btn_checktitl" id="btn_checktitl" value="检查是否重复"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="right" >邮箱：</td>
                                <td class="margin46"><input type="text" name="email" id="email" size="20" value="<?=$user['email']?>" onkeyUp="this.value = plusInteger(this.value)"></td>
                            </tr>
                            <tr>
                                <td class="right" >密码：</td>
                                <td class="margin46"><input type="password" name="password" id="password" size="20" value=""/></td>
                            </tr>
                            <tr>
                                <td class="right" >确认密码：</td>
                                <td class="margin46"><input type="password" name="password_confirm" id="password_confirm" size="20" value=""/></td>
                            </tr>
                            <tr>
                                <td class="right" >用户状态：</td>
                                <td class="margin46">
                                    <select name="state">
                                        <? foreach((array)$state as $key=>$value) {?>
                                        <option value="<?=$key?>" <? if ($user["state"]==$key) { ?>selected<? } ?>><?=$value?></option>
                                        <?}?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="right" ><button type="submit" name="add" class='submit' id="tag_btn"/>确定 </td>
                                <td > 
                                    <button type="reset" style=" margin-left:46px;" name="cancel" class='submit' onclick="javascript:history.go('-1');
                                            window.close();">取消</button>
                                    <input type="hidden" name="id" value="<?=$user['id']?>"/>
                                </td>
                            </tr>
                        </table> 
                    </form>
                </div>  
            </div>
        </div>  
        <script>
            $().ready(function () {
                $('#btn_checktitle').click(function () {
                    if ($.trim($('#username').val()) == '') {
                        alert('用户名不能为空！');
                        $('#username').focus();
                        return false;
                    }
                    $.blockUI({
                        message: "<h1><p>检查中，请稍等...</p></h1>"
                    });
                    $.post("<?=$php_self?>checkname", {username: $('#username').val()}, function (ret) {
                        if ($.trim(ret) != 1) {
                            alert('用户名可用，没有重复！')
                        } else {
                            alert('已经有相同用户名存在！')
                        }
                        $.unblockUI();
                    });
                });

                $('#btn_checktitl').click(function () {
                    if ($.trim($('#mobile').val()) == '') {
                        alert('手机号不能为空！');
                        $('#mobile').focus();
                        return false;
                    }
                    $.blockUI({
                        message: "<h1><p>检查中，请稍等...</p></h1>"
                    });
                    $.post("<?=$php_self?>Checktel", {mobile: $('#mobile').val()}, function (ret) {
                        if ($.trim(ret) != 1) {
                            alert('手机号可用，没有重复！')
                        } else {
                            alert('已经有相同手机号存在！')
                        }
                        $.unblockUI();
                    });
                });
            })

            $('#tag_btn').click(function () {
                if ($('#username').val() == '' || $('#mobile').val() == '') {
                alert('请填写用户名或手机号再提交！');
                        return false;
                }
                <? if (!$user['id']) { ?>
                if ($('#password').val() == '') {
                    alert('请填写密码再提交！');
                    $('#password').focus();
                    return false;
                }
                if ($('#password').val().length < 5) {
                    alert('密码长度必须介于5-15位数之间！');
                    $('#password').focus();
                    return false;
                }
                if ($('#password').val() != $('#password_confirm').val()){
                alert('两次密码不一致！');
                        $('#password_confirm').focus();
                        return false;
                }
                <? } ?>
                        if ($("#email").val() == "") {
                    alert('请填写email再提交！');
                    $('#email').focus();
                    return false;
                }
                var emailRegExp = new RegExp("^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$");

                if (!emailRegExp.test($('#email').val()) || $('#email').val().indexOf('.') == -1) {
                    alert('请填写正确email再提交！');
                    $('#email').focus();
                    return false;
                }

                $('#tag_btn').attr("disabled", "value");
                $('#add_user').submit();
            });
        </script>
    </body>
</html>
