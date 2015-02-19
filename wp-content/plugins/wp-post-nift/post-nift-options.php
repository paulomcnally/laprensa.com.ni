<?php
/*
 * WordPress Plugin: WP-Post-NIFT
 *
 * File Written By:
 * - Juan Calos Alvarez
 *
 * File Information:
 * - Post NIFT Options Page
 * - wp-content/plugins/wp-post-nift/post-nift-options.php
 */


### Variables Variables Variables
$base_name = plugin_basename('wp-post-nift/print-options.php');
$base_page = 'admin.php?page='.$base_name;
$mode = isset($_GET['mode']) ? trim($_GET['mode']) : '';
$post_nift_settings = array('post_nift_options');


### Form Processing
// Update Options
if(!empty($_POST['Submit'])) {
	check_admin_referer('wp-post-nift_options');
	$post_nift_options = array();
	$post_nift_options['links'] = intval($_POST['post_nift_links']);
	$post_nift_options['images'] = intval($_POST['post_nift_images']);
	$post_nift_options['videos'] = intval($_POST['post_nift_videos']);
	$post_nift_options['disclaimer'] = trim($_POST['post_nift_disclaimer']);
	$update_post_nift_queries = array();
	$update_post_nift_text = array();
	$update_post_nift_queries[] = update_option('post_nift_options', $post_nift_options);
	$update_post_nift_text[] = __('Post NIFT Options', 'wp-post-nift');
	$i=0;
	$text = '';
	foreach($update_post_nift_queries as $update_post_nift_query) {
		if($update_post_nift_query) {
			$text .= '<font color="green">'.$update_post_nift_text[$i].' '.__('Updated', 'wp-post-nift').'</font><br />';
		}
		$i++;
	}
	if(empty($text)) {
		$text = '<font color="red">'.__('No Post NIFT Option Updated', 'wp-post-nift').'</font>';
	}
}
// Uninstall WP-Post-NIFT
if(!empty($_POST['do'])) {
	switch($_POST['do']) {
		case __('UNINSTALL WP-Post-NIFT', 'wp-post-nift') :
			if(trim($_POST['uninstall_post_nift_yes']) == 'yes') {
				echo '<div id="message" class="updated fade">';
				echo '<p>';
				foreach($post_nift_settings as $setting) {
					$delete_setting = delete_option($setting);
					if($delete_setting) {
						echo '<font color="green">';
						printf(__('Setting Key \'%s\' has been deleted.', 'wp-post-nift'), "<strong><em>{$setting}</em></strong>");
						echo '</font><br />';
					} else {
						echo '<font color="red">';
						printf(__('Error deleting Setting Key \'%s\'.', 'wp-post-nift'), "<strong><em>{$setting}</em></strong>");
						echo '</font><br />';
					}
				}
				echo '</p>';
				echo '</div>';
				$mode = 'end-UNINSTALL';
			}
			break;
	}
}

### Determines Which Mode It Is
switch($mode) {
		//  Deactivating WP-Post-NIFT
		case 'end-UNINSTALL':
			$deactivate_url = 'plugins.php?action=deactivate&amp;plugin=wp-post-nift/wp-post-nift.php';
			if(function_exists('wp_nonce_url')) {
				$deactivate_url = wp_nonce_url($deactivate_url, 'deactivate-plugin_wp-post-nift/wp-post-nift.php');
			}
			echo '<div class="wrap">';
			echo '<h2>'.__('Uninstall WP-Post-NIFT', 'wp-post-nift').'</h2>';
			echo '<p><strong>'.sprintf(__('<a href="%s">Click Here</a> To Finish The Uninstallation And WP-Post-NIFT Will Be Deactivated Automatically.', 'wp-post-nift'), $deactivate_url).'</strong></p>';
			echo '</div>';
			break;
	// Main Page
	default:
	$post_nift_options = get_option('post_nift_options');
?>
<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>
<form method="post" action="<?php echo admin_url('admin.php?page='.plugin_basename(__FILE__)); ?>">
<?php wp_nonce_field('wp-post-nift_options'); ?>
<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php _e('Post NIFT Options', 'wp-post-nift'); ?></h2>
	<h3><?php _e('Post NIFT Options', 'wp-post-nift'); ?></h3>
	<table class="form-table">
		<tr>
			<th scope="row" valign="top"><?php _e('Post NIFT Links?', 'wp-post-nift'); ?></th>
			<td>
				<select name="post_nift_links" size="1">
					<option value="1"<?php selected('1', $post_nift_options['links']); ?>><?php _e('Yes', 'wp-post-nift'); ?></option>
					<option value="0"<?php selected('0', $post_nift_options['links']); ?>><?php _e('No', 'wp-post-nift'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row" valign="top"><?php _e('Post NIFT Images?', 'wp-post-nift'); ?></th>
			<td>
				<select name="post_nift_images" size="1">
					<option value="1"<?php selected('1', $post_nift_options['images']); ?>><?php _e('Yes', 'wp-post-nift'); ?></option>
					<option value="0"<?php selected('0', $post_nift_options['images']); ?>><?php _e('No', 'wp-post-nift'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row" valign="top"><?php _e('Post NIFT Videos?', 'wp-post-nift'); ?></th>
			<td>
				<select name="post_nift_videos" size="1">
					<option value="1"<?php selected('1', $post_nift_options['videos']); ?>><?php _e('Yes', 'wp-post-nift'); ?></option>
					<option value="0"<?php selected('0', $post_nift_options['videos']); ?>><?php _e('No', 'wp-post-nift'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<th scope="row" valign="top">
				<?php _e('Disclaimer/Copyright Text?', 'wp-post-nift'); ?>
				<br /><br />
				<input type="button" name="RestoreDefault" value="<?php _e('Restore Default Template', 'wp-post-nift'); ?>" onclick="post_nift_default_templates('disclaimer');" class="button" />
			</th>
			<td>
				<textarea rows="2" cols="80" name="post_nift_disclaimer" id="post_nift_template_disclaimer"><?php echo htmlspecialchars(stripslashes($post_nift_options['disclaimer'])); ?></textarea><br /><?php _e('HTML is allowed.', 'wp-post-nift'); ?><br />
			</td>
		</tr>
	</table>
	<p class="submit">
		<input type="submit" name="Submit" class="button" value="<?php _e('Save Changes', 'wp-post-nift'); ?>" />
	</p>
</div>
</form>
<p>&nbsp;</p>

<!-- Uninstall WP-Post-NIFT -->
<form method="post" action="<?php echo admin_url('admin.php?page='.plugin_basename(__FILE__)); ?>">
<div class="wrap">
	<h3><?php _e('Uninstall WP-Post-NIFT', 'wp-post-nift'); ?></h3>
	<p>
		<?php _e('Deactivating WP-Post-NIFT plugin does not remove any data that may have been created, such as the print options. To completely remove this plugin, you can uninstall it here.', 'wp-post-nift'); ?>
	</p>
	<p style="color: red">
		<strong><?php _e('WARNING:', 'wp-post-nift'); ?></strong><br />
		<?php _e('Once uninstalled, this cannot be undone. You should use a Database Backup plugin of WordPress to back up all the data first.', 'wp-post-nift'); ?>
	</p>
	<p style="color: red">
		<strong><?php _e('The following WordPress Options will be DELETED:', 'wp-post-nift'); ?></strong><br />
	</p>
	<table class="widefat">
		<thead>
			<tr>
				<th><?php _e('WordPress Options', 'wp-post-nift'); ?></th>
			</tr>
		</thead>
		<tr>
			<td valign="top">
				<ol>
				<?php
					foreach($post_nift_settings as $settings) {
						echo '<li>'.$settings.'</li>'."\n";
					}
				?>
				</ol>
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<p style="text-align: center;">
		<input type="checkbox" name="uninstall_post_nift_yes" value="yes" />&nbsp;<?php _e('Yes', 'wp-post-nift'); ?><br /><br />
		<input type="submit" name="do" value="<?php _e('UNINSTALL WP-Post-NIFT', 'wp-post-nift'); ?>" class="button" onclick="return confirm('<?php _e('You Are About To Uninstall WP-Post-NIFT From WordPress.\nThis Action Is Not Reversible.\n\n Choose [Cancel] To Stop, [OK] To Uninstall.', 'wp-post-nift'); ?>')" />
	</p>
</div>
</form>
<?php
} // End switch($mode)
