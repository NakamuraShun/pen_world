<?= $this->element('common/bread_crumb', ["breadCrumb" => $breadCrumb]) ?>
<?= $this->element('common/page_title', ["H1_main" => $H1_main, "H1_sub" => $H1_sub]) ?>
	
<section class="bg_main-deep color_mono_white  padding_b_xlarge">
	<div class="container_narrow">
		<h2 class="title_h2">
			<p>kmk</p>
			<span>KMKとは</span>
		</h2>
		<section>
			<h3 class="family_min font_xlarge margin_b_small">
				<p class="line_narrow">
					The title will be entered here.The title will be entered here.
				</p>
				<p class="margin_t_xsmall">
					ここにタイトルが入ります。ここにタイトルが入ります。
				</p>
			</h3>
			<figure class="margin_b_small">
				<?= $this->Html->image("https://placehold.jp/800x495.png", [ 'class' => '', 'alt' => 'altテキスト']); ?>
				<figcaption class="text_center text_sub margin_t_xsmall">
					キャプションが入ります
				</figcaption>
			</figure>
			<p>
				I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.
			</p>
			<p class="margin_t_small">
				概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。
			</p>
		</section>
		<hr>
		<section>
			<h3 class="family_min font_xlarge margin_b_small">
				<p class="line_narrow">
					The title will be entered here.The title will be entered here.
				</p>
				<p class="margin_t_xsmall">
					ここにタイトルが入ります。ここにタイトルが入ります。
				</p>
			</h3>
			<figure class="margin_b_small">
				<?= $this->Html->image("https://placehold.jp/800x495.png", [ 'class' => '', 'alt' => 'altテキスト']); ?>
				<figcaption class="text_center text_sub margin_t_xsmall">
					キャプションが入ります
				</figcaption>
			</figure>
			<p>
				I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.
			</p>
			<p class="margin_t_small">
				概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。
			</p>
		</section>
		<hr>
		<section>
			<h3 class="family_min font_xlarge margin_b_small">
				<p class="line_narrow">
					The title will be entered here.The title will be entered here.
				</p>
				<p class="margin_t_xsmall">
					ここにタイトルが入ります。ここにタイトルが入ります。
				</p>
			</h3>
			<figure class="margin_b_small">
				<?= $this->Html->image("https://placehold.jp/800x495.png", [ 'class' => '', 'alt' => 'altテキスト']); ?>
				<figcaption class="text_center text_sub margin_t_xsmall">
					キャプションが入ります
				</figcaption>
			</figure>
			<p>
				I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.
			</p>
			<p class="margin_t_small">
				概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。概要説明が入ります。
			</p>
		</section>
		
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
					"buildURL" => ['controller' => 'about', 'action' => 'index'],
					"thumbURL" => "https://placehold.jp/300x300.png",
					"subTitle" => "about",
					"mainTitle" => "PWKについて",
					"pageDescription" => "簡単な説明文が入ります。簡単な説明文が入ります。簡単な説明文が入ります。"
				]) ?>
			</div>
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
					"buildURL" => ['controller' => 'store', 'action' => 'index'],
					"thumbURL" => "https://placehold.jp/300x300.png",
					"subTitle" => "store",
					"mainTitle" => "店舗情報",
					"pageDescription" => "簡単な説明文が入ります。簡単な説明文が入ります。簡単な説明文が入ります。"
				]) ?>
			</div>
		</div>
	</div>
</section>