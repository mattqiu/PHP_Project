<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>网站后台管理</title>
     <link rel='icon' href='/mcake/Public/Index/images/favicon.png' type='image/x-ico'/>
    <!-- Bootstrap core CSS -->
    <link href="/mcake/Public/Admin/production/css/bootstrap.min.css" rel="stylesheet">
    <link href="/mcake/Public/Admin/production/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="/mcake/Public/Admin/production/css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="/mcake/Public/Admin/production/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/mcake/Public/Admin/production/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="/mcake/Public/Admin/production/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="/mcake/Public/Admin/production/css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="/mcake/Public/Admin/production/js/jquery.min.js"></script>    
</head>

<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                   <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title" style="height:100px;"><div class="profile_pic" >
                            <img class="img-circle profile_img" alt="..." src="/mcake/Public/Admin/production/images/0.jpg">
                        </div></i> <span style="color:#b0916a;font-size:35px;display:block;">M.cake</span></a>
                                               
                    </div>
                    <div class="clearfix" style="font-size:16px;float:right;margin-right:10px;">上海麦心有限公司</div>
                    <div class="clearfix" style="clear:both;"></div>

                    <!-- menu prile quick info -->
                  <!--  <div class="profile">
                        <div class="profile_pic">
                            <img src="/mcake/Public/Admin/production/images/0.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>欢迎您:</span>
                            <h2>Admin管理员</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                           
                            <ul class="nav side-menu"> 
                                <?php  $AUTH = new \Think\Auth(); if($AUTH->check("user", session('admin_id'))){ ?>
                                <li><a><i class="fa fa-group (alias)"></i> 用户管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/auser/index');?>">用户列表</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/auser/add');?>">用户添加</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php  $AUTH = new \Think\Auth(); if($AUTH->check("user", session('admin_id'))){ ?>
                                 <li><a><i class="fa fa-group (alias)"></i> 会员管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/User/index');?>">会员列表</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/User/add');?>">会员添加</a>
                                        </li>
                                    </ul>
                                </li>                                
                                <?php } ?>
                                <?php  $AUTH = new \Think\Auth(); if($AUTH->check("goods", session('admin_id'))){ ?>
                                <li><a><i class="fa fa-codepen"></i> 商品管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/Goods/index');?>">商品列表</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Goods/add');?>">添加商品</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php  $AUTH = new \Think\Auth(); if($AUTH->check("type", session('admin_id'))){ ?>
                                <li><a><i class="fa fa-delicious"></i> 类别管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/Type/index');?>">类别列表</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Type/add');?>">类别添加</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php  $AUTH = new \Think\Auth(); if($AUTH->check("material", session('admin_id'))){ ?>
                                <li><a><i class="fa fa-th-large"></i> 原料管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/Material/index');?>">原料列表</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Material/add');?>">原料添加</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php  $AUTH = new \Think\Auth(); if($AUTH->check("orders", session('admin_id'))){ ?>
                                <li><a><i class="fa fa-joomla"></i> 订单相关<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/Orders/Orders');?>">订单管理</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Orders/fahuodan');?>">发货单管理</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Orders/fapiao');?>">发票管理</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php  $AUTH = new \Think\Auth(); if($AUTH->check("banner", session('admin_id'))){ ?>
                                <li><a><i class="fa fa-area-chart"></i> 轮播管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/Banner/index');?>">BANNER管理</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php  $AUTH = new \Think\Auth(); if($AUTH->check("help", session('admin_id'))){ ?>
                                 <li><a><i class="fa fa-magic"></i> 帮助管理<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/Article/index');?>">文章分类管理
                                        ·发现
                                        ·关于我们·帮助中心</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Article/add');?>">添加分类文章</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <li><a><i class="fa fa-magic"></i>友情链接<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/Flink/index');?>">友链详情</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Flink/add');?>">友链添加</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-magic"></i>广告管理<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/Ad/index');?>">广告浏览</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Ad/add');?>">广告添加</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php  $AUTH = new \Think\Auth(); if($AUTH->check("rules", session('admin_id'))){ ?>
                                <li><a><i class="fa fa-th-large"></i> 权限管理 <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/Group/index');?>">管理组列表</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Rule/index');?>">权限列表</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php  $AUTH = new \Think\Auth(); if($AUTH->check("webconfig", session('admin_id'))){ ?>
                                 <li><a><i class="fa fa-cogs"></i> 网站设置<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo U('Admin/Webconfig/detail');?>">系统信息详情</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Webconfig/index');?>">数据库及网站开关配置</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Webconfig/smail');?>">邮件设置</a>
                                        </li>
                                        <li><a href="<?php echo U('Admin/Webconfig/mesg');?>">短信设置</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="/mcake/Public/Admin/production/images/0.jpg" alt=""><?php echo (session('admin_ausername')); ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    
                                    <li>
                                        <a href="javascript:;">帮助</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo U('Admin/Login/logout');?>"><i class="fa fa-sign-out pull-right"></i>退出</a>
                                    </li>
                                </ul>
                            </li>
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">1</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
                                                <img src="/mcake/Public/Admin/production/images/img.jpg" alt="Profile Image" />
                                            </span>
                                            <span>
                                                <span>Admin</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where... 
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">
                
                
<div class="/mcake/Public/Admin/production/col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>会员列表</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div role="grid" class="dataTables_wrapper" id="example_wrapper">
	            
	        	<div class="clear"></div>
	        	<form action="<?php echo U('Admin/user/index');?>" method="get">
	        	<div id="example_length" class="dataTables_length">
	        		<label>显示 <select name="xianshi" style="width: 56px;height:30px;padding: 6px;" size="1" aria-controls="example">
	        		<option value="6" <?php if(($xianshi) == "6"): ?>selected="selected"<?php endif; ?>>6</option>
	        		<option value="10" <?php if(($xianshi) == "10"): ?>selected="selected"<?php endif; ?>>10</option>
	        		<option value="15" <?php if(($xianshi) == "15"): ?>selected="selected"<?php endif; ?>>15</option>
	        		<option value="30" <?php if(($xianshi) == "30"): ?>selected="selected"<?php endif; ?>>30</option>
	        		</select> 条</label>
	        	</div>
		        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
		            <div class="input-group">
		                <input type="text" style="width:150px;height:30px;float:right" placeholder="用户查找..." class="form-control" name="sou" value="<?php echo ($sou); ?>" />
		                <span class="input-group-btn">
		                	<button class="btn btn-default" style="height:30px;">搜索</button>
		    			</span>
		            </div>
		        </div>
		        </form>
	        	<table class="table table-striped responsive-utilities jambo_table dataTable" id="example" aria-describedby="example_info">
	                <thead>
	                    <tr class="headings" role="row">
	                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 40px;" aria-label="Invoice : activate to sort column ascending">ID </th>
	                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 120px;" aria-label="Invoice Date : activate to sort column ascending">用户名 </th>
	                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 70px;" aria-label="Order : activate to sort column ascending">姓名 </th>
	                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 50px;" aria-label="Bill to Name : activate to sort column ascending">性别</th>
	                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 150px;" aria-label="Status : activate to sort column ascending">邮箱</th>
	                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 80px;" aria-label="Amount : activate to sort column ascending">电话</th>
	                        <th class="no-link last sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width:90px;" aria-label="Action: activate to sort column ascending"><span class="nobr">注册日期</span></th>
	                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 70px;" aria-label="Amount : activate to sort column ascending">状态</th>
	                        <th class="no-link last sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width:130px;" aria-label="Action: activate to sort column ascending"><span class="nobr">操作</span></th>
	                    </tr>
	                </thead>
	            	<tbody role="alert" aria-live="polite" aria-relevant="all">
	            		<?php if(is_array($users)): foreach($users as $key=>$vo): ?><tr class="pointer even">
	                        <td class="  "><?php echo ($vo['id']); ?></td>
	                        <td class="  "><?php echo ($vo['usercount']); ?></td>
	                        <td class="  "><?php echo ($vo['name']); ?></td>
	                        <td class="  "><?php echo ($sex[$vo['sex']]); ?></td>
	                        <td class="  "><?php echo ($vo['email']); ?></td>
	                        <td class="  "><?php echo ($vo['phone']); ?></td>
	                        <td class="  "><?php echo ($vo['addtime']); ?></td>
	                        <td class="  "><?php echo ($state[$vo['state']]); ?></td>
	                        <td>
	                        	 <ul class="nav navbar-right panel_toolbox">
					                
					                <li>
					                    <a href="<?php echo U('Admin/User/edit',array('id'=>$vo['id']));?>"><i class="fa fa-wrench"></i></a>
					                </li>
					                <li>
					                	<a href="<?php echo U('Admin/User/delete',array('id'=>$vo['id']));?>" class="del"><i class="fa fa-close"></i></a>
					                </li>
					                <li>
					                	<a href="<?php echo U('Admin/User/editpass',array('id'=>$vo['id']));?>">修改密码</a>
					                </li>
					            </ul>
	                        </td>
	                    </tr><?php endforeach; endif; ?>
	                </tbody>
                </table>
                <!-- <div class="dataTables_info" id="example_info">显示 <?php echo ($aa); ?> ~ <?php echo ($bb); ?> 条 共 <?php echo ($count); ?> 条</div> -->

                <div class="dataTables_paginate paging_full_numbers" style="width:600px;" id="example_paginate">
                	<?php echo ($pages); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	//双击修改用户名
	$('.pointer td:nth-child(2)').dblclick(function() {
		var v = $(this).html();
		var input = $('<input type="text" />')
		input.val(v);
		var td = $(this);
		$(this).empty();
		$(this).append(input);
		//获取焦点
		input.focus();
		input.select();
		//绑定失去焦点事件
		input.blur(function(){
			//获取值
			var usercount = $(this).val();
			//获取id
			var id = $(this).parents('tr').find('td:first').html();
			//发送ajax
			$.post("<?php echo U('Admin/User/update');?>", {id:id,usercount:usercount}, function(data){
				if(data == 0){
					td.html(usercount);
					alert('更新成功!')
				}else{
					td.html(v);
					alert('更新失败!');
				}
			})
		})
	});

	//删除事件绑定
	$('.del').click(function(){
		var res = confirm('是否要删除此用户?')
		if(res){
			return true;
		}else{
			return false;
		}
	});
</script>

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">上海麦心食品有限公司&nbsp;&nbsp;&nbsp;<a>沪ICP备12022075号</a>. |
                            <span class="lead"> <i class="fa fa-birthday-cake" style="margin-left:5px;margin-right:10px;"></i>M.cake</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
            <!-- /page content -->

        </div>
    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">

        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="/mcake/Public/Admin/production/js/bootstrap.min.js"></script>
   <!-- chart js -->
    <script src="/mcake/Public/Admin/production/js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="/mcake/Public/Admin/production/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="/mcake/Public/Admin/production/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="/mcake/Public/Admin/production/js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="/mcake/Public/Admin/production/js/moment.min.js"></script>
    
    <script src="/mcake/Public/Admin/production/js/custom.js"></script>

    <!-- worldmap -->
    <script type="text/javascript" src="/mcake/Public/Admin/production/js/maps/jquery-jvectormap-2.0.1.min.js"></script>
    
    <!-- /footer content -->
</body>

</html>