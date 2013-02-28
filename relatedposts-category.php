/* related posts by category for WordPress */

<ul id="square"> 
<?php
$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 
                             'numberposts' => 7, 
                             'post__not_in' => array($post->ID) ) );
if( $related ) foreach( $related as $post ) {
setup_postdata($post); ?>

<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>

<?php } wp_reset_postdata(); ?>
</ul>  
