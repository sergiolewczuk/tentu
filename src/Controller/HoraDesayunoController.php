<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\HoraDesayuno;
use App\Form\HoraDesayunoType;

class HoraDesayunoController extends AbstractController
{
    /**
     * @Route("/admin/horadesayuno", name="hora_desayuno")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(HoraDesayuno::class)->findAll();

        return $this->render('hora_desayuno/index.html.twig', [
            'controller_name' => 'HoraDesayunoController',
            'registros' => $registros
        ]);
    }

     /**
     * @Route("/admin/horadesayuno/nuevo", name="hora_desayuno_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new HoraDesayuno;

        $form = $this->createForm(HoraDesayunoType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('hora_desayuno');

        }

        return $this->render('hora_desayuno/new.html.twig', [
            'controller_name' => 'HoraDesayunoController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/horadesayuno/{id}/editar", name="hora_desayuno_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(HoraDesayuno::class)->find($id);

        $form = $this->createForm(HoraDesayunoType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('hora_desayuno');

        }

        return $this->render('hora_desayuno/edit.html.twig', [
            'controller_name' => 'HoraDesayunoController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/horadesayuno/{id}/borrar", name="hora_desayuno_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(HoraDesayuno::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('hora_desayuno');
    }
}
