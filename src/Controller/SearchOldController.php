<?php
namespace App\Controller;

use App\Entity\JobApplication;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class SearchOldController extends AbstractController
{
    #[Route('/old', name: 'job_application_old')]
    public function showOldApplicationsUI(ManagerRegistry $doctrine): Response
    {
        $allApplications = $doctrine->getRepository(JobApplication::class)->findBy(['New' => 1]);

        return $this->render('job_application/search.html.twig', ['jobApplications' => $allApplications]);
    }


}
?>