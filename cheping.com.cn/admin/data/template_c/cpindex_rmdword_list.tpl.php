<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user">
<div class="nav">
    <ul id="nav">
        <li><a href="<?=$php_self?>rmdSeriesList">模块信息预览</a></li>
        <li class="li2"><a href="javascript:void(0);" class="song">模块推荐词操作</a></li>
        <li><a href="<?=$php_self?>rmdArticleList">文字信息预览</a></li>
        <li><a href="<?=$php_self?>hotcarNotice&act=rmdWord">逻辑说明</a></li>
    </ul>
    </div>
    <div class="clear"></div> 
    <div class="user_con">
        <div class="user_con1">
            <table cellpadding="0" cellspacing="0" class="table2" border="0" >
                <tr>
                    <td width="10%">推荐词位置</td>
                    <td width="15%">推荐词内容</td>
                    <td width="65%">搜索条件</td>
                    <td width="10%">操作</td>                        
                </tr>
                <? $j = 0 ?>
                <? foreach((array)$carType as $type) {?>
                <? for($i=1; $i<5; $i++) { ?>
                <? $j++ ?>
                <tr>
                    <td id="order<?=$j?>" name="order<?=$j?>"><?=$type?><?=$i?></td>
                    <td><input type="text" id="word<?=$j?>" name="word<?=$j?>" value="<? echo $rmdWord[$j]['keyword'] ?>" size="10"/></td>
                    <td><? echo $rmdWord[$j]['search_name'] ?></td>
                    <td><input type="button" value="添加/编辑" onclick="javascript:window.open('<?=$php_self?>rmdWordAct&type=<?=$j?>&word=' + $('#word<?=$j?>').val() + '&order=' + $('#order<?=$j?>').html());"></td>
                </tr>
                <? } ?>
                <? } ?>
            </table>
        </div>
        <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
    </div>
</div>
    </body>
</html>