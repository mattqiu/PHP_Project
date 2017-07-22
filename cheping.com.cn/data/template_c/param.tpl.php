<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('index_header');?>

<!--header结束-->

<div class="clear"></div>
<div class="cspz_cont">
    <SCRIPT>

        $(document).ready(function () {
            $('.new_bar input').focus(function () {
                $(this).parent().addClass('new_bar1');
                $(this).css('color', '#000');
            }).blur(function () {
                $(this).parent().removeClass('new_bar1');
                $(this).css('color', '#fff');
            });

            hover_click('new_but');
            /*参数展示模块收缩展开*/
            //$('.para_info tbody tr:last-child th,.para_info tbody tr:last-child td').css('border-bottom','1px solid #cdcdcd');
            $('.para_info .title').click(function () {
                $(this).find('em').toggleClass('down');
                $(this).parents('thead').next('tbody').toggle();
            })

            /*鼠标滑过*/
            $('.para_info tbody tr').hover(function () {
                $(this).addClass('para_hover');
            }, function () {
                $(this).removeClass('para_hover');
            });

            /*展开关闭所有*/
            $('.para_float .toggle a').click(function () {
                if (this.className == "close_all") {
                    $(".para_info > tbody").hide();
                    $('.para_info .title em').removeClass("down");
                } else if (this.className == "dis_all") {
                    $(".para_info > tbody").show();
                    $('.para_info .title em').addClass("down");
                }
                return false;
            });

            /*左移*/
            $('.para_pre').addClass('para_pre_none');
            var para_li = 0, total_li = $('.para_r li').size();
            if (total_li <= 6) {
                $('.para_next').addClass('para_next_none');

            }
            $('.para_table table').css('width', total_li * 165 + 'px');
            $('.para_pre').click(function () {
                if (para_li >= 1) {
                    para_li--;
                    if (para_li == 0) {
                        $(this).addClass('para_pre_none');
                    }
                    //$('.para_next').removeClass('para_next_none');
                    $('.para_next').removeClass('para_next_no');

                }
                $('.para_r ul').animate({'left': -165 * para_li + 'px'});
                $('.para_table table').animate({'left': -165 * para_li + 'px'});
                return false;
            }).focus(function () {
                $(this).blur();
            });
            /*右移*/
            $('.para_next').click(function () {
                if (para_li <= total_li - 6) {
                    para_li++;
                    if (para_li == total_li - 5) {
                        //$(this).addClass('para_next_none');
                        $(this).addClass('para_next_no');

                    }
                    $('.para_pre').removeClass('para_pre_none');

                }
                $('.para_r ul').animate({'left': -165 * para_li + 'px'});
                $('.para_table table').animate({'left': -165 * para_li + 'px'});
                return false;
            }).focus(function () {
                $(this).blur();
            });
            //展开所有
            $('.para_r ul').css('width', total_li * 165 + 'px');
            var scan_btn = true;
            $('.scan_btn').click(function () {
                //  alert(scan_btn);
                if (scan_btn == true) {
                    $('.para_float').css('width', total_li * 165 + 162 + 'px');
                    $('.para_info').css('width', total_li * 165 + 164 + 'px');
                    $('.para_r').css('overflow', 'visible');
                    $('.footer13').css('width', total_li * 165 + 161 + 'px');
                    $('.para_table').css('width', total_li * 165 + 'px');
                    $('.para_r ul').css('left', 0);
                    $('.para_table table').css('left', 0);
                    $('.para_r').find('.para_pre').hide();
                    $('.para_r').find('.para_next').hide();
                    $(this).addClass('scan_btn1');
                    scan_btn = false;
                } else {
                    $('.para_float').css('width', '986px');
                    $('.para_info').css('width', '986px');
                    $('.para_r').css('overflow', 'hidden');
                    $('.footer13').css('width', '961px');
                    $('.para_table').css('width', '800px');
                    $('.para_r ul').css('left', 0);
                    $('.para_table table').css('left', 0);
                    $('.para_r').find('.para_pre').show().addClass('para_pre_none');
                    $('.para_r').find('.para_next').show().removeClass('para_next_none');
                    para_li = 0;
                    $(this).removeClass().addClass('scan_btn');
                    scan_btn = true;
                }
            }).hover(function () {
                if (scan_btn == true) {
                    $(this).removeClass('scan_btn1_hover').addClass('scan_btn_hover');
                } else {
                    $(this).removeClass('scan_btn_hover').addClass('scan_btn1_hover');
                }
            }, function () {
                $(this).removeClass('scan_btn1_hover').removeClass('scan_btn_hover');
            }).focus(function () {
                $(this).blur();
            });

            //筛选条件
            $(".para_t li input[type='checkbox']").click(function () {
                if ($(this).parent("li").children("input:checked").length < 1) {
                    $(this).attr("checked", "true");
                    alert("至少得选择一种" + $(this).parent("li").children("label").eq(0).html());
                    return false;
                }
                ;
                var value = $(this).val();
                var name = $(this).attr("name");

                if ($(this).attr('checked') == 'checked') {
                    $('.' + name + value).show();
                }
                else {
                    $('.' + name + value).hide();
                }

                total_li = $("#newseriesmodel li:not(:hidden)").length;
                $('.para_table table').css('width', total_li * 165 + 'px');
                if (scan_btn == false) {
                    $('.para_table').css('width', total_li * 165 + 'px');
                    $('.para_float').css('width', total_li * 165 + 161 + 'px');
                    $('.para_info').css('width', total_li * 165 + 164 + 'px');
                }
                $('.para_r ul').css({'left': '0px'});
                $('.para_r ul').css({'margin_right': '162px'});
                $('.para_table table').css({'left': '0px'});
                //alert(total_li);
                para_li = 0;
                $('.para_pre').addClass('para_pre_none');
                if (total_li < 6) {
                    $('.para_next').addClass('para_next_none');
                    $('.para_table').css('width', '800px');
                    $('.para_float').css('width', '986px');
                    $('.para_info').css('width', '986px');
                    $(".scan_btn").hide();
                } else {
                    $('.para_next').removeClass('para_next_none');
                    $(".scan_btn").show();
                }
            });
        });

        window.onscroll = windowScroll;
        function windowScroll() {
            var scrollPos;
            if (typeof window.pageYOffset != 'undefined') {
                scrollPos = window.pageYOffset;
            }
            else if (typeof document.compatMode != 'undefined' &&
                    document.compatMode != 'BackCompat') {
                scrollPos = document.documentElement.scrollTop;
            }
            else if (typeof document.body != 'undefined') {
                scrollPos = document.body.scrollTop;
            }
            var a = document.documentElement.scrollTop || document.body.scrollTop;
            var b = Math.ceil($(".series_index ul li").size() / 7) * 20 + 680;
            if (scrollPos >= b) {
                $('.para_float').css({'position': 'absolute', 'top': ((a - b) + 'px')});

            } else {
                $('.para_float').css({'position': 'static'});

            }
        }
        ;
    </SCRIPT>
    <DIV class="wraps">
        <DIV class="top13">
            <DIV class="mid13">
                <DIV class="para cover1">
                    <DIV class="para_wrap">
                        <p style="font-size:18px; color:#585858;  background-color: #F5F7F8;height:36px; line-height:36px; border-bottom:solid 1px #d7dfe4; padding-left:10px;">参数配置</p>
                        <H3 class="para_title">筛选条件</H3>
                        <UL class=para_t style="height: auto">
                            <LI>
                                <LABEL class=label_t>年款</LABEL>
                                <!-- <? foreach((array)$date_id_class as $k=>$v) {?> -->
                                <INPUT id=0-0 value="<?=$k?>" checked="checked" type=checkbox model="<?=$v?>" name="date_id_">
                                <LABEL for=0-0><?=$v?></LABEL>
                                <!-- <?}?> -->
                            </LI>
                            <LI>
                                <LABEL class=label_t>车身形式 </LABEL>
                                <!-- <? foreach((array)$st4_class as $k=>$v) {?> -->
                                <INPUT id=0-0 value="<?=$k?>" checked="checked" type=checkbox model="<?=$v?>" name="st4_">
                                <LABEL for=0-0><?=$v?></LABEL>
                                <!-- <?}?> -->
                            </LI>
                            <LI>
                                <LABEL class=label_t>排量</LABEL>
                                <!-- <? foreach((array)$st27_class as $k=>$v) {?> -->
                                <INPUT id=0-0 value="<?=$k?>" checked="checked" type=checkbox model="<?=$v?>" name="st27_">
                                <LABEL for=0-0><?=$v?></LABEL>
                                <!-- <?}?> -->
                            </LI>
                            <LI>
                                <LABEL class=label_t>变速箱 </LABEL>
                                <!-- <? foreach((array)$st50_class as $k=>$v) {?> -->
                                <INPUT id=0-0 value="<?=$k?>" checked="checked" type=checkbox model="<?=$v?>" name="st50_">
                                <LABEL for=0-0><?=$v?></LABEL>
                                <!-- <?}?> -->
                            </LI>
                            <LI>
                                <a class="scan_btn"> </a>
                            </LI>
                        </UL>
                    </DIV>
                </DIV>
            </DIV>
        </DIV>
    </DIV>
    <DIV class=wrap_para>
        <DIV class=para_wrap1>
            <DIV class=para_float>
                <DIV class=para_l >
                    <UL class=tip>
                        <LI class=black>标配 </LI>
                        <LI class=white>选配 </LI>
                        <LI>-- 无 </LI>
                    </UL>
                    <UL class=toggle>
                        <LI><A class="close_all" href="javascript:void(-1);">收起所有</A></LI>
                        <LI><A class="dis_all" href="javascript:void(-1);">打开所有</A> </LI>
                    </UL>
                </DIV>

                <div class="para_r">
                    <a href="javascript:void(-1);" class="para_pre para_pre_none"><em></em></a>
                    <ul id="newseriesmodel" style="width: 1760px; left: 0px;">
                        <!-- <? foreach((array)$paramlist as $key=>$value) {?> -->
                        <li tag="1,2,3,4"  class="<?=$value['date_id_class']?> <?=$value['st4_class']?> <?=$value['st27_class']?> <?=$value['st50_class']?>"><a  href="modelinfo_<?=$value['model_id']?>.html"  target="_blank"><?=$value['model_name']?></a> </li>
                        <!-- <?}?> -->	
                    </ul>
                    <A class=para_next href="javascript:void(-1);"><em></em></A>
                </div>
            </DIV>
        </DIV>
        <TABLE id=para_info class=para_info>
            <!-- <? foreach((array)$attr as $key=>$value) {?> -->
            <THEAD>
                <TR>
                    <TD colSpan=6><DIV class=title><EM class="down"></EM><?=$key?></DIV></TD>
                </TR>
            </THEAD>
            <TBODY class=para_title>
                <? $i=0; ?>  
                <!-- <? foreach((array)$value as $kk=>$vv) {?> -->
                <TR class="<? if ($i%2!=0) { ?>odd<? } ?>">
                    <TH ><?=$kk?></TH>
                    <TD colSpan=5>
                        <DIV class="para_table">
                            <TABLE>
                                <TBODY>
                                    <TR class="para_tr">
                                        <!-- <? foreach((array)$vv as $k=>$v) {?> -->
                                        <TD tag="1,2,3,4"  class="<?=$v[1]?> <?=$v[2]?> <?=$v[3]?> <?=$v[4]?>"><?=$v['0']?></TD>
                                        <!-- <?}?> -->
                                    </TR>
                                </TBODY>
                            </TABLE>
                        </DIV>
                    </TD>
                </TR>
                <? $i=$i+1; ?>
                <!-- <?}?> -->
            </TBODY>
            <!-- <?}?> -->
        </TABLE>
    </DIV>
</DIV>
    <script>
        (function() {
            var bct = document.createElement("script");
            bct.src = "/js/counter.php?cname=param&c1=<?=$model['model_id']?>&c2=&c3=";
            bct.src += "&df="+document.referrer;
            document.getElementsByTagName('head')[0].appendChild(bct);
        })();
    </script>
<? include $this->gettpl('index_footer');?>