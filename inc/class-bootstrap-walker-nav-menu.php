<?php
/**
 * inc/class-bootstrap-walker-nav-menu.php
 * Bootstrap Walker для меню
 * Нужно добавить в functions.php или include этот файл
 */

if (!defined('ABSPATH')) {
    exit; // Запрет прямого доступа
}

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu
{
    private $item_count = 0;
    private $is_last_item = false;

    /**
     * Начало уровня меню
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu dropdown-menu-light py-1\" style=\"border-radius: 5px\">\n";
    }

    /**
     * Конец уровня меню
     */
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Начало элемента
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Для первого уровня увеличиваем счетчик
        if ($depth === 0) {
            $this->item_count++;
        }

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item position-relative';

        // Проверка активности пункта меню
        $active_class = in_array('current-menu-item', $classes) ? 'active' : '';

        // Проверка наличия дочерних элементов
        $has_children = in_array('menu-item-has-children', $classes);

        // Формирование классов для li
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        // Атрибуты ссылки
        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        // Формирование классов для ссылки
        if ($depth === 0) {
            $atts['class'] = 'nav-link';

            if ($has_children) {
                $atts['class'] .= ' dropdown-toggle';
                $atts['data-bs-toggle'] = 'dropdown';
                $atts['data-bs-auto-close'] = 'outside';
                $atts['aria-expanded'] = 'false';
                $atts['role'] = 'button';
                $atts['id'] = 'navbarDropdown' . $item->ID;
            }

            if ($active_class) {
                $atts['class'] .= ' ' . $active_class;
            }
        } else {
            $atts['class'] = 'dropdown-item nav-item';

            if ($active_class) {
                $atts['class'] .= ' ' . $active_class;
            }
        }

        // Формирование атрибутов ссылки
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // Формирование ссылки
        $item_output = $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ($args->link_before ?? '') . apply_filters('the_title', $item->title, $item->ID) . ($args->link_after ?? '');
        $item_output .= '</a>';
        $item_output .= $args->after ?? '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Конец элемента
     */
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
        
        // Добавляем разделитель только на первом уровне
        if ($depth === 0) {
            // Проверяем, имеет ли текущий элемент дочерние элементы
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $has_children = in_array('menu-item-has-children', $classes);
            
            // Получаем все элементы меню первого уровня
            $menu_items = wp_get_nav_menu_items($args->menu ?? '');
            if ($menu_items) {
                $top_level_items = array_filter($menu_items, function($menu_item) {
                    return $menu_item->menu_item_parent == 0;
                });
                
                $current_position = array_search($item->ID, array_column($top_level_items, 'ID'));
                $is_last = ($current_position === count($top_level_items) - 1);
                
                // Добавляем разделитель только если:
                // 1. Это НЕ последний элемент
                // 2. Элемент НЕ имеет дочерних элементов (dropdown)
                if (!$is_last && !$has_children) {
                    $output .= '<li class="nav-item d-none d-lg-inline">';
                    $output .= '<img class="nav-link" src="' . esc_url(get_template_directory_uri()) . '/assets/img/ico/menu-decoration-point.svg" />';
                    $output .= '</li>' . "\n";
                }
            }
        }
    }
}
?>