<?php

namespace App\Controller\Admin;

use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SkillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Skill::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('nameEn')->setLabel("Nom (EN)"),
            TextField::new('nameFr')->setLabel("Nom (FR)"),
            TextField::new('description'),
            TextField::new('descriptionEn')->setLabel("Description (EN)"),
            TextField::new('descriptionFr')->setLabel("Description (FR)"),
            AssociationField::new('technologies'),
        ];
    }
}
