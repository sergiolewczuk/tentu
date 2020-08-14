<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Medicion;
use App\Entity\Ficha;
use App\Form\MedicionType;

class MedicionesController extends AbstractController
{
   /**
     * @Route("/admin/mificha/{id}/medicion/nuevo", name="medicion_nuevo")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function new($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new Medicion;

        $form = $this->createForm(MedicionType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ficha = $this->getDoctrine()->getRepository(Ficha::class)->find($id);

            $registroForm = $form->getData();

            $registroForm->setUnaFicha($ficha);

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('mediciones/new.html.twig', [
            'controller_name' => 'MedicionController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/mificha/{idficha}/medicion/{id}/editar", name="medicion_editar")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function edit($id, $idficha, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(Medicion::class)->find($id);

        $form = $this->createForm(MedicionType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ficha = $this->getDoctrine()->getRepository(Ficha::class)->find($id);

            $registroForm = $form->getData();

            $registroForm->setUnaFicha($ficha);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('mediciones/edit.html.twig', [
            'controller_name' => 'MedicionController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }
}
