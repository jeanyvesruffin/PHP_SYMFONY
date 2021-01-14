<?php

namespace App\Controller;

use App\Service\ComplexObject;
use App\Service\MailLogger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * Page d'accueil
     *
     * @Route("/",name="accueil")
     */
    // public function home(ComplexObject $complexObjectInjected)
    public function home(ComplexObject $complexObjectInjected)
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $complexObjectInjected->doSomething();
   
        return $response;
    }

    /**
     * Page d'administration
     *
     * @Route("/admin",name="admin")
     */
    public function admin()
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
   
        print_r($response);
        return $response;
    }

    /**
     * @Route(
     *  "/article/{postId<\d+>}",
     *  name="article",
     *  methods={"GET"}
     * )
     */
    public function showBlogPost($postId = 1)
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        print_r($response);
        echo'<br/>';
        print_r($postId);
        return $response;
        // $postId est retrouvé à partir de l'url
        // par ex /article/1234, alors $articleId = 1234
    }
}
