<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\HoraMerienda;
use App\Form\HoraMeriendaType;

class HoraMeriendaController extends AbstractController
{
    /**
     * @Route("/hora/merienda", name="hora_merienda")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(HoraMerienda::class)->findAll();

        return $this->render('hora_merienda/index.html.twig', [
            'controller_name' => 'HoraMeriendaController',
            'registros' => $registros
        ]);
    }

     /**
     * @Route("/admin/horamerienda/nuevo", name="hora_merienda_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new HoraMerienda;

        $form = $this->createForm(HoraMeriendaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('hora_merienda');

        }

        return $this->render('hora_merienda/new.html.twig', [
            'controller_name' => 'HoraMeriendaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/horamerienda/{id}/editar", name="hora_merienda_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(HoraMerienda::class)->find($id);

        $form = $this->createForm(HoraMeriendaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('hora_merienda');

        }

        return $this->render('hora_merienda/edit.html.twig', [
            'controller_name' => 'HoraMeriendaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/horamerienda/{id}/borrar", name="hora_merienda_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(HoraMerienda::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('hora_merienda');
    }
}
