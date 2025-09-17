<?php
/**
 * Шаблон для вывода портфолио услуги
 * 
 * Переменные:
 * $post_id - ID поста услуги
 * $atts['class'] - класс фона (light или пустое)  
 * $atts['title'] - название услуги
 */

// Получаем данные услуги
$service_title = get_the_title($post_id);
$service_portfolio = get_field('service_portfolio', $post_id);

// Определяем класс фона
$section_class = 'section section-works';
if (isset($atts['class']) && $atts['class'] === 'light') {
    $section_class .= ' bg-alt-light';
}

// Генерируем уникальный ID для галереи
$unique_id = 'gallery_' . sanitize_key($service_title) . '_' . rand(1000, 9999);

?>

<?php if ($service_portfolio && is_array($service_portfolio)): ?>
<section class="<?php echo esc_attr($section_class); ?>">
    <div class="container">
        <div class="section-title text-center mb-5" style="max-width: 720px; justify-self: center">
            <h3 class="text-dark"><?php echo esc_html($service_title); ?></h3>
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

<?php else: ?>
<section class="<?php echo esc_attr($section_class); ?>">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h3 class="text-dark"><?php echo esc_html($service_title); ?></h3>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения" class="img-fluid" />
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>Портфолио для данной услуги пока не загружено.</p>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>