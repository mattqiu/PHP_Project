<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#content select").change(function(){
            if(confirm("你确定要将用户 "+name+" 这条内容:"+content+" 修改为 "+statetxt+" 状态!!")){
                if(id&&$(this).val()){
                    $.ajax({
                        type:"POST",
                        url:"<?=$php_self?>updatastate",
                        data:{id:id,uid:uid,pid:pid,state:$(this).val(),t:"<?=$t?>"},
                        error:function(){
                            alert("网络异常，请求失败！！");
                        },
                        success:function(date){
                            var color=eval("("+date+")");
                            if(color){
                                $("#"+id).attr("color", color);
                            }else{
                                alert("修改失败!!请联系管理员");
                            }
                        }
                    })
                }else{
                    alert("非法操作!!");
                    return false;
                }
            }else{
                return false;
            }
        });

        $("#updatebtn").click(function(){
            var length=$("#content input:checkbox:checked").size();
            var state=$(this).siblings("select").val();
            if(length<1){
                alert("请选择你要修改数据!");
                return false;
            }
            if(state==""){
                alert("请选择你要修改的状态!");
                return false;
            }
            $("#form_all").submit();
            //return false;
        });

    });
    
    function sendMassMsg(id){
        var url="<?=$php_self?>smsmass&id="+id;
        if(confirm("确定要群发短信吗？")){
            location.href=url;
        }
        return false;
    }
</script>
<div class="navs">
    <ul class="nav">
        <li><a class="song" href="<?=$php_self?>">短信模板管理</a></li>
        <li><a href="<?=$php_self?>add">添加模板</a></li>
        <li><a href="<?=$php_self?>send">手动发送短信</a></li>
    </ul>
    <div class="clear"></div>
    <div class="user_con">
        <div class="user-table">
            <form id="form_all" action="<?=$php_self?>updateallstate&page=<?=$page?>" method="post">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="8%" height="50">ID</td>
                    <td width="17%">标题</td>
                    <td width="35%">内容</td>
                    <td width="10%">状态</td>
                    <td width="10%">添加日期</td>
                    <td width="10%">修改日期</td>
                    <td width="10%">操作</td>
                </tr>
                <? if ($list) { ?>
                <? foreach((array)$list as $key=>$value) {?>
                <tr>
                    <td><?=$value["id"]?></td>
                    <td><p title="<?=$value['title']?>"><? echo dstring::substring($value["title"],0,10); ?></p></td>
                    <td><p title="<?=$value['content']?>"><? echo dstring::substring($value["content"],0,20); ?></p></td>
                    <td>
                        <? if ($value["state"]==1) { ?>启用<? } else { ?>禁用<? } ?>
                    </td>
                    <td><? echo date("Y/m/d",$value["created"]); ?></td>
                    <td><? echo date("Y/m/d",$value["updated"]); ?></td>
                    <td><? if ($value['mass'] == 2) { ?><a href="javascript:void(0);" onclick="javascript:sendMassMsg(<?=$value["id"]?>);">群发</a>&nbsp;<? } ?>
                        <a href="<?=$php_self?>edit&id=<?=$value['id']?>">修改</a>
                    </td>
                </tr>
                <?}?>
                <? } else { ?>
                <tr>
                    <td colspan="6"><h3 style="color:red;">暂无相关数据</h3></td>
                </tr>
                <? } ?>
            </table>
            <table class="table2" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <!--<td width="10%"><input type="checkbox" id="isall"/>&nbsp;全选</td>
                    <td width="30%">
                        <select style="width:120px;"  name="state">
                            <option value="">请选择</option>
                            <? foreach((array)$state as $k=>$v) {?>
                            <option value="<?=$k?>"><?=$v?></option>
                            <?}?>
                        </select>
                        <input type="hidden" name="oldstate" value="<? if (isset($s)) { ?><?=$s?><? } else { ?><? } ?>" />
                        <input type="hidden" name="keyword" value="<?=$keyword?>" />
                        <input type="submit" id="updatebtn" name="update" value=" 修 改 ">
                    </td>-->
                    <? if ($page_bar) { ?>
                    <td width="100%"  class="page_bar_css">
                        <?=$page_bar?>
                    </td>
                    <? } ?>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<? include $this->gettpl('footer');?>