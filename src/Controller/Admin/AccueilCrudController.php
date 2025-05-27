<?php

namespace App\Controller\Admin;

use App\Entity\Accueil;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
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
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('name')->setLabel("Nom de la personne"),
            TextField::new('title')->setLabel("Titre de l'accueil"),
            TextField::new('titleEn')->setLabel("Titre de l'accueil (EN)"),
            TextField::new('titleFr')->setLabel("Titre de l'accueil (FR)"),
            TextField::new('sub_title')->setLabel("Sous-titre"),
            TextField::new('sub_titleEn')->setLabel("Sous-titre (EN)"),
            TextField::new('sub_titleFr')->setLabel("Sous-titre (FR)"),
            TextField::new('description')->setLabel("Description"),
            TextField::new('descriptionEn')->setLabel("Description (EN)"),
            TextField::new('descriptionFr')->setLabel("Description (FR)"),
            ImageField::new('photo')->setLabel("Photo")
            ->setBasePath('uploads/accueil')
            ->setUploadDir('/public/uploads/accueil')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired($pageName === Crud::PAGE_NEW)
        ];
    }

     public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::EDIT)
            ->add(Crud::PAGE_NEW, Action::NEW);
    }
    
}
