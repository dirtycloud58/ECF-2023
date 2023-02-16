<?php

namespace App\Controller\Admin;

use App\Entity\Formule;
use App\Entity\Menu;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FormuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formule::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('Menu'),
            TextField::new('title'),
            TextField::new('annotation'),
            textfield::new('description'),
            NumberField::new('price'),
        ];
    }
}
