<?php
/*
  Template Name: ZBB Farm Party Donate Page
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
  <div class="page_top_wrap donate_top" style="background-size: cover;">
    <div style="padding-top:70px"></div>
    <div class="container">
      <div class="row">
        <div class="col-xs-7 page_content">
          <p style="margin-top:0; margin-bottom:20px;">
            <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/zbbfarmpartyHeader.png" />
          </p>
          <p style="font-size:14px; font-family:'Open Sans'; line-height:17px;">
            We appreciate your generous support of Camp Southern Ground.
            <br/>
            <br/>
Camp Southern Ground is a year-round camp and conference center designed to create unforgettable outdoor experiences for children of all abilities. In the summer, there will be nine weeks of “sleep-away” camp designed to educate and inspire children of diverse abilities with a special focus on children with Autism, ADD/ADHD and other neurobehavioral challenges. These uniquely gifted children will be fully-integrated with typically developing children from all socio-economic, racial, and religious backgrounds. Year-round programming will include family camps, respite weekends, team building and research and development on the autism spectrum.            <br/>
            <br/>
            <b>
              <a style="text-decoration:underline" href="<?php echo home_url(); ?>">Click here</a> to learn more, tour the camp, and see the exciting plans that are currently underway.
            </b>
            <br/>
            <br/>

            <a href=" https://secure.acceptiva.com/?cst=7d5e67">
              <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/incomm_acceptiva.png" />
            </a>

        </p>
        <p style="font-size:14px; font-family:'Open Sans'; line-height:17px;">
            <b>Thank you</b> for helping us <em>Create Unforgettable Outdoor Experiences for Children of All Abilities!</em>
            <br/>
            <br/>
            Sincerely,
            <br/>
            Michael, Gigi and Zac Brown
          </p>
        </div>
        <div class="col-xs-5 page_sidebar" style="padding-left:30px;">
          <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/zbbfarmparty1.png" />
          <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/zbbfarmparty2.png" />
          <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/zbbfarmparty3.png" />
          <img style="width:100%" src="<?php echo get_stylesheet_directory_uri(); ?>/img/zbbfarmparty4.png" />
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