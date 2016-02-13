<?php 

namespace UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=40, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=40, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=true)
     */
    private $gender;

    public function __construct()
    {
        parent::__construct();
    }

    public function setFirstname($firstname)
    {
    	$this->firstname = $firstname;
    
    	return $this;
    }
    public function getFirstname()
    {
    	return $this->firstname;
    }

    public function setLastname($lastname)
    {
    	$this->lastname = $lastname;
    
    	return $this;
    }
    public function getLastname()
    {
    	return $this->lastname;
    }

    public function setGender($gender)
    {
    	$this->gender = $gender;
    
    	return $this;
    }
    public function getGender()
    {
    	return $this->gender;
    }
}
