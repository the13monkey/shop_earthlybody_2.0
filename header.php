<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- All tracking codes added through functions.php --> 

    <title>

        <?php 

            if ( is_front_page() ) {

                echo get_bloginfo( 'name' );

            } else {

                echo get_the_title().' | '.get_bloginfo( 'name' );  

            }

        ?>

    </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

    <?php 
   
        if ( is_front_page() ) {

            get_template_part( 'headers/header', 'general' );

        } else {

            $slugs = array(

                'cbd-daily-products',

                'hemp-seed-body-care',

                'emera-cbd-hair-care',

                'marrakesh-hair-care',

            );

            $url = $_SERVER['REQUEST_URI'];

            $url_parts = explode( '/', $url );

            foreach ( $slugs as $slug ) {

                if ( in_array( $slug, $url_parts ) ) {

                    get_template_part( 'headers/header', 'brand' );

                    return; 

                } 

            }

            get_template_part( 'headers/header', 'general' );

        }

    ?>

    
    
