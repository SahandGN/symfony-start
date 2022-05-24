<?php

namespace App\Menu;

use App\Entity\Hotel;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\Security\Core\Security;


class Builder
{

    private EntityManagerInterface $entityManager;
    private FactoryInterface $factory;
    private Security $security;

    public function __construct(
        FactoryInterface       $factory,
        EntityManagerInterface $entityManager,
        Security               $security
    )
    {
        $this->entityManager = $entityManager;
        $this->factory = $factory;
        $this->security = $security;
    }


    public function mainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', ['route' => 'home']);

        $menu->addChild('About Us', ['route' => 'aboutus']);

        $menu->addChild('Message us', ['route' => 'app_message_new']);

        $hotelsMenu = $menu->addChild('Hotels', ['route' => 'app_hotel_index']);


        /**@var hotel[] hotels */
        $hotels = $this->entityManager->getRepository(Hotel::class)->findAll();

        foreach ($hotels as $hotel) {
            $hotelsMenu->addChild($hotel->getName(), [
                'route' => 'app_hotel_index',
                'routeParameters' => ['{id}' => $hotel->getId()]
            ]);
        }

        if ($this->security->isGranted('IS_AUTHENTICATED_FULLY')) {
            $menu->addChild('Logout', ['route' => 'app_logout']);
        } else {
            $menu->addChild('Login', ['route' => 'login']);
            $menu->addChild('Register', ['route' => 'app_register']);
        }


        return $menu;
    }
}