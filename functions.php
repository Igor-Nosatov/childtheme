<?php
if (!is_admin()) {

	// Загружаем CSS
	add_action('wp_enqueue_scripts', 'twbs_load_styles', 11);
	function twbs_load_styles() {
		// Bootstrap
		wp_register_style('bootstrap-styles', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css', array(), null, 'all');
		wp_enqueue_style('bootstrap-styles');
		// Theme Styles
		wp_register_style('theme-styles', get_stylesheet_uri(), array(), null, 'all');
		wp_enqueue_style('theme-styles');
		// Font Awesome
		wp_register_style('font-awesome', '//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css', array(), null, 'all');
		wp_enqueue_style('font-awesome');
	}

	// Загружаем Javascript
	add_action('wp_enqueue_scripts', 'twbs_load_scripts', 12);
	function twbs_load_scripts() {
		// jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), null, false);
		wp_enqueue_script('jquery');
		// Bootstrap
		wp_register_script('bootstrap-scripts', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array('jquery'), null, true);
		wp_enqueue_script('bootstrap-scripts');
	}

}


/*
	==========================================
	 Посты фильмов
	==========================================
*/


function awesome_custom_post_type (){

	$labels = array(
		'name' => 'Фильмы',
		'singular_name' => 'Фильм',
		'add_new' => 'Добавить Фильм',
		'all_items' => 'Все Фильмы',
		'add_new_item' => 'Добавить Фильм',
		'edit_item' => 'Редактировать Фильм',
		'new_item' => 'Новый Фильм',
		'view_item' => 'Просмотреть Фильмы',
		'search_item' => 'Поиск Фильмов',
		'not_found' => 'Нету данных фильмов',
		'not_found_in_trash' => 'Нету данных фильмов в корзине',
		'parent_item_colon' => 'Общее'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'custom-fields',

		),
		//'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('film',$args);
}
add_action('init','awesome_custom_post_type');

/*
	==========================================
	 Жанры, Страны, Год и Актеры - Таксономия
	==========================================
*/

function genres_custom_taxonomies() {

	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Жанры',
		'singular_name' => 'Жанр',
		'search_items' => 'Поиск Жанров',
		'all_items' => 'Все Жанры',
		'parent_item' => 'Родительское поле',
		'parent_item_colon' => 'Родительское поле:',
		'edit_item' => 'Редактировать Жанр',
		'update_item' => 'Обновить Жанр',
		'add_new_item' => 'Добавить новое рабочее поле',
		'new_item_name' => 'Имя нового поля',
		'menu_name' => 'Жанры'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'genre' )
	);

	register_taxonomy('genre', array('film'), $args);

}

add_action( 'init' , 'genres_custom_taxonomies' );


function country_custom_taxonomies() {

	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Страны',
		'singular_name' => 'Страна',
		'search_items' => 'Поиск Стран',
		'all_items' => 'Все Страны',
		'parent_item' => 'Родительское поле',
		'parent_item_colon' => 'Родительское поле:',
		'edit_item' => 'Редактирование Страны',
		'update_item' => 'Обновить Страны',
		'add_new_item' => 'Добавить новое рабочее поле',
		'new_item_name' => 'Имя нового поля',
		'menu_name' => 'Страны'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'country' )
	);

	register_taxonomy('country', array('film'), $args);

}

add_action( 'init' , 'country_custom_taxonomies' );


function years_custom_taxonomies() {

	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Год',
		'singular_name' => 'Год',
		'search_items' => 'Поиск по годам',
		'all_items' => 'Все года',
		'parent_item' => 'Родительское поле',
		'parent_item_colon' => 'Родительское поле:',
		'edit_item' => 'Редактирование',
		'update_item' => 'Обновить',
		'add_new_item' => 'Добавить новое рабочее поле',
		'new_item_name' => 'Имя нового поля',
		'menu_name' => 'Год'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'years' )
	);

	register_taxonomy('years', array('film'), $args);

}

add_action( 'init' , 'years_custom_taxonomies' );





function actors_custom_taxonomies() {

	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Актёры',
		'singular_name' => 'Актёр',
		'search_items' => 'Поиск актёров',
		'all_items' => 'Все актёры',
		'parent_item' => 'Родительское поле',
		'parent_item_colon' => 'Родительское поле:',
		'edit_item' => 'Редактирование',
		'update_item' => 'Обновить',
		'add_new_item' => 'Добавить новое рабочее поле',
		'new_item_name' => 'Имя нового поля',
		'menu_name' => 'Актеры'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'actors' )
	);

	register_taxonomy('actors', array('film'), $args);

}

add_action( 'init' , 'actors_custom_taxonomies' );





function film_posts_shortcode($atts, $content = NULL)
{
    $atts = shortcode_atts(
        [   'post_type' => 'film',
            'orderby' => 'date',
            'posts_per_page' => '5'
        ], $atts, 'latest-posts' );

    $query = new WP_Query( $atts );

    $output = '<ul class="latest-posts">';

    while($query->have_posts()) : $query->the_post();

        $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a> - <small>' . get_the_date() . '</small></li>';






    endwhile;

    wp_reset_query();

    return $output . '</ul>';
}
add_shortcode('latest-posts', 'film_posts_shortcode');


?>
