<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
        <div class="user">
            <div class="nav">
                <ul id="nav">
                    <li><a href="javascript:void(0);" class="song">信息预览</a></li>
                    <li><a href="<?=$php_self?>oldModelList">历史信息</a></li>
                    <li><a href="<?=$php_self?>modelCountList">数据分析</a></li>
                    <li><a href="<?=$php_self?>hotcarNotice&act=allmodel">逻辑说明</a></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="user_con">
                <div class="user_con1">           
                    <div style=" width: 925px; overflow-x: auto; overflow-y:hidden; height:600px;">
                        <table cellspacing="0" cellpadding="0" border="0" style="width: 1200px; height: 500px;" class="table2 table_border">                
                            <tr>
                                <td style="width: 85px;">名称</td>
                                <? foreach((array)$date as $v) {?>
                                <td style="width: 100px;">
                                    <?=$v?><br>
                                    <a href="javascript:void(0);" onclick="javascript:makePage('<?=$v?>')">生成</a>&nbsp;&nbsp;
                                    <a href="<?=$main_site?>newindex.php?date=<?=$v?>" target="_blank">预览</a>
                                </td>
                                <? } ?>
                            </tr>
                            <? $j = 0 ?>
                            <? foreach((array)$allModel as $kk=>$vv) {?>                                    
                            <? $j++ ?>
                            <tr>
                                <td <? if ($j % 2 == 0) { ?>class="deep"<? } ?>><?=$vv?></td>
                                <? foreach((array)$date as $v) {?>
                                    <? if (!empty($result[$kk][$v])) { ?>
                                        <td <? if ($j % 2 == 0) { ?>class="deep"<? } ?>><? echo implode(' ', $result[$kk][$v]) ?></td>
                                    <? } else { ?>
                                        <td <? if ($j % 2 == 0) { ?>class="deep"<? } ?>><font style="color:red;">未录入</font></td>
                                    <? } ?>         
                                <?}?>
                            </tr>
                            <? } ?>
                        </table>
                    </div>
                </div>
                <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
            </div>
        </div>
        <script>
            function makePage(d){
                if(confirm('您确定要生成 '+d+' 首页吗？')){
                    var iurl="?action=index-makeindex&date="+d;
                    $.getJSON(iurl, function(ret){
                        if(ret['state']==1){
                            alert(ret.date+' 首页生成成功！操作人：'+ret.admin);
                        }else if(ret['state'] == -1){
                            alert('您没有权限操作，请与管理员联系！');
                        }else{
                            alert(ret.date+' 首页生成失败！');
                        }
                    });
                }
            }
        </script>
    </body>
</html>