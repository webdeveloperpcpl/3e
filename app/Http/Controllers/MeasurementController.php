<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeasurementRequest;
use App\Helpers\Measurement;



class MeasurementController extends Controller
{

    private $measurement;

    public function __construct()
    {

        $this->measurement = new Measurement();
    }

    public function stats()
    {

        $response = $this->measurement->stats();
        return Response($response, 200);
    }

    public function update(MeasurementRequest $request)
    {

        $validated = $request->validated();

        $response = $this->measurement->update($validated['value']);
        return Response($response, 200);
    }

}