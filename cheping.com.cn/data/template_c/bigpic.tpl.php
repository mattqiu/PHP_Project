<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('index_header');?>
<div class="content" style=" margin:70px auto;">
    <a name="bigpicc"></a>
    <div class="ckdt_xx">
        <ul class="ckdt_search">
            <li class="peizhi"><a href="modelinfo_<?=$idInfo?>.html" target="_blank">车型</a><img src="images/datu_xian.png" /><a href="param_<?=$idInfo?>.html" target="_blank">配置</a></li>
            <li>
                <select id="modelselect">
                    <? foreach((array)$modelinfo as $milist) {?>
                    <option value="<?=$milist['type_id']?>"><?=$milist['model_name']?></option>
                    <? } ?>
                </select>
                <input type="hidden" id="modelselecthidden" value="<?=$idinfo[0]?>" />
            </li>
            <li class="ckdt_ys">
                <select id="colorselect">
                    <? foreach((array)$colorinfo as $cilist) {?>
                    <option value="<?=$cilist['id']?>"><?=$cilist['pic_color']?></option>
                    <? } ?>
                    <input type="hidden" id="colorselecthidden" value="<?=$idinfo[1]?>" />
                </select>
            </li>


            <li class="ckdt_qita seq1" <? if ($idinfo[2] == 1) { ?>id="qita"<? } ?> seq=1 ct="<?=$countinfo[0]?>"><? if ($countinfo[0]) { ?><a href="bigpic_<?=$idinfo[0]?>_<?=$idinfo[1]?>_1_0.html">外观（<?=$countinfo[0]?>张）</a><? } else { ?><a href="javascript:void(0)">外观（<?=$countinfo[0]?>张）</a><? } ?></li>
            <li class="ckdt_qita">|</li>
            <li class="ckdt_qita seq4" <? if ($idinfo[2] == 4) { ?>id="qita"<? } ?> seq=4 ct="<?=$countinfo[1]?>"><? if ($countinfo[1]) { ?><a href="bigpic_<?=$idinfo[0]?>_<?=$idinfo[1]?>_4_0.html">中控（<?=$countinfo[1]?>张）</a><? } else { ?><a href="javascript:void(0)">中控（<?=$countinfo[1]?>张）</a><? } ?></li>
            <li class="ckdt_qita">|</li>
            <li class="ckdt_qita seq2" <? if ($idinfo[2] == 2) { ?>id="qita"<? } ?> seq=2 ct="<?=$countinfo[2]?>"><? if ($countinfo[2]) { ?><a href="bigpic_<?=$idinfo[0]?>_<?=$idinfo[1]?>_2_0.html">座椅（<?=$countinfo[2]?>张）</a><? } else { ?><a href="javascript:void(0)">座椅（<?=$countinfo[2]?>张）</a><? } ?></li>
            <li class="ckdt_qita">|</li>
            <li class="ckdt_qita seq3" <? if ($idinfo[2] == 3) { ?>id="qita"<? } ?> seq=3 ct="<?=$countinfo[3]?>"><? if ($countinfo[3]) { ?><a href="bigpic_<?=$idinfo[0]?>_<?=$idinfo[1]?>_3_0.html">细节（<?=$countinfo[3]?>张）</a><? } else { ?><a href="javascript:void(0)">细节（<?=$countinfo[3]?>张）</a><? } ?></li>
        </ul>

    </div>

    <div class="ckdt_lunbo">
        <div class="ckdt_tit"><span class="zi1"><?=$seriesinfo['model_name']?></span><span class="zi_fanhui"><a href="image_searchlist_series_id_<?=$seriesinfo['series_id']?>.html">返回图片列表</a></span></div>


        <div id="ckdt_datu">
            <div class="tu_left" style="cursor: pointer;"><img id="left_btn" src="images/tu_left.png" /></div>
            <ul class="datu">
                <li><img src="/attach/images/model/<?=$idinfo[0]?>/<?=$idinfo['3']?>" width="801" height="600" alt="<?=$seriesinfo['model_name']?>"/></li>
            </ul>
            <div class="tu_right" style="cursor: pointer;"><img id="right_btn" src="images/tu_right.png" /></div>
        </div>


        <div class="ckdt_shu">
            <div class="ckdt_s" pos='<?=$prev_pos?>'><img id="shang_btn" src="images/ckdt_ss.png"/></div>
            <input type="hidden" value="<?=$idinfo[0]?>-<?=$idinfo[1]?>-<?=$idinfo[2]?>" id="nexturltype" />
            <div id="ckdt_xiaotu" style="height:535px; overflow:hidden;">
                <ul class="ss_tt" id="ss_ul">
                    <? foreach((array)$colorpic as $cpkey=>$cplist) {?>
                    <li <? if ($nowid==$cplist['id']) { ?>class="ckdt_z focus" id="focusishere"<? } else { ?>class="ckdt_z"<? } ?>><a href="bigpic_<?=$idinfo[0]?>_<?=$idinfo[1]?>_<?=$cplist['pos']?>_<?=$cplist['id']?>.html#bigpicc"><img bid='<?=$cpkey?>' src="/attach/images/model/<?=$cplist['type_id']?>/<? if ($cplist['ppos']<=5 && $cplist['pos']==1) { ?>304x227<? } else { ?>160x120<? } ?><?=$cplist['name']?>" alt="<?=$seriesinfo['model_name']?>"/></a>
                        <? if ($nowid==$cplist['id']) { ?>
                        <input type="hidden" value="<?=$cpkey?>" id="cpkey" />
                        <? } ?>
                    </li>
                    <?}?>
                </ul>
            </div>
            <div class="ckdt_x" pos='<?=$next_pos?>'><img src="images/ckdt_sx.png" /></div>
        </div>
    </div>
    <p class="tu_list"><span class="list_l"><a href="image_searchlist_series_id_<?=$seriesinfo['series_id']?>.html">返回图片列表</a></span><span class="list_r"><a href="/attach/images/model/<?=$idinfo[0]?>/<?=$idinfo['3']?>" target="_blank">查看大图</a></span></p>
    <? if ($competearray) { ?>
    <div class="ckdt_likes">
        <div class="ckdt_like"><span class="like_zi">您可能喜欢</span></div>
        <div class="like_list">
            <ul class="list_tu">
                <? foreach((array)$competearray as $cakey=>$calist) {?>
                <? if ($cakey<4) { ?>
                <li class="tu_a"><div class="tu_img"><a href="image_searchlist_series_id_<?=$calist['s1']?>.html"><img class="lazyimgs" data-original="/attach/images/model/<?=$calist['type_id']?>/304x227<?=$calist['name']?>" src="../images/loading_img/loading161x120.png" alt="<?=$seriesinfo['model_name']?>"/></a></div><span class="tu_zi"><?=$calist['series_name']?></span></li>
                <? } else { ?>
                <li><div class="tu_img"><a href="image_searchlist_series_id_<?=$calist['s1']?>.html"><img class="lazyimgs" data-original="/attach/images/model/<?=$calist['type_id']?>/304x227<?=$calist['name']?>" src="../images/loading_img/loading161x120.png"  alt="<?=$seriesinfo['model_name']?>"/></a></div><span class="tu_zi"><?=$calist['series_name']?></span></li>
                <? } ?>
                <?}?>
            </ul>
        </div>
    </div>
</div>
<? } ?>
<!--//右边浮动-->
<!--<div class="clear"></div>-->
    <script>
        (function() {
            var bct = document.createElement("script");
            bct.src = "/js/counter.php?cname=bigpic&c1=<?=$modelId?>&c2=&c3=";
            bct.src += "&df="+document.referrer;
            document.getElementsByTagName('head')[0].appendChild(bct);
        })();
    </script>