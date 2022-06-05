<?= $this->element('common/bread_crumb', ["breadCrumb" => $breadCrumb]) ?>
<?= $this->element('common/page_title', ["H1_main" => $H1_main, "H1_sub" => $H1_sub]) ?>
	
<section class="bg_main-deep color_mono_white  padding_b_xlarge">
	<div class="container_narrow text_center">
		<h2 class="title_h2">
			<p>concept</p>
			<span>コンセプト</span>
		</h2>
		<p class="line_wide">
			I will quote this month’s fountain pen.I will quote this month’s <br>
			fountain pen.I will quote this month’s fountain pen.I will quote this month’s<br>
			fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain <br>
			pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.
		</p>
		<p class="line_wide margin_t_large">
			挨拶文が入ります。挨拶文が入ります。挨拶文が入ります。挨拶文が入ります。挨拶文が入ります。<br>
			挨拶文が入ります。挨拶文が入ります。<br>
			挨拶文が入ります。挨拶文が入ります。挨拶文が入ります。挨拶文が入ります。<br>
			挨拶文が入ります。挨拶文が入ります。挨拶文が入ります。挨拶文が入ります。<br>
			挨拶文が入ります。挨拶文が入ります。挨拶文が入ります。挨拶文が入ります。挨拶文が入ります。<br>
			挨拶文が入ります。挨拶文が入ります。
		</p>
		<p class="family_min margin_t_xlarge">
			ペンワール・ドカタヤマ 店主<br>
			片　山　哲　也
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