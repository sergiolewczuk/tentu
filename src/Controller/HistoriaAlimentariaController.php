<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\HistoriaAlimentaria;
use App\Entity\Ficha;
use App\Form\HistoriaAlimentariaType;

class HistoriaAlimentariaController extends AbstractController
{
    /**
     * @Route("/admin/mificha/{id}/historiaalimentaria/nuevo", name="historia_alimentaria_nuevo")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function new($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new HistoriaAlimentaria;

        $form = $this->createForm(HistoriaAlimentariaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ficha = $this->getDoctrine()->getRepository(Ficha::class)->find($id);

            $registroForm = $form->getData();

            $registroForm->setUnaFicha($ficha);

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('historia_alimentaria/new.html.twig', [
            'controller_name' => 'HistoriaAlimentariaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/mificha/{idficha}/historiaalimentaria/{id}/editar", name="historia_alimentaria_editar")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function edit($id, $idficha, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(HistoriaAlimentaria::class)->find($id);

        $form = $this->createForm(HistoriaAlimentariaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ficha = $this->getDoctrine()->getRepository(Ficha::class)->find($id);

            $registroForm = $form->getData();

            $registroForm->setUnaFicha($ficha);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('historia_alimentaria/edit.html.twig', [
            'controller_name' => 'HistoriaAlimentariaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }
}
