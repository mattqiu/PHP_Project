<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li><a href="<?=$php_self?>preferlist">数据列表</a></li>
        <li class="li1"><a href="javascript:void(0);" class="song">错误日志</a></li>
        <li ><a href="<?=$php_self?>preferadd">数据导入</a></li>
        <li ><a href="<?=$php_self?>preferupdate">数据添加</a></li>
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1">
            <form action="index.php?action=prefercar-prefererrorlog" method="post">
                <table class="table2" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                      <td>
                        责任人<input type="text" id="creator" name="creator" size="10"/>
                        有效期开始:<input type="text" name="start_time" class="datepicker" readonly="readonly"/>
                        有效期结束:<input type="text" name="end_time" class="datepicker" readonly="readonly"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="搜索"/>
                      </td>                      
                    </tr>
                    </tbody>
                </table>
            </form>
  
            <table class="table2" border="0" cellpadding="0" cellspacing="0">
            
                <tr align="right"  class='th'>
                  <td>表格名称</td>
                  <td >责任人</td>
                  <td >未匹配行号</td>
                  <td>不匹配项</td>
                  <td>操作时间</td>    
                </tr>              
                <? foreach((array)$result as $k=>$v) {?>
                <tr align="right"  class='th'>
                  <td><?=$v['csv_name']?></td>
                  <td><?=$v['creator']?></td>
                  <td><?=$v['excel_row']?></td>
                  <td><?=$v['content']?></td>
                  <td><? echo date('Y/m/d h:i:s', $v['created']) ?></td>
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
<script type="text/javascript">
  $('.datepicker').datepicker();
  //$('.datepicker').datepicker('option', 'maxDate', new Date());
</script>
</body>
</html>