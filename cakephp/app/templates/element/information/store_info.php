<section>
	<div class="container_full padding_b_xlarge bg_main-deep color_mono_white">
		<div class="container">
			<h2 class="title_h2">
				<p>contact</p>
				<span>お問い合わせ</span>
			</h2>
			<div class="row_panels">
				<div class="col-24">
					<?= $this->element('information/rule') ?>
				</div>					
				<div class="col-md-12">
					<section class="panel color_mono_prim text_center">
						<h3 class="font_medium margin_b_small">
							<i class="material-icons">call</i>
							お電話でのご連絡
						</h3>
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
					</section>
				</div>
				<div class="col-md-12">
					<section class="panel color_mono_prim text_center height_full">
						<h3 class="font_medium margin_b_small">
							<i class="material-icons">email</i>
							Webフォームでのご連絡
						</h3>
						<p class="text_center margin_v_xsmall">
							24時間受付中
						</p>						
						<div>
							<div class="btn_group_block">
								<a href="<?php echo $this->Url->build([ 'controller' => 'contact', 'action' => 'index']); ?>" class="btn_main">お問い合わせフォーム</a>
							</div>
						</div>
					</section>
				</div>
				<div class="col-24">
					<section class="panel color_mono_prim">
						<h3 class="font_medium margin_b_small text_center">
							<i class="material-icons">location_on</i>
							店舗までの道のり
						</h3>
						<div class="row">
							<div class="col-md-16">
								<div class="ratio_double">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.8272554407845!2d139.7710565154512!3d35.70586833622742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ea073f361a1%3A0xe09cce5967ca5132!2z44CSMTEwLTAwMDUg5p2x5Lqs6YO95Y-w5p2x5Yy65LiK6YeO77yT5LiB55uu77yR77yY4oiS77yR77yS!5e0!3m2!1sja!2sjp!4v1630144825587!5m2!1sja!2sjp" class="google_map" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
								</div>
							</div>
							<div class="col-md-8">
								<p>
									〒110-0005<br>
									東京都台東区上野3-18-12 <span class="inline_block">(目印：上野アテネ看板下1階)</span>
								</p>
								<p class="margin_t_xsmall">
									3-18-12, Ueno, Taito-ku, Tokyo
								</p>
								<div class="btn_group_block margin_t_large">
									<a href="<?php echo $this->Url->build([ 'controller' => 'store', 'action' => 'index', '#' => 'access']); ?>" class="btn_main">access</a>
								</div>
							</div>
						</div>
					</section>
				</div>			
			</div>
		</div>
	</div>
</section>