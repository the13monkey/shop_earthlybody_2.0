<?php 
	
	if ( is_page( array( 'Hemp Products', 'Intensive Cream Triple Strength 8oz', 'Intensive Cream Triple Strength 1.7oz', 'Hemp Nature Fix Kit' ) ) ) {
		
		get_header('hemp');
		
		if(have_posts()) : while(have_posts()) : the_post();
			the_content();
		endwhile; else: endif; 
		
		get_footer('hemp');
		
	} else {
		
		get_header(); 
		get_header('home');
    
		if(have_posts()) : while(have_posts()) : the_post();
			the_content();
		endwhile; else: endif; 
    
    	get_footer(); 
		
	}

    