<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<div class="zhihuan_left">
	<p class="zhihuan_left_title">明明白白置换车</p>
	<div class="zhihuan_left_content">
	<div class="zhihuan_left_tu" style="display: none;"><img src="images/scy_zjt_hui.jpg"></div>
	<div style="width: 4000px; left: 0px; position: absolute; float: left; height: 194px;" class="zhihuan_left_dl replace">
	<? for($i=2; $i<4; $i++) { ?>
		<dl>
			<dt>
				<div style="position:relative;" class="zi_h">
					<a href="/offers_<?=$result[$i]['model_id'].'__'.$result[$i]['pricelog_id']?>_0.html#shangqing_<?=$result[$i]['pricelog_id']?>" target="_blank"><img src="/attach/images/model/<?=$result[$i]['model_id']?>/190x142<?=$result[$i]['model_pic1']?>" style="width:190px; height:142px;"></a>
					<div class="hover">
						<em class="bj_show3"></em>
						<span><?=$result[$i]['factory_alias']?> <?=$result[$i]['series_alias']?></span>
					</div>
				</div>
				<p class="img_dibu"><a href="/offers_<?=$result[$i]['model_id'].'__'.$result[$i]['pricelog_id']?>_0.html#shangqing_<?=$result[$i]['pricelog_id']?>" target="_blank"><?=$result[$i]['model_name']?></a></p>
			</dt>
			<dd>
                            <p style=" line-height:30px;"><span style="float:left; font-size:16px;">冰狗暗访价<span style="color:#ff8f34; margin-left:5px;"><?=$result[$i]['bingo_price']?></span>万</span><? if ($result[$i]['markdown'] != 0) { ?><? if ($result[$i]['markdown'] < 0) { ?><span class="xiajiantou"><? } else { ?><span class="shangjiantou1"><? } ?></span><span style="display: inline-block; margin-top: 2px;"><em style="color:#ed5050;font-style: normal;"><?=$result[$i]['markdown']?></em></span>万<? } ?></p>
                            <p class="have_xian2">厂商指导价 <span style="color:#828282;"><?=$result[$i]['model_price']?></span>万</p>
                            <p class="lingqu"><span class="lq"></span>置换补贴领取</p>
                            <p style="line-height:22px; padding-left:11px;">厂商补贴：<?=$result[$i]['car_prize']?></p>
                            <p style="line-height:22px; padding-left:11px;">节能惠民补贴：<?=$result[$i]['conservate']?></p>
                            <p style="line-height:22px; padding-left:11px;">优惠后总价：<span style="color: #ff8f34"><?=$result[$i]['price']?></span>万</p>
                            <p style="line-height:22px; color:#b9b9b9; padding-left:8px;">（暗访价<font color="red">减去</font>各种补贴）</p>
			</dd>
		</dl>
	<? } ?>
	<? foreach((array)$result as $val) {?>
		<dl>
			<dt>
				<div style="position:relative;" class="zi_h">
					<a href="/offers_<?=$val['model_id']?>__<?=$val['pricelog_id']?>_0.html#shangqing_<?=$val['pricelog_id']?>" target="_blank"><img src="/attach/images/model/<?=$val['model_id']?>/190x142<?=$val['model_pic1']?>" style="width:190px; height:142px;"></a>
					<div class="hover">
						<em class="bj_show3"></em>
						<span><?=$val['factory_alias']?> <?=$val['series_alias']?></span>
					</div>
				</div>
				<p class="img_dibu"><a href="/offers_<?=$val['model_id']?>__<?=$val['pricelog_id']?>_0.html#shangqing_<?=$val['pricelog_id']?>" target="_blank"><?=$val['model_name']?></a></p>
			</dt>
			<dd>
				<p style=" line-height:30px;"><span style="float:left; font-size:16px;">冰狗暗访价<span style="color:#ff8f34; margin-left:5px;"><?=$val['bingo_price']?></span>万</span><? if ($val['markdown'] != 0) { ?><? if ($val['markdown'] < 0) { ?><span class="xiajiantou"><? } else { ?><span class="shangjiantou1"><? } ?></span><span style="display: inline-block; margin-top: 2px;"><em style="color:#ed5050;font-style: normal;"><?=$val['markdown']?></em></span>万<? } ?></p>
                                <p class="have_xian2">厂商指导价 <span style="color:#828282;"><?=$val['model_price']?></span>万</p>
                                <p class="lingqu"><span class="lq"></span>置换补贴领取</p>
                                <p style="line-height:22px; padding-left:11px;">厂商补贴：<?=$val['car_prize']?></p>
                                <p style="line-height:22px; padding-left:11px;">节能惠民补贴：<?=$val['conservate']?></p>
                                <p style="line-height:22px; padding-left:11px;">优惠后总价：<span style="color: #ff8f34"><?=$val['price']?></span>万</p>
                                <p style="line-height:22px; color:#b9b9b9; padding-left:8px;">（暗访价<font color="red">减去</font>各种补贴）</p>       
			</dd>
		</dl>
	<? } ?>
	<? for($i=0; $i<2; $i++) { ?>
		<dl>
			<dt>
				<div style="position:relative;" class="zi_h">
					<a href="/offers_<?=$result[$i]['model_id'].'__'.$result[$i]['pricelog_id']?>_0.html#shangqing_<?=$result[$i]['pricelog_id']?>" target="_blank"><img src="/attach/images/model/<?=$result[$i]['model_id']?>/190x142<?=$result[$i]['model_pic1']?>" style="width:190px; height:142px;"></a>
					<div class="hover">
						<em class="bj_show3"></em>
						<span><?=$result[$i]['factory_alias']?> <?=$result[$i]['series_alias']?></span>
					</div>
				</div>
				<p class="img_dibu"><a href="/offers_<?=$result[$i]['model_id'].'__'.$result[$i]['pricelog_id']?>_0.html#shangqing_<?=$result[$i]['pricelog_id']?>" target="_blank"><?=$result[$i]['model_name']?></a></p>
			</dt>
			<dd>
				<p style=" line-height:30px;"><span style="float:left; font-size:16px;">冰狗暗访价<span style="color:#ff8f34; margin-left:5px;"><?=$result[$i]['bingo_price']?></span>万</span><? if ($result[$i]['markdown'] != 0) { ?><? if ($result[$i]['markdown'] < 0) { ?><span class="xiajiantou"><? } else { ?><span class="shangjiantou1"><? } ?></span><span style="display: inline-block; margin-top: 2px;"><em style="color:#ed5050;font-style: normal;"><?=$result[$i]['markdown']?></em></span>万<? } ?></p>
                                <p class="have_xian2">厂商指导价 <span style="color:#828282;"><?=$result[$i]['model_price']?></span>万</p>
                                <p class="lingqu"><span class="lq"></span>置换补贴领取</p>
                                <p style="line-height:22px; padding-left:11px;">厂商补贴：<?=$result[$i]['car_prize']?></p>
                                <p style="line-height:22px; padding-left:11px;">节能惠民补贴：<?=$result[$i]['conservate']?></p>
                                <p style="line-height:22px; padding-left:11px;">优惠后总价：<span style="color: #ff8f34"><?=$result[$i]['price']?></span>万</p>
                                <p style="line-height:22px; color:#b9b9b9; padding-left:8px;">（暗访价<font color="red">减去</font>各种补贴）</p>       
			</dd>
		</dl>
	<? } ?>
	</div>    
	<div class="zhihuan_right_tu" style="display: none;"><img src="images/scy_yjt.jpg"></div>
	</div>
</div>