<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Entity\Location;
use App\Form\LouerType;
use PhpParser\Node\Name;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EcfController extends AbstractController
{
    /**
     * @Route("/show", name="ecf_show")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Vehicule::class);

        $vehicules = $repo->findAll();
        return $this->render('ecf/show.html.twig', [
            'controller_name' => 'EcfController',
            'vehicules' => $vehicules
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('ecf/home.html.twig', [
            'controller_name' => 'EcfController',
        ]);
    }

    /**
     * @Route("/louer/", name="louer_show")
     */
    public function show(Request $request, EntityManagerInterface $manager): Response
    {
        $location = new Location();
        $form = $this->createForm(LouerType::class, $location);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($location);
            $manager->flush();
        }

        return $this->render('ecf/louer.html.twig', [
            'controller_name' => 'EcfController',
            'form'=> $form->createView()
        ]);
    }
}
