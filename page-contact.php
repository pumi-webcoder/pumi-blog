<?php get_header(); ?>

<!-- BackGround -->
<div class="p-bg"></div>

<!-- headerの高さ分の余白を取る -->
<div class="u-separeta--header"></div>

<!-- privacy-policy -->
<section id="contact" class="l-section p-section p-contact wow fadeInUp">
	<div class="l-inner">
		<hgroup class="p-section__title">
			<h2 class="c-section-title">お問い合わせ</h2>
		</hgroup>

		<div class="p-section__contents p-contact__contents">
			<!-- do_shortcode( '[contact-form-7 id="a41cad6" title="contact"]' ); -->
			<?php echo do_shortcode( '[contact-form-7 id="3eed163" title="contact"]' ); ?>

			<!-- 送信後のメッセージ -->
			<div id="js-success" class="p-contact__message--success">
				<p>
					送信完了しました。
					<br />ありがとうございました。 <br />3営業日以内にご返信いたします。
				</p>
			</div>
			<div id="js-error" class="p-contact__message--error">
				<p>
					送信に失敗しました。
					<br />ページを更新して再度送信してください。
				</p>
			</div>
		</div>				

	</div>
</section>

<?php get_footer(); ?>