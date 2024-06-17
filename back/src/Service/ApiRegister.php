<?php
namespace App\Service;
use App\Repository\UserRepository;
use App\Service\Utils;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

    class ApiRegister{

        public function authentification(UserPasswordHasherInterface $userPasswordHasherInterface, UserRepository $userRepository, $mail, $password){
            //nettoyer les info 
            $mail = Utils::cleanInputStatic($mail);
            $password = Utils::cleanInputStatic($password);
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

        public function genToken($mail, UserRepository $userRepository, $key){
            require_once('../vendor/autoload.php');
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
                $key,
                'HS512'
            );
            return $token;

        }

        public function verifyToken($jwt, $key){
            require_once('../vendor/autoload.php');
            try {
                $token = JWT::decode($jwt, new Key($key, 'HS512'));
                return true;
            }
            catch (\Throwable $th){
                return $th->getMessage();
            }
        }
    }

?>