<?php

/**
 * Embed plugin for Craft CMS
 *
 * Embed Variable
 *
 * @author    Joshua Baker
 * @copyright Copyright (c) 2017 Joshua Baker
 * @link      https://joshuabaker.com/
 * @package   Embed
 * @since     0.1.0
 */

namespace Craft;

class EmbedVariable
{
    public function extract($url, array $options = array())
    {
        return craft()->embed->extract($url, $options);
    }
}
