<?php
namespace App\Controller\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Facade\EasyAdminFacade; // Import the EasyAdminFacade

use App\Entity\Etudiant;


class ScoreDisplayController extends AbstractController
{
    private $entityManager;

    // Inject the EntityManagerInterface into the constructor.
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/admin/user', name: 'app_admin_user_index',methods: ['GET', 'POST'])]
    public function displayScore(Request $request): Response
    {
      
        $identifier = $request->request->get('identifier');
        $repository = $this->entityManager->getRepository(Etudiant::class);
        $etudiant = $repository->findOneBy(['identifiant' => $identifier]);

        $score = null;
        if ($etudiant !== null) {
            $score = $etudiant->getScore();
        }

        return $this->render('bundles\EasyAdminBundle\exemple.html.twig', [
           
            'identifier' => $identifier,
            'score' => $score,
        ]);
    }
}
