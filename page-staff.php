<?php
/**
 * Template Name: Staff & Leadership
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
      
      <?php if ( get_the_content() ) { ?>
      <section class="entry-content"><?php the_content(); ?></section>
      <?php } ?>
		<?php endwhile; ?>	

    <?php
    $wp_query = new WP_Query();
    $wp_query->query(array(
      'post_type'=>'staff',
      'posts_per_page' => -1
    ));
    if ($wp_query->have_posts()) { ?>
    <section class="staff wrapper">
      <div class="inner">
      <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
        $email = get_field('email');
        $pTitle = get_field('title');
        $picture = get_field('picture');
        $photo = ($picture) ? $picture['url'] : '';
        $photo_style = ($picture) ? " style='background-image:url(".$picture['url'].")'":"";
        $bio = get_field('bio');
        $spammed = antispambot($email);
        $title = get_the_title();
        $dashedTitle = sanitize_title_with_dashes($title); 
        $id = get_the_ID();
        ?>
        <div class="staff-card">
          <div class="card">
            <a data-fancybox="dialog" data-src="#dialog-content-<?php echo $id?>" href="javascript:void(0)" class="pop">
              <figure class="<?php echo ($picture) ? 'has-image':'no-image'; ?>"<?php echo $photo_style ?>>
                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/profile.png" alt="">
              </figure>
              <h3 class="staffname"><?php the_title(); ?></h3>
              <h4 class="stafftitle"><?php echo $pTitle; ?></h4>
            </a>
            <div class="email">
              <a href="mailto:<?php echo $spammed; ?>"><i class="fas fa-envelope fa-lg"></i></a>
            </div>
          </div>
        </div>
        <div id="#dialog-content-<?php echo $id?>" style="display:none;max-width:800px;">
          <div id="pop-<?php echo $dashedTitle; ?>" class="pop-bio">
          <div class="nav"></div>
          <div class="pop-wrap">
            <div class="pic"><img src="<?php echo $picture['url']; ?>" alt="<?php echo $picture['alt']; ?>"></div>
            <div class="bio">
              <h1><?php the_title(); ?></h1>
              <h2><?php echo $pTitle; ?></h2>
              <div class="email">
                <a href="<?php echo $spammed; ?>"><?php echo $spammed; ?></a>
              </div>
              <?php echo $bio; ?>
            </div>
          </div>
          </div>
        </div>
      <?php endwhile; ?>
      </div>
    </section>
    <?php } // End of the loop. 
      wp_reset_postdata();
      wp_reset_query();
    ?>

    <section class="dec-elders wrapper">
      <div class="inner">
      <?php while ( have_posts() ) : the_post();
        $eldersTitle = get_field('elders_title');
        $deaconsTitle = get_field('deacons_title');
        ?>
        <div class="area">
          <h2><?php echo $eldersTitle; ?></h2>
          <div class="colwrap">
            <?php if(have_rows('elders')) : ?>
              <?php while(have_rows('elders')) : the_row(); 
                  $catTitle = get_sub_field('category_title');
                  //$people = get_sub_field('category_title');
              ?>
                  <div class="col">
                    <h3><?php echo $catTitle; ?></h3>
                    <?php if(have_rows('people')) : ?>
                      <?php while(have_rows('people')) : the_row(); 
                          $eldName = get_sub_field('elder_name');
                          $elEmail = get_sub_field('email');
                          $elEmail = antispambot($elEmail);
                      ?>
                    <div class="eldname">
                      <?php if( $elEmail ) {echo '<a href="mailto:'.$elEmail.'">';} ?>
                        <?php echo $eldName; ?>
                      <?php if( $elEmail ) {echo '</a>';} ?>
                    </div>

                    <?php endwhile; ?>
                    <?php endif; ?> 
                  </div>
            <?php endwhile; ?>
          <?php endif; ?>
          </div> 
        </div>

        <div class="area">
          <h2><?php echo $deaconsTitle; ?></h2>
          <div class="colwrap">
            <?php if(have_rows('deacons')) : ?>
              <?php while(have_rows('deacons')) : the_row(); 
                  $catTitle = get_sub_field('category_title');
                  //$people = get_sub_field('category_title');
              ?>
                  <div class="col">
                    <h3><?php echo $catTitle; ?></h3>
                    <?php if(have_rows('people')) : ?>
                      <?php while(have_rows('people')) : the_row(); 
                          $decName = get_sub_field('deacon_name');
                          $decEmail = get_sub_field('email');
                          $decEmail = antispambot($decEmail);
                      ?>
                    <div class="eldname">
                      <?php if( $decEmail ) {echo '<a href="mailto:'.$decEmail.'">';} ?>
                        <?php echo $decName; ?>
                      <?php if( $decEmail ) {echo '</a>';} ?>
                    </div>

                    <?php endwhile; ?>
                    <?php endif; ?> 
                  </div>
            <?php endwhile; ?>
          <?php endif; ?>
          </div>
        </div>
      <?php endwhile; // End of the loop. ?>
      </div>
    </section>


	</main>
</div>
<?php
get_footer();
