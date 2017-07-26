<?php

/**
 * Embed plugin for Craft CMS
 *
 * Embed Service
 *
 * @author    Joshua Baker
 * @copyright Copyright (c) 2017 Joshua Baker
 * @link      https://joshuabaker.com/
 * @package   Embed
 * @since     0.1.0
 */

namespace Craft;

use Essence\Essence;

class EmbedService extends BaseApplicationComponent
{
    /**
     * @var \Essence\Essence
     */
    protected $essence;

    /**
     * @return \Essence\Essence
     */
    public function getEssence()
    {
        if (is_null($this->essence)) {
            $this->essence = new Essence([
                'filters' => [
                    'OpenGraphProvider' => '~.+~',
                ],
            ]);
        }

        return $this->essence;
    }

    /**
     * @return EmbedModel|null
     */
    public function extract($url, array $options = array())
    {
        $media = $this->getEssence()->extract($url, $options);

        if ($media && ($media->html || $media->thumbnailUrl)) {
            $model = new EmbedModel($media);
            $model->url = $url;

            return $model;
        }
    }
}
