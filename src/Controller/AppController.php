<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController
{
    /**
     * @Route("/",name="annotationRoute")
     * @return Response
     */
    public function index(){
        return new Response('Welcome to our first page',200);
    }
    /**
     * @Route("/wildCardRouteWithPost",name="wildCardRouteWithPost")
     * @return Response
     */
    public function id(Request $request){
        return new Response(sprintf('Welcome %s',$request->get('name')),200);
    }

    /**
     * @Route("/wildCardRouteWithGet/{name}",name="wildCardRouteWithGet")
     * @return Response
     */
    public function name($name){
        return new Response(sprintf('Welcome %s',$name),200);
    }

    /**
     * @Route("/renderTemplate/{name}",name="renderTemplate")
     * @return Response
     */
    public function renderTemplate($name){
        return new Response(sprintf('Welcome %s',$name),200);
    }
}