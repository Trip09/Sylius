<?php

namespace Sylius\Candibambu\ProductBundle\Entity;

use A2lix\I18nDoctrineBundle\Doctrine\Interfaces\OneLocaleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product translation entity.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class ProductTranslation implements OneLocaleInterface
{
    use \A2lix\I18nDoctrineBundle\Doctrine\ORM\Util\Translation;

    /**
     * @ORM\Column
     */
    protected $slug;

    /**
     * @ORM\Column
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="string", columnDefinition="short_description")
     */
    protected $shortDescription;

    /**
     * @var \Sylius\Candibambu\ProductBundle\Entity\Product
     */
    protected $product;
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
     * Set slug
     *
     * @param string $slug
     * @return ProductTranslation
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ProductTranslation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ProductTranslation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set object
     *
     * @param \Sylius\Candibambu\ProductBundle\Entity\Product $product
     * @return ProductTranslation
     */
    public function setProduct(\Sylius\Candibambu\ProductBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get object
     *
     * @return \Sylius\Candibambu\ProductBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return ProductTranslation
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }
}
