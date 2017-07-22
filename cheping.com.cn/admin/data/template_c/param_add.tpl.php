<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user_wrap">
<ul class="nav2">
  <li><a href="<?=$php_self?>">参数列表</a></li>
  <li class="li1"><a href="<?=$php_self?>add">添加添加</a></li>
</ul>
    <div class="clear"></div>
<div class="user_con">
<div class="user_con1">
  <form action="" method="post">
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="20%">
      参数分类
      </td>
      <td class="td_left">
      <? foreach((array)$pcategory as $pk=>$pv) {?>
      <select name="pcategory<?=$pv['id']?>" id="pcategory<?=$pv['id']?>" seq="<?=$pv['id']?>">
        <option value="">请选择<?=$pv['name']?></option>
        <? foreach((array)$pv['category'] as $ck=>$cv) {?>
        <option value="<?=$cv['id']?>"><?=$cv['name']?></option>
        <?}?>
      </select>
      <?}?>
      </td>
    </tr>
    
    <tr>
      <td>
      参数名称
      </td>
      <td class="td_left">
      <input type="text" size="20" name="name" id="name" value="<?=$subcate['name']?>">
      </td>
    </tr>
    <tr>
      <td>
      参数别名
      </td>
      <td class="td_left">
      <input type="text" size="20" name="alias1" id="alias1" value="<?=$subcate['alias1']?>">
      </td>
    </tr>
    
    <tr>
      <td>
      数据类型
      </td>
      <td class="td_left">
      <select name="data_type" id="data_type">
        <option value="">请先把数据类型</option>
        <? foreach((array)$data_type as $dk=>$dv) {?>
        <option value="<?=$dk?>"><?=$dv['memo']?></option>
        <?}?>
      </select>
      </td>
    </tr>
    
    <tr>
      <td>
      数据值
      </td>
      <td class="td_left">
      <input type="text" name="data_value" id="data_value" size="60" value="<?=$subcate['data_value']?>">
      </td>
    </tr>
    <tr><td colspan="2"><font color=red>注：文本和数字可以不填数据值项；下拉菜单以及条件的多个元素用英文分号";"分隔；双下拉菜单之间用双竖线"||"分隔</font></td></tr>
    
    <!--//对应父分类排序-->
    <? foreach((array)$category_list as $pk=>$pv) {?>
    <tr style="display: none;" id="order<?=$pk?>">
      <td>
      <?=$pv?>排序
      </td>
      <td class="td_left">
      <input type="text" size="4" name="type_order<?=$pk?>" id="type_order<?=$pk?>" value="<? echo $subcate['type_order'.$pk]; ?>">
      </td>
    </tr>
    <?}?>
    
    <tr>
      <td>
      是否隐藏
      </td>
      <td class="td_left">
      <select name="is_hidden" id="is_hidden">
        <option value="0">否</option>
        <option value="1">是</option>        
      </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="hidden" name="id" value="<?=$subcate['id']?>">
      <input type="hidden" name="qs" value="<?=$qs?>">
      <input type="hidden" name="page" value="<?=$page?>">
      <input type="submit" name="adbtn" value=" 提 交 ">&nbsp;&nbsp;
      <input type="reset" name="rebtn" value=" 重 填 ">
      </td>
    </tr>
  </table>
  </form>
</div>

</div>
</div>
<script type="text/javascript">
$().ready(function(){
  $('select[name^="pcategory"]').change(function(){
    var seq = $(this).attr('seq');
    var val = $(this).val();
    var txt = $('option:selected', $(this)).text();
    
    if(val>0){
      $('#order'+seq).show();
    }else{
      $('#order'+seq).hide();
    }
    $('#type_order'+seq).val(1);
  });
  
  <? if ($subcate['pid1']) { ?>
    $('#order1').show();
  <? } ?>
  <? if ($subcate['pid2']) { ?>
    $('#order2').show();
  <? } ?>    
  <? if ($subcate['pid3']) { ?>
    $('#order3').show();
  <? } ?>
    
  <? if ($subcategory_id) { ?>
  $('#category option[value="<?=$category_id?>"]').attr({selected:true});
  $('#subcategory option[value="<?=$subcategory_id?>"]').attr({selected:true});
  <? } ?>
  
  <? if ($keyword) { ?>
  $('#keyword').val('<?=$keyword?>');
  <? } ?>
  
  <? if ($subcate) { ?>
  $('#data_type option[value="<?=$subcate['data_type']?>"]').attr({selected:true});
  $('#is_hidden option[value="<?=$subcate['is_hidden']?>"]').attr({selected:true});
  
  <? foreach((array)$pcategory as $pk=>$pv) {?>
    <? if ($pv['pvalue']) { ?>
  $('#pcategory<?=$pv['id']?> option[value="<?=$pv['pvalue']?>"]').attr({selected:true});
    <? } ?>
  <?}?>
  <? } ?>
});

</script>
<? include $this->gettpl('footer');?>