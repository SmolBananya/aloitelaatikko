<?php

namespace App\Controller;

use App\Entity\Aloitetaulu;
use App\Form\AloiteFormType;
use Doctrine\Common\Annotations\Annotation\Attribute;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AloiteController extends AbstractController
{
    /**
     * @Route("/aloite", name="aloite_lista")
     */
    public function index()
    {
        //hakee kaikki linkit tietokannasta
        $aloitteet = $this->getDoctrine()->getRepository(Aloitetaulu::class)->findAll();


        //pyydetään näkymää näyttämään kaikki linkit
        return $this->render('aloite/index.html.twig',[
            'aloitteet'    =>  $aloitteet,
        ]);
    }

    /**
     * @Route( "/aloite/uusi", name="aloite_uusi")
     */
    public function uusi(Request $request){
        // Luodaan aloite-olio
        $aloite = new Aloitetaulu();
  
        // Luodaan lomake
        $form = $this->createForm(
          AloiteFormType::class,
          $aloite, [
            'action'    => $this->generateUrl('aloite_uusi'),
            'attr'      => ['class' => 'form-signin']
          ]
        );
  
        // Käsitellään lomakkeelta tulleet tiedot ja talletetaan tietokantaan
        $form->handleRequest($request);
        if($form->isSubmitted()){
          // Talletetaan lomaketiedot muuttujaan
          $aloite = $form->getData();
  
          // Talletetaan tietokantaan
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($aloite);
          $entityManager->flush();
  
          // Kutsutaan index-kontrolleria
          return $this->redirectToRoute('aloite_lista');
        }
  
        // Pyydetään näkymää näytämään lomake
          return $this->render('aloite/uusi.html.twig', [
            'form1' => $form->createView()
          ]);
      }

          /**
     * @Route("/aloite/nayta/{id}", name="aloite_nayta")
     */
    public function nayta($id){
        $aloite = $this->getDoctrine()->getRepository(Aloitetaulu::class)->find($id);
  
          return $this->render('aloite/nayta.html.twig', [
            'aloite'  => $aloite,
          ]);
      }

    /**
     * @Route("/aloite/naytakaikki/{id}", name="aloite_naytakaikki")
     */
    public function naytaKaikki($id){
        $aloite = $this->getDoctrine()->getRepository(Aloitetaulu::class)->find($id);
  
          return $this->render('aloite/naytakaikki.html.twig', [
            'aloite'  => $aloite,
          ]);
      }

      /**
     * @Route("/aloite/muokkaa/{id}", name="aloite_muokkaa" )
     */
    public function muokkaa(Request $request, $id){
        // Luo linkki-olion ja palauttaa sen tiedoilla täytettynä.
        $aloite = $this->getDoctrine()->getRepository(Aloitetaulu::class)->find($id);
  
        // Luodaan lomake
        $form = $this->createForm(
          AloiteFormType::class,
          $aloite, [
            'attr'      => ['class' => 'form-signin']
          ]
        );
  
        // Käsitellään lomakkeelta tulleet tiedot ja talletetaan tietokantaan
        $form->handleRequest($request);
        if($form->isSubmitted()){
          // Talletetaan lomaketiedot muuttujaan
          $aloite = $form->getData();
  
          // Talletetaan tietokantaan
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->flush();
  
          // Kutsutaan index-kontrolleria
          return $this->redirectToRoute('aloite_lista');
        }      
  
         return $this->render('aloite/muokkaa.html.twig', [
           'form1'  => $form->createView()
         ]);
      }

       /**
     * @Route("/aloite/poista/{id}", name="aloite_poista")
     */
    public function poista(Request $request, $id){

        // Luo linkki-olion ja palauttaa sen tiedoilla täytettynä.
        $aloite = $this->getDoctrine()->getRepository(Aloitetaulu::class)->find($id);
        
          // Poistetaan linkki tietokannasta
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->remove($aloite);
          $entityManager->flush();
  
          return $this->redirectToRoute('aloite_lista');
  
      }

}
