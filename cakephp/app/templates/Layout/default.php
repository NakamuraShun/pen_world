<?php
use Cake\Routing\Router;

$current_path = Router::url(); // アクセスパス
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<?= $this->Html->charset() ?>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=no, minimal-ui">
		<?php /* meta */ ?>
		<?= $this->Html->meta('title',h($metaData['title'])); ?>
		<?= $this->Html->meta('description',h($metaData['description'])); ?>
		<?= $this->Html->meta('keywords',h($metaData['keywords'])); ?>
		<?= $this->Html->meta('icon') ?>

		<?php if (0 === strpos($current_path, '/admin')): // 管理画面用 bootstrap ?>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<?php endif; ?>

		<?php /* css */ ?>
		<?php echo $this->Html->css('style'); ?>
		<?php /* javascript */ ?>
		<?php echo $this->Html->script('common'); ?>
		<script src="https://unpkg.com/vue@next"></script>
		<?php /* font-awesome */ ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	<body>
		<?php /* 管理画面 */ ?>
		<?php if (0 === strpos($current_path, '/admin')): ?>
			<div class="row gutter_reset height_full_vh">
				<div class="col-sm-4">
					<?= $this->element('admin/common/sideNav') ?>
				</div>
				<div class="col-sm-20">
					<?= $this->element('admin/common/bread_crumb', ["breadCrumb" => $breadCrumb]) ?>
					<?= $this->element('admin/common/header') ?>
					<main>
						<?= $this->Flash->render() ?>
						<?= $this->Flash->render('positive') ?>
						<?= $this->Flash->render('error') ?>
						<?= $this->fetch('content') ?>
					</main>
				</div>
			</div>
		<?php else: ?>
			<?= $this->element('common/header') ?>
			<main>
				<?= $this->fetch('content') ?>
			</main>
			<?= $this->element('common/footer') ?>
		<?php endif; ?>
	</body>
</html>