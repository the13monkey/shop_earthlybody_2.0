<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
    <?php 
        $page_title = wp_title( '', false ); 
        $site_title = get_bloginfo( 'title' );
        if ( !empty ( $page_title ) ) {
            $title_output = $page_title; 
        } else {
            $title_output = $site_title; 
        }
        echo $title_output; 
    ?>
    </title>
    
    <?php wp_head(); ?>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137898394-4"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-137898394-4');
	</script>
	
	<!-- Global site tag (gtag.js) - Google Ads: 778357835 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-778357835"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'AW-778357835');
	</script>
	
	<meta name="google-site-verification" content="eWq0tjK7MxSO0bs64lBy7aCOpVv_xFk2H6BzpcjkY38" /> 
	
</head>

<body <?php body_class(); ?>>
	
	<div class="container-fluid text-center">
		
		<div class="row justify-content-center py-3" style="background: #c00001; color: #fff;">
			Free Shipping for Orders Over $30 | Only valid for the continental United States.
		</div>
		
		<div class="row justify-content-center mt-3">
			<a href="https://shop.earthlybody.com/hemp/">
				<img src="<?php echo get_template_directory_uri() ?>/img/site/eb_logo_brown.svg" alt="Shop Earthly Body" width="auto" height="80" />
			</a>
		</div>
		
	</div>