<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- <meta name="viewport" content="width=768px"> -->
	<title>portfolio</title>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/script.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/jquery.sidr.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/footerFixed.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('stylesheet_url'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/jquery.sidr.dark.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,300italic,400' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="modal-overlay"></div>

<?php
    $nowCatId = (empty($_GET['cat'])) ? 'null' : $_GET['cat'];//カテゴリ選択されてなかったらnull
?>
<script type="text/javascript">

var now_post_num = 6;
var get_post_num = 6;
var get_cat_num = <?php echo $nowCatId ;?>;


$(function() {
    $("#loading_image").hide();
    $(document).on("click",".more_link",function() {
	    $("#loading_image").show();
        $(".more").hide();
        $.ajax({
            type: 'post',
            url: '<?php echo get_stylesheet_directory_uri(); ?>/more-disp.php',
            data: {
                'now_post_num': now_post_num,
                'get_post_num': get_post_num,
                'get_cat_num': get_cat_num,
            },
            success: function(data) {
                now_post_num = now_post_num + get_post_num;
                $(".products").append(data);
                $("#loading_image").hide();
                $("#more_disp").remove();
                if (data.length > 6) {
                    $(".more").show();
                    $("#loadDisp").append('<div id="more_disp"><a class="more_link" href="#"><img class="more" src="<?php bloginfo("template_directory"); ?>/images/more.png" /></a></div>');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
	            console.log("XMLHttpRequest : " + XMLHttpRequest.status);
	            console.log("textStatus : " + textStatus);
	            console.log("errorThrown : " + errorThrown.message);
         	}
        });
        return false;
    });
});

</script>
    <div id="sidr">
      <ul>
        <li><a href="./">HOME</a></li>
        <?php $categories = get_categories();
        foreach($categories as $category):?>
        <li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->cat_name; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <script>
    $(document).ready(function() {
      $('#simple-menu').sidr();
    });
    </script>

    <header>
        <div id="red_zone"></div>
        <div id="black_zone">
            <div id="black_zone_contents">
                <div id="member">
                </div>
                <a href="./">
                <img class="topScrpll" src="<?php bloginfo('template_directory'); ?>/images/traiangle1.png" height="70px" />
                </a>
                <div id="user">
                    <a id="simple-menu" href="#sidr"><img id="tri_btn" src="<?php bloginfo('template_directory'); ?>/images/drower.png"/></a>

                    <div id="userBoxSize">
                        <div id="selectList">CategorySelect<img id="tri_btn" src="<?php bloginfo('template_directory'); ?>/images/tri_btn.png" height="12.5px" /></div>
                        <ul id="user_list">
                            <?php $categories = get_categories();
                                foreach($categories as $category):?>
                            <li id="user_name" ><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->cat_name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php if(is_home()): ?>
        <form method="get" class="searchform" action="<?php echo home_url('/'); ?>">
          <div>
            <label>検索:</label>
            <input type="text" name="s" />
            <input type="submit" value="" />
          </div>
        </form>
    <?php endif;?>
<div>
    </header>