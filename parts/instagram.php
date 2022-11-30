<?php if( is_home() || is_front_page() ) { 
$setup = get_instagram_setup();
  echo "<pre>";
  print_r($setup);
  echo "</pre>";
    if($setup) {
        $num_photos = ($setup['sb_instagram_num']) ? $setup['sb_instagram_num'] : 4;
        $follow_btn_text = $setup['sb_instagram_follow_btn_text'];
        $opt = $setup['connected_accounts'];
        $instaData = array();
        if($opt) {
            foreach($opt as $insta_id => $data) {
                $instaData = $data;
            }
        }
        $instagram_access_token = ( isset($instaData['access_token']) && $instaData['access_token'] ) ? $instaData['access_token'] : '';
        $instagram_username = ( isset($instaData['username']) && $instaData['username'] ) ? $instaData['username'] : '';
        $instagram_user_id = ( isset($instaData['user_id']) && $instaData['user_id'] ) ? $instaData['user_id'] : '';
        $instagram_link = 'https://www.instagram.com/'.$instagram_username.'/';
        $clean_token = preg_replace("/[^a-zA-Z0-9\.]+/", "", sbi_maybe_clean( $instagram_access_token ) );
        $split_token = explode( '.', $clean_token );
        $uid = $split_token[0];
    ?>
    <script type="text/javascript">
        var insta_u_id = '<?php echo $instagram_user_id; ?>';
        var insta_token = '<?php echo $clean_token; ?>';
        var section_title = 'Instagram';
        var instagram_link = '<?php echo $instagram_link; ?>';
        var follow_btn_text = '<?php echo $follow_btn_text; ?>';
        jQuery(document).ready(function ($) {
            /* ==== INSTAGRAM POSTS ==== */
            if(insta_u_id && insta_token) {
                var token = insta_token,
                userid = insta_u_id, // User ID - get it in source HTML of your Instagram profile or look at the next example :)
                num_photos = 4; // how much photos do you want to get
                var api_call = 'https://api.instagram.com/v1/users/'+userid+'/media/recent?access_token=' + token;
                //var api_call = 'https://api.instagram.com/v1/users/' + userid + '/media/recent';
                $.ajax({
                    url: api_call, // or /users/self/media/recent for Sandbox
                    dataType: 'jsonp',
                    type: 'GET',
                    data: {access_token: token, count: num_photos},
                    success: function(response){
                        if(response.data!=undefined) {
                            var obj = response.data;
                            var content = '<section class="section instagram-feeds-section"><div class="mid_wrapper">';
                                content += '<h2 class="section-title text-center">'+section_title+'</h2>';
                                content += '<div class="flex-container row clear">';
                                $(obj).each(function(k,v){
                                    var img = v.images;
                                    var img_src = img.standard_resolution.url;
                                    var caption = v.caption.text;
                                    var caption_excerpt = stringTruncate(caption,150);
                                    var instalink = v.link;
                                    content += '<div class="col col-4"><div class="instagram-image-div clear"><a class="instalink" href="'+instalink+'" target="_blank"><img src="'+img_src+'" alt="" />';
                                        content += '<span class="icon"><i class="fas fa-chevron-circle-right"></i></span>';
                                    if(caption) {
                                        content += '<span class="caption"><span class="txtwrap">'+caption_excerpt+'</span></span>';
                                    }
                                    content += '</a></div></div>';
                                });
                                content += '</div>';
                                if(instagram_link) {
                                    content += '<div class="buttondiv clear"><a class="btn" href="'+instagram_link+'" target="_blank">'+follow_btn_text+'</a></div>';
                                }
                                content += '</div></section>';
                                $("#instagram_feeds").html(content);
                        }  
                    },
                    error: function(data){
                    }
                });
            }

            var stringTruncate = function(str, length){
              var dots = str.length > length ? '...' : '';
              return str.substring(0, length)+dots;
            };
        });
    </script>
    <?php }  
}
?>