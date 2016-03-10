<?php

namespace Craft;

use \Essence\Essence;

class EssenceService extends BaseApplicationComponent
{
    /**
     * @var Essence
     */
    protected $container;

    /**
     * Returns config for this plugin.
     *
     * @return array
     */
    public function getConfig()
    {
        return craft()->config->get('essence') ?: array();
    }

    /**
     * Returns an instance of Essence.
     *
     * @return Essence
     */
    public function getContainer()
    {
        if (is_null($this->container))
        {
            // Create an Essence instance
            $this->container = new Essence($this->config);
        }

        return $this->container;
    }

    /**
     * Returns an embed model.
     *
     * @var string $url
     * @var array  $options
     *
     * @return Essence_EmbedModel
     */
    public function embed($url, array $options = array())
    {
        return new Essence_EmbedModel($url, $options);
    }
}
