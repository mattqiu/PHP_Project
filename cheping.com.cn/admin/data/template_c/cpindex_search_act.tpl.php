<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user" style="width:1300px;">
    <div class="nav">
    <ul id="nav">
        <li><a href="<?=$php_self?>searchList">信息预览</a></li>
        <li><a href="javascript:void(0);" class="song">操作</a></li>
        <li><a href="<?=$php_self?>hotcarNotice&act=search">逻辑说明</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
            <form method="post" action="<?=$php_self?>searchAct" style=" width: 925px; overflow: auto;">
                <table cellpadding="0" cellspacing="0" class="table2" style=" width: 1250px;" border="0">
                    <tr>
                        <td>位置</td>
                        <td>关键字</td>
                        <? for($i=1; $i<11; $i++) { ?>
                        <td>条件<?=$i?></td>
                        <? } ?>
                    </tr>                    
                    <? for($i=1; $i<11; $i++) { ?>
                    <? $datai = $data[$i] ?>
                    <tr style="height: 65px;<? if ($i % 2 == 0) { ?>background-color:#D2D2D2;<? } ?>">
                        <td><?=$i?></td>
                        <td><input type="text" size="10" id="alias<?=$i?>" name="alias<?=$i?>" value="<?=$datai['alias']?>"></td>
                        <? for($k=1; $k<11; $k++) { ?>                     
                        <td>
                            <select id="car_option<?=$i?><?=$k?>" name="car_option<?=$i?><?=$k?>" class="car_option" style="width:80px;">        
                                <option value="0">选择条件</option>
                                <? foreach((array)$options as $key=>$value) {?>
                                    <option value="<?=$key?>" <? if ($key == $datai['option_key'][$k]) { ?>selected="selected"<? } ?>><?=$value?></option>
                                <?}?>
                            </select>
                            <br>                            
                            <? $optionKey = $datai['option_key'][$k] ?>
                            <? $detail = $$optionKey ?>
                            <select id="option_detail<?=$i?><?=$k?>" name="option_detail<?=$i?><?=$k?>" class="option_detail" style="width:80px;">        
                                <option value="0">选择配置</option>
                                <? if (!empty($detail)) { ?>
                                    <? foreach((array)$detail as $kk=>$vv) {?>
                                        <option value="<?=$kk?>" <? if ($datai['option_value'][$k] == $kk) { ?>selected="selected"<? } ?>><?=$vv?></option>
                                    <?}?>
                                <? } ?>
                            </select>                            
                        </td>
                        <? } ?>
                    </tr>
                    <? } ?>
                    <tr>
                        <td colspan="16" style="line-height: 60px;">
                            <input type="submit" value="确认提交">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="取消操作">
                        </td>                        
                    </tr>
                </table>
            </form>
        </div>
        <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
    </div>
</div>
<script>
$('.car_option').change(function() {
    var key = $(this).val();
    var obj = $(this).nextAll('.option_detail');
    $.get('/admin/index.php?action=cpindex-getOptions', {key:key}, function(ret) {
        var js = '';
        ret = eval("(" + ret + ")");
        $.each(ret, function(i, v) {
            js += "<option value='" + i + "'>" + v + "</option>\n";
        });                        
        obj.empty().append(js);
    });
});
</script>
    </body>
</html>