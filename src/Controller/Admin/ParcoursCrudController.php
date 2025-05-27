<?php

namespace App\Controller\Admin;

use App\Entity\Parcours;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ParcoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Parcours::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('titleEn', 'Title (EN)'),
            TextField::new('titleFr', 'Title (FR)'),    
            TextField::new('sub_title'),
            TextField::new('subTitleEn', 'Sub Title (EN)'),
            TextField::new('subTitleFr', 'Sub Title (FR)'),
            TextField::new('description'),
            TextField::new('descriptionEn', 'Description (EN)'),
            TextField::new('descriptionFr', 'Description (FR)'),
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
