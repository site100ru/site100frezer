<?php
/**
 * Регистрация кастомного типа постов "Услуги"
 */
function register_services_post_type()
{
    $labels = array(
        'name' => 'Услуги',
        'singular_name' => 'Услуга',
        'menu_name' => 'Услуги',
        'name_admin_bar' => 'Услуга',
        'archives' => 'Архивы услуг',
        'attributes' => 'Атрибуты услуги',
        'parent_item_colon' => 'Родительская услуга:',
        'all_items' => 'Все услуги',
        'add_new_item' => 'Добавить новую услугу',
        'add_new' => 'Добавить новую',
        'new_item' => 'Новая услуга',
        'edit_item' => 'Редактировать услугу',
        'update_item' => 'Обновить услугу',
        'view_item' => 'Посмотреть услугу',
        'view_items' => 'Посмотреть услуги',
        'search_items' => 'Искать услуги',
        'not_found' => 'Не найдено',
        'not_found_in_trash' => 'Не найдено в корзине',
    );

    $args = array(
        'label' => 'Услуга',
        'description' => 'Услуги компании',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array(),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-hammer',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'services'),
    );

    register_post_type('services', $args);
}
add_action('init', 'register_services_post_type', 0);

// Подключение стилей и скриптов
function theme_enqueue_scripts()
{
    
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.7.1.min.js', array(), '1.0', true);
    
    // CSS файлы
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0');
    wp_enqueue_style('font', get_template_directory_uri() . '/assets/css/font.css', array(), '1.0');
    wp_enqueue_style('theme', get_template_directory_uri() . '/assets/css/theme.css', array('bootstrap', 'font'), '1.0');

    // JavaScript файлы
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array('jquery'), '4.2.2', true);
    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.4', true);
    wp_enqueue_script('inputmask', get_template_directory_uri() . '/assets/js/inputmask.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery', 'bootstrap'), '1.0', true);
    wp_enqueue_script('menu-scroll', get_template_directory_uri() . '/assets/js/menu-scroll.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Шорткод для вывода цен услуги
function service_prices_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'title' => '',
        'class' => '',
        'blocks' => '' // Например: "1,2,3" или "2" или "" (все блоки)
    ), $atts, 'service_prices');

    if (empty($atts['title'])) {
        return '<p>Укажите название услуги в атрибуте title</p>';
    }

    // Ищем услугу по названию
    $service_query = new WP_Query(array(
        'post_type' => 'services',
        'title' => $atts['title'],
        'posts_per_page' => 1,
        'post_status' => 'publish'
    ));

    if (!$service_query->have_posts()) {
        return '';
    }

    $service_query->the_post();
    $post_id = get_the_ID();
    wp_reset_postdata();

    // Получаем все блоки цен
    $price_blocks = get_field('price_blocks', $post_id);
    
    if (!$price_blocks || !is_array($price_blocks)) {
        return '';
    }

    // Определяем какие блоки выводить
    $blocks_to_show = array();
    
    if (!empty($atts['blocks'])) {
        // Если указаны конкретные блоки
        $block_numbers = array_map('trim', explode(',', $atts['blocks']));
        foreach ($block_numbers as $num) {
            $index = intval($num) - 1; // Преобразуем 1,2,3 в 0,1,2
            if (isset($price_blocks[$index])) {
                $blocks_to_show[] = $price_blocks[$index];
            }
        }
    } else {
        // Если не указаны - выводим все
        $blocks_to_show = $price_blocks;
    }

    if (empty($blocks_to_show)) {
        return '';
    }

    // Выводим блоки
    ob_start();
    
    foreach ($blocks_to_show as $block) {
        $service_prices = $block['service_prices'] ?? array();
        
        if (!$service_prices || !is_array($service_prices) || count($service_prices) == 0) {
            continue; // Пропускаем пустые блоки
        }
        
        // Подключаем шаблон для каждого блока
        include get_template_directory() . '/template-parts/blocks/service-prices.php';
    }
    
    return ob_get_clean();
}
add_shortcode('service_prices', 'service_prices_shortcode');

// Шорткод для вывода портфолио услуги
function service_portfolio_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'title' => '',
        'class' => ''
    ), $atts, 'service_portfolio');

    if (empty($atts['title'])) {
        return '<p>Укажите название услуги в атрибуте title</p>';
    }

    // Ищем услугу по названию
    $service_query = new WP_Query(array(
        'post_type' => 'services',
        'title' => $atts['title'],
        'posts_per_page' => 1,
        'post_status' => 'publish'
    ));

    if (!$service_query->have_posts()) {
        return '<p>Услуга с названием "' . esc_html($atts['title']) . '" не найдена</p>';
    }

    $service_query->the_post();
    $post_id = get_the_ID();
    wp_reset_postdata();

    // Подключаем шаблон для вывода
    ob_start();
    include get_template_directory() . '/template-parts/blocks/service-portfolio.php';
    return ob_get_clean();
}
add_shortcode('service_portfolio', 'service_portfolio_shortcode');

// Поддержка миниатюр
add_theme_support('post-thumbnails');

// Регистрация меню
function register_theme_menus()
{
    register_nav_menus(array(
        'primary' => 'Основное меню',
        'footer-menu' => 'Меню футера (десктоп)',
        'footer_left' => 'Меню футера (мобильная версия - левая колонка)',
        'footer_right' => 'Меню футера (мобильная версия - правая колонка)',
    ));
}
add_action('init', 'register_theme_menus');

// Обновление rewrite rules после регистрации post type
function services_flush_rewrite_rules()
{
    register_services_post_type();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'services_flush_rewrite_rules');

require_once get_template_directory() . '/inc/transliteration.php';

require_once get_template_directory() . '/inc/class-bootstrap-walker-nav-menu.php';

/**
 * Регистрация кастомных блоков ACF
 */
add_action('acf/init', function () {
    if (function_exists('acf_register_block_type')) {

        acf_register_block_type([
            'name' => 'section-image-texts',
            'title' => 'Секция с изображением и текстом',
            'description' => 'Блок с изображением и текстовым содержимым в разных вариантах расположения',
            'render_template' => get_template_directory() . '/template-parts/blocks/section-image-texts.php',
            'category' => 'custom-blocks',
            'icon' => 'align-pull-left',
            'keywords' => ['изображение', 'текст', 'секция', 'контент'],
            'mode' => 'preview',
            'supports' => [
                'align' => false,
                'mode' => true,
                'jsx' => true
            ],
            'example' => [
                'attributes' => [
                    'mode' => 'preview',
                    'data' => [
                        'image_position' => 'left',
                        'background_color' => 'light',
                        'is_preview' => true
                    ]
                ]
            ]
        ]);

        acf_register_block_type([
            'name' => 'two-columns-text',
            'title' => 'Двухколоночный текстовый блок',
            'description' => 'Блок с двумя колонками текста и настраиваемым фоном',
            'render_template' => get_template_directory() . '/template-parts/blocks/two-columns-text.php',
            'category' => 'custom-blocks',
            'icon' => 'columns',
            'keywords' => ['текст', 'колонки', 'двухколоночный'],
            'mode' => 'preview',
            'supports' => [
                'align' => false,
                'mode' => true,
                'jsx' => true
            ],
            'example' => [
                'attributes' => [
                    'mode' => 'preview',
                    'data' => [
                        'background_color' => 'dark',
                        'is_preview' => true
                    ]
                ]
            ]
        ]);

        // Section Contacts Block
        acf_register_block_type([
            'name' => 'section-contacts',
            'title' => 'Секция Контакты',
            'description' => 'Блок для отображения контактной информации компании',
            'render_template' => get_template_directory() . '/template-parts/blocks/section-contacts.php',
            'category' => 'custom-blocks',
            'icon' => 'phone',
            'keywords' => ['контакты', 'телефон', 'адрес', 'email'],
            'mode' => 'preview',
            'supports' => [
                'align' => false,
                'mode' => true,
            ],
            'example' => [
                'attributes' => [
                    'mode' => 'preview',
                    'data' => [
                        'is_preview' => true
                    ]
                ]
            ]
        ]);

        acf_register_block_type([
            'name' => 'section-gallery-text',
            'title' => 'Секция с галереей изображений и текстом',
            'description' => 'Блок с галереей изображений и текстовым содержимым в разных вариантах расположения',
            'render_template' => get_template_directory() . '/template-parts/blocks/section-gallery-text.php',
            'category' => 'custom-blocks',
            'icon' => 'format-gallery',
            'keywords' => ['галерея', 'изображения', 'текст', 'секция', 'контент'],
            'mode' => 'preview',
            'supports' => [
                'align' => false,
                'mode' => true,
                'jsx' => true
            ],
            'example' => [
                'attributes' => [
                    'mode' => 'preview',
                    'data' => [
                        'image_position' => 'left',
                        'background_color' => 'light',
                        'is_preview' => true
                    ]
                ]
            ]
        ]);

        // Здесь можно добавить регистрацию других блоков
    }
});

/**
 * Создаем категорию 'custom-blocks' для наших кастомных блоков, если она еще не существует
 */
add_filter('block_categories_all', function ($categories) {
    // Проверяем, существует ли уже категория custom-blocks
    $category_slugs = wp_list_pluck($categories, 'slug');

    if (!in_array('custom-blocks', $category_slugs)) {
        // Если не существует, добавляем новую категорию
        $categories[] = [
            'slug' => 'custom-blocks',
            'title' => 'Кастомные блоки',
            'icon' => null,
        ];
    }

    return $categories;
}, 10, 1);
