<?php
namespace App\Controller;

use App\Entity\JobApplication;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class SearchIdController extends AbstractController
{
    #[Route('job_application_show:', name: 'job_application_show', methods: ['GET', 'POST'])]
    public function show(Request $request, ManagerRegistry $doctrine): Response
    {
        $jobApplications = $doctrine->getRepository(JobApplication::class)->findAll();
        $jobApplication = null;

        if ($request->isMethod('POST')) {
            $jobApplicationId = $request->request->get('jobApplicationId');
            $jobApplication = $doctrine->getRepository(JobApplication::class)->find($jobApplicationId);

            if ($jobApplication) {
                $jobApplication->setNew($data['new'] = 1);
                $entityManager = $doctrine->getManager();
                $entityManager->flush();
            }
        }

        return $this->render('job_application/show.html.twig', [
            'jobApplications' => $jobApplications,
            'jobApplication' => $jobApplication,
        ]);
    }
}
?>