<?php 

get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">
        <?php 
        the_archive_title();
        ?>
      </h1>
      <div class="page-banner__intro">
        <?php the_archive_description(); ?>
      </div>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">
  <?php 
  $archivepageEvents = new WP_Query(array(
    "posts_per_page" => 10,
    "post_type" => "event"
  ));
  
    while($archivepageEvents->have_posts()) {
      $archivepageEvents->the_post();
     ?>
    <div class="event-summary">
      <a class="event-summary__date t-center" href="<?php the_permalink();?>">
        <span class="event-summary__month"><?php the_time('M') ?></span>
        <span class="event-summary__day"><?php the_time('d') ?></span>
      </a>
      <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny">
          <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
        </h5>
        <p><?php echo wp_trim_words(get_the_content(), 18) ?> 
        <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
      </div>
    </div>


  <?php }  ?>

  <?php ?>
</div>


<?php get_footer();

?>