<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\EstadoCliente;
use App\Form\EstadoClienteType;

class EstadoClienteController extends AbstractController
{
    /**
     * @Route("/admin/estadocliente", name="estado_cliente")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(EstadoCliente::class)->findAll();

        return $this->render('estado_cliente/index.html.twig', [
            'controller_name' => 'EstadoClienteController',
            'registros' => $registros
            ]);
    }

    /**
     * @Route("/admin/estadocliente/nuevo", name="estado_cliente_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new EstadoCliente;

        $form = $this->createForm(EstadoClienteType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('estado_cliente');

        }

        return $this->render('estado_cliente/new.html.twig', [
            'controller_name' => 'EstadoClienteController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/estadocliente/{id}/editar", name="estado_cliente_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(EstadoCliente::class)->find($id);

        $form = $this->createForm(EstadoClienteType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('estado_cliente');

        }

        return $this->render('estado_cliente/edit.html.twig', [
            'controller_name' => 'EstadoClienteController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/estadocliente/{id}/borrar", name="estado_cliente_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(EstadoCliente::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('estado_cliente');
    }
}
