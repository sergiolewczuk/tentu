<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\EstadoNewsletter;
use App\Form\EstadoNewsletterType;

class EstadoNewsletterController extends AbstractController
{
     /**
     * @Route("/admin/estadonewsletter", name="estado_newsletter")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(EstadoNewsletter::class)->findAll();

        return $this->render('estado_newsletter/index.html.twig', [
            'controller_name' => 'EstadoNewsletterController',
            'registros' => $registros
        ]);
    }

    /**
     * @Route("/admin/estadonewsletter/nuevo", name="estado_newsletter_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new EstadoNewsletter;

        $form = $this->createForm(EstadoNewsletterType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('estado_newsletter');

        }

        return $this->render('estado_newsletter/new.html.twig', [
            'controller_name' => 'EstadoNewsletterController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/estadonewsletter/{id}/editar", name="estado_newsletter_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $registro = $this->getDoctrine()->getRepository(EstadoNewsletter::class)->find($id);

        $form = $this->createForm(EstadoNewsletterType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('estado_newsletter');

        }

        return $this->render('estado_newsletter/edit.html.twig', [
            'controller_name' => 'EstadoNewsletterController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/estadonewsletter/{id}/borrar", name="estado_newsletter_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(EstadoNewsletter::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('estado_newsletter');
    }
}
