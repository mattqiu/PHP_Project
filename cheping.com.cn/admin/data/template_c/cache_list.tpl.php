<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li class="li1"><a href="<?=$php_self?>" class="song">缓存管理</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
            <table class="table2" border="0" cellpadding="0" cellspacing="0">
                <tr style="color:red;">
                    <th colspan="4" style="text-align: left;line-height:26px;">匹配到<?=$key?>数(<? echo count($data); ?>)条缓存记录，共有(<?=$total?>)条</th>
                </tr>
                <tr>
                    <th colspan="4" style="text-align: left;line-height:26px;">
                    <form action="<?=$php_self?>list" method="post">
                    关键字<input name="q" size="25" value="<? if ($q) { ?><?=$q?><? } ?>">
                    <select name="tk">
                    <option value="and" <? if ($tk=='and') { ?>selected<? } ?>>并且</option>
                    <option value="not" <? if ($tk=='not') { ?>selected<? } ?>>不包含</option>
                    </select>
                    <input name="nq" size="25" value="<? if ($nq) { ?><?=$nq?><? } ?>">
                    <input type="submit" value="搜索">
                    
                    </form>
                    </th>
                </tr>
                <tr align="right"  class='th'>
                    <th height="5%" nowrap>ID</th>
                    <th width="50%" align="left">keyname</th>
                    <th width="25%">cachetime</th>
                    <th>删除</th>
                </tr>
                <? foreach((array)$data as $k=>$v) {?>
                <tr class='th'>
                    <td><? echo $k+1; ?></td>
                    <td style="text-align:left;"><?=$v['name']?></td>
                    <td><? echo date('Y/m/d H:i:s', $v['value']); ?></td>
                    <td>
                    <a href="#here" class="click_pop_dialog" mt='1' icon='warnning' tourl='<?=$php_self?>del&k=<?=$v['name']?>'><img src="<?=$admin_path?>images/del1.gif" width="9" height="9" />删除</a>
                    </td>
                </tr>
                <?}?>

            </table>
            <div style="height:40px;"><!--pagebar--></div>
        </div>
    </div>
</div>
<script language="javascript">
$(document).ready(function(){
  $('.click_pop_dialog').live('click', function(){
    pop_window($(this), {message:'您确定要删除该缓存项吗？', pos:[200,150]});
  });
});
</script>
<? include $this->gettpl('footer');?>