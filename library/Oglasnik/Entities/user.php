<?php

namespace Oglasnik\Entities;;

/**
 * User
 *
 * @Entity
 * @Table(name="user",
 *        uniqueConstraints={@UniqueConstraint(name="name_uk", columns={"name"})}
 * )
 * @HasLifecycleCallbacks
 *
 */
class User 
{
    /**
     * @var integer
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $user_id;
    
    /**
     * @var string
     *
     * @Column(type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @Column(type="string", length=128)
     */
    private $password;

    /**
     * @var string
     *
     * @Column(type="string", length=255)
     */
    private $email;
    
    /**
     * @var string
     *
     * @Column(type="string", length=128)
     */
    private $status;
    
    /**
     * @var string
     *
     * @Column(type="string", length=128)
     */
    private $name;
    
    /**
     * @var string
     *
     * @Column(type="string", length=128)
     */
    private $surname;
    
    /**
     * @var string
     *
     * @Column(type="string", length=128)
     */
    private $telephon;    
}
