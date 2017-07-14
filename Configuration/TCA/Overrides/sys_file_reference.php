<?php
defined('TYPO3_MODE') or die();

$temporaryColumn = array(
    'tx_autofill_alternative' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mh_aws_image_analyser/Resources/Private/Language/locallang_backend.xlf:sys_file_reference.tx_autofill_alternative.label',
        'config' => array (
            'type' => 'check',
        )
    )
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'sys_file_reference',
    $temporaryColumn
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'sys_file_reference',
    'imageoverlayPalette',
    'tx_autofill_alternative',
    'after:alternative'
);
