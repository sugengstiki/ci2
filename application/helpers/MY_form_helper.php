<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('form_radiogroup'))
{
	function form_radiogroup($name = '', $options = array(), $selected = array(), $extra = '')
	{
		if ( ! is_array($selected))
		{
			$selected = array($selected);
		}

		// If no selected state was submitted we will attempt to set it automatically
		if (count($selected) === 0)
		{
			// If the form name appears in the $_POST array we have a winner!
			if (isset($_POST[$name]))
			{
				$selected = array($_POST[$name]);
			}
		}

		if ($extra != '') $extra = ' '.$extra;

		$form = '<div class="btn-group" data-toggle="buttons">';

		foreach ($options as $key => $val)
		{
			$key = (string) $key;

			if (is_array($val) && ! empty($val))
			{	

				foreach ($val as $optgroup_key => $optgroup_val)
				{
					$sel = (in_array($optgroup_key, $selected)) ? ' checked"' : '';

						$form .= 
	'<label class="btn btn-default '. ($sel==''?'':"active ").'"><input type="radio" name="'.$name.'" value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</label>\n";
				}

				
			}
			else
			{
				$sel = (in_array($key, $selected)) ? ' checked' : '';

							$form .= 
	'<label class="btn btn-default '. ($sel==''?'':"active ").'"><input type="radio" name="'.$name.'" value="'.$key.'"'.$sel.'>'.(string) $val."</label>\n";
			}
		}
		$form .= "</div>";
		

		return $form;
	}
}
