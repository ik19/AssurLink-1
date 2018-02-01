<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 30/01/2018
 * Time: 14:54
 */

namespace AppBundle\Controller;


use AppBundle\Entity\UserDevice;
use FOS\RestBundle\FOSRestBundle;
use FOS\RestBundle\Controller\Annotations\Route;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;


class APIController extends FOSRestBundle
{
    /**
     * @Route("/zone", name="zone", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function testAction(Request $request)
    {

        $em = $this->container->get('doctrine.orm.entity_manager');
        $userRepository = $em->getRepository('AppBundle:User');
        $deviceRep = $em->getRepository('AppBundle:Device');
        //$zoneRepository = $em->getRepository('AppBundle:Zone');
        //$zone = $zoneRepository->find(2);
        $users = $userRepository->getUserWithZone(2);
        $device = [];
        foreach ($users as $user)
        {
            $device[] = $em->getRepository('AppBundle:UserDevice')->findBy(array("user" => $user));
        }
        dump("tous les utilisateur de la zone",$users);
        dump("tous les devise d'un user par zone",$device);die();
        $data =  $this->container->get('serializer')->serialize($userRepository->find(1), 'json');

        return new JsonResponse(array('object' => $data ));
    }

    /**
     * @return JsonResponse
     * @Route("/user", name="user", methods={"GET"})
     */
    public function userAction()
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $userRepository = $em->getRepository('AppBundle:User');
        $user = $userRepository->getUserAndZone(1);
        $devices = $em->getRepository('AppBundle:UserDevice')->findBy(array("user" => $user));
        /** @var UserDevice $device */
        $deviceScene = [];
        foreach ($devices as $device)
        {
           $deviceScene[] = $em->getRepository('AppBundle:DeviceScene')->findBy(array("device" => $device->getDevice()));
        }
        //dump($user, $devices, $deviceScene); die();
        $dataUser =  $this->container->get('serializer')->serialize($user, 'json');
       // $dataDevise =  $this->container->get('serializer')->serialize($devices, 'json');
       // $dataScene =  $this->container->get('serializer')->serialize($deviceScene, 'json');

        return new JsonResponse(array('User' => $dataUser));
    }
}