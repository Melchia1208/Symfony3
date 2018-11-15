<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 15/11/18
 * Time: 14:57
 */

namespace App\Form;


use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('Title', TextType::class);
        $builder->add('Content', TextareaType::class);
        $builder->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
            ]);
        $builder->add('Envoyer', SubmitType::class);
    }
}