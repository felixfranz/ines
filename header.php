<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/favicon.svg">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

        <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>


	</head>

	<body <?php body_class(); ?> >

		<a class="nav_toggle" href="#"> 
			<span></span>
		</a>


		<div class="nav_container_mobile">
			<div class="nav_content">
	
					<nav role="navigation" >

						<?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
    					         'menu_class' => 'nav mobile-nav',               // adding custom nav class
    					         'theme_location' => 'main-nav',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			               'after' => '',                                  // after the menu
        			               'link_before' => '',                            // before each link
        			               'link_after' => '',                             // after each link
        			               'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>

					</nav>
					
			</div>
		</div>

		<div id="container">

			<header class="header" id="header">

				<div id="inner-header" class="cf wrap">
					
					<div id="logo" >
						<a href="<?php echo home_url(); ?>">
							<span class="logo__name">Ines Moers</span>
							<span class="logo__subline">Projektmanagment</span>
						</a>
					</div>
					
					<div class="nav_container_desktop">

						<nav role="navigation" >
						<?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					         'theme_location' => 'main-nav',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			               'after' => '',                                  // after the menu
        			               'link_before' => '',                            // before each link
        			               'link_after' => '',                             // after each link
        			               'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>

						</nav>
						
					</div>
				

				</div>

			</header>


