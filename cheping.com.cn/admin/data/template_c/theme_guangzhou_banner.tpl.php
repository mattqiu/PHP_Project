<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?> 
        <div class="user">
            <div class="nav">
                <ul>
                    <li><a href="<?=$php_self?>guangzhoubanner" class="song">广州车展轮播图</a></li>
                    <li><a href="<?=$php_self?>guangzhouheadline">车展头条+热门文章</a></li>
                    <!--<li><a href="<?=$php_self?>guangzhouhotarticle">广州车展热门文章</a></li>-->
                </ul>
            </div>
            <div class="clear"></div>
            <div class="user-con">
                <div class="user-table">
                    <form action="" method="post" enctype="multipart/form-data">
                         <div style="padding:6px 0px; width:98%; border-bottom: 1px solid #ccc; margin:0 auto;">
                            <span style="float: left;margin-left:200px"><input type="button" class="sbt" onclick='add()'style=" padding:0px 8px;padding-right:20px;  color:#333;font-family:'微软雅黑';  " value="添加"/>添加新的内容</span>
                                    
                                    <!--<input type="button" class="sbt"style=" padding:0px 4px; margin-left:100px; color:#333;font-family:'微软雅黑';  " onclick="make('banner_index')" value="生成"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                                    <span style="margin-left:120px;"></span>
                                    <input type="submit" class="sbt" style=" padding:0px 4px;  color:#333;font-family:'微软雅黑';  " name= 'submit2' value="提交数据"/>
                        </div>
                    <table border="0" cellspacing="0" cellpadding="0">

                        <tr>
                            <td  style=" padding-top:20px;display:none">ID</td>
                            <td style=" padding-top:20px;">标题</td>
                            <td style=" padding-top:20px;display:none">类型</td>
                            <td style=" padding-top:20px;display:none">修改时间</td>
                            <td style=" padding-top:20px;">图片</td>
                            <td style=" padding-top:20px;">路径</td>
                            <td style=" padding-top:20px;">排序</td>
                            <td style=" padding-top:20px;">操作</td>
                        </tr>



                        <tbody id="tobdy">
                            <? foreach((array)$list as $k=>$v) {?>
                            <tr>
                                <td style="display:none"><input type='text' class="id_a" value="<?=$v[id]?>" id="<?=$v[id]?>" name="id[]" size="4"></td>
                                <td style="width:25%;"><input style="width:220px;" type="text" class="title" name="title[]" value="<?=$v[title]?>"></td>
                                <td style="display:none">
                                    <? if ($v[uptime]) { ?><? echo date('Y-m-d',$v[uptime]) ?><? } ?>
                                </td>
                                <td style="none;width:20%;"><input style="width:150px;" type="file" value="" name="pic[]">
                                    <input type="hidden" id="old_pic[]" name="old_pic[]" value="<?=$v[pic]?>">
                                    <p><a class="jTip" id="jtip<?=$k?>" href="/admin/index.php?action=theme-pic&picture=<?=$v[pic]?>">查看PC图片(680*380)</a></p></td>
                                <td style="width:30%;"><input style="width:180px;" type="text" name="url[]" value="<?=$v[url]?>"></td>
                               <td><input type="text" name="orderby[]" class="sort_article"  placeholder="默认" style="width:50px;text-align:center;" size="4" value="<?=$v[orderby]?>"></td>
                                <td>
                                    <span>
                                        <a href="javascript:void(0)" onclick="del(this)" class="but_del">移除</a>
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
        <script type="text/javascript" src="<?=$admin_path?>js/jquery.dragsort-0.4.min.js"></script>
        <script type="text/javascript">
               //拖拽排序
            var sortNumOld;
            var num_banner_old=0;
            var num_max = 4 ;
            $(document).ready(function(){
                  $("#tobdy").dragsort({ itemSelector: "tr", dragSelector: "tr", dragBetween: true,dragEnd: saveOrder1, placeHolderTemplate: "<tr></tr>" });
                  sortNumOld = $(".sort_article").map(function() { return $(this).val(); }).get();
                  $("#tobdy").children("tr").each(function(){
                      num_banner_old = Number($(this).attr('data-itemidx'))+1;
                  })
            })
            function saveOrder1() {    
                for(var i=0;i<sortNumOld.length;i++){
                    $(".sort_article").eq(i).val(i+1);
                }
            }; 
            function del(a){
                    if(num_banner_old>0){
                        $(a).parent().parent().parent("tr").remove();
                        num_banner_old--;
                    }
                }

            function make(i) {
                 $.get("<?=$php_self?>bannermake",{"name":i,"type":5},function(msg){
                     if(msg==1){
                         alert("生成成功");
                     }else{
                         alert("生成失败");
                     }
                 })
            }
        
            function add(){
                if(num_banner_old<num_max){
                    var html ='<tr><td style="display:none"><input class="id_a" type="text" value=""  name="id[]" size="4" ></td> <td style="width:25%;" class="content1"><input style="width:220px;" type="text" name="title[]" value=""></td><td style="display:none" class="content2"></td><td style="display:none" class="content3"></td><td style="width:20%;"><input style="width:150px;" type="file" value="" name="pic[]"><input type="hidden" id="old_pic[]" name="old_pic[]" value=""><p><a class="jTip" id="jtip<?=$i?>" href="/admin/index.php?action=index-pic&picture=">查看PC图片(680*380)</a></p></td><td style="width:30%;"><input style="width:180px;" type="text" name="url[]" value=""></td><td><input type="text"  style="width:50px;text-align:center;" name="orderby[]" size="4" value=""></td><td><span><a href="javascript:void(0)" onclick="del(this)" class="but_del">移除</a></span></td></tr>';
                    $("#tobdy").prepend(html);
                    num_banner_old++;
                }else{
                    alert('你最多只能添加4条轮播数据\n');
                }
            }
            
        </script>  
    </body>
</html>
