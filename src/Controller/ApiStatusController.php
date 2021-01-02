<?php

namespace App\Controller;
// src/Controller/ApiStatusController.php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiStatusController{

    /**
     * Check API status.
     *
     * @Route("/healtcheck", name="check_status_api")
     */
    public function healtcheck() {
        $response = new Response('API Online', Response::HTTP_OK);
        return $response;
    }

}