<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li><a href="<?=$php_self?>recommendlist">信息预览</a></li>
        <li><a href="javascript:void(0);" class="song">操作</a></li>
        <li><a href="<?=$php_self?>hotcarNotice&act=recommend">逻辑说明</a></li>
    </ul>
    </div>
            <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
			<form method="post" action="<?=$php_self?>recommendadd">
				<table cellpadding="0" cellspacing="0" class="table2" border="0">
				<? for($i=0; $i<12; $i++) { ?>
					<tr height="40">
						<td><? echo $i+1 ?></td>
						<td>
							<select name="brand_i[]" class="brand_id" id="brand_id<?=$i?>">
								<option value="">==请选择品牌==</option>
								<? foreach((array)$brand as $k=>$v) {?>
								<option value="<?=$v['brand_id']?>"><?=$v['letter']?> <?=$v['brand_name']?></option>
								<?}?>
								<? if ($recommendact[$i]['brand_id']) { ?>
								<script type="text/javascript">
									$("#brand_id<?=$i?>").val("<?=$recommendact[$i]['brand_id']?>");
								</script>
								<? } ?>
							</select>
						</td>
						<td>
							<select name="factory_i[]" class="factory_id" id="factory_id<?=$i?>">
								<option value="">==请选择厂商==</option>
								<? if ($recommendact[$i]['factory']) { ?>
								<? foreach((array)$recommendact[$i]['factory'] as $k=>$v) {?>
								<option value="<?=$v['factory_id']?>"><?=$v['factory_name']?></option>
								<?}?>
								<script type="text/javascript">
									$("#factory_id<?=$i?>").val("<?=$recommendact[$i]['factory_id']?>");
								</script>
								<? } ?>
							</select>
						</td>
						<td>
							<select name="series_i[]" class="series_id" id="series_id<?=$i?>">
								<option value="">==请选择车系==</option>
								<? if ($recommendact[$i]['series']) { ?>
								<? foreach((array)$recommendact[$i]['series'] as $k=>$v) {?>
								<option value="<?=$v['series_id']?>"><?=$v['series_name']?></option>
								<?}?>
								<script type="text/javascript">
									$("#series_id<?=$i?>").val("<?=$recommendact[$i]['series_id']?>");
								</script>
								<? } ?>
							</select>
						</td>
					</tr>
				<? } ?>
					<tr><td><input type="hidden" value="<?=$val['series_id']?>" name="series_i1" /><input type="submit" value="提交" />&nbsp;&nbsp;
						<a href="">取消操作</a></td></tr>
				</table>
			</form>
        </div>
        <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
    </div>
</div>
<? include $this->gettpl('footer');?>
<script type="text/javascript">
$(function(){
	$('.brand_id').change(function(){
		var brand_id=$(this).val();
		var facturl="?action=factory-json&brand_id="+brand_id;
		var sel=this;
		//$('#brand_name').val(sel.options[sel.selectedIndex].text)

		$.getJSON(facturl, function(ret){
			$(sel).parent().next().find("select option[value!='']").remove();
			$(sel).parent().next().next().find("select option[value!='']").remove();
			$.each(ret, function(i,v){
				$(sel).parent().next().find('select').append('<option value='+v['factory_id']+'>'+v['factory_name']+'</option>');
			})
		})
	})
  
	$('.factory_id').change(function(){
		var fact_id=$(this).val();
		var serurl="?action=series-jsonprice&factory_id="+fact_id;
		var sel=this;

		$.getJSON(serurl, function(ret){
			$(sel).parent().next().find("select option[value!='']").remove();
			$.each(ret, function(i,v){
				$(sel).parent().next().find('select').append('<option value='+v['series_id']+'>'+v['series_name']+'</option>');
			})
		})
	})
})
function checkForm(key){
	$("#form" + key).submit();
}
function lookInit(key){
	return;
	$(".alias" + key).prev().val($(".alias" + key).val());
	$(".brand_id" + key).prev().val($(".brand_id" + key).val());
	$(".factory_id" + key).prev().val($(".factory_id" + key).val());
	$(".series_id" + key).prev().val($(".series_id" + key).val());
}
</script>
    </body>
</html>