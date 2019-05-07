<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\Persistence\ObjectManager;


use App\Entity\Administrateur;
use App\Form\RegistrationType;



class SecurityController extends AbstractController
{
   /**
    * @Route("/inscription",name="security_inscription")
    */
    public function inscription(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder){
        $administrateur = new Administrateur();
        $form = $this->createForm(RegistrationType::class, $administrateur);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($administrateur, $administrateur->getMotDePasse());
            $administrateur->setMotDePasse($hash);
            $manager->persist($administrateur);
            $manager->flush();

            return $this->redirectToRoute('security_connexion');
        }


        return $this->render('admin/inscription.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
    *  @Route("/connexion",name="security_connexion")
    */
    public function connexion(){
        return $this->render('admin/login.html.twig');  
    }

    /**
    *  @Route("/authentication",name="authentication")
    */
    public function authentication(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder){
        $repository = $this->getDoctrine()->getRepository(Administrateur::class);
        $login = $request->request->get('login');
        $administrateur = new Administrateur();
        $hashedMdp = $encoder->encodePassword($administrateur,$request->request->get('mdp'));
        $administrateurRequest = $repository->findOneBy([
            'login' => $login,
            'motDePasse'=> $hashedMdp

        ]);
        if(!$administrateurRequest){
            return $this->render('admin/login.html.twig',[
                'error'=>"Verifiez votre login ou votre mot de passe"
            ]);
        }
        else{
            return $this->redirectToRoute('accueil_admin');
        }
    }

    /**
    *  @Route("/deconnexion",name="security_deconnexion")
    */
    public function deconnexion(){}
}
