<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user">
    <div class="user_con">
        <div class="user_con1">
            <form method="post" action="<?=$php_self?>rmdWordAct">
                <table cellpadding="0" cellspacing="0" class="table2" border="0" >
                    <tr>
                        <td colspan="4" style="height: 40px;">
                            编辑 <font style="color:red;"><?=$order?></font> 搜索条件&nbsp;&nbsp;&nbsp;&nbsp;推荐词 <input type="text" id="word" name="word" value="<?=$word?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ul class="rmdword">
                                <? for($i=1; $i<11; $i++) { ?>
                                <? $j = $i - 1 ?>
                                <? $detail = array() ?>
                                <li>
                                    <select class="car_option" name="car_option[]" id="car_option<?=$i?>"> 
                                        <option value="0">选择条件</option>
                                        <? foreach((array)$options as $k=>$v) {?>                                        
                                        <option value="<?=$k?>" 
                                                <? if ($k == $rmdWord['option'][$j]) { ?>
                                                selected="selected"
                                                <? $detail = $$k ?>
                                                <? } ?>
                                                ><?=$v?></option>
                                       <?}?>
                                    </select>
                                    <select class="option_detail" style="width: 80px;" name="option_detail[]" id="option_detail<?=$i?>">                                        
                                        <option value="0">选择配置</option>
                                        <? if (!empty($detail)) { ?>
                                        <? foreach((array)$detail as $kk=>$vv) {?>
                                            <option value="<?=$kk?>" <? if ($kk == $rmdWord['detail'][$j]) { ?>selected="selected"<? } ?>><?=$vv?></option>
                                        <?}?>
                                        <? } ?>
                                    </select>
                                </li>
                                <? } ?>
                            </ul>
                        </td>                   
                    </tr>
                    <tr>
                        <td colspan="16" style="line-height: 60px;">
                            <input type="hidden" id="type" name="type" value="<?=$type?>"/>
                            <input type="submit" value="确认提交">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="取消操作">
                            <input type="hidden" name="date" id="date" value="<?=$date?>"/>
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
    var obj = $(this).next();
    $.get('<?=$php_self?>getOptions', {key:key}, function(ret) {
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
