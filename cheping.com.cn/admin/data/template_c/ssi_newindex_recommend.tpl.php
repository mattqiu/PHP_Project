<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<div class="left_xia">
	<div class="left_neirong_bottom">
		<h3 class="bottom_title_h3">猜你喜欢</h3>
		<div  class="bottom_title" style="margin-top:-15px;"><span style="font-size:12px; color:#000; cursor:pointer" class="right_huan" id="change_recommend" ><img title="" src="images/ckyx_cheng.png">换一批</span></div>
		<div class="bottom_content" id="newindex_change_modellist">
		<? foreach((array)$result[0] as $key=>$val) {?>
			<dl>
				<dt>
					<a href="/modelinfo_s<?=$val['series_id']?>.html" target="_blank">
						<img width="122" height="93" src="/attach/images/model/<?=$val['model_id']?>/122x93<?=$val['model_pic1']?>" onerror="this.src='/images/122x93.jpg'"/>
					</a>
				</dt>
				<dd>
					<p style="font-size:12px; color:#000; line-height:30px"><?=$val['factory_name']?></p>
					<p style=" line-height:30px;"><a href="/modelinfo_s<?=$val['series_id']?>.html" target="_blank"><?=$val['series_name']?></a></p>
					<p style=" line-height:30px;"><?=$val['price']?>万起</p>
				</dd>
			</dl>
		<?}?>
		</div>
	</div>
</div>