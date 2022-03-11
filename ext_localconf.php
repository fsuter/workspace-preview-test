<?php

// Register FE plugin
use Fsuter\WorkspacePreviewTest\Controller\PreviewController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::configurePlugin(
    'WorkspacePreviewTest',
    'Preview',
    [PreviewController::class => 'show'],
    [PreviewController::class => 'show']
);
