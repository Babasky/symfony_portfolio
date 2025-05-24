<?php

namespace App\Controller\Admin;

use App\Entity\Accueil;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AccueilCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Accueil::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')->setLabel("Nom de la personne"),
            TextField::new('title')->setLabel("Titre de l'emploi"),
            TextField::new('sub_title')->setLabel("Sous-titre"),
            TextField::new('description')->setLabel("Description"),
            ImageField::new('photo')->setLabel("Photo")
            ->setBasePath('uploads/accueil')
            ->setUploadDir('/public/uploads/accueil')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired($pageName === Crud::PAGE_NEW)
        ];
    }
    
}
