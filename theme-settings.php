<?php
// $Id$

/**
 * @file
 * Contains theme settings for the zentropy theme.
 */

function zentropy_form_system_theme_settings_alter(&$form, &$form_state) {

  /**
   * Breadcrumb settings
   * Copied from Zen
   */
  $form['breadcrumb'] = array(
   '#type' => 'fieldset',
   '#title' => t('Breadcrumb'),
  );
  $form['breadcrumb']['breadcrumb_display'] = array(
   '#type' => 'select',
   '#title' => t('Display breadcrumb'),
   '#default_value' => theme_get_setting('breadcrumb_display'),
   '#options' => array(
     'yes' => t('Yes'),
     'no' => t('No'),
   ),
  );
  $form['breadcrumb']['breadcrumb_separator'] = array(
   '#type'  => 'textfield',
   '#title' => t('Breadcrumb separator'),
   '#description' => t('Text only. Dont forget to include spaces.'),
   '#default_value' => theme_get_setting('breadcrumb_separator'),
   '#size' => 8,
   '#maxlength' => 10,
  );
  $form['breadcrumb']['breadcrumb_home'] = array(
   '#type' => 'checkbox',
   '#title' => t('Show the homepage link in breadcrumbs'),
   '#default_value' => theme_get_setting('breadcrumb_home'),
  );
  $form['breadcrumb']['breadcrumb_trailing'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append a separator to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('breadcrumb_trailing'),
    '#description'   => t('Useful when the breadcrumb is placed just before the title.'),
  );
  $form['breadcrumb']['breadcrumb_title'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Append the content title to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('breadcrumb_title'),
    '#description'   => t('Useful when the breadcrumb is not placed just before the title.'),
  );

  /**
   * Google Analytics settings
   */

  $roles_all = user_roles();
  $roles_tracked = theme_get_setting('ga_trackroles');

  $form['ga'] = array(
   '#type' => 'fieldset',
   '#title' => t('Google Analytics'),
  );
  $form['ga']['ga_enable'] = array(
   '#type'  => 'checkbox',
   '#title' => t('Enable Google Analytics'),
   '#default_value' => theme_get_setting('ga_enable'),
  );
  $form['ga']['ga_trackingcode'] = array(
   '#type'  => 'textfield',
   '#title' => t('Tracking code'),
   '#default_value' => theme_get_setting('ga_trackingcode'),
  );
  $form['ga']['ga_trackroles'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Track roles'),
    '#options' => $roles_all,
    '#description' => t('Exclude the following roles from being tracked'),
    '#default_value' => !empty($roles_tracked) ? array_values((array) $roles_tracked) : array(),
  );
}
