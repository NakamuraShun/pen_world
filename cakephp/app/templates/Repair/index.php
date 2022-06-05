<?= $this->element('common/bread_crumb', ["breadCrumb" => $breadCrumb]) ?>
<?= $this->element('common/page_title', ["H1_main" => $H1_main, "H1_sub" => $H1_sub]) ?>

<section class="padding_b_xlarge">
	<div class="container">
		<div class="text_center family_min font_large margin_v_large">
			あらゆる万年筆の調整を承ります<br>
			年代やメーカーは問いません
		</div>
		<p class="text_center margin_b_xsmall">
			このようなことでお困りの方は<span class="inline_block">ご連絡お待ちしてます</span>
		</p>
		<ul class="row row-cols-2 row-cols-md-3">
			<li>
				<p class="text_center font_medium weight_bold bg_main-light padding_small height_full">
					書き出しにインクが出ない...
				</p>
			</li>
			<li>
				<p class="text_center font_medium weight_bold bg_main-light padding_small height_full">
					インクが途切れる...
				</p>
			</li>
			<li>
				<p class="text_center font_medium weight_bold bg_main-light padding_small height_full">
					カサカサしていてどうも書きにくい...
				</p>
			</li>
			<li>
				<p class="text_center font_medium weight_bold bg_main-light padding_small height_full">
					字幅が太いので細くしたい...
				</p>
			</li>
			<li>
				<p class="text_center font_medium weight_bold bg_main-light padding_small height_full">
					インクの流量を増やしたい...
				</p>
			</li>
			<li>
				<p class="text_center font_medium weight_bold bg_main-light padding_small height_full">
					書き出しにインクが出ない...
				</p>
			</li>
		</ul>
		<h2 class="title_h2" id="FLOW">
			<p>flow</p>
			<span>修理調整の流れ</span>
		</h2>
		<div class="panel text_center margin_b_medium">
			<p>
				修理調整費用はお見積もりにて<span class="inline_block">ご提示させていただきます</span>
			</p>
		</div>
		<div class="row row-cols-md-2">
			<div>
				<section class="panel_repair_flow">
					<div class="repair_flow_count">
						1
					</div>
					<div class="repair_flow_body">
						<div class="repair_flow_header">
							下記情報を明記の上、<br>
							お問い合わせフォームでお申込み下さい
						</div>
						<ul class="list_dot">
							<li>
								万年筆のメーカー、モデル名
							</li>
							<li>
								不具合の内容（吸入不良、ペン先交換、部品交換、ペン先調整など）
							</li>
						</ul>
						<div class="btn_group_block margin_t_large">
							<a href="<?php echo $this->Url->build([ 'controller' => 'contact', 'action' => 'index']); ?>" class="btn_main btn_default">お問い合わせはこちら</a>
						</div>
					</div>
				</section>
			</div>
			<div>
				<section class="panel_repair_flow">
					<div class="repair_flow_count">
						2
					</div>
					<div class="repair_flow_body">
						<div class="repair_flow_header">
							修理の暫定見積り、<br>
							予約可能日時をご連絡いたします
						</div>
						<ul class="list_comment">
							<li>
								木曜、土曜のみ対応しております
							</li>
						</ul>
					</div>
				</section>
			</div>
			<div>
				<section class="panel_repair_flow">
					<div class="repair_flow_count">
						3
					</div>
					<div class="repair_flow_body">
						<div class="repair_flow_header">
							見積りに納得いただけましたら、<br>
							空いている日時で予約をお願い致します
						</div>
						<ul class="list_dot">
							<li>
								備考が入ります
							</li>
							<li>
								備考が入ります
							</li>
						</ul>
					</div>
				</section>
			</div>
			<div>
				<section class="panel_repair_flow">
					<div class="repair_flow_count">
						4
					</div>
					<div class="repair_flow_body">
						<div class="repair_flow_header">
							修理する万年筆をご持参の上、<br>
							ご来店ください
						</div>
						<ul class="list_dot">
							<li>
								最低30分、修理内容によりましては１時間かかる場合もあります
							</li>
							<li>
								ご来店のお客様の対応をしながらの修理となるため、お待たせすることがございますのであかじめご了承下さい
							</li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>

<section class="padding_b_xlarge">
	<div class="container">
		<h2 class="title_h2">
			<p>period</p>
			<span>期間</span>
		</h2>
		<p class="text_sm_center line_wide">
			お持込の場合は状況により当日中にお渡し出来ます。<br>
			まずは「<a href="#FLOW" class="text_link color_main-base">修理調整の流れ</a>」をご確認の上、ご相談下さい。<br>
			宅配便もしくは郵送受付の場合は症状や混雑状況により2週間〜数ヶ月要する場合がございますのでご了承下さい。
		</p>
	</div>
</section>

<section class="padding_b_xlarge">
	<div class="container">
		<h2 class="title_h2">
			<p>payment</p>
			<span>お支払い</span>
		</h2>
		<p class="text_sm_center line_wide">
			クレジットカード決済または指定銀行口座にお振込みお願いします。<br>
			店頭では各種キャッシュレス決済も可能です。
		</p>
	</div>
</section>

<section class="bg_main-low padding_b_large">
	<div class="container">
		<h2 class="title_h2">
			<p>recommend</p>
			<span>おすすめコンテンツ</span>
		</h2>
		<div class="row row-cols-md-3">
			<div>
				<?= $this->element('common/card_recommend_content', [
					"buildURL" => ['controller' => 'items', 'action' => 'index'],
					"thumbURL" => "https://placehold.jp/300x300.png",
					"subTitle" => "fountain pen",
					"mainTitle" => "取扱万年筆",
					"pageDescription" => "簡単な説明文が入ります。簡単な説明文が入ります。簡単な説明文が入ります。"
				]) ?>
			</div>
			<div>
				<?= $this->element('common/card_recommend_content', [
					"buildURL" => ['controller' => 'ownBrand', 'action' => 'index'],
					"thumbURL" => "https://placehold.jp/300x300.png",
					"subTitle" => "own brand",
					"mainTitle" => "自社ブランド",
					"pageDescription" => "簡単な説明文が入ります。簡単な説明文が入ります。簡単な説明文が入ります。"
				]) ?>
			</div>
			<div>
				<?= $this->element('common/card_recommend_content', [
					"buildURL" => ['controller' => 'Articles', 'action' => 'index'],
					"thumbURL" => "https://placehold.jp/300x300.png",
					"subTitle" => "news",
					"mainTitle" => "展示会情報 / お知らせ",
					"pageDescription" => "簡単な説明文が入ります。簡単な説明文が入ります。簡単な説明文が入ります。"
				]) ?>
			</div>
		</div>
	</div>
</section>