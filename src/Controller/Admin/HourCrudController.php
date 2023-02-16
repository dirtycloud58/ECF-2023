<?php

namespace App\Controller\Admin;

use App\Entity\Hour;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class HourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hour::class;
    }


    public function configureFields(string $pageName): iterable
    {

        return [
            TextField::new('day'),
            TimeField::new('noonOpening'),
            TimeField::new('noonClosing'),
            TimeField::new('eveningOpening'),
            TimeField::new('eveningClosing'),
        ];
    }
}
