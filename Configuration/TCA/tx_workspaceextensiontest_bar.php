<?php

return [
    'ctrl' => [
        'title' => 'Foo table',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'versioningWS' => true,
        'searchFields' => 'title',
        'typeicon_classes' => [
            'default' => 'mimetypes-application'
        ],
    ],
    'types' => [
        0 => [
            'showitem' => 'hidden, title'
        ]
    ],
    'columns' => [
        'hidden' => [
            'exclude' => false,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    [
                        0 => '',
                    ],
                ],
            ],
        ],
        'title' => [
            'exclude' => false,
            'label' => 'Title',
            'config' => [
                'type' => 'input',
                'required' => true,
                'eval' => 'trim'
            ]
        ]
    ]
];
