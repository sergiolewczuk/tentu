<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\HistoriaClinica;
use App\Entity\Medicacion;
use App\Entity\Patologia;
use App\Entity\Ficha;
use App\Form\PatologiaType;
use App\Form\AntecedenteType;
use App\Form\MedicacionType;

class HistoriaClinicaController extends AbstractController
{
     /**
     * @Route("/admin/mificha/historiaclinica/{id}/medicacion/nuevo", name="historia_clinica_medicacion_nuevo")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function newMedicacion($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $historia = $this->getDoctrine()->getRepository(HistoriaClinica::class)->find($id);

        $registro = new Medicacion;

        $form = $this->createForm(MedicacionType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $registroForm = $form->getData();

            $registroForm->setUnaHistoriaClinica($historia);

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('historia_clinica/newMedicacion.html.twig', [
            'controller_name' => 'HistoriaClinicaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/mificha/historiaclinica/{idhistoria}/medicacion/{id}/editar", name="historia_clinica_medicacion_editar")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function editMedicacion($idhistoria, $id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Medicacion::class)->find($id);

        $form = $this->createForm(MedicacionType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('historia_clinica/editMedicacion.html.twig', [
            'controller_name' => 'HistoriaClinicaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/mificha/historiaclinica/{idhistoria}/medicacion/{id}/borrar", name="historia_clinica_medicacion_borrar")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function deleteMedicacion($idhistoria, $id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Medicacion::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('ficha');
    }

    /**
     * @Route("/admin/mificha/historiaclinica/{id}/patologia/nuevo", name="historia_clinica_patologia_nuevo")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function newPatologia($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $historia = $this->getDoctrine()->getRepository(HistoriaClinica::class)->find($id);

        $registro = new Patologia;

        $form = $this->createForm(PatologiaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $registroForm = $form->getData();

            $registroForm->setUnaHistoriaClinica($historia);

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('historia_clinica/newPatologia.html.twig', [
            'controller_name' => 'HistoriaClinicaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/mificha/historiaclinica/{idhistoria}/patologia/{id}/editar", name="historia_clinica_patologia_editar")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function editPatologia($idhistoria, $id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Patologia::class)->find($id);

        $form = $this->createForm(patologiaType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('historia_clinica/editPatologia.html.twig', [
            'controller_name' => 'HistoriaClinicaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }



     /**
     * @Route("/admin/mificha/historiaclinica/{idhistoria}/patologia/{id}/borrar", name="historia_clinica_patologia_borrar")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function deletePatologia($idhistoria, $id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Patologia::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('ficha');
    }

    /**
     * @Route("/admin/historiaclinica/{id}/antecedentesfamiliares/nuevo", name="historia_clinica_antecedente_nuevo")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function newAntecedente($id,Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(HistoriaClinica::class)->find($id);

        $form = $this->createForm(AntecedenteType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('historia_clinica/newAntecedente.html.twig', [
            'controller_name' => 'historiaclinicaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/historiaclinica/{id}/antecedentesfamiliares/editar", name="historia_clinica_antecedente_editar")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function editAntecedente($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(HistoriaClinica::class)->find($id);

        $form = $this->createForm(AntecedenteType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->flush();

            return $this->redirectToRoute('ficha');

        }

        return $this->render('historia_clinica/editAntecedente.html.twig', [
            'controller_name' => 'historiaclinicaController',
            'registro' => $registro,
            'form' => $form->createView(),
        ]);
    }

    

}
