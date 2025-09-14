<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="section text-dark section-about service-page section-grid">
        <div class="container single-product">
            <div class="section-title text-center">
                <!-- Заголовок -->
                <h3 class="text-dark fw-semibold" style="font-size: 26px">
                    <?php the_title(); ?>
                </h3>

                <!-- Изображение по центру -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения" class="img-fluid" />
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-6 mb-4 mb-md-0 section-image">
                    <?php 
                    $gallery_images = get_field('gallery_images');
                    if ($gallery_images && is_array($gallery_images) && count($gallery_images) > 0) : 
                        // Статические ID вместо динамических
                        $carousel_id = 'carousel-2691';
                        $gallery_id = 'gallery-2691';
                    ?>
                    <div
                        id="<?php echo $carousel_id; ?>"
                        class="carousel slide"
                        data-bs-ride="false"
                        data-bs-interval="false"
                    >
                        <div class="carousel-inner rounded">
                            <?php foreach ($gallery_images as $index => $image) : ?>
                            <div class="carousel-item gallery-2691-wrapper <?php echo $index === 0 ? 'active' : ''; ?>">
                                <button
                                    class="gallery-2691 "
                                    onclick="galleryOn('<?php echo $gallery_id; ?>');"
                                >
                                    <div class="single-product-img approximation img-wrapper position-relative">
                                        <img
                                            src="<?php echo esc_url($image['url']); ?>"
                                            class="d-block w-100 single-product-img-img"
                                            loading="lazy"
                                            alt="<?php echo esc_attr($image['alt']); ?>"
                                        />
                                        <div class="overlay">
                                            <img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/zoom-icon.svg"
                                                alt="Zoom"
                                                class="zoom-icon"
                                            />
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <?php if (count($gallery_images) > 1) : ?>
                        <button
                            class="carousel-control-prev"
                            type="button"
                            data-bs-target="#<?php echo $carousel_id; ?>"
                            data-bs-slide="prev"
                        >
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next"
                            type="button"
                            data-bs-target="#<?php echo $carousel_id; ?>"
                            data-bs-slide="next"
                        >
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <?php endif; ?>
                    </div>
                    
                    <?php elseif (has_post_thumbnail()) : ?>
                        <div class="single-product-img approximation img-wrapper">
                            <?php the_post_thumbnail('large', array('class' => 'd-block w-100', 'loading' => 'lazy')); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Пустая колонка -->
                <div class="d-none d-xl-block col-xl-1"></div>

                <div class="col-12 col-md-5 text-dark">
                    <?php 
                    $service_description = get_field('service_description');
                    if ($service_description) :
                        echo wpautop($service_description);
                    else :
                        the_content();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php if ($gallery_images && is_array($gallery_images) && count($gallery_images) > 0) : ?>
    <!-- Gallery wrapper -->
    <div
        id="galleryWrapper"
        style="
            background: rgba(0, 0, 0, 0.85);
            display: none;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 9999;
        "
    >
        <div
            id="<?php echo $gallery_id; ?>"
            class="carousel slide"
            data-bs-ride="false"
            data-bs-interval="false"
            style="display: none; position: fixed; top: 0; height: 100%; width: 100%"
        >
            <div class="carousel-inner h-100">
                <?php foreach ($gallery_images as $index => $image) : ?>
                <div class="carousel-item carousel-item-2 h-100 <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="row align-items-center h-100">
                        <div class="col text-center">
                            <img
                                src="<?php echo esc_url($image['url']); ?>"
                                class="img-fluid"
                                loading="lazy"
                                style="max-width: 75vw; max-height: 75vh"
                                alt="<?php echo esc_attr($image['alt']); ?>"
                            />
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <?php if (count($gallery_images) > 1) : ?>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#<?php echo $gallery_id; ?>"
                data-bs-slide="prev"
            >
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#<?php echo $gallery_id; ?>"
                data-bs-slide="next"
            >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <?php endif; ?>
        </div>

        <!-- Кнопка закрытия галереи -->
        <button
            type="button"
            onclick="closeGallery();"
            class="btn-close"
            style="position: fixed; top: 25px; right: 25px; z-index: 99999"
            aria-label="Close"
        ></button>
    </div>
    <?php endif; ?>

    <?php 
    $prices = get_field('service_prices');
    if ($prices && is_array($prices) && count($prices) > 0) : 
    ?>
    <!-- Цены на сером фоне -->
    <section class="section bg-alt-light text-dark">
        <div class="container single-product">
            <div class="section-title text-center">
                <!-- Заголовок -->
                <h3 class="text-dark fw-semibold">Цены</h3>

                <!-- Изображение по центру -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/points.png" alt="Описание изображения" class="img-fluid" />
            </div>

            <div class="row">
                <div class="col-12">
                    <?php foreach ($prices as $index => $price) : ?>
                    <div class="price-item <?php echo ($index === count($prices) - 1) ? 'mb-0' : ''; ?>">
                        <span class="price-name"><?php echo esc_html($price['price_name']); ?></span>
                        <span class="price-value price-text"><?php echo esc_html($price['price_value']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <script>
        /* Функция открытия галереи */
        function galleryOn(gal) {
            var gallery = gal;
            document.getElementById('galleryWrapper').style.display = 'block';
            document.getElementById(gallery).style.display = 'block';
        }

        /* Кнопка закрытия галереи */
        function closeGallery() {
            document.getElementById('galleryWrapper').style.display = 'none';
            <?php if ($gallery_images) : ?>
            document.getElementById('<?php echo $gallery_id; ?>').style.display = 'none';
            <?php endif; ?>
        }
    </script>

<?php endwhile; endif; ?>

<?php get_footer(); ?>