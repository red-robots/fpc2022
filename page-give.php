<?php
/**
 * Template Name: Give
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

    <?php if( have_rows('buttons') ) { ?>
      <section class="donation-links sections">
        <div class="wrapper">
          <div class="linkouts">
            <?php while( have_rows('buttons') ) : the_row(); 
                $title = get_sub_field('title');
                $qdesc = get_sub_field('quick_description');
                $link = get_sub_field('link');
                $baseName = ($link) ? basename($link) : '';
                $btnText = get_sub_field('button_text_optional');
                $target = '_self';
                if($link) {
                  $parts = explode(".",$link);
                  if(end($parts)=='pdf') {
                    $target = '_blank';
                  }
                } 
                if( $btnText != '') {
                  $btnUse = $btnText;
                } else {
                  $btnUse = 'CLICK HERE';
                }
              ?>
            <div class="linkbox">
              <h3><?php echo $title; ?></h3>
                <?php if( $qdesc ) { ?>
                  <div class="desc"><?php echo $qdesc; ?></div>
                <?php } ?>
              <div class="btn">
                <a href="<?php echo $link; ?>" target="<?php echo $target ?>">
                  <?php echo $btnUse; ?>  <i class="fas fa-chevron-circle-right"></i>
                </a>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </section>
    <?php } ?>

    <?php if ( get_the_content() ) { ?>
    <section class="entry-content"><?php the_content(); ?></section>
    <?php } ?>

	</main>
</div>
<?php
get_footer();
