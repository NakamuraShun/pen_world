<?= $this->element('common/bread_crumb', ["breadCrumb" => $breadCrumb]) ?>
<?= $this->element('common/page_title', ["H1_main" => $H1_main, "H1_sub" => $H1_sub]) ?>
	
<div class="padding_v_xlarge">
	<div class="container">
		<div class="text_md_center margin_b_large">
			<p class="en">
				I will quote this month’s fountain pen.I will quote this month’s fountain pen.
			</p>
			<p class="margin_t_small">
				コンテンツを説明する文章が入ります。コンテンツを説明する文章が入ります。コンテンツを説明する文章が入ります。
			</p>
		</div>

		<?php // 検索 ?>
		<?= $this->Form->create($search_empty_entity, [
		'type' => 'GET', 
		'url' => ['controller'=>'Items','action'=>'index']
		]) ?>
		<div class="flex justify_end items_center">
			<div class="flex">
				<p class="margin_r_xsmall">
					カテゴリ
				</p>
				<?= $this->Form->select('category_id', $categorysOptions, [
				'empty' => '指定なし',
				'default' => $requestCategorysId,
				'required' => false,
				]) ?>
			</div>
			<div class="flex padding_l_small">
				<p class="margin_r_xsmall">
					ブランド
				</p>
				<?= $this->Form->select('brand_id', $brandsOptions, [
					'empty' => '指定なし',
					'default' => $requestBrandsId,
					'required' => false,
					]) ?>
			</div>
			<div class="padding_l_small">
				<?= $this->Form->submit('検索', ['class' => 'btn_main_fill ']) ?>
			</div>
			<div class="padding_l_small">
				<a href="<?php echo $this->Url->build([ 'controller' => 'items', 'action' => 'index']); ?>" class="btn_main">全件表示</a>
			</div>
		</div>
		<?= $this->Form->end() ?>

		<div class="panel text_center margin_v_large">
			<p class="weight_bold margin_b_xsmall">
				<span class="font_large">検索結果&nbsp;</span><span class="font_medium"><?= h($itemsRowCount); ?>件</span>
			</p>
			<p>
				検索条件:&nbsp;カテゴリー(<span class="weight_bold"><?= h($requestCategorysName); ?></span>)&nbsp;ブランド(<span class="weight_bold"><?= h($requestBrandsName); ?></span>)
			</p>
		</div>
		<?php if(!empty($itemsRow)): ?>
			<div class="row row-cols-1 row-cols-md-3">
				<?php foreach ($itemsRow as $item): ?>
					<div>
						<section class="card_main height_full">
							<a href="<?php echo $this->Url->build([ 'controller' => 'items', 'action' => 'detail', '?' => ['id' => $item->id]]); ?>">
								<figure class="ratio_golden n_margin_medium bg_mono_sub-content">
									<?= $this->Html->image($item->image_path_1, ['class' => 'object_contain']); ?>
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
						</section>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else: ?>
			<p class="padding_v_small">
				商品はございません
			</p>
		<?php endif; ?>

	</div>
</div>
