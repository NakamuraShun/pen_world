<?php if(!empty($breadCrumb)): ?>
	<div class="bread_crumb_wrap">
		<div class="container">
			<ul class="bread_crumb">
				<?php foreach ($breadCrumb as $pageArr): ?>
					<li>
						<?php if(!empty($pageArr['controller']) && !empty($pageArr['action'])): ?>
							<?= $this->Html->link(h($pageArr['name']), [ 'controller' => h($pageArr['controller']), 'action' => h($pageArr['action'])]) ?>
						<?php else: ?>
							<?= h($pageArr['name']) ?>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
<?php endif; ?>