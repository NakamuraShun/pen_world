<div class="container">

	<?php // 一覧 ?>
	<?php if(!empty($contactsRows)): ?>
		<table class="table">
			<thead>
				<tr>
					<th>受付時間</th>
					<th>ID</th>
					<th>名前</th>
					<th>メールアドレス</th>
					<th>電話番号</th>
					<th>問い合わせ内容</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($contactsRows as $contactsRow): ?>
					<tr>
						<td>
							<?= h($contactsRow->created); ?>
						</td>
						<td>
							<?= h($contactsRow->id); ?>
						</td>
						<td>
							<?= h($contactsRow->name); ?>
						</td>
						<td>
							<?= h($contactsRow->mail); ?>
						</td>
						<td>
							<?= h($contactsRow->phone); ?>
						</td>
						<td>
							<?= h($contactsRow->content); ?>
						</td>
						<td>
							<?= $this->Html->link('削除', ['controller' => 'Contacts', 'action' => 'delete', '?' => ['id' => $contactsRow->id]], ['onclick' => 'return confirmDelete()', 'class' => 'btn btn-outline-danger']) ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else: ?>
		<p>お問い合わせはありません</p>
	<?php endif; ?>

</div>
