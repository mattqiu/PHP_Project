<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user">
<div class="nav">
    <ul id="nav">
        <li><a href="javascript:void(0);" class="song">模块信息预览</a></li>
        <li><a href="<?=$php_self?>rmdWordList">模块推荐词操作</a></li>
        <li><a href="<?=$php_self?>rmdArticleList">文字信息预览</a></li>
        <li><a href="<?=$php_self?>hotcarNotice&act=rmdWord">逻辑说明</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">           
            <div style=" width: 930px; overflow: auto;">
                <table cellpadding="0" cellspacing="0" border="0" class="table2">                
                <tr>
                    <td>名称</td>
                    <? foreach((array)$modList as $k=>$v) {?>
                    <td style="height: 25px;"><? echo date('m/d', strtotime($k)) ?></td>
                    <?}?>
                </tr>
                <tr>
                    <td>
                        <center>
                            <table class="table_list">
                                <? $j ?>
                                <? foreach((array)$carType as $type) {?>
                                    <? for($i=1; $i<4; $i++) { ?>
                                    <? $j++ ?>
                                    <tr>
                                        <td <? if ($j % 2 == 0) { ?>class="deep"<? } ?>><?=$type?><?=$i?></td>
                                    </tr>
                                    <? } ?>
                                <? } ?>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </center>
                    </td>        
                    <? foreach((array)$modList as $k=>$v) {?>                        
                    <td>
                        <center>
                            <table class="table_list">
                                <? for($i=1; $i<13; $i++) { ?>
                                <tr>
                                    <td <? if ($i % 2 == 0) { ?>class="deep"<? } ?>>
                                        <? if (isset($v[$i]['alias'])) { ?>
                                            <?=$v[$i]['alias']?>
                                        <? } else { ?>
                                        <font style="color:red;">未录入</font>
                                        <? } ?>
                                    </td>
                                </tr>
                                <? } ?>
                                <tr>
                                    <td>
                                        <? if (empty($v)) { ?>
                                            <input type="button" value="录入" onclick="window.open('<?=$php_self?>rmdSeriesAct&date=<?=$k?>')">
                                        <? } else { ?>
                                            <input type="button" value="更新" onclick="window.open('<?=$php_self?>rmdSeriesAct&date=<?=$k?>')">
                                        <? } ?>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </td>
                    <?}?>                                            
                </tr>
            </table>
            </div>
        </div>
        <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
    </div>
</div>
    </body>
</html> 