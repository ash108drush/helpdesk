<?php

namespace App\Controller\Admin;

use App\Entity\Workers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WorkersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Workers::class;
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
