<?php

namespace App\Controller\Admin;

use App\Entity\Attraction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AttractionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Attraction::class;
    }

    public function createEntity(string $entityFqcn)
    {
        $attraction = new Attraction();
//        $attraction->createdBy($this->getUser());

        return $attraction;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();
        yield TextField::new('name');
        yield TextareaField::new('shortDescription');
        yield TextareaField::new('fullDescription');
        yield NumberField::new('score');

    }

}
