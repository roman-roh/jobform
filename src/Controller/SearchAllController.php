<?php
namespace App\Controller;

use App\Entity\JobApplication;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class SearchAllController extends AbstractController
{
    #[Route('/all', name: 'job_application_all')]
    public function all(ManagerRegistry $doctrine): Response
    {
        $allApplications = $doctrine->getRepository(JobApplication::class)->findAll();
        foreach ($allApplications as $application) {
            if ($application->isNew() == 0) {

                $application->setNew($data['new'] = 1);
            }
        }
        $entityManager = $doctrine->getManager();
        $entityManager->flush();
        return $this->render('job_application/search.html.twig', [
            'jobApplications' => $allApplications,
        ]);
    }
}
?>