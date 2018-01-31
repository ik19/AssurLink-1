<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 30/01/2018
 * Time: 14:54
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations


class APIController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Post("/user")
     */
    public function getUserAction(Request $request)
    {
        $login = $request->request->get('login');
        $password = $request->request->get('password');


        $logger = $this->container->get('logger');
        $places = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:User')
            ->findByLogin($login);

        $logger->info($request->request->get($places));
        return $places;
    }
}