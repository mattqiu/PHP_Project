<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
        <div class="user">
            <div class="nav">
                <ul>
                    <li><a href="<?=$php_self?>list&a=1"  <? if ($a==1) { ?>class="song"<? } ?>>评论列表</a></li>
                    <li><a href="<?=$php_self?>list&a=2"  <? if ($a==2) { ?>class="song"<? } ?>>评论通过列表</a></li>
                    <li><a href="<?=$php_self?>list&a=3"  <? if ($a==3) { ?>class="song"<? } ?>>评论未通过列表</a></li>
                    <li><a href="<?=$php_self?>list&a=4"  <? if ($a==4) { ?>class="song"<? } ?>>待审核列表</a></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="user-con">
                <div class="user-table">
                    <form id="search_form" name="search_form" method="post" action="index.php?action=review-Shenhess">
                    <table border="0" cellspacing="0" cellpadding="0">

                        <tr>                   
                            <td style=" padding-top:20px; width:80px;"><input type="checkbox"  id='allckb'  onclick="allCkb()" />ID</td>
                            <td style=" padding-top:20px;">用户名</td>
                            <td style=" padding-top:20px;">IP</td>
                            <td style=" padding-top:20px;">文章名称</td>
                            <td style=" padding-top:20px;">内容</td>
                            <td style=" padding-top:20px; width:60px;">回复ID</td>
                            <td style=" padding-top:20px;">回复时间</td>
                            <td style=" padding-top:20px;">审核状态</td>
                            <td style=" padding-top:20px; width:12%;">操作</td>
                        </tr>



                        <tbody>
                            <? foreach((array)$list as $k=>$v) {?>
                            <? if ($v[parentid]==0) { ?>
                                <tr>
                                    <td><input class="allname" type='checkbox' name='id[]' value="<?=$v[id]?>"> <?=$v[id]?></td>
                                    <td width="200"><?=$v[uname]?></td>
                                    <td><?=$v[ip]?></td>
                                    <td><?=$v[title]?></td>
                                    <td><? echo dstring::substring($v[content],0,24),'...' ?></td>
                                    <td><?=$v[parentid]?></td>
                                    <td><? echo date('Y/m/d', $v[created]); ?></td>
                                    <td><? if ($v[state]==1) { ?>通过<? } elseif($v[state]==0) { ?>未通过<? } else { ?>正在审核<? } ?></td>
                                    <td>
                                        <span><i style=" padding-top:2px;"><img src="images/shanchu.png" /></i><a href="javascript:void(0);" mt='1' icon='warnning' tourl="<?=$php_self?>del&id=<?=$v['id']?>" class="click_pop_dialog">删除</a></span>
                                        <span><i style=" padding-top:2px;"><img src="images/luck.png" /></i><a href="<?=$php_self?>parent&id=<?=$v[id]?>">回复</a></span>
                                        <span><a href="<?=$php_self?>shenhes&id=<?=$v[id]?>">审核</a></span>
                                    </td>
                                </tr>
                            <? } else { ?>
                                <tr>
                                    <td><input class="allname" type='checkbox' name='id[]' value="<?=$v[id]?>"> <?=$v[id]?></td>
                                    <td width="200"><?=$v[uname]?></td>
                                    <td><?=$v[ip]?></td>
                                    <td><?=$v[title]?></td>
                                    <td><? echo dstring::substring($v[content],0,24),'...' ?></td>
                                    <td><?=$v[parentid]?></td>
                                    <td><? echo date('Y/m/d', $v[created]); ?></td>
                                    <td><? if ($v[state]==1) { ?>通过<? } elseif($v[state]==0) { ?>未通过<? } else { ?>正在审核<? } ?></td>
                                    <td>
                                        <span><i style=" padding-top:2px;"><img src="images/shanchu.png" /></i><a href="javascript:void(0);" mt='1' icon='warnning' tourl="<?=$php_self?>del&id=<?=$v['id']?>" class="click_pop_dialog">删除</a></span>
                                        <span><i style=" padding-top:2px;"><img src="images/luck.png" /></i><a href="<?=$php_self?>parent&id=<?=$v[id]?>">回复</a></span>
                                        <span><a href="<?=$php_self?>shenhes&id=<?=$v[id]?>">审核</a></span>
                                    </td>
                                </tr>
                            <? } ?>
                            
                            <?}?>
                            <tr>
                                <td align="center" colspan="2">
                                    <? if ($a==1) { ?>
                                    <button class="button" type="submit" name="tg" value="1">一键通过</button>&nbsp;&nbsp;<button class="button" type="submit" name="tg"  value="0">一键不通过</button>&nbsp;&nbsp;<button class="button" type="submit" name="tg" value="3">一键删除</button>&nbsp;&nbsp;<? if ($shenhe==0) { ?><a class="button" href="<?=$php_self?>shenhe&state=1">开启审核<? } else { ?><a class="button" href="<?=$php_self?>shenhe&state=0">关闭审核<? } ?></a>
                                    <? } elseif($a==2) { ?>
                                    <button class="button" type="submit" name="tg"  value="0">一键不通过</button>&nbsp;&nbsp;<button class="button" type="submit" name="tg" value="3">一键删除</button>&nbsp;&nbsp;<? if ($shenhe==0) { ?><a class="button" href="<?=$php_self?>shenhe&state=1">开启审核<? } else { ?><a class="button" href="<?=$php_self?>shenhe&state=0">关闭审核<? } ?></a>
                                    <? } elseif($a==3) { ?>    
                                    <button class="button" type="submit" name="tg" value="1">一键通过</button>&nbsp;&nbsp;<button class="button" type="submit" name="tg" value="3">一键删除</button>&nbsp;&nbsp;<? if ($shenhe==0) { ?><a class="button" href="<?=$php_self?>shenhe&state=1">开启审核<? } else { ?><a class="button" href="<?=$php_self?>shenhe&state=0">关闭审核<? } ?></a>
                                    <? } elseif($a==4) { ?>
                                    <button class="button" type="submit" name="tg" value="1">一键通过</button>&nbsp;&nbsp;<button class="button" type="submit" name="tg"  value="0">一键不通过</button>&nbsp;&nbsp;<button class="button" type="submit" name="tg" value="3">一键删除</button>&nbsp;&nbsp;<? if ($shenhe==0) { ?><a class="button" href="<?=$php_self?>shenhe&state=1">开启审核<? } else { ?><a class="button" href="<?=$php_self?>shenhe&state=0">关闭审核<? } ?></a>
                                    <? } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
            $().ready(function () {
                $('.click_pop_dialog').live('click', function () {
                    pop_window($(this), {message: '您确定要删除吗？', pos: [200, 150]});
                });
            });
        </script>  

        <script language="javascript" type="text/javascript">
            //全选
            function allCkb(){
               var is =$("#allckb").attr("checked");
               if(is){
                    $('.allname').attr("checked", true);
               }else{
                    $('.allname').attr('checked', false);
               }
              
            }
        </script>
    </body>
</html>
