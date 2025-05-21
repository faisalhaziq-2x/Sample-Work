<?php

/**
 * The template part used for displaying slider banner on homepage
 *
 * @package Genesis Block Theme
 */

if (is_admin())
    return;

global $post;

$slider_banner = get_field('slider', $post->ID);

if (isset($slider_banner)) {
    $slide_nav = [];
    foreach ($slider_banner as $slides) {
        $slide_nav[] = $slides['short_title'];
    }
?>
    <section id="slider-banner">
        <div class="home-slider desktop-banner">
            <?php
            foreach ($slider_banner as $slides) {
                $short = htmlspecialchars(str_replace(' ', '-', $slides['short_title']));
            ?>
                <div class="slide-wrap" data-hash="<?= $short ?>">
                    <div class="banner-img-wrapper desktop">
                        <img src="<?= wp_get_attachment_image_url($slides['slide_desktop_background']['id'], 'full') ?>" class="banner-img" alt="" loading="lazy">

                        <div class="slide-row">
                            <div class="text-container">
                                <div class="heading">
                                    <h1><?= $slides['title'] ?></h1>
                                </div>
                                <div class="subheading">
                                    <h5><?= $slides['description'] ?></h5>
                                </div>
                                <div class="cta-row">
                                    <?php
                                    $link1 = $slides['cta'];
                                    $link2 = $slides['cta_2'];
                                    if ($link1) {
                                        $link1_url = $link1['url'];
                                        $link1_title = $link1['title'];
                                        $link1_target = $link1['target'] ? $link1['target'] : '_self';
                                        echo '<div><a class="btn primary-btn" href="' . $link1_url . '" target="' . $link1_target . '">' . $link1_title . '</a></div>';
                                    }

                                    if ($link2) {
                                        $link2_url = $link2['url'];
                                        $link2_title = $link2['title'];
                                        $link2_target = $link2['target'] ? $link2['target'] : '_self';
                                        echo '<div><a class="btn secondary-btn" href="' . $link2_url . '" target="' . $link2_target . '">' . $link2_title . '</a></div>';
                                    }
                                    ?>
                                </div>
                                <div class="slide-nav-rows" id="desktop-navi-btn">
                                    <?php
                                    $x = 1;
                                    foreach ($slide_nav as $title) {
                                        $urllink = htmlspecialchars(str_replace(' ', '-', $title)); ?>
                                        <a href="#<?= $urllink ?>" id="#<?= $urllink ?>" class="hash-btn">
                                            <div class="slide-nav">
                                                <div class="slide-nav-item"><?= htmlspecialchars($title) ?></div>
                                            </div>
                                        </a>
                                    <?php $x++;
                                    } ?>
                                </div>
                            </div>
                            <?php
                            if (isset($slides['brand_image']['id'])) {
                            ?>
                                <div class="brand-img-container">
                                    <img src="<?= wp_get_attachment_image_url($slides['brand_image']['id'], 'full') ?>" class="brand-img" alt="" loading="lazy">
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="brand-img-container">
                                    <!-- <img src="<?= wp_get_attachment_image_url($slides['brand_image']['id'], 'full') ?>" class="brand-img" alt="" loading="lazy"> -->
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            } // end foreach
            ?>
        </div>
        <div class="home-slider-mobile mobile-banner">
            <?php
            foreach ($slider_banner as $slides) {
                $short = htmlspecialchars(str_replace(' ', '-', $slides['short_title']));
            ?>
                <div class="slide-wrap" data-hash="<?= $short ?>">
                    <div class="banner-img-wrapper mobile">
                        <img src="<?= wp_get_attachment_image_url($slides['slide_mobile_background']['id'], 'full') ?>" class="banner-img" alt="" loading="lazy">
                        <div class="slide-row">
                            <div class="text-container">
                                <div class="heading">
                                    <h1><?= $slides['title'] ?></h1>
                                </div>
                                <div class="subheading">
                                    <h5><?= $slides['description'] ?></h5>
                                </div>
                                <div class="cta-row">
                                    <?php
                                    $link1 = $slides['cta'];
                                    $link2 = $slides['cta_2'];
                                    if ($link1) {
                                        $link1_url = $link1['url'];
                                        $link1_title = $link1['title'];
                                        $link1_target = $link1['target'] ? $link1['target'] : '_self';
                                        echo '<div><a class="btn primary-btn" href="' . $link1_url . '" target="' . $link1_target . '">' . $link1_title . '</a></div>';
                                    }

                                    if ($link2) {
                                        $link2_url = $link2['url'];
                                        $link2_title = $link2['title'];
                                        $link2_target = $link2['target'] ? $link2['target'] : '_self';
                                        echo '<div><a class="btn secondary-btn" href="' . $link2_url . '" target="' . $link2_target . '">' . $link2_title . '</a></div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            if ($slides['brand_image']['id']) {
                            ?>
                                <div class="brand-img-container <?php if($slides['hide_brand_image']){ echo "hide_mbl"; } ?>">
                                    <img src="<?= wp_get_attachment_image_url($slides['brand_image']['id'], 'full') ?>" class="brand-img" alt="" loading="lazy">
                                </div>
                            <?php
                            }
                            ?>

                        </div>

                    </div>
                </div>
            <?php
            } // end foreach
            ?>


        </div>
        <div class="slide-nav-rows" id="mobile-navi-btn">
            <?php
            $x = 1;
            foreach ($slide_nav as $title) {
                $urllink = htmlspecialchars(str_replace(' ', '-', $title)); ?>
                <a href="#<?= $urllink ?>" id="#<?= $urllink ?>" class="hash-btn" data-position="<?= $x ?>">
                    <div class="slide-nav">
                        <!-- <div class="slide-nav-item"><?= htmlspecialchars($title) ?></div> -->
                    </div>
                </a>
            <?php $x++;
            } ?>
        </div>
    </section>
<?php
} //end if
?>