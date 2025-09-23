<?php

/**
 * The template for displaying all pages
 */

get_header(); ?>

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
                        <a class="top-menu-tel pt-1 pb-0" style="font-size: 14px" href="tel:+74994082271">
                            7 499 408 22 71</a>
                        <div style="
                                    font-size: 10px;
                                    font-family: Gilroy;
                                    font-weight: 300;
                                    text-transform: none;
                                ">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/clock-ico.svg"
                                style="width: 12px; position: relative; top: -1px" class="me-1">Ежедневно с 9:00 до
                            21:00
                        </div>
                    </div>

                    <button class="navbar-toggler mx-3 me-0 mx-lg-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mobail-header-collapse" aria-controls="mobail-header-collapse"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="sliding-header-collapse">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'depth' => 2,
                            'container' => false,
                            'menu_class' => 'navbar-nav align-items-start align-items-lg-center ms-auto mb-lg-0',
                            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                            'walker' => new Bootstrap_Walker_Nav_Menu(),
                        ));
                        ?>
                        <div class="d-lg-none nav-item navbar-nav  mb-2">
                            <button class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#callbackModal" style="align-self: start;">
                                Обратный звонок
                            </button>

                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/location-ico.svg" style="width: 13px" class="me-1" />
                                <span>гор. Химки, мкр-н Сходня, ул. Октябрьская, д. 29А, стр. 1</span>
                            </div>
                            <a class="nav-link top-menu-tel" href="tel:+74994082271">+7 499 408 22 71</a>
                            <div class="mb-2 d-flex gap-1">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/clock-ico.svg" style="width: 10px; position: relative; top: 2px" class="me-1" />
                                <div class="text"><span>Ежедневно с 9:00 до 21:00</span></div>
                            </div>
                            <div class="pb-4">
                                <a class="ico-button pe-2" href="https://wa.me/79265930177?web=1&amp;app_absent=1">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/whatsapp-ico.svg" />
                                </a>
                                <a class="ico-button pe-0" href="https://t.me/+79265930177">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/telegram-ico.svg" />
                                </a>
                            </div>
                        </div>
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
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/clock-ico.svg"
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
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'depth' => 2,
                        'container' => false,
                        'menu_class' => 'navbar-nav align-items-start align-items-lg-center ms-auto mb-lg-0',
                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                        'walker' => new Bootstrap_Walker_Nav_Menu(),
                    ));
                    ?>
                    <div class="d-lg-none nav-item navbar-nav  mb-2">
                        <button class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#callbackModal" style="align-self: start;">
                            Обратный звонок
                        </button>

                        <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/location-ico.svg" style="width: 13px" class="me-1" />
                            <span>гор. Химки, мкр-н Сходня, ул. Октябрьская, д. 29А, стр. 1</span>
                        </div>
                        <a class="nav-link top-menu-tel" href="tel:+74994082271">+7 499 408 22 71</a>
                        <div class="mb-2 d-flex gap-1">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/clock-ico.svg" style="width: 10px; position: relative; top: 2px" class="me-1" />
                            <div class="text"><span>Ежедневно с 9:00 до 21:00</span></div>
                        </div>
                        <div class="pb-4">
                            <a class="ico-button pe-2" href="https://wa.me/79265930177?web=1&amp;app_absent=1">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/whatsapp-ico.svg" />
                            </a>
                            <a class="ico-button pe-0" href="https://t.me/+79265930177">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/telegram-ico.svg" />
                            </a>
                        </div>
                    </div>
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

<!-- Основной контент страницы -->
<?php
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