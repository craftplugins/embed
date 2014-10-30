<?php

namespace Craft;

use \Essence\Configurable as EssenceConfigurable;

class Essence_EmbedModel extends \Twig_Markup
{
	use EssenceConfigurable;

	/**
	 * Configurable properties
	 */
	protected $_properties = array();

	/**
	 * Constructor
	 */
	public function __construct($url, array $options = array())
	{
		// Generate a cache key, which we’ll use to cache the result
		array_multisort($options);
		$cacheId = md5($url . json_encode($options));

		// Check cache for media properties
		$mediaProperties = craft()->cache->get($cacheId);

		if (empty($mediaProperties))
		{
			// Make a call via our essence instance
			$media = craft()->essence->container->embed($url, $options);

			if ($media)
			{
				// Get the properties from the essence media instance
				$mediaProperties = $media->properties();

				// Save the properties to the cache
				craft()->cache->set($cacheId, $mediaProperties);
			}
		}

		if ($mediaProperties)
		{
			// Merge the properties into this embed instance
			$this->setProperties($mediaProperties);

			// Update the content value for Twig Markup
			$this->content = $mediaProperties['html'];

			// Set the HTML value to return this Twig Markup instance, so that too renders HTML without having to use the |raw Twig filter
			$this->html = $this;
		}
	}
}
