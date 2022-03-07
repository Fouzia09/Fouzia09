<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MailDispatcher;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Service\PasswordGenerator;

/**
* @Route("/api/users")
*/
class ResetPasswordController extends AbstractController
{
    /**
     * @Route("/reset/password/{email}", name="reset_password", methods={"GET","POST"})
     * @param string $email
     * @return Response
     */
    public function reset(string $email, PasswordGenerator $passwordGenerator, UserPasswordEncoderInterface $passwordEncoder, MailDispatcher $mailDispatcher): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findByEmail($email);
        $user = $user[0];
        $password = $passwordGenerator->generateRandomStrongPassword();
        if ($user != null) { 
            $user->setPassword(
                $passwordEncoder->encodePassword( 
                    $user,
                    $password
                ));
            $entityManager->persist($user);
            $entityManager->flush();
            //$this->addFlash('email_psw_message', ' Un message vous a été envoyé.');

            //envoi du mail
            $mailDispatcher->resetMail($user->getEmail(), $password);

            return $this->json($user, Response::HTTP_OK, [], ['groups' => ['user:read']]);
        }else {
			return $this->json(['status' => Response::HTTP_NOT_FOUND, 'message' => 'No data found'], 200);
		}
    }
}