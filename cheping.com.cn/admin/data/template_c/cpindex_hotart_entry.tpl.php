<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user" style="width:1300px;">
    <div class="user_con">
        <div class="user_con1">
            <form method="post" action="<?=$php_self?>hotartChg&type=1">
                <table cellpadding="0" cellspacing="0" class="table2" border="0" >
                    <tr>
                        <td colspan="4"><?=$date?>录入</td>
                    </tr>
                    <tr>
                        <td>位置</td>
                        <td>后台显示标题</td>
                        <td>新排序</td>
                    </tr>                    
                    <? foreach((array)$hotArticle as $k=>$v) {?>
                    <tr>
                        <td><?=$k?></td>
                        <td><?=$v['short_title']?></td>
                        <td><input type="text" name="order<?=$k?>" id="order<?=$k?>" size="5"></td>
                    </tr>
                    <?}?>
                    <tr>
                        <td colspan="3" style="line-height: 60px;">
                            <input type="submit" value="确认提交">
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