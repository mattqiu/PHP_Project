<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
        <div class="user">
            <div class="nav">
                <ul>
                    <? if ($pid) { ?><li><a href="<?=$php_self?>BehaviourList&type=<?=$type?>&page=<?=$page?>">返回</a></li><? } ?>
                    <li><a href="<?=$php_self?>ReadBehaviour&type=<?=$type?>&pid=<?=$pid?>" class="song">查看<?=$switch?>内容</a></li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="user-con">
                <div class="user-table">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="td_right"  width="200px;" >
                                    <span>帖子ID ：</span>
                                </td>
                                <td  class="td_left" style="padding:10px;">
                                    <?=$list['comment']?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right"><?=$switch?>ID ：</td>
                                <td class="td_left" style="padding:10px;">
                                    <?=$list['pid']?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_right" width="150px;" ><?=$switch?>内容 ：</td>
                                <td class="td_left" style="padding:10px;" <? if ($content_len>30) { ?>height="<?=$content_len?>px"<? } else { ?>height="30px"<? } ?>>
                                <? if ($content_len>30) { ?>
                                    <div width="50%"><?=$list['message']?></div>
                                <? } else { ?>
                                    无<?=$switch?>内容
                                <? } ?>
                                </td>
                            </tr>
                            <!--<tr>-->
                                <!--<td class="td_right">-->
                                    <!--<button class="tijiao" id="btn" name="btn">提 交</button>-->
                                <!--</td>-->
                            <!--</tr>-->
                        </table>
                    </form>
                </div>
            </div>
        </div>
<script charset="utf-8" src="<?=$relative_dir?>vendor/editor/kindeditor.js"></script>
<script type="text/javascript">
    $(function() {
        $('#fid').change(function () {
            var fid = $(this).children('option:selected').val();
            if(fid) {
                $.post("<?=$php_self?>ajaxFidTOTheme", {fid: fid}, function (res) {
                    if (res) {
                        $('#tid').html(res);
                    } else {
                        alert('主题获取失败！\n');
                    }
                });
            }else{
                $('#tid').html('');
            }
        });
        //提交
        $('#btn').click(function () {
            var arr = new Array("subject","fid","ke_text");
            var arrname = new Array('标题','所属论坛版块','内容');
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
    });
    //编辑器
    $(function(){
        editor = KindEditor.create('#ke_text',{
            width : "580px",
            height: "400px",
            filterMode:false,//是否开启过滤模式;
            uploadJson : '<?=$php_self?>ajaxPostPic&ret=json&sfid=imgFile',
            fileManagerJson: '<?=$admin_path?>ajaxPostPic&ret=json&sfid=imgFile',
            allowFileManager: true,
            urlType : 'domain',
            allowImageUpload: true,
            allowMediaUpload: false,
            allowFlashUpload: false,
            cssData: 'body {font-family: "微软雅黑"; font-size: 16px}',
            items : [   //文章编辑功能, 快速格式化: 'quickformat'
                'source', '|','undo', 'redo','cut', 'copy', 'paste', '|','fontname', 'fontsize', '|',
                'forecolor', 'hilitecolor', 'bold',  'underline','removeformat', '|', 'justifyleft',
                'justifycenter', 'justifyright', 'hr','|','image','media','table', 'indent', 'outdent', 'link','forecolor', 'unlink','-','preview','clearhtml','fullscreen'],
            afterBlur: function(){this.sync();},
            afterChange:function(){
                $('.word_count1').html(this.count());
                $('.word_count2').html(this.count('text'));
                show_pic();
            }
        });
        show_pic();
    });
    //图片
    function show_pic() {
        var arr = $(".tishi_pic");
        kehtml  = editor.html();
        if(arr){
            $.each(arr,function(i,n){
                var src =  $(this).attr("src").replace("<?=$main_site?>/attach/","/");
                var cl =  $(this).attr("class").split(" ")[1];
                if(kehtml.indexOf(src)>0){
                    $("#"+cl).css("display","block")
                }
            })
        }
    }
</script>
</body>
</html>