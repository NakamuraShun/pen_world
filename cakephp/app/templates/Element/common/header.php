<header>
	<?php /* PC */ ?>
	<div class="view_pc">
		<div class="header_pc">
			<div class="header_pc_info">
				<div class="container">
					<?php // インフォメーション  ?>
					<div class="row row-cols-3 items_center padding_v_medium">
						<div class="flex items_center">
							<a href="" class="margin_r_medium">
								<i class="fab fa-youtube fa-2x"></i>
							</a>
							<a href="">
								<i class="fab fa-instagram fa-2x"></i>
							</a>
						</div>
						<a href="<?php echo $this->Url->build([ 'controller' => 'home', 'action' => 'index']); ?>" class="color_main-deep family_min line_narrow text_center hover_logo">
							<p class="font_medium trans_cap">pen world</p>
							<p class="font_xlarge trans_upper letter_middle">katayama</p>
							<p class="font_notice">ペンワールド・カタヤマ</p>
						</a>
						<div class="text_right family_min">
							<p class="font_large line_narrow">TEL:090-1888-7761</p>
							<p class="font_small">【受付時間】<span class="letter_small">10:00～19:00</span></p>
							<p class="font_small">【定休日】<span class="letter_small">日曜</span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="header_pc_nav">
				<div class="container">
					<?php // メニュー ?>
					<nav class="row row-cols-7 gutter_reset items_center text_center family_min">
						<a href="<?php echo $this->Url->build([ 'controller' => 'about', 'action' => 'index']); ?>" class="header_pc_nav_item padding_v_small">
							<p class="trans_upper letter_small">about</p>
							<p class="font_small">PWKについて</p>
						</a>
						<a href="<?php echo $this->Url->build([ 'controller' => 'items', 'action' => 'index']); ?>" class="header_pc_nav_item padding_v_small">
							<p class="trans_upper letter_small">item</p>
							<p class="font_small">取扱万年筆</p>
						</a>
						<a href="<?php echo $this->Url->build([ 'controller' => 'ownBrand', 'action' => 'index']); ?>" class="header_pc_nav_item padding_v_small">
							<p class="trans_upper letter_small">own brand</p>
							<p class="font_small">自社ブランド</p>
						</a>
						<a href="<?php echo $this->Url->build([ 'controller' => 'Articles', 'action' => 'index']); ?>" class="header_pc_nav_item padding_v_small">
							<p class="trans_upper letter_small">event / news</p>
							<p class="font_small">展示会 / お知らせ</p>
						</a>
						<a href="<?php echo $this->Url->build([ 'controller' => 'store', 'action' => 'index']); ?>" class="header_pc_nav_item padding_v_small">
							<p class="trans_upper letter_small">store</p>
							<p class="font_small">店舗情報</p>
						</a>				
						<a href="<?php echo $this->Url->build([ 'controller' => 'repair', 'action' => 'index']); ?>" class="header_pc_nav_item padding_v_small">
							<p class="trans_upper letter_small">repair</p>
							<p class="font_small">修理調整</p>
						</a>
						<a href="<?php echo $this->Url->build([ 'controller' => 'contact', 'action' => 'index']); ?>" class="header_pc_nav_item padding_v_small">
							<p class="trans_upper letter_small">contact</p>
							<p class="font_small">お問い合わせ</p>
						</a>
					</nav>
				</div>
			</div>
		</div>
	</div>		

	<?php /* SP */ ?>
	<div class="view_sp">
		<div class="header_sp">
			<div class="header_sp_info flex justify_between items_center">
				<?php // インフォメーション  ?>
				<div class="header_sp_info_item flex items_center padding_l_medium">
					<a href="<?php echo $this->Url->build([ 'controller' => 'home', 'action' => 'index']); ?>" class="color_main-deep text_center family_min line_narrow">
						<p class="font_small trans_cap">
							pen world
						</p>
						<p class="font_medium trans_upper letter_small text_nowrap">
							katayama
						</p>
						<p class="font_notice">
							ペンワールド・カタヤマ
						</p>
					</a>
				</div>
				<div class="header_sp_info_item flex">
					<div class="box_1by1 bg_main-light color_main-deep">
						<a href="tel:+81-90-1888-7761" class="flex justify_center items_center">
							<i class="material-icons fa-2x">call</i>
						</a>
					</div>
					<div class="box_1by1 hamburger_menu">
						<input id="SP_MENU" type="checkbox">
						<label for="SP_MENU">
							<span></span>
						</label>
					</div>
				</div>
			</div>
			<div class="header_sp_nav flex justify_end" id="js-sp-menu-close-trigger">
				<?php // メニュー ?>
				<nav class="flex_column gutter_reset justify_end family_min">
					<a href="<?php echo $this->Url->build([ 'controller' => 'about', 'action' => 'index']); ?>" class="header_sp_nav_item padding_v_small padding_h_medium">
						<p class="trans_upper letter_small">about</p>
						<p class="font_small">PWKについて</p>
					</a>
					<a href="<?php echo $this->Url->build([ 'controller' => 'items', 'action' => 'index']); ?>" class="header_sp_nav_item padding_v_small padding_h_medium">
						<p class="trans_upper letter_small">item</p>
						<p class="font_small">取扱万年筆</p>
					</a>
					<a href="<?php echo $this->Url->build([ 'controller' => 'ownBrand', 'action' => 'index']); ?>" class="header_sp_nav_item padding_v_small padding_h_medium">
						<p class="trans_upper letter_small">own brand</p>
						<p class="font_small">自社ブランド</p>
					</a>
					<a href="<?php echo $this->Url->build([ 'controller' => 'Articles', 'action' => 'index']); ?>" class="header_sp_nav_item padding_v_small padding_h_medium">
						<p class="trans_upper letter_small">event / news</p>
						<p class="font_small">展示会 / お知らせ</p>
					</a>
					<a href="<?php echo $this->Url->build([ 'controller' => 'store', 'action' => 'index']); ?>" class="header_sp_nav_item padding_v_small padding_h_medium">
						<p class="trans_upper letter_small">store</p>
						<p class="font_small">店舗情報</p>
					</a>				
					<a href="<?php echo $this->Url->build([ 'controller' => 'repair', 'action' => 'index']); ?>" class="header_nav_item padding_v_small padding_h_medium">
						<p class="trans_upper letter_small">repair</p>
						<p class="font_small">修理調整</p>
					</a>
					<a href="<?php echo $this->Url->build([ 'controller' => 'contact', 'action' => 'index']); ?>" class="header_nav_item padding_v_small padding_h_medium">
						<p class="trans_upper letter_small">contact</p>
						<p class="font_small">お問い合わせ</p>
					</a>
				</nav>
			</div>
		</div>
	</div>
</header>

<script>
	// sp menu
	let sp_menu_open_btn = document.getElementById('js-sp-menu-open-trigger');
	sp_menu_open_btn.addEventListener('click', () => {
		document.getElementsByTagName('body')[0].classList.toggle('is-active');
	})
	let sp_menu_close_bg = document.getElementById('js-sp-menu-close-trigger');
	sp_menu_close_bg.addEventListener('click', () => {
		document.getElementsByTagName('body')[0].classList.toggle('is-active');
	})
</script>