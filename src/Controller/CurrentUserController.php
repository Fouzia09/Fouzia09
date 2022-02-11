<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CurrentUserController extends AbstractController
{
    public function currentuser()
    {
        return $this->getUser();
    }
}