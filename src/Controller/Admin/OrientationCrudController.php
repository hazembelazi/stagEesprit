<?php

namespace App\Controller\Admin;

use App\Entity\Orientation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OrientationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Orientation::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
