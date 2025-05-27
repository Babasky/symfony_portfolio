<?php

namespace App\Controller\Admin;

use App\Entity\About;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AboutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return About::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('titleEn')->setLabel("Title (EN)"),
            TextField::new('titleFr')->setLabel("Title (FR)"),
            TextField::new('description'),
            TextField::new('descriptionEn')->setLabel("Description (EN)"),
            TextField::new('descriptionFr')->setLabel("Description (FR)"),
          Field::new('cvFile')
            ->setFormType(VichFileType::class)
            ->setLabel('Curriculum Vitae (PDF)')
            ->setRequired(false)
            ->onlyOnForms(),
            TextField::new('cv')
                ->setLabel('Nom du fichier')
                ->onlyOnIndex(),
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
