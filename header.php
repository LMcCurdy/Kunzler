<?php 
	$device = wp_is_mobile() ? 'mobile' : 'computer';
?><!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      <?php
        if(!is_home()):
          wp_title('|',true,'right');
        endif;
      ?>
    </title>
    
	<meta name="HandheldFriendly" content="True" />
	<meta name="MobileOptimized" content="320" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!--[if lt IE 9]>
    	<script src="<?php bloginfo('template_url'); ?>/js/html5-3.6-respond-1.1.0.min.js"></script>
    <![endif]-->
    
	<script type="text/javascript">
		var device = "<?=$device;?>";
	</script>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div>
	
		<nav id="mmenu" class="mmenu">
			<?php wp_nav_menu(array('theme_location' => 'mobilemenu', 'container' => false)); ?>
		</nav>
		
		<header class="group">
			<div id="top-tier" >
				<div class="wrap">
					<?php get_search_form(); ?>
					<?php wp_nav_menu(array('theme_location' => 'toptier', 'container' => false)); ?>
				</div>
			</div>	 
			<nav class="wrap group">
				<div class="mmenu-wrap">
					<a href="#mmenu" class="mmenu-trigger"></a>
					<div class="logo"></div>
				</div>
				<?php wp_nav_menu(array('theme_location' => 'mainmenu', 'container' => false)); ?>
			</nav>
		</header>
