<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\HoraCena;
use App\Form\HoraCenaType;

class HoraCenaController extends AbstractController
{
    /**
     * @Route("/admin/horacena", name="hora_cena")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(HoraCena::class)->findAll();

        return $this->render('hora_cena/index.html.twig', [
            'controller_name' => 'HoraCenaController',
            'registros' => $registros
        ]);
    }

     /**
     * @Route("/admin/horacena/nuevo", name="hora_cena_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new HoraCena;

        $form = $this->createForm(HoraCenaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('hora_cena');

        }

        return $this->render('hora_cena/new.html.twig', [
            'controller_name' => 'HoraCenaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/horacena/{id}/editar", name="hora_cena_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(HoraCena::class)->find($id);

        $form = $this->createForm(HoraCenaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('hora_cena');

        }

        return $this->render('hora_cena/edit.html.twig', [
            'controller_name' => 'HoraCenaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/horacena/{id}/borrar", name="hora_cena_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(HoraCena::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('hora_cena');
    }
}
