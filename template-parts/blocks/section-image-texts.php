<?php
/**
 * Block Name: Секция с изображением и текстом
 * Description: Блок с изображением и текстом в разных вариантах расположения
 */

// Создаем уникальный ID для блока
$id = 'section-image-text-' . $block['id'];

// Добавляем дополнительные классы, если они есть
$className = '';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

// Получаем данные полей из ACF
$title = get_field('title');
$image_position = get_field('image_position') ?: 'left';
$background_color = get_field('background_color') ?: 'light';
$image = get_field('image');
$content = get_field('content');

// Определяем классы на основе настроек
$section_class = 'section';
$section_class .= $background_color === 'light' ? ' bg-alt-light' : '';
$section_class .= $image_position === 'left' ? ' section-grid-left' : ' section-grid-right';

// Определяем порядок колонок
$image_order_mobile = $image_position === 'left' ? 'order-3' : '';
$image_order_desktop = $image_position === 'left' ? 'order-md-1' : '';
$content_order_mobile = $image_position === 'left' ? 'order-1' : '';
$content_order_desktop = $image_position === 'left' ? 'order-md-3' : '';
?>

<section id="<?php echo esc_attr($id); ?>"
    class="<?php echo esc_attr($section_class); ?> <?php echo esc_attr($className); ?> text-dark section-about section-grid">
    <div class="container">
        <?php if (!empty($title)): ?>
        <div class="section-title text-center">
            <!-- Заголовок -->
            <h3 class="text-dark fw-semibold" style="font-size: 26px">
                <?php echo esc_html($title); ?>
            </h3>

            <!-- Изображение по центру -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения" class="img-fluid">
        </div>
        <?php endif; ?>

        <div
            class="row align-items-start <?php echo $image_position === 'left' ? 'section-grid-left' : 'section-grid-right'; ?> section-grid-ul">

            <?php if ($image_position === 'left'): ?>
                <!-- Изображение (слева) -->
                <div
                    class="col-12 col-md-6 col-xl-6 <?php echo esc_attr($image_order_mobile . ' ' . $image_order_desktop); ?> section-image">
                    <div class="img-wrapper">
                        <?php if (!empty($image)): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                                class="img-fluid w-100">
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Пустая колонка -->
                <div class="d-none d-xl-block col-xl-1 order-md-2"></div>
                <!-- Текст -->
                <div
                    class="col-12 col-md-6 col-xl-5 <?php echo esc_attr($content_order_mobile . ' ' . $content_order_desktop); ?> mb-4 mb-md-0" style="align-self: center;" >
                    <?php echo $content; ?>
                </div>
            <?php else: ?>
                <!-- Текст -->
                <div class="col-12 col-md-6 col-xl-5 mb-4 mb-md-0" style="align-self: center;text-align: end;">
                    <?php echo $content; ?>
                </div>
                <!-- Пустая колонка -->
                <div class="d-none d-xl-block col-xl-1"></div>
                <!-- Изображение (справа) -->
                <div class="col-12 col-md-6 col-xl-6 text-center section-image">
                    <div class="img-wrapper">
                        <?php if (!empty($image)): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                                class="img-fluid w-100">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>