<?php

namespace Acme\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductKeys
 *
 * @ORM\Table(name="product_keys", indexes={@ORM\Index(name="product_id", columns={"product_id"}), @ORM\Index(name="test1_id", columns={"test1_id"})})
 * @ORM\Entity
 */
class ProductKeys
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=true)
     */
    private $productId;

    /**
     * @var integer
     *
     * @ORM\Column(name="test1_id", type="integer", nullable=true)
     */
    private $test1Id;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;



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
     * Set productId
     *
     * @param integer $productId
     * @return ProductKeys
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set test1Id
     *
     * @param integer $test1Id
     * @return ProductKeys
     */
    public function setTest1Id($test1Id)
    {
        $this->test1Id = $test1Id;

        return $this;
    }

    /**
     * Get test1Id
     *
     * @return integer 
     */
    public function getTest1Id()
    {
        return $this->test1Id;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     * @return ProductKeys
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer 
     */
    public function getSort()
    {
        return $this->sort;
    }
}
