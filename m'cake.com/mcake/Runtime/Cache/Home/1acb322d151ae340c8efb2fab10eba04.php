<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

<meta http-equiv="Content-Language" content="zh-CN">
<title>拿破仑蛋糕官网-最好吃的拿破仑蛋糕-MCAKE官网</title>
<meta name="Keywords" content="拿破仑蛋糕,拿破仑蛋糕官网,最好吃的拿破仑蛋糕,Mcake官网">
<meta name="Description" content="MCAKE拿破仑蛋糕，是Mcake经典招牌蛋糕纯正的法国酥皮工艺完美呈现，极尽味觉诱惑，在线便捷预定拿破仑蛋糕，快速的让您感受到拿破仑蛋糕来自巴黎的奇妙美味。">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="cache-control" content="max-age=1800">
<link rel="shortcut icon" href="/mcake/Public/images/icons/favicon.ico">
<link rel="stylesheet" type="text/css" href="/mcake/Public/Index/css/comm_header.css">
<link rel="stylesheet" type="text/css" href="/mcake/Public/Index/css/Landing_city.css">

<link rel="stylesheet" type="text/css" href="/mcake/Public/Index/css/ebsig.css">

<script src="/mcake/Public/Index/js/mv.js" async="" type="text/javascript"></script>
<script src="/mcake/Public/Index/js/mba.js" async="" type="text/javascript"></script>
<script src="/mcake/Public/Index/js/s.js" async="" type="text/javascript"></script>
<script src="/mcake/Public/Index/js/mvl.js" async="" type="text/javascript"></script>
<script src="/mcake/Public/Index/js/v.htm" charset="utf-8"></script><script type="text/javascript" src="/mcake/Public/Index/js/jquery.js"></script>

<script type="text/javascript" src="/mcake/Public/Index/js/superscrollorama.js"></script>

<script type="text/javascript" src="/mcake/Public/Index/js/uaredirect.js"></script>
<script type="text/javascript" src="/mcake/Public/Index/php/iplookup.php"></script>


    <meta charset="utf-8">
    <link type="text/css" href="/mcake/Public/Index/css/Napoleon.css" rel="stylesheet">
    <script type="text/javascript" src="/mcake/Public/Index/js/jquery_002.js"></script>
    <script>
        $(function(){
            //锚点跳转滑动效果
            $('a[href*=#],area[href*=#]').click(function() {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') ) {
                    var target = $(this.hash);
                    target = target.length && target || $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        var targetOffset = target.offset().top;
                        $('html,body').animate({
                            scrollTop: targetOffset
                        }, 500);
                        return false;
                    }
                }
            });

            $(".big_img_box").click(function(){
                $(this).prev().show().animate({"height":"630"});

            });
        });
    </script>
</head>
<body>
<!-- header开始 -->
<a name="top"></a>
<div class="header">
    
    <div class="header_top_box">
        <div class="header_top">
            <div style="width:100%; height:100px; background:#FFF; position:absolute; z-index:9;webkit-box-shadow: 3px 3px 3px #e1e1e1;-moz-box-shadow: 3px 3px 3px #e1e1e1;box-shadow: 3px 3px 3px #e1e1e1">
                <div style="width:100%; height:30px; border-bottom:1px solid #eaeaea">
                    <div class="wallbox wall_top">
                        <div id="scrollobj" style="position:absolute; left:50%;margin-left:-300px;top:0; width:560px; line-height:30px;white-space:nowrap;overflow:hidden; color:#F00"></div>
                        <div class="logoer">
                            <a href="<?php echo U(Home/Index/index);?>">
                                <img src="/mcake/Public/Index/images/logo/logo.png">
                            </a>
                        </div>
                        <ul class="navbar" id="welcome">
                            <?php if(isset($_SESSION['id'])): ?><li><a href="<?php echo U('Home/Members/center');?>" class="Gold">欢迎您<?php echo (session('usercount')); ?></a></li>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <li><a href="<?php echo U('Home/Login/logout');?>" class="Gold" id="clearsession">[&nbsp;退出&nbsp;]</a></li>
                            <?php else: ?>
                                <li><a href="<?php echo U('Home/Login/dologin');?>" class="Gold">LOG IN 登录</a></li>
                                <li>
                                    <a href="<?php echo U('Home/Login/signin');?>" class="Gold">SIGN UP 注册</a>
                                </li><?php endif; ?>
                        </ul>
                        <ul class="navbar">
                            <li class="m_mail" style="display: none;">
                                <a href="http://www.mcake.com/shop/member_message.html" class="Gold" target="_blank"><i></i> <span id="msg_count">0</span>封</a>
                            </li>
                            <li class="m_cart">
                                <a href="<?php echo U('Home/ShopCart/index');?>" class="Gold" target="_blank"><i></i>
                                <span id="cart_amount">
                                    <!--判断件数 session['goodsnum']-->
                                     <?php if(isset($_SESSION['goodsnum'])&&isset($_SESSION['id'])): echo (session('goodsnum')); ?>
                                    <?php else: ?>
                                        <!--判断件数 结束-->
                                        0<?php endif; ?>
                                </span>件</a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="wallbox">
                    <div class="header_right">
                        <ul class="phone_delivery">
                            <li class="phone">
                                <span>4006-678-678</span><i></i>
                            </li>
                            <li class="delivery">
                                <span>
                                    <a href="<?php echo U('Home/Article/express');?>" target="_blank" id="addresscity">北京配送范围免费配送</a>
                                </span><i></i>
                            </li>
                        </ul>
                    </div>
                    <ul class="menu">
                        <li>
                            <a href="<?php echo U('Home/Index/index');?>" class="ebsig_all_goods" target="_blank"><samp>Nos Produits</samp><span>全部产品</span>
                            </a>
                        </li>
                        <li>
                                    
                            <a href="<?php echo U('Home/Napolen/napolen');?>" target="_blank"><samp>Napoléon</samp><span>拿破仑系列</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/Active/index');?>" target="_blank"><samp>Nouveauté</samp><span>最新活动</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/Members/center');?>" target="_blank">
                                <samp>Mon M'CAKE</samp>
                                <span>会员中心</span>
                            </a>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--header 结束 -->
<!-- 公共javascript文件 -->

<script type="text/javascript" src="/mcake/Public/Index/js/jquery-migrate-1.js"></script>
<script type="text/javascript" src="/mcake/Public/Index/js/ebsig.js"></script>
<script type="text/javascript" src="/mcake/Public/Index/js/share.js"></script>


<script type="text/javascript" src="/mcake/Public/Index/js/global.js"></script>
<script type="text/javascript" src="/mcake/Public/Index/js/emt.js"></script>
<iframe src="/mcake/Public/Index/track.htm" style="visibility: hidden; display: none;" height="0" width="0"></iframe>
<script type="text/javascript" src="/mcake/Public/Index/js/showDialog.js"></script>

<script type="text/javascript">

G.cust.show_IDENTIFIER("welcome");

G.cart.comm.get_amount("cart_amount");

G.cust.noReadMessageCount("msg_count");

if(G.args.cache_end_time!=''&&G.args.real_url!=''&&G.args.now_time_stamp>=G.args.cache_end_time){E.ajax_get({url:G.args.real_url});}
</script>

<div style="display:none;">
    <!-- baidu 流量统计代码 -->
    <script type="text/javascript">
        var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F9392e6b9afb7e273ffca27688b6dd036' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script src="/mcake/Public/Index/js/h.js" type="text/javascript"></script>
    <a href="http://tongji.baidu.com/hm-web/welcome/ico?s=9392e6b9afb7e273ffca27688b6dd036" target="_blank">
    <img src="/mcake/Public/Index/images/21.gif" height="20" border="0" width="20"></a>
    <!-- cnzz 流量统计代码 -->
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1000479761'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1000479761' type='text/javascript'%3E%3C/script%3E"));</script>
    <span id="cnzz_stat_icon_1000479761">
    <a href="http://www.cnzz.com/stat/website.php?web_id=1000479761" target="_blank" title="站长统计">站长统计</a>
    </span>
    <script src="/mcake/Public/Index/php/z_stat.php" type="text/javascript"></script>
    <!-- // <script src="/mcake/Public/Index/php/core.php" charset="utf-8" type="text/javascript"></script> -->
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1000488621'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "w.cnzz.com/q_stat.php%3Fid%3D1000488621' type='text/javascript'%3E%3C/script%3E"));</script>
    <span id="cnzz_stat_icon_1000488621"></span>
    <script src="/mcake/Public/Index/php/q_stat.php" type="text/javascript"></script>
    
    <!-- sogou 流量统计代码 -->
    <script type="text/javascript">
        var _sogou_sa_q = _sogou_sa_q || [];
        _sogou_sa_q.push(['_sid', '194181-199319']);
        (function() {
            var _sogou_sa_protocol = (("https:" == document.location.protocol) ? "https://" : "http://");
            var _sogou_sa_src=_sogou_sa_protocol+"hermes.sogou.com/sa.js%3Fsid%3D194181-199319";
            document.write(unescape("%3Cscript src='" + _sogou_sa_src + "' type='text/javascript'%3E%3C/script%3E"));
        })();
    </script>
    <script src="/mcake/Public/Index/js/sa.js" type="text/javascript"></script>
    <script src="/mcake/Public/Index/js/lyb.js" type="text/javascript"></script>
    <!-- mediav 流量统计代码 -->
    <script type="text/javascript">
        var _mvq = _mvq || [];
        _mvq.push(['$setAccount', 'm-26116-0']);
        _mvq.push(['$setGeneral', '', '', '', '']);/*如果不传用户名、用户id，此句可以删掉*/
        _mvq.push(['$logConversion']);
        (function() {
            var mvl = document.createElement('script');
            mvl.type = 'text/javascript'; mvl.async = true;
            mvl.src = ('https:' == document.location.protocol ? 'https://static-ssl.mediav.com/mvl.js' : 'http://static.mediav.com/mvl.js');
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(mvl, s);
        })();
    </script>
    
</div>
<!-- VIZURY 所有其它页面 -->

<!--MK-OT-1004-晶赞业务对接代码部署 ADD BY 赵成龙（jakie.zhao）2015-03-19-->
<!--晶赞retargeting代码部署-->
<script type="text/javascript">
    var productID_list = new Array();
    var cityID = $(".cur").attr("data-id");
</script>
<script type="text/javascript">
    if(cityID==641){
        productID_list = [10333,10529,10506];
    }
    else if(cityID==110){
        productID_list = [10097,10525,10500];
    }
    else if(cityID==665){
        productID_list = [10730,10794,10788];
    }
    var __zp_tag_params = {
        pagetype:"category",
        categoryID: 1,
        status: 1,
        productID_list:productID_list
    };
</script>
<!--晶赞基础代码部署-->

<script type="text/javascript">
    (function(param){
        var c = {query:[], args:param||{}};
        c.query.push(["_setAccount","370"]);/*固定参数*/
        (window.__zpSMConfig = window.__zpSMConfig||[]).push(c);
        var zp = document.createElement("script"); zp.type = "text/javascript"; zp.async = true;
        zp.src = ("https:" == document.location.protocol ? "https:" : "http:") + "//cdn.zampda.net/s.js";
        var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(zp, s);
    })(window.__zp_tag_params);
</script>

<div class="inner_box ching">
    <div class="xunwei"><img src="/mcake/Public/Index/napolen_images/xunwei_03.png"></div>
    <div class="Napoleon_t"><img src="/mcake/Public/Index/napolen_images/Napoleon.png"></div>
    <ul class="pro_raw_list">
        <li id="Vanilla"><a href="#xc"><img src="/mcake/Public/Index/napolen_images/Vanilla_wz_01.png"><span>经典香草拿破仑</span></a></li>
        <li id="Blueberry"><a href="#nm"><img src="/mcake/Public/Index/napolen_images/Blueberry_wz_01.png"><span>蓝莓轻乳拿破仑</span></a></li>
        <li id="npl1893"><a href="#m1893"><img src="/mcake/Public/Index/napolen_images/npl1893_wz_01.png"><span>拿破仑1893</span></a></li>
    </ul>
    <div class="n_btn"><a href="#mm"><img src="/mcake/Public/Index/napolen_images/Secret.png"></a></div>
    <a name="nm" id="nm"></a>
</div>

<div class="inner_box Violet">

    <div class="show_box">
        <!--蓝莓链接-->
        <a href="javascript:void(0)" class="link_map" id="lm"></a>
        <div style="left: 50px; top: 100px; right: 50px;" class="Pro_lm element"> </div>
        <div style="top: 250px;" class="Blueberry_right element"></div>
        <div class="pro_k_box">
            <a href="javascript:void(0)" id="lm_1">
                <p><img src="/mcake/Public/Index/napolen_images/Blueberry_wz_02.png"><span>蓝莓轻乳拿破仑</span></p>
                <p class="border_top">Myrtilles fraiches, bio, feuilletage au goût de beurre frais, marmelade de myrtilles, crème chantilly, ettout celà dans le plaisir du palais .<br>
                    精选野生蓝莓的清爽可口/芝士的香浓/优质奶油的醇厚<br>
                    起酥皮的香脆可口/内层轻乳芝士的松软 层层美味/回味无穷
                </p>
                <p class="w_bg">+ 点击购买  Click to buy +</p>
            </a>
        </div> 
    </div>

    <div class="big_img_box">
        <span><img src="/mcake/Public/Index/napolen_images/Blueberry_Button.png"></span>
    </div>
    <a name="xc" id="xc"></a>
</div>

<div class="inner_box Dark_green">

    <a name="m1893" id="m1893"></a>
    <div class="show_box">
        <!--香草链接-->
        <a href="javascript:void(0)" class="link_map" id="xcnpl"></a>
        <div style="top: 160px;" class="Pro_xc element"></div>
        <div style="right: 450px; top: -500px; left: 450px;" class="Vanilla_left element"></div>
        <div class="pro_k_box">
            <a href="javascript:void(0)" id="xcnpl_1">
                <p><img src="/mcake/Public/Index/napolen_images/Vanilla_wz_02.png"><span>经典香草拿破仑</span></p>
                <p class="border_top">
                    Avec un style typiquement français, ce gâteau unique vous laissera des souvenirs Napoléoniens.<br>
                    纯正的法国风味/香浓绵甜的吉士酱<br>
                    加上香脆起酥皮<br>
                    入口即化/层层美味
                </p>
                <p class="w_bg">+ 点击购买  Click to buy +</p>
            </a>
        </div> 
    </div>

    <div class="big_img_box">

        <span><img src="/mcake/Public/Index/napolen_images/Vanilla_Botton_.png"></span>
    </div>
</div>

<div class="inner_box Cream-colored">

    <div class="show_box">
        <!--1893链接-->
        <a href="javascript:void(0)" class="link_map" id="1893npl"></a>
        <div style="right: 100px; top: 200px; left: 100px;" class="Pro_lpl1893 element"></div>
        <div style="top: 250px;" class="Stir_right element"></div>
        <div class="pro_k_box">
            <a href="javascript:void(0)" id="1893npl_1">
                <p><img src="/mcake/Public/Index/napolen_images/npl1893_wz_02.png"><span>拿破仑1893</span></p>
                <p class="border_top">Depuis sa création en 1893 le restaurant Maxim, en plus de signes ne sont pas remplacés, il ce gâteau.<br>
                    自1893年马克西姆餐厅成立以来，<br>
                    没换过的除了招牌，<br>
                    还有这款蛋糕。
                </p>
                <p class="w_bg">+ 点击购买  Click to buy +</p>
            </a>
        </div> 
    </div>
    <div class="big_img_box">
        <span><img src="/mcake/Public/Index/napolen_images/lpl1893_Bottom.png"></span>
    </div>
</div>

<div class="inner_box Naturals">
    <a name="mm" id="mm"></a>
    <div class="Napoleon_Secret">
        <h1>拿破仑4096的秘密 <img src="/mcake/Public/Index/napolen_images/Footer_fw.png"></h1>
        <p>GMP制药标准的5°C恒温车间完美实现对制作温度的把握，独家创新的4096层酥皮极尽味觉诱惑</p>
        <ul>
            <li><p><span><img src="/mcake/Public/Index/napolen_images/Napoleon_001.png"><br>GMP标准质量管控独创4096层酥皮</span></p><img src="/mcake/Public/Index/napolen_images/napoleon_pro_01.jpg"></li>
            <li><p><span><img src="/mcake/Public/Index/napolen_images/Napoleon_002.png"><br>延续法国百年手艺</span></p><img src="/mcake/Public/Index/napolen_images/napoleon_pro_02.jpg"></li>
            <li><p><span><img src="/mcake/Public/Index/napolen_images/Napoleon_003.png"><br>精选天然原材料</span></p><img src="/mcake/Public/Index/napolen_images/napoleon_pro_03.jpg"></li>
        </ul>

        <p class="Event_rules">
            <span>活动规则</span><br>
            活动仅限订购拿破仑1893、香草拿破仑和蓝莓轻乳拿破仑，不限磅数。<br>
            本次活动最终解释权在法律规定的范围内归MCAKE所有。
        </p>
    </div>
</div>

<!-- footer开始 -->
<div id="footer">
    <!-- 底部小活动li 开始 -->
    <div id="wallbox" class="wallbox">
        <ul class="activity_list" id="activity_list">
            <li>
                <a href="" target="_blank">
                    <img src="/mcake/Public/Index/images/2015072811191115080.jpg" alt="" width="100%">
                </a>
            </li>
            <li>
                <a href="" target="_blank">
                    <img src="/mcake/Public/Index/images/2015082009154299636.jpg" alt="" width="100%">
                </a>
            </li>
            <li>
                <a href="" target="_blank"><img src="/mcake/Public/Index/images/2015070313312260770.jpg" alt="" width="100%">
                </a>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
    <!-- 底部小活动li 结束 -->
    <div class="wallbox_1000">
        <div class="m_copy">
            <ul class="Share">
                <li class="Swb">
                    <a href="http://weibo.com/mcake1893" target="_blank"></a>
                </li>
                <li class="Twx">
                    <a href="javascript:void(0);"></a>
                </li><!--<li class="Tkj"><a href="#"></a></li>-->
            </ul>
            <div class="wxqr"><samp></samp></div>
            <p>Copyright © 2012-2015            </p>
            <p>上海卡法电子商务有限公司 版权所有</p>
            <p class="icp_no">沪ICP备12022075号</p>
            <p class="icp_no">地址：上海市普陀区同普路1130弄3号</p>
            <p class="icp_no">客服热线：4006-678-678</p>
            <p class="icp_no">客服邮箱：cs@mcake.com</p>
        </div>
        <div class="foot_nav_bar">
            <dl>
                <dt>
                    <a href="<?php echo U('Home/Article/express');?>">发现</a>
                </dt>
                <dd>
                    <a href="<?php echo U('Home/Article/express');?>" target="_blank">配送服务</a>
                </dd>
                <dd>
                    <a href="http://weibo.com/mcake1893" target="_blank">微博</a>
                </dd>
            </dl>
            <dl>
                <dt>
                    <a href="<?php echo U('Home/Article/express');?>">关于我们</a>
                </dt>
                <dd>
                    <a href="<?php echo U('Home/Article/index');?>" target="_blank">媒体合作</a>
                </dd>
                <dd>
                    <a href="<?php echo U('Home/Article/job');?>" target="_blank">招贤纳士</a>
                </dd>
                <dd>
                    <a href="<?php echo U('Home/Article/call');?>" target="_blank">呼叫中心</a>
                </dd>
            </dl>
            <dl>
                <dt>
                    <a href="<?php echo U('Home/Article/express');?>">帮助中心</a>
                </dt>
                <dd>
                    <a href="<?php echo U('Home/Article/vip');?>" target="_blank">会员权益</a>
                </dd>
                <dd>
                    <a href="<?php echo U('Home/Article/shop');?>" target="_blank">购物指南</a>
                </dd>
                <dd>
                    <a href="<?php echo U('Home/Article/pay');?>" target="_blank">支付类</a>
                </dd>
                <dd>
                    <a href="<?php echo U('Home/Article/order');?>" target="_blank">订单相关</a>
                </dd>
            </dl>
        </div>
        <div class="m_wb" style="text-align: center;">
            <img src="/mcake/Public/Index/images/icons/wx_icon.png" <="" div="">
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- footer结束 -->
</body>
</html>