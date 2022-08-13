<nav class="bg_main-deep height_full">
	<ul class="color_mono_white">
		<li>
			<?= $this->Html->link('お知らせ管理', ['controller' => 'Articles', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
		<li>
			<?= $this->Html->link('商品情報管理', ['controller' => 'items', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
		<li>
			<?= $this->Html->link('カテゴリ管理', ['controller' => 'categorys', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
		<li>
			<?= $this->Html->link('ブランド/メーカー管理', ['controller' => ' brands', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
		<li>
			<?= $this->Html->link('お問い合わせ管理', ['controller' => 'Contacts', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
	</ul>
</nav>
