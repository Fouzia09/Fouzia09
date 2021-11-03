<?php

// src/DataPersister

namespace App\DataPersister;

use App\Entity\Room;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\String\Slugger\SluggerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

/**
 *
 */
class RoomDataPersister implements ContextAwareDataPersisterInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $_entityManager;
    private $_slugger;

    /**
     * @param Security
     */
    private $_security;

    public function __construct(
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger,
        RequestStack $request,
        Security $security
    ) {
        $this->_entityManager = $entityManager;
        $this->_slugger = $slugger;
        $this->_request = $request->getCurrentRequest();
        $this->_security = $security;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Room;
    }

    /**
     * @param Room $data
     */
    public function persist($data, array $context = [])
    {
        // Update the slug only if the room isn't published
        if (!$data->getIsPublished()) {
            $data->setSlug(
                $this
                    ->_slugger
                    ->slug(strtolower($data->getName())). '-' .uniqid()
            );
        }

        // Set the author if it's a new room
        if ($this->_request->getMethod() === 'POST') {
            $data->setAuthor($this->_security->getUser());
        }

        // Set the updatedAt value if it's not a POST request
        if ($this->_request->getMethod() !== 'POST') {
            $data->setUpdatedAt(new \DateTime());
        }

        $this->_entityManager->persist($data);
        $this->_entityManager->flush();
    }

    public function remove($data, array $context = [])
    {
        $this->_entityManager->remove($data);
        $this->_entityManager->flush();
    }
}