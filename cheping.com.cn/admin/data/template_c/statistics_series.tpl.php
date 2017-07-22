<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul id="nav">
            <li ><a href="<?=$php_self?>">数据统计</a></li>
            <li><a href="<?=$php_self?>pic">图片关联统计</a></li>
            <li><a href="<?=$php_self?>keyword">关键字统计</a></li>
            <li><a href="<?=$php_self?>series" class="song">车系</a></li>
            <li ><a href="<?=$php_self?>carmodel">车型</a></li>
            <li ><a href="<?=$php_self?>model">车款</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user_con1" style="margin-top:20px;margin-left:40px;">

            <table class="table2" border="0" cellpadding="0" cellspacing="0">
                <tr style="color:red;">
                    <th colspan="4" style="text-align: left;line-height:26px;"><h3>共有正常状态车系数(<?=$total?>)</h3></th>
                </tr>
                <tr align="right"  class='th'>
                    <td height="30" nowrap>状态</td>
                    <td width="50%" align="left">描述</td>
                    <td width="15%">数量</td>
                    <td width="15%"></td>
                </tr>
                <? foreach((array)$data as $key=>$value) {?>
                <? foreach((array)$value as $k=>$v) {?>
                <!--//这里循环输出字段-->
                <tr class='th'>
                    <td height="30" style="text-align:left;" nowrap><?=$key?></td>
                    <td width="40%" style="text-align:left;">车系的<font style="color:red;"><?=$key?><?=$k?></font></td>
                    <? if ($v[total]) { ?>
                    <td width="15%"><strong style="color:red;"><?=$v[total]?></strong></td>
                    <? } else { ?>
                    <td width="15%" class="look" cid="<?=$v[state]?>">
                        <strong style="color:red;" class="cha<?=$v[state]?>">查看</strong>
                    </td>            
                    <? } ?>
                    <td width="15%"><a href="<?=$php_self?>seriesdetail&state=<?=$v[state]?>" id="kan">查看详细</a></td>
                </tr>
                <?}?>
                <?}?>
            </table>
            <div style="height:40px;"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
//    <!--//这里是外观白底-->
    $(".look").click(function () {
        var res = $(this);
        var msg = "数量为:";
        var values = res.attr('cid');
        var url = "<?=$php_self?>CountAjax";
        $.post(url, {datas: values}, function (data) {
            if (data) {
                var len = data.length;//计算字符串长度
                if (values == 7 || values == 11) {
                    var last = data.substring(len - 3);
                    res.find('.cha' + values).text(last);
                } else {
                    var last = data.substring(len - 1);
                      res.find('.cha' + values).text(last);
                }
            } else {
                alert(msg + 0);
                $(this).html(msg + 0);
            }
        }
        )
    })
</script>
</body>
</html>