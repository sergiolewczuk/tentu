<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\FuncionIntestinal;
use App\Form\FuncionIntestinalType;

class FichaController extends AbstractController
{
    /**
     * @Route("/admin/mificha", name="ficha")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function index()
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();
        
        $user->getUsername();

        return $this->render('ficha/index.html.twig', [
            'controller_name' => 'FichaController',
            'user' => $user,
        ]);
    }
}
