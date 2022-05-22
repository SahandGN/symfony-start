<?php

namespace App\DataFixtures;

use App\Entity\Hotel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HotelFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $hotel = new Hotel();
            $hotel->setName('Hotel '.$i);
            $hotel->setAddress('Address'.$i);
            $hotel->setPhone($i);
            $hotel->setStars(mt_rand(1, 10));
            $manager->persist($hotel);
        }

        $manager->flush();
    }
}
