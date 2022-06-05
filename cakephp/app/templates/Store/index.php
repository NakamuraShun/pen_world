<?= $this->element('common/bread_crumb', ["breadCrumb" => $breadCrumb]) ?>
<?= $this->element('common/page_title', ["H1_main" => $H1_main, "H1_sub" => $H1_sub]) ?>
	
<div class="container">
	<div class="padding_v_xlarge">
		<div class="row justify_center">
			<div class="col-sm-8 text_center">
				<a href="#access" class="btn_main btn_anchor">店舗までの道のり</a>
			</div>
			<div class="col-sm-8 text_center">
				<a href="#company" class="btn_main btn_anchor">企業情報</a>
			</div>
		</div>
		<?php // 道のり ?>
		<section id="access">
			<h3 class="title_h3">
				<p>access</p>
				<span>店舗までの道のり(〇〇駅からの道順)</span>
			</h3>
			<div class="row row-cols-sm-2">
				<div class="card_access">
					<figure>
						<?= $this->Html->image("https://placehold.jp/690x420.png", [ 'class' => '', 'alt' => 'altテキスト']); ?>
					</figure>
					<div class="access_body">
						<div class="access_number">
							<p>
								<span>1</span>
							</p>
						</div>
						<p class="access_desc">
							道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。
						</p>
					</div>
				</div>
				<div class="card_access">
					<figure>
						<?= $this->Html->image("https://placehold.jp/690x420.png", [ 'class' => '', 'alt' => 'altテキスト']); ?>
					</figure>
					<div class="access_body">
						<div class="access_number">
							<p>
								<span>2</span>
							</p>
						</div>
						<p class="access_desc">
							道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。
						</p>
					</div>
				</div>
				<div class="card_access">
					<figure>
						<?= $this->Html->image("https://placehold.jp/690x420.png", [ 'class' => '', 'alt' => 'altテキスト']); ?>
					</figure>
					<div class="access_body">
						<div class="access_number">
							<p>
								<span>3</span>
							</p>
						</div>
						<p class="access_desc">
							道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。
						</p>
					</div>
				</div>
				<div class="card_access">
					<figure>
						<?= $this->Html->image("https://placehold.jp/690x420.png", [ 'class' => '', 'alt' => 'altテキスト']); ?>
					</figure>
					<div class="access_body">
						<div class="access_number">
							<p>
								<span>4</span>
							</p>
						</div>
						<p class="access_desc">
							道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。道のりが入ります。
						</p>
					</div>
				</div>				
			</div>
			<section>
				<h3 class="title_h4">
					GoogleMap
				</h3>
				<div class="row">
					<div class="col-md-16">
						<div class="ratio_double">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.8272554407845!2d139.7710565154512!3d35.70586833622742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ea073f361a1%3A0xe09cce5967ca5132!2z44CSMTEwLTAwMDUg5p2x5Lqs6YO95Y-w5p2x5Yy65LiK6YeO77yT5LiB55uu77yR77yY4oiS77yR77yS!5e0!3m2!1sja!2sjp!4v1630144825587!5m2!1sja!2sjp" class="google_map" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
					<div class="col-md-8">
						<p>
							〒110-0005<br>
							東京都台東区上野3-18-12 <span class="inline_block">(目印：上野アテネ看板下1階)</span>
						</p>
						<p class="margin_t_xsmall">
							3-18-12, Ueno, Taito-ku, Tokyo
						</p>
					</div>
				</div>
			</section>
		</section>
		<?php // 企業情報 ?>
		<section id="company">
			<h2 class="title_h3">
				<p>company</p>
				<span>企業情報</span>
			</h2>
			<table class="table_respo">
				<tr>
					<th>屋号</th>
					<td>ペンワールド・カタヤマ</td>
				</tr>
				<tr>
					<th>代表</th>
					<td>片山 哲也</td>
				</tr>
				<tr>
					<th>連絡先</th>
					<td>
						TEL：<a href="tel:+81-90-1888-7761">TEL:090-1888-7761 <span class="inline_block">(スマホの方はタップすると発信できます)</span></a><br>
						FAX：048-857-5683<br>
						携帯：090-1888-7761
					</td>
				</tr>
				<tr>
					<th>事務所</th>
					<td>
						〒338-0811<br>
						埼玉県さいたま市桜区白鍬103-9
					</td>
				</tr>
				<tr>
					<th>展示場</th>
					<td>
						<p>
							〒110-0005<br>
							東京都台東区上野3-18-12 <span class="inline_block">(目印：上野アテネ看板下1階)</span>
						</p>
						<p class="margin_t_xsmall">
							3-18-12, Ueno, Taito-ku, Tokyo
						</p>
					</td>
				</tr>
			</table>
		</section>
	</div>
</div>
	
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