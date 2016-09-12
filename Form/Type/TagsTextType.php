<?php

namespace Dywee\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Routing\RouterInterface;

/**
 * Tags text Type
 */
class TagsTextType extends AbstractType
{
    /**
     * @var RouterInterface $route
     */
    private $router;

    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'required' => false,
            'label'    => 'Tag',
            'attr'     => [
                'placeholder' => 'séparez les tags par une virgule',
                'data-ajax'   => $this->router->generate('dywee_tags_json'),
            ],
            'class' => 'Dywee\BlogBundle\Entity\ArticleTag'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'tagsText';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'genemu_jqueryselect2_entity';
    }
}