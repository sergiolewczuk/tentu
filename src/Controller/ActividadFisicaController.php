<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ActividadFisica;
use App\Form\ActividadFisicaType;

class ActividadFisicaController extends AbstractController
{
   /**
     * @Route("/admin/actividadfisica", name="actividad_fisica")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(ActividadFisica::class)->findAll();

        return $this->render('actividadfisica/index.html.twig', [
            'controller_name' => 'ActividadFisicaController',
            'registros' => $registros
            ]);
    }

    /**
     * @Route("/admin/actividadfisica/nuevo", name="actividad_fisica_nuevo")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new ActividadFisica;

        $form = $this->createForm(ActividadFisicaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('actividad_fisica');

        }

        return $this->render('actividadfisica/new.html.twig', [
            'controller_name' => 'ActividadFisicaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/actividad_fisica/{id}/editar", name="actividad_fisica_editar")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(ActividadFisica::class)->find($id);

        $form = $this->createForm(ActividadFisicaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('actividad_fisica');

        }

        return $this->render('actividadfisica/edit.html.twig', [
            'controller_name' => 'ActividadFisicaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/actividadfisica/{id}/borrar", name="actividad_fisica_borrar")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(ActividadFisica::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('actividad_fisica');
    }
}
