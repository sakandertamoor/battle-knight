<?php

namespace App\Http\Controllers;
use Notification;
use App\Interfaces\KnightRepositoryInterface;
use App\Services\KnightGeneratorService;
use App\Interfaces\RandomNameGeneratorServiceInterface;
use App\Models\User;
use App\Notifications\KnightNotification;


class KnightsController extends Controller
{
    private KnightRepositoryInterface $knightRepository;
    private KnightGeneratorService $knightGeneratorService;
    
    public function __construct(KnightGeneratorService $knightGeneratorService, KnightRepositoryInterface $knightRepository)
    {
          $this->knightRepository = $knightRepository;
          $this->knightGeneratorService = $knightGeneratorService;
    }

    public function fight()
    {
        $userData = User::first();
        $firstKnight = $this->knightGeneratorService->generate();
        $secondKnight = $this->knightGeneratorService->generate();
        $this->knightRepository->add($firstKnight);
        Notification::send($userData, new KnightNotification($firstKnight, $userData));
        $this->knightRepository->add($secondKnight);
        Notification::send($userData, new KnightNotification($secondKnight, $userData));


       // $knight = $this->knightRepository->get($knightId);
    }

    public function show(int $knightId)
    {
        $knight = $this->knightRepository->get($knightId);    
    }

    public function winner(int $knightId){
        $userData = User::first();
        $knight = $this->knightRepository->get($knightId);
        Notification::send($userData, new KnightNotification($knight, $userData));
    }


}
