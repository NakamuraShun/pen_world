<?= $this->element('common/bread_crumb', ["breadCrumb" => $breadCrumb]) ?>


<div class="page_title_item">
	<div class="title_main">
		<?= h($item->name) ?>
	</div>
	<?php if(!empty($item->caption)): ?>
		<div class="title_sub">
			<?= h($item->caption) ?>
		</div>
	<?php endif; ?>
</div>

<div class="padding_t_medium padding_b_large">
	<div class="container">
		<div class="row row-cols-sm-2 gutter_wide">
			<div>
				<div id="VueAppItemSlider">
					<vue-item-slider
						:thumbsrcarr = <?php echo h($json_image_paths); ?>
					>
					</vue-item-slider>
				</div>
			</div>
			<div>
				<p class="line_wide">
					<?= h($item->description) ?>
				</p>
				<hr>
				<p class="margin_t_medium">
					商品カテゴリー:&nbsp;
					<a href="" class="text_link"><?= h($item->category->name); ?></a>
				</p>
				<?php if(!empty($item->brand)): ?>
					<div class="margin_t_medium">
						ブランド:&nbsp;
						<a href="" class="bg_main-low padding_xsmall text_center text_link"><?= h($item->brand->name); ?></a>
					</div>
				<?php endif; ?>
				<?php if(!empty($item->supplement)): ?>
					<p class="margin_t_medium">
						<?= h($item->supplement) ?>
					</p>
				<?php endif; ?>
				<hr>
				<div class="panel text_center margin_t_small">
					<?php if(!empty($item->price)): ?>
						<?= h($item->price) ?>
					<?php else: ?>
						<p class="font_small text_center">
							お値段は店頭でまたはお電話にてご確認お願いします
						</p>
					<?php endif; ?>
				</div>
			</div>	
		</div>
		<hr>
		<div class="btn_group_block margin_t_large">
			<a href="" class="btn_normal">一覧へ戻る</a>
		</div>
	</div>
</div>

<?= $this->element('information/store_info') ?>

<?php /* vue component */ ?>
<?= $this->element('items/vue/item_slider') ?>