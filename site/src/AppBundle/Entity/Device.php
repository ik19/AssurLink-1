<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Device
 *
 * @ORM\Table(name="device")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeviceRepository")
 */
class Device
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="macAdresse", type="string", length=255)
     */
    private $macAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="alert", type="boolean")
     */
    private $alert;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * @param User $User
     */
    public function setUser(User $User)
    {
        $this->User = $User;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set macAdresse
     *
     * @param string $macAdresse
     *
     * @return Device
     */
    public function setMacAdresse($macAdresse)
    {
        $this->macAdresse = $macAdresse;

        return $this;
    }

    /**
     * Get macAdresse
     *
     * @return string
     */
    public function getMacAdresse()
    {
        return $this->macAdresse;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Device
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
     * Set alert
     *
     * @param boolean $alert
     *
     * @return Device
     */
    public function setAlert($alert)
    {
        $this->alert = $alert;

        return $this;
    }

    /**
     * Get alert
     *
     * @return bool
     */
    public function getAlert()
    {
        return $this->alert;
    }
}

