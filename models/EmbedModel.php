<?php

/**
 * Embed plugin for Craft CMS
 *
 * Embed Model
 *
 * @author    Joshua Baker
 * @copyright Copyright (c) 2017 Joshua Baker
 * @link      https://joshuabaker.com/
 * @package   Embed
 * @since     0.1.0
 */

namespace Craft;

use Twig_Markup;

class EmbedModel extends BaseModel
{
    protected $strictAttributes = false;

    public function __toString()
    {
        return $this->url;
    }

    public function setAttribute($name, $value)
    {
        if ($name === 'html') {
            $name = 'rawHtml';
        }

        if ($name === 'thumbnailUrl') {
            $name = 'rawThumbnailUrl';
        }

        return parent::setAttribute($name, $value);
    }

    public function getHtml()
    {
        if ($this->rawHtml) {
            $content = $this->rawHtml;
            $charset = craft()->templates->getTwig()->getCharset();

            return new Twig_Markup($content, $charset);
        }
    }

    /**
     * Gets a thumbnail, converting relative to absolute.
     *
     * @return string
     */
    public function getThumbnailUrl()
    {
        if ($this->rawThumbnailUrl) {
            if (UrlHelper::isAbsoluteUrl($this->rawThumbnailUrl)) {
                return $this->rawThumbnailUrl;
            }

            $url = preg_replace('#(https?://[^/]+)#', '$1', $this->url);

            return $url.'/'.ltrim($this->rawThumbnailUrl, '/');
        }
    }
}
