<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user">
    <div class="nav">
        <ul>
            <? foreach((array)$state as $k=>$v) {?>
            <li><a href="<?=$php_self?>List&state=<?=$k?>" <? if ($k==$status) { ?>class="song"<? } ?>><?=$v?></a></li> 
            <?}?>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="user-con">
        <div class="user-table">
            <form action="" method="post" enctype="multipart/form-data">
                <table border="0" cellspacing="0" cellpadding="0">  
                    <tbody id="tobdy">
                        <? if ($list) { ?>
                    <input type="hidden" value="<? echo count($list) ?>" name="maxservice" id="maxservice">
                    <? foreach((array)$list as $kk=>$vv) {?>
                    <tr id="serviceTr<? echo $kk+1 ?>" name="serviceTr<? echo $kk+1 ?>">
                        <td>
                            <table name="serviceTab" id="serviceTab" style="text-align: left;">
                                <tbody>
                                    <tr>
                                        <td style="border-bottom: 0px;">名称 <input type="text" value="<?=$vv['title']?>" size="40" id="title" name="title[]" style=" width:120px; border:1px solid #cdcdcd;"></td>
                                        <td style="border-bottom: 0px;">关联车款
                                            <select onchange="chgBrand(<? echo $kk + 1 ?>)" id="brand_id<? echo $kk+1 ?>" name="brand_id[]">
                                                <option value="0">==请选择品牌==</option>
                                                <? foreach((array)$brand as $k=>$v) {?>
                                                <option value="<?=$v[brand_id]?>" <? if ($vv['brand_id']==$v[brand_id]) { ?>selected="selected"<? } ?>><?=$v[brand_name]?></option>
                                                <?}?>
                                            </select>   
                                            <select onchange="chgFactory(<? echo $kk + 1 ?>)" id="factory_id<? echo $kk+1 ?>" name="factory_id[]">
                                                <option value="0">==请选择厂商==</option>
                                                <? foreach((array)$vv['factory'] as $fk=>$fv) {?>
                                                <option value="<?=$fv['factory_id']?>" <? if ($vv['factory_id']==$fv['factory_id']) { ?>selected="selected"<? } ?>><?=$fv['factory_name']?></option>
                                                <?}?>
                                            </select>        
                                            <select onchange="chgSeries(<? echo $kk + 1 ?>)" id="series_id<? echo $kk+1 ?>" name="series_id[]">
                                                <option value="0">==请选择车系==</option>
                                                <? foreach((array)$vv['series'] as $sk=>$sv) {?>
                                                <option value="<?=$sv['series_id']?>" <? if ($vv['series_id']==$sv['series_id']) { ?>selected="selected"<? } ?>><?=$sv['series_name']?></option>
                                                <?}?>
                                            </select>
                                            <select onchange="chgModel(<? echo $kk + 1 ?>)" id="model_id<? echo $kk+1 ?>" name="model_id[]">
                                                <option value="0">==请选择车款==</option>
                                                <? foreach((array)$vv['models'] as $mk=>$mv) {?>
                                                <option value="<?=$mv['model_id']?>" <? if ($vv['model_id']==$mv['model_id']) { ?>selected="selected"<? } ?>><?=$mv['model_name']?></option>
                                                <?}?>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td><a href="<?=$php_self?>del&id=<?=$kk?>&state=<?=$status?>" class="shanchu">删除</a></td>
                    </tr>    
                    <?}?>
                    <? } else { ?>
                    <input type="hidden" value="1" name="maxservice" id="maxservice">
                    <tr id="serviceTr1" name="serviceTr1">
                        <td>
                            <table name="serviceTab" id="serviceTab">
                                <tbody><tr name="serviceTr1" id="serviceTr1">
                                        <td style="border-bottom: 0px;">名称 <input type="text" value="" size="40" id="title" name="title[]" style=" width:180px; border:1px solid #cdcdcd;"></td>
                                        <td style="border-bottom: 0px;">关联车款
                                            <select onchange="chgBrand(1)" id="brand_id1" name="brand_id[]">
                                                <option value="0">==请选择品牌==</option>
                                                <? foreach((array)$brand as $k=>$v) {?>
                                                <option value="<?=$v[brand_id]?>"><?=$v[brand_name]?></option>
                                                <?}?>
                                            </select>   
                                            <select onchange="chgFactory(1)" id="factory_id1" name="factory_id[]">
                                                <option value="0">==请选择厂商==</option>
                                            </select>        
                                            <select onchange="chgSeries(1)" id="series_id1" name="series_id[]">
                                                <option value="0">==请选择车系==</option>
                                            </select>
                                            <select onchange="chgModel(1)" id="model_id1" name="model_id[]">
                                                <option value="0">==请选择车款==</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <!--                            <td><a href="javascript:delService(1);">删除</a></td>-->
                    </tr>
                    <? } ?>

                    </tbody>

                </table>
                <div style="padding:6px 0px; width:98%; border-bottom: 1px solid #ccc; margin:0 auto;">
                    <span style="float: left;"><a href="javascript:apendService();" class="zengcar" style='text-decoration: none'><input type='button' value='增加'></a></span>

                    <input type="submit" class="sbt"style=" padding:0px 4px;  color:#333;font-family:'微软雅黑';  " value="提交数据"/>
                </div>
            </form>
        </div>
        <div>
            <div class="ep-pages">
                <?=$page_bar?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
            function chgBrand(num) {
            var brand_id = $('#brand_id' + num).val();
                    var fact = $('#factory_id' + num)[0];
                    var facturl = "?action=factory-json&brand_id=" + brand_id;
                    $.getJSON(facturl, function (ret) {
                    $('#factory_id' + num + ' option[value!="0"]').remove();
                            $('#series_id' + num + ' option[value!="0"]').remove();
                            $.each(ret, function (i, v) {
                            fact.options.add(new Option(v['factory_name'], v['factory_id']));
                            });
                    });
            }

    function chgFactory(num) {
    var fact_id = $('#factory_id' + num).val();
            var ser = $('#series_id' + num)[0];
            var serurl = "?action=series-json&state=3&factory_id=" + fact_id;
            $.getJSON(serurl, function (ret) {
            $('#series_id' + num + ' option[value!="0"]').remove();
                    $('#model_id' + num + ' option[value!="0"]').remove();
                    $.each(ret, function (i, v) {
                    ser.options.add(new Option(v['series_name'], v['series_id']));
                    });
            });
    }

    function chgSeries(num) {
    //$('#series_name' + num).val($('#series_id' + num + '>option:selected').text());
    var series_id = $('#series_id' + num).val();
            var model = $('#model_id' + num)[0];
            var modurl = "?action=model-json&state=3&sid=" + series_id;
            $.getJSON(modurl, function (ret) {
            $('#model_id' + num + ' option[value!="0"]').remove();
                    $.each(ret, function (i, v) {
                    model.options.add(new Option(v['model_name'], v['model_id']));
                    });
            });
    }
    function chgModel(num) {
    $('#model_name' + num).val($('#model_id' + num + '>option:selected').text());
    }
    function apendService() {
    maxService = parseInt($('#maxservice').val()) + 1;
            html = '<tr id="serviceTr' + maxService + '" name="serviceTr' + maxService + '"><td><table name="serviceTab" id="serviceTab"><tbody><tr name="serviceTr1" id="serviceTr1"><td>名称<input type="text" value="" size="40" id="title' + maxService + '" name="title[]" style=" width:350px; border:1px solid #cdcdcd;"></td><td>关联车款<select onchange="chgBrand(' + maxService + ')" id="brand_id' + maxService + '" name="brand_id[]"><option value="0">==请选择品牌==</option><? foreach((array)$brand as $k=>$v) {?><option value="<?=$v[brand_id]?>"><?=$v[brand_name]?></option><?}?></select><select onchange="chgFactory(' + maxService + ')" id="factory_id' + maxService + '" name="factory_id[]"><option value="0">==请选择厂商==</option></select><select onchange="chgSeries(' + maxService + ')" id="series_id' + maxService + '" name="series_id[]"><option value="0">==请选择车系==</option></select><select onchange="chgModel(' + maxService + ')" id="model_id' + maxService + '" name="model_id[]"><option value="0">==请选择车款==</option></select></td></tr></tbody></table></td><td><a href="javascript:deltagService(' + maxService + ')">删除</a></td></tr>';
            $('#tobdy').append(html);
            $('#maxservice').val(maxService);
    }
    function deltagService(num) {
    $('#serviceTr' + num).remove();
    }
      $(function(){
           
               $(".shanchu").click(function(){
                  $(this).parent("td").parent('tr').empty();
                   
               })
               
          
          
          
      })
</script>  
</body>
</html>
