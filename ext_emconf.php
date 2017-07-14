<?php
/** @var string $_EXTKEY */
$EM_CONF[$_EXTKEY] = [
    'title' => 'AWS Image Analyser',
    'description' => 'Auto fill your "alternative"-Tags of your images with Amazon Rekognition image detection.',
    'category' => 'be',
    'version' => '0.0.0',
    'state' => 'beta',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearcacheonload' => false,
    'author' => 'Markus Hoelzle',
    'author_email' => 'typo3@markus-hoelzle.de',
    'author_company' => '',
    'constraints' =>
        [
            'depends' =>
                [
                    'typo3' => '8.7.0-9.99.99',
                ],
            'conflicts' => [],
            'suggests' => [],
        ],
];
