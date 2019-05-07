<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Livre;
use App\Entity\Categorie;
use App\Entity\Images;


class BackOfficeController extends AbstractController
{
    /** 
     * @Route("/accueiladmin",name="accueil_admin")
    */
    public function index(){
        return $this->render('admin/accueil.html.twig'); 
    }

    /** 
     * @Route("/liste_categorie",name="liste_categorie")
    */
    public function lister_categorie(){
        $categorieRepository = $this->getDoctrine()->getRepository(Categorie::class);
        $categories = $categorieRepository->findAll();
        return $this->render('admin/liste_categories.html.twig',[
            'categories'=>$categories
            ],
        ); 
    }
    /** 
     * @Route("/modification_categorie/",name="modification_categorie")
    */
    public function modification_categorie(Request $request){
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Categorie::class);
        $action = $request->request->get('modifier');
        $idCategorie = $request->request->get('idCategorie');
        $categorie = $repository->find($idCategorie);
        if($action === 'Supprimer'){
            $entityManager->remove($categorie);
        }
       else{
           $categorie->setNomCategorie($request->request->get('nomCategorie'));
       }
       $entityManager->flush();

       return $this->redirectToRoute('liste_categorie');
    }
    /** 
     * @Route("/ajout_categorie/",name="ajout_categorie")
    */
    public function ajout_categorie(Request $request){
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Categorie::class);
        $categorie = new Categorie();
        $categorie->setNomCategorie($request->request->get('nouvelleCategorie'));
        $entityManager->persist($categorie);
       $entityManager->flush();

       return $this->redirectToRoute('liste_categorie');
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
