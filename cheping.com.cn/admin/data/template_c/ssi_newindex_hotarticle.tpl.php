<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<div class="news_zhong">
    <div class="news_title">
        <h3 style="float:left; margin-left:12px; font-size:16px;">热点新闻</h3>
        <span style="float:right; font-size:12px;"><a href="article.php?action=CarReview&id=7" target="_blank">更多</a></span>
    </div>
    <? foreach((array)$result as $k=>$v) {?>
        <div class="<? if ($k < 4) { ?>news_title_01<? } else { ?>news_title_02<? } ?>">
            <a target="_blank" href="<?=$v['url']?>" title="<?=$v['title']?>">
                <? if ($k < 4) { ?>
                <? echo mb_substr($v['title'], 0, 18,'utf-8') ?>
                <? } else { ?>
                <? echo mb_substr($v['title'], 0, 22,'utf-8') ?>
                <? } ?>
            </a>
        </div>
    <?}?>
</div>