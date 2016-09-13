<?php

namespace Dywee\BlogBundle\Form;

use Dywee\BlogBundle\Entity\Article;
use Dywee\CoreBundle\Form\Type\ImageType;
use Dywee\CoreBundle\Form\Type\SeoType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = array(
            Article::STATE_DRAFT => Article::STATE_DRAFT,
            Article::STATE_PUBLISHED => Article::STATE_PUBLISHED
        );

        $builder
            ->add('title',              TextType::class)
            ->add('image',              ImageType::class,    array('required' => false))
            ->add('content',            CKEditorType::class)
            ->add('seo',                SeoType::class)
            ->add('state',              ChoiceType::class,   array('choices' => $choices))
            //->add('tagsText',           TextType::class,     array('required' => false, 'label' => 'Tags'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dywee\BlogBundle\Entity\Article'
        ));
    }
}
