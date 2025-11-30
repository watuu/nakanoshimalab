<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no"/>

    <!-- css -->
    <link href="<?= get_stylesheet_directory_uri() ?>/assets/css/style.css" rel="stylesheet"/>

    <!-- vendor -->

    <script src="https://webfont.fontplus.jp/accessor/script/fontplus.js?J-fMHawjerA%3D&box=DNYyG7Qtq-k%3D&aa=1&ab=2"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mona+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <?php
    $bodyClass = '';
    if (is_front_page()) {
        $bodyClass .= 'page-front';
    }
    // if ( is_parent_slug() == 'service' && (is_page('thanks') )) {
    //     $bodyClass .= 'thanks';
    // }
    ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class($bodyClass); ?> id="body">
<a id="top"></a>
<div class="l-body-wrap">
    <header class="l-header">
        <div class="l-header__wrap">
            <p class="l-header-logo"><a href="<?= home_url() ?>/">
                    <svg width="195" height="40" role="img" aria-label="クリエイティブアイランド中之島"><use href="#logo"></use></svg></a></p>
            <nav class="l-header-nav">
                <ul class="l-header-nav__nav">
                    <li>
                        <button class="c-btn-header-about" data-micromodal-trigger="modal-about"><span class="c-btn-header-about__txt">中之島について</span><i class="c-btn-header-about__plus"></i></button>
                    </li>
                </ul>
                <ul class="l-header-nav__locale c-link-local">
                    <li>
                        <p class="js-split-text">JP</p>
                    </li>
                    <li><a class="js-split-text" href="#">EN</a></li>
                </ul>
            </nav>
            <button class="l-header-menu c-btn-menu" aria-label="メニューを開く"><span>Menu</span><span>Close</span></button>
        </div>
        <div class="l-header-drawer is-section-dark">
            <div class="l-header-drawer__bg"></div>
            <div class="l-header-drawer__wrap">
                <div class="l-header-drawer__inner">
                    <nav class="l-header-drawer__nav">
                        <?php get_template_part('template/cm-nav-main') ?>
                    </nav>
                    <div class="l-header-drawer-recommend">
                        <div class="l-header-drawer-recommend__head"><span>Recommend</span><span>おすすめコンテンツ</span></div>
                        <div class="l-header-drawer-recommend__list">
                            <div class="c-card-recommend"><a class="c-card-recommend__link" href="<?= home_url() ?>/single-news/">
                                    <figure class="c-card-recommend__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/500x500.webp" alt=""/></figure>
                                    <div class="c-card-recommend__body">
                                        <h3 class="c-card-recommend__title">「中之島15の場所での物語」AR挿絵公募</h3>
                                        <ul class="c-card-recommend__tag">
                                            <li>#Events</li>
                                        </ul>
                                    </div></a></div>
                            <div class="c-card-recommend"><a class="c-card-recommend__link" href="<?= home_url() ?>/single-news/">
                                    <figure class="c-card-recommend__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/500x500.webp" alt=""/></figure>
                                    <div class="c-card-recommend__body">
                                        <h3 class="c-card-recommend__title">「中之島15の場所での物語」AR挿絵公募</h3>
                                        <ul class="c-card-recommend__tag">
                                            <li>#Events</li>
                                        </ul>
                                    </div></a></div>
                            <div class="c-card-recommend"><a class="c-card-recommend__link" href="<?= home_url() ?>/single-news/">
                                    <figure class="c-card-recommend__pic"><img src="<?= get_stylesheet_directory_uri() ?>/assets/img/500x500.webp" alt=""/></figure>
                                    <div class="c-card-recommend__body">
                                        <h3 class="c-card-recommend__title">「中之島15の場所での物語」AR挿絵公募</h3>
                                        <ul class="c-card-recommend__tag">
                                            <li>#Events</li>
                                        </ul>
                                    </div></a></div>
                        </div>
                    </div>
                    <div class="l-header-drawer__cta"><a class="c-btn-ticket" href="#"><span class="c-btn-ticket__txt">Ticket購入</span><i class="c-btn-ticket__arrow">
                                <svg class="js-clone" width="26" height="26"><use href="#ico-arrow"></use></svg></i></a></div>
                </div>
            </div>
        </div>
    </header>
    <main class="l-main" id="main">