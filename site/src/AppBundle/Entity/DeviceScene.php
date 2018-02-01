<?php
/**
 * Created by PhpStorm.
 * User: nasri
 * Date: 30/01/2018
 * Time: 15:25
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="device_scene")
 */
class DeviceScene
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
    private $created_at;

    /**
     * @ORM\Column(name="update_at", type="date")
     */
    private $update_at;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Device")
     * @ORM\JoinColumn(nullable=false)
     */
    private $device;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Scene", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $scene;

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->update_at  = new \DateTime();
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
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * @param mixed $update_at
     */
    public function setUpdateAt($update_at)
    {
        $this->update_at = $update_at;
    }

    /**
     * @return Device
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param Device $device
     */
    public function setDevice(Device $device)
    {
        $this->device = $device;
    }

    /**
     * @return Scene
     */
    public function getScene()
    {
        return $this->scene;
    }

    /**
     * @param Scene $scene
     */
    public function setScene(Scene $scene)
    {
        $this->scene = $scene;
    }



}