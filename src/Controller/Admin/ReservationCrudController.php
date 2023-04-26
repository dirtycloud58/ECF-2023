<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            NumberField::new('guests'),
            DateField::new('date'),
            TextField::new('hour'),
            AssociationField::new('allergies')
                ->setFormTypeOption('choice_label', 'name')
                ->setFormTypeOption('by_reference', true)
                ->formatValue(function ($value, $entity) {
                    $allergyNames = [];
                    foreach ($entity->getAllergies() as $allergy) {
                        $allergyNames[] = $allergy->getName();
                    }
                    return implode(', ', $allergyNames);
                })
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}
