<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
          <li ><a href="<?=$php_self?>">根据车系抓取车款</a></li>
          <li ><a href="<?=$php_self?>updateserieslog">待操作</a></li>
          <li ><a href="<?=$php_self?>updateseriesloglist">新操作记录</a></li>
          <li ><a href="<?=$php_self?>fileserieslist">车系日志</a></li>
          <li ><a href="<?=$php_self?>fileserieslist&id=brand">品牌日志</a></li>
          <li ><a href="<?=$php_self?>fileserieslist&id=factory">厂商日志</a></li>
          <li><a href="<?=$php_self?>fileserieslist&id=model" class="song">待上市车款记录</a></li>

        </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
             <form action="<?=$php_self?>fileserieslist" method="post" name="form2">
                <table class="table2" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                       <td>
                            <select name="brand_id" id="brand_id">
                            <option value="">请选择品牌</option>
                            <? foreach((array)$brand as $k=>$v) {?>
                            <option value="<?=$v[brand_id]?>" <? if ($v[brand_id]==$brand_id) { ?>selected<? } ?>><?=$v[brand_name]?></option>
                            <?}?>
                          </select>
                          <select name="factory_id" id="factory_id">
                            <option value="">请选择厂商</option>
                            <? foreach((array)$factory as $k=>$v) {?>
                            <option value="<?=$v[factory_id]?>" <? if ($v[factory_id]==$factroy_id) { ?>selected<? } ?>><?=$v[factory_name]?></option>
                            <?}?>
                          </select>
                          <select name="series_id" id="series_id">
                            <option value="">请选择车系</option>
                            <? foreach((array)$series as $k=>$v) {?>
                            <option value="<?=$v[series_id]?>" <? if ($v[series_id]==$series_id) { ?>selected<? } ?>><?=$v[series_name]?></option>
                            <?}?>
                          </select>
                         
                         </td>
                    </tr>
                    <tr>
                        <td>
                         状态
                         <select name="state" id="state">
                            <option value="">请选择车款</option>
                            <option value="12"  <? if ($state==12) { ?>selected<? } ?>>本站在售</option> 
                            <option value="11" <? if ($state==11) { ?>selected<? } ?>>汽车之家待上市车款</option>
                            <option value="10"  <? if ($state==10) { ?>selected<? } ?>>汽车之家已上市车款</option> 
                            
                          </select>
                         提交时间
			    <input type="text" name="start_time" id="start_time" class="datepicker"
                                   value="<? if ($start_time) { ?><? echo date('Y-m-d', $start_time); ?><? } ?>" size="10" readonly/>  -
                            <input type="text" name="end_time" id="end_time" class="datepicker"
                                   value="<? if ($end_time) { ?><? echo date('Y-m-d', $end_time); ?><? } ?>" size="10" readonly/>
                            <input type="hidden"  name="id" value="model" >
                            <input type="submit" name="search" value=" 搜 索 ">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <table class="table2" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th width="5%">编号</th>
                    <th width="15%">厂商指导价</th> 
                    <th width="10%">品牌名称</th>
                    <th width="15%">车系名称</th>   
                    <th width="15%">车款名称</th>
                    <th width="10%">抓取日期</th>
                    <th width="10%">操作</th>
                </tr>    

                <? foreach((array)$list as $key=>$value) {?>

                <tr>
                    <td><?=$value['id']?></td>
                    <td><?=$value['model_price']?></td>
                     <td><?=$value['brand_name']?></td>
                    <td><?=$value['series_name']?></td>   
                    <td><?=$value['model_name']?></td>
                    <td><? echo date("Y-m-d H:i:s", $value['add_time']) ?></td>
                    <td><? if ($value['state']==10) { ?><a href="index.php?action=seriesdata-filesmodellog_update&id=<?=$value['id']?>&state=<?=$value['state']?>">修改状态</a><? } elseif($value['state']==11) { ?>缺参数<? } else { ?>已改为本站在售<? } ?></td>
                </tr>
                <?}?>
            </table>
            <? if ($page_bar) { ?>
            <div>
                <div class="ep-pages">
                    <?=$page_bar?>
                </div>
            </div>
            <? } ?>
        </div>
        <div class="user_con2">
            <img src="<?=$admin_path?>images/conbt.gif" height="16" >
        </div>
    </div>
</div>
<script>
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
  
<? if ($brand_id) { ?>
  $('#brand_id option[value="<?=$brand_id?>"]').attr({selected:true});
    <? } ?>
 <? if ($factory_id) { ?>
  $('#factory_id option[value="<?=$factory_id?>"]').attr({selected:true});
    <? } ?>
    <? if ($series_id) { ?>
  $('#series_id option[value="<?=$series_id?>"]').attr({selected:true});
    <? } ?>
 <? if ($model_id) { ?>
  $('#model_id option[value="<?=$model_id?>"]').attr({selected:true});
  <? } ?>
  
  <? if ($keyword) { ?>
  $('#keyword').val('<?=$keyword?>');
  <? } ?>
  
  
});
</script>
<? include $this->gettpl('footer');?>