<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
  <script>
  $(function(){
    $( "button" ).click(function(e) {
      //e.preventDefault();
      $('#div_id').val($(this).parent().attr('id'));
      $( "#dialog" ).dialog('open');
    });

    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 50
      },
      hide: {
        effect: "explode",
        duration: 50
      }
  });
  });
  </script>
<div class="user_wrap">
<ul class="nav2">
    <li><a href="<?=$php_self?>colormodelindex&color_name=model">车款颜色列表</a></li>
    <li class="li1"><a href="#">修改车款颜色</a></li>
</ul>
<div class="clear"></div>
<div class="user_con">
<div class="user_con1">

<form action="<?=$php_self?>colormodeledit" method="POST" enctype="multipart/form-data">
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
      <td width="20%">
      车款名称
      </td>
      <td class="td_left">
      <input type="text" size="20" name="name" id="name" value="<?=$model_name?>" readOnly="true">
      </td>
    </tr>

    <tr>
      <td>
      原有图片
      </td>
      <td class="td_left">
      <? foreach((array)$model_list as $key=>$value) {?>
      <div id="<?=$value['id']?>">
          <img src="<?=$value['color_pic']?>" width="17" height="17" title="<?=$value['color_name']?>" style="vertical-align:middle;"/>
          <input type="text" value="<?=$value['color_name']?>" name="color_name[]"/>
          <button type="button" class="opener">替换颜色</button>
          <input type="hidden" value="<?=$value['id']?>" name="id[]"/>
          <input type="hidden" value="<?=$value['color_pic']?>" name="old_pic[]"/>
          <input type="hidden" value="" name="new_pic[]"/>
          </br>
      </div>
      <?}?>
      </td>
    </tr>

    <tr>
      <td colspan="2" align="center">
      <input type="hidden" name="type_id" id="id" value="<?=$model_id?>">
      <input type="submit" name="adbtn" value=" 提 交 ">&nbsp;&nbsp;
      <input type="reset" name="rebtn" value=" 重 填 ">
      </td>
    </tr>

  </table>
</form>
</div>
</div>
</div>
  <!--浮动层开始-->
  <div id="dialog" title="颜色表">
    <table>
        <tr>
            <input type="hidden" name="div_id" id="div_id" />
            <? foreach((array)$color_list as $key=>$value) {?>
            <td>
                <img name="<?=$value['id']?>" src="<?=$value['pic']?>" width="17" height="17" title="<?=$value['name']?>"
                     style="vertical-align:middle; cursor:pointer" onclick="insert_color(this.src,this.title,this.name)" border="1"/>
            </td>
            <?}?>
        </tr>
    </table>
</div>
  <script type="text/javascript">
            function insert_color(pic,title,color_id){
                var div_id = $('#div_id').val();
                $('div#'+div_id+' input[name="new_pic[]"]').val(pic);
                $('div#'+div_id+' input[name="new_pic[]"] + img').remove();
                $('div#'+div_id+' input[name="new_pic[]"]').after("<img src="+pic+" width='17' height='17' />");

            }
  </script>
    <!--浮动层结束-->
<? include $this->gettpl('footer');?>
