<div class="container">

	<?php // 新規登録 ?>
	<?= $this->Form->create($empty_entity, [
		'type' => 'file', 
		'url' => ['controller'=>'Items','action'=>'update']
		]) ?>
		<?= $this->Form->hidden('Items.id', [
			'default' => $target_entity->id, 
			]) ?>

		<div>
			<?= $this->Form->error('Items.position') ?>
			<?= $this->Form->number('Items.position', [
				'default' => $target_entity->position, 
				]) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.name') ?>
			<?= $this->Form->input('Items.name', [
				'default' => $target_entity->name, 
				'class' => 'form-control',
				'placeholder' => '商品名(200文字以内)',
				]) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.caption') ?>
			<?= $this->Form->textarea('Items.caption', [
				'default' => $target_entity->caption, 
				'class' => 'form-control',
				'placeholder' => 'キャプション(100文字以内)',
				 ]) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.description') ?>
			<?= $this->Form->textarea('Items.description', [
				'default' => $target_entity->description, 
				'class' => 'form-control',
				'placeholder' => '説明文(800文字以内)',
				 ]) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.supplement') ?>
			<?= $this->Form->textarea('Items.supplement', [
				'default' => $target_entity->supplement, 
				'class' => 'form-control',
				'placeholder' => '補足文(800文字以内)',
				 ]) ?>
		</div>
		<div>
			<?= $this->Form->error('Items.price') ?>
			<?= $this->Form->number('Items.price', [
				'default' => $target_entity->price, 
				]) ?>
		</div>
		<label>
			画像
		</label>
		<div class="row row-cols-3">
			<div>
				<?php if(!empty($target_entity->image_path_1)): ?>
					<figure>
						<?= $this->Html->image($target_entity->image_path_1, ['class' => 'object_contain', 'width'=>'150', 'height'=>'150']); ?>
						<figcaption class="text_sub text_center margin_t_xsmall">
							<?= h($target_entity->image_path_1); ?>
						</figcaption>
					</figure>
					<div class="margin_v_small">
						<?= $this->Form->label('image_delete_1', 'この画像を削除'); ?>
						<?= $this->Form->checkbox('image_delete_1', ['hiddenField' => false]); ?>
					</div>
				<?php else: ?>
					<p class="text_sub">
						画像1はありません
					</p>
				<?php endif; ?>
				<?= $this->Form->error('Items.image_path_1') ?>
				<?= $this->Form->file('Items.image_path_1', [
					'class' => 'btn btn-secondary'
					]) ?>
			</div>
			<div>
				<?php if(!empty($target_entity->image_path_2)): ?>
					<figure>
						<?= $this->Html->image($target_entity->image_path_2, ['class' => 'object_contain', 'width'=>'150', 'height'=>'150']); ?>
						<figcaption class="text_sub text_center margin_t_xsmall">
							<?= h($target_entity->image_path_2); ?>
						</figcaption>
					</figure>
					<div class="margin_v_small">
						<?= $this->Form->label('image_delete_2', 'この画像を削除'); ?>
						<?= $this->Form->checkbox('image_delete_2', ['hiddenField' => false]); ?>
					</div>
				<?php else: ?>
					<p class="text_sub">
						画像2はありません
					</p>
				<?php endif; ?>
				<?= $this->Form->error('Items.image_path_2') ?>
				<?= $this->Form->file('Items.image_path_2', [
					'class' => 'btn btn-secondary'
					]) ?>
			</div>
			<div>
				<?php if(!empty($target_entity->image_path_3)): ?>
					<figure>
						<?= $this->Html->image($target_entity->image_path_3, ['class' => 'object_contain', 'width'=>'150', 'height'=>'150']); ?>
						<figcaption class="text_sub text_center margin_t_xsmall">
							<?= h($target_entity->image_path_3); ?>
						</figcaption>
					</figure>
					<div class="margin_v_small">
						<?= $this->Form->label('image_delete_3', 'この画像を削除'); ?>
						<?= $this->Form->checkbox('image_delete_3', ['hiddenField' => false]); ?>
					</div>
				<?php else: ?>
					<p class="text_sub">
						画像3はありません
					</p>
				<?php endif; ?>
				<?= $this->Form->error('Items.image_path_3') ?>
				<?= $this->Form->file('Items.image_path_3', [
					'class' => 'btn btn-secondary'
					]) ?>
			</div>
		</div>
		
		<div class="margin_t_large">
			<?= $this->Form->error('Items.category_id') ?>
			<?= $this->Form->select('Items.category_id', $categorysOptions, [
				'empty' => 'カテゴリ選択',
				'default' => $target_entity->category->id,
				]) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.brand_id') ?>
			<?= $this->Form->select('Items.brand_id', $brandsOptions, [
				'empty' => 'ブランド選択',
				'default' => $target_entity->brand->id,
				]) ?>
		</div>
		<div class="margin_t_medium margin_b_large">
			<?= $this->Form->submit('更新', ['class' => 'btn btn-success']) ?>
		</div>
	<?= $this->Form->end() ?>

</div>
