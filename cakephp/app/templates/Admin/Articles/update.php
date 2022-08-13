<div class="container">

	<?php // 新規登録 ?>
	<?= $this->Form->create($empty_entity, [
		'type' => 'file', 
		'url' => ['controller'=>'Articles','action'=>'update']
		]) ?>
		<?= $this->Form->hidden('Articles.id', [
			'default' => $target_entity->id, 
			]) ?>

		<?= $this->Form->error('Articles.date') ?>
		<?= $this->Form->date('Articles.date', [
			'default' => $target_entity->date, 
			]) ?>
		<div class="margin_t_small">
			<?= $this->Form->error('Articles.title') ?>
			<?= $this->Form->input('Articles.title', [
				'default' => $target_entity->title, 
				'class' => 'form-control',
				'placeholder' => 'タイトル(100文字以内)',
				]) ?>
		</div>
		<div class="margin_t_small">
			<?= $this->Form->error('Articles.description') ?>
			<?= $this->Form->textarea('Articles.description', [
				'default' => $target_entity->description, 
				'class' => 'form-control',
				'placeholder' => 'お知らせ内容(500文字以内)',
				 ]) ?>
		</div>
		<label>
			画像
		</label>
		<?php if(!empty($target_entity->image_path)): ?>
			<figure>
				<?= $this->Html->image($target_entity->image_path, ['class' => 'object_contain', 'width'=>'150', 'height'=>'150']); ?>
				<figcaption class="text_sub text_center margin_t_xsmall">
					<?= h($target_entity->image_path); ?>
				</figcaption>
			</figure>
			<div class="margin_v_small">
				<div class="js-radio-articlefile-flg">
					<?= $this->Form->radio('article_file_flg',
						['noUpdate' => '変更なし', 'delete' => '削除', 'update' => '更新'],
						['value' => 'noUpdate']) 
					?>
				</div>
				<?= $this->Form->file('Article.image_path', ['class' => 'display_none']) ?>
				<?= $this->Form->error('Article.image_path') ?>
			</div>
		<?php else: ?>
			<p class="text_sub">
				画像はありません
			</p>
			<div class="js-radio-articlefile-flg">
				<?= $this->Form->radio('article_file_flg',
					['noUpdate' => '変更なし', 'update' => '追加'],
					['value' => 'noUpdate']) 
				?>
			</div>
			<?= $this->Form->file('Article.image_path', ['class' => 'display_none']) ?>
			<?= $this->Form->error('Article.image_path') ?>
		<?php endif; ?>

		<div class="margin_t_medium">
			<?= $this->Form->submit('更新', ['class' => 'btn btn-success']) ?>
		</div>
	<?= $this->Form->end() ?>

</div>


<script>
window.onload = function() {

	articlefileCheckBoxs = Array.prototype.slice.call(document.getElementsByClassName('js-radio-articlefile-flg')); //配列に変換

    articlefileCheckBoxs.forEach(function(e) {

		e.addEventListener('change', function() {

			let fileInput = e.nextElementSibling

			fileInput.classList.add('display_none')

			if(e.querySelector("[value=update]").checked){
				fileInput.classList.toggle('display_none')
			}

        })

    })

}
</script> 