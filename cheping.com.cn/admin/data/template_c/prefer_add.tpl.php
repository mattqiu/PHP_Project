<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
         <li ><a href="<?=$php_self?>preferlist">数据列表</a></li>
        <li><a href="<?=$php_self?>preferadd" class="song">数据导入</a></li>
        
    </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
    <div class="user_con1">
      <form action="<?=$php_self?>preferadd" method="post" enctype="multipart/form-data">
      <table cellpadding="0" cellspacing="0" class="table2" border="0">
      <tr>
        
      </tr>
        <tr>
            <td colspan="2" align="center">
            csv格式文件：<input type="file" name="prefer_list" id="prefer_list"> <input id="bingoprice_btn" type="submit" value="  提  交  "></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <p>友情提示(所有表格导入都要有表头，表格里边字段的顺序需按照格式顺序)：<br/>成本价的表头格式为：<font color="red">厂商名称，车款名称，厂商指导价，奖励金额，有效期，(本站)品牌，(本站)厂商，(本站)车系，(本站)车款，(本站)车款id</font></p>
            </td>
        </tr>
      </table>
      </form>
      
   </div>
   <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
</div>
</body>
</html>