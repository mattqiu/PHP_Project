<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
  <div class="nav">
    <ul id="nav">
    <li><a href="<?=$php_self?>">静态化数据列表</a></li>
    <li><a href="<?=$php_self?>autotask">自动任务列表</a></li>
    <li><a href="<?=$php_self?>add" class="song">添加静态化数据</a></li>
</ul>
</div>
<div class="clear"></div>
 <div class="user_con">
    <div class="user_con1">
    <form name="add" method="post" action="">
    <table cellpadding="0" cellspacing="0" class="table2" border="0">
      <tr>
        <td width="22%"> 任务名称：</td>
        <td width="78%" style="text-align: left;padding-left: 5px;">
        <input type="text" name="name" id="name" size="30" value="<?=$static['name']?>">
        </td>
      </tr>
      <tr>
        <td width="22%"> 生成链接：</td>
        <td width="78%" style="text-align: left;padding-left: 5px;">
        <input type="text" name="url" id="url" size="40" value="<?=$static['url']?>">
        </td>
      </tr>
      <tr>
        <td width="22%"> 文件类型：</td>
        <td width="78%" style="text-align: left;padding-left: 5px;">
        <select name="filetype" id="filetype">
          <? foreach((array)$type as $k=>$v) {?>
          <option value="<?=$k?>"><?=$v[name]?></option>
          <?}?>
        </select>
        </td>
      </tr>
      <tr>
        <td width="22%"> 文件名称：</td>
        <td width="78%" style="text-align: left;padding-left: 5px;">
        <input type="text" name="savepath" id="savepath" size="30" value="<?=$static['filename']?>">
        </td>
      </tr>
      <tr>
        <td width="22%"> 执行周期：</td>
        <td width="78%" style="text-align: left;padding-left: 5px;">
        <input type="text" name="cron" id="cront" size="30" value="<?=$static['cron']?>">
        *同crontab写法，选填
        </td>
      </tr>
      <tr>
        <td width="22%"> 任务说明：</td>
        <td width="78%" style="text-align: left;padding-left: 5px;">
        <textarea cols="60" rows="5" name="memo" id="memo"><?=$static['memo']?></textarea>
        </td>
      </tr>
      <tr>
        <td width="22%"> 手动生成：</td>
        <td width="78%" style="text-align: left;padding-left: 5px;">
        <select name="state" id="state">
          <option value="1">允许</option>
          <option value="2">禁止</option>
        </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" style=" border:none;">
        <input type="hidden" id="id" name="id" value="<?=$static['id']?>">
        <input type="submit" value=" 提  交 ">
        <input type="reset" value=" 重  填 ">
        </td>
      </tr>
    </table>
    </form>
   </div>
   
</div>
</div> 
<script type="text/javascript">
<? if ($static['id']) { ?>
$('#filetype option[value="<?=$static['type']?>"]').attr({selected:true});
$('#state option[value="<?=$static['state']?>"]').attr({selected:true});
<? } ?>
</script>
<? include $this->gettpl('footer');?>