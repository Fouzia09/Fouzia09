<?php

namespace App\Service;

class PasswordGenerator
{
    public function generateRandomStrongPassword(int $length = 10): string
    {
        $char = "aaabbbcccdddeeeafffggghhhiiijjj!%@&;$+=?kkklllmmmnnnooopppaqqqrrrssstttuuuvvvawww!%@&;$+=?xxxyyyzzz000111222333444555666777888999!%@&;$+=?AAAaBBBCCCDDDEEEFFFGGG!%@&;$+=?HHHIIIJJJKKKLLLMMMNNNOOOPPPQQQRRRSSST!%@&;$+=?TTUUUVVVWWWXXXYYYZZZ";
        // on mélange la chaine avec la fonction str_shuffle(), propre à PHP
        $char = str_shuffle($char);
        // ensuite on coupe à la longueur voulue avec la fonction substr(), propre à PHP aussi
        $char = substr($char,0,$length);
        // ensuite on retourne notre chaine aléatoire de "longueur" caractères:
        return $char;
    }
}