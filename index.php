
<div class="row">
 <div class="col-md-12">
   <?php get_header(); ?>
 </div>



   <?php
 $args = array( 'post_type' => 'film', 'posts_per_page' => 10 );
   $loop = new WP_Query( $args );
   while ( $loop->have_posts() ) : $loop->the_post();
    echo '<div class="col-md-8">';
    echo '<br>';
    echo the_title('<h1 style="text-transform: uppercase">', '</h1>');
    echo '<br>';
    echo the_content();

    echo '</div>';
    echo '<div class="col-md-4">';
    echo ' <div style="margin-top:45px!important;"  class="panel panel-default">
            <div class="panel-body">
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>' ?>

<?php   echo get_the_term_list( $post->ID, 'genre', 'Жанр: ', '<li>', ' ', '</li>');?>

            <?php  echo ' </div>
            <div class="panel-body">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>' ?>

<?php echo get_the_term_list( $post->ID, 'country', 'Страна: ','<li>', ' ', '</li>' );?>
           <?php echo '</div>
         </div>';
   echo '</div>';




   echo '<div class="col-md-8">';
   echo '<br>';
   echo ' <span class="label label-default">';
   echo get_post_meta( get_the_ID(), 'Стоимость сеанса', true);
   echo '</span>';
   echo '<br>';
   echo '</div>';


  echo '<div class="col-md-4">';
  echo '<div id="time-change">';
  echo '<span class="glyphicon glyphicon-time" aria-hidden="true"></span>';
  echo get_post_meta( get_the_ID(), 'Дата выхода', true);
  echo '<br>';
  echo '</div>';
  echo '</div>';
   endwhile;
   ?>




 <div class="col-md-12">

    <?php get_footer(); ?>
 </div>
</div>
