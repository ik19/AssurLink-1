<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 31/01/2018
 * Time: 11:25
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_device")
 */
class UserDevice
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="created_at", type="date")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Device", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $device;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var bool
     *
     * @ORM\Column(name="alert", type="boolean")
     */
    private $alert;

    /**
     * @var string
     *
     * @ORM\Column(name="mac_adresse", type="string")
     */
    private $macAdresse;


    public function __construct()
    {
        $this->alert = false;
        $this->createdAt = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param mixed $device
     */
    public function setDevice($device)
    {
        $this->device = $device;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return bool
     */
    public function isAlert(): bool
    {
        return $this->alert;
    }

    /**
     * @param bool $alert
     */
    public function setAlert(bool $alert)
    {
        $this->alert = $alert;
    }

    /**
     * @return string
     */
    public function getMacAdresse(): string
    {
        return $this->macAdresse;
    }

    /**
     * @param string $macAdresse
     */
    public function setMacAdresse(string $macAdresse)
    {
        $this->macAdresse = $macAdresse;
    }


}