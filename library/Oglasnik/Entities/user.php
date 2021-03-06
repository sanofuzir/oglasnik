<?php

namespace Oglasnik\Entities;

/**
 * Oglasnik\Entities\User
 *
 * @Table(name="user")
 * @Entity
 */
class User
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false, unique=true)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $username
     *
     * @Column(name="username", type="string", length=255, nullable=false, unique=true)
     */
    private $username;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=128, nullable=false)
     */
    private $password;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=255, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string $status
     *
     * @Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var string $surname
     *
     * @Column(name="surname", type="string", length=128)
     */
    private $surname;

    /**
     * @var string $telephon
     *
     * @Column(name="telephon", type="string", length=128)
     */
    private $telephon;

    /**
     * @OneToMany(targetEntity="Oglasnik\Entities\Ad", mappedBy="user")
     **/
    private $ads;

    public function __construct() {
        $this->ads = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set telephon
     *
     * @param string $telephon
     * @return User
     */
    public function setTelephon($telephon)
    {
        $this->telephon = $telephon;
        return $this;
    }

    /**
     * Get telephon
     *
     * @return string 
     */
    public function getTelephon()
    {
        return $this->telephon;
    }
    public function getNumberOfAds() 
    {
        return $this->ads->count();
    }

    /**
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAds()
    {
        return $this->ads;
    }
    
    public function setCreated()
    {
        // WILL be saved in the database
        $this->updated = new \DateTime("now");
    }
}