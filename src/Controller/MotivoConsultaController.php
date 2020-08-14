<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\MotivoConsulta;
use App\Form\MotivoConsultaType;

class MotivoConsultaController extends AbstractController
{
    /**
     * @Route("/admin/motivoconsulta", name="motivo_consulta")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(MotivoConsulta::class)->findAll();

        return $this->render('motivo_consulta/index.html.twig', [
            'controller_name' => 'MotivoConsultaController',
            'registros' => $registros
            ]);
    }

    /**
     * @Route("/admin/motivoconsulta/nuevo", name="motivo_consulta_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new MotivoConsulta;

        $form = $this->createForm(MotivoConsultaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('motivo_consulta');

        }

        return $this->render('motivo_consulta/new.html.twig', [
            'controller_name' => 'MotivoConsultaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/motivoconsulta/{id}/editar", name="motivo_consulta_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(MotivoConsulta::class)->find($id);

        $form = $this->createForm(MotivoConsultaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('motivo_consulta');

        }

        return $this->render('motivo_consulta/edit.html.twig', [
            'controller_name' => 'MotivoConsultaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/motivoconsulta/{id}/borrar", name="motivo_consulta_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(MotivoConsulta::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('motivo_consulta');
    }
}
