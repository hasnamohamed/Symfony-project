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
     * @Route("/home",name="home")
     * @return Response
     */
    public function home(){
        $users=['hasnaa','ahmed','ali'];
//            return $this->render('base.html.twig',['users' => $users]);
        return $this->render('home.html.twig',['users' => $users]);
    }

    /**
     * @Route("/login",name="login")
     * @return Response
     */
    public function logIn(){
        return $this->render('login.html.twig');
    }

    /**
     * @Route("/signup",name="signup")
     * @return Response
     */
    public function signUp(){
        return $this->render('signup.html.twig');
    }
    /**
     * @Route("/post",name="post")
     * @return Response
     */
    public function post(){
        $post= ['name'=>"Hasnaa",'likes'=>23,'comments'=>20,'share'=>133];
        return $this->render('post.html.twig',['post'=>$post]);
    }
    /**
     * @Route("/addlike/{count}",name="addlike",methods={"POST"})
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    //@Route("/addlike/{count}<|d+>",name="addlike",methods={"POST"}) add validation to wild cart route
    public function addlike(int $count){//will cast from string to int
       $this->addFlash('success','your like has been added');// add alert( flash message)
        $this->addFlash('danger','Error');// add alert( flash message)

        return $this->json(['totalLikeCount'=>$count + rand(18,992)]);
    }
    /**
     * @Route("/posts",name="posts")
     * @return Response
     */
    public function posts(){
        $posts=[
            ['name'=>"Hasnaa",'likes'=>23,'comments'=>20,'share'=>133],
            ['name'=>"Ahmed",'likes'=>43,'comments'=>50,'share'=>13],
            ['name'=>"Mohamed",'likes'=>53,'comments'=>250,'share'=>1],
            ['name'=>"Ali",'likes'=>263,'comments'=>2,'share'=>10],
            ['name'=>"Ramy",'likes'=>253,'comments'=>250,'share'=>1333],
            ['name'=>"Rania",'likes'=>243,'comments'=>220,'share'=>15],
        ];
        return $this->render('posts.html.twig',['posts'=>$posts]);
    }
}