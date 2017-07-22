<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
  <div class="nav">
    <ul id="nav">
      <li><a href="<?=$php_self?>setting" class="song">车系亮点配置</a></li>
      <li><a href="<?=$php_self?>orderlist">全车款配置排序列表</a></li>
      <li ><a href="<?=$php_self?>orderimportant">导入全车款配置排序</a></li>
    </ul>
  </div>
  <div class="clear"></div>
<div class="user_con">
<div class="user_con1">
  <form action="<?=$php_self?>setting" method="post">
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>
       品牌
      <select name="brand_id" id="brand_id">
        <option value="">请选择</option>
        <option value="0">全部</option>
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
      <input type="submit" name="search" value=" 搜 索 ">
      </td>
    </tr>
  </table>
  </form>
  
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr class="th">
        <th>车系id</th>
        <th>车系名称</th>
        <th>品牌名称</th>
        <th>标配名称</th>
        <th>操作</th>
      </tr>
      <? foreach((array)$list as $key=>$value) {?>
      <tr align="center">
        <td><?=$value['series_id']?></td>
        <td><?=$value['series_name']?></td>
        <td><?=$value['brand_name']?></td>
        <td> <? $i =strlen($value['prosetting']) ?><? if ($i>40) { ?><? echo mb_substr($value['prosetting'],0,40,'utf-8') ?>...<? } else { ?><?=$value['prosetting']?><? } ?> </td>
        <td><a href="<?=$php_self?>listcheck&series_id=<?=$value['series_id']?>">添加</a>&nbsp;&nbsp;<a href="<?=$php_self?>listdetail&series_id=<?=$value['series_id']?>">详情列表</a></td>
      </tr>
       <?}?>

      <? if (!$page_bar) { ?><tr><td colspan="5" height="20"><?=$page_bar?></td></tr><? } ?>
    </tbody>
  </table>
  <? if ($page_bar) { ?>
  <div>
    <div class="ep-pages">
      <?=$page_bar?>
    </div>
  </div>
  <? } ?>
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
  $('#factory_id option[value="<?=$factory_id?>"]').attr({selected:true});
  $('#brand_id option[value="<?=$brand_id?>"]').attr({selected:true});
  <? } ?>
   <? if ($brand_id) { ?>
  $('#brand_id option[value="<?=$brand_id?>"]').attr({selected:true});
  <? } ?>
   <? if ($factory_id) { ?>
  $('#factory_id option[value="<?=$factory_id?>"]').attr({selected:true});
  $('#brand_id option[value="<?=$brand_id?>"]').attr({selected:true});
  <? } ?>
  

});

$('#category').change(function(){
    var cate = $('#pcategory')[0];
    var pid = $(this).val();
    var cateurl = "?action=param-json&pid="+pid;
    if(!pid) {
      $('#pcategory option[value!=""]').remove();
    }else{
      //alert(pid);
      $.getJSON(cateurl, function(ret){
        $('#pcategory option[value!=""]').remove();
        $.each(ret, function(i,v){
          cate.options.add(new Option(v['name'], v['id']));
        });
      });
    }
  });
 <? if ($category && empty($pcategory)) { ?>
  $('#category option[value="<?=$category?>"]').attr({selected:true});
  <? } elseif($pcategory) { ?>
  $('#category option[value="<?=$category?>"]').attr({selected:true});
  $('#pcategory option[value="<?=$pcategory?>"]').attr({selected:true});
  <? } ?>
</script>
</body>
</html>
