<?php

namespace Oglasnik\Entities;;

/**
 * User
 *
 * @Entity
 * @Table(name="guestbook",
 *        uniqueConstraints={@UniqueConstraint(name="name_uk", columns={"name"})}
 * )
 * @HasLifecycleCallbacks
 *
 */
class Guestbook 
{
    /**
     * @var integer
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $guestbook_id;
    
    /**
     * @var string
     *
     * @Column(type="string", length=255)
     */
    private $email;
    
    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $comment;
}
