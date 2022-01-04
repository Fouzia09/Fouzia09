<?php

namespace App\Service;

use Doctrine\DBAL\Driver\Connection;
use App\Repository\CommentRepository;

class CommentService 
{
    private CommentRepository $commentRepository;

    /**
     * CommentService constructor.
     * @param CommentRepository $commentRepository
     */
	public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Tous les commentaires en fonction de la page
     * @param string $page "room" ou "restaurant"
     * @param int $pageId id de la page
     * 
     * @return CommentOUT[]
     */
    public function findByPage(string $page, int $pageId): array {

        $comments[] = [];

        $comments = $this->commentRepository->findByPage($page, $pageId);

        return $comments;
    }
}