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
    private ApiRegister $apiRegister;

    public function __construct(ApiRegister $apiRegister){
        $this->apiRegister = $apiRegister;
    }
    #[Route('/users', name: 'app_users', methods: 'GET')]
    public function index(UserRepository $userRepository, NormalizerInterface $normalizer): Response
    {
        $users = $userRepository->findAll();
        return $this->json($users,200,['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*'],['groups' => 'users']);
    }

    #[Route('/api/gettoken', name: 'app_api_gettoken')]
    //to get the token
    public function getToken(Request $req, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasherInterface): Response{
        //get user mail and pwd + key
        $mail = $req->query->get('email');
        $password = $req->query->get('password');
        $key = $this->getParameter('token');
        if($mail && $password){
            if($this->apiRegister->authentification($userPasswordHasherInterface, $userRepository, $mail, $password)){
                $token = $this->apiRegister->genToken($mail, $userRepository, $key);
                return $this->json(['token'=>$token],200,['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
            }else{
                return $this->json(['error'=> 'Les identifiants ne correspondent pas.'],401,
                ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
            }
        }else{
            return $this->json(['error' => 'Entrez les identifiants.'], 401, ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
        }
    }

    #[Route('/api/veriftoken', name:'app_api_veriftoken')]
    public function verifApiToken(Request $request): Response{
        $jwt = substr($request->server->get('HTTP_AUTHORIZATION'),7);
        $verif = $this->apiRegister->verifyToken($jwt);  
        if($verif!==true){
            return $this->json(['error'=>$verif], 401,
            ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
        }
        else{
            return $this->json(['error'=> 'Accès authorisé'],200,
            ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
        }
    }

    #[Route('/add/user', name: 'app_add_test', methods: 'POST')]
    public function add(Request $req, UserRepository $userRepository, 
    UserPasswordHasherInterface $userPasswordHasherInterface, SerializerInterface $serializerInterface, EntityManagerInterface $entityManagerInterface): Response{
        $json = $req->getContent();
        if($json){
            $data = $serializerInterface->decode($json, 'json');
            $user = new User();
            $user->setName($data['name']);
            $user->setEmail($data['email']);
            $user->setPassword($userPasswordHasherInterface->hashPassword($user, $data['password']));
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();
            return $this->json($user, 200, ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*'], ['groups' => 'users']);
        }
        return $this->json(['error' => 'Informations incorrectes.'], 401, ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
    }
}
