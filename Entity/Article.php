<?php

namespace Dywee\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dywee\CoreBundle\Traits\Picture;
use Dywee\CoreBundle\Traits\Seo;
use Dywee\UserBundle\Entity\UserInterface;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Dywee\BlogBundle\Repository\ArticleRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Article
{
    use Picture;
    use TimestampableEntity;
    use Seo;

    const STATE_DRAFT = 'draft';
    const STATE_PUBLISHED = 'published';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255, nullable=true)
     */
    private $locale;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="string", length=25)
     */
    private $state = self::STATE_DRAFT;


    /**
     * @ORM\ManyToOne(targetEntity="Dywee\CoreBundle\Model\UserInterface")
     * @ORM\JoinColumn(nullable=false)
     * @var UserInterface
     */
    private $createdBy;

    /**
     * @ORM\ManyToMany(targetEntity="Dywee\BlogBundle\Entity\ArticleTag", inversedBy="articles")
     */
    private $tags;

    protected $tagsText;


    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


    /**
     * Set state
     *
     * @param integer $state
     * @return Article
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Article
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }


    /**
     * Set createdBy
     *
     * @param UserInterface $createdBy
     * @return Article
     */
    public function setCreatedBy(UserInterface $createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return UserInterface
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
