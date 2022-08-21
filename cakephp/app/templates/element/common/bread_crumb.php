<?php if(!empty($breadCrumb)): ?>
	<div class="bread_crumb_wrap">
		<div class="container">
			<ul class="bread_crumb">
				<?php foreach ($breadCrumb as $pageArr): ?>
					<li>
						<?php if(!empty($pageArr['controller']) && !empty($pageArr['action'])): ?>
							<a href="<?php echo $this->Url->build([ 'controller' => h($pageArr['controller']), 'action' => h($pageArr['action'])]); ?>" class="text_link"><?= h($pageArr['name']); ?></a>
						<?php else: ?>
							<?= h($pageArr['name']) ?>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
<?php endif; ?>