<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institution;

/**
 * InstitutionController
 */
class InstitutionController extends Controller
{
    private $institution;
    
    /**
     * __construct
     *
     * @param  mixed $institution
     * @return void
     */
    public function __construct(Institution $institution) 
    {
        $this->institution = $institution;
    }
    
    /**
     * Display a listing of the Institutions
     *
     * @return void
     */
    public function index()
    {
        try {
            return response()->json([$this->institution->getAll(), "status" => 200], 200);
        } catch (\Exception  $e) {
            return response()->json([
                "message" => "It was not possible to read institutions!", 
                "status" => 404, 
                "error" => $e->getMessage()
            ], 404);
        }
    }
}
