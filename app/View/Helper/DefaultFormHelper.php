<?php 
App::uses('FormHelper', 'View/Helper');

class DefaultFormHelper extends FormHelper {


  	public function create($model = null, $options = array())
	{
		$optionsDefault = array();
		$options = array_merge($optionsDefault, $options);
		return parent::create($model, $options);
	}

	public function input($fieldName, $options = array())
	{	
		$optionsDefault = array('class'=>'form-control','div'=>'form-group');
		$options = array_merge_recursive($optionsDefault, $options);
		if (!isset($options['placeholder'])) {
			$options['placeholder'] = __(ucfirst($fieldName));
		}
		return parent::input($fieldName, $options);
	}

	public function textarea($fieldName, $options = array()) {
		$optionsDefault = array('class'=>'form-control');
		$options = array_merge_recursive($optionsDefault, $options);
		return parent::textarea($fieldName, $options);
	}

}