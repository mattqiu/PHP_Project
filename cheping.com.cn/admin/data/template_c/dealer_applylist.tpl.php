<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
<div class="nav">
    <ul id="nav">
        <li><a href="index.php?action=dealer-list">经销商列表</a></li>
        <li><a href="index.php?action=dealer-add">添加经销商</a></li>
        <li><a href="index.php?action=dealer-dealerapply" class="song">经销商加盟</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
        	<form id="search_form" name="search_form" method="post" action="index.php?action=dealer-list">
            <table class="table2" border="0" cellpadding="0" cellspacing="0">
                <!--<tr>
                    <td>
                      <select name="brand_id" id="brand_id">
                        <option value="">==请选择品牌==</option>
                        <? foreach((array)$brand as $k=>$v) {?>
                        <option value="<?=$v[brand_id]?>"><?=$v[brand_name]?></option>
                        <?}?>
                      </select>    
                      <select name="factory_id" id="factory_id">
                        <option value="">==请选择厂商==</option>
                        <? foreach((array)$factory as $k=>$v) {?>
                        <option value="<?=$v[factory_id]?>"><?=$v[factory_name]?></option>
                        <?}?>
                      </select>  
                      <select name="series_id" id="series_id">
                        <option value="">==请选择车系==</option>
                        <? foreach((array)$series as $k=>$v) {?>
                        <option value="<?=$v[series_id]?>"><?=$v[series_name]?></option>
                        <?}?>
                      </select> 
                      <br>                        
                        省份：
                        <select id="province_id" name="province_id" onchange="changeProvince(this.value,$('city_id'));">
                            <option value="0">==选择省份==</option>
                            <option value="24">A 安徽</option>
                            <option value="29">A 澳门</option>
                            <option value="1">B 北京</option>
                            <option value="4">C 重庆</option>
                            <option value="33">F 福建</option>
                            <option value="12">G 甘肃</option>
                            <option value="30">G 广东</option>
                            <option value="31">G 广西</option>
                            <option value="19">G 贵州</option>
                            <option value="34">H 海南</option>
                            <option value="8">H 河北</option>
                            <option value="22">H 河南</option>
                            <option value="5">H 黑龙江</option>
                            <option value="21">H 湖北</option>
                            <option value="20">H 湖南</option>
                            <option value="7">J 吉林</option>
                            <option value="25">J 江苏</option>
                            <option value="32">J 江西</option>
                            <option value="41">J 九龙</option>
                            <option value="43">L 离岛</option>
                            <option value="6">L 辽宁</option>
                            <option value="9">N 内蒙</option>
                            <option value="13">N 宁夏</option>
                            <option value="150">Q 其它</option>
                            <option value="16">Q 青海</option>
                            <option value="23">S 山东</option>
                            <option value="11">S 山西</option>
                            <option value="10">S 陕西</option>
                            <option value="2">S 上海</option>
                            <option value="17">S 四川</option>
                            <option value="27">T 台湾北部</option>
                            <option value="146">T 台湾东部</option>
                            <option value="147">T 台湾离岛</option>
                            <option value="145">T 台湾南部</option>
                            <option value="144">T 台湾中部</option>
                            <option value="3">T 天津</option>
                            <option value="15">X 西藏</option>
                            <option value="28">X 香港岛</option>
                            <option value="14">X 新疆</option>
                            <option value="42">X 新界</option>
                            <option value="18">Y 云南</option>
                            <option value="26">Z 浙江</option>
                        </select>
                        城市：<select id="city_id" name="city_id"><option value="0">==选择城市==</option></select>
                        经销商名称：<input  id="dealer_name" name="dealer_name" type="text" size="10" value="<?=$data['dealer_name']?>"/>
                        <input id="search_btn" name="search_btn" type="submit" value="搜索" />
                    </td>
                </tr>-->
            </table>
            </form>
            <table class="table2" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;word-wrap: break-word;">
                <tr align="right"  class='th'>
                     <td width="5%">序号</td>
                    <td width="20%">经销商名称</td>
                    <td width="10%">地区</td>   
                    <td width="20%">主营品牌</td>                 
                    <td width="10%">姓名 </td>
                    <td width="15%">电话</td>
                    <td width="10%">提交时间</td>
                    <td width="10%">操作</td>
                </tr>
                <? foreach((array)$list as $k=>$v) {?>
                <tr class='th' <? if ($v['state']==0) { ?>style="color:red"<? } ?>>
                    <td><?=$v['id']?></td>
                    <td><?=$v['dealer_name']?></td>
                    <td><?=$v['province_name']?><?=$v['city_name']?></td>
                    <td><?=$v['main_brand']?></td>
                    <td><?=$v['name']?></td>
                    <td><?=$v['phone']?></td>
                    <td><? echo date("Y-m-d H:i:s", $v['created']) ?></td>
                    <td><a href="index.php?action=dealer-applydetail&id=<?=$v['id']?>">查看详细</a></td>
                </tr>
                <?}?>
                <tr class='page_bar_css'>
                    <td colspan="8">
                        <?=$page_bar?>
                    </td>
                </tr>
            </table>
            <div style="height:40px;"></div>
        </div>
        <div class="user_con2">
            <img src="<?=$admin_path?>images/conbt.gif" height="16" >
        </div>
    </div>
</div>
<script>
var pid = '<?=$data['province_id']?>';
var cid = '<?=$data['city_id']?>';
var bid = '<?=$data['brand_id']?>';
var fid = '<?=$data['factory_id']?>';
var sid = '<?=$data['series_id']?>';
$('#province_id option[value="' + pid + '"]').attr({selected:true});
$('#city_id option[value="' + cid + '"]').attr({selected:true});
$('#brand_id option[value="' + bid + '"]').attr({selected:true});
$('#factory_id option[value="' + fid + '"]').attr({selected:true});
$('#series_id option[value="' + sid + '"]').attr({selected:true});
$(document).ready(function(){
  $('.click_pop_dialog').live('click', function(){
    pop_window($(this), {message:'您确定要删除该经销商吗？', pos:[200,150]});
  });  
});
function changeProvince(pid) {
	var option = '<option value="0">==请选择城市==</option>';
    $.getJSON("index.php?action=dealer-city", {pid:pid}, function(json) {
    	for(var key in json) {
    		id = json[key]['id'];
    		name = json[key]['name'];
    		letter = json[key]['letter'];
    		option += '<option value="'+ id + '">' + letter + ' '+ name + '</option>' + "\n";    		    	
    	}
    	$('#city_id').html(option);
    });
}
  $('#brand_id').change(function(){
    var brand_id=$(this).val();
    var fact=$('#factory_id')[0];    
    var dealer = $('#dealer_id')[0];
    var province_id = $('#province_id').val();
    var city_id = $('#city_id').val();    
    var dealerUrl = "?action=dealerprice-getdealerbyid&brand_id=" + brand_id + '&province_id=' + province_id + '&city_id=' + city_id;    
    var facturl="?action=factory-json&brand_id="+brand_id;
    var sel=$(this)[0];
    $('#brand_name').val(sel.options[sel.selectedIndex].text)
    $.getJSON(dealerUrl, function(ret) {
      $('#dealer_id option[value!="0"]').remove();
      if(ret) {
          $.each(ret, function(i,v){
            dealer.options.add(new Option(v['dealer_name'], v['dealer_id']));
          });           
      }       
    });
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
    var factory_id = $('#factory_id').val();
    var dealer = $('#dealer_id')[0];
    var province_id = $('#province_id').val();
    var city_id = $('#city_id').val();    
    var dealerUrl = "?action=dealerprice-getdealerbyid&factory_id=" + factory_id + '&province_id=' + province_id + '&city_id=' + city_id;       
    $('#factory_name').val(sel.options[sel.selectedIndex].text)
    $.getJSON(dealerUrl, function(ret) {
      $('#dealer_id option[value!="0"]').remove();
      if(ret) {
          $.each(ret, function(i,v){
            dealer.options.add(new Option(v['dealer_name'], v['dealer_id']));
          });      
      }  
    });    
    $.getJSON(serurl, function(ret){
      $('#series_id option[value!=""]').remove();
      $('#model_id option[value!=""]').remove();
      
      $.each(ret, function(i,v){
        ser.options.add(new Option(v['series_name'], v['series_id']));
      });
    });
  });
</script>
    </body>
</html> 
