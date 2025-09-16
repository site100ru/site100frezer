<?php get_header(); ?>


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
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/location-ico.svg" />
                                    гор. Химки, мкр-н Сходня,
                                    <br />
                                    ул. Октябрьская, д. 29А, стр. 1
                                </div>
                            </li>
                            <li class="nav-item me-3 me-md-1 me-xl-3">
                                <div class="nav-link d-flex align-items-center gap-3 gap-md-2 gap-xl-3 lh-1 nav-link-text"
                                    style="cursor: pointer;">
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/clock-ico.svg" />
                                    Ежедневно
                                    <br />с 9:00 до 21:00
                                </div>
                            </li>
                            <li class="nav-item me-3 me-md-1 me-xl-3">
                                <a class="nav-link d-flex align-items-center gap-3 gap-md-2 gap-xl-3 lh-1 nav-link-text"
                                    href="mailto:zakaz@mglight.ru">
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/email-ico.svg" />
                                    zakaz@mglight.ru
                                </a>
                            </li>
                            <li class="nav-item me-3 me-md-1 me-xl-3">
                                <button class="nav-link d-flex align-items-center gap-3 gap-md-2 gap-xl-3 lh-1"
                                    data-bs-toggle="modal" data-bs-target="#callbackModal">
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/callback-ico.svg" />
                                    Обратный звонок
                                </button>
                            </li>
                            <li class="nav-item me-3 me-md-1 me-xl-3">
                                <a class="top-menu-tel nav-link" href="tel:+74994082271">
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/mobile-phone-ico.svg" />
                                    +7 499 408 22 71
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ico-button" href="https://t.me/+79265930177">
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/telegram-ico.svg" />
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ico-button" href="https://wa.me/79265930177?web=1&amp;app_absent=1">
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/whatsapp-ico.svg" />
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
                        <a class="top-menu-tel pt-1 pb-0" style="font-size: 14px" href="tel:+74994082271">+7 499 408 22
                            71</a>
                        <div style="
                                    font-size: 10px;
                                    font-family: Gilroy;
                                    font-weight: 300;
                                    text-transform: none;
                                ">
                            <img src="https://newtheme.site/wp-content/themes/dekorsever-wp/img/ico/clock-ico.svg"
                                style="width: 12px; position: relative; top: -1px" class="me-1">Ежедневно с 9:00 до
                            21:00
                        </div>
                    </div>

                    <button class="navbar-toggler mx-3 me-0 mx-lg-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mobail-header-collapse" aria-controls="mobail-header-collapse"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/whatsapp-ico.svg" />
                            </a>
                            <a class="ico-button pe-0" href="https://t.me/+79265930177">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/telegram-ico.svg" />
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
                    <a class="top-menu-tel pt-1 pb-0" style="font-size: 14px" href="tel:+74994082271">+7 499 408 22
                        71</a>
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
                    data-bs-target="#sliding-header-collapse" aria-controls="sliding-header-collapse"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="sliding-header-collapse">
                    <?php
                    ob_start();
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


<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <section class="section text-dark section-about service-page section-grid">
            <div class="container single-product">
                <div class="section-title text-center">
                    <!-- Заголовок -->
                    <h3 class="text-dark fw-semibold" style="font-size: 26px">
                        <?php the_title(); ?>
                    </h3>

                    <!-- Изображение по центру -->
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения"
                        class="img-fluid" />
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 mb-4 mb-md-0 section-image">
                        <?php
                        $gallery_images = get_field('gallery_images');
                        if ($gallery_images && is_array($gallery_images) && count($gallery_images) > 0):
                            // Статические ID вместо динамических
                            $carousel_id = 'carousel-2691';
                            $gallery_id = 'gallery-2691';
                            ?>
                            <div id="<?php echo $carousel_id; ?>" class="carousel slide" data-bs-ride="false"
                                data-bs-interval="false">
                                <div class="carousel-inner rounded">
                                    <?php foreach ($gallery_images as $index => $image): ?>
                                        <div class="carousel-item gallery-2691-wrapper <?php echo $index === 0 ? 'active' : ''; ?>">
                                            <button class="gallery-2691 " onclick="galleryOn('<?php echo $gallery_id; ?>');">
                                                <div class="single-product-img approximation img-wrapper position-relative">
                                                    <img src="<?php echo esc_url($image['url']); ?>"
                                                        class="d-block w-100 single-product-img-img" loading="lazy"
                                                        alt="<?php echo esc_attr($image['alt']); ?>" />
                                                    <div class="overlay">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/zoom-icon.svg"
                                                            alt="Zoom" class="zoom-icon" />
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?php if (count($gallery_images) > 1): ?>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $carousel_id; ?>"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $carousel_id; ?>"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                <?php endif; ?>
                            </div>

                        <?php elseif (has_post_thumbnail()): ?>
                            <div class="single-product-img approximation img-wrapper">
                                <?php the_post_thumbnail('large', array('class' => 'd-block w-100', 'loading' => 'lazy')); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Пустая колонка -->
                    <div class="d-none d-xl-block col-xl-1"></div>

                    <div class="col-12 col-md-5 text-dark">
                        <?php
                        $service_description = get_field('service_description');
                        if ($service_description):
                            echo wpautop($service_description);
                        else:
                            the_content();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <?php if ($gallery_images && is_array($gallery_images) && count($gallery_images) > 0): ?>
            <!-- Gallery wrapper -->
            <div id="galleryWrapper" style="
            background: rgba(0, 0, 0, 0.85);
            display: none;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 9999;
        ">
                <div id="<?php echo $gallery_id; ?>" class="carousel slide" data-bs-ride="false" data-bs-interval="false"
                    style="display: none; position: fixed; top: 0; height: 100%; width: 100%">
                    <div class="carousel-inner h-100">
                        <?php foreach ($gallery_images as $index => $image): ?>
                            <div class="carousel-item carousel-item-2 h-100 <?php echo $index === 0 ? 'active' : ''; ?>">
                                <div class="row align-items-center h-100">
                                    <div class="col text-center">
                                        <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" loading="lazy"
                                            style="max-width: 75vw; max-height: 75vh" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php if (count($gallery_images) > 1): ?>
                        <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $gallery_id; ?>"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $gallery_id; ?>"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    <?php endif; ?>
                </div>

                <!-- Кнопка закрытия галереи -->
                <button type="button" onclick="closeGallery();" class="btn-close"
                    style="position: fixed; top: 25px; right: 25px; z-index: 99999" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php
        $prices = get_field('service_prices');
        if ($prices && is_array($prices) && count($prices) > 0):
            ?>
            <!-- Цены на сером фоне -->
            <section class="section bg-alt-light text-dark">
                <div class="container single-product">
                    <div class="section-title text-center">
                        <!-- Заголовок -->
                        <h3 class="text-dark fw-semibold">Цены</h3>

                        <!-- Изображение по центру -->
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения"
                            class="img-fluid" />
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <?php foreach ($prices as $index => $price): ?>
                                <div class="price-item <?php echo ($index === count($prices) - 1) ? 'mb-0' : ''; ?>">
                                    <span class="price-name"><?php echo esc_html($price['price_name']); ?></span>
                                    <span class="price-value price-text"><?php echo esc_html($price['price_value']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <script>
            /* Функция открытия галереи */
            function galleryOn(gal) {
                var gallery = gal;
                document.getElementById('galleryWrapper').style.display = 'block';
                document.getElementById(gallery).style.display = 'block';
            }

            /* Кнопка закрытия галереи */
            function closeGallery() {
                document.getElementById('galleryWrapper').style.display = 'none';
                <?php if ($gallery_images): ?>
                    document.getElementById('<?php echo $gallery_id; ?>').style.display = 'none';
                <?php endif; ?>
            }
        </script>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>