<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\TipoPatologia;
use App\Form\TipoPatologiaType;

class TipoPatologiaController extends AbstractController
{
    /**
     * @Route("/admin/tipopatologia", name="tipo_patologia")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(TipoPatologia::class)->findAll();

        return $this->render('tipo_patologia/index.html.twig', [
            'controller_name' => 'TipoPatologiaController',
            'registros' => $registros
        ]);
    }

    /**
     * @Route("/admin/tipopatologia/nuevo", name="tipo_patologia_nuevo")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new TipoPatologia;

        $form = $this->createForm(TipoPatologiaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('tipo_patologia');

        }

        return $this->render('tipo_patologia/new.html.twig', [
            'controller_name' => 'TipoPatologiaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/tipopatologia/{id}/editar", name="tipo_patologia_editar")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(TipoPatologia::class)->find($id);

        $form = $this->createForm(TipoPatologiaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('tipo_patologia');

        }

        return $this->render('tipo_patologia/edit.html.twig', [
            'controller_name' => 'TipoPatologiaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/tipopatologia/{id}/borrar", name="tipo_patologia_borrar")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(TipoPatologia::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('tipo_patologia');
    }
}
