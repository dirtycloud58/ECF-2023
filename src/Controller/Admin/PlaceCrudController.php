<?php

namespace App\Controller\Admin;

use App\Entity\Place;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class PlaceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Place::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('guestsNoon'),
            IntegerField::new('guestsEvening')

        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}
