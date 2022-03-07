<?php


namespace App\Service;


use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Message;

class MailDispatcher
{

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param $email
     * @param $password
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function resetMail($email, $password){
        //envoi de mail au client
        $messages = (new TemplatedEmail())
            ->from('no-reply@y-nissy.com')
            ->to($email)
            ->subject('GEFODI - Nouveau mot de passe : ')
            ->htmlTemplate('emails/form-reset.html.twig')
            ->context([
                'address_email'=> $email,
                'password'=> $password
            ]);

        $this->mailer->send($messages);
    }

}