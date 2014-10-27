<?php

namespace Craft;

class EssencePlugin extends BasePlugin
{
	public function init()
	{
		// Autoload Composer packages
		require_once __DIR__ . '/vendor/autoload.php';

		parent::init();
	}

	public function getName()
	{
		return 'Essence';
	}

	public function getVersion()
	{
		return '0.1.1';
	}

	public function getDeveloper()
	{
		return 'Joshua Baker';
	}

	public function getDeveloperUrl()
	{
		return 'http://joshuabaker.com/';
	}
}
