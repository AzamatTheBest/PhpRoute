<?php

namespace App\Controller;

use App\Entity\Foo;
use App\Form\FooType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class FooController extends AbstractController
{

    #[Route('/foo/create', name: 'foo_create')]
    public function create(Request $request, EntityManagerInterface $em)
    {
        $foo = new Foo();
        $form = $this->createForm(FooType::class, $foo);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->persist($foo);
            $em->flush();
            return $this->redirectToRoute('foo_create', [
                'foo' => $foo->getId(),
            ]);
        }

        return $this->render('foo_list.html.twig', [
            'foos' => $em->getRepository(Foo::class)->findAll(),
            'form'     => $form->createView(),
        ]);
    }


    #[Route('/foo/edit/{foo}', name: 'foo_edit', requirements: ['foo' => '\d+'])]
    public function edit(Foo $foo, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(FooType::class, $foo);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->persist($foo);
            $em->flush();
            return $this->redirectToRoute('foo_create');
        }

        return $this->render('foo_edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/foo/delete/{foo}', name: 'foo_delete', requirements: ['foo' => '\d+'])]
    public function delete(Foo $foo, EntityManagerInterface $em)
    {
        $em->remove($foo);
        $em->flush();
        return $this->redirectToRoute('foo_create');
    }

}