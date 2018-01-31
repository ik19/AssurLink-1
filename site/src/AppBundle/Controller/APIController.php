<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 30/01/2018
 * Time: 14:54
 */

namespace AppBundle\Controller;


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
     * @Route("/user", name="user", methods={"GET"})
     * @param Request $request
     */
    public function testAction(Request $request)
    {

        $em = $this->container->get('doctrine.orm.entity_manager');
        $userRepository = $em->getRepository('AppBundle:User');
        $data =  $this->container->get('serializer')->serialize($userRepository->find(1), 'json');

        return new JsonResponse(array('object' => $data ));
    }
}