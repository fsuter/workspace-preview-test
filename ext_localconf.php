<?php

// Register FE plugin
use Fsuter\WorkspacePreviewTest\Controller\PreviewController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::configurePlugin(
    'Form',
    'Formframework',
    [PreviewController::class => 'show'],
    [PreviewController::class => 'show']
);
