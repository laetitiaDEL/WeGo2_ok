<?php

namespace App\Controller;

use App\Entity\Outing;
use App\Repository\ActivityRepository;
use App\Repository\UserRepository;
use App\Service\Utils;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OutingController extends AbstractController
{
    #[Route('/outing/add', name: 'app_add_outing', methods: 'POST')]
    public function add(Request $req, UserRepository $userRepository, ActivityRepository $activityRepository, EntityManagerInterface $entityManagerInterface): Response{
        //on crée deux variables à remplir pour la réponse
        $msg = "";
        $code = "";
        //on récupère le contenu de la requête
        $json = $req->getContent();
        $data = json_decode($json, true);
        //on crée une instance de sortie
        $outing = new Outing();
        //on nettoie les données de la requête
        $date = Utils::cleanInput($data['date']);
        $activity = Utils::cleanInput($data['activity']);
        $creator = Utils::cleanInput($data['user']);

        //on vérife que les champs requis ne sont pas vides
        if(!empty($date) and !empty($creator)){
            //on vérifie les format des données
            if(filter_var($date) and filter_var($activity, FILTER_VALIDATE_INT) and filter_var($creator, FILTER_VALIDATE_INT)){
                $date = filter_var($date, FILTER_DEFAULT);
                $activity = filter_var($activity, FILTER_VALIDATE_INT);
                $creator = filter_var($creator, FILTER_VALIDATE_INT);

                //on attribue les valeurs
                $outing->setDate($date);
                $outing->setActivity($activityRepository->findOneBy(['id' => $activity]));
                $outing->setCreator($userRepository->findOneBy(['id'=> $creator]));
                $entityManagerInterface->persist($outing);
                $entityManagerInterface->flush();
    
                $msg = "La sortie a bien été enregistrée.";
                $code = 200;
                
            }else{
                $msg = "Le format des données n\'est pas valide.";
                $code = 400;
            }
        }else{
            $msg = "Veuillez remplir les champs.";
            $code = 400;
        }
        return $this->json(['error' => $msg], $code, ['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
    }
}
