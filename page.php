<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */
get_header(); ?>
<div id="primary" class="content-area default-template">
	<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>
      <header class="entry-title">
        <div class="wrapper">
          <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
      </header>
    <?php endwhile; ?>  

    <?php if ( get_the_content() ) { ?>
    <section class="entry-content"><?php the_content(); ?></section>
    <?php } ?>

    <?php
      $directions = get_field('directions_block');
      $map = get_field('map');
    ?>

    <section class="content-section">
      <?php if( have_rows('sections') ) { ?>
      <div class="twocols-container">
        <?php while( have_rows('sections') ) : the_row(); ?>
          <?php 
            $content = get_sub_field('section'); 
            $images = get_sub_field('side_image'); 
          ?>
        <div class="section wrapper">
          <div class="fxcol left">
            <?php echo $content ?>
          </div>

          <div class="fxcol right">
            <?php if ($images) { ?>
            <?php foreach ($images as $img) { ?>
            <figure>
              <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>">
            </figure>    
            <?php } ?> 
            <?php } ?>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <?php } ?>


      <?php if ($directions || $map) { ?>
      <div class="twocols-container">
        <div class="section wrapper">
          <div class="fxcol left">
            <?php echo $directions; ?>
          </div>

          <div class="fxcol right">
            <?php if ($map) { ?>
              <div class="mapwrap">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/square.png" alt="" class="resizer">
                <?php echo $map ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>
    </section>

		
	</main>
</div>
<?php
get_footer();
