<?php

/**
 * Embed plugin for Craft CMS
 *
 * Embed FieldType
 *
 * @author    Joshua Baker
 * @copyright Copyright (c) 2017 Joshua Baker
 * @link      https://joshuabaker.com/
 * @package   Embed
 * @since     0.1.0
 */

namespace Craft;

class EmbedFieldType extends BaseFieldType
{
    /**
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('Embed Link');
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        craft()->templates->includeCssResource('embed/css/fields/EmbedFieldType.css');
        craft()->templates->includeJsResource('embed/js/fields/EmbedFieldType.js');

        return craft()->templates->render('embed/fields/EmbedFieldType.twig', [
            'name' => $name,
            'value' => $value,
        ]);
    }

    /**
     * @param string $value
     * @return EmbedModel
     */
    public function prepValue($value)
    {
        return craft()->embed->extract($value) ?: $value;
    }

    public function validate($value)
    {
        $urlValidator = new UrlValidator();

        if (!$urlValidator->validateValue($value)) {
            return 'Must be a valid link.';
        }

        $media = craft()->embed->extract($value);

        if (empty($media)) {
            return 'No information could be extracted from this link.';
        }

        return parent::validate($value);
    }
}
