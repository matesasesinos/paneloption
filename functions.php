<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

//panel option
require_once( get_stylesheet_directory(). '/panel-option.php' );
require_once( get_stylesheet_directory(). '/forms.php' );

//test form

function formulario_func($atts) {
    $form = Forms::form_open('POST','/','form1');
    $form .= Forms::form_label('Etiqueta campo 1');
    $form .= Forms::input_text('campo1','text',null,'campo1','form-field',null,'Campo de texto');
    $form .= Forms::form_label('Etiqueta campo 2');
    $form .= Forms::input_text('campo2','email',null,'campo2','form-field',null,'Campo de email');
    $form .= Forms::form_label('Etiqueta campo 3');
    $form .= Forms::input_text('campo3','number',null,'campo3','form-field',null,'Campo de numero');
    $form .= Forms::form_label('Select');
    $form .= Forms::form_select('seleccionar',['' => '-- seleccionar --','opcion1' => 'Opcion 1','opcion 2' => 'Opcion 2', 'opcion3' => 'Opcion 3'], '' ,null,'form-field','otro');
    $form .= Forms::form_textarea('aread_texto');

    $form .= Forms::form_button('boton','reset','Boton');
    $form .= Forms::form_submit('enviar','Enviar');
    $form .= Forms::form_close();
    return $form;
}


add_shortcode( 'formulario', 'formulario_func' ); //crear una pagina o un post y usar el shortcode [formulario]