<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
        <li><a href="<?=$php_self?>orderlist">返回</a></li>
        <li class="li2"><a href="javascript:void(0);"  class="song">导入排序</a></li>
        </ul>
    </div>
    <div class="clear"></div>
 <div class="user_con">
    <div class="user_con1">
      <form action="<?=$php_self?>OrderimportantList" method="post" enctype="multipart/form-data">
      <table cellpadding="0" cellspacing="0" class="table2" border="0">
      <tr>

      </tr>
        <tr>
            <td colspan="2" align="center">
            csv格式文件：<input type="file" name="dealer_price" id="dealer_price"> <input id="bingoprice_btn" type="submit" value="  提  交  "></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <p>友情提示(所有表格导入都要有表头，表格里边字段的顺序需按照格式顺序)：<br/>成本价的表头格式为：<font color="red">配置，新排序，备注</font></p></td>
        </tr>
      </table>
      </form>

   </div>

</div>
</div>
</body>
</html>
