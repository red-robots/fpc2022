<?php if( is_front_page() || is_home() ) { ?>
  <?php  if( $banners = get_field("banner") ) { 
    $count = count($banners); 
    $slideClass = ($count==1) ? 'static-slide':'slideshow';
    ?>
    <div id="home-slider" class="slider <?php echo $slideClass ?>">
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php foreach ($banners as $b) { ?>
            <?php if ($b['image']) { 
              $img = $b['image']; 
              $slideTitle = $b['title'];
              $slideText = $b['description'];
              $buttons = $b['buttons'];
            ?>
            <div class="swiper-slide">
              <div class="slide-image" style="background-image:url('<?php echo $img['url'] ?>')"></div>
              <?php if ($slideText || $slideTitle) { ?>
              <div class="slide-text animated">
                <div class="wrap">
                  <div class="inline">
                    <?php if ($slideTitle) { ?>
                     <h2 class="slideHeading"><?php echo $slideTitle ?></h2> 
                    <?php } ?>
                    <?php if ($slideText) { ?>
                     <div class="slideDetails"><?php echo $slideText ?></div> 
                    <?php } ?>
                    <?php if ($buttons) { ?>
                    <div class="buttons">
                      <?php foreach ($buttons as $b) { 
                        $btn = $b['button'];
                        if($btn['url'] && $btn['title']) {
                          $link = $btn['url'];
                          $title = $btn['title'];
                          $target = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self'; ?>
                          <a href="<?php echo $link ?>" target="<?php echo $target ?>" class="slideBtn"><span><?php echo $title ?></span></a> 
                        <?php } ?>
                      <?php } ?>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <?php } ?>
          <?php } ?>
        </div>
        
        <?php if ($count>1) { ?>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
        <?php } ?>
      </div>
    </div>
  <?php } ?>
<?php } ?>