<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Rol;
use App\Form\RolType;

class RolController extends AbstractController
{
    /**
     * @Route("/admin/rol", name="rol")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(Rol::class)->findAll();

        return $this->render('rol/index.html.twig', [
            'controller_name' => 'RolController',
            'registros' => $registros
        ]);
    }

    /**
     * @Route("/admin/rol/nuevo", name="rol_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new Rol;

        $form = $this->createForm(RolType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('rol');

        }

        return $this->render('rol/new.html.twig', [
            'controller_name' => 'RolController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/rol/{id}/editar", name="rol_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(Rol::class)->find($id);

        $form = $this->createForm(RolType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('rol');

        }

        return $this->render('rol/edit.html.twig', [
            'controller_name' => 'RolController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/rol/{id}/borrar", name="rol_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Rol::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('rol');
    }
}
