<?php

namespace Flynt\Components\BlockModalContent;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'blockModalContent',
        'label' => 'Block: Modal Content',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Text Alignment', 'flynt'),
                'name' => 'textAlignment',
                'type' => 'button_group',
                'choices' => [
                    'textLeft' => '<i class=\'dashicons dashicons-editor-alignleft\' title=\'Align text left\'></i>',
                    'textCenter' => '<i class=\'dashicons dashicons-editor-aligncenter\' title=\'Align text center\'></i>'
                ]
            ],
            [
                'label' => __('Name', 'flynt'),
                'name' => 'modalName',
                'type' => 'text',
                'instructions' => __('This is required and can not contain spaces.', 'flynt'),
                'required' => 1,
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'modalContent',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 1,
                'required' => 1,
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getTheme()
                ]
            ]
        ]
    ];
}
