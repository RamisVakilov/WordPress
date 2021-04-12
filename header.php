<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uber
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>
        <?php
            bloginfo('name'); echo '|'; bloginfo('description');
        ?>
        </title>
        <meta name="theme-color" content="#c9e0e04d">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="shortcut icon" href="./img/favicons/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="./img/favicons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="57x57" href="./img/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="./img/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="./img/favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="./img/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="./img/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="./img/favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="180x180" href="./img/favicons/apple-touch-icon-180x180.png">
	<?php wp_head(); ?>
</head>
<?php $id = get_the_ID();?>
<body <?php body_class(); ?>>
        <header>
        <div class="question">
            <div class="question__text" >
                Есть вопросы? Напишите нам!
            </div>
            <div id="reply" class="minibutton">Написать</div>
            <div class="question__close">&times</div>
        </div>
        
        <div class="reply">
            <div class="reply__body">
                <div class="reply__title">
                    Оставьте ваш вопрос здесь
                </div>
                <?php echo do_shortcode('[contact-form-7 id="129" title="Задать вопрос"]');?>
            </div>
        </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-11 col-sm-12 col-md-12 col-lg-3">
                        <div class="header__logo">
                            <?php
                                the_custom_logo();
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9 offset-lg-0 col-xl-7 offset-xl-2 ">
                        <div class="header__contacts">
                            <div class="header__contacts-item">
                                <img src="<?php echo get_template_directory_uri() . '/asset/img/icons/svg/email.svg'; ?>" alt="почта" class="header__contacts-logo">
                                <a href="mailto:<?php the_field('email',9);?>" class="header__contacts-mail"><?php the_field('email',9);?></a>
                            </div>
                            <div class="header__contacts-item">
                                <img src="<?php echo get_template_directory_uri() . '/asset/img/icons/svg/phone.svg'; ?>" alt="телефон" class="header__contacts-logo">
                                <div class="header__contacts-tel">
                                    <a href="tel:<?php the_field('phone_1',9);?>"><?php the_field('phone_1',9);?></a>
                                    <a href="tel:<?php the_field('phone2',9);?>"><?php the_field('phone2',9);?></a>
                                </div>
                            </div>
                            <div class="header__contacts-item">
                                <img src="<?php echo get_template_directory_uri() . '/asset/img/icons/svg/pointer.svg'; ?>" alt="указатель" class="header__contacts-logo">
                                <address>
                                    <?php the_field('adres',9);?>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="row" data-slide="1">

                <?php
                    wp_nav_menu( [
                        'menu'            => 'Main', 
                        'container'       => false, 
                        'menu_class'      => 'header__nav', 
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul  class="header__nav">%3$s</ul>',
                        'depth'           => 1 //вложенность элементов меню
                    ] );

                ?>

               
                </nav>
            </div>
            <div class="header__hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>
