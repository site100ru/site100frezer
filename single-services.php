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
                        <a class="top-menu-tel pt-1 pb-0" style="font-size: 14px" href="tel:+74994082271">
                            +7 499 408 22 71</a>
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


<?php if (have_posts()): while (have_posts()): the_post(); ?>

<?php 
$content_blocks = get_field('content_blocks');
$block_counter = 0;
if ($content_blocks): foreach ($content_blocks as $block): 
    $block_counter++;
    $gallery_images = $block['gallery_images'];
    $carousel_id = 'carousel-2691-' . $block_counter;
    $gallery_id = 'gallery-2691-' . $block_counter;
    $bg_class = $block['background'] == 'gray' ? 'bg-alt-light' : '';
?>

<section class="section text-dark section-about service-page section-grid <?php echo $bg_class; ?>">
    <div class="container single-product">
        <?php
        if (!empty($block['block_title'])): ?>
            <div class="section-title text-center">
                <h2 class="text-dark fw-semibold" style="font-size: 26px">
                    <?php echo $block['block_title']; ?>
                </h2>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="" class="img-fluid" />
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <?php if ($block['image_position'] == 'right'): ?>
                <!-- Текст слева -->
                <div class="col-12 col-md-5 text-dark order-2 order-md-1 text-left">
                    <?php echo wpautop($block['service_description']); ?>
                </div>
                <div class="d-none d-xl-block col-xl-1 order-md-2"></div>
                <!-- Картинки справа -->
                <div class="col-12 col-md-6 mb-4 mb-md-0 section-image order-1 order-md-3">
            <?php else: ?>
                <!-- Картинки слева -->
                <div class="col-12 col-md-6 mb-4 mb-md-0 section-image">
            <?php endif; ?>

                    <?php if ($gallery_images && is_array($gallery_images) && count($gallery_images) > 0): ?>
                        <div id="<?php echo $carousel_id; ?>" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
                            <div class="carousel-inner rounded">
                                <?php foreach ($gallery_images as $index => $image): ?>
                                    <div class="carousel-item gallery-2691-wrapper <?php echo $index === 0 ? 'active' : ''; ?> <?php echo count($gallery_images) === 1 ? 'carousel-item-one' : ''; ?>" >
                                        <button class="gallery-2691" onclick="galleryOn(<?php echo $block_counter; ?>, <?php echo $index; ?>);">
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

            <?php if ($block['image_position'] != 'right'): ?>
                <div class="d-none d-xl-block col-xl-1"></div>
                <div class="col-12 col-md-5 text-dark">
                    <?php echo wpautop($block['service_description']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if ($gallery_images && is_array($gallery_images) && count($gallery_images) > 0): ?>
    <div id="galleryWrapper-<?php echo $block_counter; ?>" style="background: rgba(0, 0, 0, 0.85); display: none; position: fixed; top: 0; bottom: 0; left: 0; right: 0; z-index: 9999;">
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

        <button type="button" onclick="closeGallery(<?php echo $block_counter; ?>);" class="btn-close"
            style="position: fixed; top: 25px; right: 25px; z-index: 99999" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php endforeach; endif; ?>

<?php 
$price_blocks = get_field('price_blocks');
if ($price_blocks): foreach ($price_blocks as $price_block):
    $prices = $price_block['service_prices'] ?? '';
    $bg_class = $price_block['price_background'] == 'gray' ? 'bg-alt-light' : '';
?>
    <section class="section prices-section <?php echo $bg_class; ?> py-5">
        <div class="container single-product">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php
                    if (!empty($price_block['price_title'])): ?>
                        <h2 class="text-center mb-3 text-dark fw-semibold">
                            <?php echo $price_block['price_title']; ?>
                        </h2>

                        <?php if (!empty($price_block['price_subtitle'])): ?>
                            <h3 class="text-center mb-3 text-muted fw-normal" style="font-size: 20px;">
                                <?php echo $price_block['price_subtitle']; ?>
                            </h3>
                        <?php endif; ?>

                        <div class="text-center mb-0">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="" class="img-fluid">
                        </div>
                    <?php endif; ?>

                    <?php if ($prices && is_array($prices) && count($prices) > 0): ?>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <?php foreach ($prices as $price): ?>
                                        <tr>
                                            <td>
                                                <span>
                                                    <?php echo esc_html($price['price_name']); ?>
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <span class="price-discount">
                                                    <?php echo esc_html($price['price_value']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; endif; ?>

<?php 
$service_portfolio = get_field('service_portfolio', $post_id);

// Генерируем уникальный ID для галереи
$unique_id = 'gallery_' . $post_id . '_' . rand(1000, 9999);

?>

<?php if ($service_portfolio && is_array($service_portfolio)): ?>
<section class="section section-works service-portfolio">
    <div class="container">
        <div class="section-title text-center mb-5" style="max-width: 720px; justify-self: center">
            <h2 class="text-dark">Портфолио</h2>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения" class="img-fluid" />
        </div>

        <!-- Masonry контейнер -->
        <div class="portfolio-masonry row" id="portfolio-masonry-<?php echo $unique_id; ?>">
            <?php foreach ($service_portfolio as $index => $image): ?>
                <?php 
                $image_url = wp_get_attachment_image_url($image['ID'], 'full');
                $alt_text = get_post_meta($image['ID'], '_wp_attachment_image_alt', true);
                ?>
                <div class="portfolio-item col-lg-4 col-md-6 col-12 mb-4">
                    <div class="portfolio-product-card">
                        <a href="#" class="portfolio-product bg-linear-gradient" onclick="openGallery_<?php echo $unique_id; ?>(<?php echo $index; ?>); return false;">
                            <div class="single-product-img approximation position-relative">
                                <img src="<?php echo esc_url($image_url); ?>" class="rounded w-100" alt="<?php echo esc_attr($alt_text); ?>" loading="lazy" />
                                <div class="magnifier"></div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Модальное окно для галереи -->
<div id="galleryModal_<?php echo $unique_id; ?>" style="display: none; position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.9); z-index: 9999;">
    <div id="mainGallery_<?php echo $unique_id; ?>" class="carousel slide h-100 pointer-event" data-bs-ride="carousel" data-bs-interval="999999999">
        <!-- Индикаторы -->
        <div class="carousel-indicators">
            <?php foreach ($service_portfolio as $index => $image): ?>
                <button type="button" data-bs-target="#mainGallery_<?php echo $unique_id; ?>" data-bs-slide-to="<?php echo $index; ?>" aria-label="Slide <?php echo ($index + 1); ?>" <?php echo $index === 0 ? 'class="active" aria-current="true"' : ''; ?>></button>
            <?php endforeach; ?>
        </div>

        <!-- Слайды -->
        <div class="carousel-inner h-100">
            <?php foreach ($service_portfolio as $index => $image): ?>
                <?php 
                $full_image_url = wp_get_attachment_image_url($image['ID'], 'full');
                $alt_text = get_post_meta($image['ID'], '_wp_attachment_image_alt', true);
                ?>
                <div class="carousel-item h-100 <?php echo $index === 0 ? 'active' : ''; ?>" data-bs-interval="999999999">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <img src="<?php echo esc_url($full_image_url); ?>" class="img-fluid" style="max-width: 90vw; max-height: 90vh" alt="<?php echo esc_attr($alt_text); ?>" />
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Кнопки навигации -->
        <button class="carousel-control-prev" type="button" data-bs-target="#mainGallery_<?php echo $unique_id; ?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainGallery_<?php echo $unique_id; ?>" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Кнопка закрытия -->
    <button type="button" onclick="closeGallery_<?php echo $unique_id; ?>();" class="btn-close" style="position: fixed; top: 25px; right: 25px; z-index: 99999"></button>
</div>

<script>
// Ждем загрузки jQuery
function initPortfolio_<?php echo $unique_id; ?>() {
    if (typeof jQuery !== 'undefined' && typeof jQuery().masonry === 'function' && typeof jQuery().imagesLoaded === 'function') {
        jQuery(document).ready(function($) {
            var $container = $('#portfolio-masonry-<?php echo $unique_id; ?>');
            
            $container.imagesLoaded(function() {
                $container.masonry({
                    itemSelector: '.portfolio-item',
                    percentPosition: true
                });
            });
        });
    } else {
        setTimeout(initPortfolio_<?php echo $unique_id; ?>, 100);
    }
}

// Запускаем инициализацию
initPortfolio_<?php echo $unique_id; ?>();

function openGallery_<?php echo $unique_id; ?>(slideIndex) {
    var modal = document.getElementById('galleryModal_<?php echo $unique_id; ?>');
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
    
    if (typeof jQuery !== 'undefined') {
        jQuery('#mainGallery_<?php echo $unique_id; ?>').carousel(slideIndex);
    }
}

function closeGallery_<?php echo $unique_id; ?>() {
    var modal = document.getElementById('galleryModal_<?php echo $unique_id; ?>');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

document.getElementById('galleryModal_<?php echo $unique_id; ?>').addEventListener('click', function(e) {
    if (e.target === this) {
        closeGallery_<?php echo $unique_id; ?>();
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeGallery_<?php echo $unique_id; ?>();
    }
});
</script>
<?php endif; ?>

<script>
    function galleryOn(blockNum, imageIndex) {
        var gallery = document.getElementById('gallery-2691-' + blockNum);
        var items = gallery.querySelectorAll('.carousel-item');
        
        // Убираем active со всех
        items.forEach(function(item) {
            item.classList.remove('active');
        });
        
        // Ставим active на нужный
        items[imageIndex].classList.add('active');
        
        document.getElementById('galleryWrapper-' + blockNum).style.display = 'block';
        gallery.style.display = 'block';
    }

    function closeGallery(blockNum) {
        document.getElementById('galleryWrapper-' + blockNum).style.display = 'none';
        document.getElementById('gallery-2691-' + blockNum).style.display = 'none';
    }
</script>

<?php endwhile; endif; ?>
<?php get_footer(); ?>