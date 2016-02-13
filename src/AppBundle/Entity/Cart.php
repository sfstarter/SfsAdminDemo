<?php 

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cart")
 */
class Cart
{
	use \AppBundle\Model\TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var datetime $date
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
	private $user;

	/**
	 * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Product")
	 */
	private $products;


    public function __construct() {
    	$this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
    	if($this->getId())
    		return 'Cart #'. $this->getId();
    	else
    		return 'Cart';
    }

	public function getId() {
		return $this->id;
	}

	/**
	 * Get date
	 *
	 * @return datetime
	 */
	public function getDate()
	{
		return $this->date;
	}
	/**
	 * Set date
	 *
	 * @param datetime $date
	 */
	public function setDate($date)
	{
		$this->date = $date;
	
		return $this;
	}

	public function setUser($user) {
		$this->user = $user;
	
		return $this;
	}
	public function getUser() {
		return $this->user;
	}
	
	public function addProduct(Product $product)
	{
		$this->products->add($product);
	
		return $this;
	}
	public function setProducts($products)
	{
		return $this->products = $products;
	}
	public function removeProduct(Product $product)
	{
		$this->products->removeElement($product);
	
		return $this;
	}
	public function getProducts()
	{
		return $this->products;
	}
}
