<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
  <div class="nav">
    <ul id="nav">
  <li><a href="<?=$php_self?>" class="song">根据车系抓取车款</a></li>
  <li ><a href="<?=$php_self?>updateserieslog">待操作</a></li>
  <li ><a href="<?=$php_self?>updateseriesloglist">新操作记录</a></li>
  <li ><a href="<?=$php_self?>fileserieslist">车系日志</a></li>
  <li ><a href="<?=$php_self?>fileserieslist&id=brand">品牌日志</a></li>
  <li ><a href="<?=$php_self?>fileserieslist&id=factory">厂商日志</a></li>
  <li ><a href="<?=$php_self?>fileserieslist&id=model">待上市车款记录</a></li>

</ul>
</div>
<div class="clear"></div>
<div class="user_con">
<div class="user_con1">
  <form action="<?=$php_self?>catchdata" method="post" name="form2">
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>
      品牌
      <select name="brand_id" id="brand_id">
        <option value="0">全站抓取</option>
        <? foreach((array)$brand as $k=>$v) {?>
        <option value="<?=$v[brand_id]?>"><?=$v[brand_name]?></option>
        <?}?>
      </select>
      厂商
      <select name="factory_id" id="factory_id">
        <option value="">请选择</option>
        <? foreach((array)$factory as $k=>$v) {?>
        <option value="<?=$v[factory_id]?>"><?=$v[factory_name]?></option>
        <?}?>
      </select>
      车系
      <select name="series_id" id="series_id">
        <option value="">请选择</option>
        <? foreach((array)$series as $k=>$v) {?>
        <option value="<?=$v[series_id]?>"><?=$v[series_name]?></option>
        <?}?>
      </select>
      <input type="submit"  name="btn_data2" id="btn_data" value="按条件抓取 " onClick="javascript:my_submit2();">（<font color="red">*</font>不选择全站抓取）
      </td>
    </tr>
  </table>
  </form>
    
<form action="<?=$php_self?>catchdataurl" method="post" name="form1">
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
      
    <tr>
        <td>
         按车系  <input type="text" value="" size="40" id="seriesurl" name="seriesurl">
              <input type="submit" value="手动抓取" id="btn_data1" name="btn_data1" onClick="javascript:my_submit1();"/>
             
              <br>*车款参数列表页链接如：<font color="red">http://www.autohome.com.cn/777/<font color="blue">options</font>.html </font><br>
              *蓝色的"<font color="blue">options</font>"一定要有<br>
              <font color="red">*注意 本站不存在的车系或抓取错误的内容要手动抓取</font></td>
    </tr>
  </table>
  </form>
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <caption style="color:red">抓取错误内容</caption>
      <tr class="th">
        <th>源网站</th>
        <th>本网站</th>
        <th>结果</th>
      </tr>
      <? foreach((array)$result_e as $key=>$value) {?>  
        <tr align="center">
            <td ><?=$value['src_brand_name']?>-><?=$value['src_factory_name']?>-><?=$value['src_series_name']?></td>
          <td ><?=$value['brand_name']?>-><?=$value['factory_name']?>-><?=$value['series_name']?></td>     
          <td >抓取失败：请检查，‘品牌->车系’数据是否一致！</td>
        </tr>
      <?}?>
      <tr class="page_bar_css"><td colspan="5" height="20"><?=$page_bar?></td></tr>
    </tbody>
  </table>
    
    
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
    <tbody>
        <caption>抓取正确内容</caption>
      <tr class="th">
        <th>源网站</th>
        <th>本网站</th>
        <th>车款列表</th>
        <th>结果</th>
      </tr>
      <? foreach((array)$result_t as $key=>$value) {?>
        <? foreach((array)$value as $k=>$v) {?>
  
        <tr align="center">
          <td width="150"><? if ($k==0) { ?><?=$v['src_brand_name']?>-><?=$v['src_series_name']?><? } ?></td>
          <td  width="150"><? if ($k==0) { ?><?=$v['brand_name']?>-><?=$v['series_name']?><? } ?></td>
          <td><?=$v[model_name]?></td>
          <td  width="80"><? if ($k!=0) { ?><? if ($v[exist]==1) { ?>已存在<? } else { ?>添加成功<? } ?><? } ?></td>
        </tr>
      
        <?}?>
      <?}?>
      <tr class="page_bar_css"><td colspan="5" height="20"><?=$page_bar?></td></tr>
    </tbody>
  </table>
</div>
</div>
</div>
<script type="text/javascript">

$().ready(function(){
  $('#brand_id').change(function(){
    var brand_id=$(this).val();
    var fact=$('#factory_id')[0];
    var facturl="?action=factory-json&brand_id="+brand_id;
    var sel=$(this)[0];
    $('#brand_name').val(sel.options[sel.selectedIndex].text)
    
    $.getJSON(facturl, function(ret){
      $('#factory_id option[value!=""]').remove();
      $('#series_id option[value!=""]').remove();
      $('#model_id option[value!=""]').remove();
      
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
      $('#series_id option[value!=""]').remove();
      $('#model_id option[value!=""]').remove();
      
      $.each(ret, function(i,v){
        ser.options.add(new Option(v['series_name'], v['series_id']));
      });
    });
  });
  
  <? if ($series_id) { ?>
  $('#series_id option[value="<?=$series_id?>"]').attr({selected:true});
  $('#factory_id option[value="<?=$series_r['factory_id']?>"]').attr({selected:true});
  $('#brand_id option[value="<?=$series_r['brand_id']?>"]').attr({selected:true});
  <? } ?>
  
  <? if ($keyword) { ?>
  $('#keyword').val('<?=$keyword?>');
  <? } ?>
  
  
});

function my_submit1(){
	document.form1.submit();
	document.form1.btn_data1.disabled=true;
}
function my_submit2(){
	document.form2.submit();
	document.form2.btn_data2.disabled=true;
}
</script>
<? include $this->gettpl('footer');?>