<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('header');?>
<!--<?=$edit['state']?>-->
        <form name="article_form" id="article_form" action="index.php?action=article-edit" method="post" enctype="multipart/form-data">
            <div class="airtle-issue">
                <div class="nav">
                    <ul>
                        <li><a href="<?=$php_self?>">文章列表</a></li>
                              <li><a href="<?=$php_self?>seolist">SEO审核列表</a></li>
                        <li><a style="width: 200px;" href="<?=$php_self?>verifylist">待审核文章列表</a></li>
                        <li><a style="width: 200px;" href="<?=$php_self?>typelist">审核意见待处理文章列表</a></li>
                        <li><a style="width: 150px;" href="<?=$php_self?>add" class="song"><? if ($typetitle) { ?><?=$typetitle?>文章编辑<? } else { ?>编辑文章<? } ?></a></li>             
                    </ul>
                </div>

                <div class="clear"></div>
                <div class="issue-con">
                    <div class="con1-table">
                        <table>
                            <tr>
                                <td><span>标题 <input type="text" style="width:350px; border:1px solid #cdcdcd;" name="title" id="title" size="40" value="<?=$article['title']?>" /></span>
                                    <button type="button" class="check"  name="btn_checktitle" id="btn_checktitle">检查标题是否重复</button>  <span id="titles"><b></b> </span>
                                    <!--                                <font style="color:red">*</font><font style="color:blue">请先确定文章标题之后方可以上传文章所需图片！</font>  -->
                                   
                                  
                                    <br />
                                    <span class="zhu"><b>*</b>需填写主标题才能上传</span></td>
                            </tr>
                            <tr>
                                <td>副标题 <input type="text" style=" width:350px; border:1px solid #cdcdcd;" name="title2" id="title2" size="40" value="<?=$article['title2']?>"/></td>
                            </tr>
                            <? if ($comment['ishot']) { ?>
                            <tr>
                                <td class="td_right">文章焦点图（1180*400）：
                                </td>
                                <td class="td_left">
                                    <span style="width: 200px;float: left;"><input id="hot_fileupload" type="file" name="hot_pic"/></span>
                                    <span style="float: left"><input id="hot_pic_name" type="hidden" name="hot_pic_name" value="<?=$article['hot_pic']?>"/> <img <? if (!$article['hot_pic']) { ?>style="display: none"<? } ?> width="132" height="60"margin-left:30px; src="<?=$main_site?>/attach/<?=$article['hot_pic']?>" id="hot_pic"> </span>
                                    <input type="hidden" value="<?=$comment['ishot']?>" name="ishot" id="ishot"/>
                                </td>
                            </tr>
                            <tr>
                                <td>文章焦点图标题：（11个字以内）<input type="text" value="<?=$comment['title3']?>" name="title3" id="title3" maxlength="11"/>
                                </td>

                            </tr>
                            <? } ?>
                        </table>
                        <table>
                            <tr>
                                <td style="">文章所属频道</span></td>
                                <td>一级频道  
                                    <select name="cagegory" onchange="checkcategory(this.value)">
                                        <option value="">选择频道</option>
                                        <? foreach((array)$pcategory as $k=>$v) {?>
                                        <option value="<?=$v[id]?>" <? if ($category['parentid']==$v[id]) { ?>selected="selected"<? } ?>><?=$v[category_name]?></option>
                                        <?}?>
                                    </select>
                                </td>
                                <td>二级频道 <select name="category_id" id="category_id">

                                        <option value="0">选择二级频道</option>
                                        <? if ($categorylist) { ?>
                                        <? foreach((array)$categorylist as $k=>$v) {?>
                                        <option value="<?=$v[id]?>" <? if ($category['id']==$v[id]) { ?>selected="selected"<? } ?>><?=$v[category_name]?></option>
                                        <?}?>
                                        <? } ?>
                                    </select></td> 

                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td >文章涉及车系</td>
                                <td>
                                    <? if (!$service) { ?>
                                    <input type="hidden" id="maxservice" name="maxservice" value="1"/>
                                    <table id="serviceTab" name="serviceTab">
                                        <tr id="serviceTr1" name="serviceTr1">
                                            <td>
                                                <select name="brand_id1" id="brand_id1" onchange="chgBrand(1)">
                                                    <option value="0">==请选择品牌==</option>
                                                    <? foreach((array)$brand as $k=>$v) {?>
                                                    <option value="<?=$v[brand_id]?>"><?=$v[brand_name]?></option>
                                                    <?}?>
                                                </select>   
                                                <select name="factory_id1" id="factory_id1" onchange="chgFactory(1)">
                                                    <option value="0">==请选择厂商==</option>
                                                    <? foreach((array)$factory as $k=>$v) {?>
                                                    <option value="<?=$v[factory_id]?>"><?=$v[factory_name]?></option>
                                                    <?}?>
                                                </select>        
                                                <select name="series_id1" id="series_id1" onchange="chgSeries(1)">
                                                    <option value="0">==请选择车系==</option>
                                                    <? foreach((array)$series as $k=>$v) {?>
                                                    <option value="<?=$v[series_id]?>"><?=$v[series_name]?></option>
                                                    <?}?>                        
                                                </select>      
                                                <input type="hidden" id="series_name1" name="series_name1" />
                                                <input type="hidden" id="article_seriesid1" name="article_seriesid1"/> 

                                            </td>

                                        </tr>
                                    </table>        
                                    <? } else { ?>
                                    <input type="hidden" id="maxservice" name="maxservice" value="<?=$maxservice_id?>"/>
                                    <table id="serviceTab" name="serviceTab">
                                        <? foreach((array)$service as $k=>$v) {?>
                                        <tr id="serviceTr<?=$v[0]?>" name="serviceTr<?=$v[0]?>">
                                            <td>
                                                <select name="brand_id<?=$v[0]?>" id="brand_id<?=$v[0]?>" onchange="chgBrand(<?=$v[0]?>)">
                                                    <option value="0">==请选择品牌==</option>
                                                    <? foreach((array)$v['brand'] as $b) {?>
                                                    <option value="<?=$b[brand_id]?>"><?=$b[brand_name]?></option>
                                                    <?}?>
                                                </select>   
                                                <select name="factory_id<?=$v[0]?>" id="factory_id<?=$v[0]?>" onchange="chgFactory(<?=$v[0]?>)">
                                                    <option value="0">==请选择厂商==</option>
                                                    <? foreach((array)$v['factory'] as $f) {?>
                                                    <option value="<?=$f[factory_id]?>"><?=$f[factory_name]?></option>
                                                    <? } ?>
                                                </select>        
                                                <select name="series_id<?=$v[0]?>" id="series_id<?=$v[0]?>" onchange="chgSeries(<?=$v[0]?>)">
                                                    <option value="0">==请选择车系==</option>
                                                    <? foreach((array)$v['series'] as $s) {?>
                                                    <option value="<?=$s[series_id]?>"><?=$s[series_name]?></option>
                                                    <? } ?>                        
                                                </select>   
                                                <input type="hidden" id="series_name<?=$v[0]?>" name="series_name<?=$v[0]?>" value="<?=$v[4]?>"/>   
                                                <input type="hidden" id="article_seriesid<?=$v[0]?>" name="article_seriesid<?=$v[0]?>" value="<?=$v[article_seriesid]?>"/> 
                                                <a href="javascript:delService(<?=$v[0]?>, <?=$v[3]?>,<?=$v['article_seriesid']?>,'<?=$article['id']?>');">删除</a>                                                                                      
                                            </td>                                    

                                        </tr>
                                        <script>
                                                    $('#brand_id<?=$v[0]?> option[value="<?=$v[1]?>"]').attr({selected:true});
                                                    $('#factory_id<?=$v[0]?> option[value="<?=$v[2]?>"]').attr({selected:true});
                                                    $('#series_id<?=$v[0]?> option[value="<?=$v[3]?>"]').attr({selected:true});</script>                
                                        <? } ?>
                                    </table>             
                                    <? } ?>
                                </td>
                                <td><a href="javascript:apendService();" class="zengcar" style='text-decoration: none'><input type='button' value='增加车系'></a></td>
                            </tr>
                            <tr>
                                <td>文章标签<a href="javascript:apendtagService();">(增加)</a></td>
                                <td>
                                    <? if (!$tagservice) { ?>
                                    <input type="hidden" id="tag_maxservice" name="tag_maxservice" value="1"/>
                                    <table id="tag_serviceTab" name="tag_serviceTab">
                                        <tr id="tag_serviceTr1" name="tag_serviceTr1">
                                            <td>
                                                <select name="tag_id1" id="tag_id1" onchange="chgtag(1)">
                                                    <option value="0">==请选择首字母==</option>
                                                    <? foreach((array)$tag as $k=>$v) {?>
                                                    <option value="<?=$v[letter]?>"><?=$v[letter]?></option>
                                                    <?}?>
                                                </select>   
                                                <select name="tag_name_id1" id="tag_name_id1" onchange="chgtagname(1)">
                                                    <option value="0">==请选择标签==</option>
                                                    <? foreach((array)$tagName as $k=>$v) {?>
                                                    <option value="<?=$v[id]?>"><?=$v[tag_name]?></option>
                                                    <?}?>
                                                </select>        
                                                <input type="hidden" id="tag_name1" name="tag_name1" />  
                                                <input type="hidden" id="article_tagid1" name="article_tagid1" /> 
                                            </td>

                                        </tr>
                                    </table>        
                                    <? } else { ?>
                                    <input type="hidden" id="tag_maxservice" name="tag_maxservice" value="<?=$tag_maxservice_id?>"/>
                                    <table id="tag_serviceTab" name="tag_serviceTab">
                                        <? foreach((array)$tagservice as $k=>$v) {?>
                                        <tr id="tag_serviceTr<?=$v[0]?>" name="tag_serviceTr<?=$v[0]?>">
                                            <td>
                                                <select name="tag_id<?=$v[0]?>" id="tag_id<?=$v[0]?>" onchange="chgtag(<?=$v[0]?>)">
                                                    <option value="0">==请选择首字母==</option>
                                                    <? foreach((array)$v['tag'] as $b) {?>
                                                    <option value="<?=$b[letter]?>"><?=$b[letter]?></option>
                                                    <?}?>
                                                </select>   
                                                <select name="tag_name_id<?=$v[0]?>" id="tag_name_id<?=$v[0]?>" onchange="chgtagname(<?=$v[0]?>)">
                                                    <option value="0">==请选择标签==</option>
                                                    <? foreach((array)$v['tagname'] as $f) {?>
                                                    <option value="<?=$f[id]?>"><?=$f[tag_name]?></option>
                                                    <? } ?>
                                                </select>        
                                                <input type="hidden" id="tag_name<?=$v[0]?>" name="tag_name<?=$v[0]?>" value="<?=$v[4]?>"/> 
                                                <input type="hidden" id="article_tagid<?=$v[0]?>" name="article_tagid<?=$v[0]?>" value="<?=$v[article_tagid]?>"/> 

                                                <a href="javascript:deltagService(<?=$v[0]?>, <?=$v[article_tagid]?>,<?=$v[2]?>,'<?=$article['id']?>');">删除</a>                                                                                      
                                            </td>                                    

                                        </tr>
                                        <script>
                                                    $('#tag_id<?=$v[0]?> option[value="<?=$v[1]?>"]').attr({selected:true});
                                                    $('#tag_name_id<?=$v[0]?> option[value="<?=$v[2]?>"]').attr({selected:true});</script>                
                                        <? } ?>
                                    </table>             
                                    <? } ?>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td class="td_right">文章头图（820*550）：
                                </td>
                                <td class="td_left">
                                    <span style="width: 200px;float: left;"><input id="fileupload" type="file" name="pic"/></span></td>

                                <td><input id="pic_name" type="hidden" name="pic_name" value="<?=$article['pic']?>"/></td><td> <img <? if (!$article['pic']) { ?>style="display: none"<? } ?> width="82" height="60" src="<?=$main_site?>/attach/<?=$article['pic']?>" id="pic"></td>

                            </tr>
                            <tr>
                                <td>申请上新时间</td>
                                <td><input type="text" style=" border:1px solid #e1e1e1;" id="uptime" <? if ($edit['state']==0) { ?>class="datepicker"<? } else { ?>onFocus="this.blur()"<? } ?> type="text" readonly="" size="10" <? if ($article['uptime']) { ?>value="<? echo date('Y-m-d',$article['uptime']) ?>"<? } ?> name="uptime"/></td>
                            </tr>
                            <tr>
                                    <td>特约编辑</td>
                                     <td><input type="text" name="editor" value="<?=$article['editor']?>"></td>
                              </tr>
                              <tr>
                                    <td>摄影人员</td>
                                     <td><input type="text" name="photor" value="<?=$article['photor']?>"></td>
                              </tr>
                            <tr>
                            </tr>
                        </table>
                    </div>

                    <div class="con2-table">
                        <div class="con2-table-left">
                            <table>
                                <tr>
                                    <td>文章导语</td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea class="text1" style="width:580px" id='chief' name="chief"><?=$article['chief']?></textarea>
                                    </td>
                                </tr>
                             
                         
                                <tr>
                                    <td>文章正文</td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea   class="text2" name="ke_text" id="ke_text"><?=$article['content']?></textarea>
                                        <!--p>
                                        您当前输入了 <span class="word_count1">0</span> 个文字。（字数统计包含HTML代码。）<br />
                                        您当前输入了 <span class="word_count2">0</span> 个文字。（字数统计包含纯文本、IMG、EMBED，不包含换行符，IMG和EMBED算一个文字。）
                                        </p-->
                                    </td>
                                </tr>
                                <? if ($type) { ?>
                                <tr>
                                    <td>主编审核意见 <textarea class="text3" name="comment" readonly="readonly"><?=$comment['comment']?></textarea></td>
                                </tr>
                                <tr>
                                    <td>是否修改完成: 是 <input type="radio" class="radio1" name="result" value="1"  /> 否 <input type="radio" name="result" value="2" checked="checked" class="radio2"/></td>
                                   
                                </tr>
                                <? } ?>
                            </table> 
                            <table>
                                <tr>
                                    <input type="hidden" name="id" id="id" value="<?=$article['id']?>" />
                                    <input type="hidden" name="article_id" id="article_id" value="<? if ($a) { ?><?=$article['id']?><? } else { ?><?=$article['article_id']?><? } ?>"/>
                                    <input type="hidden" name="pic_org_id" id="pic_org_id" value="<? if ($article['pic_org_id']) { ?><?=$article['pic_org_id']?><? } else { ?><?=$article['id']?><? } ?>" />
                                    <td  class="tijiao" ><button class="tijiaocoad" id="article_btn" name="article_btn" >提交审核</button></td>
                                    <td  class="baocun"><button type="button" class="baocuncoad" onclick="articlelogs(1)">保存草稿</button></td>
                                </tr>
                            </table>
                        </div> 
                        <div class="con2-table-right">
                            <table>
                                <tr>
                                    <td style=" width:50%; text-align:center;">图片列表</td>
                                    <td><input type="button" value="上传图片" class="shang" onclick="addpics()" /></td>
                                </tr>
                            </table>
                            <div style=" margin-top:5px; height:260px; overflow-x: scroll; overflow-y:scroll; width:250px;">
                              
                                <div style="width:180px;display:block;word-break: break-all;word-wrap: break-word;padding-top: 20px;height: auto">
                                    <ul style="width: 212px;clear: both;" id='tupian_list'>
                                        <? foreach((array)$piclist as $key=>$value) {?>
                                        <li style="width: 70px;float: left;height:65px;margin-top: 4px; "><img class="tishi_pic tishi_<?=$value['id']?>" style='position:relative;padding: 0px;margin: 0px;' onclick="addcontent(this.src, <?=$value['id']?>)" src="<?=$main_site?>/attach/images/article/<? echo date('Y/m/d',$value['created']) ?>/820x540<?=$value['name']?>" width="65" height="65"><img id='tishi_<?=$value['id']?>' src='images/gou.png' style='z-index: 9999;  margin-top: -70px;margin-left:50px;display: none;position:relative;filter:alpha(opacity=70); -moz-opacity:0.7; -khtml-opacity: 0.7; opacity: 0.7;'></li>
                                        <?}?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div> 
                    <div class="clear"></div>

                    </div>
                </div>
        </form>
<script charset="utf-8" src="<?=$relative_dir?>vendor/editor/kindeditor.js"></script>
<script type="text/javascript">
    var editor;
    var hot = $("#ishot").val();
    $(function () { 
        //过去日期不可选
        //  $("input.datepicker").datepicker("option", "minDate", new Date());  

        var files = $(".files"); 
        $("#fileupload").wrap("<form id='myupload' action=\"<?=$php_self?>ajaxArticlePic\" method='post' enctype='multipart/form-data'></form>"); 
        $("#fileupload").change(function(){ 
            $("#myupload").ajaxSubmit({ 
                dataType: 'json', success: function(data) {  $("#pic").css("display","block"); $("#pic").attr("src","<?=$main_site?>/attach/"+data);$("#pic_name").val(data); },
                error:function(xhr){alert("错误")} 
            })
        });
        if(hot){
            $("#hot_fileupload").wrap("<form id='hot_myupload' action=\"<?=$php_self?>ajaxArticlePic\" method='post' enctype='multipart/form-data'></form>"); 
            $("#hot_fileupload").change(function(){ 
                $("#hot_myupload").ajaxSubmit({ dataType: 'json', success: function(data) {  $("#hot_pic").css("display","block"); $("#hot_pic").attr("src","<?=$main_site?>/attach/"+data);$("#hot_pic_name").val(data); },
                   error:function(xhr){alert("错误")} 
                }); 
            });
        }
    }); 
    
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
    //定时提交表单
    //setInterval( "articlelogs(2)" , 18000000 );
    function articlelogs(i){ 
        var title = $("#title").val();
        if(title){
           $.ajax({
               type: "POST",
               url: "<?=$php_self?>Addarticlelogs",
               data: $("#article_form").serialize(),
               success: function(msg){
                   if(i==1){
                      if(msg=='no'){
                          alert("保存到草稿失败");
                       }else{
                           alert("已保存到草稿");
                       }
                   }

               }
           });
        }        
    }
    
    function addcontent(src,id){
         var imgs =  "<img  class='tishi_"+id+" allview' src="+src+">";
         editor.focus();
         kehtml  = editor.html();
         if(kehtml.indexOf(id)>0){
             $("#tishi_"+id).css("display","block");  
             alert("该图片已插入到文章，不能重复使用");
         }else{
             $("#tishi_"+id).css("display","block");
             editor.insertHtml(imgs);
         }
    }
    
    function addpics(){
       var pic_org_id = $("#pic_org_id").val();
       if(pic_org_id){
           //先保存草稿
             $.ajax({
               type: "POST",
               url: "<?=$php_self?>Addarticlelogs",
               data: $("#article_form").serialize(),
               success: function(msg){}
             });
             pic_org_id =  parseInt(pic_org_id)
             var url='<?=$php_self?>ArticlePic&id='+pic_org_id;
           var childWin =   window.open (url, 'newwindow', 'height=600, width=920, top=150, left=300, toolbar=no, menubar=no, scrollbars=yes, resizable=no,location=n o, status=no')
       }else{
           alert("对不起，请先确定标题");
       }
    }
    
    function chgtag(num) {
        var letter = $("#tag_id"+num).val();
        var fact=$('#tag_name_id' + num)[0];
        var facturl="<?=$php_self?>ajaxtag&letter="+letter;

        $.getJSON(facturl, function(ret){
            $('#tag_name_id' + num + ' option[value!="0"]').remove();  
            $.each(ret, function(i,v){
                fact.options.add(new Option(v['tag_name'], v['id']));
            });
        });
    }
    
    function chgtagname(num) {
        $('#tag_name' + num).val($('#tag_name_id'+num+'>option:selected').text());
    } 
    
    function chgBrand(num) {
        var brand_id=$('#brand_id' + num).val();
        var fact=$('#factory_id' + num)[0];
        var facturl="?action=factory-json&brand_id="+brand_id;

        $.getJSON(facturl, function(ret){
            $('#factory_id' + num + ' option[value!="0"]').remove();
            $('#series_id' + num + ' option[value!="0"]').remove();
            $.each(ret, function(i,v){
                fact.options.add(new Option(v['factory_name'], v['factory_id']));
            });
        });
    }

    function chgFactory(num) {
        var fact_id = $('#factory_id' + num).val();
        var ser=$('#series_id' + num)[0];
        var serurl="?action=series-json&factory_id="+fact_id;
        $.getJSON(serurl, function(ret){
            $('#series_id' + num + ' option[value!="0"]').remove();
            $('#model_id' + num + ' option[value!="0"]').remove();
            $.each(ret, function(i,v){
                ser.options.add(new Option(v['series_name'], v['series_id']));
            });
        });    
    } 
    
    function chgSeries(num) {
        $('#series_name' + num).val($('#series_id'+num+'>option:selected').text());
    } 
    
    function delService(id, series_id,article_seriesid,article_id) {
        $('#serviceTr' + id).remove();
        if(series_id) $.get("<?=$php_self?>delarticleseries", {'series_id':series_id,'article_id':article_id,'article_seriesid':article_seriesid});
    }
    
    function apendService() {
        maxService = parseInt($('#maxservice').val()) + 1;
        html = '<tr id="serviceTr' + maxService + '" name="serviceTr' + maxService + '"><td><select name="brand_id' + maxService + '" id="brand_id' + maxService + '" onchange="chgBrand(' + maxService + ')"><option value="0">==请选择品牌==</option><? foreach((array)$brand as $k=>$v) {?><option value="<?=$v[brand_id]?>"><?=$v[brand_name]?></option><?}?></select>' + "\n" + '<select name="factory_id' + maxService + '" id="factory_id' + maxService + '" onchange="chgFactory(' + maxService + ')"><option value="0">==请选择厂商==</option><? foreach((array)$factory as $k=>$v) {?><option value="<?=$v[factory_id]?>"><?=$v[factory_name]?></option><?}?></select>' + "\n" + '<select name="series_id' + maxService + '" id="series_id' + maxService + '" onchange="chgSeries(' + maxService + ')"><option value="0">==请选择车系==</option><? foreach((array)$series as $k=>$v) {?><option value="<?=$v[series_id]?>"><?=$v[series_name]?></option><?}?></select><input type="hidden" id="series_name' + maxService + '" name="series_name' + maxService + '" />' + "\n" + '<input type="hidden" id="article_seriesid' + maxService + '" name="article_seriesid' + maxService + '" />' + "\n" + '<a href="javascript:delService(' + maxService + ')">删除</a></td><td>&nbsp;</td></tr>';
        $('#serviceTab').append(html);    
        $('#maxservice').val(maxService);
    }
    
    function deltagService(id, article_tagid,tag_id,article_id) {
        $('#tag_serviceTr' + id).remove();
        if(tag_id) $.get("<?=$php_self?>delarticletag", {'tag_id':tag_id,'article_id':article_id,'article_tagid':article_tagid});
    }
    
    function apendtagService() {
        maxService = parseInt($('#tag_maxservice').val()) + 1;
        html = '<tr id="tag_serviceTr' + maxService + '" name="tag_serviceTr' + maxService + '"><td><select name="tag_id' + maxService + '" id="tag_id' + maxService + '" onchange="chgtag(' + maxService + ')"><option value="0">==请选择首字母==</option><? foreach((array)$tag as $k=>$v) {?><option value="<?=$v[letter]?>"><?=$v[letter]?></option><?}?></select>' + "\n" + '<select name="tag_name_id' + maxService + '" id="tag_name_id' + maxService + '" onchange="chgtagname(' + maxService + ')"><option value="0">==请选择标签==</option><? foreach((array)$tagname as $k=>$v) {?><option value="<?=$v[id]?>"><?=$v[tag_name]?></option><?}?></select>' + "\n" + '<input type="hidden" id="tag_name' + maxService + '" name="tag_name' + maxService + '" />' + "\n" + '<input type="hidden" id="article_tagid' + maxService + '" name="article_tagid' + maxService + '" />' + "\n"+  '<a href="javascript:deltagService(' + maxService + ')">删除</a></td><td>&nbsp;</td></tr>';
        $('#tag_serviceTab').append(html);    
        $('#tag_maxservice').val(maxService);
    }
    
    $(function() {
        editor = KindEditor.create('#ke_text',{
            width : "580px",
            height: "400px",
            filterMode:false,//是否开启过滤模式;
            uploadJson : '<?=$admin_path?>index.php?action=article-kindedtorpic&type=article&ret=json&sfid=imgFile',
            fileManagerJson: '<?=$admin_path?>index.php?action=article-kindedtorpic&type=article&ret=json&sfid=imgFile',
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

    $('#article_btn').click(function() {
        var arr = new Array("title","title2","chief","pic_name","tag_name1","uptime","category_id","ke_text");
        var arrname = new Array("标题",'副标题','导语','文章头图','文章标签','发表时间','频道','文章内容');
        var str ='';
        var p = $("#pic_org_id").val();
        if(p){
            $.each(arr,function(i,n){
                var  content = $('#'+n).val();
                var str_name = arrname[i];
                if(!content) {
                    str += str_name +'\n'              
                }
            })
            
            if($('#category_id').attr('value')=="0"){
                str += arrname[6] +'\n';
            }  

                    if(str){
                        str +='这些都是必填项！！'
                        alert(str);
                        return false;
                    }else{
                        $('#article_form').submit();
                    }
        }else{
            alert("对不起，请先确定标题");
            return false;
        }
    });
    function show_pic() { 
        var arr = $(".tishi_pic");
        kehtml  = editor.html();
        if(arr){
            $.each(arr,function(i,n){
                 var src =  $(this).attr("src").replace("<?=$main_site?>/attach/","/");  
                 var cl =  $(this).attr("class").split(" ")[1]
                 if(kehtml.indexOf(src)>0){
                     $("#"+cl).css("display","block")
                 }
            })
        }
    }
    $().ready(function(){
        $('#pushto').val(<?=$article['pushto']?>);
        $('#quote_btn').click(function(){
            url = $('#url').val();
            quote_url = $('#quote_url').val();
            if(!url) {
                alert('引用文章地址不能为空,请重新输入！');
                return false;
            }
            window.location.href = "<?=$php_self?>add&id=<?=$article['id']?>&quote_url=" + quote_url + '&url=' + url;
        });       
        $('#btn_checktitle').click(function(){
            if($.trim( $('#title').val()) == ''){
              alert('标题不能为空！');
              $('#title').focus();
              return false;
            }
          
            $.post("<?=$php_self?>rtitle", {title: $('#title').val()}, function(ret){
                if($.trim(ret) != 1){
                    var title =$("#title").val();
                    $.ajax({
                      type: "POST",
                      url: "<?=$php_self?>AddTitle",
                      data: "title="+title, 
                      success: function(msg){
                        if(msg==-4){
                             alert('此标题已使用，可在草稿中查找')
                        }else{
                             //alert(msg);
                             msg = parseInt(msg)+1;
                             if($("#pic_org_id").val() == $("#article_id").val()){
                                $("#pic_org_id").val(msg);
                            }
                            alert('标题可用，没有重复！')
                        }
                      }
                    });
                    
                    
                }else{
                    alert('已经有相同标题文章已经存在！')
                }
                $.unblockUI();
            });
        });
        $('#article_type').val(<?=$article['typeid']?>);
    })
    
    function chg_title(title) {
        $('#from').val($('#quote_url option:selected').text());
        $("#article_type option[value='2']").attr("selected",true)
    }

    function refreshPicList(id){
        var tupian_list='';
        var url='';
        $.ajax({
            type: "GET",
            url: "<?=$php_self?>ArticlePicList",
            data: "id=<? if ($article['pic_org_id']) { ?><?=$article['pic_org_id']?><? } else { ?>"+id+"<? } ?>",
            dataType: 'json',
            success: function(list){
                //if(0)
                {
                for(var i=0;i<list.length;i++){
                    tupian_list += "<li style='width: 70px;float: left;height:65px;margin-top: 4px;'>";
                    tupian_list += "<img class='tishi_pic tishi_"+list[i]['id']+"' style='position:relative;padding: 0px;margin: 0px;'";
                    tupian_list += " onclick='addcontent(this.src, "+list[i]['id']+")'";
                    tupian_list += " src='<?=$main_site?>attach/images/article/"+list[i]['created']+"/820x540"+list[i]['name']+"' width=65 height=65>";
                    tupian_list += "<img id='tishi_<?=$value['id']?>' src='images/gou.png' style='z-index: 9999;";
                    tupian_list += " margin-top: -70px;margin-left:50px;display: none;position:relative;filter:alpha(opacity=70); -moz-opacity:0.7; -khtml-opacity: 0.7; opacity: 0.7;'>";
                    tupian_list += "</li>";
                    //alert(tupian_list);break;
                }
                $('#tupian_list').html(tupian_list);
                editor.focus();
                kehtml  = editor.html();
                $('#tupian_list').children('li').each(function(i){
                    var duigou_class = $(this).children(".tishi_pic").attr("class");
                    var dg =  duigou_class.split(" ")[1];
                    if(kehtml.indexOf(dg)>0){
                        $('.tishi_pic').eq(i).next().css('display','block');
                    }
                })
                }
            }
        });
    }
</script>
</body>
</html>
