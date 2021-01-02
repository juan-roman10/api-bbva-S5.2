<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DebtController extends AbstractController
{
    /**
     * @Route("/debts", name="search_debts")
     */
    public function index(): Response
    {
        return new Response ("DebtController");
    }
}
