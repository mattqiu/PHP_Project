<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
          <li><a href="javascript:void(0);"  class="song">车系贷款列表</a></li>
          <li><a href="<?=$php_self?>loanlive">导出车系贷款信息</a></li>

        </ul>
    </div>
    <div class="clear"></div>
<div class="user_con">
<div class="user_con1">
  <form action="<?=$php_self?>" method="post" name="form1">
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>
       品牌
      <select name="brand_id" id="brand_id">
        <option value="0">请选择</option>
        <? foreach((array)$brand as $k=>$v) {?>
        <option value="<?=$v[brand_id]?>"><?=$v['letter']?> <?=$v['brand_name']?></option>
        <?}?>
      </select>
      厂商
      <select name="factory_id" id="factory_id">
        <option value="0">请选择</option>
        <? foreach((array)$factory as $k=>$v) {?>
        <option value="<?=$v['factory_id']?>"><?=$v['factory_name']?></option>
        <?}?>
      </select>
      车系
      <select name="series_id" id="series_id">
        <option value="0">请选择</option>
        <? foreach((array)$series as $k=>$v) {?>
        <option value="<?=$v['series_id']?>"><?=$v['series_name']?></option>
        <?}?>
      </select>
      <input type="submit" name="search" value=" 搜 索 ">
      </td>
    </tr>
  </table>
  </form>
  
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr class="th">
        <th>车系id</th> 
        <th>品牌名称</th>
        <th>厂商名称</th>
        <th>车系名称</th>
        <th onclick="sub('name')">贷款名称(点击排序)</th>
        <th onclick="sub('end_date')">有效至(点击排序)<input id="ssort1" type="hidden" name="ssort" value="<?=$ssort?>"></th>
        <th>操作</th>
      </tr>
      <? foreach((array)$seriesDB as $sdbk=>$sdbv) {?>
      <tr align="center">
        <td><?=$sdbv['series_id']?></td>
         <td><?=$sdbv['brand_name']?></td>
        <td><?=$sdbv['factory_name']?></td>
        <td><?=$sdbv['series_name']?></td>
        <td><?=$sdbv['name']?></td>
        <td><? if ($sdbv['end_date']) { ?><? echo date("Y-m-d",$sdbv['end_date']) ?><? } else { ?><? } ?></td>
        <td><a class="click_pop_dialog" tourl="/admin/index.php?action=loan-del&series_id=<?=$sdbv['series_id']?>" icon="warnning" mt="1" href="#here">
        <img width="9" height="9" src="/admin/images/del1.gif">删除
        </a>&nbsp;<a href="<?=$php_self?>addloan&brand_id=<?=$brand_id?>&factory_id=<?=$factory_id?>&series_id=<?=$sdbv['series_id']?>">添加</a>&nbsp;&nbsp;<a href="<?=$php_self?>loanlist&brand_id=<?=$brand_id?>&factory_id=<?=$factory_id?>&series_id=<?=$sdbv['series_id']?>">详情列表</a></td>
      </tr>
       <?}?>
    </tbody>
  </table>
</div>
<div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif" height="16" ></div>
</div>
</div>
<script type="text/javascript">
   
$().ready(function(){
	$('#brand_id').val(<?=$brand_id?>);
	$('#factory_id').val(<?=$factory_id?>);
	$('#series_id').val(<?=$series_id?>);
	$('#brand_id').change(function(){
		var brand_id=$(this).val();
		var fact=$('#factory_id')[0];
		var facturl="?action=factory-json&brand_id="+brand_id;
		var sel=$(this)[0];
		$('#brand_name').val(sel.options[sel.selectedIndex].text);

		$.getJSON(facturl, function(ret){
			$('#factory_id option[value!="0"]').remove();
			$('#series_id option[value!="0"]').remove();
		  
			$.each(ret, function(i,v){
				fact.options.add(new Option(v['factory_name'], v['factory_id']));
			});
		});
	});
  
	$('#factory_id').change(function(){
		var fact_id=$(this).val();
		var ser=$('#series_id')[0];
		var serurl="?action=series-json&factory_id="+fact_id;
		var sel=$(this)[0];
		$('#factory_name').val(sel.options[sel.selectedIndex].text)

		$.getJSON(serurl, function(ret){
			$('#series_id option[value!="0"]').remove();

			$.each(ret, function(i,v){
				ser.options.add(new Option(v['series_name'], v['series_id']));
			});
		});
	});
});
function  sub(i){
var sort =$("#ssort1").val();
    
    if(sort){
        var url="index.php?action=loan-list&sname="+i+"&ssort="+sort;
    }else{
         var url="index.php?action=loan-list&sname="+i+"&ssort=desc";
    }
    
     document.form1.action = url;
     document.form1.submit();
}
</script>
<script type="text/javascript">
$().ready(function(){
    
    
  $('.click_pop_dialog').live('click', function(){
    pop_window($(this), {message:'您确定要删除该参数分类吗？', pos:[200,150]});
  });
});

</script>
<!--<div style="display: block; z-index: 1002; outline: 0px none; height: auto; width: 371px; top: -471px; left: 200px; border: 1px solid rgb(204, 204, 204);" class="ui-dialog ui-widget ui-widget-content ui-corner-all  ui-draggable" tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-dialog"><div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix" style="background: url(&quot;images/alter_title.gif&quot;) repeat scroll 0% 0% transparent; border: medium none;"><span class="ui-dialog-title" id="ui-dialog-title-dialog">提示</span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button"><span class="ui-icon ui-icon-closethick">close</span></a></div><div id="dialog" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 76px; height: auto;">  <div class="alert_con">    <div class="img"><img width="32" height="32" src="images/icon_warnning.gif"></div>您确定要删除该参数分类吗？  </div>  <div class="alert_confirm">  <input type="button" class="ok"><input type="button" class="cancel">  </div></div></div>-->
<? include $this->gettpl('footer');?>
