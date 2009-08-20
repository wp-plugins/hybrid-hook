<?php
/**
 * Displays the settings page and form.
 *
 * @package HybridHook
 */
?>
<div class="wrap">

	<h2><?php _e('Hybrid Hook Settings', 'hook'); ?></h2>

	<form method="post" action="options.php">
		<?php global $hybrid_hook_settings_page; ?>
		<?php $plugin_data = get_plugin_data( HYBRID_HOOK . '/hybrid-hook.php' ); ?>
		<?php settings_fields( 'hybrid_hook_plugin_settings' ); ?>
		<?php $options = get_option( 'hybrid_hook_settings' ); ?>
		<?php wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false ); ?>

	<div class="metabox-holder">

		<div id="hybrid_hook_about" class="postbox <?php echo postbox_classes( 'hybrid_hook_about', $hybrid_hook_settings_page ); ?>">

			<div class="handlediv" title="<?php _e('Click to toggle', 'hook'); ?>"><br /></div>

			<h3 class='hndle'><span><?php _e('About Hybrid Hook', 'hook'); ?></span></h3>

			<div class="inside">

				<table class="form-table">

				<tr>
					<th><?php _e('Plugin Description:','hook'); ?></th>
					<td><?php echo $plugin_data['Description']; ?></td>
				</tr>

				<tr>
					<th><?php _e('Plugin Version:','hook'); ?></th>
					<td><?php echo $plugin_data['Name']; ?> <?php echo $plugin_data['Version']; ?></td>
				</tr>

				<tr>
					<th><?php _e('Hybrid Documentation:','hook'); ?></th>
					<td><a href="http://themehybrid.com/themes/hybrid" title="<?php _e('Hybrid Documentation','hook'); ?>"><?php _e('Hybrid Documentation','hook'); ?></a></td>
				</tr>

				<tr>
					<th><?php _e('Plugin Support:', 'hook'); ?></th>
					<td><a href="http://themehybrid.com/support" title="<?php _e('Get support for this plugin','hook'); ?>"><?php _e('Visit the support forums.','hook'); ?></a></td>
				</tr>

				</table>

			</div>
		</div>

		<div id="hybrid_hook_container_actions" class="postbox <?php echo postbox_classes( 'hybrid_hook_container_actions', $hybrid_hook_settings_page ); ?>">

			<div class="handlediv" title="<?php _e('Click to toggle', 'hook'); ?>"><br /></div>

			<h3 class='hndle'><span><?php _e('Container Action Hooks', 'hook'); ?></span></h3>

			<div class="inside">

				<table class="form-table">

				<tr>
					<th>
						<label for="before_html"><?php _e('Before <acronym title="Hypertext Markup Language">HTML</acronym>:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[before_html]" id="before_html" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['before_html'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[before_html_priority]" id="before_html_priority" value="<?php echo isset( $options['before_html_priority'] ) ? $options['before_html_priority'] : '10'; ?>" size="3" /> 
							<label for="before_html_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="before_html_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[before_html_php]" id="before_html_php" type="checkbox" value="1" <?php checked( '1', $options['before_html_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_html"><?php _e('After <acronym title="Hypertext Markup Language">HTML</acronym>:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[after_html]" id="after_html" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_html'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_html_priority]" id="after_html_priority" value="<?php echo isset( $options['after_html_priority'] ) ? $options['after_html_priority'] : '10'; ?>" size="3" /> 
							<label for="after_html_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
							<div style="width: 45%; float: right; text-align: right;">
								<label for="after_html_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_html_php]" id="after_html_php" type="checkbox" value="1" <?php checked( '1', $options['after_html_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="before_container"><?php _e('Before Container:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[before_container]" id="before_container" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['before_container'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[before_container_priority]" id="before_container_priority" value="<?php echo isset( $options['before_container_priority'] ) ? $options['before_container_priority'] : '10'; ?>" size="3" /> 
							<label for="before_container_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="before_container_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[before_container_php]" id="before_container_php" type="checkbox" value="1" <?php checked( '1', $options['before_container_php'] ); ?> />
						</div>
					</td>
					</tr>

					<tr>
					<th>
						<label for="after_container"><?php _e('After Container:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[after_container]" id="after_container" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_container'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_container_priority]" id="after_container_priority" value="<?php echo isset( $options['after_container_priority'] ) ? $options['after_container_priority'] : '10'; ?>" size="3" /> 
							<label for="after_container_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_container_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_container_php]" id="after_container_php" type="checkbox" value="1" <?php checked( '1', $options['after_container_php'] ); ?> />
						</div>
					</td>
				</tr>

				</table>

			</div>
		</div>

		<div id="hybrid_hook_header_actions" class="postbox <?php echo postbox_classes( 'hybrid_hook_header_actions', $hybrid_hook_settings_page ); ?>">

			<div class="handlediv" title="<?php _e('Click to toggle', 'hook'); ?>"><br /></div>

			<h3 class='hndle'><span><?php _e('Header Action Hooks', 'hook'); ?></span></h3>

			<div class="inside">

				<table class="form-table">

				<tr>
					<th>
						<label for="before_header"><?php _e('Before Header:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[before_header]" id="before_header" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['before_header'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[before_header_priority]" id="before_header_priority" value="<?php echo isset( $options['before_header_priority'] ) ? $options['before_header_priority'] : '10'; ?>" size="3" /> 
							<label for="before_header_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="before_header_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[before_header_php]" id="before_header_php" type="checkbox" value="1" <?php checked( '1', $options['before_header_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="header"><?php _e('Header:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[header]" id="header" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['header'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[header_priority]" id="header_priority" value="<?php echo isset( $options['header_priority'] ) ? $options['header_priority'] : '10'; ?>" size="3" /> 
							<label for="header_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="header_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[header_php]" id="header_php" type="checkbox" value="1" <?php checked( '1', $options['header_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_header"><?php _e('After Header:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[after_header]" id="after_header" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_header'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_header_priority]" id="after_header_priority" value="<?php echo isset( $options['after_header_priority'] ) ? $options['after_header_priority'] : '10'; ?>" size="3" /> 
							<label for="after_header_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_header_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_header_php]" id="after_header_php" type="checkbox" value="1" <?php checked( '1', $options['after_header_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="before_page_nav"><?php _e('Before Page Nav:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[before_page_nav]" id="before_page_nav" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['before_page_nav'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[before_page_nav_priority]" id="before_page_nav_priority" value="<?php echo isset( $options['before_page_nav_priority'] ) ? $options['before_page_nav_priority'] : '10'; ?>" size="3" /> 
							<label for="before_page_nav_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="before_page_nav_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[before_page_nav_php]" id="before_page_nav_php" type="checkbox" value="1" <?php checked( '1', $options['before_page_nav_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_page_nav"><?php _e('After Page Nav:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[after_page_nav]" id="after_page_nav" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_page_nav'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_page_nav_priority]" id="after_page_nav_priority" value="<?php echo isset( $options['after_page_nav_priority'] ) ? $options['after_page_nav_priority'] : '10'; ?>" size="3" /> 
							<label for="after_page_nav_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_page_nav_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_page_nav_php]" id="after_page_nav_php" type="checkbox" value="1" <?php checked( '1', $options['after_page_nav_php'] ); ?> />
						</div>
					</td>
				</tr>

				</table>

			</div>
		</div>

		<div id="hybrid_hook_content_actions" class="postbox <?php echo postbox_classes( 'hybrid_hook_content_actions', $hybrid_hook_settings_page ); ?>">

			<div class="handlediv" title="<?php _e('Click to toggle', 'hook'); ?>"><br /></div>

			<h3 class='hndle'><span><?php _e('Content Action Hooks', 'hook'); ?></span></h3>

			<div class="inside">

				<table class="form-table">

				<tr>
					<th>
						<label for="before_content"><?php _e('Before Content:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[before_content]" id="before_content" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['before_content'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[before_content_priority]" id="before_content_priority" value="<?php echo isset( $options['before_content_priority'] ) ? $options['before_content_priority'] : '10'; ?>" size="3" /> 
							<label for="before_content_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="before_content_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[before_content_php]" id="before_content_php" type="checkbox" value="1" <?php checked( '1', $options['before_content_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_content"><?php _e('After Content:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[after_content]" id="after_content" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_content'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_content_priority]" id="after_content_priority" value="<?php echo isset( $options['after_content_priority'] ) ? $options['after_content_priority'] : '10'; ?>" size="3" /> 
							<label for="after_content_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_content_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_content_php]" id="after_content_php" type="checkbox" value="1" <?php checked( '1', $options['after_content_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="before_entry"><?php _e('Before Entry:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[before_entry]" id="before_entry" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['before_entry'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[before_entry_priority]" id="before_entry_priority" value="<?php echo isset( $options['before_entry_priority'] ) ? $options['before_entry_priority'] : '10'; ?>" size="3" /> 
							<label for="before_entry_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="before_entry_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[before_entry_php]" id="before_entry_php" type="checkbox" value="1" <?php checked( '1', $options['before_entry_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_entry"><?php _e('After Entry:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[after_entry]" id="after_entry" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_entry'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_entry_priority]" id="after_entry_priority" value="<?php echo isset( $options['after_entry_priority'] ) ? $options['after_entry_priority'] : '10'; ?>" size="3" /> 
							<label for="after_entry_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_entry_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_entry_php]" id="after_entry_php" type="checkbox" value="1" <?php checked( '1', $options['after_entry_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_single"><?php _e('After Single:','hook'); ?></label>
					</th>
					<td>
						<?php _e('<em>Note:</em> This hook is deprecated and will be renamed to <em>After Singular</em> in <em>Hybrid</em> 0.7.', 'hook'); ?>
						<textarea name="hybrid_hook_settings[after_single]" id="after_single" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_single'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_single_priority]" id="after_single_priority" value="<?php echo isset( $options['after_single_priority'] ) ? $options['after_single_priority'] : '10'; ?>" size="3" /> 
							<label for="after_single_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_single_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_single_php]" id="after_single_php" type="checkbox" value="1" <?php checked( '1', $options['after_single_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_page"><?php _e('After Page:','hook'); ?></label>
					</th>
					<td>
						<?php _e('<em>Note:</em> This hook is deprecated and will be renamed to <em>After Singular</em> in <em>Hybrid</em> 0.7.', 'hook'); ?>
						<textarea name="hybrid_hook_settings[after_page]" id="after_page" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_page'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_page_priority]" id="after_page_priority" value="<?php echo isset( $options['after_page_priority'] ) ? $options['after_page_priority'] : '10'; ?>" size="3" /> 
							<label for="after_page_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_page_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_page_php]" id="after_page_php" type="checkbox" value="1" <?php checked( '1', $options['after_page_php'] ); ?> />
						</div>
					</td>
				</tr>

				</table>

			</div>
		</div>

		<div id="hybrid_hook_widget_area_actions" class="postbox <?php echo postbox_classes( 'hybrid_hook_widget_area_actions', $hybrid_hook_settings_page ); ?>">

			<div class="handlediv" title="<?php _e('Click to toggle', 'hook'); ?>"><br /></div>

			<h3 class='hndle'><span><?php _e('Widget Area Action Hooks', 'hook'); ?></span></h3>

			<div class="inside">

				<table class="form-table">

				<tr>
					<th>
						<label for="before_primary"><?php _e('Before Primary:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[before_primary]" id="before_primary" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['before_primary'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[before_primary_priority]" id="before_primary_priority" value="<?php echo isset( $options['before_primary_priority'] ) ? $options['before_primary_priority'] : '10'; ?>" size="3" /> 
							<label for="before_primary_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="before_primary_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[before_primary_php]" id="before_primary_php" type="checkbox" value="1" <?php checked( '1', $options['before_primary_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_primary"><?php _e('After Primary:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[after_primary]" id="after_primary" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_primary'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_primary_priority]" id="after_primary_priority" value="<?php echo isset( $options['after_primary_priority'] ) ? $options['after_primary_priority'] : '10'; ?>" size="3" /> 
							<label for="after_primary_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_primary_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_primary_php]" id="after_primary_php" type="checkbox" value="1" <?php checked( '1', $options['after_primary_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="before_secondary"><?php _e('Before Secondary:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[before_secondary]" id="before_secondary" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['before_secondary'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[before_secondary_priority]" id="before_secondary_priority" value="<?php echo isset( $options['before_secondary_priority'] ) ? $options['before_secondary_priority'] : '10'; ?>" size="3" /> 
							<label for="before_secondary_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="before_secondary_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[before_secondary_php]" id="before_secondary_php" type="checkbox" value="1" <?php checked( '1', $options['before_secondary_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_secondary"><?php _e('After Secondary:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[after_secondary]" id="after_secondary" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_secondary'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_secondary_priority]" id="after_secondary_priority" value="<?php echo isset( $options['after_secondary_priority'] ) ? $options['after_secondary_priority'] : '10'; ?>" size="3" /> 
							<label for="after_secondary_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_secondary_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_secondary_php]" id="after_secondary_php" type="checkbox" value="1" <?php checked( '1', $options['after_secondary_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="before_subsidiary"><?php _e('Before Subsidiary:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[before_subsidiary]" id="before_subsidiary" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['before_subsidiary'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[before_subsidiary_priority]" id="before_subsidiary_priority" value="<?php echo isset( $options['before_subsidiary_priority'] ) ? $options['before_subsidiary_priority'] : '10'; ?>" size="3" /> 
							<label for="before_subsidiary_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="before_subsidiary_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[before_subsidiary_php]" id="before_subsidiary_php" type="checkbox" value="1" <?php checked( '1', $options['before_subsidiary_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_subsidiary"><?php _e('After Subsidiary:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[after_subsidiary]" id="after_subsidiary" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_subsidiary'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_subsidiary_priority]" id="after_subsidiary_priority" value="<?php echo isset( $options['after_subsidiary_priority'] ) ? $options['after_subsidiary_priority'] : '10'; ?>" size="3" /> 
							<label for="after_subsidiary_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_subsidiary_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_subsidiary_php]" id="after_subsidiary_php" type="checkbox" value="1" <?php checked( '1', $options['after_subsidiary_php'] ); ?> />
						</div>
					</td>
				</tr>

				</table>

			</div>
		</div>

		<div id="hybrid_hook_footer_actions" class="postbox <?php echo postbox_classes( 'hybrid_hook_footer_actions', $hybrid_hook_settings_page ); ?>">

			<div class="handlediv" title="<?php _e('Click to toggle', 'hook'); ?>"><br /></div>

			<h3 class='hndle'><span><?php _e('Footer Action Hooks', 'hook'); ?></span></h3>

			<div class="inside">

				<table class="form-table">

				<tr>
					<th>
						<label for="before_footer"><?php _e('Before Footer:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[before_footer]" id="before_footer" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['before_footer'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[before_footer_priority]" id="before_footer_priority" value="<?php echo isset( $options['before_footer_priority'] ) ? $options['before_footer_priority'] : '10'; ?>" size="3" /> 
							<label for="before_footer_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="before_footer_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[before_footer_php]" id="before_footer_php" type="checkbox" value="1" <?php checked( '1', $options['before_footer_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="hh_footer"><?php _e('Footer:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[footer]" id="hh_footer" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['footer'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[footer_priority]" id="footer_priority" value="<?php echo isset( $options['footer_priority'] ) ? $options['footer_priority'] : '10'; ?>" size="3" /> 
							<label for="footer_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="footer_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[footer_php]" id="footer_php" type="checkbox" value="1" <?php checked( '1', $options['footer_php'] ); ?> />
						</div>
					</td>
				</tr>

				<tr>
					<th>
						<label for="after_footer"><?php _e('After Footer:','hook'); ?></label>
					</th>
					<td>
						<textarea name="hybrid_hook_settings[after_footer]" id="after_footer" cols="60" rows="5" style="width: 100%;"><?php echo wp_specialchars( stripslashes( $options['after_footer'] ), 1, 0, 1 ); ?></textarea>
						<div style="width: 45%; float: left;">
							<input name="hybrid_hook_settings[after_footer_priority]" id="after_footer_priority" value="<?php echo isset( $options['after_footer_priority'] ) ? $options['after_footer_priority'] : '10'; ?>" size="3" /> 
							<label for="after_footer_priority"><?php _e('Priority (<code>10</code> is default).', 'hook'); ?></label>
						</div>
						<div style="width: 45%; float: right; text-align: right;">
							<label for="after_footer_php"><?php _e('Execute <acronym title="Hypertext Preprocessor">PHP</acronym>?', 'hook' ); ?></label> 
							<input name="hybrid_hook_settings[after_footer_php]" id="after_footer_php" type="checkbox" value="1" <?php checked( '1', $options['after_footer_php'] ); ?> />
						</div>
					</td>
				</tr>

				</table>

			</div>
		</div>

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>

	</div>

	</form>

</div>