<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Presence;
use App\Repository\EmployeeRepository;
use App\Repository\PresenceRepository;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations  as  Rest;

class EmployeController extends AbstractController
{
    /**
     * @Route("/employe", name="employe")
     */
    public function index()
    {
        return $this->render('employe/index.html.twig');
    }

    /**
     * @Rest\Post("/insert/presence/{code_qr}", name="new_presence")
     * @param EmployeeRepository $repository
     * @param Employee $employee
     * @param PresenceRepository $presenceRepository
     * @return RedirectResponse
     * @throws \Exception
     */
    public function presence(EmployeeRepository $repository, Employee $employee, PresenceRepository $presenceRepository){

        $presen=$presenceRepository->findPresence($employee);
        if($presen[0]->getAction() == "Entre")
        {
            $employe=$repository->find($employee->getId());
            $presence=new Presence();
            $presence->setEmployee($employe);
            $presence->setTemps(new \DateTime());
            $presence->setAction("Sortie");
            $em=$this->getDoctrine()->getManager();
            $em->persist($presence);
            $em->flush();
            return $this->redirectToRoute('employe');
        }else{

            $employe=$repository->find($employee->getId());
            $presence=new Presence();
            $presence->setEmployee($employe);
            $presence->setTemps(new \DateTime());
            $presence->setAction("Entre");
            $em=$this->getDoctrine()->getManager();
            $em->persist($presence);
            $em->flush();
            return $this->redirectToRoute('employe');
        }
    }
}
