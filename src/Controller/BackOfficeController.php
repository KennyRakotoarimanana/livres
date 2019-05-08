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
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class BackOfficeController extends AbstractController
{
    /** 
     * @Route("/accueiladmin",name="accueil_admin")
    */
    public function index(SessionInterface $session){
        if($session->get('login')){
            return $this->render('admin/accueil.html.twig'); 
        }
            return $this->redirectToRoute('security_connexion');
        
    }

    /** 
     * @Route("/liste_categorie",name="liste_categorie")
    */
    public function lister_categorie(SessionInterface $session){
        if($session->get('login')){
            $categorieRepository = $this->getDoctrine()->getRepository(Categorie::class);
            $categories = $categorieRepository->findAll();
            return $this->render('admin/liste_categories.html.twig',[
                'categories'=>$categories
                ],
            ); 
        }
            return $this->redirectToRoute('security_connexion');
    }
    /** 
     * @Route("/liste_livre",name="liste_livre")
    */
    public function lister_livre(SessionInterface $session){
        if($session->get('login')){
            $categorieRepository = $this->getDoctrine()->getRepository(Categorie::class);
            $categories = $categorieRepository->findAll();
            $livreRepository = $this->getDoctrine()->getRepository(Livre::class);
            $livres = $livreRepository->findAll();
            return $this->render('admin/liste_livre.html.twig',[
                'categories'=>$categories,
                'livres'=>$livres
                ],
            ); 
        }
        return $this->redirectToRoute('security_connexion');
        
    }
    /** 
     * @Route("/modification_categorie/",name="modification_categorie")
    */
    public function modification_categorie(Request $request, SessionInterface $session){
        if($session->get('login')){

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
        return $this->redirectToRoute('security_connexion');
    }

    /** 
     * @Route("/ajout_categorie/",name="ajout_categorie")
    */
    public function ajout_categorie(Request $request,SessionInterface $session){
        if($session->get('login')){

            $entityManager = $this->getDoctrine()->getManager();
            $repository = $entityManager->getRepository(Categorie::class);
            $categorie = new Categorie();
            $categorie->setNomCategorie($request->request->get('nouvelleCategorie'));
            $entityManager->persist($categorie);
           $entityManager->flush();
    
           return $this->redirectToRoute('liste_categorie');
        }
        return $this->redirectToRoute('security_connexion');
    }

    /** 
     * @Route("/ajout_livre/",name="ajout_livre")
    */
    public function ajout_livre(Request $request,SessionInterface $session){
        if($session->get('login')){

            $entityManager = $this->getDoctrine()->getManager();
            $repository = $entityManager->getRepository(Livre::class);
            $livre = new Livre();
            $livre->setTitre($request->request->get('titre'));
            $livre->setAuteur($request->request->get('auteur'));
            $livre->setResume($request->request->get('resume'));
            $titre = $livre->getTitre();
            $categoryRepository = $entityManager->getRepository(Categorie::class);
            $categorie= $categoryRepository->findOneBy([
                'idCategorie'=>$_POST['idCategorie']]);
            $livre->setIdCategorie($categorie);
            $entityManager->persist($livre);
            $entityManager->flush();
           $imagesRepository = $entityManager->getRepository(Images::class);
           $image1=new Images();
           $image1->setNomImage($request->request->get('image1'));
           $image1->setDescription($titre);
           $image1->setIdLivre($livre);
           $image2=new Images();
           $image2->setNomImage($request->request->get('image2'));
           $image2->setDescription($titre);
           $image2->setIdLivre($livre);
           $image3=new Images();
           $image3->setNomImage($request->request->get('image3'));
           $image3->setDescription($titre);
           $image3->setIdLivre($livre);
           $entityManager->persist($image1);
           $entityManager->persist($image2);
           $entityManager->persist($image3);
           $entityManager->flush();
           return $this->redirectToRoute('liste_livre');
        }
        return $this->redirectToRoute('security_connexion');
    }
    
    
}
