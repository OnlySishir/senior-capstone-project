<?php       

function customproject_script()
{


	// stylesheets

	wp_enqueue_style('main_style',get_stylesheet_uri());
	wp_enqueue_style('boot1_file','https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
	wp_enqueue_style('boot2_file','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('boot3_file', get_template_directory_uri() . '/style/css/style.css');



	//script file
	wp_enqueue_script('boot4_file', 'https://code.jquery.com/jquery-3.3.1.slim.min.js',array(),1.1,true);
	wp_enqueue_script('boot5_file', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',array(),1.1,true);
	wp_enqueue_script('boot6_file', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',array(),1.1,true);
	
}

// action hook

add_action("wp_enqueue_scripts","customproject_script");


function register_customproject_theme()
{
//menu registor code

	register_nav_menus(
		array(
			'primary-menu' => _('Primary Menu'),
			'footer-menu' => _('Footer Menu')


		)

	);
	
}

//atach with  action hook 
add_action('init','register_customproject_theme');	








?>