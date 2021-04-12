<?php
/*
    Template Name:Шаблон для вывода мягких игрушек
*/
?>
<?php 
    get_header();
?>
 <div class="toys">
            <div class="container">
                <!-- мягкие игрушки -->
                <h2 class="subtitle"><?php echo get_cat_name(3);?></h2>
                <div class="toys__wrapper">
                <?php
                // параметры по умолчанию
                $posts = get_posts( array( //загоняю в массив все мягкие игрушки
                    'numberposts' => -1, //вывожу все мягкие игрушки, но можно указать число которое я буду выводить
                    'category_name'    => 'soft',
                    'orderby'     => 'date', //сортировка по дате
                    'order'       => 'ASC', //вывод в обратном порядке
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                foreach( $posts as $post ){
                    setup_postdata($post);
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
                            <!-- создаём динамическую ссылку для каждого поста -->
                            <a href="<?php echo get_permalink();?>" class="minibutton toys__trigger">Подробнее</a> 
                        </div>
                    </div>

                    <?php
                }
                
                wp_reset_postdata(); // сброс
                ?>
                </div>
                     
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
?>