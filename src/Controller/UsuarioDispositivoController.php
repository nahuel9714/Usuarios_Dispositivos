<?php

namespace App\Controller;

use App\Entity\UsuarioDispositivo;
use App\Form\UsuarioDispositivoType;
use App\Repository\UsuarioDispositivoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/usuario/dispositivo")
 */
class UsuarioDispositivoController extends AbstractController
{
    /**
     * @Route("/", name="usuario_dispositivo_index", methods={"GET"})
     */
    public function index(UsuarioDispositivoRepository $usuarioDispositivoRepository): Response
    {
        return $this->render('usuario_dispositivo/index.html.twig', [
            'usuario_dispositivos' => $usuarioDispositivoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="usuario_dispositivo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $usuarioDispositivo = new UsuarioDispositivo();
        $form = $this->createForm(UsuarioDispositivoType::class, $usuarioDispositivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuarioDispositivo);
            $entityManager->flush();

            return $this->redirectToRoute('usuario_dispositivo_index');
        }

        return $this->render('usuario_dispositivo/new.html.twig', [
            'usuario_dispositivo' => $usuarioDispositivo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="usuario_dispositivo_show", methods={"GET"})
     */
    public function show(UsuarioDispositivo $usuarioDispositivo): Response
    {
        return $this->render('usuario_dispositivo/show.html.twig', [
            'usuario_dispositivo' => $usuarioDispositivo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="usuario_dispositivo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UsuarioDispositivo $usuarioDispositivo): Response
    {
        $form = $this->createForm(UsuarioDispositivoType::class, $usuarioDispositivo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usuario_dispositivo_index');
        }

        return $this->render('usuario_dispositivo/edit.html.twig', [
            'usuario_dispositivo' => $usuarioDispositivo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="usuario_dispositivo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UsuarioDispositivo $usuarioDispositivo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$usuarioDispositivo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($usuarioDispositivo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('usuario_dispositivo_index');
    }
}
