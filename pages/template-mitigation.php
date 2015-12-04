<?php
/*
Template Name: Mitigation
*/
get_header();
?>
<main id="main" itemprop="mainContentOfPage" role="main" class="mitigation">
    <?php 
    if (have_posts()) : 
        while (have_posts()) : 
            the_post(); 
            $swf_mitigation_map = ( get_field( 'swf_mitigation_map' ) ? get_field( 'swf_mitigation_map' ) : '' );
            $swf_mitigation_map_image = ( get_field( 'swf_mitigation_map_image' ) ? get_field( 'swf_mitigation_map_image' ) : '' );
            $img_class = ( isset( $swf_mitigation_map_image ) && !empty( $swf_mitigation_map_image ) ? ' mitigation__map--render-image' : '' );
    ?>
            <div class="mitigation__map--render<?php echo $img_class; ?>">
                <div class="mobile-overlay"></div>
                <?php get_template_part( 'template-parts/mapinfo' ); ?>
                <?php if( isset( $swf_mitigation_map_image ) && !empty( $swf_mitigation_map_image ) ) : ?>
                    <div class="mitigation__map--image">
                        <img src="<?php echo $swf_mitigation_map_image['url']; ?>" alt="<?php echo $swf_mitigation_map_image['alt']; ?>" />
                    </div>
                <?php else: ?>
                    <div class="mitigation__map">
                        <iframe width='100%' height='100%' frameBorder='0' src='<?php echo $swf_mitigation_map; ?>'></iframe>
                    </div>
                <?php endif; ?>
                
            </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
</main>
<?php get_footer(); ?>