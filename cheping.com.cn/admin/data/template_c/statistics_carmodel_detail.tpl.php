<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li><a href="<?=$php_self?>carmodel" class="song"><?=$page_title?></a></li>
        <li><a href="javascript:history.back(-1);">返回</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
             <form action="<?=$php_self?>carmodeldetail" method="post" name="form2">
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
                       
                            <input type="hidden" name="state" value="<?=$state?>">
                             <input type="submit" name="search" value=" 搜 索 ">
                         </td>
                    </tr>
                    
                    </tbody>
                </table>
            </form>
            <? if ($data) { ?>
            <table class="table2" border="0" cellpadding="0" cellspacing="0">
                <tr style="color:red;">
                    <th colspan="4" style="text-align: left;line-height:26px;"><h3>共有<? echo count($data) ?>条</h3></th>
                </tr>
                <tr align="right"  class='th'>
                    <td height="10" nowrap>ID</td>
                    <td height="10" nowrap>车系ID</td>
                    <td width="15%" >品牌名称</td>
                    <td width="20%" >车系名称</td>
                    <td height="25%" nowrap>车款配置</td>
                    <td width="10%" >操作</td>

                </tr>
                <? foreach((array)$data as $k=>$v) {?>
                <tr align="right"  class='th'>
                    <td height="10" nowrap><?=$v["id"]?></td>
                    <td height="10" nowrap><?=$v["series_id"]?></td>
                    <td width="15%" ><?=$v["brand_name"]?></td>
                    <td width="20%" ><?=$v["series_name"]?></td>
                    <td height="25%" nowrap><?=$v['date_id']?>款 <?=$v['st27']?>升<?=$v['st41']?><?=$v['st28']?> <?=$v['st48']?></td>
                    <td height="10%" nowrap><a href="index.php?action=realdata-edithtml&&type=<? if ($state>0&&$state<9) { ?>3<? } elseif($state>8&&$state<15) { ?>2<? } elseif($state>14&&$state<23) { ?>4<? } else { ?>5<? } ?>&id=<?=$v[id]?>&date_id=<?=$v[date_id]?>&series_id=<?=$v[series_id]?>">修改</a></th>

                </tr>
                <?}?>
               
            </table>
            <? if ($page_bar) { ?>
            <div class="ep-pages">
                <?=$page_bar?>
            </div>
            <? } ?>
            <? } ?>
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

  $('#series_id').change(function(){
    var sel=$(this)[0];
    $('#series_name').val(sel.options[sel.selectedIndex].text)

    var sid=$(this).val();
    var mod=$('#model_id')[0];
    var modurl="?action=model-json&sid="+sid;
    $.getJSON(modurl, function(ret){
      $('#model_id option[value!=""]').remove();
      $.each(ret, function(i,v){
        mod.options.add(new Option(v['model_name'], v['model_id']));
      });
    });
  });

  $('#model_id').change(function(){
    var mod=$(this)[0];
    $('#model_name').val(mod.options[mod.selectedIndex].text)
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
  
  
});

</script>
<? include $this->gettpl('footer');?>