/* show posts published within last 7 days (maximum 21) for WordPress */

<?php query_posts("showposts=21") ?>
<?php while (have_posts()) : the_post(); ?>

<?php $mylimit=7 * 86400; //days * seconds per day
$post_age = date('U') - get_post_time('U');
if ($post_age < $mylimit) { ?>

<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<p class="date">
  <small>
    Posted on <?php the_time('Y-m-d'); ?> by
    <?php if (get_the_author_url()) { ?>
    <a href="<?php the_author_meta('url'); ?>"><?php the_author(); ?></a>
    <?php } else { the_author(); } ?> 
    | <?php edit_post_link('Edit') ?>
  </small>
</p>

<?php the_excerpt(__('Read more'));?>

<hr/>
<?php } ?>
<?php endwhile; ?>
