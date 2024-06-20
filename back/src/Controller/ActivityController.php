<?php

namespace App\Controller;

use App\Repository\ActivityRepository;
use App\Repository\UserRepository;
use App\Service\ApiRegister;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ActivityController extends AbstractController
{
    private ApiRegister $apiRegister;

    public function __construct(ApiRegister $apiRegister){
        $this->apiRegister = $apiRegister;
    }
    #[Route('/activities', name: 'app_activities', methods: 'GET')]
    public function index(ActivityRepository $activityRepository, NormalizerInterface $normalizer): Response
    {
        $activities = $activityRepository->findAll();
        return $this->json($activities,200,['Content-Type'=>'application/json', 'Access-Control-Allow-Origin'=>'*']);
    }
}
