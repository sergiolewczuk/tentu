<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Agua;
use App\Form\AguaType;

class AguaController extends AbstractController
{
    /**
     * @Route("/admin/consumodeagua", name="agua")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(Agua::class)->findAll();

        return $this->render('agua/index.html.twig', [
            'controller_name' => 'AguaController',
            'registros' => $registros
            ]);
    }

    /**
     * @Route("/admin/consumodeagua/nuevo", name="agua_nuevo")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new Agua;

        $form = $this->createForm(AguaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('agua');

        }

        return $this->render('agua/new.html.twig', [
            'controller_name' => 'AguaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/consumodeagua/{id}/editar", name="agua_editar")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(Agua::class)->find($id);

        $form = $this->createForm(AguaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('agua');

        }

        return $this->render('agua/edit.html.twig', [
            'controller_name' => 'AguaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/consumodeagua/{id}/borrar", name="agua_borrar")
     * @Security("has_role('ROLE_MODERADOR')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Agua::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('agua');
    }
}
