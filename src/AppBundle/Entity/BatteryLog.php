<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Battery log entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BatteryLogRepository")
 * @ORM\HasLifecycleCallbacks
 */
class BatteryLog
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     *
     * @var string
     */
    protected $type;

    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    protected $count;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     *
     * @var \DateTime
     */
    protected $addedAt;

    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \DateTime
     */
    public function getAddedAt()
    {
        return $this->addedAt;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param \DateTime $addedAt
     */
    public function setAddedAt($addedAt)
    {
        $this->addedAt = $addedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function onAddNewLog()
    {
        $this->setAddedAt(new \DateTime());
    }

    /**
     * @return number
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param number $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }
}
