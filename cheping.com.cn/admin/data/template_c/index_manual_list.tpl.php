<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
<script type="text/javascript">
        $(function () {
            $('td :checkbox').each(function(){
                $(this).click(function () {
                    $(this).siblings().removeAttr("checked");
                    $(this).attr("checked", "checked");
                });
            })
        });
</script>
        <div class="user">
            <div class="nav">
                <ul>
                    <li><a href="<?=$php_self?>manual" class="song">信息生成列表</a></li> 
                </ul>
            </div>
            <div class="clear"></div>
            <div class="user-con">
                <div class="user-table">
                    
                    <form action="" method="post">
                          <div style="padding:6px 0px; width:98%; border-bottom: 1px solid #ccc; margin:0 auto; ">
                              <span style="float: left;padding-left:200px"><input type="button" class="sbt" style=" padding:0px 4px;  color:#333;font-family:'微软雅黑';  " onclick='add()' value="添加"/>  &nbsp;&nbsp;添加文章和视频id，点击确认</span>
                                    
                                    <input type="button" class="sbt" style=" padding:0px 4px; margin-left:100px; color:#333; font-family:'微软雅黑';  " onclick="make('manual')" value="PC生成"/>&nbsp;&nbsp;
                                    <input type="button" class="sbt" style=" padding:0px 4px; margin-left:100px; color:#333; font-family:'微软雅黑';  " onclick="make('wap')" value="WAP生成"/>&nbsp;&nbsp;
                                    <input type="submit" class="sbt"style=" padding:0px 4px;  color:#333; font-family:'微软雅黑';  " name= 'submit2' value="提交数据"/> 
                           </div>
                        
                    <table border="0" cellspacing="0" cellpadding="0">

                        <tr>  
                             
                            <td  style=" padding-top:20px;">ID</td>
                            <td style=" padding-top:20px;">标题</td>
                            <td style=" padding-top:20px;">类型</td>
                            <td style=" padding-top:20px;">发布时间</td>   
                             <td style=" padding-top:20px;">APP首页显示状态(多图,单图只能选择一个)</td>
                            <td style=" padding-top:20px;">操作</td>
                        </tr>



                        <tbody id="tobdy">
                            <? foreach((array)$list as $k=>$v) {?><!--
-->                            <tr>
                               
                                <td style="width:100px;"><input type='text' value="<?=$v[id]?>" id="<?=$v[id]?>" name="id[]" size="4" readonly="readonly"></td>
                                <td width="200"><?=$v[title]?></td>
                                <td ><? if ($v[cname]=='article') { ?>文章<? } else { ?>视频<? } ?></td>
                                <td>
                                    <? echo date('Y-m-d',$v[uptime]) ?>
                                </td>
                                <? if ($v[cname]=='video') { ?>
                                <td><input name="radio[]" type="checkbox" value="1" onclick="check_count(this)" checked = "checked"/>单图  
                                <td>
                                <? } else { ?>
                                 <td><input name="radio[]" type="checkbox" value="1" onclick="check_count(this)" <? if ($v[state]=='1') { ?>checked = "checked"<? } ?>/>单图  
                                    <input name="radio[]" type="checkbox" value="2" onclick="check_count(this)" <? if ($v[state]=='2') { ?>checked = "checked"<? } ?>/>多图 </td> 
                                <td>
                                    <? } ?>
                                    <span>
                                        <a href="javascript:void(0)" class="but_del">移除</a>
                                    </span>
                                </td> 
                                
                            </tr>
                            <?}?>
                
                        </tbody>
                          
                    </table>
                     
                    </form>
                </div>
                <div>
                    <div class="ep-pages">
                        <?=$page_bar?>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $().ready(function () {
                $(".but_del").live('click',function(){
                    $(this).parent().parent().parent("tr").remove();
                })
                
                $(".but_check").live('click',function(){
                   var tr= $(this).parent().parent().parent("tr")
                   var id= tr.find(".id_a").val();
                   $.get("<?=$php_self?>ajaxarticle",{"id":id},function(msg){
                       if(msg==-1){
                           alert("该文章不存在");
                       }else{
                           arr =eval('(' + msg + ')');
                           tr.find(".content1").html(arr['title']);
                           tr.find(".content2").html(arr['type']);
                           tr.find(".content3").html(arr['day']);
                         
                       }
                   })
                   
                })
            });

         
            function make(i) {
                 $.get("<?=$php_self?>make",{"name":i},function(msg){
                     if(msg==1){
                         alert("生成成功");
                     }else{
                         alert("生成失败");
                     }
                 })
            }
        
            function add(){
                var html ='<tr><td><input class="id_a" type="text" value="" name="id[]" size="4" ></td><td class="content1" width="200"></td><td class="content2"></td><td class="content3"></td><td><input name="radio[]" type="checkbox" value="1" checked = "checked"/>单图<input name="radio[]" type="checkbox" value="2"/>多图</td><td><span><input type="button" value="确认" class="but_check"><a href="javascript:void(0)" class="but_del">移除</a></span></td></tr>';
                $("#tobdy").prepend(html);
            }
        </script>  
        
    </body>
</html>
