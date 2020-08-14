<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Newsletter;

class NewsletterController extends AbstractController
{
    /**
     * @Route("/newsletters", name="newsletter_index")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(Newsletter::class)->findAll();

        return $this->render('newsletter/index.html.twig', [
            'controller_name' => 'NewsletterController',
            'registros' => $registros
        ]);
    }
}
