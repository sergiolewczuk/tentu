<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Entity\Plan;
use App\Entity\Newsletter;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(Plan::class)->findAll();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'registros' => $registros,
        ]);
    }

    /**
     * @Route("/quienessomos", name="quienes_somos")
     */
    public function quienes()
    {
        return $this->render('institucional/quienessomos.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/nuestroequipo", name="equipo")
     */
    public function equipo()
    {
        return $this->render('institucional/equipo.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    

     /**
     * @Route("/admin", name="home")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function admin()
    {
        return $this->render('default/admin.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/newsletter", name="newsletter")
     */
    public function newsletter()
    {

        $email = $_POST["email"]; 

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            
            $entityManager = $this->getDoctrine()->getManager();

            $estado = $this->getDoctrine()->getRepository(EstadoNewsletter::class)->find($id);

            $newsletter = new Newsletter;

            $newsletter->setNombre($email);

            $newsletter->setUnEstado($estado);

            $entityManager->persist($newsletter);

            $entityManager->flush();

            $ruta = 'institucional/newsletter.html.twig';

        }else{

            $ruta = 'institucional/newsletterfail.html.twig';
        };

        return $this->render($ruta, [
            'controller_name' => 'DefaultController',
        ]);
    }
}
