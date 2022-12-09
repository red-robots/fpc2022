<?php
/**
 * Template Name: Sermons
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
        $prevMonth = '';
        //$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
        $wp_query = new WP_Query();
        $wp_query->query(array(
          'post_type'=>'sermon',
          'posts_per_page' => 30,
          'paged' => $paged,
          'meta_key'  => 'date',
          'orderby' => 'meta_value_num',
          'order'   => 'DESC'
        ));
        if ($wp_query->have_posts()) : ?>
        <section class="sermons">
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
            // get raw date
            $date = get_field('date', false, false);
            // make date object
            $date = new DateTime($date);
            // example: echo $date->format('j M Y');
            $pTitle = get_field('title');
            $passage = get_field('passage');
            $minister = get_field('minister');
            $watch = get_field('watch');
            $download = get_field('download');
            $currentM = $date->format('M');
          ?>
          <div class="sermon-row">
            <?php  if( $currentM != $prevMonth ) { ?>
            <h2 class="month-year"><?php echo $date->format('M Y'); ?></h2>
            <?php $prevMonth = $currentM; } ?>
            <div class="info">
              <div class="date">
              <span class="month"><?php echo $date->format('M'); ?></span>
                <span class="day"><?php echo $date->format('j'); ?></span>
              </div>
              <div class="sermon">
                <h3><?php echo $pTitle; ?></h3>
                <h4 class="minister"><?php echo $minister; ?></h4>
              </div>
              <div class="passage"><?php echo $passage; ?></div>
              <div class="downloads">
                <div class="watch">
                  <?php if( $watch != '') { ?>
                    <a href="<?php echo $watch; ?>" target="_blank">
                      <i class="fas fa-video fa-lg"></i>
                    </a>
                  <?php } ?>
                </div>
                <div class="download">
                  <?php if( $download != '') { ?>
                    <a href="<?php echo $download; ?>">
                      <i class="fas fa-cloud-download-alt fa-lg"></i>
                    </a>
                  <?php } ?>
                </div>
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
              'post_type'     => 'sermon'
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
