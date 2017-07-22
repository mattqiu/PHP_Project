<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
            <li><a href="index.php?action=grabyiche">抓取易车商城数据</a></li>
            <li><a href="index.php?action=grabyiche-yichetree">抓取易车产品数据</a></li>
            <li><a href="index.php?action=grabyiche-brand">易车品牌管理</a></li>
            <li><a href="index.php?action=grabyiche-factory">易车厂商管理</a></li>
            <li><a href="index.php?action=grabyiche-series" class="song">易车车系管理</a></li>
            <li><a href="index.php?action=grabyiche-model">易车车款管理</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
            <table class="table2" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;word-wrap: break-word;">
                <tr>
                    <td>
                        <form name="frm_factory" id="frm_factory" action="" method="post">
                        筛选
                        <select name="bid" id="bid" style="width:160px">
                            <option value="">请选择品牌</option>
                            <? foreach((array)$yc_brand as $k=>$v) {?>
                            <option value="<?=$v[yc_bid]?>"><?=$v[yc_brandname]?></option>
                            <?}?>
                        </select>
                        <select name="fid" id="fid" style="width:160px">
                            <option value="">请选择厂商</option>
                        </select>
                        <input type="button" name="btn_search" id="btn_search" value='开始搜索'>
                        </form>
                    </td>
                </tr>
            </table>
            <table class="table2" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed;word-wrap: break-word;">
                <tr align="right" class='th'>
                    <td width="80" align="center">ID</td>
                    <td width="200" align="center">易车品牌厂商</td>
                    <td width="120" align="center">易车车系名称</td>
                    <td width="120" align="center">冰狗车系名称</td>
                    <td align="center">操作</td>
                </tr>
                <? foreach((array)$list as $k=>$v) {?>
                <tr>
                    <td><?=$v['id']?></td>
                    <td><?=$v['yc_brandname']?> <? if ($v['yc_brandname']<>$v['yc_factory_name']) { ?><?=$v['yc_factoryname']?><? } ?></td>
                    <td><?=$v['yc_seriesname']?></td>
                    <td><?=$v['series_name']?></td>
                    <td>
                        <a href='javascript:void(0);' yid='<?=$v[id]?>' class='edit'>修改</a>
                        删除
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
<div style="display: none;" id="bc_list">
    <select name='bc_factory' class='bc_factory' style="width: 200px">
        <option value="">请选择厂商</option>
        <? foreach((array)$bc_brand_fact as $k=>$v) {?>
        <option value='<?=$v[factory_id]?>'><?=$v[letter]?> > <?=$v[brand_name]?> <?=$v[factory_name]?></option>
        <?}?>
    </select>
    <select name="bc_series" class="bc_series">
        
    </select>
</div>
<script type="text/javascript">
$().ready(function(){
    $('a.edit').click(function(){
        var btn_txt = $(this).text();
        if(btn_txt=='修改'){
            var bc_list=$('#bc_list').html();
            $(this).text('确定').before(bc_list);
        }else{
            var series_id = $(this).prev('select').val();
            var yid = $(this).attr('yid');
            var url='<?=$php_self?>updateseries&yid='+yid+'&sid='+series_id;
            $.getJSON(url, function(ret){
                alert(ret['msg']);
                if(ret['code'] == 1){
                    location.reload();
                }
            })
        }
    });
    
    $('#bid').click(function(){
        var yc_bid=$(this).val();
        var yc_factory = $('#fid');
        var url="<?=$php_self?>getycfactory&bid="+yc_bid;
        if(yc_bid>1){
            $.getJSON(url, function(fact){
                yc_factory.children().remove();
                $.each(fact, function(i,v){
                    yc_factory.append('<option value='+v['yc_fid']+'>'+v['yc_factoryname']+'</option>');
                });
            });
        }
    });
    
    $('#btn_search').click(function(){
        var fid=$('#fid').val();
        $('#frm_factory').attr({
            action:'<?=$php_self?>series&fid='+fid
        });
        $('#frm_factory')[0].submit();
    });
    
    $('select.bc_factory').live('click', function(){
        var fid=$(this).val();
        var url="<?=$php_self?>getseries&fid="+fid;
        var series_sel=$(this).next();
        $.getJSON(url, function(series){
            series_sel.children().remove();
            $.each(series, function(i,v){
                series_sel.append('<option value='+v['series_id']+'>'+v['series_name']+'</option>');
            });
        });
    });
});
</script>
<? include $this->gettpl('footer');?>
