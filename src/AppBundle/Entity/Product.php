<?php 

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="code", type="string", nullable=false)
     */
    private $code;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var text
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Category", mappedBy="products")
     */
    private $categories;


    public function __construct() {
    	$this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
    	if($this->getName())
    		return $this->getName();
    	else
    		return 'Product';
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

	public function setCode($code) {
		$this->code = $code;
	
		return $this;
	}
	public function getCode() {
		return $this->code;
	}

	public function setPrice($price) {
		$this->price = $price;
	
		return $this;
	}
	public function getPrice() {
		return $this->price;
	}

	public function setContent($content) {
		$this->content = $content;
	
		return $this;
	}
	public function getContent() {
		return $this->content;
	}

	public function setEnabled($enabled) {
		$this->enabled = (Boolean) $enabled;
	
		return $this;
	}
	public function getEnabled() {
		return $this->enabled;
	}

	public function addCategory(Category $category)
	{
		$this->categories->add($category);
	
		return $this;
	}
	public function setCategories($categories)
	{
		return $this->categories = $categories;
	}
	public function removeCategory(Category $category)
	{
		$this->categories->removeElement($category);
	
		return $this;
	}
	public function getCategories()
	{
		return $this->categories;
	}
}
