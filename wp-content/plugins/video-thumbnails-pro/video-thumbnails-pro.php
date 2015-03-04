<?php
/*
Plugin Name: Video Thumbnails Pro
Plugin URI: http://refactored.co/plugins/video-thumbnails
Description: Take full control over your video thumbnails.
Author: Sutherland Boswell
Author URI: http://sutherlandboswell.com
Version: 1.1.2
License: GPL2
Text Domain: video-thumbnails-pro
Domain Path: /languages/
*/
/*  Copyright 2013 Sutherland Boswell  (email : hello@sutherlandboswell.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Define

define( 'VIDEO_THUMBNAILS_PRO_PATH', dirname(__FILE__) );
define( 'VIDEO_THUMBNAILS_PRO_VERSION', '1.1.2' );

// Settings
require_once( VIDEO_THUMBNAILS_PRO_PATH . '/php/class-refactored-settings.php' );

// Class
class Video_Thumbnails_Pro {

	var $settings;
	var $update_checker;

	function __construct() {

		$settings_args = array(
			'file'    => __FILE__,
			'version' => VIDEO_THUMBNAILS_PRO_VERSION,
			'name'    => __( 'Video Thumbnails Pro', 'video-thumbnails-pro' ),
			'slug'    => 'video_thumbnails_pro',
			'options' => array(
				'general' => array(
					'name'        => __( 'General', 'video-thumbnails-pro' ),
					'description' => '',
					'fields'      => array(
						'license_key' => array(
							'name'        => __( 'License Key', 'video-thumbnails-pro' ),
							'type'        => 'text',
							'default'     => '',
							'description' => __( 'Enter your license key to enable automatic updates', 'video-thumbnails-pro' )
						)
					)
				),
				'performance' => array(
					'name'        => __( 'Performance', 'video-thumbnails-pro' ),
					'description' => __( 'Enhance the performance by tweaking to your needs', 'video-thumbnails-pro' ),
					'fields'      => array(
						'disabled_providers' => array(
							'name'        => __( 'Disabled Providers', 'video-thumbnails-pro' ),
							'type'        => 'multicheckbox',
							'default'     => array(),
							'options'     => $this->get_provider_name_array(),
							'description' => __( 'Select unused providers to disable them', 'video-thumbnails-pro' )
						)
					)
				),
				'aspect_ratio' => array(
					'name'        => __( 'Aspect Ratio', 'video-thumbnails-pro' ),
					'description' => __( 'Set an aspect ratio to always use for video thumbnails. Useful for preventing black bars on certain videos. Note: This only affects the full size image file, themes may use smaller image versions at different aspect ratios.', 'video-thumbnails-pro' ),
					'fields'      => array(
						'ratio' => array(
							'name'        => __( 'Ratio', 'video-thumbnails-pro' ),
							'type'        => 'dropdown',
							'default'     => 'none',
							'options'     => array(
								'none'       => __( 'Disabled', 'video-thumbnails-pro' ),
								'widescreen' => __( 'Widescreen', 'video-thumbnails-pro' ) . ' (16:9)',
								'fullscreen' => __( 'Fullscreen', 'video-thumbnails-pro' ) . ' (4:3)',
								'square'     => __( 'Square', 'video-thumbnails-pro' ) . ' (1:1)'
							),
							'description' => __( 'Thumbnails will be cropped to match this ratio', 'video-thumbnails-pro' )
						)
					)
				),
				'max_dimensions' => array(
					'name'        => __( 'Maximum Dimensions', 'video-thumbnails-pro' ),
					'description' => __( 'Sets the maximum dimensions for full size video thumbnail images. Image is resized to maximum dimensions after being cropped to your selected aspect ratio.', 'video-thumbnails-pro' ),
					'fields'      => array(
						'width' => array(
							'name'        => __( 'Width', 'video-thumbnails-pro' ),
							'type'        => 'text',
							'default'     => '',
							'description' => ''
						),
						'height' => array(
							'name'        => __( 'Height', 'video-thumbnails-pro' ),
							'type'        => 'text',
							'default'     => '',
							'description' => ''
						),
						'crop' => array(
							'name'        => __( 'Crop', 'video-thumbnails-pro' ),
							'type'        => 'checkbox',
							'default'     => '',
							'description' => __( 'Crop to exact dimensions (normally stays proportional)', 'video-thumbnails-pro' )
						)
					)
				),
				'upload_directory' => array(
					'name'        => __( 'Upload Directory', 'video-thumbnails-pro' ),
					'description' => __( 'Save and organize video thumbnail files in a custom subdirectory of your WordPress uploads folder', 'video-thumbnails-pro' ),
					'fields'      => array(
						'name' => array(
							'name'        => __( 'Name', 'video-thumbnails-pro' ),
							'type'        => 'text',
							'default'     => '',
							'description' => __( 'Enter the name of the subdirectory to store video thumbnails in (leave blank to disable)', 'video-thumbnails-pro' )
						),
						'subdir' => array(
							'name'        => __( 'Organize by Date', 'video-thumbnails-pro' ),
							'type'        => 'checkbox',
							'default'     => '1',
							'description' => __( 'Organize video thumbnails into month- and year-based folders (only applied if a custom subdirectory is used)', 'video-thumbnails-pro' )
						)
					)
				),
				'id_fields' => array(
					'name'        => __( 'ID Custom Fields', 'video-thumbnails-pro' ),
					'description' => __( 'Sometimes you only want to store the ID of a video (rather than an embed code or full URL) from sites like YouTube or Vimeo in a custom field.', 'video-thumbnails-pro' ),
					'fields'      => $this->get_provider_id_settings_fields()
				)
			)
		);

		// Settings
		$this->settings = new Refactored_Settings_0_3_1( $settings_args );

		// Run action when options are updated
		add_action( 'update_option_video_thumbnails_pro', array( &$this, 'options_updated' ) );

		// Update checker
		require VIDEO_THUMBNAILS_PRO_PATH . '/updates/plugin-update-checker.php';
		$this->update_checker = new PluginUpdateChecker(
			'https://refactored.co/?update_action=get_metadata&update_slug=video-thumbnails-pro',
			__FILE__,
			'video-thumbnails-pro'
		);
		$this->update_checker->addQueryArgFilter( array( &$this, 'filter_update_checks' ) );

		// Update message action
		add_action( 'in_plugin_update_message-video-thumbnails-pro/video-thumbnails-pro.php', array( &$this, 'update_message' ), 10, 2 );

		// Add filter to disable selected providers
		add_filter( 'video_thumbnail_providers_pre_scan', array( &$this, 'disabled_providers_filter' ), 20 );

		// Add new thumbnail URL filter
		add_filter( 'new_video_thumbnail_url', array( &$this, 'new_thumbnail_url_filter' ), 20, 2 );

		// Add action to modify thumbnails before being added to media library
		add_action( 'video_thumbnails/image_downloaded', array( &$this, 'image_downloaded' ) );

		// Add action to temporarily add filter to modify upload directory when uploading a video thumbnail
		add_action( 'video_thumbnails/pre_upload_bits', array( &$this, 'pre_upload_bits' ) );
		add_action( 'video_thumbnails/after_upload_bits', array( &$this, 'after_upload_bits' ) );

		// Add action to add fields to the bulk video thumbnails form
		add_action( 'video_thumbnails/bulk_options_form', array( &$this, 'add_bulk_form_fields' ) );

		// Add filter to modify the bulk posts query
		add_filter( 'video_thumbnails/bulk_posts_query', array( &$this, 'bulk_posts_query_filter' ), 10, 2 );

		// Remove "Go Pro" call to action from free settings page
		remove_action( 'video_thumbnails/settings_footer', array( 'Video_Thumbnails_Settings', 'settings_footer' ) );

	}

	function get_provider_name_array() {
		global $video_thumbnails;
		$provider_names = array();
		if ( isset( $video_thumbnails->providers ) ) {
			foreach ( $video_thumbnails->providers as $key => $provider ) {
				$provider_names[$key] = $provider->service_name;
			}
		}
		return $provider_names;
	}

	function get_provider_id_settings_fields() {
		global $video_thumbnails;
		$fields = array();
		if ( isset( $video_thumbnails->providers ) ) {
			foreach ( $video_thumbnails->providers as $key => $provider ) {
				$fields[$key] = array(
					'name'        => $provider->service_name . ' ID Field',
					'type'        => 'text',
					'default'     => '',
					'description' => ''
				);
			}
		}
		return $fields;
	}

	function filter_update_checks( $queryArgs ) {
		if ( !empty( $this->settings->options['general']['license_key'] ) ) {
			$queryArgs['update_key'] = $this->settings->options['general']['license_key'];
		}
		return $queryArgs;
	}

	/**
	 * Displays an additional message after the plugin row's update message
	 */
	function update_message( $plugin_data, $r ) {
		if ( empty($r->package) ) {
			echo ' <em>' . __( 'Enable updates by entering your license key on the settings page.', 'video-thumbnails-pro' ) . '</em>';
		}
	}

	/**
	 * Runs any actions needed when options are updated
	 * @return void
	 */
	function options_updated() {
		// Clears the update cache
		$this->update_checker->resetUpdateState();
	}

	function disabled_providers_filter( $providers ) {
		foreach ( (array) $this->settings->options['performance']['disabled_providers'] as $key ) {
			unset( $providers[$key] );
		}
		return $providers;
	}

	/**
	 * This filter function gets a new thumbnail URL from provider ID fields
	 * @param  mixed $new_thumbnail A string with a new thumbnail URL or null if none has been found
	 * @param  int   $post_id       The post ID
	 * @return mixed                A string with a new thumbnail URL or null if none has been found
	 */
	function new_thumbnail_url_filter( $new_thumbnail, $post_id ) {
		global $video_thumbnails;
		// Loop through the ID fields
		foreach ( (array) $this->settings->options['id_fields'] as $provider => $field ) {

			// If no field is set, move to the next item
			if ( $field == '' ) continue;

			// Get the custom field's value
			$field_value = get_post_meta( $post_id, $field, true );

			// If the field isn't empty, we'll get the new thumbnail using the ID in the field value
			if ( $field_value != '' ) {
				$new_thumbnail = $video_thumbnails->providers[$provider]->get_thumbnail_url( $field_value );
			}

			// If a thumbnail URL is set, break out of our loop
			if ( $new_thumbnail != null ) break;

		}
		return $new_thumbnail;
	}

	/**
	 * Resizes an image to the maximum dimensions and aspect ratio in our settings.
	 * @param  string $image_file The path to the image file after being downloaded
	 */
	function image_downloaded( $image_file ) {

		$image_editor = false;
		$image_needs_saving = false;

		/**
		 * Aspect Ratio
		 */

		// Get ratio setting
		$ratio_setting = $this->settings->options['aspect_ratio']['ratio'];

		// Make sure a ratio is set
		if ( $ratio_setting != 'none' ) {
			// Initialize an image editor instance
			if ( $image_editor === false ) {
				$image_editor = wp_get_image_editor( $image_file );
			}
			// Make sure there wasn't an error
			if ( !is_wp_error( $image_editor ) ) {
				// Calculate the target ratio
				switch ( $ratio_setting ) {
					case 'widescreen':
						$ratio_width = 16;
						$ratio_height = 9;
						break;
					
					case 'fullscreen':
						$ratio_width = 4;
						$ratio_height = 3;
						break;
					
					case 'square':
						$ratio_width = 1;
						$ratio_height = 1;
						break;
					
					default:
						$ratio_width = 16;
						$ratio_height = 9;
						break;
				}
				$target_ratio = $ratio_width / $ratio_height;

				// Get the current size and ratio
				$current_size = $image_editor->get_size();
				$current_ratio = $current_size['width'] / $current_size['height'];

				// Set the variables for new width and height to the current size to prevent undefined variables
				$new_width = $current_size['width'];
				$new_height = $current_size['height'];

				// Make sure ratios aren't equal
				if ( $current_ratio != $target_ratio ) {

					// Calculate new dimensions
					if ( $current_ratio > $target_ratio ) {
						$new_height = $current_size['height'];
						$new_width = $current_size['height'] * $target_ratio;
					} else {
						$new_width = $current_size['width'];
						$new_height = $current_size['width'] / $target_ratio;
					}

				}

				// Resize the image if dimensions are different
				if ( $new_width != $current_size['width'] || $new_height != $current_size['height'] ) {
					// Resize the image
					$image_editor->resize( $new_width, $new_height, true );
					// Image needs saving
					$image_needs_saving = true;
				}
			}
		}

		/**
		 * Max Dimensions
		 */

		// Get max dimensions & crop setting in friendly vars
		$max_width = $this->settings->options['max_dimensions']['width'];
		$max_height = $this->settings->options['max_dimensions']['height'];
		$crop = ( $this->settings->options['max_dimensions']['crop'] ? true : false );

		// Make sure at least one of the two is set
		if ( $max_width != '' || $max_height != '' ) {
			// Initialize an image editor instance
			if ( $image_editor === false ) {
				$image_editor = wp_get_image_editor( $image_file );
			}
			// Make sure there wasn't an error
			if ( !is_wp_error( $image_editor ) ) {
				// Since only one max dimension is required, use a large number for an unset value
				$max_width = ( $max_width != '' ? $max_width : 9999 );
				$max_height = ( $max_height != '' ? $max_height : 9999 );
				// Resize the image
				$image_editor->resize( $max_width, $max_height, $crop );
				// Image needs saving
				$image_needs_saving = true;
			}
		}

		/**
		 * Save image if needed
		 */
		
		if ( $image_needs_saving ) {
			$image_editor->save( $image_file );
		}

	}

	/**
	 * Adds the filter to change the upload directory for video thumbnails
	 * @return null
	 */
	function pre_upload_bits() {
		add_filter( 'upload_dir', array( &$this,'change_upload_dir' ) );
	}

	/**
	 * Removes the filter to change the upload directory for video thumbnails
	 * @return null
	 */
	function after_upload_bits() {
		remove_filter( 'upload_dir', array( &$this,'change_upload_dir' ) );
	}

	/**
	 * Filter function to modify the upload directory for video thumbnails
	 * @param  array $param An array containing upload path information
	 * @return array        An array containing upload path information
	 */
	function change_upload_dir( $param ) {
		// Get setting in local var
		$custom_dir = $this->settings->options['upload_directory']['name'];
		// If a custom directory isn't set, just return the original params
		if ( $custom_dir == '' ) return $param;
		// Trim slashes
		$custom_dir = trim( $custom_dir, '/' );
		// Add subdirectory if enabled
		$subdir_enabled = $this->settings->options['upload_directory']['subdir'];
		if ( $subdir_enabled ) {
			$custom_dir = $custom_dir . $param['subdir'];
		}
		$custom_dir = '/' . $custom_dir;

		$param['path'] = $param['basedir'] . $custom_dir;
		$param['url'] = $param['baseurl'] . $custom_dir;

		return $param;
	}

	/**
	 * Adds fields to the bulk scanning page
	 */
	function add_bulk_form_fields() {
		?>
		<tr valign="top">
			<th scope="row"><?php _e( 'Skipping', 'video-thumbnails-pro' ); ?></th>
			<td>
				<fieldset>
					<label><input type="checkbox" name="skip_featured" value="1" checked="checked"> <?php _e( "Don't scan posts that already have featured images", 'video-thumbnails-pro' ); ?></label><br>
					<label><input type="checkbox" name="skip_video_thumbnails" value="1" checked="checked"> <?php _e( "Don't scan posts that already have video thumbnails", 'video-thumbnails-pro' ); ?></label>
				</fieldset>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e( 'Category', 'video-thumbnails-pro' ); ?></th>
			<td>
				<?php wp_dropdown_categories( array( 'show_option_all' => __( 'All', 'video-thumbnails-pro' ) ) ); ?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e( 'Tag', 'video-thumbnails-pro' ); ?></th>
			<td>
				<input type="text" name="tag">
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e( 'Limit', 'video-thumbnails-pro' ); ?></th>
			<td>
				<label><input type="text" name="posts_per_page" value=""> <?php _e( 'Leave blank to scan all', 'video-thumbnails-pro' ); ?></label>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e( 'Page', 'video-thumbnails-pro' ); ?></th>
			<td>
				<label><input type="text" name="paged" value=""> <?php _e( 'Use in combination with a limit', 'video-thumbnails-pro' ); ?></label>
			</td>
		</tr>
		<?php
	}

	/**
	 * Filter function to modify the query args for a bulk posts query
	 * @param  array $args Query arguments used to get a list of post IDs to scan
	 * @param  array $form Form data that can be used to modify the bulk query args
	 * @return array       Modified query args
	 */
	function bulk_posts_query_filter( $args, $form ) {
		// Category
		$args['cat'] = $form['cat'];
		// Tag
		$args['tag'] = $form['tag'];
		// Posts per page
		$limit = ( $form['posts_per_page'] ? $form['posts_per_page'] : -1 );
		$args['posts_per_page'] = $limit;
		// Page
		$limit = ( $form['paged'] ? $form['paged'] : 1 );
		$args['paged'] = $form['paged'];
		// Skipping
		if ( isset( $form['skip_featured'] ) ) {
			$args['meta_query'][] = array(
				'key' => '_thumbnail_id',
				'compare' => 'NOT EXISTS',
				'value' => ''
			);
		}
		if ( isset( $form['skip_video_thumbnails'] ) ) {
			$args['meta_query'][] = array(
				'key' => '_video_thumbnail',
				'compare' => 'NOT EXISTS',
				'value' => ''
			);
		}

		return $args;
	}

}

function load_video_thumbnails_pro() {
	$video_thumbnails_pro = new Video_Thumbnails_Pro();
}

if ( !isset( $video_thumbnails ) ) {
	add_action( 'video_thumbnails_plugin_loaded', 'load_video_thumbnails_pro' );
} else {
	load_video_thumbnails_pro();
}

/**
 * Add a notice if Video Thumbnails isn't installed
 */

add_action( 'admin_init', 'video_thumbnails_pro_check_video_thumbnails' );

function video_thumbnails_pro_check_video_thumbnails() {
	if ( !is_plugin_active( 'video-thumbnails/video-thumbnails.php' ) ) {
		add_action( 'admin_notices', 'video_thumbnails_pro_requirement_notice' );
	}
}

function video_thumbnails_pro_requirement_notice() {
	echo '<div class="error"><p>' . __( 'Video Thumbnails Pro requires <a href="https://wordpress.org/plugins/video-thumbnails/">Video Thumbnails</a> to be installed.', 'video-thumbnails-pro' ) . '</p></div>';
}