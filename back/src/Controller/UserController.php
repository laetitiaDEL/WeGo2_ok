<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\ApiRegister;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class UserController extends AbstractController
{
    #[Route('/users', name: 'app_users', methods: 'GET')]
    public function index(UserRepository $userRepository, NormalizerInterface $normalizer): Response
    {
        $users = $userRepository->findAll();
        $usersNormalize = $normalizer->normalize($users);
        return $this->json($usersNormalize);
    }

    #[Route('/api/gettoken', name: 'app_api_gettoken')]
    //to get the token
    public function getToken(Request $req, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasherInterface, ApiRegister $apiRegister){
        //get user mail and pwd + key
        $mail = $req->query->get('email');
        $password = $req->query->get('password');
        $key = $this->getParameter('token');
        if($mail && $password){
            if($apiRegister->authentification($userPasswordHasherInterface, $userRepository, $mail, $password)){
                $token = $apiRegister->genToken($mail, $userRepository, $key);
                return $this->json(['token'=>$token],200,['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
            }else{
                return $this->json(['error'=> 'Les identifiants ne correspondent pas.'],401,
                ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
            }
        }else{
            return $this->json(['error' => 'Entrez les identifiants.'], 401, ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
        }
    }

    #[Route('/api/veriftoken', name: 'app_api_veriftoken')]
    //check if token empty
    public function testToken(ApiRegister $apiRegister, Request $req){
        //get token without Bearer (7 fisrt chars)
        $token = substr($req->server->get('HTTP_AUTHORIZATION'),7);
        //get encryption key
        $key = $this->getParameter('token');
        if($apiRegister->verifyToken($token, $key)){
            return $this->json([['error'=> 'Accés authorisé'],200,
            ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']]);
        }else{
            return $this->json(['error'=>$apiRegister->verifyToken($token, $key)], 401,
            ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
        }
    }
}
