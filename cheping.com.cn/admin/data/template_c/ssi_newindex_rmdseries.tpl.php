<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<div class="left_neirong_right">
    <? for($i=0; $i<4; $i++) { ?>
    <div class="left_neirong_tu">
        <? for($j=1; $j<4; $j++) { ?>
        <? $k = $i * 3 + $j ?>
        <? $mid = $result[$k]['model_id'] ?>
        <? $modelPrice = $result[$k]['model_price'] ?>
        <? $bingoPrice = $result[$k]['price'] ?>
        <? $diffPrice = $modelPrice - $bingoPrice ?>        
        <dl>
            <? if ($mid) { ?>
            <dt>
                <a href="offers_<?=$mid?>.html#shangqing_<? echo $result[$k]['id'] ?>" target="_blank">
                    <img class="lazy" width="160" height="120" data-original="/attach/images/model/<?=$mid?>/160x120<? echo $result[$k]['model_pic'] ?>" onerror="this.src='/images/180x100.jpg'">
                    <div class="mouse_show">
                         <em class="bj_show"></em>
                         <span><? echo $result[$k]['series_alias'] ?></span>
                    </div>
                </a>
                <p style="color: rgb(62, 66, 72); text-decoration: none;" title="<? echo $result[$k]['model_name'] ?>" class="mouse_p">
                    <a href="offers_<?=$mid?>.html#shangqing_<? echo $result[$k]['id'] ?>" target="_blank"><? echo mb_substr($result[$k]['model_name'],0, 25,'utf-8') ?></a>
                </p>            
            </dt>            
            <dd>
                <p style="font-size:14px; color:#3e4248;">网络媒体价
                    <span style="color:#ff8f34; margin-left:30px;"><? echo floatval($bingoPrice) ?></span>万
                </p>
                <p style="color:#3e4248;">
                    <span class="left_zhidao">指导价 <? echo floatval($modelPrice) ?>万</span> 
                    <? if ($diffPrice > 0) { ?>
                        <span class="shangjiantou"></span><?=$diffPrice?>万
                    <? } elseif($diffPrice < 0) { ?>
                        <span class="xiajiantou"></span><? echo -1 * $diffPrice ?>万
                    <? } else { ?>
                        <span style="float:left; color:#000;">无优惠</span>
                    <? } ?>
                </p>
            </dd>
            <? } ?>
        </dl>        
        <? } ?>
    </div>
    <? } ?>
</div>