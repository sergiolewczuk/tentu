<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cliente;
use App\Entity\EstadoCliente;
use App\Entity\EstadoFicha;
use App\Entity\Rol;
use App\Entity\Ficha;
use App\Entity\HistoriaClinica;
use App\Form\ClienteType;
use App\Form\ClienteDatosType;
use App\Form\ClientePasswordType;

class ClienteController extends AbstractController
{
    /**
     * @Route("/admin/registro/cliente", name="cliente_registro")
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = new Cliente;

        $form = $this->createForm(ClienteType::class, $registro);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $estado = $this->getDoctrine()->getRepository(EstadoCliente::class)->find(3);

            $estadoFicha = $this->getDoctrine()->getRepository(EstadoFicha::class)->find(2);

            $rol = $this->getDoctrine()->getRepository(Rol::class)->find(5);

            $ficha = new Ficha;

            $ficha->setUnEstado($estadoFicha);

            $historiaClinica = new HistoriaClinica;

            $ficha->setUnaHistoriaClinica($historiaClinica);

            $registroForm->setUnEstado($estado);

            $registroForm->setUnaFicha($ficha);

            $registroForm->setRol($rol);

            $encoded = $encoder->encodePassword($registro, $registroForm->getPassword());

            $registroForm->setPassword($encoded);

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('home');

        }

        
        return $this->render('cliente/register.html.twig', [
            'controller_name' => 'ClienteController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/cliente", name="cliente")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function index()
    {

        $registros = $this->getDoctrine()->getRepository(Cliente::class)->findAll();

        return $this->render('cliente/index.html.twig', [
            'controller_name' => 'EstadoClienteController',
            'registros' => $registros
            ]);
    }

    /**
     * @Route("/admin/cliente/miperfil", name="cliente_perfil")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function perfil()
    {


        return $this->render('cliente/perfil.html.twig', [
            'controller_name' => 'EstadoClienteController',
            ]);
    }

    /**
     * @Route("/admin/cliente/miperfil/password", name="cliente_perfil_password")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function perfilPassword(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $cliente = $this->getDoctrine()->getRepository(Cliente::class)->find($user->getId());

        $cliente->setPassword("");

        $form = $this->createForm(ClientePasswordType::class, $cliente);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $encoded = $encoder->encodePassword($cliente, $registroForm->getPassword());

            $registroForm->setPassword($encoded);

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('cliente_perfil');

        }

        return $this->render('cliente/editPassword.html.twig', [
            'controller_name' => 'EstadoFichaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/cliente/miperfil/editar", name="cliente_perfil_edit")
     * @Security("has_role('ROLE_CLIENTE')")
     */
    public function perfilEdit(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $cliente = $this->getDoctrine()->getRepository(Cliente::class)->find($user->getId());

        $form = $this->createForm(ClienteDatosType::class, $cliente);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('cliente_perfil');

        }

        return $this->render('cliente/editDatos.html.twig', [
            'controller_name' => 'EstadoFichaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/cliente/{id}/editar", name="cliente_edit")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function clienteEdit($id,Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $cliente = $this->getDoctrine()->getRepository(Cliente::class)->find($id);

        $form = $this->createForm(ClienteDatosType::class, $cliente);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $registroForm = $form->getData();

            $entityManager->persist($registroForm);

            $entityManager->flush();

            return $this->redirectToRoute('cliente');

        }

        return $this->render('cliente/editDatos2.html.twig', [
            'controller_name' => 'EstadoFichaController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/cliente/{id}/borrar", name="cliente_borrar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function delete($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Cliente::class)->find($id);

        $entityManager->remove($registro);

        $entityManager->flush();

        return $this->redirectToRoute('cliente');
    }

    /**
     * @Route("/admin/cliente/{id}/activar", name="cliente_activar")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function activar($id)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $registro = $this->getDoctrine()->getRepository(Cliente::class)->find($id);

        $estado = $this->getDoctrine()->getRepository(EstadoCliente::class)->find(2);

        $registro->setUnEstado($estado);        

        $entityManager->flush();

        return $this->redirectToRoute('cliente');
    }
}
