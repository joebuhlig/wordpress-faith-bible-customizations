<?php
/**
 * @package FBC
 */
/*
Plugin Name: Faith Bible Customizations
Plugin URI: https://github.com/joebuhlig/faith-bible-customizations
Version: 0.2
Author: Joe Buhlig
Author URI: http://joebuhlig.com
GitHub Plugin URI: https://github.com/joebuhlig/faith-bible-customizations
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: faith-bible-plugin
*/

add_action( 'widgets_init', function(){
     register_widget( 'Home_Title_Widget' );
}); 

class Home_Title_Widget extends WP_Widget {
  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'Home_Title_Widget', // Base ID
      __('Home Title Widget', 'text_domain'), // Name
      array('description' => __( 'Adds text on top of home hero image.', 'text_domain' ),) // Args
    );
  }
  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
        
    if ( array_key_exists('before_widget', $args) ) echo $args['before_widget'];
    
      echo '<div class="home-title-large">' . $instance[ 'home_title_large' ] . '</div>';
      echo '<div class="home-title-subtext">' . $instance[ 'home_title_subtext' ] . '</div>';
      echo '<div class="home-title-button"><a href="' . $instance[ 'home_title_button_link' ] . '">' . $instance[ 'home_title_button' ] . '</a></div>';
      echo '<div class="home-title-footer">' . $instance[ 'home_title_footer' ] . '</div>';
      
    if ( array_key_exists('after_widget', $args) ) echo $args['after_widget'];
  }
  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    
    if ( isset( $instance[ 'home_title_large' ] ) ) {
      $home_title_large = $instance[ 'home_title_large' ];
    }
    else {
      $home_title_large = "";
    }

    if ( isset( $instance[ 'home_title_subtext' ] ) ) {
      $home_title_subtext = $instance[ 'home_title_subtext' ];
    }
    else {
      $home_title_subtext = "";
    }

    if ( isset( $instance[ 'home_title_button' ] ) ) {
      $home_title_button = $instance[ 'home_title_button' ];
    }
    else {
      $home_title_button = "";
    }

    if ( isset( $instance[ 'home_title_button_link' ] ) ) {
      $home_title_button_link = $instance[ 'home_title_button_link' ];
    }
    else {
      $home_title_button_link = "";
    } 

    if ( isset( $instance[ 'home_title_footer' ] ) ) {
      $home_title_footer = $instance[ 'home_title_footer' ];
    }
    else {
      $home_title_footer = "";
    }
    ?>
    
    <p>
      <label for="<?php echo $this->get_field_id( 'home_title_large' ); ?>"><?php _e( 'Home Title Large:' ); ?></label> 
      
      <input id="<?php echo $this->get_field_id( 'home_title_large' ); ?>" type="text" name="<?php echo $this->get_field_name( 'home_title_large' ); ?>" value="<?php echo $instance[ 'home_title_large' ] ?>"><br>

      <label for="<?php echo $this->get_field_id( 'home_title_subtext' ); ?>"><?php _e( 'Home Title Subtext:' ); ?></label> 
      
      <input id="<?php echo $this->get_field_id( 'home_title_subtext' ); ?>" type="text" name="<?php echo $this->get_field_name( 'home_title_subtext' ); ?>" value="<?php echo $instance[ 'home_title_subtext' ] ?>"><br>

      <label for="<?php echo $this->get_field_id( 'home_title_button' ); ?>"><?php _e( 'Home Title Button:' ); ?></label> 
      
      <input id="<?php echo $this->get_field_id( 'home_title_button' ); ?>" type="text" name="<?php echo $this->get_field_name( 'home_title_button' ); ?>" value="<?php echo $instance[ 'home_title_button' ] ?>"><br>

      <label for="<?php echo $this->get_field_id( 'home_title_button_link' ); ?>"><?php _e( 'Home Title Button Link:' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'home_title_button_link' ); ?>" type="text" name="<?php echo $this->get_field_name( 'home_title_button_link' ); ?>" value="<?php echo $instance[ 'home_title_button_link' ] ?>"><br>

      <label for="<?php echo $this->get_field_id( 'home_title_footer' ); ?>"><?php _e( 'Home Title Footer:' ); ?></label> 
      
      <input id="<?php echo $this->get_field_id( 'home_title_footer' ); ?>" type="text" name="<?php echo $this->get_field_name( 'home_title_footer' ); ?>" value="<?php echo $instance[ 'home_title_footer' ] ?>">
    </p>
    <?php 
  }
  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    
    $instance = array();
    $instance['home_title_large'] = ( ! empty( $new_instance['home_title_large'] ) ) ? strip_tags( $new_instance['home_title_large'] ) : '';
    $instance['home_title_subtext'] = ( ! empty( $new_instance['home_title_subtext'] ) ) ? strip_tags( $new_instance['home_title_subtext'] ) : '';
    $instance['home_title_button'] = ( ! empty( $new_instance['home_title_button'] ) ) ? strip_tags( $new_instance['home_title_button'] ) : '';
    $instance['home_title_button_link'] = ( ! empty( $new_instance['home_title_button_link'] ) ) ? strip_tags( $new_instance['home_title_button_link'] ) : '';
    $instance['home_title_footer'] = ( ! empty( $new_instance['home_title_footer'] ) ) ? strip_tags( $new_instance['home_title_footer'] ) : '';
    return $instance;
  }
} // class My_Widget


// XXXXXXXXXX Homepage Tiles Widget
function fbc_load_tile_widget() {
    register_widget( 'fbc_homepage_tile_widget' );
}
add_action( 'widgets_init', 'fbc_load_tile_widget' );
 
// Creating the widget 
class fbc_homepage_tile_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'fbc_homepage_tile_widget', 
 
// Widget name will appear in UI
__('Homepage Tile Widget', 'fbc_homepage_tile_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Widget for displaying tiles.', 'fbc_homepage_tile_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$text = apply_filters( 'widget_text', $instance[ 'text' ] );
$url = apply_filters( 'widget_url', $instance[ 'url' ] );
$image = apply_filters( 'widget_image', $instance[ 'image' ] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
 
// This is where you run the code and display the output
echo __( '<div class="homepage-tile"><a href="' . $url . '"><img src="' . $image . '" /><span>' . $text . '</span></a></div>', 'fbc_homepage_tile_widget_domain' );
echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'text' ] ) ) {
$text = $instance[ 'text' ];
}
else {
$text = __( '', 'fbc_homepage_tile_widget_domain' );
}

if ( isset( $instance[ 'url' ] ) ) {
$url = $instance[ 'url' ];
}
else {
$url = __( '/', 'fbc_homepage_tile_widget_domain' );
}

if ( isset( $instance[ 'image' ] ) ) {
$image = $instance[ 'image' ];
}
else {
$image = __( '', 'fbc_homepage_tile_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'URL:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>" />
</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance[ 'text' ] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance[ 'text' ] ) : '';
$instance[ 'url' ] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance[ 'url' ] ) : '';
$instance[ 'image' ] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance[ 'image' ] ) : '';
return $instance;
}
} // Class fbc_homepage_tile_widget ends here
?>