<?= $this->element('common/bread_crumb', ["breadCrumb" => $breadCrumb]) ?>
<?= $this->element('common/page_title', ["H1_main" => $H1_main, "H1_sub" => $H1_sub]) ?>
	
<section class="bg_main-low padding_v_xlarge">
	<div class="container">
		<?php if(!empty($articlesRows)): ?>
			<?php foreach ($articlesRows as $articlesRow): ?>
				<article class="bg_mono_content padding_medium margin_b_large" id="<?= h($articlesRow->id); ?>">
					<h4 class="title_h4">
						<p class="label margin_b_small">
							<?= h($articlesRow->date); ?>
						</p>
						<p>
							<?= h($articlesRow->title); ?>
						</p>
					</h4>
					<?php if($articlesRow->image_path): ?>
						<div class="row">
							<figure class="col-24 col-sm-8">
								<?= $this->Html->image($articlesRow->image_path, [ 'class' => '']); ?>
							</figure>
							<p class="col-24 col-sm-16">
								<?= h($articlesRow->description); ?>
							</p>
						</div>
					<?php else: ?>
						<p>
							<?= h($articlesRow->description); ?>
						</p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		<?php else: ?>
			<p class="text_center">お知らせはありません</p>
		<?php endif; ?>
	</div>
</section>
