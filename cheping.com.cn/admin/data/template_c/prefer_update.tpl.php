<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li><a href="javascript:viod(0);" class="song"><?=$title_name?></a></li>
        <li><a href="<?=$php_self?>preferlist">返回</a></li>
        
    </ul>
</div>
<div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
            <form name="add_user" method="post" id="submit_prefer">
                <table cellpadding="0" cellspacing="0" class="table2" border="0">
                    <? if ($list) { ?>
                     <tr> 
                        <td width="33%" height="20" align='right'> 车款id：</td>
                        <td class="td_left"><input type="text" name="model_id" size="20" <? if ($list) { ?> readonly value="<?=$list['model_id']?>"<? } ?> </td>
                    </tr>
                    <tr> 
                        <td width="33%" height="20" align='right'> 厂商名称：</td>
                        <td class="td_left"><input type="text" name="factory_name" size="20" <? if ($list) { ?> readonly value="<?=$list['factory_name']?>"<? } ?> </td>
                    </tr>
                    <tr> 
                        <td width="33%" height="20" align='right'> 车系名称：</td>
                        <td class="td_left"><input type="text" name="series_name" size="20" <? if ($list) { ?> readonly value="<?=$list['series_name']?>"<? } ?> </td>
                    </tr>

                    <tr> 
                        <td width="33%" height="20" align="right">车款名称：</td>
                        <td class="td_left"><input type="text" name="model_name"  size="20" <? if ($list) { ?> readonly value="<?=$list['model_name']?>" <? } ?>></td>
                    </tr>
                    <tr> 
                        <td width="33%" height="20"  align="right"> 厂商指导价（单位：万元）：</td>
                        <td class="td_left">
                           <input type="text" name="model_price" size="20" <? if ($list) { ?> readonly  value="<?=$list['model_price']?>"<? } ?>>
                        </td>
                    </tr>
                    <? } ?>
                    <tr> 
                        <td width="33%" height="20"  align=right> <font style="color:red">*</font>奖励金额（单位：元）：</td>
                        <td class="td_left">
                           <input type="text" id="car_prize" name="car_prize" size="20" <? if ($list) { ?> value="<?=$list['car_prize']?>" <? } ?>>
                        </td>
                    </tr>
                    <tr> 
                        <td width="33%" height="20"  align=right> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:red">*</font> 有效期：</td>
                        <td class="td_left">
                         
                        <input type="text" name="start_date" id="start_date" class="datepicker"
                                   value="<? if ($list) { ?><? echo date('Y-m-d', $list['start_date']); ?><? } else { ?><? echo date('Y-m-d'); ?><? } ?>" size="10"/>至
                          <input type="text" name="end_date" id="end_date" class="datepicker"
                                   value="<? if ($list) { ?><? echo date('Y-m-d', $list['end_date']); ?><? } else { ?><? echo date('Y-m-d'); ?><? } ?>" size="10"/>
                        </td>
                    </tr>
                    
                    <tr> 
                        <td width="33%" height="20"  align=right>&nbsp;&nbsp;&nbsp;&nbsp; <font style="color:red">*</font> 关联本网站数据：</td>
                        <td class="td_left">
                            <select name="brand_id" id="brand_id">
                            <option value="">请选择品牌</option>
                            <? foreach((array)$brand as $k=>$v) {?>
                            <option value="<?=$v[brand_id]?>" <? if ($v[brand_id]==$modellist['brand_id']) { ?>selected<? } ?>><?=$v[brand_name]?></option>
                            <?}?>
                          </select>
                          <select name="factory_id" id="factory_id">
                            <option value="">请选择厂商</option>
                            <? foreach((array)$factory as $k=>$v) {?>
                            <option value="<?=$v[factory_id]?>" <? if ($v[factory_id]==$modellist['factory_id']) { ?>selected<? } ?>><?=$v[factory_name]?></option>
                            <?}?>
                          </select>
                          <select name="series_id" id="series_id">
                            <option value="">请选择车系</option>
                            <? foreach((array)$series as $k=>$v) {?>
                            <option value="<?=$v[series_id]?>" <? if ($v[series_id]==$modellist['series_id']) { ?>selected<? } ?>><?=$v[series_name]?></option>
                            <?}?>
                          </select>
                          <select name="model_id" id="model_id" style="width:160px">
                            <option value="">请选择车款</option>
                            <? foreach((array)$model as $k=>$v) {?>
                            <option value="<?=$v[model_id]?>" <? if ($v[model_id]==$list['model_id']) { ?>selected<? } ?>><?=$v[model_name]?></option>
                            <?}?>
                          </select>
                        </td>
                    </tr>
                   <tr> 
                        <td height="20" colspan="2" align=right> <font style="color:red">注意：关联数据要选择到车款方才有效</font></td>
                        
                    </tr>
                    <tr> 
                        <td height="20" colspan="2"  align=right >
                            
                            <input type="submit" id="submit_but" value="保存" name="add">&nbsp;&nbsp;&nbsp;&nbsp;
                            <? if ($list) { ?>
                                <input type="hidden" name="id" value="<?=$list['id']?>">
                                <input type="hidden" name="url" value="<?=$url?>">
                                <? } else { ?>
                                <input type="reset" value="重置" >
                             <? } ?>
                        </td>

                    </tr>
                </table>
            </form>
      
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

$("#submit_prefer").submit(function(){
   var car_prize = $("#car_prize").val();
   var modelid = $("#model_id").val();
   var start = $("#start_date").val();
   var end = $("#end_date").val();
   if(car_prize==''||modelid==''||start==''||end==''){
       alert("有必填项没有填写，请认真检查之后在提交");
       return false;
   }
   
})
</script>
</body>
</html>