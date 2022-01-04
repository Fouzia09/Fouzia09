<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Service\CommentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/comments")
 */
class CommentController extends AbstractController
{
    private CommentService $commentService;

    /**
     * CommentController constructor.
     * @param CommentService $commentService
     */
	public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * @Route("/{page}/{pageId}", name="findComments")
     * @param string $page
     * @param int $pageId
     * 
     * @return Response
     */
	public function find(string $page, int $pageId): Response
	{
        $comments = $this->commentService->findByPage($page, $pageId);

		if (sizeof($comments) > 0) {
			return $this->json($comments, Response::HTTP_OK, [], ['groups' => ['comment:read']]);
		} else {
			return $this->json(['status' => Response::HTTP_NOT_FOUND, 'message' => 'No data found'], 200);
		}
	}
}
