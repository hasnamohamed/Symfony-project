<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class AppController extends AbstractController
{
    // #[Route('/', name: 'annotationRoute')] used in PHP 8
    /**
     * @Route("/",name="annotationRoute")
     * @return Response
     */
    public function index(){
        return new Response('Welcome to our first page',200);
    }
    // #[Route('/', name: 'annotationRoute')] used in PHP 8
    /**
     * @Route("/wildCardRouteWithPost",name="wildCardRouteWithPost")
     * @return Response
     */
    public function id(Request $request){
        return new Response(sprintf('Welcome %s',$request->get('name')),200);
    }
    // #[Route('/', name: 'annotationRoute')] used in PHP 8
    /**
     * @Route("/wildCardRouteWithGet/{name}/{category}",name="wildCardRouteWithGet")
     * @return Response
     */
    public function name($name){//Must be the same name in route
        $title=u(str_replace('_',' ',$name))->title(true);//make hasnaa_mohamed to Hasnaa Mohamed

        return new Response(sprintf('Welcome %s',$title),200);
    }
    // #[Route('/', name: 'annotationRoute')] used in PHP 8
    /**
     * @Route("/renderTemplate/{name}",name="renderTemplate")
     * @return Response
     */
    public function renderTemplate($name=null){
        if (empty($name)) {
            dump("hasnaa");//test profiller
            return $this->render('base.html.twig');
        }
        else
            return new Response('Not Required',200);
    }
    /**
     * @Route("/renderTemplateWithVariable",name="renderTemplate")
     * @return Response
     */
    public function renderTemplateWithVariable(){
        $users=['hasnaa','ahmed','ali'];
            return $this->render('base.html.twig',['users' => $users]);
    }
}