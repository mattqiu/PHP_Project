<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li><a href="<?=$php_self?>newcarlist">信息预览</a></li>
        <li><a href="javascript:void(0);" class="song">添加</a></li>
        <li><a href="<?=$php_self?>hotcarNotice&act=newcar">逻辑说明</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
			<form method="post" action="<?=$php_self?>addnewcar" enctype="multipart/form-data" id="form<?=$key?>">
				<table cellpadding="0" cellspacing="0" class="table2" border="0">
					<? for($i=1; $i<7; $i++) { ?>
						<tr>
							<td><?=$i?>&nbsp;&nbsp;</td>
							<td><label for="date<?=$i?>">录入上市日期</label><input type="text" value="" name="date[]" id="date<?=$i?>" /></td>
							<td><label for="carname<?=$i?>">录入车型名称</label><input type="text" value="" name="car_name[]" id="carname<?=$i?>" /></td>
							<td><label for="price<?=$i?>">录入预售价格</label><input type="text" value="" name="price[]" id="price<?=$i?>" /></td>
							<td><label for="url<?=$i?>">录入链接地址</label><input type="text" value="" name="url[]" id="url<?=$i?>" /></td>
						</tr>
					<? } ?>
					<tr><td><input type="hidden" value="<?=$id?>" name="id" /><input type="hidden" value="<?=$start_time?>" name="start_time" /><input type="submit" /></td></tr>
				</table>
			</form>
        </div>
        <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
    </div>
</div>
    </body>
</html>