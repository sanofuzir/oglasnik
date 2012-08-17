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
     * @var integer $user_id
     *
     * @Column(name="user_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $user_id;

    /**
     * @var string $username
     *
     * @Column(name="username", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $username;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=128, precision=0, scale=0, nullable=false, unique=false)
     */
    private $password;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string $status
     *
     * @Column(name="status", type="string", length=128, precision=0, scale=0, nullable=false, unique=false)
     */
    private $status;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=128, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string $surname
     *
     * @Column(name="surname", type="string", length=128, precision=0, scale=0, nullable=false, unique=false)
     */
    private $surname;

    /**
     * @var string $telephon
     *
     * @Column(name="telephon", type="string", length=128, precision=0, scale=0, nullable=false, unique=false)
     */
    private $telephon;


    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
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
}