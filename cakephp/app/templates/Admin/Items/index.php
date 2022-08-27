<div class="container">

	<?php // 新規登録 ?>
	<?= $this->Form->create($empty_entity, ['type' => 'file', 'url' => ['controller'=>'Items','action'=>'insert']]) ?>
		<?= $this->Form->error('Items.position') ?>
		<?= $this->Form->number('Items.position', ['class' => '']) ?>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.name') ?>
			<?= $this->Form->input('Items.name', ['class' => 'form-control', 'placeholder' => '商品名(200文字以内)']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.caption') ?>
			<?= $this->Form->input('Items.caption', ['class' => 'form-control', 'placeholder' => 'キャプション(100文字以内)']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.description') ?>
			<?= $this->Form->textarea('Items.description', ['class' => 'form-control', 'placeholder' => '商品説明(800文字以内)']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.supplement') ?>
			<?= $this->Form->textarea('Items.supplement', ['class' => 'form-control', 'placeholder' => '備考(800文字以内)']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.price') ?>
			<?= $this->Form->number('Items.price', ['class' => 'form-control', 'placeholder' => '料金']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.image_path_1') ?>
			<?= $this->Form->file('Items.image_path_1', ['class' => 'btn btn-secondary']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.image_path_2') ?>
			<?= $this->Form->file('Items.image_path_2', ['class' => 'btn btn-secondary']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.image_path_3') ?>
			<?= $this->Form->file('Items.image_path_3', ['class' => 'btn btn-secondary']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.category_id') ?>
			<?= $this->Form->select('Items.category_id', $categorysOptions, ['empty' => 'カテゴリ選択']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Items.brand_id') ?>
			<?= $this->Form->select('Items.brand_id', $brandsOptions, ['empty' => 'ブランド選択']) ?>
		</div>
		<div class="margin_t_medium">
			<?= $this->Form->submit('登録', ['class' => 'btn btn-primary']) ?>
		</div>
	<?= $this->Form->end() ?>

	<?php // 一覧 ?>
	<div class="margin_v_large">
		<?php if(!empty($itemsRows)): ?>
			<table class="table">
				<thead>
					<tr>
						<th>id</th>
						<th>優先度</th>
						<th>カテゴリ</th>
						<th>ブランド</th>
						<th>商品名</th>
						<th>値段</th>
						<th>画像1</th>
						<th>画像2</th>
						<th>画像3</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($itemsRows as $itemsRow): ?>
						<tr>
							<td class="text_sub">
								<?= h($itemsRow->id); ?>
							</td>
							<td class="text_sub">
								<?php if($itemsRow->position): ?>
									<?= h($itemsRow->position); ?>
								<?php else: ?>
									---
								<?php endif; ?>
							</td>
							<td>
								<?php if($itemsRow->category->name): ?>
									<?= h($itemsRow->category->name); ?>
								<?php else: ?>
									---
								<?php endif; ?>
							</td>
							<td>
								<?php if($itemsRow->brand): ?>
									<?= h($itemsRow->brand->name); ?>
								<?php else: ?>
									---
								<?php endif; ?>
							</td>
							<td>
								<?= h($itemsRow->name); ?>
							</td>
							<td>
								<?php if($itemsRow->price): ?>
									<?= h($itemsRow->price); ?>円
								<?php else: ?>
									<span class="text_sub">---</span>
								<?php endif; ?>
							</td>
							<td>
								<div class="display_flex">
									<?php if($itemsRow->image_path_1): ?>
										<figure>
											<?= $this->Html->image($itemsRow->image_path_1, ['class' => 'object_contain', 'width'=>'50', 'height'=>'50']); ?>
										</figure>
									<?php else: ?>
										<p class="text_sub text_center">
											---
										</p>
									<?php endif; ?>
								</div>
							</td>
							<td>
								<div class="display_flex">
									<?php if($itemsRow->image_path_2): ?>
										<figure>
											<?= $this->Html->image($itemsRow->image_path_2, ['class' => 'object_contain', 'width'=>'50', 'height'=>'50']); ?>
										</figure>
									<?php else: ?>
										<p class="text_sub text_center">
											---
										</p>
									<?php endif; ?>
								</div>
							</td>
							<td>
								<div class="display_flex">
									<?php if($itemsRow->image_path_3): ?>
										<figure>
											<?= $this->Html->image($itemsRow->image_path_3, ['class' => 'object_contain', 'width'=>'50', 'height'=>'50']); ?>
										</figure>
									<?php else: ?>
										<p class="text_sub text_center">
											---
										</p>
									<?php endif; ?>
								</div>
							</td>
							<td>
								<?= $this->Html->link('編集', ['controller' => 'Items', 'action' => 'update', '?' => ['id' => $itemsRow->id]], ['class' => 'btn btn-success margin_b_small']) ?>
								<?= $this->Form->create($empty_entity, [
									'type' => 'post', 
									'url' => ['controller'=>'Items','action'=>'delete']
									]) ?>
									<?= $this->Form->hidden('Items.id', [
										'default' => $itemsRow->id, 
										]) ?>
									<?= $this->Form->submit('削除', ['class' => 'btn btn-outline-danger', 'onClick' => 'return confirmDelete()']) ?>
								<?= $this->Form->end() ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<p>登録商品はありません</p>
		<?php endif; ?>
	</div>

</div>
