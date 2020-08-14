<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\InformacionConsulta;
use App\Entity\Ficha;
use App\Form\InformacionConsultaType;

class InformacionConsultaController extends AbstractController
{
    /**
     * @Route("/admin/mificha/{id}/informacionconsulta/nuevo", name="informacion_consulta_nuevo")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function new($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new InformacionConsulta;

        $form = $this->createForm(InformacionConsultaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ficha = $this->getDoctrine()->getRepository(Ficha::class)->find($id);

            $registroForm = $form->getData();

            $registroForm->setUnaFicha($ficha);

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('informacion_consulta/new.html.twig', [
            'controller_name' => 'InformacionConsultaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/mificha/{idficha}/informacionconsulta/{id}/editar", name="informacion_consulta_editar")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function edit($id, $idficha, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(InformacionConsulta::class)->find($id);

        $form = $this->createForm(InformacionConsultaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ficha = $this->getDoctrine()->getRepository(Ficha::class)->find($id);

            $registroForm = $form->getData();

            $registroForm->setUnaFicha($ficha);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('informacion_consulta/edit.html.twig', [
            'controller_name' => 'InformacionConsultaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }
}
