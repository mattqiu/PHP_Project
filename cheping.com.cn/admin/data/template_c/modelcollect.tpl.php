<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
              <li ><a href="<?=$php_self?>modelpiccollect" class="song">车款图片采集列表</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1" style="margin-left: 30px;">
                <form action="<?=$php_self?>modelpiccollect" method="post" name="form2">
                <table class="table2" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>
                            输入车款id:
                            <input type="text" name="modelid"  class="" value="<? if ($modelid) { ?><?=$modelid?><? } ?>" size="10"  />
                            <input type="submit" name="search" value=" 添 加 ">&nbsp;&nbsp;&nbsp;<font style="color: #fb7f7f;font-size:9pt;">*注: 车款id为数字</font>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <table class="table2" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th width="8%">车款id</th>
                    <th width="12%">品牌</th>
                    <th width="12%">车系</th>
                    <th width="25%">车款</th>
                    <th width="8%">状态</th>
                    <th width="8%">采集图片数量</th>
                    <th width="8%">操作人</th>
                    <th width="25%">日期</th>
                </tr>    
                <? if ($list) { ?>
                <? foreach((array)$list as $key=>$value) {?>
                <tr>
                    <td><?=$value['model_id']?></td>
                    <td><?=$value['brand_name']?></td>
                    <td><?=$value['series_name']?></td>
                    <td><?=$value['model_name']?></td>  
                    <td><? if ($value['state']==1) { ?>未采集<? } elseif($value['state']==2) { ?>已采集<? } elseif($value['state']==3) { ?>采集失败<? } elseif($value['state']==4) { ?>采集中<? } ?></td>
                    <td><?=$value['collect_num']?></td>
                    <td><?=$value['author']?></td>
                    <td><? echo date("Y-m-d H:i:s", $value['created']) ?></td>
                </tr>
                <?}?>
                <? } ?>
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
<script>

</script>
<? include $this->gettpl('footer');?>