<nav class="bg_main-deep height_full">
	<ul class="color_mono_white">
		<li>
			<?= $this->Html->link('管理画面ホーム', ['controller' => 'categorys', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
		<li>
			<?= $this->Html->link('お知らせ', ['controller' => 'Articles', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
		<li>
			<?= $this->Html->link('商品情報', ['controller' => 'items', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
		<li>
			<?= $this->Html->link('カテゴリ', ['controller' => 'categorys', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
		<li>
			<?= $this->Html->link('ブランド/メーカー', ['controller' => ' brands', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
		<li>
			<?= $this->Html->link('お問い合わせ', ['controller' => 'Contacts', 'action' => 'index'], ['class' => 'inline_block width_full padding_medium']) ?>
		</li>
	</ul>
</nav>
