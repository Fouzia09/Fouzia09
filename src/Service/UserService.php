<?php

namespace App\Service;

use App\dto\out\CommentOUT;
use App\dto\out\FavoriteOUT;
use App\dto\out\RestaurantOUT;
use App\dto\out\RoomOUT;
use App\dto\out\UserOUT;
use App\Repository\UserRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class UserService 
{
    //private UserRepository $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
	public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Renvoit l'utilisateur avec le pseudo passé en paramètre
     * @param string $username pseudo de l'utilisateur
     * 
     * @return UserOUT
     */
    public function findByUsername(string $username): UserOUT {
        $user = $this->userRepository->findByUsername($username);

        $userToSend = new UserOUT(
            $user->getId(), $user->getUsername(), $user->getName(), $user->getEmail(),
            $user->getSiret(), $user->getRoles(), $user->getCreatedAt()
        );

        if (count($user->getFavorites()) > 0)
        {
            foreach ($user->getFavorites() as $f) {
                $favorite = new FavoriteOUT(
                    $f->getId(), $f->getItemName(), $f->getItemUrl(), $f->getItemImage()
                );
                
                foreach ($f->getUsers() as $u) {
                    $favorite->addUser($u->getId());
                }

                $userToSend->addFavorite($favorite);
            }
        }
        if (count($user->getComments()) > 0)
        {
            foreach ($user->getComments() as $c) {
                $comment = new CommentOUT($c->getId(), $c->getAuthor(), $c->getContent(), $c->getCreatedAt());

                $userToSend->addComment($comment);
            }
        }
        if (count($user->getRestaurants()) > 0)
        {
            foreach ($user->getRestaurants() as $r) {
                $restaurant = new RestaurantOUT($r->getId(), $r->getName(), $r->getDescriptif(),
                    $r->getCountry(), $r->getCity(), $r->getNamePlat(), $r->getPrice(),
                    $r->getImage1(), $r->getImage2(), $r->getCreatedAt(), $r->getDescriptifPlat(),
                    $r->getRangePrice1(), $r->getRangePrice2(), $r->getAddress(),
                    $r->getZipcode(), $r->getIsPublished(), $r->getUpdatedAt(), $r->getSlug());

                $userToSend->addRestaurant($restaurant);
            }
        }
        if (count($user->getRooms()) > 0)
        {
            foreach ($user->getRooms() as $r) {
                $room = new RoomOUT($r->getId(), $r->getName(), $r->getDescriptif(), $r->getCountry(),
                    $r->getCity(), $r->getPrice(), $r->getImage1(), $r->getImage2(), $r->getImage3(),
                    $r->getCreatedAt(), $r->getIsKingSize(), $r->getNbBed(), $r->getSquarFeet(), $r->getAddress(),
                    $r->getZipcode(), $r->getIsPublished(), $r->getUpdatedAt(), $r->getSlug());

                $userToSend->addRoom($room);
            }
        }
        
        return $userToSend;
    }

    public function resetPassword(string $email, MailerInterface $mailer){
        $user = $this->userRepository->findByEmail($email);

        //envoi de mail au client
        $email = (new TemplatedEmail())
            ->from('gyfe@gmail.com')
            ->to($email)
            ->subject('Réinitialisation mot de passe')
            ->htmlTemplate('emails/reset-password.html.twig')
            ->context([
                'password'=>$user->getPlainPassword(),
            ]);

            $mailer->send($email);

            return $user;

    }
}