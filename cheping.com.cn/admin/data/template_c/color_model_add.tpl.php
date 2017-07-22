<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
  <script>
  $(function() {
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

    $( "#opener" ).click(function(e) {
        e.preventDefault();
      $( "#dialog" ).dialog( "open" );
    });
  });
  </script>
<div class="user_wrap">
<ul class="nav2">
    <li><a href="<?=$php_self?>colormodelindex&color_name=model">车款颜色列表</a></li>
    <li class="li1"><a href="#">新增车款颜色</a></li>
</ul>
<div class="clear"></div>
<div class="user_con">
<div class="user_con1">

<form action="<?=$php_self?>colormodeladd" method="post" enctype="multipart/form-data">
  <table class="table2" border="0" cellpadding="0" cellspacing="0">
      <tr>
          <td><button id="opener" style="text-align: center;">新增颜色</button></td>
          <td></td>
      </tr>

    <tr>
      <td width="20%">
      车系名称
      </td>
      <td class="td_left">
      <input type="text" size="35" name="name" id="name" value="<?=$model_name?>" readOnly="true">
      </td>
    </tr>

    <tr>
      <td>
      原有图片
      </td>
      <td class="td_left">
      <? foreach((array)$model_list as $key=>$value) {?>
          <img src="<?=$value['color_pic']?>" width="17" height="17" title="<?=$value['color_name']?>" style="vertical-align:middle;"/>
          <?=$value['color_name']?>
              <input type="button" value="删除" id="<?=$value['id']?>"  onclick="window.location.href='<?=$php_self?>colordel&id=<?=$value['id']?>'"/></br>
      <?}?>
      </td>
    </tr>

    <tr>
      <td>
      新增图片
      </td>
      <td class="td_left" id="color_img">

      </td>
    </tr>

    <tr>
      <td colspan="2" align="center">
      <input type="hidden" name="type_id" id="id" value="<?=$model_id?>">
      <input type="submit" name="adbtn" value=" 提 交 ">&nbsp;&nbsp;
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
            <? foreach((array)$color_list as $key=>$value) {?>
            <td>
                <img name="<?=$value['id']?>" src="<?=$value['pic']?>" width="17" height="17" title="<?=$value['name']?>" style="vertical-align:middle; cursor:pointer" onclick="insert_color(this.src,this.title,this.name)"/>
            </td>
            <?}?>
        </tr>
    </table>
</div>
  <script type="text/javascript">
            function insert_color(pic,title,color_id){
                if(document.getElementById(color_id)){
                    alert("此图片已添加");
                }else{
                    var color_div = document.createElement("div");
                    color_div.setAttribute('id',color_id);
                    document.getElementById("color_img").appendChild(color_div);
                    div_ob=document.getElementById(color_id);

                    var image = document.createElement("img");
                    image.setAttribute('src',pic);
                    image.setAttribute('title',title);
                    image.setAttribute('width','17');
                    image.setAttribute('height','17');
                    image.setAttribute('style','vertical-align:middle;');
                    document.getElementById(color_id).appendChild(image);

                    var newNode = document.createElement("input");
                    newNode.setAttribute('type','text');
                    newNode.setAttribute('name','color_name[]');
                    newNode.setAttribute('value',title);
                    document.getElementById(color_id).appendChild(newNode);

                    var newNode = document.createElement("input");
                    newNode.setAttribute('type','button');
                    newNode.setAttribute('value','删除');
                    newNode.setAttribute('onclick','del_color('+color_id+')');
                    document.getElementById(color_id).appendChild(newNode);

                    var newNode = document.createElement("input");
                    newNode.setAttribute('type','hidden');
                    newNode.setAttribute('name','color_pic[]');
                    newNode.setAttribute('value',pic);
                    document.getElementById(color_id).appendChild(newNode);

                    var br = document.createElement("br");
                    document.getElementById("color_img").appendChild(br);
                }
            }
            //删除刚刚添加的图片
            function del_color(id){
                div_ob=document.getElementById(id);
                div_ob.parentNode.removeChild(div_ob);
            }
  </script>
  <!--浮动层结束-->
<? include $this->gettpl('footer');?>
