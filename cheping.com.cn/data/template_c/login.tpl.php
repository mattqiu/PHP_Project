<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('index_header');?>
<script>
    function sub_from(){
       var name = $("#name").val();
       var password =  $("#password").val();
       var is  = $("#type").attr("checked");
       if(is){
            var type = $("#type").val();
       }else{
            var type = 0;
       }
      
       
       if(!name||!password){
           $(".cuowu").show();
       }else{
           $.post("/login.php?action=checklogins",{"name":name,"password":password,'type':type},function(msg){
                if(msg==-1){
                     $(".cuowu").show();
                }else{
                    var arr = eval('(' + msg + ')');                  
                    window.location.href= arr['url']; 
                }
            })
            return false;
            //$("#sub_form").submit();
       }
       
    }
</script>
<div class="denglu_main">
   <div class="zc_main_t">
     <div class="zhuce_bt">登录</div>
	 <div class="zhuce_bt1">每天推出精品车评咨询、视频等内容，定期为车评会员举办各种线下体验活动，还不赶快加入我们</div>
	 <div class="denglu"><a href="register.php">注册</a></div>
   </div>
   <hr color="#A2A2A2" style="margin-top:-20px;"/>
 
   <div class="dl_main_b">
   <form id="sub_form" method="post"  action="login.php">
      <div class="yonghuming">用户名/手机号</div>
	  <input type="text" id='name' name='name' class="yhmtxt">
	  <div class="mima">密码</div>
	  <input type="password" id='password' name='password' class="password"><br />
      <input name="type" id='type' type="checkbox" value="1" class="zddl" />&nbsp;下次自动登录
	  <div  class="wangji"><a href="/login.php?action=getpassword">忘记密码？</a></div>
	  <div class="dl_anniu">
	  <a href="javascript:void(0)" onclick='sub_from()'><img src="images/denglu.jpg"></a>
	  </div>
	  <div class="cuowu" style="display:none; ">您输入的用户名/密码有误</div>
     </form>
<!--	  <div class="qitazhanghao">其他账号登录</div>
	  <div class="zh"><a href="#"><img src="images/qq.jpg"></a></div>
	  <div class="zhz"><a href="#">腾讯QQ</a></div>
	  <div class="zh1"><a href="#"><img src="images/xl.jpg"></a></div>
	  <div class="zhz1"><a href="#">新浪微博</a></div>
	  <div class="zh2"><a href="#"><img src="images/tx.jpg"></a></div>
	  <div class="zhz2"><a href="#">腾讯微博</a></div>-->
   </div>
</div>
<div class="banquan" style="background-color:#141414; width:100%;height:auto; color:#999; text-align:center; padding-top:30px;padding-bottom:30px; font-size:14px;">
京ICP备:05067646&nbsp;&nbsp;|&nbsp;&nbsp;京公网安备:1101055366&nbsp;&nbsp;|&nbsp;&nbsp;Copyright&copy; 2005-2015&nbsp;&nbsp;|&nbsp;&nbsp;www.cheping.com.cn,All Rights Reserved&nbsp;&nbsp;ams车评网&nbsp;&nbsp;版权所有
</div>
<script type="text/javascript">
    //(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
//            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
//            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
//            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
//            ga('create', 'UA-65271533-1', 'auto');
//            ga('send', 'pageview');
//            
//var _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "//hm.baidu.com/hm.js?dc8e773ec8ea678079073eb92e8dbe92";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
  
    //版权定位
    var banquan = $('.banquan').offset().top;
    var pingmu = $(window).height();
    var position = pingmu-banquan-80;
    position = parseInt(position)+"px";
    $('.banquan').before('<div style="width:100%;height:'+position+';"></div>');
})();

</script>
</body>
</html>