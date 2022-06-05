<div class="container">

	<?php // 新規登録 ?>
	<?= $this->Form->create($empty_entity, ['type' => 'file', 'url' => ['controller'=>'Articles','action'=>'insert']]) ?>
		<?= $this->Form->error('Articles.date') ?>
		<?= $this->Form->date('Articles.date', ['class' => '']) ?>
		<div class="margin_t_small">
			<?= $this->Form->error('Articles.title') ?>
			<?= $this->Form->input('Articles.title', ['class' => 'form-control', 'placeholder' => 'タイトル(100文字以内)']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Articles.description') ?>
			<?= $this->Form->textarea('Articles.description', ['class' => 'form-control', 'placeholder' => 'お知らせ内容(500文字以内)']) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Articles.image_path') ?>
			<?= $this->Form->file('Articles.image_path', ['class' => 'btn btn-secondary']) ?>
		</div>
		<div class="margin_t_medium">
			<?= $this->Form->submit('登録', ['class' => 'btn btn-primary']) ?>
		</div>
	<?= $this->Form->end() ?>

	<?php // 一覧 ?>
	<div class="margin_t_large">
		<?php if(!empty($articlesRows)): ?>
			<table class="table">
				<thead>
					<tr>
						<th>id</th>
						<th>登録日</th>
						<th>日付</th>
						<th>タイトル</th>
						<th>コンテンツ</th>
						<th>画像</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($articlesRows as $articlesRow): ?>
						<tr>
							<td class="text_sub">
								<?= h($articlesRow->id); ?>
							</td>
							<td class="text_sub">
								<?= h($articlesRow->created); ?>
							</td>
							<td>
								<?= h($articlesRow->date); ?>
							</td>
							<td>
								<?= h($articlesRow->title); ?>
							</td>
							<td>
								<?= h($articlesRow->description); ?>
							</td>
							<td>
								<?php if($articlesRow->image_path): ?>
									<figure>
										<?= $this->Html->image($articlesRow->image_path, ['class' => 'object_contain', 'width'=>'150', 'height'=>'150']); ?>
										<figcaption class="text_sub text_center margin_t_xsmall">
											<?= h($articlesRow->image_path); ?>
										</figcaption>
									</figure>
								<?php else: ?>
									<p class="text_sub text_center">
										画像はありません
									</p>
								<?php endif; ?>
							</td>
							<td>
								<?= $this->Html->link('編集', ['controller' => 'Articles', 'action' => 'update', '?' => ['id' => $articlesRow->id]], ['class' => 'btn btn-success margin_b_small']) ?>
								<?= $this->Form->create($empty_entity, [
									'type' => 'post', 
									'url' => ['controller'=>'Articles','action'=>'delete']
									]) ?>
									<?= $this->Form->hidden('Articles.id', [
										'default' => $articlesRow->id, 
										]) ?>
									<?= $this->Form->submit('削除', ['class' => 'btn btn-outline-danger', 'onClick' => 'return confirmDelete()']) ?>
								<?= $this->Form->end() ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<p>お知らせはありません</p>
		<?php endif; ?>
	</div>

</div>
