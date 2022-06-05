<div class="container">

	<?php // 新規登録 ?>
	<?= $this->Form->create($empty_entity, ['type'=> 'POST', 'url' => ['controller'=>'Categorys','action'=>'insert']]) ?>
	<div class="input-group">
		<?= $this->Form->error('Categorys.name') ?>
		<?= $this->Form->text('Categorys.name', ['class' => 'form-control', 'placeholder' => '新規登録するカテゴリ名を入力してください']) ?>
		<?= $this->Form->submit('登録', ['class' => 'btn btn-primary']) ?>
	</div>
	<?= $this->Form->end() ?>

	<?php // 一覧 ?>
	<div class="margin_t_large">
		<?php if(!empty($categorysRows)): ?>
			<table class="table">
				<thead>
					<tr>
						<th>カテゴリ名</th>
						<th>変更</th>
						<th>削除</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($categorysRows as $categorysRow): ?>
						<tr>
							<td>
								<?= h($categorysRow->name); ?>
							</td>
							<td>
								<div class="row row-cols-2">
									<?php /* セット ここから */ ?>
									<button class="btn btn-outline-dark" onclick="actionChangeSwitch(this)">変更</button>
									<div class="display_none">
										<?= $this->Form->create($empty_entity, ['type'=> 'POST', 'url' => ['controller'=>'Categorys','action'=>'update']]) ?>
										<div class="input-group">
											<?= $this->Form->hidden('Categorys.id', ['value' => $categorysRow->id]) ?>
											<?= $this->Form->text('Categorys.name', ['value' => $categorysRow->name, 'class' => 'form-control']) ?>
											<?= $this->Form->submit('確定', ['class' => 'btn btn-primary']) ?>
										</div>
										<?= $this->Form->end() ?>
									</div>
									<?php /* セット ここまで */ ?>
								</div>
							</td>
							<td>
								<?= $this->Html->link('削除', ['controller' => 'Categorys', 'action' => 'delete', '?' => ['id' => $categorysRow->id]], ['onclick' => 'return confirmDelete()', 'class' => 'btn btn-outline-danger']) ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<p>カテゴリはありません</p>
		<?php endif; ?>
	</div>

</div>
