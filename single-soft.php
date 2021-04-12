<?php
/*
    Template Name: шаблон для отображения мягких игрушек
    Template Post Type: post, soft
*/
?>

<?php
get_header();

?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );//вытаскиваем код из файла content.php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<div class="container toys">
                <!-- мягкие игрушки -->
                <h2 class="subtitle">Новые товары</h2>
                <div class="toys__wrapper">
                <?php
                // параметры по умолчанию
                $posts = get_posts( array( //загоняю в массив все мягкие игрушки
                    'numberposts' => 3, //вывожу последние 3 поста мягких игрушек
                    'category_name'    => 'soft',
                    'orderby'     => 'date', //сортировка по дате
                    'order'       => 'ASC', //вывод в обратном порядке
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                foreach( $posts as $post ){
                    setup_postdata($post);
                    if ( get_the_ID($post) != CUR) {//проверка на то чтобы не выводить этот же элемент в разделе "ВОЗМОЖНО ВАМ ПОНРАВИТСЯ   "
                                           
                    ?>

                            <div class="toys__item" style="background-image:url(<?php 
                                                                    //если есть картинка   
                                                                    if(has_post_thumbnail()){
                                                                            the_post_thumbnail_url();
                                                                    }
                                                                    //если нет
                                                                    else {echo get_template_directory_uri().'/asset/img/not-found.jpg';} 
                                                                    ?>") >
                                <div class="toys__item-info">
                                    <div class="toys__item-title"><?php the_title()?></div>
                                    <div class="toys__item-descr">
                                        <?php the_field('toys_descr',$id);?>
                                    </div>
                                    <a href="<?php echo get_permalink();?>" class="minibutton toys__trigger">Подробнее</a>
                                </div>
                            </div>

                    <?php
                    }
                    else {}//сюда можно вписать скрипт когда искомый элемент совпадает с главным
                    
                }
                
                wp_reset_postdata(); // сброс
                ?>
                   
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="toys__alert">
                            <span>Не нашли то, что искали?</span> Свяжитесь с нами - и мы с радостью создадим любую игрушку по вашему желанию. Вы можете выбрать все: размер, материал, формы...!
                        </div>
                    </div>
                </div>
            </div>
       </div>     
<?php
get_footer();
