<?php

namespace Oglasnik\Entities;;

/**
 * User
 *
 * @Entity
 * @Table(name="category",
 *        uniqueConstraints={@UniqueConstraint(name="name_uk", columns={"name"})}
 * )
 * @HasLifecycleCallbacks
 *
 */
class Category 
{
    /**
     * @var integer
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $category_id;
    
    /**
     * @var string
     *
     * @Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(type="string", length=255)
     */
    private $subcategory; 
}
