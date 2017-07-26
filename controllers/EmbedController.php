<?php

/**
 * Embed plugin for Craft CMS
 *
 * Embed Controller
 *
 * @author    Joshua Baker
 * @copyright Copyright (c) 2017 Joshua Baker
 * @link      https://joshuabaker.com/
 * @package   Embed
 * @since     0.1.0
 */

namespace Craft;

class EmbedController extends BaseController
{
    public function actionExtract()
    {
        $url = craft()->request->getRequiredParam('url');

        if ($url) {
            $media = craft()->embed->extract($url);

            if ($media) {
                $this->renderTemplate('embed/media/html', [
                    'media' => $media,
                ]);
            }
        }

        throw new HttpException(404);
    }
}
