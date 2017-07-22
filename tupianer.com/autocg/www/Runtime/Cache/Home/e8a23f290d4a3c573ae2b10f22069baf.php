<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>上传视频</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="/Public/Home/css/uploadopus-bootstrap.css" rel="stylesheet"  type="text/css"> -->
        <!-- <link href="/Public/Home/css/uploadopus-bootstrap-responsive.css" rel="stylesheet"  type="text/css"> -->
        <link href="/Public/Home/css/upload.css" rel="stylesheet"  type="text/css"/>
        <link href="/Public/Home/css/communal.css"  rel="stylesheet"   type="text/css"/>
        <script src="/Public/Home/js/youku-upload.js"></script>
        <script src="/Public/Home/js/jquerya.js"></script>
    </head>
<body>
 <div class="concent">
           <div class="header"  id="heads">
          <!--logo nav-->
                    <ul class="ull">
                      <li class="lil"><a href="#"><img src="/Public/Home/images/logo.png" width="111" height="57" alt="logo" /></a></li>
                      <li class="lil"><a href="#" class="xuanze">首页</a></li>
                      <li class="lil"><a href="#">我要查找</a></li>
                    </ul>
            <!--sousuo-->
                    <div class="sousuo">
                       <form action="#">
                         <input type="text" placeholder="请输入要搜索的内容" class="sousuok" />
                         <input type="submit" value="" class="sousuoa" />
                       </form>
                    </div>
                    <div class="wdlzc" style="display:none">
                       <a href="#">登录</a>&nbsp;/&nbsp;<a href="#">注册</a>
                    </div>
                    <div class="dlzck">
                    
                    <div class="dlzc">
                        <span><img id="tx" src="/Public/Home/images/tx.png" width="44" height="44" style="vertical-align:middle;" /></span>
                              <div id="tanchu">
                                   <ul>
                                      <li>用户名</li>
                                      <li>个人中心</li>
                                      <li>我的收藏</li>
                                      <li>我的关注</li>
                                      <li>我的作品</li>
                                      <li>我的订单</li>
                                      <li>我的交易</li>
                                      <li>我的个人页</li>
                                   </ul>
                                   <div class="tuichu">退出</div>
                              </div>             
               </div>
                <span class="dlzcld">
                <img src="/Public/Home/images/ld.png" width="44" height="44" style="vertical-align:middle;" />
                  <span class="xiaoxi">(2)</span>
                </span>
            </div>   
         </div>
<!--头部结束-->
         <div class="uploadvideo-con">
             <div class="upload-title tab">
                 <ul>
                    <a href="<?php echo U('pic_upload');?>"><li title="uploadpic" >图片</li></a>
                    <a href="<?php echo U('model_upload');?>"><li title="uploadmodel">模型</li></a>
                    <a href="<?php echo U('video_upload');?>"><li title="uploadvideo" class="uploadcss">视频</li></a>
                 </ul>
             </div> 
             <div class="upload-title-con">
                                    
                  <div class="uploadvideo upload" ><!--视频-->
                     <form action="<?php echo U();?>" method="post" enctype="multipart/form-data">
                        <div class="workname inputpub"><!--作品名称-->
                        <label class="padfr fl">作品名称<i>*</i></label>
                        <input type="text"  name="title" class="wnip1 fl marlf"/>
                        <label class="fl px10" style=" font-size:12px">30字以内</label>
                        <div class="clear"></div>
                        </div><!--作品名称结束-->
                        <div class="inline"></div> 
                        <div class="workjj inputpub"><!--作品简介-->
                            <span class="padfr fl">作品简介<i>*</i></span>
                            <textarea name="synopsis" class="fl marlf"></textarea>
                            <label style=" font-size:12px" class="fl px10">1000字以内</label>
                            <div class="clear"></div>
                        </div><!--作品简介结束-->
                        <div class="inline"></div> 
                        <input type="hidden" name="opus_type" value="" />
                        <input type="hidden" name="car_logo" value="" />
                        <input type="hidden" name="car_type" value="" />
                        <input type="hidden" name="car_model" value="" />
                        <input type="hidden" name="year" value="" />
                        <input type="hidden" name="month" value="" />
                        <input type="hidden" name="day" value="" />
                        <input type="hidden" name="select_time" value="" />
                        <input type="hidden" name="state" value="" />
        <script type="text/javascript">
        // 下拉框赋值
              $(function(){

                $('.opus_type_select').children("dd").find("a").click(function(){
                    $("input[name='opus_type']").val($(this).html());
                });

                $('.car_logo_select').children("dd").find("a").click(function(){
                    $("input[name='car_logo']").val($(this).html());
                }); 
 
                $('.car_type_select').children("dd").find("a").click(function(){
                    $("input[name='car_type']").val($(this).html());
                }); 

                $('.car_model_select').children("dd").find("a").click(function(){
                    $("input[name='car_model']").val($(this).html());
                }); 

                $('.year_select').children("dd").find("a").click(function(){
                    $("input[name='year']").val($(this).html());
                }); 
 
                $('.month_select').children("dd").find("a").click(function(){
                    $("input[name='month']").val($(this).html());
                }); 

                $('.day_select').children("dd").find("a").click(function(){
                    $("input[name='day']").val($(this).html());
                });   
                
            })
        </script>
                        <div class="worfl inputpub"><!--作品分类-->
                                    <span class="padfr disblo fl">作品分类<i>*</i></span>
                                   <div class="selecss fl marlf">
                                        <dl class="select wid134 seletop opus_type_select">
                                            <dt>-选择作品分类-</dt>
                                            <dd>
                                                <ul>
                                                    <li><a href="#">机械/交通</a></li>
                                                    <li><a href="#">人物/生物</a></li> 
                                                    <li><a href="#">场景</a></li> 
                                                    <li><a href="#">动画/影视</a></li> 
                                                    <li><a href="#">建筑空间</a></li> 
                                                    <li><a href="#">其他三维</a></li>     
                                                    <li><a href="#">动漫</a></li> 
                                                    <li><a href="#">展览</a></li> 
                                                </ul>
                                            </dd>
                                        </dl>
                                   </div>
                                   <div class="clear"></div>
                        </div><!--作品分类结束-->
                        <div class="inline"></div> 
                         <div class="brand inputpub"><!--品牌产品-->
                                   <span class="padfr disblo fl">品牌产品<i>*</i></span>
                                   <div class="selecss fl marlf">
                                      <dl class="select wid134 seletop car_logo_select">
                                           <dt >-选择品牌-</dt>
                                        <dd>
                                            <ul>
                                                <?php if(!empty($carLogoList)): if(is_array($carLogoList)): $i = 0; $__LIST__ = $carLogoList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carLogo): $mod = ($i % 2 );++$i;?><li><a href="#"><?php echo ($carLogo["brand"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                            </ul>
                                        </dd> 
                                        </dl>
                                        
                                       <dl class="select wid134 seletop car_type_select">
                                            <dt>-选择车系-</dt>
                                            <dd>
                                                <ul>
                                                    <?php if(!empty($carTypeList)): if(is_array($carTypeList)): $i = 0; $__LIST__ = $carTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carType): $mod = ($i % 2 );++$i;?><li><a href="#"><?php echo ($carType["series"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>   
                                                </ul>
                                            </dd> 
                                            <span><input type="text" name="car_type_s" placeholder="请填写车系名称" /></span>
                                        </dl> 
                                        
                                          <dl class="select wid134 seletop car_model_select">
                                            <dt>-选择车款-</dt>
                                            <dd>
                                                <ul>
                                                    <?php if(!empty($carModelList)): if(is_array($carModelList)): $i = 0; $__LIST__ = $carModelList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carModel): $mod = ($i % 2 );++$i;?><li><a href="#"><?php echo ($carModel["car"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>  
                                                </ul>
                                            </dd> 
                                            <span><input type="text" name="car_model_s"  placeholder="请填写车款名称" /></span>
                                        </dl> 
                                   </div>  
                                   <div class="clear"></div>
                        </div><!--品牌产品结束-->
                        <div class="inline"></div>  
                        <div class=" inputpub custom"><!--自定义标签-->
                            <span class="padfr tag fl">自定义标签</span>
                                <input type="text" class="fl marlf" name="tags" />
                                <label style=" font-size:12px" class="fl px10">以逗号或空格隔开</label>
                                <div class="clear"></div>
                        </div><!--<!--自定义标签结束-->
                        <div class="inline"></div> 
                        
                        <div class=" inputpub time"><!--创建时间-->
                            <span class="padfr timezi fl">创建时间<i>*</i></span>
                             <div class="fl marlf">
                                     <dl class="select wid134 seleleft year_select">
                                            <dt>--年--</dt>
                                            <dd>
                                                <ul>
                                                    <?php $__FOR_START_25879__=2013;$__FOR_END_25879__=2023;for($i=$__FOR_START_25879__;$i < $__FOR_END_25879__;$i+=1){ ?><li><a href="#"><?php echo ($i); ?></a></li><?php } ?>
                                                </ul>
                                            </dd>
                                            <span>年</span>
                                        </dl> 
                                        
                                <dl class="select wid134 seleleft month_select">
                                            <dt>--月--</dt>
                                            <dd>
                                                <ul>
                                                    <?php $__FOR_START_15620__=1;$__FOR_END_15620__=13;for($i=$__FOR_START_15620__;$i < $__FOR_END_15620__;$i+=1){ ?><li><a href="#"><?php echo ($i); ?></a></li><?php } ?>     
                                                </ul>
                                            </dd>
                                            <span>月</span>
                                        </dl>
                                <dl class="select wid134 seleleft day_select">
                                            <dt>--日--</dt>
                                            <dd>
                                                <ul>
                                                <?php $__FOR_START_25325__=1;$__FOR_END_25325__=32;for($i=$__FOR_START_25325__;$i < $__FOR_END_25325__;$i+=1){ ?><li><a href="#"><?php echo ($i); ?></a></li><?php } ?>    
                                                </ul>
                                            </dd>
                                            <span>日</span>
                                        </dl> 
                              </div>
                              <div class="clear"></div>
                                
                        </div><!--<!--创建时间结束-->
                        <div class="inline"></div>
                        <div class="inputpub"> 
                           <span class="videoinfor">视频信息:</span>
                        </div>
                        <div class="inline"></div>
                        <div class="surface  inputpub"><!--上传封面图-->
                                   <span class="padfr fl">上传封面图<i>*</i></span>
                                   <input type="" class="fl marlf"/> 
                                   <label><input type="file" name="covers_s" class="flie fl btn" value="上传"></label> 
                                   <div class="clear"></div>
                        </div><!--上传封面图结束-->
                        <div class="inline"></div> 
                        <div class="surface  inputpub"><!--上传视频文件-->
                                   <span class="padfr fl">上传视频文件<i>*</i></span>
                                   <input type="" class="fl marlf" /> 
                                   <label><input type="file" name="video_s" class="flie fl btn" value="上传" /></label>
                                   <div class="clear"></div> 
                        </div><!--上传视频文件结束-->
                        <div class="inline"></div> 
                         <div class="videodisc inputpub"><!--上传视频描述-->
                                   <span class="padfr fl">上传视频描述<i>*</i></span>
                                    <textarea class="marlf text2" name="instruct"></textarea>
                                    <p><span>0</span>/200</p>
                                   <div class="clear"></div> 
                        </div><!--上传视频描述结束-->
                        <div class="inline"></div>
                        <div class="chosesvideo radiocss inputpub"><!--是否同步至官网-->
                                   <span class="padfr fl">是否同步至官网首页<i>*</i></span>
                                   <div class="fl marlf" style=" margin-top:10px;"> 
                                   <label >
                                   是<input type="radio" name="homepage" value="1" checked="checked" class="marlf">
                                   </label>
                                   <label style=" margin-left:40px;">
                                   否<input type="radio"  name="homepage" value="2"  class="marlf">
                                   </label>
                                   </div>
                                   <div class="clear"></div>
                        </div><!--是否同步至官网结束-->
                        <div class="inline"></div> 
                          <div class="inputpub videobanquan"><!--视频版权说明-->                        
                                <input type="checkbox" value="视频版权说明"/>
                                <img src="/Public/Home/images/checked.png" style=" vertical-align:middle;" onclick="javascript:copyright(this);" />
                                <span class="banquan">视频版权说明</span>
                        </div><!--视频版权说明结束-->
                        <div class="inline"></div> 
                         <div class="inputpub videobanquan"><!--同意网站的规则-->                        
                                <input type="checkbox" value="我同意网站的规则"/>
                                <img src="/Public/Home/images/checked.png" style=" vertical-align:middle;" onclick="javascript:site_rule(this);" />
                                <span class="banquan">我同意网站的规则</span>
                        </div><!--同意网站规则结束-->
                        <div class="inline"></div>
                         <div class="anniu">
                             <button type="button" onclick="video_upload('save')" >保存</button>
                             <button type="button" onclick="video_upload('publish')" >发布</button>
                         </div>
                     </form>
                  </div>
             </div><!--视频结束-->     
         </div>
         <div class="footer">
                <div class="guanyv_lianxi">
                <a href="#" target="_blank" class="ys">关于我们</a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="#" target="_blank" class="ys">联系我们</a>
                </div>
                <div class="banquan">
                  版权所有:**********<br />
                  Copyright:2006-2013&nbsp;www.justeasy.cn&nbsp;All&nbsp;rights&nbsp;reserved<br />
                  南京设易网络科技有限公司&nbsp;登记序号：苏ICP备11003578号-2<br />
                </div>
        </div> 
 </div>
 <div class="gjl">
 <a href=""><div class="gjl_1"></div></a>
 <a href=""><div class="gjl_2"></div></a>
 
 <a href=""><div class="gjl_3"></div></a>
 <a href=""><div class="gjl_4"></div></a>
 <a href=""><div class="gjl_5"></div></a>
 <a href="#heads"><div class="gjl_6"></div></a>
</div>
 <script>
    $(function(){
    $('.tab ul a li').click(function(){
      // $(this).addClass('uploadcss').siblings().removeClass('uploadcss')
      var $tab = $(this).attr('title');
         $("." + $tab).show().siblings().hide()
      })
<!--是否销售-->（视频）
   $('.chosevideo label').each(function(){
        $(this).bind('click',function(){
            $('.chosevideo label').removeAttr('class');
            $(this).attr('class', 'checked');
            $('.chosevideo label').find('input').removeAttr('checked', 'checked');
            $(this).find('input').attr('checked', 'checked');
        });
    });
<!--是否同步官网首页-->（视频）
   $('.chosesvideo label').each(function(){
        $(this).bind('click',function(){
            $('.chosesvideo label').removeAttr('class');
            $(this).attr('class', 'checked');
            $('.chosesvideo label').find('input').removeAttr('checked', 'checked');
            $(this).find('input').attr('checked', 'checked');
        });
    });     
  
  $(".select").each(function(){
    var s=$(this);
    var z=parseInt(s.css("z-index"));
    var dt=$(this).children("dt");
    var dd=$(this).children("dd");
    var _show=function(){dd.slideDown(200);dt.addClass("cur");s.css("z-index",z+1);};   //展开效果
    var _hide=function(){dd.slideUp(200);dt.removeClass("cur");s.css("z-index",z);};    //关闭效果
    dt.click(function(){dd.is(":hidden")?_show():_hide();});
    dd.find("a").click(function(){dt.html($(this).html());_hide();});     //选择效果（如需要传值，可自定义参数，在此处返回对应的“value”值 ）
    $("body").click(function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
  })  
  
  $('.chosepic ul li').click(function(){
      var $tab = $(this).attr('title');
      $("."+ $tab).show().siblings().hide();
    })
    
    });
    

   // 模型版权所有认证
 function copyright(obj)
        {  
          var fn=obj.src;
          var pclass = obj.parentNode.getAttribute('class');
          var pdd = obj.parentNode.getAttribute('pdd');
            fn=fn.substring(fn.lastIndexOf("/")+1);
            if(fn=='checked.png'){
                obj.src='/Public/Home/images/checks.png';
                obj.parentNode.setAttribute('class',pclass+' copyright_explain');
                obj.parentNode.setAttribute('pdd',pclass);
            }else{
                obj.src='/Public/Home/images/checked.png';
                obj.parentNode.setAttribute('class',pdd);
                obj.parentNode.removeAttribute('pdd');
            }
        }

// 网站的规则
 function site_rule(obj)
        {  
          var fn=obj.src;
          var pclass = obj.parentNode.getAttribute('class');
          var pdd = obj.parentNode.getAttribute('pdd');
            fn=fn.substring(fn.lastIndexOf("/")+1);
            if(fn=='checked.png'){
                obj.src='/Public/Home/images/checks.png';
                obj.parentNode.setAttribute('class',pclass+' site_rule');
                obj.parentNode.setAttribute('pdd',pclass);
            }else{
                obj.src='/Public/Home/images/checked.png';
                obj.parentNode.setAttribute('class',pdd);
                obj.parentNode.removeAttribute('pdd');
            }
        }
        </script>
        <script type="text/javascript">
 function video_upload(types) {

//判断值 列表
            var title =  $("input[name='title']").val();//作品名称 
            var synopsis = $("textarea[name='synopsis']").val();//作品简介 
            var opus_type = $("input[name='opus_type']").val();//作品类别 
            var car_logo = $("input[name='car_logo']").val();//产品车型-品牌 
            var car_type = $("input[name='car_type']").val();//产品车型-车型
            var car_type_s = $("input[name='car_type_s']").val();//产品车型-车型
            var car_model = $("input[name='car_model']").val();//产品车型-车款
            var car_model_s = $("input[name='car_model_s']").val();//产品车型-车款   
            var tags = $("input[name='tags']").val(); //标签
            var year = $("input[name='year']").val();//创建时间-年
            var month = $("input[name='month']").val();//创建时间-月
            var day = $("input[name='day']").val();//创建时间-日
            var covers_s = $("input[name='covers_s']").val();//作品封面
            var video = $("input[name='video']").val();//上传视频后的id youku
            var video_s = $("input[name='video_s']").val();//上传视频后的id youku 
            var instruct = $("textarea[name='instruct']").val();//视频简介 
            var homepage = $("input[name='homepage']:checked").val();//视频简介
            
            var error_message="";
                if(!title){error_message += '“作品名称” 不能为空\n';}
                if(!synopsis){error_message += '“作品简介” 不能为空\n';}
                if(!opus_type){error_message += '“作品类别” 没有选择\n';}
                if(!car_logo){error_message += '“产品车型-品牌” 不没有选择\n';}
                if(!car_type){
                  if(!car_type_s){
                      error_message += '“车系” 没有选择或不能为空\n';
                  }else{
                      $("input[name='car_type']").val(car_type_s);
                  }
                }else{
                  if(car_type=="其他"){
                    if(!car_type_s){
                      error_message += '“车系” 没有选择或不能为空\n';
                    }else{
                       $("input[name='car_type']").val(car_type_s);
                    }
                  }
                }
                if(!car_model){
                  if(!car_model_s){
                      error_message += '“车款” 没有选择或不能为空\n';
                  }else{
                      $("input[name='car_model']").val(car_model_s);
                  }
                }else{
                  if(car_model=="其他"){
                    if(!car_model_s){
                      error_message += '“车系” 没有选择或不能为空\n';
                    }else{
                       $("input[name='car_model']").val(car_model_s);
                    }
                  }
                }
                if(!tags){error_message += '“自定义标签” 不能为空\n';}
                if(!year){error_message += '“创建时间-年份” 没有选择\n';}
                if(!month){error_message += '“创建时间-月份” 没有选择\n';}
                if(!day){error_message += '“创建时间-日” 没有选择\n';}
                if(year && month && day){
                   $("input[name='select_time']").val(year+','+month+','+day);
                }
                if(!covers_s){error_message += '“封面图” 没有上传\n';}
                if(!instruct){error_message += '“视频描述” 不能为空\n';}
                if(!homepage){error_message += '“是否同步至官网首页” 没有选择\n';}
                if(!$('div').hasClass('copyright_explain')){error_message += '“视频版权说明” 没有选择\n';}
                if(!$('div').hasClass('site_rule')){error_message += '“网站的规则” 未被用户同意\n';}
                
            if(types=='save'){
              $("input[name='state']").val(1);
              if(error_message){
                    alert(error_message); 
                }else{
                  $('form').submit();
                }
            }else if(types=='publish'){
              $("input[name='state']").val(2);
              if(error_message){
                    alert(error_message); 
                }else{
                  $('form').submit();
                }
            }
        }
</script>
 </script>
</body>
</html>