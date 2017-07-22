<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
        <div class="user-add">
            <div class="navs" >
                <ul class="nav">
                    <li><a href="?action=user-userlist">正式用户</a></li>
                    <li><a href="?action=user-userlist&type=sideline">兼职用户</a></li>
                    <? if ($type == "add") { ?>
                    <li  ><a href="?action=user-add" class="song">添加用户</a></li>   
                    <? } else { ?>
                    <li ><a href="?action=user-edit&uid=<?=$user['id']?>" class="song">用户信息修改</a></li> 
                    <? } ?>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="user-add-con">
                <div style=" padding:0 10px;">
                    <form name="add_user" method="post" action="?action=user-update" onsubmit="return check_form()">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="right" >用户姓名:</td>
                                <td class="margin46">
                                    <input type="text" name="username" id="username" size="20" value="<?=$user['username']?>" <?=$ro?>>
                                    <span id="msg_username" style="color: #FF0000"></span>       
                                </td>
                            </tr>
                            <tr>
                                <td class="right" >密码：</td>
                                <td class="margin46">
                                    <input type="password" name="password" id="password" size="20" value="<?=$user['password']?>" onblur="javascript:passwordStrong(this)">
                                    <span id="msg_password" style="color: #FF0000"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="right" >确认密码：</td>
                                <td class="margin46">
                                    <input type="password" name="password_confirm" id="password_confirm" size="20" value="">
                                    <span id="msg_password_confirm" style="color: #FF0000"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="right" >真实姓名：</td>
                                <td class="margin46">
                                    <input type="text" name="realname" id="realname" size="20" value="<?=$user['realname']?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="right" >编辑笔名：</td>
                                <td class="margin46">
                                    <input type="text" name="nickname" id="realname" size="20" value="<?=$user['nickname']?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="right" >电话：</td>
                                <td class="margin46">
                                    <input type="text" name="mobile" size="20" value="<?=$user['mobile']?>" onkeyUp="this.value = plusInteger(this.value)">
                                </td>
                            </tr>
                            <tr>
                                <td class="right" >用户类型：</td>
                                <td class="margin46">
                                    <select name="gid">
                                        <? foreach((array)$groups as $k=>$group) {?>
                                        <option value="<?=$group['group_id']?>" <? if ($user['gid']==$group['group_name']) { ?>selected<? } ?>><?=$group['group_name']?></option>
                                        <?}?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="right" >兼职：</td>
                                <td class="margin46">
                                    <select name="jianzhi">
                                        <option value='0' <? if ($user['jianzhi']<>1) { ?>selected<? } ?>>否</option>
                                        <option value='1' <? if ($user['jianzhi']==1) { ?>selected<? } ?>>是</option>
                                    </select>
                                </td>
                            </tr>
                             <tr>
                                <td class="right" >编辑等级：</td>
                                <td class="margin46">
                                    <select name="level">
                                        <option value='a' <? if ($user['jianzhi']<>1) { ?>selected<? } ?>>A</option>
                                        <option value='b' <? if ($user['jianzhi']==1) { ?>selected<? } ?>>B</option>
                                        <option value='c' <? if ($user['jianzhi']==1) { ?>selected<? } ?>>C</option>
                                    </select>
                                </td>
                            </tr>
                            <tr style="border:none;">
                                <td class="right" style=" border:none;" ><button type=" submit" name="add" id="btn_submit">确定</button> </td>
                                <td style="border:none;" >
                                    <button id="btn_reset" type="reset" style=" margin-left:46px;" name="cancel" onclick="javascript:history.go('-1');window.close();">取消</button>
                                    <input type="hidden" name="type" value="<?=$type?>">
                                    <input type="hidden" name="uid" value="<?=$user['uid']?>">
                                </td>
                            </tr>
                        </table> 
                    </form>
                </div>  
            </div>
        </div>  
    <script>
        function check_form() {
            if ($('#username').val() == '') {
                $('#msg_username').html('用户名不能为空。');
                $('#username').focus();
                return false;
            }
            if ($('#password').val() == '') {
                $('#msg_password').html('用户密码不能为空。');
                $('#password').focus();
                return false;
            }
            if (!/(?=\S*?[a-zA-Z])(?=\S*?[0-9])\S{6,}/im.test($('#password').val())) {
                $('#msg_password').html('密码太弱，要求大小写英文+数字组成，长度至少6位！');
                $('#password').focus();
                return false;
            }
            if ($('#password').val() != $('#password_confirm').val()) {
                $('#msg_password_confirm').html('确认密码与密码不一致。');
                $('#password_confirm').focus();
                return false;
            }
        }
        function passwordStrong(obj){
            $.getJSON('<?=$php_self?>passwordstrong',{password:obj.value}, function(r){
                if(r['password']==''){
                    $('#msg_password').html('密码太弱，要求大小写英文+数字组成，长度至少6位！');
                    return false;
                }else{
                    $('#msg_password').html('');
                }
            });
        }
    </script>
    </body>
</html>
