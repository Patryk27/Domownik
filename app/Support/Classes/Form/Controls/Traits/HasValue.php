<?php

namespace App\Support\Classes\Form\Controls\Traits;

/**
 * @note Assumes @see HasName trait.
 */
trait HasValue {

	/**
	 * @var mixed
	 */
	protected $value;

	/**
	 * @var bool
	 */
	protected $autoValue = false;

	/**
	 * @var bool
	 */
	protected $required = false;

	/**
	 * @var bool
	 */
	private $gotValueFromModel = false;

	/**
	 * @return mixed
	 */
	public function getValue() {
		if ($this->autoValue && !$this->gotValueFromModel) {
			/**
			 * For radio group, name can contain '[]' at the end, which should not be included when reading that field's
			 * value.
			 */

			$name = $this->getName();

			if (ends_with($name, '[]')) {
				$name = substr($name, 0, -2);
			}

			return old($name);
		}

		return $this->value;
	}

	/**
	 * Changes the control value.
	 * @param mixed $value
	 * @return $this
	 */
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}

	/**
	 * Sets the control value if a model is given.
	 * @param mixed $model
	 * @param string $key
	 * @return $this
	 */
	public function setValueFromModel($model, $key) {
		if (!is_null($model)) {
			$this->value = $model->$key;
			$this->gotValueFromModel = true;
		}

		return $this;
	}

	/**
	 * @return bool
	 */
	public function isAutoValue() {
		return $this->autoValue;
	}

	/**
	 * @param bool $autoValue
	 * @return $this
	 */
	public function setAutoValue($autoValue) {
		$this->autoValue = $autoValue;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isRequired() {
		return $this->required;
	}

	/**
	 * @param bool $required
	 * @return $this
	 */
	public function setRequired($required) {
		$this->required = $required;
		return $this;
	}

}