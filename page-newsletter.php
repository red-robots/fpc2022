<?php
/**
 * Template Name: News
 *
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

    <div class="sermons-wrapper wrapper">
      <div class="two-columns-section">
      <?php
        // set the date
        ///$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
        $prevMonth = '';
        $wp_query = new WP_Query();
        $wp_query->query(array(
          'post_type'=>'newsletter',
          'posts_per_page' => 15,
          'paged' => $paged,
        ));
        if ($wp_query->have_posts()) : ?>
        <section class="sermons news">
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
            $currentM = get_the_date('M Y'); 
            $pagelink = ( get_field('link_to_newsletter') ) ? get_field('link_to_newsletter') : 'javascript:void(0)';
          ?>
          <div class="sermon-row">
            <?php  if( $currentM != $prevMonth ) { ?>
            <h2 class="month-year"><?php echo get_the_date('M Y'); ?></h2>
            <?php $prevMonth = $currentM; } ?>
            <div class="info">
              <div class="sermon">
                <h3><a href="<?php echo $pagelink; ?>" target="_blank"><?php echo get_the_title(); ?> <i class="fas fa-chevron-circle-right"></i></a></h3>
              </div>
            </div>
          </div>
          <?php endwhile; pagi_posts_nav(); ?>
        </section>
        <?php endif; ?>


        <aside class="widget-area">
          <h2>Monthly Sermon Archives</h2>
          <ul class="widget">
            <?php $args = array(
              'type'            => 'monthly',
              'limit'           => '',
              'format'          => 'html', 
              'before'          => '',
              'after'           => '',
              'show_post_count' => false,
              'echo'            => 1,
              'order'           => 'DESC',
              'post_type'     => 'newsletter'
            );
            wp_get_archives( $args ); ?>
          </ul>
        </aside>

      </div>
    </div>
		
	</main>
</div>
<?php
get_footer();
