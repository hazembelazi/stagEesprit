<?php

namespace App\Controller\Admin;

use App\Entity\Reo;
use App\Repository\EtudiantRepository;
use App\Repository\ReoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Joli\JoliNotif\Notification;
use Joli\JoliNotif\NotifierFactory;


class ReoController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/admin/form', name: 'reo_form')]
    public function reoForm(Request $request, EtudiantRepository $etudiantRepository): Response
    {
        $deadline = new \DateTime('2023-09-07T23:59:59');
        $currentDateTime = new \DateTime();

        if ($currentDateTime > $deadline) {
            $notifier = NotifierFactory::create();

        // Create your notification
        $notification =
            (new Notification())
            ->setTitle('esprit')
            ->setBody('Les opportunités déchanges ne sont plus disponibles, vous avez dépassé la date limite.')
           
        ;
        
        // Send it
        $notifier->send($notification);
            return $this->redirectToRoute('dashboard');
        }

        $reo = new Reo();
        $form = $this->createFormBuilder($reo)
            ->add('identifiant', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();

        if ($request->getMethod() === 'POST') {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $identifiant = $form->get('identifiant')->getData();

                $etudiant = $etudiantRepository->findOneByIdentifiant($identifiant);

                if ($etudiant) {
                    $reo = new Reo();
                    $reo->setIdentifiant($etudiant->getIdentifiant());
                    $reo->setNom($etudiant->getNom());
                    $reo->setPrenom($etudiant->getPrenom());
                    $reo->setScore($etudiant->getScore());

                    $this->entityManager->persist($reo);
                    $this->entityManager->flush();

                    $this->addFlash('success', 'Données enregistrées avec succès.');
                } else {
                    $this->addFlash('error', 'Identifiant introuvable.');
                }
            }
        }

        return $this->render('bundles\EasyAdminBundle\form.html.twig', [
            'form' => $form->createView(),
            'deadline' => $deadline, // Passer la date limite au modèle Twig
            'currentDateTime' => $currentDateTime, // Passer la date actuelle au modèle Twig
        ]);
    }


    
    #[Route('/admin/reo/list', name: 'reo_list')]
    public function reoList(ReoRepository $reoRepository): Response
    {
        $reos = $reoRepository->findBy([], ['score' => 'DESC']);

        return $this->render('bundles\EasyAdminBundle\list.html.twig', [
            'reos' => $reos,
        ]);
    }

    #[Route('/admin/reo/final', name: 'reo_r')]
public function reo(ReoRepository $reoRepository): Response
{
    // Vérifier si la date actuelle est supérieure à 2023-09-07T23:59:59
    $currentDateTime = new \DateTime();
    $jourresultat = new \DateTime('2023-09-07T23:59:59');

    if ($currentDateTime < $jourresultat) {
        $notifier = NotifierFactory::create();

        // Create your notification
        $notification =
            (new Notification())
            ->setTitle('ESPRIT')
            ->setBody('This is the body of your notification')
           
        ;
        
        // Send it
        $notifier->send($notification);
        return $this->redirectToRoute('dashboard');
    }

    $reos = $reoRepository->findBy([], ['score' => 'DESC']);

    return $this->render('bundles\EasyAdminBundle\final.html.twig', [
        'reos' => $reos,
        'deadline' => $jourresultat, // Passer la date limite au modèle Twig
        'currentDateTime' => $currentDateTime,
    ]);
}
}
