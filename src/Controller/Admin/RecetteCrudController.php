<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RecetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $imageFile = TextareaField::new('imageFile', 'Fichier image :')->setFormType(VichImageType::class);
        $image = ImageField::new('image')->setBasePath('/images')->setLabel('Image');


        $fields = [
            TextField::new('nom', 'Nom de la recette :'),
            AssociationField::new('type', 'Type de recette')->autocomplete(),

            IntegerField::new('nb_personne', 'Nombre de personnes :'),
            TextareaField::new('ingredients', 'Ingredients :'),
            TextareaField::new('la_recette', 'La recette :'),
        ];

        if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL) {
            $fields[] = $image;
        } else  {
            $fields[] = $imageFile;
        }

        return $fields;
    }

}
