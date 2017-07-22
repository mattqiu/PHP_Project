<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<div class="user">
    <div class="nav">
        <ul>
            <li><a href="<?=$php_self?>RecommendList">精选推荐帖列表</a></li>
            <li><a href="<?=$php_self?>addRecommend<? if ($list['pid']) { ?>&pid=<?=$list['pid']?><? } ?>" class="song"><? if ($edit==1) { ?>编辑<? } else { ?>添加<? } ?>精选推荐帖</a></li>
            <li><a href="<?=$php_self?>addPopularize">添加推广帖</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="user-con">
        <div class="user-table">
            <form action="" method="post" enctype="multipart/form-data">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="td_right">
                            <span>帖子id ：</span>
                        </td>
                        <td  class="td_left">
                            <? if (!$list['pid']) { ?>
                            <input type="text" style="border:1px solid #cdcdcd;  background:none; margin-left:5px;" name="pid" id="pid" size="12" onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength="12" value="" />
                            <button type="button" class="check" style="margin-left:10px;"  name="btn_checkpost" id="btn_checkpost">检查帖子id是否存在</button>
                            <? } else { ?>
                            <?=$list['pid']?>
                            <input type="hidden" name="pid" id="pid" value="<?=$list['pid']?>" />
                            <? } ?>
                            <input type="hidden" id="checkpost" value="<? if ($list['pid']) { ?>1<? } ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="td_right">
                            <span>标题 ：</span>
                        </td>
                        <td  class="td_left">
                            <input type="text" style="border:1px solid #cdcdcd;  background:none; margin-left:5px;" name="firsttitle" id="firsttitle" size="40" value="<?=$list['firsttitle']?>" />
                        </td>
                    </tr>
                    <tr height="85px">
                        <td class="td_right" style=" width:150px;" ><? if ($list['firstpic']) { ?>可重新上传<? } ?>头图（420*290）：
                        </td>
                        <td class="td_left">
                            <span style="width: 200px;float: left;"><input id="fileupload" type="file" name="pic"/></span>
                        <td><input id="firstpic" type="hidden" name="firstpic" value="<?=$list['firstpic']?>"/></td>
                        <td><img style="display: <? if ($list['firstpic']) { ?>block<? } else { ?>none<? } ?>" width="82" height="60" src="<? if ($list['firstpic']) { ?><?=$main_site?>/attach/<?=$list['firstpic']?><? } ?>" id="pic"></td>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_right">申请推荐时间 ：</td>
                        <td class="td_left">
                            <input type="text"  style=" border:1px solid #e1e1e1;" id="firstdate" class="datepicker" readonly="" size="10"  name="firstdate" value="<? if ($list['firstdate']) { ?><? echo date('Y-m-d',$list['firstdate']) ?><? } ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_right">
                            <span>排序位置 ：</span>
                        </td>
                        <td  class="td_left">
                            <input type="text" style="border:1px solid #cdcdcd;  background:none; " name="firstsort" id="firstsort" size="10" onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength="5" value="<? if ($list['firstsort']) { ?><? if ($list['firstsort']>=100) { ?>默认<? } else { ?><?=$list['firstsort']?><? } ?><? } else { ?>默认<? } ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td_right">状态 ：</td>
                        <td class="td_left">
                            <select name="status" id="status" >
                                <option <? if ($list['status']==0) { ?>selected="selected"<? } ?> value="0">开启</option>
                                <option <? if ($list['status']==1) { ?>selected="selected"<? } ?> value="1">关闭评论</option>
                                <option <? if ($list['status']==2) { ?>selected="selected"<? } ?> value="2">关闭帖子</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_right">
                            <button class="tijiao" id="btn" name="btn">提 交</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var files = $(".files");
        $("#fileupload").wrap("<form id='myupload' action=\"<?=$php_self?>ajaxBbsFirstPic\" method='post' enctype='multipart/form-data'></form>");
        $("#fileupload").change(function(){
            $("#myupload").ajaxSubmit({
                dataType: 'json',
                success: function(data) {
                    $("#pic").css("display","block");
                    $("#pic").attr("src","<?=$main_site?>/attach/"+data);
                    $("#firstpic").val(data); },
                error:function(xhr){alert("错误")}
            });
        });
    });
    $('#btn_checkpost').click(function() {
        if ($.trim($('#pid').val()) == '') {
            alert('帖子不能为空！');
            $('#pid').focus();
            $('#checkpost').val('');
            return false;
        }
        $.post("<?=$php_self?>ajaxPostIdToTitle", {pid: $('#pid').val()}, function(ret){
            if(ret==1) {
                alert('此id的相关帖子已被推荐！');
                $('#pid').focus();
            }else if(ret==2){
                alert('此id的相关帖子不存在！');
                $('#pid').focus();
            }else if(ret){
                $('#firsttitle').val($.trim(ret));
                $('#checkpost').val(1);
            }
        });
    });
    $('#btn').click(function() {
        if(!$('#checkpost').val()){
            alert('请先填写一个存在的帖子id！');
            return false;
        }
        var arr = new Array("pid","firsttitle","firstpic","firstdate");
        var arrname = new Array('帖子id','标题','头图','申请推荐时间');
        var str ='';

        $.each(arr,function(i,n){
            var  content = $('#'+n).val();
            var str_name = arrname[i];
            if(!content) {
                str += str_name +'\n'
            }
        });

        if(str){
            str +='这些都是必填项！！';
            alert(str);
            return false;
        }else{
            $('#article_form').submit();
        }
    });

</script>
</body>
</html>
