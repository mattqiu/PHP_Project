<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li><a href="<?=$php_self?>"  class="song">限时抢购</a></li>
        <li><a href="<?=$php_self?>limitcar">限量抢购</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
            <form name="hotcar_from" id="hotcar_from" action="" method="post" enctype="multipart/form-data">
                <table cellpadding="0" cellspacing="0" class="table2" border="0">

                    <? for($i=1;$i<=$pic_num;$i++) { ?>
                    <? $fvarid = "factory_" . ($i-1);$svarid = "series_" . ($i-1);$mvarid = "model_" . ($i-1); $factory = $$fvarid; $series = $$svarid; $models = $$mvarid; ?>

                    <tr>
                        <td class="td_left blue" width="15%">
                            是否可点：
                        </td>
                        <td class="td_left">
                            <select id="flag_<?=$i?>" name="flag_<?=$i?>">
                                <option value="0">按钮可点</option>
                                <option value="1">按钮不可点</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left blue" width="15%">
                            开始时间：
                        </td>
                        <td class="td_left">
                            <input class="startdate" type="text" name="startdate_<?=$i?>" id="startdate_<?=$i?>" value="<? echo date('Y-m-d',$hotcarseries[$i-1]['starttime']); ?>"> 日 <input size="10" type="text" name="hour_<?=$i?>" id="hour_<?=$i?>" value="<? echo date('H',$hotcarseries[$i-1]['starttime']); ?>"> 时
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left blue" width="15%">
                            过期时间：
                        </td>
                        <td class="td_left">
                            <input class="enddate" type="text" name="enddate_<?=$i?>" id="enddate_<?=$i?>" value="<? echo $hotcarseries[$i-1]['enddate']; ?>">(小时后过期)
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left blue" width="15%">
                            广告语<?=$i?>：
                        </td>
                        <td class="td_left">
                            <input type="text" name="title_<?=$i?>" id="title_<?=$i?>" value="<? echo $hotcarseries[$i-1]['title']; ?>" size="50">
                            <font color="red">不大于20个汉字</font>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left blue" width="15%">车款 <?=$i?>：</td>
                        <td class="td_left">
                            <select name="brand_id_<?=$i?>" id="brand_id_<?=$i?>" seq="<?=$i?>" class="brand_select">
                                <option value="">请选择</option>
                                <? foreach((array)$brand as $k=>$v) {?>
                                <option value="<?=$v[brand_id]?>"><?=$v[letter]?> <?=$v[brand_name]?></option>
                                <?}?>
                            </select>
                            <select name="factory_id_<?=$i?>" id="factory_id_<?=$i?>" seq="<?=$i?>" class="series_select">
                                <option value="">请选择</option>
                                <? foreach((array)$factory as $k=>$v) {?>
                                <option value="<?=$v[factory_id]?>"><?=$v[factory_name]?></option>
                                <?}?>
                            </select>
                            <select name="series_id_<?=$i?>" id="series_id_<?=$i?>" seq="<?=$i?>" class="model_select">
                                <option value="">请选择</option>
                                <? foreach((array)$series as $k=>$v) {?>
                                <option value="<?=$v[series_id]?>"><?=$v[series_name]?></option>
                                <?}?>
                            </select>
                            <select name="model_id_<?=$i?>" id="model_id_<?=$i?>" seq="<?=$i?>">
                                <option value="">请选择</option>
                                <? foreach((array)$models as $k=>$v) {?>
                                <option value="<?=$v[model_id]?>"><?=$v[model_name]?></option>
                                <?}?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left blue" width="15%">车款图片 <?=$i?>：</td>
                        <td class="td_left">
                            <input type="file" name="pic_<?=$i?>" id="pic_<?=$i?>">
                            <input type="hidden" name="old_pic_<?=$i?>" value="<?=$hotcarseries[$i-1]['pic']?>">
                            <? if ($hotcarseries[$i-1]['pic']) { ?>
                            <a href="index.php?action=static-imgcode&code=<? echo base64_encode('images/' . $hotcarseries[$i-1]['pic']); ?>" name="图片" class="jTip" id="vpic">查看图片</a>
                            <? } ?>
                        </td>
                    </tr>
                    <tr><td colspan="2" height="1"></td></tr>

                    <? } ?>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value=" 提&nbsp;&nbsp;交 ">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" value=" 重&nbsp;&nbsp;填 ">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".brand_select").change(function(){
            var brand_id=$(this).val();
            var seq = $(this).attr('seq');
            var fact=$('#factory_id_'+seq)[0];
            var facturl="?action=factory-json&brand_id="+brand_id;

            $.getJSON(facturl, function(ret){
                $('#factory_id_'+seq+' option[value!=""]').remove();
                $('#series_id_'+seq+' option[value!=""]').remove();
                $('#model_id_'+seq+' option[value!=""]').remove();

                $.each(ret, function(i,v){
                    fact.options.add(new Option(v['factory_name'], v['factory_id']));
                });
            });
        });

        $('.series_select').change(function(){
            var fact_id=$(this).val();
            var seq = $(this).attr('seq');
            setSeriesByFctory(fact_id, 'series_id_'+seq);
        });

        $('.model_select').change(function(){
            var series_id=$(this).val();
            var seq = $(this).attr('seq');
            setModelBySeries(series_id, 'model_id_'+seq);
        });

        $('#hotcar_from').submit(function(){
            if($('#brand_id_1').val() && !$('#series_id_1').val()){
                alert('请选择车系 1！');
                return false;
            }
            if($('#brand_id_2').val() && !$('#series_id_2').val()){
                alert('请选择车系 2！');
                return false;
            }
        });

        <? foreach((array)$hotcarseries as $k=>$v) {?>
        $('#flag_<? echo $k+1; ?>').val("<?=$v['flag']?>");
        $('#brand_id_<? echo $k+1; ?>').val("<?=$v['model']['brand_id']?>");
        $('#factory_id_<? echo $k+1; ?>').val("<?=$v['model']['factory_id']?>");
        $('#series_id_<? echo $k+1; ?>').val("<?=$v['model']['series_id']?>");
        $('#model_id_<? echo $k+1; ?>').val("<?=$v['model']['model_id']?>");
        <?}?>

        $(".startdate").datepicker();
        $('.startdate').datepicker("option", "minDate", "+d");

    });
</script>

<? include $this->gettpl('footer');?>