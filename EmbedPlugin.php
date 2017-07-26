<?php

/**
 * Embed plugin for Craft CMS
 *
 * Craft CMS plugin that extracts information about web pages, like Youtube videos, Twitter statuses or blog articles.
 *
 * @author    Joshua Baker
 * @copyright Copyright (c) 2017 Joshua Baker
 * @link      https://joshuabaker.com/
 * @package   Embed
 * @since     0.1.0
 */

namespace Craft;

class EmbedPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        require_once __DIR__.'/vendor/autoload.php';

        parent::init();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Embed');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Craft CMS plugin that extracts information about web pages, like Youtube videos, Twitter statuses or blog articles.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/joshuabaker/craft-embed/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/joshuabaker/craft-embed/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '0.1.1';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Joshua Baker';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://joshuabaker.com/';
    }
}
