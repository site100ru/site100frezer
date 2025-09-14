<?php
/**
 * Template Name: Контакты
 */

get_header(); ?>

<!--  Contacts -->
<section class="section text-dark section-about section-grid">
	<div class="container">
		<div class="section-title text-center mb-5">
			<h3 class="text-dark">Контакты</h3>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения" class="img-fluid" />
		</div>

		<!-- Контактный контент -->
		<div class="row mb-5 section-contacts">
			<!-- Пустая колонка -->
			<div class="d-none d-xl-block col-xl-1"></div>

			<!-- Первый блок -->
			<div class="col-12 col-md-6 col-xl-4 mb-0 mb-md-4">
				<div class="d-flex align-items-center mb-4 pb-md-3">
					<img
						src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/location-ico.svg"
						alt="Адрес"
						class="me-3 img-fluid"
					/>
					<p class="mb-0 text-min-text">
						гор. Химки, мкр-н Сходня, ул. Октябрьская, д. 29А, стр. 1
					</p>
				</div>

				<div class="d-flex align-items-center mb-4">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/clock-ico.svg" alt="Адрес" class="me-3 img-fluid" />
					<p class="mb-0 text-min-text">Ежедневно с 9:00 до 21:00</p>
				</div>
			</div>

			<!-- Второй блок -->
			<div class="col-12 col-md-6 col-xl-2 mb-0 mb-md-4">
				<div class="d-flex align-items-center mb-4 pb-md-3 flex-wrap">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/telephone-1.svg" alt="Адрес" class="me-3 img-fluid" />
					<a href="tel:+74994082271" class="text-decoration-none"
						>+7 499 408 22 71</a
					>
				</div>

				<div class="d-flex align-items-center mb-4 flex-wrap">
					<img
						src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/mobile-phone-ico.svg"
						alt="Адрес"
						class="me-3 img-fluid"
					/>
					<a href="tel:+79265930177" class="text-decoration-none"
						>+7 926 593 01 77</a
					>
				</div>
			</div>

			<!-- Пустая колонка -->
			<div class="d-none d-xl-block col-xl-1"></div>

			<!-- Третий блок -->
			<div class="col-12 col-md-12 col-xl-2 mb-0 mb-md-4">
				<div class="d-flex align-items-center mb-4 pb-md-3 flex-wrap">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/email-ico.svg" alt="Адрес" class="me-3 img-fluid" />
					<a href="mailto:zakaz@mglight.ru" class="text-decoration-none"
						>zakaz@mglight.ru
					</a>
				</div>

				<div class="d-flex align-items-center mb-4">
					<img
						src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/callback-ico.svg"
						alt="Адрес"
						class="me-3 img-fluid"
					/>

					<button
						class="nav-link d-flex align-items-center gap-3 gap-md-2 gap-xl-3 lh-1"
						data-bs-toggle="modal"
						data-bs-target="#callbackModal"
					>
						Обратный звонок
					</button>
				</div>
			</div>
		</div>

		<!-- Социальные сети -->
		<div class="d-flex justify-content-center gap-4 flex-wrap">
			<a href="https://wa.me/79265930177?web=1&amp;app_absent=1" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/whatsapp-ico.svg" alt="WhatsApp" style="width: 40px" />
			</a>
			<a href="https://t.me/+79265930177" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/telegram-ico.svg" alt="Telegram" style="width: 40px" />
			</a>
		</div>
	</div>
</section>
<!--  /Contacts  -->

<!-- Map -->
<section class="section p-0">
	<div class="container mb-5">
		<div class="row">
			<div class="col">
				<div id="map2"></div>
			</div>
		</div>
	</div>
</section>

<!-- /Map -->

<!-- API Yandex Map -->
<script
	src="https://api-maps.yandex.ru/2.1/?apikey=7a322092-0e89-4de6-8bff-0a1795b5548e&lang=ru_RU"
	type="text/javascript"
></script>

<script type="text/javascript">
	// Функция ymaps.ready() будет вызвана, когда
	// загрузятся все компоненты API, а также когда будет готово DOM-дерево.
	ymaps.ready(init);
	/* На разную ширину экрана разное приближение карты */
	var screenWidth = document.documentElement.clientWidth;
	if (screenWidth > 1000) {
		var center = [55.950744, 37.286771];
		var zoom = 17;
	} else {
		var center = [55.950744, 37.286771];
		var zoom = 15;
	}

	function init() {
		// Создание карты.
		var myMap = new ymaps.Map('map2', {
			// Координаты центра карты.
			// Порядок по умолчанию: «широта, долгота».
			// Чтобы не определять координаты центра карты вручную,
			// воспользуйтесь инструментом Определение координат.
			center: center, // Map center
			// Уровень масштабирования. Допустимые значения:
			// от 0 (весь мир) до 19.
			zoom: zoom,
		});
		var myPlacemark = new ymaps.Placemark(
			[55.950744, 37.286771],
			{},
			{
				iconLayout: 'default#image',
				iconImageHref: '<?php echo get_template_directory_uri(); ?>/assets/img/ico/placemark.png',
				iconImageSize: [240, 240],
				iconImageOffset: [-143, -230],
			},
		);
		myMap.behaviors.disable('scrollZoom'); // Disable zoom on scroll
		//myMap.behaviors.disable('multiTouch'); // Disable zoom
		//myMap.behaviors.disable('drag'); // Disable drag
		myMap.geoObjects.add(myPlacemark);
	}
</script>
<!-- /API Yandex Map -->

<?php get_footer(); ?>