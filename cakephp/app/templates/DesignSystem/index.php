<h1>
	<?= h($H1) ?>
</h1>

<div class="container_full">
	<div class="page_title_area">
		<h1 class="title_h1">
			<p>about</p>
			<span>&#x5b; pwkについて &#x5d;</span>
		</h1>
	</div>
</div>

<div class="container">
	<section>
		<h2 class="title_h2">
			<p>title</p>
			<span>タイトル</span>
		</h2>
		<section>
			<h2 class="title_h2">
				<p>sample</p>
				<span>日本語テキスト</pain>
			</h2>
			<h3 class="title_h3">
				<p>h3 sample</p>
				<span>日本語テキスト</span>
			</h3>
			<h4 class="title_h4">
				h4 サンプル
			</h4>
		</section>
	</section>

	<section>
		<h2 class="title_h2">
			<p>color</p>
			<span>色</spansub>
		</h2>
		<?php /* mono */ ?>
		<section>
			<h3 class="title_h3">
				<p>mono</p>
				<span>無彩色</span>
			</h3>
			<div class="bg_mono_body padding_medium">
				$colorMonoBody(bodyやsection背景色)
				<div class="bg_mono_content padding_medium">
					$colorMonoContentBody(ボタンやテーブル背景色)
					<div class="bg_mono_sub-content frame_mono_sub-border padding_medium">
						<p>背景色:$colorMonoSubContentBody(サブコンテンツの背景色) / 枠線:$colorMonoSubContentBorder(サブコンテンツの枠色)</p>
						<p class="margin_t_medium">$colorMonoRule(hrでsectionや情報の区切りの色)↓</p>
						<hr>
						<p class="color_mono_prim">$colorMonoTextPrim(textの基本色)</p>
						<p class="color_mono_second">$colorMonoTextSecond(text_subの色)</p>
						<p class="color_mono_tert">$colorMonoTextTert(プレースホルダーなどの色)</p>
						<p class="color_mono_white">$colorMonoTextWhite(濃い背景色を使うサイトに使うフォント色 or アイコンに適応)</p>
					</div>
				</div>
			</div>
		</section>

	</section>

	<section>
		<h2 class="title_h2">
			<p>section back ground(使用予定)</p>
			<span>セクション背景色</ｓ>
		</h2>
		<div class="bg_main-deep padding_large color_mono_white">bg_main-deep</div>
		<div class="bg_main-light padding_large">bg_main-light</div>
		<div class="bg_main-low padding_large">bg_main-low</div>
	</section>

	<section>
		<h2 class="title_h2">
			<p>grid</p>
			<span>グリッド</span>
		</h2>
		<div class="row row-cols-sm-4">
			<div>
				<div class="bg_main-deep color_mono_tert padding_medium">グリッド1</div>
			</div>
			<div>
				<div class="bg_main-base color_mono_tert padding_medium">グリッド2</div>
			</div>		
			<div>
				<div class="bg_main-light padding_medium">グリッド3</div>
			</div>
			<div>
				<div class="bg_main-low padding_medium">グリッド4</div>
			</div>		
		</div>
	</section>

	<section>
		<h2 class="title_h2">
			<p>list</p>
			<span>リスト</span>
		</h2>
		<ul class="list_dot">
			<li class="color_main-base">あああああああああああああ</li>
			<li>あああああああ</li>
			<li>あああああああ</li>
		</ul>
		<ul class="list_comment font_medium">
			<li>ああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ</li>
			<li>あああああああ</li>
			<li>あああああああ</li>
		</ul>
		<ol class="list_number">
			<li>ああああああああああああああああああああああああああ</li>
			<li>あああああああ</li>
			<li>あああああああ</li>
		</ol>
	</section>

	<section>
		<h2 class="title_h2">
			<p>text link</p>
			<span>テキストリンク</span>
		</h2>
		<div>
			<a href="" class="text_link">テキストリンク</a>
		</div>
		<div class="bg_main-deep">
			<a href="" class="text_link color_mono_tert">テキストリンク</a>
		</div>
		<div class="icon_link_arr">
			<a href="">テキストリンクテキストリンクテキストリンクテキストリンクリンク</a>
		</div>
		<div class="icon_link_info">
			<a href="">テキストリンクテキストリンクテキストリンクテキストリンクリンク</a>
		</div>
	</section>

	<section>
		<h2 class="title_h2">
			<p>icon text</p>
			<span>アイコンテキスト</span>
		</h2>
		<p>
			<i class="material-icons">favorite</i>テキストテキスト
		</p>
	</section>

	<section>
		<h2 class="title_h2">
			<p>marker</p>
			<span>強調</span>
		</h2>
			<p>テキストテキスト<span class="marker_main">マーカー</span>テキストテキスト</p>
			<p class="text_sub">テキストテキスト</p>
	</section>

	<section>
		<h2 class="title_h2">
			<p>table</p>
			<span>テーブル</span>
		</h2>
		<table class="table_block">
			<tr>
				<th>項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目</th>
				<td>データ</td>
			</tr>
			<tr>
				<th>項目</th>
				<td>データデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータ</td>
			</tr>
			<tr>
				<th>項目</th>
				<td>データ</td>
			</tr>
		</table>

		<table class="table_respo margin_t_medium">
			<tr>
				<th>項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目項目</th>
				<td>データ</td>
			</tr>
			<tr>
				<th>項目</th>
				<td>データデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータデータ</td>
			</tr>
			<tr>
				<th>項目</th>
				<td>データ</td>
			</tr>
		</table>
	</section>

	<section>
		<h2 class="title_h2">
			<p>button</p>
			<span>ボタン</span>
		</h2>
		<div class="row row-cols-sm-2">
			<div>
				<h3>
					aタグに設定。inline-block要素のため、gridやtext-alignでレイアウトを制御。<br>
					600px(sm)まではblock要素で width: 100%;　状態。
				</h3>
				<a href="" class="btn">btn</a>
				<a href="" class="btn_main">btn_main</a>
				<a href="" class="btn_positive">btn_positive</a>
				<a href="" class="btn_warning">btn_warning</a>
				<a href="" class="btn_negative">btn_negative</a>
			</div>
			<div>
				<h3>
					アイコンを変える場合は、btn_**に以下を併記して擬似要素を上書きする
				</h3>
				<a href="" class="btn_main btn_blank" target="_blank">btn_blank</a>
				<a href="" class="btn_main btn_anchor">btn_anchor</a>
			</div>
		</div>
		<hr>
		<h3>
			text-align:center;のため文字が開業される際は中庸揃え
		</h3>
		<a href="" class="btn_main">アンカーリンクアンカーリンクアンカーリンクアンカーリンクアンカーリンクアンカーリンクアンカーリンク</a>

		<hr>
		<h3>SPは縦,PCは横並び<br>(row>col)</h3>
		<div class="row">
			<div class="col-sm-12 text_right">
				<a href="" class="btn_main">詳しくみる</a>
			</div>
			<div class="col-sm-12">
				<a href="" class="btn_main btn_blank" target="_blank">ターゲットブランク</a>
			</div>
		</div>

		<hr>
		<h3>常時横並び(高さを揃えるため、flex_row flex_nowrap)</h3>
		<div class="flex flex_nowrap justify_center">
			<a href="" class="btn_main">詳しくみる</a>
			<a href="" class="btn_main btn_blank margin_l_small" target="_blank">ターゲットブランク</a>
		</div>
	</section>

	<section>
		<h2 class="title_h2">
			<p>card</p>
			<span>カード</span>
		</h2>
		<div class="row row-cols-sm-3">
			<div>
				<div class="card">
					<a href="">
						<p class="color_mono_second weight_bold margin_b_xsmall">card</p>
						<p>
							カードのテキストです。カードのテキストです。
							カードのテキストです。カードのテキストです。
						</p>
					</a>
				</div>
			</div>
			<div>
				<div class="card_main">
					<a href="">
						<p class="color_main-base weight_bold margin_b_xsmall">card_main</p>
						<p>
							カードのテキストです。カードのテキストです。
							カードのテキストです。カードのテキストです。
						</p>
					</a>
				</div>
			</div>
			<div>
				<div class="card_positive">
					<a href="">
						<p class="color_positive weight_bold margin_b_xsmall">card_positive</p>
						<p>
							カードのテキストです。カードのテキストです。
							カードのテキストです。カードのテキストです。
						</p>
					</a>
				</div>
			</div>
			<div>
				<div class="card_warning">
					<a href="">
						<p class="color_warning weight_bold margin_b_xsmall">card_warning</p>
						<p>
							カードのテキストです。カードのテキストです。
							カードのテキストです。カードのテキストです。
						</p>
					</a>
				</div>
			</div>
			<div>
				<div class="card_negative">
					<a href="">
						<p class="color_negative weight_bold margin_b_xsmall">card_negative</p>
						<p>
							カードのテキストです。カードのテキストです。
							カードのテキストです。カードのテキストです。
						</p>
					</a>
				</div>
			</div>		
		</div>
	</section>

	<section>
		<h2 class="title_h2">
			<p>panel</p>
			<span>パネル</span>
		</h2>
		<div class="row row-cols-sm-3">
			<div>
				<div class="panel">
					<p class="color_mono_second weight_bold margin_b_xsmall">panel</p>
					<p>
						パネルの中身です。パネルの中身です。パネルの中身です。パネルの中身です。
						パネルの中身です。パネルの中身です。パネルの中身です。パネルの中身です。
					</p>
				</div>
			</div>
			<div>
				<div class="panel_main">
					<p class="color_main-base weight_bold margin_b_xsmall">panel_main</p>
					<p>
						パネルの中身です。パネルの中身です。パネルの中身です。パネルの中身です。
						パネルの中身です。パネルの中身です。パネルの中身です。パネルの中身です。
					</p>
				</div>
			</div>
			<div>
				<div class="panel_positive">
					<p class="color_positive weight_bold margin_b_xsmall">panel_positive</p>
					<p>
						パネルの中身です。パネルの中身です。パネルの中身です。パネルの中身です。
						パネルの中身です。パネルの中身です。パネルの中身です。パネルの中身です。
					</p>
				</div>
			</div>
			<div>
				<div class="panel_warning">
					<p class="color_warning weight_bold margin_b_xsmall">panel_warning</p>
					<p>
						パネルの中身です。パネルの中身です。パネルの中身です。パネルの中身です。
						パネルの中身です。パネルの中身です。パネルの中身です。パネルの中身です。
					</p>
				</div>
			</div>
			<div>
				<div class="panel_negative">
					<p class="color_negative weight_bold margin_b_xsmall">panel_negative</p>
					<p>
						パネルの中身です。パネルの中身です。パネルの中身です。パネルの中身です。
						パネルの中身です。パネルの中身です。パネルの中身です。パネルの中身です。
					</p>
				</div>
			</div>
		</div>
	</section>

	<section>
		<h2 class="title_h2">
			<p>thumb</p>
			<span>サムネイル</span>
		</h2>
		<div class="row">
			<div class="col-md-8">
				<p>small(50px)</p>
				<figure>
					<img src="https://placehold.jp/300x300.png" class="thumb_angle_small" alt="">
				</figure>
			</div>
			<div class="col-md-8">
				<p>medium(50px)</p>
				<figure>
					<img src="https://placehold.jp/300x300.png" class="thumb_angle_medium" alt="">
				</figure>
			</div>
			<div class="col-md-8">
				<p>large(100px)</p>
				<figure>
					<img src="https://placehold.jp/300x300.png" class="thumb_angle_large" alt="">
				</figure>
			</div>
		</div>
		<div class="row margin_t_small">
			<div class="col-md-8">
				<p>small(50px)</p>
				<figure>
					<img src="https://placehold.jp/300x300.png" class="thumb_round_small" alt="">
				</figure>
			</div>
			<div class="col-md-8">
				<p>medium(50px)</p>
				<figure>
					<img src="https://placehold.jp/300x300.png" class="thumb_round_medium" alt="">
				</figure>
			</div>
			<div class="col-md-8">
				<p>large(100px)</p>
				<figure>
					<img src="https://placehold.jp/300x300.png" class="thumb_round_large" alt="">
				</figure>
			</div>
		</div>		
	</section>

	<section>
		<h2 class="title_h2">
			<p>thumb</p>
			<span>サムネイル</span>
		</h2>
		
		<span class="label">更新日 12/30</span>
	</section>

	<section>
		<h2 class="title_h2">
			<p>ratio</p>
			<span>比率</span>
		</h2>
		<div class="row row-cols-sm-4">
			<div>
				<div class="ratio_equal bg_mono_sub-content frame_main-base"></div>
				<p>ratio_equal 1:1 正方形</p>
			</div>
			<div>
				<div class="ratio_silver bg_mono_sub-content frame_main-base"></div>
				<p>ratio_golden 4:3 白銀比</p>
			</div>
			<div>
				<div class="ratio_golden bg_mono_sub-content frame_main-base weight_bold"></div>
				<p>ratio_golden 16:9 黄金比</p>
			</div>
			<div>
				<div class="ratio_double bg_mono_sub-content frame_main-base"></div>
				<p>ratio_double 2:1 ２倍</p>
			</div>
		</div>
		
	</section>

<br><br><br><br><br><br><br><br>


</div>