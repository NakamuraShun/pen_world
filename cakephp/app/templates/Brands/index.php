

<?= $this->Flash->render('positive') ?>
<?= $this->Flash->render('error') ?>
	
<div class="container">
	<p>カテゴリ追加</p>
	<?= $this->Form->create($empty_entity, ['type'=> 'POST', 'url' => ['controller'=>'Brands','action'=>'insert']]) ?>
	<div class="input-group">
		<?= $this->Form->error('Brands.name') ?>
		<?= $this->Form->text('Brands.name', ['class' => 'form-control', 'placeholder' => '登録するカテゴリー名を入力してください']) ?>
		<?= $this->Form->submit('登録', ['class' => 'btn btn-primary']) ?>
	</div>
	<?= $this->Form->end() ?>

	<div class="margin_t_large">
		<?php if(!empty($brandsRows)): ?>
				<table class="table">
					<thead>
						<tr>
							<th>カテゴリ名</th>
							<th>変更</th>
							<th>削除</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($brandsRows as $brandsRow): ?>
							<tr>
								<td>
									<?= h($brandsRow->name); ?>
								</td>
								<td>
									<div class="row row-cols-2">
										<?php /* セット ここから */ ?>
										<button class="btn btn-outline-dark" onclick="actionChangeSwitch(this)">変更</button>
										<div class="display_none">
											<?= $this->Form->create($empty_entity, ['type'=> 'POST', 'url' => ['controller'=>'Brands','action'=>'update']]) ?>
											<div class="input-group">
												<?= $this->Form->hidden('Brands.id', ['value' => $brandsRow->id]) ?>
												<?= $this->Form->text('Brands.name', ['value' => $brandsRow->name, 'class' => 'form-control']) ?>
												<?= $this->Form->submit('確定', ['class' => 'btn btn-primary']) ?>
											</div>
											<?= $this->Form->end() ?>
										</div>
										<?php /* セット ここまで */ ?>
									</div>
								</td>
								<td>
									<?= $this->Html->link('削除', ['controller' => 'Brands', 'action' => 'delete', '?' => ['id' => $brandsRow->id]], ['onclick' => 'return confirmDelete()', 'class' => 'btn btn-outline-danger']) ?>
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