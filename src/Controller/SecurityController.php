<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/connexion", name="connexion")
     * @param AuthenticationUtils $utils
     * @return Response
     */
    public function login(AuthenticationUtils $utils)
    {
        $error=$utils->getLastAuthenticationError();
        $username=$utils->getLastUsername();
        return $this->render('security/index.html.twig',[
            'error'=>$error,
            'username'=>$username,
        ]);
    }

    /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function logout()
    {
        return $this->render('security/index.html.twig');
    }
}
