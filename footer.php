<!-- CONTACTS SECTION 4 -->
<section class="footer bg-dark">
	<!-- Desktop version -->
	<div class="container-fluid py-5 d-none d-xl-block">
		<div class="row align-items-center">
			<div class="col-xl-2">
				<a href="<?php echo home_url(); ?>">
					<img id="navbar-brand-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-light.svg" class="img-fluid" />
				</a>
			</div>
			<div class="col-xl-8">
				<div class="navbar-collapse">
					<?php
					// Выводим меню для десктопной версии
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'depth' => 2,
						'container' => false,
						'menu_class' => 'navbar-nav ms-auto mb-3 mb-lg-0 d-flex flex-row justify-content-center align-items-center',
						'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
						'walker' => new Bootstrap_Walker_Nav_Menu(),
					));
					?>
				</div>
			</div>
			<div class="col-xl-2 text-end">
				<a href="tel:+74994082271" class="top-menu-tel nav-link">
					<img
						src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/mobile-phone-ico.svg"
						class="me-2"
						style="position: relative; bottom: 1px"
					/>+7 <span style="color: var(--color-accent)">499</span> 408 22 71
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col py-4 d-flex justify-content-center align-items-center">
				<ul class="nav footer-nav align-items-center">
					<li class="nav-item me-3">
						<div
							class="nav-link d-flex align-items-center gap-3 lh-1 nav-link-text"
							style="cursor: pointer;"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/location-ico.svg" />
							гор. Химки, мкр-н Сходня,
							<br />
							ул. Октябрьская, д. 29А, стр. 1
						</div>
					</li>
					<li class="nav-item me-3">
						<div
							class="nav-link d-flex align-items-center gap-3 lh-1 nav-link-text"
							style="cursor: pointer;"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/clock-ico.svg" />
							Ежедневно
							<br />с 9:00 до 21:00
						</div>
					</li>

					<li class="nav-item me-3">
						<a
							class="nav-link d-flex align-items-center gap-3 lh-1"
							href="mailto:zakaz@mglight.ru"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/email-ico.svg" />
							zakaz@mglight.ru
						</a>
					</li>

					<li class="nav-item me-3">
						<button
							class="nav-link d-flex align-items-center gap-3 lh-1"
							data-bs-toggle="modal"
							data-bs-target="#callbackModal"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/callback-ico.svg" />
							<span>Обратный звонок</span>
						</button>
					</li>
				</ul>
			</div>
		</div>

		<div class="row justify-content-center footer-icon">
			<div class="col">
				<ul class="nav justify-content-center">
					<li class="nav-item">
						<a
							class="nav-link ico-button px-2"
							href="https://wa.me/79265930177?web=1&amp;app_absent=1"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/whatsapp-ico.svg" />
						</a>
					</li>
					<li class="nav-item">
						<a
							class="nav-link ico-button px-2"
							href="https://t.me/+79265930177"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/telegram-ico.svg" />
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Desktop version -->

	<!-- Mobile version -->
	<div class="container d-xl-none">
		<div class="row">
			<div class="col py-5">
				<a href="<?php echo home_url(); ?>">
					<img id="navbar-brand-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-light.svg" class="img-fluid" />
				</a>
				<ul class="ps-0 pt-5 pt-md-3 pb-2 navbar-nav">
					<div class="ps-0 pb-2">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/location-ico.svg" class="me-2" />
						<span>
							гор. Химки, мкр-н Сходня, ул. Октябрьская, д. 29А, стр. 1</span
						>
					</div>

					<div class="ps-0 py-2">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/clock-ico.svg" class="me-2" />
						<span>Ежедневно с 9:00 до 21:00</span>
					</div>

					<li class="nav-item">
						<a
							href="mailto:zakaz@mglight.ru"
							class="nav-link ps-0 py-2 footer-mail"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/email-ico.svg" class="me-2" />
							zakaz@mglight.ru
						</a>
					</li>
					<li class="nav-item">
						<button
							class="nav-link ps-0 pt-2"
							data-bs-toggle="modal"
							data-bs-target="#callbackModal"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/callback-ico.svg" class="me-2" />
							Обратный звонок
						</button>
					</li>
				</ul>
				<a href="tel:+74994082271" class="top-menu-tel nav-link">
					<img
						src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/mobile-phone-ico.svg"
						class="me-2"
						style="position: relative; bottom: 1px"
					/>+7 <span style="color: var(--color-accent)">499</span> 408 22 71
				</a>
				<ul class="nav pt-4 pb-3">
					<li class="nav-item">
						<a
							class="nav-link ico-button px-2"
							href="https://wa.me/79265930177?web=1&amp;app_absent=1"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/whatsapp-ico.svg" />
						</a>
					</li>
					<li class="nav-item">
						<a
							class="nav-link ico-button px-2"
							href="https://t.me/+79265930177"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/telegram-ico.svg" />
						</a>
					</li>
				</ul>
				<div class="row footer-menu">
					<div class="col-6">
						<?php
						// Выводим меню для мобильной версии - первая колонка
						wp_nav_menu(array(
							'theme_location' => 'footer_left',
							'depth' => 2,
							'container' => false,
							'menu_class' => 'nav flex-column',
							'items_wrap' => '<ul class="%2$s">%3$s</ul>',
							'link_before' => '',
							'link_after' => '',
							'fallback_cb' => false,
							'walker' => new Bootstrap_Walker_Nav_Menu(),
						));
						?>
					</div>
					<div class="col-6">
						<?php
						// Выводим меню для мобильной версии - вторая колонка
						wp_nav_menu(array(
							'theme_location' => 'footer_right',
							'depth' => 1,
							'container' => false,
							'menu_class' => 'nav flex-column',
							'items_wrap' => '<ul class="%2$s">%3$s</ul>',
							'link_before' => '',
							'link_after' => '',
							'fallback_cb' => false,
							'walker' => new Bootstrap_Walker_Nav_Menu(),
						));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr />

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col text-start text-md-center">
					<div id="im-in-footer">
						Создание и продвижение сайтов:
						<a href="https://site100.ru" class="text-light"
							>site<span style="color: var(--color-accent)">100</span>.ru</a
						>
					</div>
					<div class="policy-in-footer">
						<a href="<?php echo get_template_directory_uri(); ?>/docs/Privacy-Policy.pdf" target="_blank"
							>Политика конфиденциальности</a
						>
						|
						<a
							href="<?php echo get_template_directory_uri(); ?>/docs/Consent-to-the-processing-of-personal-data.pdf"
							target="_blank"
							>Согласие на обработку персональных данных</a
						>
					</div>
				</div>
			</div>
		</div>
	</footer>
</section>
<!-- /CONTACTS SECTION 4 -->

<!-- Callback Modal -->
<div
	class="modal fade"
	id="callbackModal"
	tabindex="-1"
	aria-labelledby="callbackModalLabel"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered">
		<form method="post" action="mails/callback-mail.php" class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="callbackModalLabel">Обратный звонок</h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col">
						<p>
							<small
								>Мы свяжемся с Вами в ближайшее время и ответим на все
								вопросы! Для звонка введите Ваше имя и телефон.</small
							>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-3 mb-md-0">
						<input
							type="text"
							name="name"
							class="form-control"
							placeholder="Ваше имя"
						/>
					</div>
					<div class="col-md-6">
						<input
							type="text"
							name="tel"
							class="form-control telMask"
							placeholder="Ваш телефон*"
						/>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-lg btn-corporate-color-1 mx-auto">
					Перезвонить
				</button>
			</div>
		</form>
	</div>
</div>
<!-- /Callback Modal -->

<!-- Рассчитать стоимость с загрузкой изображения -->
<div
	class="modal fade"
	id="calculatePriceWithDownloadModal"
	tabindex="-1"
	aria-labelledby="calculatePriceWithDownloadLabel"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered">
		<form
			method="post"
			action="<?php echo get_template_directory_uri(); ?>/mails/get_calculate.php"
			class="modal-content"
			enctype="multipart/form-data"
		>
			<div class="modal-header">
				<h5 class="modal-title" id="calculatePriceWithDownloadLabel">
					Рассчитать стоимость
				</h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				<div class="row pb-2">
					<div class="col-12">
						<p>
							<small
								>Опишите задачу своими словами, укажите форму, размеры, материалы и другую информацию</small
							>
						</p>
					</div>
					<div class="col-12 mb-3">
						<textarea
							type="text"
							rows="3"
							name="mes"
							class="form-control form-control-corporate-color-1"
							placeholder=""
						></textarea>
					</div>
					<div class="col-12">
						<p>
							<small
								>Вы можете прикрепить проект, изображение или схематично
								нарисованный рисунок кухни.</small
							>
						</p>
					</div>
					<div class="mb-3">
						<div class="input-group custom-file-button">
							<label
								class="input-group-text"
								for="inputGroupFile"
								style="border-radius: 5px"
								>Прикрепить</label
							>
							<input
								type="file"
								name="file[]"
								class="form-control"
								id="inputGroupFile"
								accept=".jpg,.jpeg,.png,.pdf,.heic"
								multiple
							/>
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<input
							type="text"
							name="name"
							class="form-control form-control-corporate-color-1"
							placeholder="Ваше имя"
						/>
					</div>
					<div class="col-md-6 mb-3">
						<input
							type="text"
							name="tel"
							class="form-control form-control-corporate-color-1 telMask"
							placeholder="Ваш телефон*"
							required
						/>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-primary">Отправить</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- /Рассчитать стоимость с загрузкой изображения -->

<?php wp_footer(); ?>

<!-- Подключение дополнительных скриптов -->
<script>
	// Маска для телефона
	document.addEventListener('DOMContentLoaded', function () {
		if (typeof Inputmask !== 'undefined') {
			var telInputs = document.querySelectorAll('.telMask');
			var im = new Inputmask('+7 (999) 999-99-99');
			telInputs.forEach(function (input) {
				im.mask(input);
			});
		}
	});
</script>
</body>
</html>