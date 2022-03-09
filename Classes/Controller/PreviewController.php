<?php

declare(strict_types=1);

namespace Fsuter\WorkspacePreviewTest\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class PreviewController extends ActionController {
    /**
     * @param string $table
     * @param int $uid
     * @return ResponseInterface
     */
    public function showAction(string $table, int $uid): ResponseInterface
    {
        $error = '';
        if (empty($table)) {
            $error = 'No table name given';
        }
        if (empty($uid)) {
            $error = 'No uid given';
        }
        if (!empty($table) && !empty($uid)) {
            try {
                $record = $this->fetchRecord($uid, $table);
            } catch (\Exception $exception) {
                $error = $exception->getMessage();
            }
        }

        $this->view->assignMultiple(
            [
                'error' => $error,
                'record' => $record
            ]
        );
        return $this->htmlResponse();
    }

    /**
     * @param int $uid
     * @param string $table
     * @return array
     * @throws \Doctrine\DBAL\Exception
     */
    protected function fetchRecord(int $uid, string $table): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($table);
        $row = $queryBuilder->select('*')
            ->from($table)
            ->where(
                $queryBuilder->expr()->eq('uid', $uid)
            )
            ->executeQuery()
            ->fetchAssociative();
        if ($row === false) {
            throw new \Doctrine\DBAL\Exception(
                sprintf(
                    'No record found for table %s and uid %d',
                    $table,
                    $uid
                ),
                1640167389
            );
        }

        // Apply workspace overlays for preview
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);
        $pageRepository->versionOL(
            $table,
            $row
        );

        return $row;
    }
}
