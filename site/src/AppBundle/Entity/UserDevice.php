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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Device")
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
        $this->created_at = new \DateTime();
    }


}