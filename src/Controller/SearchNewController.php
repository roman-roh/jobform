<?php
namespace App\Controller;

use App\Entity\JobApplication;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class SearchNewController extends AbstractController
{
    #[Route('/new', name: 'job_application_new')]
    public function showNewApplicationsUI(ManagerRegistry $doctrine): Response
    {
        $allApplications = $doctrine->getRepository(JobApplication::class)->findBy(['New' => 0]);
        foreach ($allApplications as $application) {
            $application->setNew($data['new'] = 1);
        }
        $entityManager = $doctrine->getManager();
        $entityManager->flush();
        return $this->render('job_application/search.html.twig', ['jobApplications' => $allApplications]);
    }
}
?>