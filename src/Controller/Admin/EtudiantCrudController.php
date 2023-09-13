<?php
namespace App\Controller\Admin;

use App\Entity\Etudiant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class EtudiantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etudiant::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->onlyOnIndex(),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('identifiant'),
            TextField::new('classeact'),
            TextField::new('classd'),
            TextField::new('departement'),
            NumberField::new('notea'),
            NumberField::new('noteb'),
            NumberField::new('notec'),
            NumberField::new('niveauA'),
            NumberField::new('niveauF'),
            IntegerField::new('score')->onlyOnIndex(),
        ];
    }
}
