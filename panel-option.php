<?php
/**
 * Archivo para generar todos los menu en el panel de Administrador
 * aca esta la info: https://medium.com/@jdevmanzo/como-crear-theme-options-para-wordpress-ad1addca9c51
*/
function example_add_admin_page () {
  // Primer paso...agregar la opción en el menú de la izquierda
  add_menu_page( 'Theme Options', 'Panel de Opciones', 'manage_options', 'example-options-theme', 'example_create_page', 'dashicons-admin-generic', 60 );
  // Activa los settings para el menú
  add_action( 'admin_init', 'example_custom_settings' );
	
}
add_action( 'admin_menu', 'example_add_admin_page' );

/**
 *  Register all the settings field and sections
 */
function example_custom_settings() {
  // Segundo paso...registrar las secciones y campos para que WP los reconozca
  register_setting( 'example-settings-group', 'footer_message' );
  // Seccion de mensajes que mostrará como cabecera encima de la sección como mensaje
  add_settings_section( 'example-message-options', 'Mensaje para el footer', '
  ', 'example-options-theme' );
  // El campo con su name específico
  add_settings_field( 'footer_message', 'Contenido del Mensaje:', 'example_form_message', 'example-options-theme', 'example-message-options' );

}

/**
 *  Input for the section's field
 */
function example_form_message() {
  // Tercer paso...se optiene el valor de la opción y se obtiene el input también
  $message_footer = esc_attr( get_option( 'footer_message' ) );
  echo '<input type="text" name="footer_message" value="' . $message_footer . '" />';
	
}

function example_message() {
  // Mensaje para separar
  echo "<hr/>";

}

/**
 *  Template where itll be show the form
 */
function example_create_page() {
  // Cuarto paso...donde sera mostrado el formulario con sus fields
  require_once( get_template_directory() . '/inc/templates/page-to-form.php' );
	
}