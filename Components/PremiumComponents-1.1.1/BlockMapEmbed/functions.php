<?php

namespace Flynt\Components\BlockMapEmbed;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'BlockMapEmbed',
        'label' => 'Block: Map Embed',
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 1,
                'delay' => 1,
                'instructions' => __('The content overlaying the image. Character Recommendations: Title: 30-100, Content: 80-250.', 'flynt'),
            ],
            [
                'label' => __('Google Maps Api Key', 'flynt'),
                'name' => 'googleMapsApiKey',
                'type' => 'text',
                'maxlength' => 100,
                'prepend' => '',
                'append' => '',
                'placeholder' => ''
            ],
            [
                'label' => 'Gmaps Fields',
                'name' => 'gmaps',
                'type' => 'google_map',
                'title' => 'Google Maps Embed',
                'sub_fields' => [
                    [
                        'label' => 'Google Map',
                        'name' => 'google_map',
                        'type' => 'google_map',
                        'center_lat' => '',
                        'center_lng' => '',
                        'zoom' => '',
                        'height' => '',
                        'name' => 'someshit',
                        'label' => '',
                        'type' => 'text',
                    ],
                ],
            ],
            [
                'label' => __('Map Marker Info Window', 'flynt'),
                'name' => 'markerInfo',
                'type' => 'text',
                'instructions' => __('The content that will display when a user clicks on the map marker', 'flynt'),
            ],
        ]
    ];
}
