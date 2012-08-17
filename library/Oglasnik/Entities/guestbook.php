<?php

namespace Oglasnik\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oglasnik\Entities\Guestbook
 *
 * @ORM\Table(name="guestbook", uniqueConstraints={@ORM\UniqueConstraint(name="name_uk", columns={"name"})})
 * @ORM\Entity
 */
class Guestbook
{
    /**
     * @var integer $guestbook_id
     *
     * @ORM\Column(name="guestbook_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $guestbook_id;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string $comment
     *
     * @ORM\Column(name="comment", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $comment;


    /**
     * Get guestbook_id
     *
     * @return integer 
     */
    public function getGuestbookId()
    {
        return $this->guestbook_id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Guestbook
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
     * Set comment
     *
     * @param string $comment
     * @return Guestbook
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }
}