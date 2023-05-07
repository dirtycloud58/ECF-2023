<?php

namespace App\Controller\Admin;

use App\Entity\Galery;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GaleryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Galery::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('name'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('file')->setBasePath('uploads/images/')->onlyOnIndex(),
            DateField::new('createAt'),

        ];
    }
}
