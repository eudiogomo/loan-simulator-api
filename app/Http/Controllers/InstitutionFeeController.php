<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstitutionFee;

/**
 * InstitutionFeeController
 */
class InstitutionFeeController extends Controller
{
    private $institutionfee;
    
    /**
     * __construct
     *
     * @param  mixed $institutionfee
     * @return void
     */
    public function __construct(InstitutionFee $institutionfee) 
    {
        $this->institutionfee = $institutionfee;
    }
    
    /**
     * Display a listing of the Instituitions Fees
     *
     * @return void
     */
    public function index()
    {
        return $this->getInstitutionFee();
    }
    
    /**
     * getInstitutionFee
     *
     * @return void
     */
    private function getInstitutionFee()
    {
        try {
            return response()->json([$this->institutionfee->getAll(), "status" => 200], 200);
        } catch (\Exception  $e) {
            return response()->json([
                "message" => "It was not possible to read the fees of institutions!", 
                "status" => 404, 
                "error" => $e->getMessage()
            ], 404);
        }
    }
}
