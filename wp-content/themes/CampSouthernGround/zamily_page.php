<?php
/*
  Template Name: Zamily Donate Page
*/
?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <title>Camp Southern Ground</title>

  <meta name="description" content="Page description. No longer than 155 characters." />



  <!-- Twitter Card data -->

  <meta name="twitter:card" content="summary">

  <meta name="twitter:site" content="@publisher_handle">

  <meta name="twitter:title" content="Page Title">

  <meta name="twitter:description" content="Page description less than 200 characters">

  <meta name="twitter:creator" content="@author_handle">

  <!-- Twitter Summary card images must be at least 200x200px -->

  <meta name="twitter:image" content="http://www.example.com/image.jpg">



  <!-- Open Graph data -->

  <meta property="og:title" content="Title Here" />

  <meta property="og:type" content="article" />

  <meta property="og:url" content="http://www.example.com/" />

  <meta property="og:image" content="http://example.com/image.jpg" />

  <meta property="og:description" content="Description Here" />

  <meta property="og:site_name" content="Site Name, i.e. Moz" />



  <!-- styles -->

  <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">



  <!-- JS -->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>

  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.js"></script>

  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.modal.min.js"></script>

  <script type="text/javascript">var switchTo5x=true;</script>

  <script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>

  <script type="text/javascript">stLight.options({ onhover: false, publisher: "d77d5a6e-b82d-47c6-a7df-dbb732c20b77", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script><!-- HTML5 shim, for IE6-8 support of HTML5 elements -->



  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <!--[if lt IE 9]>

    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

  <![endif]-->

<?php wp_head(); ?>

<meta name="google-site-verification" content="C1zn6qrNlhMg-Msd0JGM1eRatfw7MAQfhjPaCScarH0" />

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-54746522-4', 'auto');

ga('require', 'displayfeatures');

  ga('send', 'pageview');



</script>

</head>

<body>

  <header>

    <div class="header_top_wrap">

      <div class="header_top container">

        <div class="pull-right social_media_links">

          <a target="_blank" href="http://postcardsfromcamp.tumblr.com/" class="social_media_link tumblr"></a>

          <a target="_blank" href="https://www.facebook.com/campsouthernground" class="social_media_link facebook"></a>

          <a target="_blank" href="https://twitter.com/campsoutherngrd" class="social_media_link twitter"></a>

          <a target="_blank" href="https://www.youtube.com/user/CampSouthernGround" class="social_media_link youtube"></a>

        </div>

      </div>

    </div>



    <div class="header_content_wrap" style="background-image: url(<?php the_field('hero_image', get_page_by_title( 'Home' )->ID); ?>)">

      <div class="header_content container">

        <a href="<?php echo home_url(); ?>" class="header_home_link"></a>

        <p class="header_blurb">
          <?php the_field('tagline', get_page_by_title( 'Home' )->ID); ?>
        </p>

      </div>

    </div>


  </header>

<div class="page camp">
  <div class="page_top_wrap donate_top" style="background-size:cover;">
    <div style="padding-top:40px"></div>
    <div class="container">
      <div class="row">
        <div class="col-xs-7 page_content">
          <p style="margin-top:0; margin-bottom:20px;">
            <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/zamilyHeader.png" />
          </p>
          <p style="font-size:14px; font-family:'Open Sans'; line-height:17px;">
            Welcome Zamily!
            <br/>
            <br/>
            We are honored that you have chosen to direct your fundraising efforts toward this special project - the Zamily Gathering Place at Camp Southern Ground.
            As you know, the Zamily Gathering Place will be a dedicated area located inside the camp gates and just off Camp Southern Ground Parkway. Our landscape architects are working hard to bring Zac’s creative vision and direction to life, which includes not only beautiful flowers and landscaping, but also custom seating and signage recognizing your ongoing dedication and commitment to Zac’s passion project.
            <br/>
            <br/>
            Our goal is to reach $100,000 to fund this special area.  However, we realize the tour has already started, and if you have already held your gathering or fundraiser during the first shows of the ZBB tour, please know that any monies raised can be allocated toward this project if you wish.
            <br/>
            <br/>
            Please use either of the links below to forward your donation via Acceptiva (Major Credit Cards) or PayPal.
            <br/>
            <br/>
            Checks can be mailed to our office at:
            <br/>
            Camp Southern Ground
            <br/>
            101 Gardner Park
            <br/>
            Peachtree City, GA  30269
            <br/>
            <br/>
            *On all contributions, please be sure to note Zamily Gathering Place in the comment section*
            <br/>
            <br/>
            Zamily, we recognize and appreciate your passion for Camp Southern Ground— your ongoing support means the world to Zac—and to the Camp Southern Ground team!
            <br/>
            <br/>
            <a href="https://secure.acceptiva.com/?cst=30b1ed">
              <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/incomm_acceptiva.png" />
            </a>

        </p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick"/>
          <input type="hidden" name="hosted_button_id" value="64RD75PQCV9H6"/>
          <input style="width:100%" type="image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/incomm_paypal.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"/>
        </form>
        <p style="font-size:14px; font-family:'Open Sans'; line-height:17px;">
            <b>Thank you</b> for helping us <em>Create Unforgettable Outdoor Experiences for Children of All Abilities!</em>
          </p>
        </div>
        <div class="col-xs-5 page_sidebar" style="padding-left:30px;">
          <img style="width:100%; margin-top: 40px;" src="<?php echo get_stylesheet_directory_uri(); ?>/img/zamily1.png" />
          <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/zamily2.png" />
          <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/zamily3.png" />
          <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/zamily4.png" />
        </div>
      </div>
    </div>
  </div>
</div>

  <footer>
    <div class="footer_nav_wrap" style="padding-top: 35px;">
      <a style="font-family:'Josefin Slab'; font-weight:bold; font-size:18px;" href="<?php echo home_url(); ?>">CAMPSOUTHERNGROUND.ORG</a>
    </div>
  </footer>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/placeholders.js"></script>
<?php wp_footer(); ?>
</body>
</html>
