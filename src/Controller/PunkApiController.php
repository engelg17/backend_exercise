<?php

namespace App\Controller;

use App\Service\SearchFood;
use App\Service\DetailsList;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PunkApiController extends AbstractController
{
    protected $searchFoodService;
    protected $detailsListService;

    function __construct (SearchFood $searchFoodService, DetailsList $detailsListService)
    {
        $this->searchFoodService = $searchFoodService;
        $this->detailsListService = $detailsListService;
    }

    #[Route('/punkapi/food/{foodString}', name: 'filterFood')]
    public function filterFood(string $foodString): JsonResponse
    {
        $filter = $this->searchFoodService->filterFood($foodString);
        return new JsonResponse($filter);
    }

    #[Route('/punkapi/', name: 'detailsList')]
    public function detailsList(): JsonResponse
    {
        return new JsonResponse($this->detailsListService->showDetails());
    }
}
