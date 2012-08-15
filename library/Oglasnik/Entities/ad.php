<?php

namespace Oglasnik\Entities;;

/**
 * User
 *
 * @Entity
 * @Table(name="ad",
 *        uniqueConstraints={@UniqueConstraint(name="name_uk", columns={"name"})}
 * )
 * @HasLifecycleCallbacks
 *
 */
class Ad 
{
    /**
     * @var integer
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $ad_id;
    
    /**
     * @var string
     *
     * @Column(type="string", length=255)
     */
    private $name;
    
    /**
     * @var integer
     *
     * @Column(type="integer", nullable=true)
     */
    private $price;
    
    /**
     * @var string
     *
     * @Column(type="string", length=255)
     */
    private $description;
    
    /**
     * @var string
     *
     * @Column(type="string", length=255)
     */
    private $status;
    
    /**
     * @var datetime
     *
     * @Column(type="datetime")
     */
    private $created;
    
    /**
     * @var User
     *
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id",nullable=false)
     *
     */
    private $user_id;
    
    /**
     * @var Category
     *
     * @ManyToOne(targetEntity="Category")
     * @JoinColumn(name="category_id", referencedColumnName="id",nullable=false)
     *
     */
    private $category_id;
}
