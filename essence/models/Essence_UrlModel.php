<?php

namespace Craft;

class Essence_UrlModel extends BaseModel
{
	/**
	 * Constructor
	 * 
	 * @param string $url
	 *
	 * @return Essence_UrlModel
	 */
	public function __construct($url)
	{
		$this->url = $url;
	}

	/**
	 * Returns an embed instance
	 * 
	 * @param array $options
	 *
	 * @return Essence_EmbedModel
	 */
	public function getEmbed(array $options = array())
	{
		$embed = craft()->essence->embed($this->url, $options);

		if (isset($embed->html))
		{
			return $embed;
		}
	}

	/**
	 * @inheritDoc BaseModel::defineAttributes()
	 *
	 * @return string
	 */
	protected function defineAttributes()
	{
		return array(
			'url' => AttributeType::String,
		);
	}

	/**
	 * @inheritDoc BaseModel::validate()
	 *
	 * @return string
	 */
	public function validate()
	{
		// Check if the URL is actually valid
		if (is_null($this->embed))
		{
			return array(
				Craft::t('Invalid or unsupported oEmbed URL.'),
			);
		}

		return parent::validate();
	}

	/**
	 * Returns URL value
	 */
	public function __toString()
	{
		return $this->url;
	}
}
