<?php

namespace App\Menu;

use App\Entity\Hotel;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder
{

    private EntityManagerInterface $entityManager;
    private FactoryInterface $factory;

    public function __construct(
        FactoryInterface $factory,
        EntityManagerInterface $entityManager
    )
    {
        $this->entityManager = $entityManager;
        $this->factory = $factory;
    }


    public function mainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', ['route' => 'home']);

        $menu->addChild('About Us', ['route' => 'aboutus']);

        $menu->addChild('Message us', ['route' => 'app_message_new']);

        $hotelsMenu = $menu->addChild('Hotels',['route'=> 'app_hotel_index']);


        /**@var hotel[] hotels*/
        $hotels = $this->entityManager->getRepository(Hotel::class)->findAll();

        foreach ($hotels as $hotel){
            $hotelsMenu->addChild($hotel->getName(),[
                'route'=>'app_hotel_index',
                'routeParameters' => ['{id}' => $hotel->getId() ]
            ]);
        }


        $menu->addChild('Login', ['route' => 'login']);
        $menu->addChild('Logout', ['route' => 'app_logout']);





        return $menu;
    }
}