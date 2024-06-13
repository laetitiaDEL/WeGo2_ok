<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'app_users', methods: 'GET')]
    public function index(UsersRepository $usersRepository, NormalizerInterface $normalizer): Response
    {
        $users = $usersRepository->findAll();
        $usersNormalize = $normalizer->normalize($users);
        return $this->json($usersNormalize);
    }
}
