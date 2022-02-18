<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/users")
 */
class UserController extends AbstractController
{
    //private UserService $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
	public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @Route("/findByUsername/{username}", name="findUser")
     * @param string $username
     * 
     * @return Response
     */
	public function findByUsername(string $username): Response
	{
        $user = $this->userService->findByUsername($username);

		if ($user != null) {
			return $this->json($user, Response::HTTP_OK, [], ['groups' => ['user:read']]);
		} else {
			return $this->json(['status' => Response::HTTP_NOT_FOUND, 'message' => 'No data found'], 200);
		}
	}

    /**
     * @Route("/resetPassword/{email}", name="resetPassword")
     * @param string $email
     * 
     * @return Response
     */
	public function resetPassword(string $email, MailerInterface $mailer): Response
	{
        $user = $this->userService->resetPassword($email, $mailer);

		if ($user != null) {
			return $this->json($user, Response::HTTP_OK, [], ['groups' => ['user:read']]);
		} else {
			return $this->json(['status' => Response::HTTP_NOT_FOUND, 'message' => 'No data found'], 200);
		}
	}
}
