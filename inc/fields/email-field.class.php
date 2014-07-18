<?php
require_once(realpath(dirname(__FILE__ ) . '/../../../../inc/includes.php'));
require_once('field.interface.php');

class emailField implements Field
{
   public static function show($field)
   {
      if($field['required'])  $required = ' required';
      else $required = '';

      echo '<div class="form-group' . $required . '" id="form-group-field' . $field['id'] . '">';
      echo '<label>';
      echo  $field['name'];
      if($field['required'])  echo ' <span class="red">*</span>';
      echo '</label>';

      echo '<input type="email" class="form-control"
               name="formcreator_field_' . $field['id'] . '"
               id="formcreator_field_' . $field['id'] . '"
               value="' . $field['id'] . '" />';
      echo '</div>' . PHP_EOL;
   }

   public static function isValid($field, $input)
   {
      return true;
   }

   public static function getName()
   {
      return __('E-mail', 'formcreator');
   }

   public static function getJSFields()
   {
      $prefs = array(
         'required'       => 1,
         'default_values' => 0,
         'values'         => 0,
         'range'          => 0,
         'show_empty'     => 0,
         'regex'          => 0,
         'show_type'      => 1,
         'dropdown_value' => 0,
      );
      return "tab_fields_fields['email'] = 'showFields(" . implode(', ', $prefs) . ");';";
   }
}
