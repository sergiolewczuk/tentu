<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\HistoriaPersonal;
use App\Entity\Ficha;
use App\Form\HistoriaPersonalType;


class HistoriaPersonalController extends AbstractController
{
    /**
     * @Route("/admin/mificha/{id}/historiapersonal/nuevo", name="historia_personal_nuevo")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function new($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new HistoriaPersonal;

        $form = $this->createForm(HistoriaPersonalType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ficha = $this->getDoctrine()->getRepository(Ficha::class)->find($id);

            $registroForm = $form->getData();

            $registroForm->setUnaFicha($ficha);

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('historia_personal/new.html.twig', [
            'controller_name' => 'HistoriaPersonalController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/mificha/{idficha}/historiapersonal/{id}/editar", name="historia_personal_editar")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function edit($id, $idficha, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(HistoriaPersonal::class)->find($id);

        $form = $this->createForm(HistoriaPersonalType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ficha = $this->getDoctrine()->getRepository(Ficha::class)->find($id);

            $registroForm = $form->getData();

            $registroForm->setUnaFicha($ficha);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('historia_personal/edit.html.twig', [
            'controller_name' => 'HistoriaPersonalController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }
}
