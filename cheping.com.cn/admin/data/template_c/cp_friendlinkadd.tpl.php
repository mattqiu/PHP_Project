<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<script>
    $(document).ready(function(){
        $("#add_tr").click(function(){
            
        });
    });
</script>
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li><a href="<?=$php_self?>">友情链接</a></li>
        <li class="li2"><a href="<?=$php_self?>addlink<? if ($link) { ?>&id=<?=$link['id']?><? } ?>" class="song"><? if ($link) { ?>修改<? } else { ?>添加<? } ?>友情链接</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
            <form method="post" onsubmit="return checkform();" enctype="multipart/form-data" action="<?=$php_self?>addlink">
                <input type="hidden" name="id" value="<?=$link['id']?>">
            <table class="table2" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="td_right" width="100">名称:</td>
                    <td class="td_left" align="right"><input type="text" name="name" id="name" value="<?=$link['name']?>"><font style="color: red;margin-left: 10px;">*</font></td>
                </tr>
                <tr>
                    <td class="td_right" width="100">链接:</td>
                    <td class="td_left" align="right"><input type="text" name="link" id="link" value="<?=$link['link']?>">("带http://开头URL")</td>
                </tr>
                <tr>
                    <td class="td_right" width="100">图片:</td>
                    <td class="td_left" align="right">
                        <input type="file" size="30" name="pic" id="pic"><? if ($link['pic']) { ?>&nbsp;&nbsp;<a class="jTip" id="vpic_index_<?=$k?>" href="<?=$php_self?>imgcode&code=<? echo base64_encode($relat_dir.'images/friendlink/'.$link['pic']); ?>">查看图片</a><? } ?> <span style="color: red;">最大宽度82px;最大高度73px;</span>
                    </td>
                </tr>
                <tr>
                    <td class="td_right" width="100">友链类型：</td>
                    <td class="td_left" align="right">
                        友情链接：<input type="radio" name="type" checked value="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;合作伙伴：<input type="radio" <? if ($link["type"]==2) { ?>checked="true"<? } ?> name="type" value="2">
                    </td>
                </tr>
                <tr>
                    <td class="td_right" width="100">是否可用:</td>
                    <td class="td_left" align="right">
                        <input type="radio" name="state" checked value="1">否&nbsp;&nbsp;<input type="radio" <? if ($link["state"]==2) { ?>checked="true"<? } ?> name="state" value="2">是
                    </td>
                </tr>
                <tr>
                    <td class="td_right" width="100">是否开启nofollow:</td>
                    <td class="td_left" align="right">
                        <input type="radio" name="nofollow" checked value="1">是&nbsp;&nbsp;<input type="radio" <? if ($link["nofollow"]==2) { ?>checked="true"<? } ?> name="nofollow" value="2">否
                    </td>
                </tr>
                <tr>
                    <td class="td_right" width="100"></td>
                    <td class="td_left" align="right">
                    </td>
                </tr>

                <tr>
                    <td class="td_right" width="100">需要显示的页面:</td>
                    <td class="td_left" align="right">
                    </td>
                </tr>

                <tr>
                    <td class="td_left" align="right">
                        <select id="pagetype" name="page">
                            <option value="">请选择类型</option>
                            <? foreach((array)$pagetype as $key=>$value) {?>
                            <option <? if ($link['pagetype']==$key) { ?>selected="true"<? } ?> value="<?=$key?>"><?=$value?></option>
                            <?}?>
                        </select>
                    </td>
                    <td class="td_left" align="right">
                        显示位置:<input type="text" name="queen" value="<?=$link['queen']?>">
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        
                    </td>
                </tr>
                
                <tr>
                    <td class="td_right" width="100"></td>
                    <td class="td_left" align="right">
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="wallpaper_btn" value="提交">
                    </td>
                </tr>
            </table>
            </form>
            <div style="height:40px;"></div>
        </div>
        <div class="user_con2">
            <img src="<?=$admin_path?>images/conbt.gif" height="16" >
        </div>
    </div>
</div>
<script>
    function checkform(){
        if($("#name").val().length==0)
        {
            alert("请填写链接名称！");
            return false;
        }
        if($.trim($("#link").val()).length<1){
            alert("链接地址!");
            return false;
        }
        if($("#pagetype").val()==""){
            alert("选择需要显示页面!");
            return false;
        }
    }
</script>
<? include $this->gettpl('footer');?>