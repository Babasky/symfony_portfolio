<?php

namespace App\Controller\Admin;

use App\Entity\Tech;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TechCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tech::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('pourcentage'),
            AssociationField::new('skills'),
        ];
    }

}
