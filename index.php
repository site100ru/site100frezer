<?php
	
	/**
	 * Template Name: Главная страница
	 * 
	 * Шаблон для главной страницы 
	 */
	
	get_header();
	
?>


<section class="main-home-section">
  <?php
  // Получаем ACF поля
  $background_image = get_field('page_background_image');
  $show_button = get_field('show_calculate_button');
  $page_title = get_the_title();
  $button_text = get_field('button_text') ?: 'Рассчитать стоимость';
  $modal_target = get_field('button_modal_target') ?: 'calculatePriceWithDownloadModal';
  ?>

  <!-- Параллакс секция с фоновым изображением -->
  <div class="parallax-home-section" <?php if ($background_image): ?>
      style="background-image: url('<?php echo esc_url($background_image['url']); ?>');" <?php endif; ?>>
  </div>

  <section class="d-none d-lg-block">
    <!-- Header nav top -->
    <header class="d-block header-top py-0">
      <nav class="header-nav-top navbar navbar-expand-lg navbar-light d-none d-lg-block py-1 py-lg-0">
        <div class="container-fluid">
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto align-items-center">
              <li class="nav-item me-3 me-md-1 me-xl-3">
                <div class="nav-link d-flex align-items-center gap-3 gap-md-2 gap-xl-3 lh-1 nav-link-text"
                  style="cursor: pointer;">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/location-ico.svg" />
                  гор. Химки, мкр-н Сходня,
                  <br />
                  ул. Октябрьская, д. 29А, стр. 1
                </div>
              </li>
              <li class="nav-item me-3 me-md-1 me-xl-3">
                <div class="nav-link d-flex align-items-center gap-3 gap-md-2 gap-xl-3 lh-1 nav-link-text"
                  style="cursor: pointer;">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/clock-ico.svg" />
                  Ежедневно
                  <br />с 9:00 до 21:00
                </div>
              </li>
              <li class="nav-item me-3 me-md-1 me-xl-3">
                <a class="nav-link d-flex align-items-center gap-3 gap-md-2 gap-xl-3 lh-1 nav-link-text"
                  href="mailto:zakaz@mglight.ru">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/email-ico.svg" />
                  zakaz@mglight.ru
                </a>
              </li>
              <li class="nav-item me-3 me-md-1 me-xl-3">
                <button class="nav-link d-flex align-items-center gap-3 gap-md-2 gap-xl-3 lh-1" data-bs-toggle="modal"
                  data-bs-target="#callbackModal">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/callback-ico.svg" />
                  Обратный звонок
                </button>
              </li>
              <li class="nav-item me-3 me-md-1 me-xl-3">
                <a class="top-menu-tel nav-link" href="tel:+74994082271">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/mobile-phone-ico.svg" />
                  +7 499 408 22 71
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ico-button" href="https://t.me/+79265930177">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/telegram-ico.svg" />
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ico-button" href="https://wa.me/79265930177?web=1&amp;app_absent=1">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/whatsapp-ico.svg" />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <hr class="hr-top" />

      <!-- Основная навигация -->
      <nav class="header-nav-bottom navbar navbar-expand-lg navbar-light py-1 py-lg-0">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-light.svg" />
          </a>

          <div class="d-lg-none">
            <a class="top-menu-tel pt-1 pb-0" style="font-size: 14px" href="tel:+74994082271">+7 499 408 22 71</a>
            <div style="
                  font-size: 10px;
                  font-family: Gilroy;
                  font-weight: 300;
                  text-transform: none;
                ">
              <img src="https://newtheme.site/wp-content/themes/dekorsever-wp/img/ico/clock-ico.svg"
                style="width: 12px; position: relative; top: -1px" class="me-1">Ежедневно с 9:00 до 21:00
            </div>
          </div>

          <button class="navbar-toggler mx-3 me-0 mx-lg-auto" type="button" data-bs-toggle="collapse"
            data-bs-target="#mobail-header-collapse" aria-controls="mobail-header-collapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="mobail-header-collapse">
            <?php
            // Выводим WordPress меню с Bootstrap Walker
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'depth' => 2,
              'container' => false,
              'menu_class' => 'navbar-nav align-items-start align-items-lg-center ms-auto mb-2 mb-lg-0',
              'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
              'walker' => new Bootstrap_Walker_Nav_Menu(),
            ));
            ?>

            <!-- Мобильное меню -->
            <li class="nav-item d-lg-none">
              <button class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#callbackModal">
                Обратный звонок
              </button>
            </li>
            <li class="nav-item d-lg-none text-dark">
              <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/location-ico.svg"
                  style="width: 13px" class="me-1" />
                <span>гор. Химки, мкр-н Сходня, ул. Октябрьская, д. 29А, стр. 1</span>
              </div>
              <a class="top-menu-tel nav-link fw-bold" href="tel:84912555505">8 (491) 2555-55-05</a>
              <div class="mb-2 d-flex">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/clock-ico.svg"
                  style="width: 10px; position: relative; top: 2px" class="me-1 mb-2" />
                <div>Ежедневно <br />с 9:00 до 21:00</div>
              </div>
            </li>
            <li class="nav-item d-lg-none pb-4">
              <a class="ico-button pe-2" href="https://wa.me/79265930177?web=1&amp;app_absent=1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/whatsapp-ico.svg" />
              </a>
              <a class="ico-button pe-0" href="https://t.me/+79265930177">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/telegram-ico.svg" />
              </a>
            </li>
          </div>
        </div>
      </nav>
    </header>
  </section>

  <!-- Плавающий заголовок -->
  <header id="sliding-header" class="shadow">
    <nav class="header-nav-bottom navbar navbar-expand-lg navbar-light py-lg-0">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-dark.svg" />
        </a>

        <div class="d-lg-none">
          <a class="top-menu-tel pt-1 pb-0" style="font-size: 14px" href="tel:+74994082271">+7 499 408 22 71</a>
          <div style="
                  font-size: 10px;
                  font-family: Gilroy;
                  font-weight: 300;
                  text-transform: none;
                ">
            <img src="https://newtheme.site/wp-content/themes/dekorsever-wp/img/ico/clock-ico.svg"
              style="width: 12px; position: relative; top: -1px" class="me-1">Ежедневно с 9:00 до 21:00
          </div>
        </div>

        <button class="navbar-toggler mx-3 me-0 mx-lg-auto" type="button" data-bs-toggle="collapse"
          data-bs-target="#sliding-header-collapse" aria-controls="sliding-header-collapse" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="sliding-header-collapse">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'depth' => 2,
            'container' => false,
            'menu_class' => 'navbar-nav align-items-start align-items-lg-center ms-auto mb-2 mb-lg-0',
            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
            'walker' => new Bootstrap_Walker_Nav_Menu(),
          ));
          $menu_output = ob_get_clean();

          $mobile_items = '
          <li class="nav-item d-lg-none">
            <button class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#callbackModal">
              Обратный звонок
            </button>
          </li>

          <li class="nav-item d-lg-none text-dark">
            <div>
              <img src="' . get_template_directory_uri() . '/assets/img/ico/location-ico.svg" style="width: 13px" class="me-1" />
              <span>гор. Химки, мкр-н Сходня, ул. Октябрьская, д. 29А, стр. 1</span>
            </div>
            <a class="top-menu-tel nav-link" href="tel:84912555505">8 (491) 2555-55-05</a>
            <div class="mb-2 d-flex gap-1">
              <img src="' . get_template_directory_uri() . '/assets/img/ico/clock-ico.svg" style="width: 10px; position: relative; top: 2px" class="me-1" />
              <div class="text">Ежедневно <br />с 9:00 до 21:00</div>
            </div>
          </li>

          <li class="nav-item d-lg-none pb-4">
            <a class="ico-button pe-2" href="https://wa.me/79265930177?web=1&amp;app_absent=1">
              <img src="' . get_template_directory_uri() . '/assets/img/ico/whatsapp-ico.svg" />
            </a>
            <a class="ico-button pe-0" href="https://t.me/+79265930177">
              <img src="' . get_template_directory_uri() . '/assets/img/ico/telegram-ico.svg" />
            </a>
          </li>';

          echo str_replace('</ul>', $mobile_items . '</ul>', $menu_output);
          ?>



        </div>
      </div>
    </nav>
  </header>

  <!-- Основной контент страницы -->
  <div class="container">
    <div class="row align-items-center home-section-height service-page">
      <div class="col">
        <h1 class="home-title mb-0">
          <?php echo esc_html(get_the_title()); ?>
        </h1>

        <?php if ($show_button): ?>
          <a href="#" type="button" class="btn btn-primary mt-3 mt-md-5" data-bs-toggle="modal"
            data-bs-target="#<?php echo esc_attr($modal_target); ?>">
            <?php echo esc_html($button_text); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h3 class="text-dark">Наши услуги</h3>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения"
        class="img-fluid">
    </div>
    <div class="row g-4">
      <?php
      // Получаем все услуги
      $services_query = new WP_Query(array(
        'post_type' => 'services',
        'posts_per_page' => -1, // Выводим все услуги
        'post_status' => 'publish',
        'meta_key' => '_thumbnail_id', // Только услуги с миниатюрами
        'orderby' => 'menu_order',
        'order' => 'ASC'
      ));

      if ($services_query->have_posts()):
        while ($services_query->have_posts()):
          $services_query->the_post();
          $service_permalink = get_permalink();
          $service_title = get_the_title();
          $service_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');

          // Если нет миниатюры, используем заглушку
          if (!$service_thumbnail) {
            $service_thumbnail = get_template_directory_uri() . '/img/placeholder.png';
          }
          ?>
          <!-- Элемент услуги -->
          <div class="col-12 col-md-6 col-xl-4">
            <a href="<?php echo esc_url($service_permalink); ?>"
              class="work-item position-relative d-block overflow-hidden bg-linear-gradient">
              <img src="<?php echo esc_url($service_thumbnail); ?>" alt="<?php echo esc_attr($service_title); ?>"
                class="img-fluid work-image w-100">
              <div class="work-text text-white">
                <p><?php echo esc_html($service_title); ?></p>
              </div>
            </a>
          </div>
          <?php
        endwhile;
        wp_reset_postdata();
      else:
        ?>
        <div class="col-12">
          <p class="text-center">Услуги пока не добавлены.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php
// Если есть основной контент на главной странице
if (have_posts()):
  while (have_posts()):
    the_post();
    if (get_the_content()):
      ?>
      <section class="section">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </section>
      <?php
    endif;
  endwhile;
endif;
?>

<?php get_footer(); ?>