<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class MY_Form_Validaion extends CI_Form_validation {
// Testing!
// Found this example on http://stackoverflow.com/questions/1937376/codeigniter-form-validation-with-phone-numbers

	function valid_phone_number_or_empty($value) {
		$value = trim($value);
		if ($value == '') {
			return TRUE;
		} else {
			if (preg_match('/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $value)) {
				return preg_replace('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', '($1) $2-$3', $value);
			} else {			return FALSE;
			}
		}
	}
}
