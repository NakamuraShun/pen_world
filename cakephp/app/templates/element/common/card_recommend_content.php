<?php // 別ページへの導線カード ?>
<div class="card_recommend_content">
		<a href="<?php echo $this->Url->build($buildURL); ?>">
		<div>
			<div class="recommend_header">
				<?php if(!empty($thumbURL)): ?>
					<figure class="margin_r_small">
						<?= $this->Html->image($thumbURL, [ 'class' => '']); ?>
					</figure>
				<?php endif; ?>
				<div class="recommend_title">
					<p><?php echo $subTitle ?></p>
					<span><?php echo $mainTitle ?></span>
				</div>
			</div>
			<p class="margin_t_xsmall">
				<?php echo $pageDescription ?>
			</p>
		</div>
	</a>
</div>