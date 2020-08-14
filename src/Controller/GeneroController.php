<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Genero;
use App\Form\GeneroType;

class GeneroController extends AbstractController
{
     /**
     * @Route("/admin/genero", name="genero")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(Genero::class)->findAll();

        return $this->render('genero/index.html.twig', [
            'controller_name' => 'GeneroController',
            'registros' => $registros
        ]);
    }

    /**
     * @Route("/admin/genero/nuevo", name="genero_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new Genero;

        $form = $this->createForm(GeneroType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('genero');

        }

        return $this->render('genero/new.html.twig', [
            'controller_name' => 'GeneroController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/genero/{id}/editar", name="genero_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(Genero::class)->find($id);

        $form = $this->createForm(GeneroType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('genero');

        }

        return $this->render('genero/edit.html.twig', [
            'controller_name' => 'GeneroController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/genero/{id}/borrar", name="genero_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Genero::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('genero');
    }
}
