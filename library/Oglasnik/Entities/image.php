<?php

namespace Oglasnik\Entities;;

/**
 * User
 *
 * @Entity
 * @Table(name="image",
 *        uniqueConstraints={@UniqueConstraint(name="name_uk", columns={"name"})}
 * )
 * @HasLifecycleCallbacks
 *
 */
class Image 
{
    /**
     * @var integer
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $image_id;
    
    /**
     * @var string
     *
     * @Column(type="string", length=255)
     */
    private $name;
    
    /**
     * @var Ad
     *
     * @ManyToOne(targetEntity="Ad")
     * @JoinColumn(name="ad_id", referencedColumnName="id",nullable=false)
     *
     */
    private $ad_id;
}
