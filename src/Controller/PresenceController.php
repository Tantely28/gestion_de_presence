<?php

namespace App\Controller;

use App\Repository\PresenceRepository;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Employee;
use App\Entity\Presence;
use App\Entity\Temps;

class PresenceController extends AbstractController
{
    /**
     * @Route("/presence", name="presence")
     */
    public function index(PresenceRepository $presenceRepository)

    {
        if($this->getUser() == null){
            return $this->redirectToRoute('connexion');
        }
            $pres = $presenceRepository->findAll();

        return $this->render('presence/index.html.twig', [
            'controller_name' => 'PresenceController',
            'presence'=>$pres,
        ]);
    }

}
