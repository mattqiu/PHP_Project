<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<div class="user" style="width:1300px;">
    <div class="user_con">
        <div class="user_con1">
            <form method="post" action="<?=$php_self?>hotartAct">
                <table cellpadding="0" cellspacing="0" class="table2" border="0" >
                    <tr>
                        <td colspan="4"><?=$date?>录入</td>
                    </tr>
                    <tr>
                        <td>位置</td>
                        <td>文章ID</td>
                        <td>后台显示标题</td>
                        <td>前台显示标题</td>                        
                    </tr>
                    <? for($i=1; $i<9; $i++) { ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><input type="text" name="article_id<?=$i?>" id="article_id<?=$i?>" size="10" value="<? echo $hotArticle[$i]['article_id'] ?>"></td>
                        <td><input type="text" name="short_title<?=$i?>" id="short_title<?=$i?>" size="10" maxlength="5" value="<? echo $hotArticle[$i]['short_title'] ?>"></td>
                        <td>
                            <input type="text" name="title<?=$i?>" id="title<?=$i?>" size="32" value="<? echo $hotArticle[$i]['title'] ?>">
                            <? if ($i < 4) { ?>
                                （最多显示15个汉字或者30个字符）
                            <? } else { ?>
                                （最多显示21个汉字或者42个字符）
                            <? } ?>
                        </td>
                    </tr>
                    <? } ?>
                    <tr>
                        <td colspan="16" style="line-height: 60px;">
                            <input type="submit" value="确认提交">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="取消操作">
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