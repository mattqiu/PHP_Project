<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li><a href="javascript:void(0);" class="song">信息预览</a></li>
        <li><a href="<?=$php_self?>newcaract">添加</a></li>
		<li><a href="<?=$php_self?>hotcarNotice&act=newcar">逻辑说明</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
			<form method="post" action="<?=$php_self?>addFocusFive" enctype="multipart/form-data">
				<table cellpadding="0" cellspacing="0" class="table2" border="1">
					<? if ($upcomingdata) { ?>
						<tr><td>序号</td><td>日期</td><td>车型</td><td>价格</td><td>连接</td><td>操作</td></tr>
						<? foreach((array)$upcomingdata as $key=>$val) {?>
						<tr>
							<td><? echo $key+1 ?></td>
							<td><?=$val['date']?></td>
							<td><?=$val['car_name']?></td>
							<td><?=$val['price']?></td>
							<td><?=$val['url']?></td>
							<td><a href="#" onclick="addInput(this,<?=$key?>)">修改</a></td>
						</tr>
						<?}?>
					<? } else { ?>
						<tr><td>没有信息！</td></tr>
					<? } ?>
				</table>
				<p>请确认信息后点击生成&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="生成" onclick="newMakefile('upcoming')" /></p>
			</form>
        </div>
		<div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
    </div>
</div>
<script type="text/javascript">
	function addInput(obj, id){
		$(obj).parent().parent().parent().find("tr[class='add_tr']").remove();
		$(obj).parent().parent().after('<tr class="add_tr"><td></td><td><input type="text" id="car_date" /></td><td><input type="text" id="car_name" /></td><td><input type="text" id="car_price" /></td><td><input type="text" id="car_url" /></td><td><input type="button" value="提交" onclick="openUrl('+id+')" /></td></tr>');
		$("input.datepicker").datepicker();
		$('input.datepicker').datepicker('option', 'minDate', new Date());
		return false;
	}
	function openUrl(id){
		var car_date = $("#car_date").val();
		var car_name = $("#car_name").val();
		var car_price = $("#car_price").val();
		var car_url = $("#car_url").val();
		//alert('?action=index-newcarlist&date='+car_date+'&name='+car_name+'&price='+car_price+'&url='+car_url);
		//return false;
		window.location.href = '?action=index-modifynewcar&id='+id+'&date='+car_date+'&name='+car_name+'&price='+car_price+'&url='+car_url;
	}
</script>
    </body>
</html>