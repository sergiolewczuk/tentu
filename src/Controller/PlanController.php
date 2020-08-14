<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Mercadopagoo;
use App\Entity\Plan;
use App\Form\PlanType;


class PlanController extends AbstractController
{
    /**
     * @Route("/admin/planes", name="plan")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function index(Mercadopagoo $mercadopagoo)
    {

        $registros = $this->getDoctrine()->getRepository(Plan::class)->findAll();

        $mercadopagoo->newPreferencias($registros);

        return $this->render('plan/index.html.twig', [
            'controller_name' => 'PlanController',
            'registros' => $registros,
            'mercadopago' => $mercadopagoo
            ]);
    }

    /**
     * @Route("/planesnutricionales", name="planes")
     */
    public function planes()
    {

        $registros = $this->getDoctrine()->getRepository(Plan::class)->findAll();

        return $this->render('institucional/planes.html.twig', [
            'controller_name' => 'DefaultController',
            'registros' => $registros
        ]);
    }

    /**
     * @Route("/planesnutricionales/{id}", name="planes_detalle")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function detail($id, Mercadopagoo $mercadopagoo)
    {

        $registro = $this->getDoctrine()->getRepository(Plan::class)->find($id);

        $mercadopagoo->newPreferencia($registro);

        return $this->render('institucional/plan.html.twig', [
            'controller_name' => 'PlanController',
            'registro' => $registro,
            'mercadopago' => $mercadopagoo
            ]);
    }

    /**
     * @Route("/admin/planes/nuevo", name="plan_nuevo")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function new(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = new Plan;

        $form = $this->createForm(PlanType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('plan');

        }

        return $this->render('plan/new.html.twig', [
            'controller_name' => 'PlanController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/planes/{id}/editar", name="plan_editar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function edit($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $registro = $this->getDoctrine()->getRepository(Plan::class)->find($id);

        $form = $this->createForm(PlanType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('plan');

        }

        return $this->render('plan/edit.html.twig', [
            'controller_name' => 'PlanController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/planes/{id}/borrar", name="plan_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Plan::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('plan');
    }


    /**
     * @Route("/admin/planes/{id}/checkout", name="plan_checkout")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function checkout($id)
    {

        
    }

}
