<?php

namespace Craft;

class EssenceVariable
{
	public function embed($url, array $options = array())
	{
		return craft()->essence->embed($url, $options);
	}
}
