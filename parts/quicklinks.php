<?php 
$quicklinks = array();
$icon[1] = '<i class="fa-solid fa-calendar-days"></i>';
$icon[2] = '<i class="fa-solid fa-user-plus"></i>';
$icon[3] = '<i class="fa-solid fa-newspaper"></i>';
$icon[4] = '<i class="fa-solid fa-phone-flip"></i>';
$icon[5] = '<i class="fa-solid fa-child-reaching"></i>';
$icon[6] = '<i class="fa-solid fa-leaf"></i>';

for( $i=1; $i<=6; $i++ ) { 
  $title = ($i==1) ? get_field('title','option') : get_field('title_'.$i,'option');
  $link = get_field('link_'.$i,'option');
  $link = ($link) ? $link : 'javascript:void(0)';
  if(preg_replace("/\s+/","",$title)) {
    $quicklinks[$i]['title'] = $title;
    $quicklinks[$i]['link'] = $link;
    $quicklinks[$i]['icon'] = $icon[$i];
  }
} 

if($quicklinks) { ?>
<div class="quick_links">
  <div class="widget-title">Quick Links</div>
  <div class="wrapper">
  <?php foreach ($quicklinks as $q) { ?>
    <div class="widget">
      <a href="<?php echo $q['link'] ?>">
        <span class="icon"><?php echo $q['icon'] ?></span>
        <span class="title"><?php echo $q['title'] ?></span>
      </a>
    </div>
  <?php } ?>
  </div>
</div>
<?php } ?>