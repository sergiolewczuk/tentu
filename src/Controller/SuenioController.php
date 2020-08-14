<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Suenio;
use App\Form\SuenioType;

class SuenioController extends AbstractController
{
    /**
     * @Route("/admin/ciclodesuenio", name="suenio")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(Suenio::class)->findAll();

        return $this->render('suenio/index.html.twig', [
            'controller_name' => 'SuenioController',
            'registros' => $registros
        ]);
    }

    /**
     * @Route("/admin/ciclodesuenio/nuevo", name="suenio_nuevo")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new Suenio;

        $form = $this->createForm(SuenioType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('suenio');

        }

        return $this->render('suenio/new.html.twig', [
            'controller_name' => 'SuenioController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/ciclodesuenio/{id}/editar", name="suenio_editar")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(Suenio::class)->find($id);

        $form = $this->createForm(SuenioType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('suenio');

        }

        return $this->render('suenio/edit.html.twig', [
            'controller_name' => 'SuenioController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/ciclodesuenio/{id}/borrar", name="suenio_borrar")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Suenio::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('suenio');
    }
}
