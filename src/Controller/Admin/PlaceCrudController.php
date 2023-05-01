<?php

namespace App\Controller\Admin;

use App\Entity\Place;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlaceCrudController extends AbstractCrudController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

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
        $placesCount = $this->entityManager->getRepository(Place::class)->count([]);

        if ($placesCount > 0) {
            $actions->remove(Crud::PAGE_INDEX, Action::NEW);
            $actions->remove(Crud::PAGE_INDEX, Action::DELETE);
        }

        return $actions;
    }
}
