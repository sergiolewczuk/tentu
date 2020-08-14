<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\HoraAlmuerzo;
use App\Form\HoraAlmuerzoType;

class HoraAlmuerzoController extends AbstractController
{
    /**
     * @Route("/admin/horaalmuerzo", name="hora_almuerzo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(HoraAlmuerzo::class)->findAll();

        return $this->render('hora_almuerzo/index.html.twig', [
            'controller_name' => 'HoraAlmuerzoController',
            'registros' => $registros
        ]);
    }

     /**
     * @Route("/admin/horaalmuerzo/nuevo", name="hora_almuerzo_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new HoraAlmuerzo;

        $form = $this->createForm(HoraAlmuerzoType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('hora_almuerzo');

        }

        return $this->render('hora_almuerzo/new.html.twig', [
            'controller_name' => 'HoraAlmuerzoController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/horaalmuerzo/{id}/editar", name="hora_almuerzo_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(HoraAlmuerzo::class)->find($id);

        $form = $this->createForm(HoraAlmuerzoType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('hora_almuerzo');

        }

        return $this->render('hora_almuerzo/edit.html.twig', [
            'controller_name' => 'HoraAlmuerzoController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/horaalmuerzo/{id}/borrar", name="hora_almuerzo_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(HoraAlmuerzo::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('hora_almuerzo');
    }
}
