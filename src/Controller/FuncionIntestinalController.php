<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\FuncionIntestinal;
use App\Form\FuncionIntestinalType;

class FuncionIntestinalController extends AbstractController
{
    /**
     * @Route("/admin/funcionintestinal", name="funcion_intestinal")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(FuncionIntestinal::class)->findAll();

        return $this->render('funcion_intestinal/index.html.twig', [
            'controller_name' => 'FuncionIntestinalController',
            'registros' => $registros
        ]);
    }

    /**
     * @Route("/admin/funcionintestinal/nuevo", name="funcion_intestinal_nuevo")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new FuncionIntestinal;

        $form = $this->createForm(FuncionIntestinalType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('funcion_intestinal');

        }

        return $this->render('funcion_intestinal/new.html.twig', [
            'controller_name' => 'FuncionIntestinalController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/funcionintestinal/{id}/editar", name="funcion_intestinal_editar")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(FuncionIntestinal::class)->find($id);

        $form = $this->createForm(FuncionIntestinalType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('funcion_intestinal');

        }

        return $this->render('funcion_intestinal/edit.html.twig', [
            'controller_name' => 'FuncionIntestinalController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/funcionintestinal/{id}/borrar", name="funcion_intestinal_borrar")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(FuncionIntestinal::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('funcion_intestinal');
    }
}
