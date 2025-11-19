<?php
/**
 * Block Name: Секция с галереей изображений и текстом
 * Description: Блок с галереей изображений и текстом в разных вариантах расположения
 */

// Создаем уникальный ID для блока
$id = 'section-gallery-text-' . $block['id'];

// Добавляем дополнительные классы, если они есть
$className = '';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

// Получаем данные полей из ACF
$title = get_field('title');
$image_position = get_field('image_position') ?: 'left';
$background_color = get_field('background_color') ?: 'light';
$gallery_images = get_field('gallery_images');
$content = get_field('content');

// Определяем классы на основе настроек
$section_class = 'section';
$section_class .= $background_color === 'light' ? ' bg-alt-light' : '';
$section_class .= $image_position === 'left' ? ' section-grid-left' : ' section-grid-right';

// Уникальные ID для галереи на основе ID блока
$carousel_id = 'carousel-' . $block['id'];
$gallery_id = 'gallery-' . $block['id'];
$gallery_wrapper_id = 'galleryWrapper-' . $block['id'];
?>

<section id="<?php echo esc_attr($id); ?>"
    class="<?php echo esc_attr($section_class); ?> <?php echo esc_attr($className); ?> text-dark section-about service-page section-grid">
    <div class="container single-product">
        <?php if (!empty($title)): ?>
        <div class="section-title text-center">
            <!-- Заголовок -->
            <h2 class="text-dark fw-semibold" style="font-size: 26px">
                <?php echo esc_html($title); ?>
            </h2>

            <!-- Изображение по центру -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения" class="img-fluid">
        </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <?php if ($image_position === 'left'): ?>
                <!-- Галерея (слева) -->
                <div class="col-12 col-md-6 mb-4 mb-md-0 section-image">
                    <?php if ($gallery_images && is_array($gallery_images) && count($gallery_images) > 0) : ?>
                    <div id="<?php echo $carousel_id; ?>" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
                        <div class="carousel-inner rounded">
                            <?php foreach ($gallery_images as $index => $image) : ?>
                            <div class="carousel-item gallery-wrapper <?php echo $index === 0 ? 'active' : ''; ?> <?php echo count($gallery_images) === 1 ? 'carousel-item-one' : ''; ?>" >
                                <button class="gallery-btn gallery-2691" onclick="openGallery<?php echo $block['id']; ?>(<?php echo $index; ?>);">
                                    <div class="single-product-img approximation img-wrapper position-relative">
                                        <img src="<?php echo esc_url($image['url']); ?>" class="d-block w-100 single-product-img-img" loading="lazy" alt="<?php echo esc_attr($image['alt']); ?>">
                                        <div class="overlay">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/zoom-icon.svg" alt="Zoom" class="zoom-icon">
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <?php if (count($gallery_images) > 1) : ?>
                        <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $carousel_id; ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $carousel_id; ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Пустая колонка -->
                <div class="d-none d-xl-block col-xl-1"></div>

                <!-- Текст -->
                <div class="col-12 col-md-5 text-dark">
                    <?php echo $content; ?>
                </div>
            <?php else: ?>
                <!-- Текст -->
                <div class="col-12 col-md-5 text-dark mb-4 mb-md-0">
                    <?php echo $content; ?>
                </div>

                <!-- Пустая колонка -->
                <div class="d-none d-xl-block col-xl-1"></div>

                <!-- Галерея (справа) -->
                <div class="col-12 col-md-6 section-image">
                    <?php if ($gallery_images && is_array($gallery_images) && count($gallery_images) > 0) : ?>
                    <div id="<?php echo $carousel_id; ?>" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
                        <div class="carousel-inner rounded">
                            <?php foreach ($gallery_images as $index => $image) : ?>
                            <div class="carousel-item gallery-2691-wrapper gallery-wrapper <?php echo $index === 0 ? 'active' : ''; ?> <?php echo count($gallery_images) === 1 ? 'carousel-item-one' : ''; ?>" >
                                <button class="gallery-btn gallery-2691" onclick="openGallery<?php echo $block['id']; ?>(<?php echo $index; ?>);">
                                    <div class="single-product-img approximation img-wrapper position-relative">
                                        <img src="<?php echo esc_url($image['url']); ?>" class="d-block w-100 single-product-img-img" loading="lazy" alt="<?php echo esc_attr($image['alt']); ?>">
                                        <div class="overlay">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/zoom-icon.svg" alt="Zoom" class="zoom-icon">
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <?php if (count($gallery_images) > 1) : ?>
                        <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $carousel_id; ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $carousel_id; ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if ($gallery_images && is_array($gallery_images) && count($gallery_images) > 0) : ?>
<!-- Gallery wrapper -->
<div id="<?php echo $gallery_wrapper_id; ?>" class="gallery-modal-wrapper" style="background: rgba(0, 0, 0, 0.85); display: none; position: fixed; top: 0; bottom: 0; left: 0; right: 0; z-index: 9999;">
    <div id="<?php echo $gallery_id; ?>" class="carousel slide" data-bs-ride="false" data-bs-interval="false" style="display: none; position: fixed; top: 0; height: 100%; width: 100%">
        <div class="carousel-inner h-100">
            <?php foreach ($gallery_images as $index => $image) : ?>
            <div class="carousel-item carousel-item-2 h-100 <?php echo $index === 0 ? 'active' : ''; ?>">
                <div class="row align-items-center h-100">
                    <div class="col text-center">
                        <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" loading="lazy" style="max-width: 75vw; max-height: 75vh" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php if (count($gallery_images) > 1) : ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $gallery_id; ?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $gallery_id; ?>" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <?php endif; ?>
    </div>

    <!-- Кнопка закрытия галереи -->
    <button type="button" onclick="closeGallery<?php echo $block['id']; ?>();" class="btn-close" style="position: fixed; top: 25px; right: 25px; z-index: 99999" aria-label="Close"></button>
</div>

<script>
(function() {
    // Уникальные функции для каждого блока
    window.openGallery<?php echo $block['id']; ?> = function(imageIndex) {
        var galleryWrapper = document.getElementById('<?php echo $gallery_wrapper_id; ?>');
        var gallery = document.getElementById('<?php echo $gallery_id; ?>');
        
        // Показываем модальное окно
        galleryWrapper.style.display = 'block';
        gallery.style.display = 'block';
        
        // Переключаем на нужное изображение в модальном окне
        if (typeof bootstrap !== 'undefined' && bootstrap.Carousel) {
            var modalCarousel = new bootstrap.Carousel(gallery);
            modalCarousel.to(imageIndex);
        }
        
        // Добавляем обработчики событий для закрытия
        addGalleryEventListeners<?php echo $block['id']; ?>();
    };
    
    window.closeGallery<?php echo $block['id']; ?> = function() {
        document.getElementById('<?php echo $gallery_wrapper_id; ?>').style.display = 'none';
        document.getElementById('<?php echo $gallery_id; ?>').style.display = 'none';
        
        // Удаляем обработчики событий
        removeGalleryEventListeners<?php echo $block['id']; ?>();
    };
    
    // Функции для управления событиями
    function handleKeydown<?php echo $block['id']; ?>(event) {
        if (event.key === 'Escape') {
            closeGallery<?php echo $block['id']; ?>();
        }
    }
    
    function handleBackdropClick<?php echo $block['id']; ?>(event) {
        if (event.target.id === '<?php echo $gallery_wrapper_id; ?>') {
            closeGallery<?php echo $block['id']; ?>();
        }
    }
    
    function addGalleryEventListeners<?php echo $block['id']; ?>() {
        document.addEventListener('keydown', handleKeydown<?php echo $block['id']; ?>);
        document.getElementById('<?php echo $gallery_wrapper_id; ?>').addEventListener('click', handleBackdropClick<?php echo $block['id']; ?>);
    }
    
    function removeGalleryEventListeners<?php echo $block['id']; ?>() {
        document.removeEventListener('keydown', handleKeydown<?php echo $block['id']; ?>);
        document.getElementById('<?php echo $gallery_wrapper_id; ?>').removeEventListener('click', handleBackdropClick<?php echo $block['id']; ?>);
    }
})();
</script>
<?php endif; ?>