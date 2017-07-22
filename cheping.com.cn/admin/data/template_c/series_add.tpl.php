<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user_wrap" style="width:800px">
  <div class="module_con" style="width:800px">
    <div class="module_con1" style="width:800px">
    <form name="frm_series" id="frm_series" action="" method="post" enctype="multipart/form-data">
      <table cellpadding="0" cellspacing="0" class="table2">
          
          <tr> 
            <td width="80" height="20" align="right">所属级别:</td>
            <td class="td_left">
            <? if ($factory) { ?>
            <?=$factory['brand_name']?> -&gt; <?=$factory['factory_name']?>
            <? } else { ?>
            <select name="brand_id" id="brand_id">
              <option value="">请选择品牌</option>
              <? foreach((array)$brand as $k=>$v) {?>
              <option value="<?=$v[brand_id]?>"><?=$v[brand_name]?></option>
              <?}?>
            </select>
            <select name="factory_id" id="factory_id">
              <option value="">请选择厂商</option>
              <? foreach((array)$factory as $k=>$v) {?>
              <option value="<?=$v[factory_id]?>"><?=$v[factory_name]?></option>
              <?}?>
            </select>
            <input type="hidden" name="brand_name" id="brand_name" value=""> 
            <input type="hidden" name="factory_name" id="factory_name" value=""> 
            <? } ?>
            
            </td>
          </tr>
          
          <tr> 
            <td width="80" height="20" align="right">车系名称:</td>
            <td class="td_left">
            <input type="text" name="series_name" id="series_name" size="20" value="<?=$series['series_name']?>">
            </td>
          </tr>
          <tr> 
            <td width="80" height="20" align="right">简&nbsp;&nbsp;&nbsp;&nbsp;称:</td>
            <td class="td_left">
            <input type="text" name="series_alias" id="series_alias" size="20" value="<?=$series['series_alias']?>">
            </td>
          </tr>
          <tr> 
            <td width="80" height="20" align="right">是否上市:</td>
            <td class="td_left">
            <? if ($series['state'] == 11 || $series['state'] == 10) { ?>
            <label for="saled">已上市</label><input type="radio" value="1" name="saled" id="saled">
            <label for="unsale">未上市</label><input type="radio" checked="checked" value="0" name="saled" id="unsale">
            <span id="sale_date_div">
              上市时间:<input type="text" name="sale_date" id="sale_date" value="<?=$series['sale_date']?>">
              <font color="red">如上市时间未知，请填“无”</font>
            </span>
            <? } else { ?>
            <label for="saled">已上市</label><input type="radio" checked="checked" value="1" name="saled" id="saled">
            <label for="unsale">未上市</label><input type="radio" value="0" name="saled" id="unsale">
            <span id="sale_date_div" style="display: none;">
              上市时间:<input type="text" name="sale_date" id="sale_date" value="">
              <font color="red">如上市时间未知，请填“<b>无</b>”</font>
            </span>
            <? } ?>
            </td>
          </tr>
          <tr> 
            <td height="20" align="right">车系拼音:</td>
            <td class="td_left">
              全拼<input type="text" name="full_pinyin" id="full_pinyin" size="20" value="<?=$series['full_pinyin']?>">
              缩写<input type="text" name="short_pinyin" id="short_pinyin" size="10" value="<?=$series['short_pinyin']?>">
            </td>
          </tr> 
          <tr> 
            <td width="100" height="20" align="right"><span style="color:red;">*</span> 竞争车系:<a href="javascript:apendService();">(增加)</a></td>
           <? if ($compete_arr) { ?>
          
            <td class="td_left"> <? $n_totil = count($compete_arr) ?> <input type="hidden" id="maxservice" name="maxservice" value="<?=$n_totil?>"/>
               
            <table id="serviceTab" name="serviceTab">
                  <? foreach((array)$compete_arr as $key=>$value) {?>
                 <? $num =$key+1; ?>
                <tr id="serviceTr<?=$num?>" name="serviceTr<?=$num?>">
                    <td>
                      <input type="hidden" id="service_id[]" name="service_id[]" value="<?=$num?>"/>
                      <select name="brand_id<?=$num?>" id="brand_id<?=$num?>" onchange="chgBrand(<?=$num?>)">
                        <option value="0">==请选择品牌==</option>
                        <? foreach((array)$brand as $k=>$v) {?>
                        <option value="<?=$v[brand_id]?>" <? if ($v[brand_id]==$value[0][brand_id]) { ?>selected<? } ?>><?=$v[brand_name]?></option>
                        <?}?>
                      </select>   
                      <select name="factory_id<?=$num?>" id="factory_id<?=$num?>" onchange="chgFactory(<?=$num?>)">
                           <option value="">==请选择厂商==</option>
                          <? foreach((array)$value['brand'] as $k=>$v) {?>
                          <option value="<?=$v[factory_id]?>" <? if ($v[factory_id]==$value[0][factory_id]) { ?>selected<? } ?>><?=$v[factory_name]?></option>
                         <?}?>
                      </select>    
                      <select name="series_id<?=$num?>" id="series_id<?=$num?>" onchange="selectAllSeries(<?=$num?>, this.value);">
                           <option value="">==请选择车系==</option>
                            <? foreach((array)$value['factory'] as $k=>$v) {?>
                            <option value="<?=$v[series_id]?>" <? if ($v[series_id]==$value[0][series_id]) { ?>selected<? } ?>><?=$v[series_name]?></option>
                            <?}?>              
                      </select>             
                      <a href="javascript:delService(<?=$num?>);">删除</a>                                              
                    </td>
                </tr>
                <?}?>
            </table>
                  
            </td>
           
            <? } else { ?>
             <td class="td_left"><input type="hidden" id="maxservice" name="maxservice" value="1"/>
            <table id="serviceTab" name="serviceTab">
                <tr id="serviceTr1" name="serviceTr1">
                    <td>
                      <input type="hidden" id="service_id[]" name="service_id[]" value="1"/>
                      <select name="brand_id1" id="brand_id1" onchange="chgBrand(1)">
                        <option value="0">==请选择品牌==</option>
                        <? foreach((array)$brand as $k=>$v) {?>
                        <option value="<?=$v[brand_id]?>"><?=$v[brand_name]?></option>
                        <?}?>
                      </select>   
                      <select name="factory_id1" id="factory_id1" onchange="chgFactory(1)">
                        <option value="0">==请选择厂商==</option>
                        
                      </select>    
                      <select name="series_id1" id="series_id1" onchange="selectAllSeries(1, this.value);">
                        <option value="0">==请选择车系==</option>
                                         
                      </select>             
                      <a href="javascript:delService(1);">删除</a>                                              
                    </td>
                </tr>
            </table>
            </td>
            <? } ?>
           

          </tr> 
        <tr> 
            <td width="100" height="20" align="right" > 添加竞争车款：</td>
               <td class="td_left"><input type="hidden" id="maxservice" name="maxservice" value="1" />
                   <input type="button" value="添加本车系全部车款的竞争车款" onclick="Addcomplate(<?=$series['series_id']?>)">   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <span id="addcompetemodel"></span>
               </td>

	 </tr>
	<tr> 
            <td width="100" height="20" align="right" > 查看本车系车款的竞争车款：</td>
               <td class="td_left"><input type="hidden" id="maxservice" name="maxservice" value="1" />
		  <select name="series_nameslist" id="series_idlist" onchange="chgSeries(this.value)">
                      <option value="0">==请选择车款==</option>
			<? foreach((array)$chkModel as $k=>$v) {?>
			    <option value="<?=$v[model_id]?>"><?=$v[model_name]?></option>
			<?}?>
		  </select>
		<!--<textarea name="keyword" cols="70" rows="5" id="complotekeyword"></textarea>-->
								
	    <ul  id="complotekeyword" ></ul></td>

	 </tr>
					

          <tr> 
            <td height="20" align="right" nowrap>官网链接：</td>
            <td class="td_left"><input type="text" id="offical_url" name="offical_url" size="50" value="<?=$series['offical_url']?>"></td>
          </tr>
          <tr> 
            <td height="20" align="right" nowrap>关键字：</td>
            <td class="td_left">
              <textarea name="keyword" cols="70" rows="5" id="keyword"><?=$series['keyword']?></textarea>
            </td>
          </tr>
          <tr> 
            <td height="20" align="right" nowrap>车系卖点：</td>
            <td class="td_left">
              <textarea name="sale_value" cols="70" rows="3" id="sale_value"><?=$series['sale_value']?></textarea>
            </td>
          </tr>
          <tr> 
            <td height="20" align="right" nowrap>车系级别：</td>
            <td class="td_left">
              <select name="type_id" id="type_id">
                <option value="0">请选择级别</option>
                <? foreach((array)$cartype as $k=>$v) {?>
                <option value="<?=$v['type_id']?>"><?=$v['type_name']?></option>
                <?}?>
              </select>
            </td>
          </tr>
          <tr> 
            <td height="20" align="right" nowrap>车系图片标签：</td>
            <td class="td_left">
              <input type="text" name="series_img_alt" id="series_img_alt" value="<? if ($series['series_img_alt']) { ?><?=$series['series_img_alt']?><? } else { ?><?=$series['series_name']?><? } ?>">
            </td>
          </tr>            
          <tr> 
            <td height="20" align="right" nowrap>车系图片：</td>
            <td class="td_left">
              <input type="file" name="series_pic" id="series_pic">
              <? if ($series['series_pic']) { ?>
              <a href="<?=$php_self?>pic&series_id=<?=$series['series_id']?>" name="车系图片" class="jTip" id="vpic">查看图片</a>
              <? } ?>
            </td>
          </tr>        
          <tr> 
            <td height="20" align="right" nowrap>车系图片2：</td>
            <td class="td_left">
              <input type="file" name="series_pic2" id="series_pic2">
              <? if ($series['series_pic2']) { ?>
              <a href="<?=$php_self?>pic&type=1&series_id=<?=$series['series_id']?>" name="车系图片" class="jTip" id="vpic">查看图片</a>
              <? } ?>
            </td>
          </tr>
          
          <tr> 
            <td height="20" align="right" nowrap>车系展示：</td>
            <td class="td_left">
              <textarea cols="70" rows="10" name="series_memo" id="series_memo"><?=$series['series_memo']?></textarea>
            </td>
          </tr>
          
          <? if ($series['series_id']) { ?>
          <tr> 
            <td height="20" align="right" nowrap>厂商补贴：</td>
            <td class="td_left">
              <textarea name="allowance" cols="70" rows="5"><?=$series['allowance']?></textarea><br>
              <font color="red">* 注意</font>：如果有链接请写成这种格式 <xmp><a href="http://www.bingo.cn/admin/">查看</a></xmp>
            </td>
           
          </tr>
          <!--//设置车系默认实拍图-->
          <tr><td colspan="2" class="td_left"><b>设置车系默认实拍图</b></td></tr>
          <tr> 
            <td height="20" align="right" nowrap>选择车款：</td>
            <td class="td_left">
              <select name="last_picid" id="last_picid">
                <option value="0">请选择</option>
                <? foreach((array)$pic_model as $pm) {?>
                <option value="<?=$pm['model_id']?>"<? if ($series['last_picid']==$pm['model_id']) { ?> selected<? } ?>><?=$pm['model_name']?></option>
                <? } ?>
              </select>
            </td>
          </tr>
          <!--//设置车系默认实拍图-->
          <? } ?>
          
          <!--//设置车系默认车款-->
          <tr><td colspan="2" class="td_left"><b>设置车系默认车款</b></td></tr>
          <tr> 
            <td height="20" align="right" nowrap>选择车款：</td>
            <td class="td_left">
              <select name="default_model" id="default_model">
                <option value="0">请选择</option>
                <? foreach((array)$default_model as $dm) {?>
                <option value="<?=$dm['model_id']?>"<? if ($series['default_model']==$dm['model_id']) { ?> selected<? } ?>><?=$dm['model_name']?></option>
                <? } ?>
              </select>
            </td>
          </tr>
          <!--//设置车系默认车款-->
          
          <? if ($series['series_id']) { ?>
          <!--//上传外观图-->
          <tr><td colspan="2" class="td_left"><b>上传车系外观图（白底图）</b></td></tr>
          <tr>
            <td colspan="2" class="td_left">
              白底图标签：&nbsp;&nbsp;&nbsp;<input type="text" id="white_img_alt" name="white_img_alt" value="<? if ($series['white_img_alt']) { ?><?=$series['white_img_alt']?><? } else { ?><?=$series['series_name']?><? } ?>"/>
            </td>
          </tr>
          
          <? foreach((array)$style as $v) {?>
          <tr> 
            <td height="20" align="right" nowrap><?=$v['date_id']?>款 <?=$v['st4']?> <?=$v['st21']?>门：</td>
            <td class="td_left">
              <input type="file" name="style_pic_<?=$v['id']?>" id="style_pic_<?=$v['id']?>">
              <? if ($v['crpic']) { ?>
              <a href="<?=$php_self?>dcrpic&cr=<?=$v['crpic']?>" name="车系图片" class="jTip" id="pic_<?=$v['id']?>">查看图片</a>
              <? } ?>
            </td>
          </tr>
          <? } ?>

			<tr><td colspan="2" class="td_left"><b>上传车系外观图（背景图）</b></td></tr>
      <tr>
        <td colspan="2" class="td_left">
          背景图标签：&nbsp;&nbsp;&nbsp;<input type="text" id="background_img_alt" name="background_img_alt" value="<? if ($series['background_img_alt']) { ?><?=$series['background_img_alt']?><? } else { ?><?=$series['series_name']?><? } ?>"/>
        </td>
      </tr>        
          <? foreach((array)$stylepic as $v) {?>
          <tr> 
            <td height="20" align="right" nowrap><?=$v['date_id']?>款 <?=$v['st4']?> <?=$v['st21']?>门：</td>
            <td class="td_left">
              <input type="file" name="stylepic_<?=$v['id']?>">
              <? if ($v['crpic']) { ?>
              <a href="<?=$php_self?>dcrpic&cr=<?=$v['crpic']?>" name="车系图片" class="jTip" id="pic_<?=$v['id']?>">查看图片</a>
              <a href="javascript:void(0);" class="reunion" styleid="<?=$v['id']?>">[将此图重新关联到车款]</a>
              <? } ?>
            </td>
          </tr>
          <? } ?>
          
          <!--//上传外观图-->
          <tr><td colspan="2" class="td_left"><b>车系参数区间</b></td></tr>
          <tr> 
            <td height="20" align="right" nowrap>车系排量：</td>
            <td class="td_left">
              <input type="text" name="s1" id="s1" value="<?=$series['s1']?>">
              <? if ($series) { ?>
              <input type="button" name="btn_pl" id="btn_pl" value="获取车系排量">
              <? } ?>
              例如：<font color="red"><b>1.4,2.0</b></font>，中间使用半角“,” 
            </td>
          </tr>
		<tr> 
            <td height="20" align="right" nowrap>车身结构：</td>
            <td class="td_left">
              <input type="text" name="s3" id="s3" value="<?=$series['s3']?>">
              <? if ($series) { ?>
              <input type="button" id="btn_jg" value="获取车身结构">
              <? } ?>
              例如：<font color="red"><b>两厢车,三厢车</b></font>，中间使用半角“,” 
            </td>
          </tr>
          <tr> 
            <td height="20" align="right" nowrap>车系变速箱：</td>
            <td class="td_left">
              <input type="text" name="s2" id="s2" value="<?=$series['s2']?>">
              <? if ($series) { ?>
              <input type="button" name="btn_bsx" id="btn_bsx" value="获取车系变速箱">
              <? } ?>
              例如：<font color="red"><b>6档手动,5档自动</b></font>，中间使用半角“,” 
            </td>
          </tr>
          
          <tr> 
            <td height="20" align="right" nowrap>价格区间：</td>
            <td class="td_left">
              <input type="text" name="price_range" id="price_range" value="<?=$series['price_low']?>-<?=$series['price_high']?>">万元
              <? if ($series) { ?>
              <input type="button" name="btn_pr" id="btn_pr" value="获取车款价格区间">
              <? } ?>
              例如：<font color="red"><b>12.6-22.8</b></font>，中间使用半角“-” 
            </td>
          </tr>
          <tr> 
            <td height="20" align="right" nowrap>车系地址：</td>
            <td class="td_left">
              链接：<input type="text" name="surl" id="surl" size="40">
              <input type="button" name="attention" id="attention" value="更新关注度">
            </td>
          </tr>          
          <tr> 
            <td height="20" align="right" nowrap>抓取数据：</td>
            <td class="td_left">
            <input type="text" name="seriesColorurl" id="seriesColorurl" size="40" value="">
            <input type="button" name="btn_color" id="btn_color" value="获取车款颜色名称"><br>
              <input type="text" name="seriesurl" id="seriesurl" size="40" value="">
              <input type="button" name="btn_data" id="btn_data" value="获取车款数据">
              <br>
              *车款参数列表页链接如：<font color="red">http://www.autohome.com.cn/777/<font color="blue">options</font>.html </font><br>
              *蓝色的"<font color="blue">options</font>"一定要有
            </td>
          </tr>
          <? } ?>
          <tr align="center"> 
            <td height="20" colspan="2">&nbsp; 
            <input type="hidden" name="series_id" value="<?=$series['series_id']?>"> 
            <input type="hidden" name="fatherId" value="<?=$fatherId?>"> 
            <input type="submit" value="保存数据" name="toconfirm" class='submit'>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="提交审核" name="toconfirm" class='submit'>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="关闭" name="cancel" class='submit' onclick="javascript:history.go('-1');window.close();">
            &nbsp;&nbsp;&nbsp;
            </td>
          </tr>        
      </table>
      </form>
    </div>
    
  </div>
</div>
<script charset="utf-8" src="<?=$relative_dir?>vendor/editor/kindeditor.js"></script>
<script type="text/javascript">
var editor;
KindEditor.ready(function(K){
    editor = K.create('#series_memo',{
        urlType : 'domain',
        allowUpload : true,
        items : [
              'undo', 'redo','cut', 'copy', 'paste','plainpaste', 'wordpaste', '|','fontname', 'fontsize', '|', 
              'textcolor', 'bgcolor', 'bold', 'italic', 'underline','removeformat', '|', 'justifyleft', 
              'justifycenter', 'justifyright','advtable', 'hr','image', 'link']
    });
});

</script>

<script type="text/javascript">
    
    function Addcomplate(i){
        var facturl="?action=series-AddCompleModel&series_id="+i;
        $.getJSON(facturl, function(ret){

            if(ret == 'ok'){
                 $("#addcompetemodel").html("全部竞争车款已添加完成")
            }else{
                 $("#addcompetemodel").html('只有'+ret+"个竞争车款已添加完成")
            }	

        })
					
    }
    function chgSeries(i){
        //alert(i);
        var facturl="?action=series-CompleModel&model_id="+i;
         $.getJSON(facturl, function(ret){
        var html ="";
        $.each(ret,function(i,v){
               html +="<li>" + v['brand_name'] +'&nbsp;'+ v['factory_name'] +'&nbsp;'+ v['series_name'] +'&nbsp;' + v['model_name']+"</li>";
           }) 
        $("#complotekeyword").html(html);
    });
				
		}
    function chgBrand(num) {
        var brand_id=$('#brand_id' + num).val();
        var fact=$('#factory_id' + num)[0];
        var facturl="?action=factory-json&brand_id="+brand_id;

        $.getJSON(facturl, function(ret){
          $('#factory_id' + num + ' option[value!="0"]').remove();
          $('#series_id' + num + ' option[value!="0"]').remove();

          $.each(ret, function(i,v){
            fact.options.add(new Option(v['factory_name'], v['factory_id']));
          });
        });
    }

    function chgFactory(num) {
        var fact_id = $('#factory_id' + num).val();
        var ser=$('#series_id' + num)[0];
        var serurl="?action=series-json&factory_id="+fact_id;
        $.getJSON(serurl, function(ret){
          $('#series_id' + num + ' option[value!="0"]').remove();
          $('#model_id' + num + ' option[value!="0"]').remove();
          ser.options.add(new Option('==全选==', 'all'));
          $.each(ret, function(i,v){
            ser.options.add(new Option(v['series_name'], v['series_id']));
          });
        });    
    }  
  
  function addService(service_id) {
        var brand_id = $('#brand_id' + service_id).val();
        var factory_id = $('#factory_id' + service_id).val();    
        var obj = $("select[name^='series_id']");    
        for(var key in obj) {
            alert(obj[key].val());
        }
        return false;
        $("select[name^='series_id']").each(function(i, v) {
            alert(v);
        });        
        return false;
        if(factory_id == 0) {
            alert('请选择厂商!');
            return false;
        }
        else {
            var series_url = '?action=series-json&factory_id=' + factory_id;        
            $.getJSON(series_url, function(json) {
                $("select[name*='series_id']").val();
            });
        }
    }
function delService(id) {
    $('#serviceTr' + id).remove();
    $.get('index.php?action=dealer-delservice', {id:id});
}
function apendService() {
    maxService = parseInt($('#maxservice').val()) + 1;
    html = '<tr id="serviceTr' + maxService + '" name="serviceTr' + maxService + '"><td><input type="hidden" id="service_id[]" name="service_id[]" value="' + maxService + '"/><select name="brand_id' + maxService + '" id="brand_id' + maxService + '" onchange="chgBrand(' + maxService + ')"><option value="0">==请选择品牌==</option><? foreach((array)$brand as $k=>$v) {?><option value="<?=$v[brand_id]?>"><?=$v[brand_name]?></option><?}?></select>' + "\n" + '<select name="factory_id' + maxService + '" id="factory_id' + maxService + '" onchange="chgFactory(' + maxService + ')"><option value="0">==请选择厂商==</option></select>' + "\n" + '<select onchange="selectAllSeries(' + maxService + ', this.value);" name="series_id' + maxService + '" id="series_id' + maxService + '"><option value="0">==请选择车系==</option></select>' + "\n" + '<a href="javascript:delService(' + maxService + ')">删除</a></td></tr>';
    $('#serviceTab').append(html);    
    $('#maxservice').val(maxService);
}  
function selectAllSeries(servid, value) {
    if(value == 'all') {
        var maxService = parseInt($('#maxservice').val());
        var bid = $('#brand_id' + servid).val();
        var fid = $('#factory_id' + servid).val();        
        var brand_option = $('#brand_id' + maxService).html();
        var factory_option = $('#factory_id' + maxService).html();
        $('#series_id' + maxService + ' option[value="all"]').remove();
        var series_option = $('#series_id' + maxService).html();                
        $.each($('#series_id' + maxService + ' option'), function(i, v) {                
            var optionValue = this.value;
            if(optionValue > 0 && optionValue != 'all') {
                id = maxService + i;
                html = '<tr id="serviceTr' + id + '" name="serviceTr' + id + '"><td><input type="hidden" id="service_id[]" name="service_id[]" value="' + id + '"/><select name="brand_id' + id + '" id="brand_id' + id + '" onchange="chgBrand(' + id + ')">' + brand_option + '</select>' + "\n" + '<select name="factory_id' + id + '" id="factory_id' + id + '" onchange="chgFactory(' + id + ')">' + factory_option + '</select>' + "\n" + '<select name="series_id' + id + '" id="series_id' + id + '" onchange="selectAllSeries(' + id + ', this.value);">' + series_option + '</select>' + "\n" + '<a href="javascript:delService(' + id + ')">删除</a></td></tr>';            
                $('#serviceTab').append(html);
                $('#maxservice').val(id);
                $('#brand_id' + id + ' option[value="' + bid + '"]').attr({selected:true});            
                $('#factory_id' + id + ' option[value="' + fid + '"]').attr({selected:true});            
                $('#series_id' + id + ' option[value="' + optionValue + '"]').attr({selected:true});
            }            
        });  
        $('#serviceTr' + maxService).remove();                    
    }         
}
$().ready(function(){
    $('#c_brand_id').change(function(){
    var brand_id=$(this).val();
    var fact=$('#c_factory_id')[0];
    var facturl="?action=factory-json&brand_id="+brand_id;
    var sel=$(this)[0];
    
    $.getJSON(facturl, function(ret){
      $('#c_factory_id option[value!=""]').remove();
      $('#c_series_id option[value!=""]').remove();
      $('#c_model_id option[value!=""]').remove();
      
      $.each(ret, function(i,v){
        fact.options.add(new Option(v['factory_name'], v['factory_id']));
      });
    });
  });
  
  $('a.reunion').click(function(){
      var style_id = $(this).attr('styleid');
      var url="<?=$php_self?>reunionpic&sid=<?=$series['series_id']?>&type=1&styleid="+style_id;
      $.getJSON(url, function(ret){
          if(ret['status']==1){
              alert('更新车系图成功');
          }else{
              var err='';
              $.each(ret['err'], function(i,v){
                  err+=v+"\n";
              })
              alert(err);
          }
      })
  })
  $('#c_factory_id').change(function(){
    var fact_id=$(this).val();
    var ser=$('#c_series_id')[0];
    var serurl="?action=series-json&factory_id="+fact_id;
    var sel=$(this)[0];
    
    $.getJSON(serurl, function(ret){
      $('#c_series_id option[value!=""]').remove();
      $('#c_model_id option[value!=""]').remove();
      
      $.each(ret, function(i,v){
        ser.options.add(new Option(v['series_name'], v['series_id']));
      });
    });
  });
  
  $('#c_series_id').change(function(){
    var compete_id = $.trim($('#compete_id').val());
    if(compete_id != ""){
      $('#compete_id').val(compete_id+','+$(this).val());
    }else{
      $('#compete_id').val($(this).val());
    }
  });
  
    
   $('#attention').click(function() {       
       surl = $('#surl').val();      
       if(surl == '') {
           alert('请输入车系连接');
           return false;
       }
       sname = '<?=$series['series_name']?>';
       $.get('<?=$php_self?>seriesattention', {surl:surl,sname:sname}, function(ret) {
           if(ret == 1) alert('更新成功！');
           else if(ret == 2) alert('部分车款不存在或名称不匹配，请检查该车系车款情况！');
           else alert('更新失败，请检查网络跟目标地址车系关注度情况！');
       });
   });
  $.ajax({timeout:300000,cache: false});
  
  $('#brand_id').change(function(){
    var brand_id=$(this).val();
    var fact=$('#factory_id')[0];
    var facturl="?action=factory-json&brand_id="+brand_id;
    var sel=$(this)[0];
    $('#brand_name').val(sel.options[sel.selectedIndex].text)
    
    $.getJSON(facturl, function(ret){
      $('#factory_id option[value!=""]').remove();
      $.each(ret, function(i,v){
        fact.options.add(new Option(v['factory_name'], v['factory_id']));
      });
    });
  });
  
  $('#factory_id').change(function(){
    var sel=$(this)[0];
    $('#factory_name').val(sel.options[sel.selectedIndex].text)
  });
  
  $('#btn_pr').click(function(){
    var id='<?=$series['series_id']?>';
    $.getJSON("<?=$php_self?>rpricerange&series_id="+id, function(ret){
      if(ret['min_price'] && ret['max_price']){
        $('#price_range').val(ret['min_price']+'-'+ret['max_price']);
      }else if(ret['min_price']){
        $('#price_range').val(ret['min_price']);
      }else if(ret['max_price']){
        $('#price_range').val(ret['max_price']);
      }
    });
  });
  
  $('#btn_pl').click(function(){
    var id='<?=$series['series_id']?>';
    $.getJSON("<?=$php_self?>rparam&series_id="+id+'&st=27', function(ret){
      if($.isArray(ret) && typeof ret != 'undefined')
      $('#s1').val(ret.join(','));
    });
  });

  $('#btn_jg').click(function(){
    var id='<?=$series['series_id']?>';
    $.getJSON("<?=$php_self?>rparam&series_id="+id+'&st=4', function(ret){
      if($.isArray(ret) && typeof ret != 'undefined')
      $('#s3').val(ret.join(','));
    });
  });
  
  $('#btn_bsx').click(function(){
    var id='<?=$series['series_id']?>';
    $.getJSON("<?=$php_self?>rparam&series_id="+id+'&st=2', function(ret){
      if($.isArray(ret) && typeof ret != 'undefined')
      $('#s2').val(ret.join(','));
    });
  });

  $('#btn_color').click(function(){
	  if(!$('#seriesColorurl').val()){
	      alert('请填写要抓取的链接地址！');
	      return false;
	    }
	    var url="<?=$php_self?>seriesColor";
	    var data = {series_id:'<?=$series['series_id']?>',url:$('#seriesColorurl').val(),type_id:$('#type_id').val()};
	    $.post(url, data, function(ret){
                var msg = "";
		$.each(ret,function(s,vs){
			msg +=vs+'\n';
		})
		alert(msg);
	},'json');
});
  $('#btn_data').click(function(){
    if(!$('#seriesurl').val()){
      alert('请填写要抓取的链接地址！');
      return false;
    }
    var url="<?=$php_self?>catchdata";
    var data = {series_id:'<?=$series['series_id']?>',url:$('#seriesurl').val(),type_id:$('#type_id').val()};
    $.post(url, data, function(ret){
      var str = '';
      if(typeof(ret) == 'object'){
        if(ret[0]['state'] == 0) {
          str+='抓取失败：请检查，‘品牌->车系’数据是否一致！\n';
          str+='源网站：'+ret[0]['src_brand_name']+'->'+ret[0]['src_series_name']+"\n";
          str+='本网站：'+ret[0]['brand_name']+'->'+ret[0]['series_name']+"\n";
          alert(str);
        }else{
          $.each(ret,function(i,v){
            if(i==0){
              str+='源网站：'+v['src_brand_name']+'->'+v['src_series_name']+"\n";
              str+='本网站：'+v['brand_name']+'->'+v['series_name']+"\n";
              str+="\n车款列表：\n";
            }else{
              if(v['exist'] == 1){
                str+='车款：'+v['model_name']+",已经存在\n";
              }else{
                str+='车款：'+v['model_name']+",导入"+"成功"+"\n";
              }
            }
          });
          alert(str);
        }
      }else{
        alert('数据抓取失败！');
      }
    }, 'json');
  });
  
  <? if ($series['type_id']) { ?>
    $('#type_id option[value="<?=$series['type_id']?>"]').attr({selected:true});
  <? } ?>
  
  $('#unsale').click(function(){
    if($(this).attr('checked')){
      $('#sale_date_div').show();
    }
  });
  $('#saled').click(function(){
    if($(this).attr('checked')){
      $('#sale_date_div').hide();
    }
  });
  
  $('#frm_series').submit(function(){
    if($('#unsale').attr('checked')
    && $.trim($('#sale_date').val()) == ''
    ){
      alert('请输入上市时间！');
      $('#sale_date').focus();
      return false;
    }
  })
  
});  
</script>
<? include $this->gettpl('footer');?> 