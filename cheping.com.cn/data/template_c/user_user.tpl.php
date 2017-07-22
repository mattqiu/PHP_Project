<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<? include $this->gettpl('user_header');?>
<div class="geren-concent">
    <div class="index-con-left fl"><!--左侧内容开始-->
        <div class="left-main1 ">
            <span><img src="<? if ($users['avatar']) { ?>attach/<?=$users['avatar']?><? } else { ?>images/touxiang.jpg<? } ?>" style="width:100px;height: 105px;"></span>
            <div class="user-mation fr">
                <span class="user-sp"><?=$users['username']?></span>
                <div class="user-nav">
                    <a>我的评论 <span class="number">(<?=$reviewscount?>)</span></a>
                    <a>我的收藏 <span class="number">(<?=$collectcount?>)</span></a>
                    <!--<a href="">系统消息 <span class="number">99</span></a>-->
                </div>  
            </div>
        </div>

        <div class="clear"></div> 

        <div class="left-main-collect">
            <div class="collect-title">
                <span class="titlesp1">我的评论</span>
                <span class="fr titlesp2"><a href="user.php?action=review">更多</a></span>
            </div>
            <? if ($reviewlist) { ?>
            <? foreach((array)$reviewlist as $key=>$value) {?>
            <div class="collect-main">
                <span  class="fl"><img src="<? if ($users['avatar']) { ?>attach/<?=$users['avatar']?><? } else { ?>images/user3.jpg<? } ?>" style="width:50px;height: 51px;"></span>
                <div class="wenzi fl">
                    <span class="wenzisp"><? if ($value['state']==0) { ?>(您的评论未通过审核)<? } elseif($value['state']==1) { ?><?=$value['content']?> (您的评论已经通过审核)<? } else { ?>(正在审核中)<? } ?></span> 
                    <? if ($value['type_id']==1) { ?>
                    <p class="wenzip"><span class="colr1">评论文章：</span><span class="colr2"><a href="/html/article/<? echo date("Ym/d",$value["uptime"]); ?>/<?=$value['caid']?>.html" target="_blank"><?=$value['title']?></a></span></p>
                    <? } else { ?>
                    <p class="wenzip"><span class="colr1">评论文章：</span><span class="colr2"><a href="/video.php?action=ZuiZhong&id=9&ids=<?=$value['caid']?>" target="_blank"><?=$value['title']?></a></span></p>
                    <? } ?>
                </div>
                <div class="time fr">
                    <p class="timep1"><?=$value['time']?></p>
                    <p class="timep2"><a href="/user.php?action=delreview&id=<?=$value['id']?>&type=1c">删除</a></p> 
                </div>
                <div class="clear"></div>
            </div>
            <?}?>
            <? } else { ?>
            <span style="line-height: 40px;font-weight: bold;font-size: 16px;">当前没有评论，评论越多朋友越多噢~</span>
            <? } ?>
        </div>
        <div class="left-main-comment">
            <div class="comment-title">
                <span class="titlesp1">我的收藏</span>
                <span class="fr titlesp2"><a href="/user.php?action=collect">更多</a></span>
            </div> 
            <? if ($collectlist) { ?>
            <? foreach((array)$collectlist as $key=>$value) {?>
            <div class="comment-main">
                <? if ($value['type_id']==1) { ?>
                <span class="fl"><img style="width:101px; height:64px;" src="/attach/<?=$value['pic']?>" /></span>
                <span class="commentsp1 fl"><a href="/html/article/<? echo date("Ym/d",$value["uptime"]); ?>/<?=$value['caid']?>.html" target="_blank"><?=$value['title']?></a></span>
                <? } else { ?>
                <span class="fl"><img style="width:101px; height:64px;" src="/attach/<?=$value['pic']?>" /></span>
                <span class="commentsp1 fl"><a href="/video.php?action=ZuiZhong&id=9&ids=<?=$value['caid']?>" target="_blank"><?=$value['title']?></a></span>
                <? } ?>
                <div class="time fr">
                    <p class="timep1"><?=$value['time']?></p>
                    <p class="timep2"><a href="/user.php?action=updatecollect&id=<?=$value['id']?>">取消收藏</a></p> 
                </div>
                <div class="clear"></div>
            </div>
            <?}?>
            <? } else { ?>
            <span style="line-height: 40px;font-weight: bold;font-size: 16px;">当前没有收藏</span>
            <? } ?>
        </div>   
    </div><!--侧内容开始-->
    <? include $this->gettpl('user_right');?>     
    <div class="clear"></div> 
</div>
<? include $this->gettpl('user_footer');?>
</body>
</html>
