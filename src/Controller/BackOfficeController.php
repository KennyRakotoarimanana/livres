<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class BackOfficeController extends AbstractController
{
    /** 
     * @Route("/accueiladmin",name="accueil_admin")
    */
    public function index(){
        return $this->render('admin/accueil.html.twig'); 
    }
    
    /**
     * @Route("/add-book", name="add-book")
     */
    /*public function createProduct()
    {*/
      


    /*$blog1 = new Blog();
    $blog2 = new Blog();
    $blog1->setTitle("Title1");
    $blog1->setBody("Body1");
    $blog2->setTitle("Title2");
    $blog2->setBody("Body2");
    $blog_entries = array($blog1, $blog2);
    return $this->render('index.html.twig',[
        'blog_entries'=>$blog_entries,
    ]);*/


        /*return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MainController.php',
        ]);*/
    //}
}
