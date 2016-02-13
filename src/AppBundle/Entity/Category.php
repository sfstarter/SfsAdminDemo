<?php 

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Product;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
{
	use \AppBundle\Model\TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40)
     */
	private $name;

	/**
	 * @var text
	 *
	 * @ORM\Column(name="content", type="text", nullable=true)
	 */
	private $content;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="theme_color", type="string", length=10, nullable=true)
	 */
	private $themeColor;

	/**
	 * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Product", inversedBy="categories")
	 */
	private $products;


	public function __construct() {
		$this->products = new \Doctrine\Common\Collections\ArrayCollection();
	}

    public function __toString() {
    	if($this->getName())
    		return $this->getName();
    	else
    		return 'Category';
    }

	public function getId() {
		return $this->id;
	}

	public function setName($name) {
		$this->name = $name;
	
		return $this;
	}
	public function getName() {
		return $this->name;
	}

	public function setContent($content) {
		$this->content = $content;
	
		return $this;
	}
	public function getContent() {
		return $this->content;
	}

	public function setThemeColor($themeColor) {
		$this->themeColor = $themeColor;
	
		return $this;
	}
	public function getThemeColor() {
		return $this->themeColor;
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
