<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Service\Utils;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

    class ApiRegister{

        private string $token;

        public function __construct(string $token){
            $this->token = $token;
        }

        public function authentification(UserPasswordHasherInterface $userPasswordHasherInterface, UserRepository $userRepository, $mail, $password){
            //nettoyer les info 
            $mail = Utils::cleanInput($mail);
            $password = Utils::cleanInput($password);
            //récupérer le compte par son mail
            $user = $userRepository->findOneByEmail($mail);
            if($user){
                if($userPasswordHasherInterface->isPasswordValid($user, $password)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function genToken($mail, UserRepository $userRepository){
            //require_once('../vendor/autoload.php');
            //variables token
            $created_at = new \DateTimeImmutable();
            $expire = $created_at->modify('+60 minutes')->getTimestamp();
            $serverName = "wego2.wip";
            $userName = $userRepository->findOneByEmail($mail)->getName();
            $id = $userRepository->findOneByEmail($mail)->getId();
            //contenu token
            $payload = [
                'iat' => $created_at->getTimestamp(),
                'iss' => $serverName,
                'nbf' => $created_at->getTimestamp() ,
                'exp' => $expire,
                'userName' => $userName,
                'userId' => $id,        
            ];
            $token = JWT::encode(
                $payload,
                $this->token,
                'HS512'
            );
            return $token;

        }


        public function verifyToken($jwt){
            try {
                //Décodage du token
                $token = JWT::decode($jwt, new Key($this->token, 'HS512'));
                return $token;
            } 
            catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

?>