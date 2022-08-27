<?php /* メインビジュアル */ ?>
<section class="padding_v_medium bg_graph">
	<div class="container">
		<div class="row">
			<div class="col-xl-15">
				<img src="https://placehold.jp/1200x680.png" alt="" class="object_cover">
			</div>
			<div class="col-xl-9">
				<div class="height_full flex_column">
					<h2 class="family_min color_mono_white bg_main-base text_center padding_small view_pc">
						<p class="font_medium trans_upper">event / news</p>
						<p>展示会 / お知らせ</p>
					</h2>
					<?php if(!empty($articlesRows)): ?>
						<?php foreach ($articlesRows as $articlesRow): ?>
							<article class="card_main margin_t_small">
								<a href="<?php echo $this->Url->build(['controller' => 'Articles', 'action' => 'index', '#' => $articlesRow->id]); ?>">
									<h3 class="family_min">
										<span class="label"><?= date_format($articlesRow->date, 'Y/m/d'); ?></span>
										<span class="inline_block color_main-base"><?= h($articlesRow->title); ?></span>
									</h3>
									<p class="clamp_1 clamp_sm_2">
										<?= h($articlesRow->description); ?>
									</p>
								</a>
							</article>
						<?php endforeach; ?>
					<?php else: ?>
						<p class="text_center">
							お知らせはありません
						</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php /* ABOUT */ ?>
<section>
	<div class="container_full padding_b_xlarge bg_main-deep color_mono_white">
		<div class="container">
			<h2 class="title_h2">
				<p>about</p>
				<span>PWKについて</span>
			</h2>
			<div class="row gutter_wide">
				<div class="col-md-11">
					<div class="ratio_golden">
						<iframe class="youtube" width="1904" height="720" src="https://www.youtube.com/embed/872bAuWnVsY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-md-13">
					<p class="en">
						I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.
					</p>
					<p class="margin_t_medium">
						ペンワールド・カタヤマの概要説明が入ります。ペンワールド・カタヤマの概要説明が入ります。ペンワールド・カタヤマの概要説明が入ります。ペンワールド・カタヤマの概要説明が入ります。
					</p>
					<div class="btn_group_block margin_t_large">
						<a href="<?php echo $this->Url->build([ 'controller' => 'about', 'action' => 'index']); ?>" class="btn_main">more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php /* PICK UP */ ?>
<?php if(!empty($itemsRows)): ?>
	<section>
		<div class="container padding_b_xlarge">
			<h2 class="title_h2">
				<p>pick up</p>
				<span>ピックアップ商品</span>
			</h2>
			<div class="text_md_center margin_b_medium">
				<p class="en">
					I will quote this month’s fountain pen.I will quote this month’s fountain pen.
				</p>
				<p class="margin_t_small">
					コンテンツを説明する文章が入ります。コンテンツを説明する文章が入ります。コンテンツを説明する文章が入ります。
				</p>
			</div>
			<div class="margin_b_medium">
				<?= $this->element('information/rule') ?>
			</div>
			<div class="row row-cols-1 row-cols-md-3">
				<?php foreach ($itemsRows as $item): ?>
					<div>
						<article class="card_main height_full">
							<a href="<?php echo $this->Url->build([ 'controller' => 'items', 'action' => 'detail', '?' => ['id' => $item->id]]); ?>">
								<figure class="ratio_golden n_margin_medium bg_mono_sub-content">
									<?php if(!empty($item->image_path_1)): ?>
										<?= $this->Html->image($item->image_path_1, ['class' => 'object_contain']); ?>
									<?php else: ?>
										<?= $this->Html->image('pages/items/noimage.jpg', ['class' => 'object_contain']); ?>
									<?php endif; ?>
								</figure>
								<div class="margin_t_large">
									<h3 class="family_min color_main-base">
										<?= h($item->name); ?>
									</h3>
									<p class="clamp_2">
										<?= h($item->caption); ?>
									</p>
									<?php if(!empty($item->brand)): ?>
										<div class="margin_t_medium">
											<span class="bg_main-low padding_xsmall margin_t_small text_center">
												<?= h($item->brand->name); ?>
											</span>
										</div>
									<?php endif; ?>
								</div>
							</a>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="btn_group_block margin_t_large">
				<a href="<?php echo $this->Url->build([ 'controller' => 'items']); ?>" class="btn_main">all items</a>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php /* OWN BRAND */ ?>
<section>
	<div class="container_full padding_b_xlarge bg_main-deep color_mono_white">
		<div class="container">
			<h2 class="title_h2">
				<p>own brand</p>
				<span>自社ブランド</span>
			</h2>
			<section class="row">
				<div class="col-md-13">
					<figure>
						<img src="https://placehold.jp/1200x742.png" alt="KMKの万年筆">
					</figure>
				</div>
				<div class="col-md-11">
					<h3 class="trans_upper family_min weight_bold font_ularge color_main-light letter_wide text_center margin_b_medium font_scale_double">kmk</h3>
					<p class="en">
						I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.I will quote this month’s fountain pen.
					</p>
					<p class="margin_t_medium">
						KMKの概要説明が入ります。KMKの概要説明が入ります。KMKの概要説明が入ります。KMKの概要説明が入ります。KMKの概要説明が入ります。KMKの概要説明が入ります。
					</p>
					<div class="btn_group_block margin_t_large">
						<a href="<?php echo $this->Url->build([ 'controller' => 'ownBrand', 'action' => 'index']); ?>" class="btn_main">more</a>
					</div>
				</div>
			</section>
		</div>
	</div>
</section>

<?php /* Instagram */ ?>
<section>
	<div class="container padding_b_xlarge">
		<h2 class="title_h2">
			<p>Instagram</p>
			<span>インスタグラム</span>
		</h2>
		<div class="row row-cols-md-4">
			<div>

			</div>							
		</div>
		<div class="btn_group_block margin_t_large">
			<a href="" class="btn_main btn_blank">Instagram</a>
		</div>
	</div>
</section>

<?= $this->element('information/store_info') ?>