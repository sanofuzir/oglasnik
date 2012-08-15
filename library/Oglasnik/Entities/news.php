<?php

namespace Oglasnik\Entities;;

/**
 * User
 *
 * @Entity
 * @Table(name="news",
 *        uniqueConstraints={@UniqueConstraint(name="name_uk", columns={"name"})}
 * )
 * @HasLifecycleCallbacks
 *
 */
class News 
{
    /**
     * @var integer
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $news_id;
    
    /**
     * @var string
     *
     * @Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $text;

    /**
     * @var string
     *
     * @Column(type="string", length=3)
     */
    private $active;
    
    /**
     * @var User
     *
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="ad_id", referencedColumnName="id",nullable=false)
     *
     */
    private $user_id;
}
