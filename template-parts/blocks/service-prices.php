<?php
/**
 * Шаблон для вывода цен услуги
 * 
 * Переменные:
 * $post_id - ID поста услуги
 * $atts['class'] - класс фона 
 * $atts['title'] - название услуги
 */

// Получаем данные услуги
$service_prices = get_field('service_prices', $post_id);
$service_title = get_the_title($post_id); 

// Определяем класс фона
$bg_class = 'section text-dark';
if ($atts['class'] === 'light') {
    $bg_class = 'section bg-alt-light text-dark';
}

?>

<section class="<?php echo esc_attr($bg_class); ?>">
    <div class="container single-product">
        <div class="section-title text-center">
            <!-- Заголовок -->
            <h2 class="text-dark fw-semibold">Цены</h2>
            
            <!-- Название услуги под заголовком -->
            <?php if ($service_title): ?>
                <h3 class="text-dark mb-0 price-h4"><?php echo esc_html($service_title); ?></h3>
            <?php endif; ?>

            <!-- Изображение по центру -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения" class="img-fluid">
        </div>
        <div class="row">
            <div class="col-12">
                <?php if ($service_prices && is_array($service_prices)): ?>
                    <?php foreach ($service_prices as $index => $price_item): ?>
                        <?php if ($price_item['price_name'] && $price_item['price_value']): ?>
                            <?php 
                            // Добавляем mb-0 для последнего элемента
                            $mb_class = ($index === count($service_prices) - 1) ? 'mb-0' : '';
                            ?>
                            <div class="price-item <?php echo esc_attr($mb_class); ?>">
                                <span class="price-name"><?php echo esc_html($price_item['price_name']); ?></span><span class="price-value price-text"><?php echo esc_html($price_item['price_value']); ?></span>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="price-item mb-0">
                        <span class="price-name">Цены для данной услуги не указаны</span><span class="price-value price-text">По запросу</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>