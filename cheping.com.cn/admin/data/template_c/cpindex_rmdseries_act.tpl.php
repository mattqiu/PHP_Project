<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user">
    <div class="user_con">
        <div class="user_con1">
            <form method="post" action="<?=$php_self?>rmdSeriesAct">
                <table cellpadding="0" cellspacing="0" class="table2" border="0" >
                    <tr>
                        <td colspan="4"><?=$date?>模块操作信息</td>
                    </tr>
                    <tr>
                        <? foreach((array)$cols as $col) {?>
                            <td><?=$col?></td>
                        <? } ?>
                    </tr>
                    <tr>
                        <? foreach((array)$cols as $key=>$col) {?>
                        <td>
                            <center>
                                <table style="width:100%">
                                    <? $j = 0; ?>
                                    <? foreach((array)$carType as $type) {?>
                                        <? for($i=1; $i<4; $i++) { ?>
                                        <? ++$j ?>
                                            <tr <? if ($j % 2 == 0) { ?>style="background-color:#D2D2D2;"<? } ?>>                                    
                                                <td>
                                                    <? if ($key == 0) { ?>
                                                        <?=$type?><?=$i?>
                                                    <? } elseif($key == 1) { ?>
                                                        <? echo $lastSeries[$j]['alias'] ?>
                                                    <? } elseif($key == 2) { ?>
                                                        <input type="text" id="alias<?=$j?>" name="alias<?=$j?>" value="<? echo $series[$j]['alias'] ?>" size="20">                                                        
                                                    <? } else { ?>
                                                        <input type="text" id="price_id<?=$j?>" name="price_id<?=$j?>" value="<? echo $series[$j]['price_id'] ?>" size="10">                                                                                                                
                                                    <? } ?>
                                                </td>
                                            </tr>
                                        <? } ?>
                                    <?}?>
                                </table>
                            </center>
                        </td>
                        <? } ?>
                    </tr>
                    <tr>
                        <td colspan="4" style="line-height: 60px;">
                            <input type="submit" value="确认提交">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="window.close();" value="取消关闭">
                            <input type="hidden" name="date" id="date" value="<?=$date?>"/>
                        </td>                        
                    </tr>
                </table>
            </form>
        </div>
        <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
    </div>
</div>
    </body>
</html>