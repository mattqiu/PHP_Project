<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
        <div class="user">
            <div class="nav">
                <ul>
                    <li><a href="<?=$php_self?>" class="song">文章列表</a></li>
                    <li><a style="width: 200px;" href="<?=$php_self?>seolist" >SEO审核列表</a></li>
                    <li><a style="width: 200px;" href="<?=$php_self?>verifylist" >待审核文章列表</a></li>
                    <li><a style="width: 200px;" href="<?=$php_self?>typelist">审核意见待处理文章列表</a></li>
                    <li><a href="<?=$php_self?>add">添加文章</a></li>
                </ul>   
            </div>
            <div class="clear"></div>
            <div class="user-con">
                 <div style=" padding:20px 5px; width：98%; border-bottom:1px solid #ccc; ">
                    <form id="search_form" name="search_form" method="post" action="index.php?action=article-list">
                        <table style=" table-layout: auto; width:100%; "border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td> 标题:<input type="text" name="keyword" id="keyword" size="40" value="<?=$keyword?>"/></td>
                                <td> 作者:<input type="text" name="author" id="author" value="<?=$author?>" /></td>
                                <td>文章ID:<input type="text" name="article_id" id="article_id" size="4" value="<?=$article_id?>"/></td>
                                <td>频道&nbsp;&nbsp180;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="p_category_id" onchange="checkcategory(this.value)">
                                        <option value="">请选择</option>
                                        <? foreach((array)$category as $k=>$v) {?>
                                            <option value="<?=$v[id]?>" <? if ($p_category_id==$v[id]) { ?>selected='selected'<? } ?>><?=$v[category_name]?></option>
                                        <?}?>
                                    </select>
                                    <br>二级频道 <select name="category_id" id="category_id">

                                        <option value="">选择二级频道</option>
                                        <? if ($categorylist) { ?>
                                        <? foreach((array)$categorylist as $k=>$v) {?>
                                        <option value="<?=$v[id]?>" <? if ($category_id==$v[id]) { ?>selected="selected"<? } ?>><?=$v[category_name]?></option>
                                        <?}?>
                                        <? } ?>
                                    </select></td>
                                    <td>焦点<select name="ishot">
                                        <option value="">请选择</option>
                                        <option value="1" <? if ($ishot==1) { ?>selected='selected'<? } ?>>是</option>
                                        <option value="2" <? if ($ishot==2) { ?>selected='selected'<? } ?>>否</option>
                                        
                                    </select>
                                    <td>是否已生成<select name="state">
                                        <option value="">请选择</option>
                                        <option value="3" <? if ($state==1) { ?>selected='selected'<? } ?>>是</option>
                                        <option value="4" <? if ($state==2) { ?>selected='selected'<? } ?>>否</option>
                                        
                                    </select>
                                        
     
                                </td>
                                 <td>
                                    <input id="search_btn" name="search_btn" type="submit" value="搜索" />
                                 </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="user-table">
                    <form id="info_form" name="info_form" method="post" action="index.php?action=article-list">
                    <table border="0" cellspacing="0" cellpadding="0">

                        <tr>
                            <td style=" "></td>
                            <td style="">ID</td>
                            <td style=" width:120px;">标题</td>
                            <td style=" width:120px;">副标题</td>
                             <td style="width:50px">频道</td>
                            <td style="width:60px">作者</td>
                            <td style=""><a href="index.php?action=article-list&uptime=desc">上线时间</a></td>
                            <td style=""><a href="index.php?action=article-list&created=desc">时间</a></td>
                            <td style="width:70px;">状态</td>
                            <td style="width:40px;">焦点</td>
                            <td style="width:100px;">字数</td>
                            <td style="width:20%;">操作</td>
                        </tr>
                        <tbody>
                            <? foreach((array)$list as $k=>$v) {?>
                            <tr>
                                <td><input class="allname" type='checkbox' name='articleid[]' value="<?=$v[id]?>"></td>
                                <td><?=$v[id]?></td>
                                <td width="200"><?=$v[title]?></td>
                                <td><?=$v[title2]?></td>
                                <td><?=$v[p_category_name]?></td>
                                <td><?=$v[author]?></td>
                                <td><? echo date('Y/m/d', $v[uptime]); ?></td>
                                <td><? echo date('Y/m/d', $v[created]); ?></td>
                                <td><? if ($v[state]==4) { ?>已通过<? } else { ?><a href="<?=$php_self?>editstate&id=<?=$v[id]?>&state=<?=$v[state]?>">已生成</a><? } ?></td>
                                <td><? if ($v[ishot]==1) { ?>是<? } else { ?>否<? } ?></td>
                                <td>
                                    中文:<span style="color:#ff0000; font-weight: bold;"><?=$v[hz_total]?></span>个<br>
                                    英文:<span style="color:#ff0000; font-weight: bold;"><?=$v[en_total]?></span>个
                                </td>
                                <td>
                                    <span><i style=" padding-top:2px;"><img src="images/shanchu.png" /></i><a href="#here" class="click_pop_dialog" mt='1' icon='warnning' tourl='<?=$php_self?>del&id=<?=$v['id']?>&type=1'>删除</a></span>
                                    <span><i style=" padding-top:3px;"><img src="images/bi.png" /></i><a href="<?=$php_self?>edit&id=<?=$v[id]?>&a=1">修改信息</a></span>
                                    <span><i style=" padding-top:2px;"><img src="images/luck.png" /></i>
                                        <? if ($v[state]==4) { ?><a href="javascript:void(0)" onclick='tishi()'>查看</a><? } else { ?><a href="<?=$v[url]?>" target="_block">查看</a><? } ?><? if ($v[state]==4) { ?> <a href="<?=$php_self?>preview&id=<?=$v[id]?>" target="_blank">预览</a><? } ?>
                                    </span>
                                    <span><i style=" padding-top:2px;"></i><a href="<?=$php_self?>make&id=<?=$v[id]?>">生成</a></span>
                                    <span><i style=" padding-top:2px;"></i><a href="<?=$php_self?>PicPacking&id=<?=$v[id]?>">批量导出图片</a></span>
                                </td>
                            </tr>
                            <?}?>
                        </tbody>
                              <tr>
                                  <td colspan="10" ><span style="float: left"> <input type="checkbox"  id='allckb'  onclick="allCkb()" style="vertical-align: middle" /> 全选&nbsp;&nbsp;<!--<input type="checkbox"    onclick="unAllCkb()" />全不选&nbsp;&nbsp;--><input type="checkbox" style="vertical-align: middle"   onclick="inverseCkb()" /> 反选</span> <input type="button" value="批量生成" onclick="make()"></td>
                            </tr>
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
                    function checkcategory(id){
         if(id){  
      
            var fact=$('#category_id')[0];
            var facturl="<?=$php_self?>categorylist&id="+id;
            $.getJSON(facturl, function(ret){
                if(ret==1){
                     alert("该频道下暂无内容，你可以去频道添加");
                }else{
                    $('#category_id'+ ' option[value!="0"]').remove(); 
                     $.each(ret, function(i,v){
                        fact.options.add(new Option(v['category_name'], v['id']));
                    });
                }
               
        });

       }else{
           $('#category_id'+ ' option[value!="0"]').remove(); 
       }
     }
            function tishi() {
                alert("请现生成文章");
            }
            function make(){  
                var ids = document.getElementsByName("articleid[]");               
                var flag = false ;               
                for(var i=0;i<ids.length;i++){
                    if(ids[i].checked){
                        flag = true ;
                        break ;
                    }
                }
                if(flag){      
                    $.ajax({
                       type: "POST",
                       url: "<?=$php_self?>Allmake",
                       data: $("#info_form").serialize(),
                       success: function(msg){
                           if(msg==1){
                              alert("已完成");
                           }

                       }
                   });
                }else{
                    alert("你还没有选中");
                }
               
            }
            //反选

            /**
             * 全选
             * 
             * items 复选框的name
             */
            function allCkb(){
               var is =$("#allckb").attr("checked");
               if(is){
                    $('.allname').attr("checked", true);
               }else{
                    $('.allname').attr('checked', false);
               }
              
            }

            /**
             * 全不选
             * 
             */
            function unAllCkb(){
              $('.allname').attr('checked', false);
            }

            /**
             * 反选
             * 
             * items 复选框的name
             */
            function inverseCkb(){
               $("[name='articleid[]']:checkbox").each(function(){
                  //此处用jq写法颇显啰嗦。体现不出JQ飘逸的感觉。
               //$(this).attr("checked", !$(this).attr("checked"));

               //直接使用js原生代码，简单实用
                  this.checked=!this.checked;
               });
            }
            $().ready(function () {
                
                $('.click_pop_dialog').live('click', function () {
                    pop_window($(this), {message: '您确定要删除该文章吗？', pos: [200, 150]});
                });

                $('.article_make_page').click(function () {
                    $.get($(this).attr('tourl'), function (ret) {
                        if ($.trim(ret) > 0) {
                            alert('文章生成成功！');
                        } else {
                            alert('文章生成失败！' + ret);
                        }
                    });
                });
                $('#brand_id').val(<?=$brand_id?>);
                $('#factory_id').val(<?=$factory_id?>);
                $('#series_id').val(<?=$series_id?>);
                $('#article_type').val(<?=$article_type?>);
                $('#brand_id').change(function () {
                    var brand_id = $(this).val();
                    var fact = $('#factory_id')[0];
                    var facturl = "?action=factory-json&brand_id=" + brand_id;
                    var sel = $(this)[0];
                    $('#brand_name').val(sel.options[sel.selectedIndex].text)

                    $.getJSON(facturl, function (ret) {
                        $('#factory_id option[value!=""]').remove();
                        $('#series_id option[value!=""]').remove();
                        $('#model_id option[value!=""]').remove();

                        $.each(ret, function (i, v) {
                            fact.options.add(new Option(v['factory_name'], v['factory_id']));
                        });
                    });
                });

                $('#factory_id').change(function () {
                    var fact_id = $(this).val();
                    var ser = $('#series_id')[0];
                    var serurl = "?action=series-json&factory_id=" + fact_id;
                    var sel = $(this)[0];
                    $('#factory_name').val(sel.options[sel.selectedIndex].text)

                    $.getJSON(serurl, function (ret) {
                        $('#series_id option[value!=""]').remove();
                        $('#model_id option[value!=""]').remove();

                        $.each(ret, function (i, v) {
                            ser.options.add(new Option(v['series_name'], v['series_id']));
                        });
                    });
                });

                $('#series_id').change(function () {
                    var sel = $(this)[0];
                    $('#series_name').val(sel.options[sel.selectedIndex].text)

                    var sid = $(this).val();
                    var mod = $('#model_id')[0];
                    var modurl = "?action=model-json&sid=" + sid;
                    $.getJSON(modurl, function (ret) {
                        $('#model_id option[value!=""]').remove();
                        $.each(ret, function (i, v) {
                            mod.options.add(new Option(v['model_name'], v['model_id']));
                        });
                    });
                });

            });
        </script>  
    </body>
</html>
