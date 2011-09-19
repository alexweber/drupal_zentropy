<?php

function zentropy_settings($saved_settings, $subtheme_defaults = array()) {

  // Get the default values from the .info file.
  $defaults = zentropy_theme_get_default_settings();

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  $form = array();

  /*
   * General Settings
   */

  $form['zentropy_general'] = array(
   '#type' => 'fieldset',
   '#title' => t('General'),
  );

  $form['zentropy_general']['zentropy_html5'] = array(
   '#type'  => 'checkbox',
   '#title' => t('Enable HTML5'),
   '#default_value' => $settings['zentropy_html5'],
  );
  
  $form['zentropy_general']['zentropy_feed_icons'] = array(
    '#type' => 'checkbox',
    '#title' => t('Display Feed Icons'),
    '#default_value' => $settings['zentropy_feed_icons'],
  );
  
  $form['zentropy_general']['clear_registry'] = array(
    '#type' => 'checkbox',
    '#title' => t('Rebuild theme registry on every page.'),
    '#description' => t('During theme development, it can be very useful to continuously <a href="!link">rebuild the theme registry</a>. WARNING: this is a huge performance penalty and must be turned off on production websites.', array('!link' => 'http://drupal.org/node/173880#theme-registry')),
    '#default_value' => $settings['clear_registry'],
  );

  /*
   * Floating tabs
   */
   $form['zentropy_tabs'] = array(
    '#type' => 'fieldset',
    '#title' => t('Tabs'),
   );
   
   $form['zentropy_tabs']['zentropy_tabs_float'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable floating tabs'),
    '#default_value' => $settings['zentropy_tabs_float'],
   );
   
   $form['zentropy_tabs']['zentropy_tabs_node'] = array(
    '#type' => 'checkbox',
    '#title' => t('Only for nodes'),
    '#default_value' => $settings['zentropy_tabs_node'],
   );

  /*
   * Breadcrumb settings
   */
  $form['zentropy_breadcrumb'] = array(
    '#type' => 'fieldset',
    '#title' => t('Breadcrumb'),
  );

  $form['zentropy_breadcrumb']['zentropy_breadcrumb_hideonlyfront'] = array(
    '#type' => 'checkbox',
    '#title' => t('Hide the breadcrumb if the breadcrumb only contains the link to the front page.'),
    '#default_value' => $settings['zentropy_breadcrumb_hideonlyfront'],
  );

  $form['zentropy_breadcrumb']['zentropy_breadcrumb_separator'] = array(
    '#type' => 'textfield',
    '#title' => t('Breadcrumb separator'),
    '#default_value' => $settings['zentropy_breadcrumb_separator'],
  );

  /*
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
  $form['zentropy_ga']['zentropy_ga_anonimize'] = array(
    '#type' => 'checkbox',
    '#title' => t('Anonimize IP'),
    '#description' => t('Tells Google Analytics to anonymize the information sent by the tracker objects by removing the last octet of the IP address prior to its storage. Note that this will slightly reduce the accuracy of geographic reporting.'),
    '#default_value' => $settings['zentropy_ga_anonimize']
  );  

  // Return the form
  return $form;
}

function zentropy_theme_get_default_settings() {
  $themes = list_themes();

  // Get the default values from the .info file.
  $defaults = !empty($themes['zentropy']->info['settings']) ? $themes['zentropy']->info['settings'] : array();

  if (!empty($defaults)) {
    // Get the theme settings saved in the database.
    $settings = theme_get_settings('zentropy');
    // Don't save the toggle_node_info_ variables.
    if (module_exists('node')) {
      foreach (node_get_types() as $type => $name) {
        unset($settings['toggle_node_info_' . $type]);
      }
    }
    // Save default theme settings.
    variable_set(
      str_replace('/', '_', 'theme_zentropy_settings'),
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
