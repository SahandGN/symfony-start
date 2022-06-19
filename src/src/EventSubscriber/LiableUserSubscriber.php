<?php

namespace App\EventSubscriber;

use App\Entity\User;
use App\Model\LiableUserInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class LiableUserSubscriber implements EventSubscriber
{


    private TokenStorageInterface $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
            Events::preUpdate,
        ];
    }


    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        /** @var User $user */
        $user = $this->tokenStorage->getToken()->getUser();

        if($user == null){
            return;
        }


        if ($entity instanceof LiableUserInterface) {
            $entity->setCreatorUser($user->getEmail());
            $entity->setUpdaterUser($user->getEmail());
        }

    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        /** @var User $user */
        $user = $this->tokenStorage->getToken()->getUser();

        if($user == null){
            return;
        }

        if ($entity instanceof LiableUserInterface) {
            $entity->setUpdaterUser($user);
        }

    }
}
