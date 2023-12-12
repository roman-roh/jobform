<?php

namespace App\Controller;

use App\Entity\JobApplication;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Validator\ValidatorInterface;




class JobApplicationController extends AbstractController
{

    #[Route('/', name: 'job_application_index')]
    public function index(ManagerRegistry $doctrine): Response
    {
        return $this->render('job_application/index.html.twig');
    }

    #[Route('/search', name: 'job_application_search')]
    public function search(ManagerRegistry $doctrine): Response
    {
        $jobApplications = $doctrine->getRepository(JobApplication::class)->findAll();

        return $this->render('job_application/search.html.twig', [
            'jobApplications' => $jobApplications,
        ]);
    }

    #[Route('/add', name: 'job_application_add')]
    public function new(Request $request, ManagerRegistry $doctrine, ValidatorInterface $validator): Response
    {
        $data = $request->request->all();

        $jobApplication = new JobApplication();
        $jobApplication->setFirstName($data['firstName']);
        $jobApplication->setSecondName($data['SecondName']);
        $jobApplication->setLastName($data['lastName']);
        $birthdayDateTime = new \DateTime($data['Birthday']);
        $jobApplication->setBirthday($birthdayDateTime);
        $jobApplication->setEmail($data['email']);
        $jobApplication->setPhoneNumber($data['phoneNumber']);
        $jobApplication->setExpectedSalary($data['expectedSalary']);
        $jobApplication->setPosition($data['position']);
        $jobApplication->setLevel($data['level']);
        $jobApplication->setNew($data['new'] = 0);

        $errors = $validator->validate($jobApplication);

        if (count($errors) > 0) {
            return $this->render('job_application/index.html.twig', [
                'errors' => $errors,
                'form_data' => $data,
                'success' => false
            ]);
        }
        elseif(count($errors) == 0){
            $entityManager = $doctrine->getManager();
            $entityManager->persist($jobApplication);
            $entityManager->flush();
            return $this->render('job_application/index.html.twig', [
                'success' => true
            ]);        }
        else{
            return $this->render('job_application/index.html.twig');
        }
    }
}
