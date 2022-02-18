<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;

class ResetPasswordController extends AbstractController
{
    public function __invoke(User $data, MailerInterface $mailer): User
    {
        //envoi de mail au client
        $email = (new TemplatedEmail())
            ->from('emery@gmail.com')
            ->to('emery3@gmail.com')
            ->subject('Réinitialisation mot de passe')
            ->htmlTemplate('emails/reset-password.html.twig')
            ->context([
                'password'=>$data->getPlainPassword(),
            ]);

            $mailer->send($email);

            return $data;
        
    }
}
