<footer>
	<?php /* PC フッターメニュー */ ?>
	<div class="footer_body_pc bg_main-deep color_mono_white">
		<div class="container footer_nav_pc">
			<?php // メニュー ?>
			<nav class="row gutter_reset items_center text_center family_min padding_v_medium">
				<a href="<?php echo $this->Url->build([ 'controller' => 'about', 'action' => 'index']); ?>" class="footer_nav_item col-12 col-sm-8 col-lg-6 padding_v_small">
					<p class="trans_upper letter_small">about</p>
					<p class="font_small">PWKについて</p>
				</a>
				<a href="<?php echo $this->Url->build([ 'controller' => 'items', 'action' => 'index']); ?>" class="footer_nav_item col-12 col-sm-8 col-lg-6 padding_v_small">
					<p class="trans_upper letter_small">item</p>
					<p class="font_small">取扱万年筆</p>
				</a>
				<a href="<?php echo $this->Url->build([ 'controller' => 'ownBrand', 'action' => 'index']); ?>" class="footer_nav_item col-12 col-sm-8 col-lg-6 padding_v_small">
					<p class="trans_upper letter_small">own brand</p>
					<p class="font_small">自社ブランド</p>
				</a>
				<a href="<?php echo $this->Url->build([ 'controller' => 'Articles', 'action' => 'index']); ?>" class="footer_nav_item col-12 col-sm-8 col-lg-6 padding_v_small">
					<p class="trans_upper letter_small">event / news</p>
					<p class="font_small">展示会 / お知らせ</p>
				</a>
				<a href="<?php echo $this->Url->build([ 'controller' => 'store', 'action' => 'index']); ?>" class="footer_nav_item col-12 col-sm-8 col-lg-6 padding_v_small">
					<p class="trans_upper letter_small">store</p>
					<p class="font_small">店舗情報</p>
				</a>				
				<a href="<?php echo $this->Url->build([ 'controller' => 'repair', 'action' => 'index']); ?>" class="footer_nav_item col-12 col-sm-8 col-lg-6 padding_v_small">
					<p class="trans_upper letter_small">repair</p>
					<p class="font_small">修理調整</p>
				</a>
				<a href="<?php echo $this->Url->build([ 'controller' => 'contact', 'action' => 'index']); ?>" class="footer_nav_item col-12 col-sm-8 col-lg-6 padding_v_small">
					<p class="trans_upper letter_small">contact</p>
					<p class="font_small">お問い合わせ</p>
				</a>
				<a href="<?php echo $this->Url->build([ 'controller' => 'contact', 'action' => 'index', '#' => 'PRIVACY']); ?>" class="footer_nav_item col-12 col-sm-8 col-lg-6 padding_v_small">
					<p class="trans_upper letter_small"> privacy policy</p>
					<p class="font_small">個人情報保護方針</p>
				</a>				
			</nav>
		</div>
	</div>
	<?php // コピーライト ?>
	<p class="bg_main-base color_mono_white font_small padding_v_small text_center">
		（C）2021 ペンワール・ドカタヤマ
	</p>
</footer>