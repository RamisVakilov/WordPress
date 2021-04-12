<?php
/*
    Template Name:Наша компания
*/
?>
<?php 
    get_header();
?>
<div class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
                        <div class="about__img">
                            <?php
                                $img = get_field('about_img',$id);
                                if (!empty($img)): 
                            ?>
                                <img
                                src="<?php echo $img;?>"
                                alt="<?php echo the_field('about_title',$id);?>"
                                >
                                <?php endif;
                                ?>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 col-xl-5 offset-xl-1">
                        <h1 class="title underlined">
                            <?php 
                               the_field('about_title',$id); 
                          ?>
                        </h1>
                        <div class="about__text">
						<?php 
                            the_field('about_descr',$id);
                        ?>
                        </div>
                        <a href="#" class="button">Узнать больше</a>
                    </div>
                </div>
            </div>
        </div>


<?php
    get_footer();
?>