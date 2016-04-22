<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/types.php' // Custom Post Types
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * Allow SVG upload
 */
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
  // add the file extension to the array
  $existing_mimes['svg'] = 'mime/type';
  // call the modified list of extensions
  return $existing_mimes;
}

/**
 * Required Plugins
 */
add_action('admin_notices', 'showAdminMessages');
function showAdminMessages() {
  $plugin_messages = array();
  $required_plugins = array();

  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

  $required_plugins[] = (object) array(
    'name' => 'WPCustom Category Image',
    'plugin_path' => 'wpcustom-category-image/load.php',
    'url' => 'https://wordpress.org/plugins/wpcustom-category-image/',
    'required' => false
  );

  $required_plugins[] = (object) array(
    'name' => 'Custom Post Type UI ',
    'plugin_path' => 'custom-post-type-ui/custom-post-type-ui.php',
    'url' => 'https://wordpress.org/plugins/custom-post-type-ui/',
    'required' => false
  );

   $required_plugins[] = (object) array(
    'name' => 'Advanced Custom Fields Pro',
    'plugin_path' => 'advanced-custom-fields-pro/acf.php',
    'url' => 'https://www.advancedcustomfields.com',
    'required' => true
  );

   $required_plugins[] = (object) array(
    'name' => 'Simple Photoswipe',
    'plugin_path' => 'simple-photoswipe/simple-photoswipe.php',
    'url' => 'https://wordpress.org/plugins/simple-photoswipe/',
    'required' => false
  );



  if(count($required_plugins) > 0) {
    foreach ($required_plugins as $plugin) {
      if($plugin->required == true && !is_plugin_active( $plugin->plugin_path )) {
        $plugin_messages[] = 'This theme requires you to install the ' . $plugin->name . ' plugin, <a href="' . $plugin->url . '">download it from here</a>.';
      }
    }
  }

  if(count($plugin_messages) > 0) {
    echo '<div id="message" class="error">';
      foreach($plugin_messages as $message) {
        echo '<p><strong>'.$message.'</strong></p>';
      }
    echo '</div>';
  }
}

/**
 * Disable Adminbar
 */
add_filter( 'show_admin_bar' , 'my_function_admin_bar');
function my_function_admin_bar(){
  return false;
}

/**
 * Default image has no link
 */
update_option('image_default_link_type','none');


