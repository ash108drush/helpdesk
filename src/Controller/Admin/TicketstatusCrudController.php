<?php

namespace App\Controller\Admin;

use App\Entity\Ticketstatus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TicketstatusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ticketstatus::class;
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
