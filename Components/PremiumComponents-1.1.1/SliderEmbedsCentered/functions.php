<?php

namespace Flynt\Components\sliderEmbedsCentered;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=sliderEmbedsCentered', function ($data) {
    $translatableOptions = Options::getTranslatable('SliderOptions');
    $data['jsonData'] = [
        'options' => array_merge($translatableOptions, $data['options']),
    ];

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'sliderEmbedsCentered',
        'label' => 'Slider: Embeds Centered',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'preContentHtml',
                'type' => 'wysiwyg',
                'media_upload' => 0,
            ],
            [
                'label' => __('Embed Scripts', 'flynt'),
                'name' => 'embedScripts',
                'type' => 'repeater',
                'layout' => 'row',
                'min' => 1,
                'button_label' => __('Add Another Embed', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Embed Script or iFrame', 'flynt'),
                        'name' => 'wEmbed',
                        'type' => 'wysiwyg',
                        'instructions' => 'Paste the virtual tour iframe code that comes from Matterport here.',
                        //'required'=> 1,
                        //'conditional_logic'=> 0,
                        // 'wrapper'=> [
                        //     'width'=> '',
                        //     'class'=> '',
                        //     'id'=> ''
                        // ]
                    ],
                ],
            ],
        ]
    ];
}
