<? if(!defined('SITE_ROOT')) exit('Access Denied');?>
<div class="baojia_right">
	<h3 style="height:30px; line-height:30px; padding-left:7px; background-color:#f5f7f8; font-size:16px; color:#666;">车型PK</h3>
	<div class="PK">
		<? foreach((array)$result as $key=>$val) {?>
		<? if ($key==0) { ?>
				<div style="cursor: pointer; display: block;" class="pk1_hover">
					<div class="pk1_left">
						<a href="/compare_<?=$val[0]['model_id']?>_<?=$val[1]['model_id']?>dabstract.html" target="_blank" title="<?=$val[0]['series_alias']?>">
							<img src="/attach/images/model/<?=$val[0]['model_id']?>/122x93<?=$val[0]['model_pic1']?>" width="105" height="92" onerror="this.src='/images/122x93.jpg'">
						</a>
					</div>
					<div class="pk1_zhong"><a href="/compare_<?=$val[0]['model_id']?>_<?=$val[1]['model_id']?>dabstract.html" target="_blan"><img src="/images/pk_tu.png"></a></div>
					<div class="pk1_right">
						<a href="/compare_<?=$val[0]['model_id']?>_<?=$val[1]['model_id']?>dabstract.html" target="_blan" title="<?=$val[1]['series_alias']?>">
							<img src="/attach/images/model/<?=$val[1]['model_id']?>/122x93<?=$val[1]['model_pic1']?>" width="105" height="92" onerror="this.src='/images/122x93.jpg'">
						</a>
					</div>
				</div>
				<div class="pk1" style="display: none;">
					<ul> 
						<li style="width:129px;"><?=$val[0]['series_alias']?></li>
						<li style="color:#ee0000; width:20px;">PK</li>
						<li style="width:129px;"><?=$val[1]['series_alias']?></li>
					</ul>
				</div>
			<? } else { ?>
					<div class="pk1_hover" style="cursor: pointer; display: none;">
						<div class="pk1_left">
							<a href="/compare_<?=$val[0]['model_id']?>_<?=$val[1]['model_id']?>dabstract.html" target="_blan" title="<?=$val[0]['series_alias']?>">
								<img src="/attach/images/model/<?=$val[0]['model_id']?>/122x93<?=$val[0]['model_pic1']?>" width="105" height="92" onerror="this.src='/images/122x93.jpg'">
							</a>
						</div>
						<div class="pk1_zhong"><a href="/compare_<?=$val[0]['model_id']?>_<?=$val[1]['model_id']?>dabstract.html" target="_blan"><img src="/images/pk_tu.png"></a></div>
						<div class="pk1_right">
							<a href="/compare_<?=$val[0]['model_id']?>_<?=$val[1]['model_id']?>dabstract.html" target="_blan" title="<?=$val[1]['series_alias']?>">
								<img src="/attach/images/model/<?=$val[1]['model_id']?>/122x93<?=$val[1]['model_pic1']?>" width="105" height="92" onerror="this.src='/images/122x93.jpg'">
							</a>
						</div>
					</div>
					<div class="pk1" style="display: block;">
						<ul> 
							<li style="width:129px;"><?=$val[0]['series_alias']?></li>
							<li style="color:#ee0000; width:20px;">PK</li>
							<li style="width:129px;"><?=$val[1]['series_alias']?></li>
						</ul>
					</div>
				</a>
			<? } ?>
		<?}?>
	</div>
</div>