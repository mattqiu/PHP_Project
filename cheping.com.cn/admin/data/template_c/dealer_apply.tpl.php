<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
<div class="nav">
    <ul id="nav">
    <li><a href="index.php?action=dealer-list">经销商列表</a></li>
    <li><a href="index.php?action=dealer-add">添加经销商</a></li>
    <li><a href="index.php?action=dealer-dealerapply">经销商加盟</a></li>
    <li  class="li1"><a href="#">经销商加盟详情</a></li>
</ul>
    </div>
    <div class="clear"></div>
 <div class="user_con">
  <div class="user_con1">
      <form name="add_user" method="post" action="<?=$phpSelf?>" onsubmit="return check_form()">
      <table cellpadding="0" cellspacing="0" class="table2" border="0">
        <tr>
          <td width="22%" height="20" align=right> 经销商：</td>
          <td class="td_left"><?=$apply['dealer_name']?></td>
        </tr>

        <tr>
          <td width="22%" height="20" align=right> 主营品牌：</td>
          <td class="td_left"><?=$apply['main_brand']?></td>
        </tr>

         <tr>
          <td width="22%" height="20" align=right> 城市：</td>
          <td class="td_left"><?=$apply['province_name']?> <?=$apply['city_name']?></td>
        </tr>
         <tr>
          <td width="22%" height="20" align=right> 姓名：</td>
          <td class="td_left"><?=$apply['name']?></td>
        </tr>

         <tr>
          <td width="22%" height="20" align=right> 职务：</td>
          <td class="td_left"><?=$apply['position']?></td>
        </tr>

         <tr>
          <td width="22%" height="20" align=right> 手机号码：</td>
          <td class="td_left"><?=$apply['phone']?></td>
        </tr>
         <tr>
          <td width="22%" height="20" align=right> 座机号码：</td>
          <td class="td_left"><?=$apply['tel']?></td>
        </tr>
       <tr>
          <td width="22%" height="20" align=right> 其他联系方式：</td>
          <td class="td_left"><?=$apply['otherway']?></td>
        </tr>
         <tr>
          <td width="22%" height="20" align=right> 备注：</td>
          <td class="td_left"><?=$apply['remarks']?></td>
        </tr>
        <tr>
          <td width="22%" height="20" align=right> 提交时间：</td>
          <td class="td_left"><? echo date("Y-m-d H:i:s", $apply['created']) ?></td>
        </tr>

        <tr>
          <td colspan="2">
<input id="edit_cancel" type="button" onclick="javascript:history.go('-1');" value="返回" name="edit_cancel">
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