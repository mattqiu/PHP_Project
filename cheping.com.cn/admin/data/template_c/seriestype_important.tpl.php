<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li ><a href="<?=$php_self?>">车系类型管理</a></li>
        <li class="li2"><a href="javascript:void(0);" class="song">车系类型导入/导出</a></li>
        </ul>
    </div>
    <div class="clear"></div>
 <div class="user_con">
    <div class="user_con1">
      <form action="<?=$php_self?>SeriesimportantList" method="post" enctype="multipart/form-data">
      <table cellpadding="0" cellspacing="0" class="table2" border="0">
      <tr>
      
      </tr>
        <tr>
            <td colspan="2" align="center">
            csv格式文件：<input type="file" name="dealer_price" id="dealer_price"> <input id="bingoprice_btn" type="submit" value="  提  交  "></td>
        </tr>
        <tr>
            <td colspan="2" align="center">请选择类型：车系类型<input type="radio" name="type" value="1" checked="checked">&nbsp;&nbsp;品牌缩写<input type="radio" name="type" value="2">&nbsp;&nbsp;厂商缩写<input type="radio" name="type" value="3">&nbsp;&nbsp;车系缩写<input type="radio" name="type" value="4"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p>友情提示(所有表格导入都要有表头，表格里边字段的顺序需按照格式顺序)：<br/>车系类型表头格式为：<font color="red">品牌，厂商，车系</font><br/>品牌缩写表头格式为：<font color="red">品牌，品牌缩写</font><br/>厂商缩写表头格式为：<font color="red">品牌，厂商，厂商缩写</font><br/>车系缩写表头格式为：<font color="red">品牌，厂商，车系，缩写</font><br/></p></td>
        </tr>
      </table>
      </form>
      
        <div class="user_con2"><form action="<?=$php_self?>serieslive" method="post"><font color="red">车系分类导出：</font><input type="submit" name="submit" value="分类导出"></form></div>
   </div>
   <div class="user_con2"><img src="<?=$admin_path?>images/conbt.gif"  height="16" /></div>
</div>
</div>
</body>
</html>
