<?php
/**
 * Template part for displaying posts
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="blogger">
    <?php if(get_theme_mod('iqra_education_blog_description') != 'Post Content'){ ?>
      <div class="post-image">
        <?php
          if ( ! is_single() ) {
            // If not a single post, highlight the video file.
            if ( ! empty( $video ) ) {
              foreach ( $video as $video_html ) {
                echo '<div class="entry-video">';
                  echo $video_html;
                echo '</div>';
              }
            };
          };
        ?>
      </div>
    <?php } ?>
    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html(the_title()); ?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h2>
    <?php if( get_theme_mod( 'iqra_education_date_hide',true) != '' || get_theme_mod( 'iqra_education_comment_hide',true) != '' || get_theme_mod( 'iqra_education_author_hide',true) != '') { ?>
      <div class="post-info">
        <?php if( get_theme_mod( 'iqra_education_date_hide',true) != '') { ?>
          <i class="fa fa-calendar"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
        <?php } ?>
        <?php if( get_theme_mod( 'iqra_education_author_hide',true) != '') { ?>
          <i class="fa fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php esc_html(the_author()); ?><span class="screen-reader-text"><?php esc_html(the_author()); ?></span></a></span>
        <?php } ?>
        <?php if( get_theme_mod( 'iqra_education_comment_hide',true) != '') { ?>
          <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','iqra-education'), __('0 Comments','iqra-education'), __('% Comments','iqra-education') ); ?></span>
        <?php } ?>
      </div>
    <?php }?>
    <?php if(get_theme_mod('iqra_education_blog_description') == 'Post Content'){ ?>
      <?php the_content(); ?>
    <?php }
    if(get_theme_mod('iqra_education_blog_description', 'Post Excerpt') == 'Post Excerpt'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="text"><p><?php $excerpt = get_the_excerpt(); echo esc_html( iqra_education_string_limit_words( $excerpt, esc_attr(get_theme_mod('iqra_education_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('iqra_education_post_excerpt_suffix','{...}') ); ?></p></div>
      <?php } ?>
    <?php }?>
    <?php if( get_theme_mod('iqra_education_button_text','READ MORE') != ''){ ?>
      <div class="post-link">
        <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_theme_mod('iqra_education_button_text','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('iqra_education_button_text','READ MORE'));?></span></a>
      </div>
    <?php } ?>
  </div>
</article>