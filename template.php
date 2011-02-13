<?php
// $Id$

/**
 * @file
 * Contains theme override functions and preprocess & process functions for Zentropy theme.
 */

/**
 * Implements template_html_head_alter();
 *
 * Changes the default meta content-type tag to the shorter HTML5 version
 */
function zentropy_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Implements template_proprocess_search_block_form().
 *
 * Changes the search form to use the HTML5 "search" input attribute
 */
function zentropy_preprocess_search_block_form(&$variables) {
  $variables['search_form'] = str_replace('type="text"', 'type="search"', $variables['search_form']);
}

/**
 * Implements template_preprocess().
 */
function zentropy_preprocess(&$variables, $hook) {
  /* Cache full path to theme */
  $variables['zentropy_path'] = base_path() . path_to_theme();
}

/**
 * Implements template_preprocess_html().
 */
function zentropy_preprocess_html(&$variables) {
  $variables['doctype'] = _zentropy_doctype();
  $variables['rdf'] = _zentropy_rdf($variables);
  
  /* Since menu is rendered in preprocess_page we need to detect it here to add body classes */
  $has_main_menu = theme_get_setting('toggle_main_menu');
  $has_secondary_menu = theme_get_setting('toggle_secondary_menu');
  
  /* Add extra classes to body for advanced theming */
  
  if ($has_main_menu or $has_secondary_menu) {
    $variables['classes_array'][] = 'with-navigation';
  }
  
  if ($has_secondary_menu) {
    $variables['classes_array'][] = 'with-subnav';
  }
  
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
    || !empty($variables['page']['triptych_middle'])
    || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
    || !empty($variables['page']['footer_secondcolumn'])
    || !empty($variables['page']['footer_thirdcolumn'])
    || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }
  
  if ($variables['is_admin']) {
    $variables['classes_array'][] = 'admin';
  }
  
	if (!$variables['is_front']) {
		// Add unique classes for each page and website section
		$path = drupal_get_path_alias($_GET['q']);
		$temp = explode('/', $path, 2);
		$section = array_shift($temp);
		$page_name = array_shift($temp);
		
		if (isset($page_name)) {
		  $variables['classes_array'][] = zentropy_id_safe('page-'. $page_name);
		}
		
		$variables['classes_array'][] = zentropy_id_safe('section-'. $section);
		
		// add template suggestions
		$variables['theme_hook_suggestions'][] = "page__section__" . $section;
		$variables['theme_hook_suggestions'][] = "page__" . $page_name;

		if (arg(0) == 'node') {
			if (arg(1) == 'add') {
				if ($section == 'node') {
					array_pop($body_classes); // Remove 'section-node'
				}
				$body_classes[] = 'section-node-add'; // Add 'section-node-add'
			}
			elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
				if ($section == 'node') {
					array_pop($body_classes); // Remove 'section-node'
				}
				$body_classes[] = 'section-node-'. arg(2); // Add 'section-node-edit' or 'section-node-delete'
			}
		}
	}
}

/**
 * Implements template_preprocess_page().
 */
function zentropy_preprocess_page(&$variables) {
  if (isset($variables['node_title'])) {
    $variables['title'] = $variables['node_title'];
  }
  
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Implements template_preprocess_maintenance_page().
 */
function zentropy_preprocess_maintenance_page(&$variables) {
  // Manually include these as they're not available outside template_preprocess_page().
  $variables['rdf_namespaces'] = drupal_get_rdf_namespaces();
  $variables['grddl_profile'] = 'http://www.w3.org/1999/xhtml/vocab';
  
  $variables['doctype'] = _zentropy_doctype();
  $variables['rdf'] = _zentropy_rdf($variables);

  if (!$variables['db_is_active']) {
    unset($variables['site_name']);
  }
  
  drupal_add_css(drupal_get_path('theme', 'zentropy') . '/css/maintenance-page.css');
}

/**
 * Implements template_process_maintenance_page().
 *
 * Override or insert variables into the maintenance page template.
 */
function zentropy_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/** 
 * Implements template_preprocess_node().
 *
 * Adds extra classes to node container for advanced theming
 */
function zentropy_preprocess_node(&$variables) {
  // Striping class
  $variables['classes_array'][] = 'node-' . $variables['zebra'];
  
  // Node is published
  $variables['classes_array'][] = ($variables['status']) ? 'published' : 'unpublished';
  
  // Node has comments?
  $variables['classes_array'][] = ($variables['comment']) ? 'with-comments' : 'no-comments';
  
  if ($variables['sticky']) {
    $variables['classes_array'][] = 'sticky'; // Node is sticky
  }
  
  if ($variables['promote']) {
    $variables['classes_array'][] = 'promote'; // Node is promoted to front page
  }
  
  if ($variables['teaser']) {
    $variables['classes_array'][] = 'node-teaser'; // Node is displayed as teaser.
  }
  
  if ($variables['uid'] && $variables['uid'] === $GLOBALS['user']->uid) {
    $classes[] = 'node-mine'; // Node is authored by current user.
  }
  
   $variables['submitted'] = t('published by !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['date']));
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

/**
 * Implements template_preprocess_block().
 */
function zentropy_preprocess_block(&$variables, $hook) {
  // Add a striping class.
  $variables['classes_array'][] = 'block-' . $variables['zebra'];
  
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

/**
 * Implements theme_menu_tree().
 */
function zentropy_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function zentropy_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">' . $output . '</div>';

  return $output;
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function zentropy_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  // Determine if we are to display the breadcrumb.
  $show_breadcrumb = theme_get_setting('breadcrumb_display');
  if ($show_breadcrumb == 'yes') {

    // Optionally get rid of the homepage link.
    $show_breadcrumb_home = theme_get_setting('breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }

    // Return the breadcrumb with separators.
    if (!empty($breadcrumb)) {
      $separator = filter_xss(theme_get_setting('breadcrumb_separator'));
      $trailing_separator = $title = '';
      
      // Add the title and trailing separator
      if (theme_get_setting('breadcrumb_title')) {
        if ($title = drupal_get_title()) {
          $trailing_separator = $separator;
        }
      }
      // Just add the trailing separator
      elseif (theme_get_setting('breadcrumb_trailing')) {
        $trailing_separator = $separator;
      }

      // Assemble the breadcrumb
      return implode($separator, $breadcrumb) . $trailing_separator . $title;
    }
  }
  // Otherwise, return an empty string.
  return '';
}

/* 	
 * 	Converts a string to a suitable html ID attribute.
 *  Taken from "basic"
 * 	
 * 	 http://www.w3.org/TR/html4/struct/global.html#h-7.5.2 specifies what makes a
 * 	 valid ID attribute in HTML. This function:
 * 	
 * 	- Ensure an ID starts with an alpha character by optionally adding an 'n'.
 * 	- Replaces any character except A-Z, numbers, and underscores with dashes.
 * 	- Converts entire string to lowercase.
 * 	
 * 	@param $string
 * 	  The string
 * 	@return
 * 	  The converted string
 */	
function zentropy_id_safe($string) {
  // Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
  $string = strtolower(preg_replace('/[^a-zA-Z0-9_-]+/', '-', $string));
  // If the first character is not a-z, add 'n' in front.
  if (!ctype_lower($string{0})) { // Don't use ctype_alpha since its locale aware.
    $string = 'id'. $string;
  }
  return $string;
}

/**
 * Determine whether to output Google Analytics tracking code
 *
 * @return bool
 */
function zentropy_ga_enabled(){ 
  if (!theme_get_setting('ga_enable')) {
    return false;
  }
  
  global $user;
  $roles_orig = theme_get_setting('ga_trackroles');
  
  // theme_get_setting() doesn't allow specifying default values so provide one here
  if (!is_array($roles_orig)) {
    $roles_orig = array();
  }
  
  // remove roles with permission
  $roles = array_filter($roles_orig);
  
  // get intersection of user's roles and roles without permission
  $intersect = array_intersect(array_keys($user->roles), array_keys($roles));
  
  return empty($intersect);
}

/**
 * Generate doctype for templates
 */
function _zentropy_doctype() {
  return (module_exists('rdf')) ? '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN"' . "\n" . '"http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">' : '<!DOCTYPE html>' . "\n";
}

/**
 * Generate RDF object for templates
 *
 * Uses RDFa attributes if the RDF module is enabled
 * Lifted from Adaptivetheme for D7, full credit to Jeff Burnz
 * ref: http://drupal.org/node/887600
 *
 * @param array $variables
 */
function _zentropy_rdf($variables) {
  $rdf = new stdClass();

  if (module_exists('rdf')) {
    $rdf->version = 'version="HTML+RDFa 1.1"';
    $rdf->namespaces = $variables['rdf_namespaces'];
    $rdf->profile = ' profile="' . $variables['grddl_profile'] . '"';
  } else {
    $rdf->version = '';
    $rdf->namespaces = '';
    $rdf->profile = '';
  }
  
  return $rdf;
}
