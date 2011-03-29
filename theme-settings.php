<?php

function zentropy_settings($saved_settings, $subtheme_defaults = array()) {

  // Get the default values from the .info file.
  $defaults = zentropy_theme_get_default_settings('zentropy');

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  //Forms using FAPI
  $form = array();

  /* HTML 5 */

  $form['zentropy_html'] = array(
   '#type' => 'fieldset',
   '#title' => t('HTML'),
  );

  $form['zentropy_html']['zentropy_html5'] = array(
   '#type'  => 'checkbox',
   '#title' => t('Enable HTML5'),
   '#default_value' => $settings['zentropy_html5'],
  );

  /**
   * Google Analytics settings
   */
  $roles_all = user_roles();
  $roles_tracked = $settings['zentropy_ga_trackroles'];

  $form['zentropy_ga'] = array(
   '#type' => 'fieldset',
   '#title' => t('Google Analytics'),
  );
  $form['zentropy_ga']['zentropy_ga_enable'] = array(
   '#type'  => 'checkbox',
   '#title' => t('Enable Google Analytics'),
   '#default_value' => $settings['zentropy_ga_enable'],
  );
  $form['zentropy_ga']['zentropy_ga_trackingcode'] = array(
   '#type'  => 'textfield',
   '#title' => t('Tracking code'),
   '#default_value' => $settings['zentropy_ga_trackingcode'],
  );
  $form['zentropy_ga']['zentropy_ga_trackroles'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Exclude roles'),
    '#options' => $roles_all,
    '#description' => t('Exclude the following roles from being tracked'),
    '#default_value' => !empty($roles_tracked) ? array_values((array) $roles_tracked) : array(),
  );

  // Return the form
  return $form;
}

function zentropy_theme_get_default_settings($theme) {
  $themes = list_themes();

  // Get the default values from the .info file.
  $defaults = !empty($themes[$theme]->info['settings']) ? $themes[$theme]->info['settings'] : array();

  if (!empty($defaults)) {
    // Get the theme settings saved in the database.
    $settings = theme_get_settings($theme);
    // Don't save the toggle_node_info_ variables.
    if (module_exists('node')) {
      foreach (node_get_types() as $type => $name) {
        unset($settings['toggle_node_info_' . $type]);
      }
    }
    // Save default theme settings.
    variable_set(
      str_replace('/', '_', 'theme_' . $theme . '_settings'),
      array_merge($defaults, $settings)
    );
    // If the active theme has been loaded, force refresh of Drupal internals.
    if (!empty($GLOBALS['theme_key'])) {
      theme_get_setting('', TRUE);
    }
  }

  // Return the default settings.
  return $defaults;
}
