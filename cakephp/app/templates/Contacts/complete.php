<?= $this->element('common/page_title', ["H1_main" => $H1_main, "H1_sub" => $H1_sub]) ?>

<div class="height_full_vh padding_v_large">
	<section>
		<div class="container_narrow">
			<div class="panel text_md_center">
				<p>
					お問い合わせありがとうございました。
				</p>
				<p class="margin_t_small">
					<span class="color_main-base">3営業日以内にメールでの返信またはお電話でのご連絡がない場合は、<br class="br_md">
					お手数おかけしますが直接お電話でご連絡くださいますようよろしくお願いします。</span>
				</p>
				<div class="btn_group_block margin_t_medium">
					<?= $this->Html->link('トップページに戻る', ['controller' => 'Home', 'action' => 'index'], ['class' => 'btn_main_fill']) ?>
				</div>
			</div>
		</div>
	</section>
</div>
