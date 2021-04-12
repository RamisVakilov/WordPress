<?php
/*
    Template Name:Наша команда
*/
?>
<?php 
    get_header();
?>
<div class="specialists">
            <div class="container">
                <div class="title"><?php the_field('command_title',$id)?> </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                    <?php
                        $cmd = get_field('command_photo',$id);
                    ?>
                        <img class="specialists__img" 
                            src="<?php echo $cmd['url']; ?>" 
                            alt="<?php echo $cmd['alt']; ?>"
                        >
                    </div>
                </div>
            </div>
        </div>
<?php
    get_footer();
?>