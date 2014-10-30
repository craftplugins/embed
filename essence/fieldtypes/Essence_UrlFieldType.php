<?php

namespace Craft;

class Essence_UrlFieldType extends BaseFieldType
{
	/**
	 * @inheritDoc IComponentType::getName()
	 *
	 * @return string
	 */
	public function getName()
	{
		return Craft::t('Essence');
	}

	/**
	 * @inheritDoc IFieldType::getInputHtml()
	 *
	 * @param string $name
	 * @param mixed  $value
	 *
	 * @return string
	 */
	public function getInputHtml($name, $value)
	{
		return craft()->templates->renderMacro('_includes/forms', 'text', array(
			array(
				'name'  => $name,
				'value' => $value,
			),
		));
	}

	/**
	 * @inheritDoc IFieldType::prepValue()
	 *
	 * @param mixed $value
	 *
	 * @return mixed
	 */
	public function prepValue($value)
	{
		if ($value)
		{
			return new Essence_UrlModel($value);
		}
	}

	/**
	 * @inheritDoc IFieldType::validate()
	 *
	 * @param mixed $value
	 *
	 * @return true|string|array
	 */
	public function validate($value)
	{
		return $this->prepValue($value)->validate();
	}
}
