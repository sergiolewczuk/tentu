<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\EstadoFicha;
use App\Form\EstadoFichaType;


class EstadoFichaController extends AbstractController
{
    /**
     * @Route("/admin/estadoficha", name="estado_ficha")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(EstadoFicha::class)->findAll();

        return $this->render('estado_ficha/index.html.twig', [
            'controller_name' => 'EstadoFichaController',
            'registros' => $registros
        ]);
    }

    /**
     * @Route("/admin/estadoficha/nuevo", name="estado_ficha_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new EstadoFicha;

        $form = $this->createForm(EstadoFichaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('estado_ficha');

        }

        return $this->render('estado_ficha/new.html.twig', [
            'controller_name' => 'EstadoFichaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/estadoficha/{id}/editar", name="estado_ficha_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(EstadoFicha::class)->find($id);

        $form = $this->createForm(EstadoFichaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('estado_ficha');

        }

        return $this->render('estado_ficha/edit.html.twig', [
            'controller_name' => 'EstadoFichaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/estadoficha/{id}/borrar", name="estado_ficha_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(EstadoFicha::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('estado_ficha');
    }
}
