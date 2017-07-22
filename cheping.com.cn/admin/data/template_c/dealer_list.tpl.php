<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
<div class="nav">
    <ul id="nav">
        <li><a href="index.php?action=dealer-list" class="song">经销商列表</a></li>
        <li><a href="index.php?action=dealer-add">添加经销商</a></li>
        <li><a href="index.php?action=dealer-dealerapply">经销商加盟</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
        	<form id="search_form" name="search_form" method="post" action="index.php?action=dealer-list">
            <table class="table2" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
												经销商状态:
                        <select name="state" id="state">
                            <option value="0">全部</option>
                            <option value="1">无效</option>
                            <option value="2">有效</option>
                        </select>
						经销商类型:
						 <select name="src_id" id="src_id">
                            <option value="">全部</option>
                            <option value="1">汽车之家经销商</option>
                            <option value="0">非汽车之家经销商</option>
                        </select>
                      <select name="brand_id" id="brand_id">
                        <option value="">==请选择品牌==</option>
                        <? foreach((array)$brand as $k=>$v) {?>
                        <option value="<?=$v[brand_id]?>"><?=$v['letter']?> <?=$v['brand_name']?></option>
                        <?}?>
                      </select>    
                      <select name="factory_id" id="factory_id">
                        <option value="">==请选择厂商==</option>
                        <? foreach((array)$factory as $k=>$v) {?>
                        <option value="<?=$v[factory_id]?>"><?=$v['letter']?> <?=$v[factory_name]?></option>
                        <?}?>
                      </select>  
                      <select name="series_id" id="series_id">
                        <option value="">==请选择车系==</option>
                        <? foreach((array)$series as $k=>$v) {?>
                        <option value="<?=$v[series_id]?>"><?=$v['letter']?> <?=$v[series_name]?></option>
                        <?}?>
                      </select> 
                      <br>                        
                        省级：<select id="province_id" name="province" onchange='changeProvince(this.value)'>
                            <option value="0">==选择省级单位==</option>
                                <? foreach((array)$province as $list) {?>
                                    <option value="<?=$list['id']?>|<?=$list['name']?>"><?=$list['letter']?> <?=$list['name']?></option>
                                <? } ?>
                        </select>
                        地级：<select id="city_id" name="city" onchange="changeCity(this.value)">
                            <option value="0">==选择地级单位==</option>
                                <? foreach((array)$city as $list) {?>
                                    <option value="<?=$list['id']?>|<?=$list['name']?>"><?=$list['letter']?> <?=$list['name']?></option>
                                <? } ?>
                        </select>
                        县级：<select id="county_id" name="county">
                            <option value="0">==选择县级单位==</option>
                                <? foreach((array)$county as $list) {?>
                                    <option value="<?=$list['id']?>|<?=$list['name']?>"><?=$list['letter']?> <?=$list['name']?></option>
                                <? } ?>
                        </select><br/>
                        经销商名称：<input  id="dealer_name" name="dealer_name" type="text" size="50" value="<?=$data['dealer_name']?>"/>
                        <input id="search_btn" name="search_btn" type="submit" value="搜索" />
                    </td>
                </tr>
            </table>
            </form>
            <table class="table2" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;word-wrap: break-word;">
                <tr align="right"  class='th'>
										<td width="15%">经销商ID</td>
                    <td width="20%">经销商名称（汽车之家）</td>
                    <td width="20%">经销商名称（冰狗）</td>
                    <td width="30%">经销商地址</td>
                    <td width="15%">操作</td>
                </tr>
                <? foreach((array)$lists as $k=>$v) {?>
                <tr class='th'>
                    <td><?=$v['dealer_id']?></td>
                    <td><?=$v['dealer_name2']?></td>
                    <td><?=$v['dealer_name']?></td>
                    <td><?=$v['dealer_area']?></td>
                    <td>
                        <a href="index.php?action=dealer-edit&id=<?=$v['dealer_id']?>">
                            <img src="<?=$admin_path?>images/rewrite.gif" width="12" height="12" />修改</a>
                        <a href="index.php?action=dealerprice-add&dealer_id=<?=$v['dealer_id']?>">报价</a>
                        <br/>
                        <a class="click_pop_dialog" href="#" mt='1' icon='warnning' tourl="index.php?action=dealer-delete&id=<?=$v['dealer_id']?><?=$condition?>"><img src="<?=$admin_path?>images/del1.gif" width="9" height="9" />删除</a>
                        <? if ($v['state']==='0') { ?>
                        <a href="javascript:void(0);" class="chgco" did='<?=$v[dealer_id]?>' sid='2'><font color='red'>改为未合作</font></a>
                        <? } else { ?>
                        <a href="javascript:void(0);"class="chgco" did='<?=$v[dealer_id]?>' sid='0'><font color='green'>改为已合作</font></a>
                        <? } ?>
                    </td>
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
<script type="text/javascript">
    var brand_id = "<?=$brand_id?>";
    var factory_id = "<?=$factory_id?>";
    var series_id = "<?=$series_id?>";
    var province = "<?=$pid['id']?>|<?=$pid['name']?>";
    var city = "<?=$cid['id']?>|<?=$cid['name']?>";
    var county = "<?=$countyId['id']?>|<?=$countyId['name']?>";
    var state = '<?=$state?>';
    var src_id = '<?=$src_id?>';
    $('#state').val(state);
    $("#brand_id").val(brand_id);
    $("#factory_id").val(factory_id);
    $("#series_id").val(series_id);
    $("#province_id").val(province);
    $("#city_id").val(city);
    $("#county_id").val(county);
    $("#src_id").val(src_id);
    $(document).ready(function(){
      $('.click_pop_dialog').live('click', function(){
        pop_window($(this), {message:'您确定要删除该经销商吗？', pos:[200,150]});
      });  
      
      $('.chgco').live('click',function(){
          var change_str,change_color,change_sid;
          var linkobj = $(this);
          var dealer_id = $(this).attr('did');
          var state = $(this).attr('sid');
          var url='<?=$php_self?>changecooperate&id='+dealer_id+'&state='+state;
          if(state=='2'){
              change_str='改为已合作';
              change_sid=0;
              change_color='green';
          }else{
              change_str='改为未合作';
              change_sid=2;
              change_color='red';
          }
          if(confirm('您是否要更改经销商合作状态？')){
            $.getJSON(url, function(ret){
                if(ret){
                    alert('经销商已'+change_str);
                    linkobj.attr('sid',change_sid).html('<font color='+change_color+'>'+change_str+'</font>');
                }
            });
          }
      });
    });
    $('#brand_id').change(function(){
    var brand_id=$(this).val();
    var fact=$('#factory_id')[0];
    var facturl="?action=factory-json&brand_id="+brand_id;
    var sel=$(this)[0];
    $('#brand_name').val(sel.options[sel.selectedIndex].text)

    $.getJSON(facturl, function(ret){
      $('#factory_id option[value!=""]').remove();
      $('#series_id option[value!=""]').remove();

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
    function changeProvince(pid) {
      var option = '<option value="0">==请选择地级地区==</option>';
      $.getJSON("index.php?action=dealer-City&pid=" + pid, function(data) {
          for (var key in data) {
              option += '<option value="' + data[key]['id'] + '|' + data[key]['name'] + '">' + data[key]['letter'] +'&nbsp;'+ data[key]['name'] + '</option>' + "\n";
          }
          $('#city_id').html(option);
          $("#county_id").html('<option value="0">==请选择县级地区==</option>');
      });
    }
    function changeCity(cid) {
      var option = '<option value="0">==请选择县级地区==</option>';
      $.getJSON("index.php?action=dealer-County&cid=" + cid, function(data) {
          for (var key in data) {
              option += '<option value="' + data[key]['id'] + '|' + data[key]['name'] + '">' + data[key]['letter'] +'&nbsp;'+ data[key]['name'] + '</option>' + "\n";
          }
          $('#county_id').html(option);
      });
    }
</script>
    </body>
</html> 
