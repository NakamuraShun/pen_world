<?= $this->element('common/bread_crumb', ["breadCrumb" => $breadCrumb]) ?>
<?= $this->element('common/page_title', ["H1_main" => $H1_main, "H1_sub" => $H1_sub]) ?>

<div class="bg_main-low padding_v_large">
	<?= $this->Flash->render() ?>
	<?= $this->Flash->render('positive') ?>
	<?= $this->Flash->render('error') ?>

	<section>
		<div class="container_narrow">
			<h3 class="title_h3">
				<p>tel</p><span>お電話でのご連絡</span>
			</h3>
			<div class="text_center">
				<p class="font_xlarge line_narrow">
					<a href="tel:+81-90-1888-7761">
						TEL:090-1888-7761
					</a>
				</p>
				<p>
					(スマホの方はタップすると発信できます)
				</p>
				<p class="font_large">
					FAX:048-857-5683
				</p>	
				<p>
					【受付時間】10:00～19:00<span class="inline_block">【定休日】日曜<span>
				</p>
			</div>
		</div>
	</section>
	<section>
		<div class="container_narrow">
			<h3 class="title_h3">
				<p>mail</p><span>Webフォームでのご連絡</span>
			</h3>
			<div class="text_md_center">
				<p>
					万年筆や当店に関するご意見、ご質問、メッセージ等々お気軽にお問い合わせください。<br>
					修理調整のご相談もこちらのフォームから承っております。<br>
				</p>
				<p class="color_main-base margin_t_small">
					3営業日以内にメールでの返信またはお電話でのご連絡がない場合は、<br class="br_md">
					お手数おかけしますが直接お電話でご連絡くださいますようよろしくお願いします。
				</p>
			</div>
			<p class="font_small margin_t_medium">
				「<span class="color_main-base">※</span>」は必須項目です
			</p>
		
			<?php // お問い合わせフォーム ?>
			<?= $this->Form->create($empty_entity, [
				'type' => 'POST', 
				'url' => ['controller' => 'Contacts', 'action' => 'insert'], 
				'class' => 'form_group'
			]) ?>
				<hr>
				<label class="form_label_required">
					お名前
				</label>
				<?= $this->Form->error('Contacts.name') ?>
				<?= $this->Form->input('Contacts.name', [
					'placeholder' => '例) 山田 太郎', 
					'class' => 'form_control'
				]) ?>

				<hr>
				<label class="form_label_required">
					メールアドレス
				</label>
				<?= $this->Form->error('Contacts.mail') ?>
				<?= $this->Form->email('Contacts.mail', [
					'placeholder' => '例) yamada@gmail.com', 
					'class' => 'form_control'
				]) ?>

				<hr>
				<label class="form_label">
					電話番号
				</label>
				<?= $this->Form->error('Contacts.phone') ?>
				<?= $this->Form->tel('Contacts.phone', [
					'required' => false, 
					'placeholder' => '例) 09012345678', 
					'class' => 'form_control'
				]) ?>
				<p class="text_sub">
					今後、お電話でのやりとりをご希望される方は入力してください
				</p>

				<hr>
				<label class="form_label_required">
					お問い合わせ内容
				</label>
				<?= $this->Form->error('Contacts.content') ?>
				<?= $this->Form->textarea('Contacts.content', [
					// 'rows' => '5',
					// 'cols' => '5',
					'placeholder' => 'お問い合わせ、ご相談内容をご入力ください(1000文字以内)', 
					'class' => 'form_control'
				]) ?>

				<?php // 個人情報 ?>
				<hr>
				<p class="text_center font_medium margin_t_large margin_b_medium">
					下記個人情報に関する内容を<span class="inline_block">ご確認ください</span>
				</p>
				<div class="form_privacy_text bg_mono_content frame_mono_sub-border padding_medium">
					<section>
						<h4 class="title_h4 margin_t_none" id="PRIVACY">
							個人情報保護方針
						</h4>
						<p>
							当社は、以下のとおり個人情報保護方針を定め、個人情報保護の仕組みを構築し、全従業員に個人情報保護の重要性の認識と取組みを徹底させることにより、個人情報の保護を推進致します。
						</p>
					</section>
					<section>
						<h4 class="title_h4">
							個人情報の管理
						</h4>
						<p>
							当社は、お客さまの個人情報を正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止するため、セキュリティシステムの維持・管理体制の整備・社員教育の徹底等の必要な措置を講じ、安全対策を実施し個人情報の厳重な管理を行ないます。
						</p>
					</section>
				</div>
				<div class="text_center margin_t_medium margin_b_large">
					<label for="confirm_privacy" class="inline_block bg_main-light padding_small pointer" onclick="confirmPrivacy()">
						<div class="flex items_center justify_center">
							<input id="confirm_privacy" type="checkbox" class="margin_r_xsmall js-confirm-privacy-input">
							<p>
								個人情報の取り扱いについて確認しました
							</p>
						</div>
					</label>
				</div>

				<?php // 送信 ?>
				<div class="btn_group_block">
					<?= $this->Form->submit('確認画面に進む', ['class' => 'btn_main_fill js-confirm-privacy-submit-btn', 'disabled' => false]) ?>
				</div>
			<?= $this->Form->end() ?>
		</div>
	</section>
</div>

