<?php
/**
 * The template for Home Page
 */
get_header(); 
?>
<?php while ( have_posts() ) : the_post(); ?>
  <main id="main" class="site-main">
    <section class="home-intro">
      <?php if ( get_the_content() ) { ?>
        <?php the_content(); ?>
      <?php } ?>
    </section>
  </main>
<?php endwhile; ?>  
<?php
get_footer();
