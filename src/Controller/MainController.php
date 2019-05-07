<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Livre;
use App\Entity\Categorie;
use App\Entity\Images;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        $categorieRepository = $this->getDoctrine()->getRepository(Categorie::class);
        $categories = $categorieRepository->findAll();
        return $this->render('FrontOffice/accueil.html.twig',[
            'categories'=>$categories
        ],
    );
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
    }

    /** 
     * @Route("/categorie/{nom_categorie}-{id_categorie}.html",name="livres_categorie")
    */
    public function getLivresCategorie($nom_categorie,$id_categorie){
        $categorieRepository = $this->getDoctrine()->getRepository(Categorie::class);
        $categories = $categorieRepository->findAll();
        $repository = $this->getDoctrine()->getRepository(Livre::class);
        $livres = $repository->findBy([
            'idCategorie'=>$id_categorie
        ]);
        //var_dump($livres);
        return $this->render('FrontOffice/livres_categorie.html.twig',[
            'livres'=>$livres,
            'categories'=>$categories,
            'nom_categorie'=>$nom_categorie
        ]);
    }

    /** 
     * @Route("/{nom_categorie1}/{nom_categorie}-{id_livre}-{id_categorie}.html",name="fiche_livre")
    */
    public function getDetailsLivre($nom_categorie,$id_livre,$id_categorie){
        $livreRepository = $this->getDoctrine()->getRepository(Livre::class);
        $categorieRepository = $this->getDoctrine()->getRepository(Categorie::class);
        $imageRepository = $this->getDoctrine()->getRepository(Images::class);

        $categories = $categorieRepository->findAll();
        $livre = $livreRepository->find($id_livre);
        $images = $imageRepository->findBy([
            'idLivre'=>$id_livre
        ]);
        return $this->render('FrontOffice/fiche_livre.html.twig',[
            'livre'=>$livre,
            'categories'=>$categories,
            'images'=>$images,
            'nom_categorie'=>$nom_categorie
        ]);
    }

}
