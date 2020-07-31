<?php

/* form helper basico */

class Forms
{
    static private $initialized = false;

    static public function init()
    {
        if (self::$initialized)
            return false;
        self::$initialized = true;
        return true;
    }

    static public function form_open(
        $method,
        $action,
        $name,
        $enctype = null,
        $id = null,
        $class = null
    ) {
        if (!empty($method) && !empty($action)) {
            $enctype = !$enctype == null ? $enctype : '';
            return '<form name="' . $name . '" id="' . $id . '" class="' . $class . '" method="' . $method . '" action="' . $action . '" ' . $enctype . '>';
        }

        return 'Error: Falta el metodo o la acción para abrir el formulario.';
    }

    static public function form_label(
        $label,
        $class = null,
        $id = null
    ) {
        return '<label class="' . $class . '" id="' . $id . '">' . $label . '</label>';
    }

    static public function input_text(
        $name,
        $type,
        $required = null,
        $id = null,
        $class = null,
        $value = null,
        $placeholder = null
    ) {

        if (!empty($type)) {
            $required = !$required === null ? 'required' : '';
            $value = !isset($_POST[$name]) ? '' : $_POST[$name];
            $field = '<input type="' . $type . '" name="' . $name . '" id="' . $id . '" ' . $required . ' class="' . $class . '" value="' . $value . '" placeholder="' . $placeholder . '" />';

            return $field;
        }
        return 'Error: Falta el tipo de campo.';
    }

    static public function form_select(
        $name,
        $items = array(),
        $selected,
        $required = null,
        $id = null,
        $class = null
    ) {
        $select = '';
        $required = !$required === null ? 'required' : '';
        if (is_array($items)) {
            $select .= '<select name="' . $name . '" class="' . $class . '" id="' . $id . '" ' . $required . '>';
            foreach ($items as $item => $value) {
                $el = ($item == $selected) ? 'selected="selected"' : '';
                $select .= '<option value="' . $item . '" ' . $el . '>' . $value . '</option>';
            }

            $select .= '</select>';
        }
        return $select;
    }


    static public function form_button(
        $name,
        $type,
        $label,
        $id = null,
        $class = null
    ) {
        if (!empty($type)) {
            return '<button type="' . $type . '" name="' . $name . '" id="' . $id . '" class="' . $class . '">' . $label . '</button>';
        }
        return 'Error: Falta el tipo del botón.';
    }

    static public function form_submit(
        $name,
        $value,
        $id = null,
        $class = null
    ) {
        if (!empty($value) && !empty($name)) {
            return '<input type="submit" name="' . $name . '" value="' . $value . '" id="' . $id . '" class="' . $class . '" />';
        }
        return 'Error: Falta el nombre o el valor del input.';
    }

    static public function form_textarea($name, $rows = null, $cols = null, $extra = null, $id = null, $class = null)
    {
        if ($name) {
            return '<textarea name="' . $name . '" rows="' . $rows . '" cols="' . $cols .
                '" ' . $extra . ' ></textarea>';
        }
        return 'Error: Falta el nombre del textarea.';
    }

    static public function form_close()
    {
        return '</form>';
    }
}

Forms::init();