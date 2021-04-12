<?php
/*
    Template Name:Наша история
*/
?>
<?php 
    get_header();
?>
     <div class="aboutus">
            <div class="container">
                <h1 class="title"><?php the_field('command_history',$id)?></h1>
                        <?php
                            $history = get_field('history_first');
                        ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subtitle">
                            <?php echo $history['history_subtitle_first'];?>
                        </div>
                        <div class="aboutus__text">
                            <?php echo $history['history_descr_first'];?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                        <img class="aboutus__img" 
                            src="<?php echo $history['history_img_first']['url']; ?>" 
                            alt="<?php echo $history['history_img_first']['alt']; ?>"
                        >
                    </div>
                </div>

                        <?php
                            $history2 = get_field('history_second');
                        ?>
                <div class="row">
                    <div class="col-lg-6">
                        <img class="aboutus__img" 
                            src="<?php echo $history2['history_img_second']['url']; ?>" 
                            alt="<?php echo $history2['history_img_second']['alt']; ?>"
                        >
                    </div>
                    <div class="col-lg-6">
                        <div class="subtitle">
                            <?php echo $history2['history_subtitle_second'];?>
                        </div>
                        <div class="aboutus__text">
                            <?php echo $history2['history_descr_second'];?>
                        </div>
                    </div>
                </div>

                     <?php
                            $history3 = get_field('history_third');
                     ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subtitle">
                            <?php echo $history3['history_subtitle_third'];?>
                        </div>
                        <div class="aboutus__text">
                            <?php echo $history3['history_descr_third'];?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                        <img class="aboutus__img" 
                            src="<?php 
                                echo $history3['history_img_third']['url']; 
                            ?>" 
                            alt="<?php 
                                echo $history3['history_img_third']['alt']; 
                            ?>"
                        >
                    </div>
                </div>
                
            </div>
        </div>
<?php
    get_footer();
?>