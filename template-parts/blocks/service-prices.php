<?php
/**
 * Шаблон для вывода цен услуги в виде таблицы
 * 
 * Переменные:
 * $post_id - ID поста услуги
 * $atts['class'] - класс фона 
 * $service_title - название услуги (из атрибута или заголовка поста)
 * $service_prices - массив цен из текущего блока
 */

$price_title = $block['price_title'] ?? '';
$price_subtitle = $block['price_subtitle'] ?? '';
$price_background = $block['price_background'] ?? 'gray';

// Определяем класс фона
$bg_class = 'section prices-section py-5';

// Приоритет 1: класс из шорткода [service_prices class="light"]
if (isset($atts['class']) && $atts['class'] === 'light') {
    $bg_class .= ' bg-white';
}
// Приоритет 2: настройка фона из ACF
elseif ($price_background === 'white') {
    $bg_class .= ' bg-white';
}
// По умолчанию: серый фон
else {
    $bg_class .= ' bg-alt-light';
}

?>

<section class="<?php echo esc_attr($bg_class); ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Заголовок -->
                <?php if (!empty($price_title)): ?>
                    <h2 class="text-center mb-3"><?php echo esc_html($price_title); ?></h2>
                <?php endif; ?>
                    
                <!-- Название услуги под заголовком -->
                <?php if (!empty($price_subtitle)): ?>
                    <h3 class="text-center mb-3 text-muted fw-normal" style="font-size: 20px;">
                        <?php echo esc_html($price_subtitle); ?>
                    </h3>
                <?php endif; ?>
                
                <!-- Разделитель (точки) -->
                <?php if (!empty($price_title) || !empty($price_subtitle)): ?>
                    <div class="text-center mb-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" 
                             alt="" class="img-fluid">
                    </div>
                <?php endif; ?>

                <!-- Таблица с ценами -->
               <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <?php if (isset($service_prices) && $service_prices && is_array($service_prices) && count($service_prices) > 0): ?>
                                <?php foreach ($service_prices as $index => $price_item): ?>
                                    <?php if (isset($price_item['price_name']) && isset($price_item['price_value']) && $price_item['price_name'] && $price_item['price_value']): ?>
                                        <tr>
                                            <td>
                                                <span>
                                                    <?php echo esc_html($price_item['price_name']); ?>
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <span class="price-discount">
                                                    <?php echo esc_html($price_item['price_value']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td>
                                        <span>Цены для данной услуги не указаны</span>
                                    </td>
                                    <td class="text-end">
                                        <span class="price-discount">По запросу</span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>