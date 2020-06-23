<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agreement;

/**
 * AgreementController
 */
class AgreementController extends Controller
{
    private $agreement;
    
    /**
     * __construct
     *
     * @param  mixed $agreement
     * @return void
     */
    public function __construct(Agreement $agreement) 
    {
        $this->agreement = $agreement;
    }
    
    /**
     * Display a listing of the Agreements
     *
     * @return void
     */
    public function index()
    {
        try {
            return response()->json($this->agreement->getAll(), 200);
        } catch (\Exception  $e) {
            return response()->json([
                "message" => "It was not possible to read the agreements!", 
                "status" => 404, 
                "error" => $e->getMessage()
            ], 404);
        }
    }
}
