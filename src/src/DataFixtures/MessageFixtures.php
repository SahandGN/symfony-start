<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MessageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $message = new Message();
            $message->setSubject('Message '.$i);
            $message->setUsername('Username'.$i);
            $message->setEmail('Email'.$i);
            $message->setMessage('Message text'.$i);
            $manager->persist($message);
        }

        $manager->flush();
    }
}
