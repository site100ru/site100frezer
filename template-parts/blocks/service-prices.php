<?php
/**
 * Шаблон для вывода цен услуги в виде таблицы
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
$bg_class = '';
if ($atts['class'] === 'light') {
    $bg_class = 'prices-section bg-alt-light py-5';
} elseif ($atts['class'] === 'dark') {
    $bg_class = 'prices-section bg-dark py-5 text-white';
}

?>

<section class="<?php echo esc_attr($bg_class); ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <!-- Заголовок -->
                <h2 class="text-center mb-3">Цены</h2>
                
                <!-- Название услуги под заголовком -->
                <?php if ($service_title): ?>
                    <h3 class="text-center mb-4 price-h4"><?php echo esc_html($service_title); ?></h3>
                <?php endif; ?>

                <!-- Изображение по центру -->
                <div class="text-center mb-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" 
                         alt="Описание изображения" class="img-fluid">
                </div>

                <!-- Таблица с ценами -->
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <?php if ($service_prices && is_array($service_prices)): ?>
                                <?php foreach ($service_prices as $index => $price_item): ?>
                                    <?php if ($price_item['price_name'] && $price_item['price_value']): ?>
                                        <tr>
                                            <td class="price-name">
                                                <?php echo esc_html($price_item['price_name']); ?>
                                            </td>
                                            <td class="text-end">
                                                <span class="price-discount price-text">
                                                    <?php echo esc_html($price_item['price_value']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td class="price-name">
                                        Цены для данной услуги не указаны
                                    </td>
                                    <td class="text-end">
                                        <span class="price-discount price-text">По запросу</span>
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