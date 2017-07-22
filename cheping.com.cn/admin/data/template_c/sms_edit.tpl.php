<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<script>
    function submit_form(){
        if($.trim($("#title").val())==""){
            alert("请填写标题!");
            return false;
        }else if($.trim($("#content").val())==""){
            alert("请填写内容!");
            return false;
        }
    }
</script>
<div class="navs">
    <ul class="nav">
        <li><a href="<?=$php_self?>">短信模板管理</a></li>
        <li><a class="song" href="<?=$phpSelf?>"><?=$page_title?></a></li>
        <li><a href="<?=$php_self?>send">手动发送短信</a></li>
    </ul>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user-table">
            <form method="post" action="<?=$php_self?>add" onsubmit="return submit_form();">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td width="150" align="right" height="50">标题：</td>
                        <td align="left"><input type="text" id="title" name="title" value="<?=$sms['title']?>" size="60"  style="margin-bottom:5px;"/></td>
                    </tr>
                    <tr>
                        <td align="right">短信模板内容：</td>
                        <td align="left"><textarea name="content" id="content" style="margin-bottom: 10px;" cols="60" rows="5"><?=$sms['content']?></textarea></td>
                    </tr>

                    <tr>
                        <td align="right">是否启用：</td>
                        <td align="left">是<input type="radio" checked name="state" value="1"/>  否<input name="state" <? if ($sms['state']==2) { ?>checked="checked"<? } ?> type="radio" value="2"/></td>
                    </tr>
                    <tr>
                        <td align="right">支持群发：</td>
                        <td align="left">是<input type="radio" id="mass" <? if ($sms['mass'] == 2) { ?>checked="checked"<? } ?> name="mass" value="2" onclick='javascript:$("#tr_usertype").show();'/>  否<input type="radio" id="mass" name="mass" value="1" <? if ($sms['mass'] == 1 || !$sms['mass']) { ?>checked="checked"<? } ?> onclick='javascript:$("#tr_usertype").hide();'/></td>
                    </tr>
                    <tr id='tr_usertype' <? if ($sms['mass'] == 2) { ?>style='display:'<? } else { ?>style='display:none'<? } ?>>
                        <td align="right">群发用户：</td>
                        <td align="left">
                            经销商联系人<input type="checkbox" id="user1" name="user_type[]" value="1" <? if (array_search(1, $user_type)!==false) { ?>checked="checked"<? } ?>>
                            报价销售<input type="checkbox" id="user2" name="user_type[]" value='2' <? if (array_search(2, $user_type)!==false) { ?>checked="checked"<? } ?>>
                            网站用户<input type="checkbox" id="user3" name="user_type[]" value='3' <? if (array_search(3, $user_type)!==false) { ?>checked="checked"<? } ?>>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="提交" name="add_edit_btn">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">变量说明：</td>
                        <td align="left">
                            <div style="height: auto;width: 700px;margin: auto;margin-bottom: 10px;border-bottom: #ccc solid 1px;">
                                <ul>
                                    <? foreach((array)$attr_type as $key=>$value) {?>
                                    <li style="line-height:26px;"><?=$key?>=====>  {$<?=$value?>}</li>
                                    <?}?>
                                </ul>
                            </div>
                            <input type="hidden" name="id" value="<?=$sms['id']?>">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<? include $this->gettpl('footer');?> 