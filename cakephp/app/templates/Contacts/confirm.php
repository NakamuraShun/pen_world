<?= $this->element('common/page_title', ["H1_main" => $H1_main, "H1_sub" => $H1_sub]) ?>

<div class="bg_main-low padding_v_large">
	<section>
		<div class="container_narrow">
			<p class="text_md_center margin_b_small">
				送信内容を確認してください。
			</p>
			<p class="font_small margin_t_medium">
				「<span class="color_main-base">※</span>」は必須項目です
			</p>
			<?php // お問い合わせ確認 ?>
			<?= $this->Form->create($empty_entity, [
				'type' => 'POST', 
				'url' => ['controller' => 'Contacts', 'action' => 'complete'], 
				'class' => 'form_group'
			]) ?>
				<hr>
				<label class="form_label_required">
					お名前
				</label>
				<p>
					<?= $contact_insert['name'] ?>
				</p>

				<hr>
				<label class="form_label_required">
					メールアドレス
				</label>
				<p>
					<?= $contact_insert['mail'] ?>
				</p>

				<hr>
				<label class="form_label">
					電話番号
				</label>
				<p>
					<?= $contact_insert['phone'] ?>
				</p>
				<p class="text_sub">
					こちらのお電話にご連絡させていただきます
				</p>

				<hr>
				<label class="form_label_required">
					お問い合わせ内容
				</label>
				<p>
					<?= $contact_insert['content'] ?>
				</p>

				<hr>
				<div class="btn_group_block">
					<?= $this->Form->submit('こちらの内容で送信する', ['class' => 'btn_main_fill']) ?>
					<?= $this->Html->link('修正する', $this->request->referer(), ['class' => 'btn_main pointer margin_t_medium']) ?>
				</div>
			<?= $this->Form->end() ?>
		</div>
	</section>
</div>

