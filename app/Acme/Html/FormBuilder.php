<?php namespace Acme\Html;

use Illuminate\Html\FormBuilder as IlluminateFormBuilder;

class FormBuilder extends IlluminateFormBuilder {

	/**
	 * @param       $name
	 * @param       $label
	 * @param null  $value
	 * @param array $options
	 * @return string
	 */
	public function textField($name, $label, $value = null, $options = [])
	{
		return $this->field('text', $name, $label, $value, $options);
	}

	/**
	 * @param $html
	 * @return string
	 */
	private function wrap($html)
	{
		return "<div class=\"form-group\">{$html}</div>";
	}

	/**
	 * @param $type
	 * @param $name
	 * @param $label
	 * @param $value
	 * @param $options
	 * @return string
	 */
	private function field($type, $name, $label, $value, $options)
	{
		$options = array_merge(['class' => 'form-control'], $options);

		$html = $this->label($name, ucwords($label));
		$html .= $this->input($type, $name, $value, $options);

		return $this->wrap($html);
	}

} 