<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 

<style type="text/css">
html{overflow-x:auto;overflow-y: auto;}
</style>
<link rel="stylesheet" href="<?=$admin_path?>vendor/jcupload/css/jquery.jcuploadUI.css" />
<script type="text/javascript" src="<?=$admin_path?>vendor/jcupload/js/jquery.jcupload.js"></script>
<script type="text/javascript" src="<?=$admin_path?>vendor/jcupload/js/jquery.jcuploadUI.config.js"></script>
<script type="text/javascript" src="<?=$admin_path?>vendor/jcupload/js/jquery.jcuploadUI.js"></script>

<div class="user_wrap" style="width:800px">
  <div class="module_con" style="width:800px">
    <div class="module_con1" style="width:800px">
      <table cellpadding="0" cellspacing="0" class="table2">
        <!--tr><td colspan="7" class="td_left">
        <form action="<?=$php_self?>" method="post">
        品牌
        <select name="brand_id" id="brand_id">
          <option value="">请选择品牌</option>
          <? foreach((array)$brand_list as $bk=>$bv) {?>
          <option value="<?=$bv['brand_id']?>"><?=$bv['brand_name']?></option>
          <?}?>
        </select>
        厂商
        <select name="factory_id" id="factory_id">
          <option value="">请选择厂商</option>
          <? if ($series_id) { ?>
          <? foreach((array)$factory_list as $fk=>$fv) {?>
          <option value="<?=$fv['factory_id']?>"><?=$fv['factory_name']?></option>
          <?}?>
          <? } ?>
        </select>
        车系
        <select name="series_id" id="series_id">
          <option value="">请选择车系</option>
          <? if ($series_id) { ?>
          <? foreach((array)$series_list as $sk=>$sv) {?>
          <option value="<?=$sv['series_id']?>"><?=$sv['series_name']?></option>
          <?}?>
          <? } ?>
        </select>
        车系名称
        <input type="text" size="20" name="keyword" id="keyword" value="">
        <input type="submit" value="  搜 索  ">
        </form>
        </td></tr-->
        
        <tr align="right"  class='th'> 
          <th width="8%" height="20">编号</th>
          <th width="6%" height="20">推荐度</th>
          <th width="6%" height="20">是否超跑</th>
          <th width="20%" align="left">车款名称</th>
          <!--th nowrap>品牌</th-->
          <th width="15%" align="left">厂商</th>
          <th width="10%" align="left">车系</th>
          <th width="6%">属性</th>          
          <th width="31%">操作</th>
        </tr>
        
        <? foreach((array)$list as $k=>$v) {?>
        <tr align="right">
          <td height="20" align="center"><?=$v[model_id]?></td>
          <td height="20" align="center">
          <select class="chg_views" mid="<?=$v['model_id']?>" onchange="javascript:chg_views(<?=$v[model_id]?>,this.value);">
          <option value="">请选择</option>
          <option value="20" <? if ($v['views']==20) { ?>selected<? } ?>>1</option>
          <option value="40" <? if ($v['views']==40) { ?>selected<? } ?>>2</option>
          <option value="60" <? if ($v['views']==60) { ?>selected<? } ?>>3</option>
          <option value="80" <? if ($v['views']==80) { ?>selected<? } ?>>4</option>
          <option value="100" <? if ($v['views']==100) { ?>selected<? } ?>>5</option>
          </select>
          </td>
          <td>
          <select name="is_sportcar" class="is_sportcar" onchange="javascript:chg_sportcar(<?=$v[model_id]?>,this.value);">
            <option value="">请选择</option>
            <? if ($v[is_sportcar]==1) { ?>
            <option value="1" selected="selected">是</option>
            <option value="0">否</option>
            <? } else { ?>
            <option value="1">是</option>
            <option value="0" selected="selected">否</option>
            <? } ?>
          </select>
          </td>
          <td align="center">
          <a href="<?=$php_self?>edit&model_id=<?=$v[model_id]?>&fatherId=<?=$v[series_id]?>">
          <?=$v[model_name]?></a>
          
          <? if ($v['last_picid'] == $v['model_id']) { ?>
            <font color="green"><b>√</b></font>
          <? } ?>
          </td>
          <!--td><?=$v[brand_name]?>(<? echo getCardbState($v[bs]); ?>)</td-->
          <td><?=$v[factory_name]?>(<? echo getCardbState($v[fs]); ?>)</td>
          <td><?=$v[series_name]?>(<? echo getCardbState($v[ss]); ?>)</td>
          <td><? echo getCardbState($v[state]); ?></td>          
          <td align="left">
          <? if (!$v['paramtxt']) { ?>
          <a class="convtxt" 
          href="javascript:void(0);" 
          tourl="<?=$php_self?>convertst&model_id=<?=$v[model_id]?>">
          导入文本参数
          </a>
          <? } else { ?>
          <a href="javascript:void(0);"><font color="red">已导文本参数</font></a>
          <? } ?>
          
          <a href="#here" class="click_upload_dialog" mt='1' tourl="<?=$php_self?>del&model_id=<?=$v[model_id]?>&fatherId=<?=$v[series_id]?>" var="<?=$v[model_id]?>">上传</a>
          
          <? if ($v[union]) { ?>
          <a class="unionpic" href="javascript:void(0);" tourl="<?=$php_self?>reunionpic&model_id=<?=$v[model_id]?>&fatherId=<?=$v[series_id]?>">
          重新关联
          </a>
          <? } else { ?>
          <a class="unionpic" href="javascript:void(0);" tourl="<?=$php_self?>unionpic&model_id=<?=$v[model_id]?>&fatherId=<?=$v[series_id]?>">
          关联图片
          </a>
          <? } ?>
          <br />
          <a href="<?=$php_self?>edit&model_id=<?=$v[model_id]?>&fatherId=<?=$v[series_id]?>">
          <img src="<?=$admin_path?>images/rewrite.gif" width="12" height="12" />修改</a>&nbsp;&nbsp;
          <a href="#here" class="click_pop_dialog" mt='1' icon='warnning' tourl="<?=$php_self?>del&model_id=<?=$v[model_id]?>&fatherId=<?=$v[series_id]?>">
          <img src="<?=$admin_path?>images/del1.gif" width="9" height="9" />删除</a>
          </td>
        </tr>
        <?}?>
        
        <tr><td colspan="8" align="center" class="page_bar_css">
        <?=$page_bar?>
        </td></tr>

      </table>
    </div>
    
  </div>
</div>
<div id="mask" class="mask" style="display: none;"></div>
<div id="content" style="border:1px solid green;width:300px;display: none;">
    <em><a href="javascript:;">关闭</a></em>
</div>

<script type="text/javascript">
    
    $(document).ready(function() {
         var jcu;
        var conf= {
            flash_background:"<?=$admin_path?>vendor/jcupload/images/jcu_button.png",
            flash_file:"<?=$admin_path?>vendor/jcupload/js/jcupload.swf",
            file_icon_ready:'<?=$admin_path?>vendor/jcupload/images/jcu_file_ready.gif',
            file_icon_uploading:'<?=$admin_path?>vendor/jcupload/images/jcu_file_uploading.gif',
            file_icon_finished:'<?=$admin_path?>vendor/jcupload/images/jcu_file_finished.gif',
            hide_file_after_finish:false,
            max_file_size:1024*1024*1024,
            hide_file_after_finish_timeout:5,
            extensions:["Slikovne datoteke (*.zip)|*.zip"],
            box_height:100,
            url: "<?=$php_self?>jcupload",
            callback: {
                init: function() { },
                queue_upload_end: function() {
                    alert( "上传成功" );
                }
            }
        };

        $('.click_upload_dialog').live('click', function(){
            var dheight=$(document).height();
            conf.url="<?=$php_self?>jcupload&modelid="+$(this).attr('var');
            jcu= $.jcuploadUI(conf);
            jcu.append_to("#content");
            $("#mask").css({"height":dheight,"width":$(document).width()}).show();
            $("#content").show();

            //setTimeout("swfu.addPostParam('model_id', "+$(this).attr('var')+");",200); //动态修改SWFUpload初始化设置中的post_params属性，其中所有的值都将被覆盖。
        });
        $("#content em").click(function(){
            $(".jcu_container").remove();
            $("#mask").hide();
            $("#content").hide();
        });

    });
</script>
<script type="text/javascript">
$().ready(function(){
  $('.click_pop_dialog').live('click', function(){
    pop_window($(this), {message:'您确定要删除该车系吗？', pos:[200,150]});
  });
  
  $('#brand_id').change(function(){
    var brand_id=$(this).val();
    var fact=$('#factory_id')[0];
    var facturl="?action=factory-json&brand_id="+brand_id;
    if(!brand_id){
      $('#factory_id option[value!=""]').remove();
      $('#series_id option[value!=""]').remove();
    }else{
      $.getJSON(facturl, function(ret){
        $('#factory_id option[value!=""]').remove();
        $.each(ret, function(i,v){
          fact.options.add(new Option(v['factory_name'], v['factory_id']));
        });
      });
    }
  });
  
  //更新推荐度
  
  
  /*$('.chg_views').live('change', function(){
     var model_id = $(this).attr('mid');
     var views = $(this).val();
     var _url = "?action=model-changeviews&model_id="+model_id+"&views="+views;
     $.getJSON(_url, function(ret){
       if(ret == true){
         alert('车款推荐度更新成功！');
       }else{
         alert('车款推荐度更新失败！');
       }
     });
  });*/
  
  $('#factory_id').change(function(){
    var fact_id=$(this).val();
    var ser=$('#series_id')[0];
    var serurl="?action=series-json&factory_id="+fact_id;
    $.getJSON(serurl, function(ret){
      $('#series_id option[value!=""]').remove();
      $.each(ret, function(i,v){
        ser.options.add(new Option(v['series_name'], v['series_id']));
      });
    });
  });
  
  <? if ($keyword) { ?>
  $('#keyword').val("<?=$keyword?>");
  <? } ?>
  
  <? if ($series_id) { ?>
  $('#brand_id option[value="<?=$brand_id?>"]').attr({selected:true});
  $('#factory_id option[value="<?=$factory_id?>"]').attr({selected:true});
  $('#series_id option[value="<?=$series_id?>"]').attr({selected:true});
  <? } ?>
});

//function setParam(model_id){
//    $("#content").toggle();
//    swfu.addPostParam("model_id", model_id);
//}

function ajaxFileUpload(id)
{
  $("#loading")
  .ajaxStart(function(){
    $(this).show();
  })
  .ajaxComplete(function(){
    $(this).hide();
  });

  $.ajaxFileUpload
  (
    {
      url:'<?=$php_self?>uploadzip',
      secureuri:false,
      fileElementId:'fileToUpload',
      dataType: 'json',
      data:{name:'logan', id:'id', model_id:id},
      success: function (data, status)
      {
        alert(data.error)
        if(typeof(data.error) != 'undefined')
        {
          if(data.error != '1')
          {
            alert(data.error+':'+data.msg);
          }else
          {
            alert(data.msg);
          }
        }
      },
      error: function (data, status, e)
      {
        alert(e);
      }
    }
  )
  return false;
}

function chg_views(mid, val){
     var model_id = mid;
     var views = val;
     var _url = "?action=model-changeviews&model_id="+model_id+"&views="+views;
//     alert(_url);return;
     $.getJSON(_url, function(ret){
       if(ret == true){
         alert('车款推荐度更新成功！');
       }else{
         alert('车款推荐度更新失败！');
       }
     });
  }
  
  function chg_sportcar(mid, val){
    var model_id = mid;
    var is_sportcar = val;
    var _url = "?action=model-changesportcar&model_id="+model_id+"&sportcar="+is_sportcar;
    $.getJSON(_url, function(ret){
       if(ret == true){
         alert('超跑属性更新成功！');
       }else{
         alert('超跑属性更新失败！');
       }
    });
  }
</script>
<? include $this->gettpl('footer');?> 