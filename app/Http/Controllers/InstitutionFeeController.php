<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstitutionFee;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstitutionFeeRequest;

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
     * Loan Simulator
     *
     * @param  mixed $request
     * @return void
     */
    public function store(InstitutionFeeRequest $request)
    {
        $array = array();
        $result = array();
        $storage = $this->institutionfee->getAll();

        try {
            $loan_amount = $request->valor_emprestimo;
            $institutions = $request->instituicoes;
            $agreement = $request->convenios;
            $portion = $request->parcela;

            foreach ($storage as &$item) {
                if ($this->checkData($institutions, $item['instituicao'])) {
                    if ($this->checkData($agreement, $item['convenio'])) {
                        if ($item['parcelas'] === (int)$portion || $portion === null) {
                            array_push($array, $item);
                        }
                    }
                }
            }

            if (count($array) === 0) {
                return response()->json([
                    'message' => 'It was not possible to perform the simulation with the reported data!',
                    'status' => 403,
                    'error' => 'Error'
                ], 403);
            }

            foreach ($array as &$item) {
                if (!isset($result[$item['instituicao']])) {
                    $result[$item['instituicao']] = array();
                }

                $new_item = array(
                    'parcelas' => $item['parcelas'],
                    'valor_parcela' => round($loan_amount * $item['coeficiente'], 2),
                    'taxa' => $item['taxaJuros'],
                    'convenio' => $item['convenio']
                );

                array_push($result[$item['instituicao']], $new_item);
            }

            return response()->json($result, 200);
        } catch (\Exception  $e) {
            return response()->json([
                "message" => "The information sent is invalid. Try again!", 
                "status" => 403, 
                "error" => $e->getMessage()
            ], 403);
        }
    }
    
    /**
     * getInstitutionFee
     *
     * @return void
     */
    private function getInstitutionFee()
    {
        try {
            return response()->json($this->institutionfee->getAll(), 200);
        } catch (\Exception  $e) {
            return response()->json([
                "message" => "It was not possible to read the fees of institutions!", 
                "status" => 404, 
                "error" => $e->getMessage()
            ], 404);
        }
    }
    
    /**
     * checkData
     *
     * @param  array $array
     * @param  string $value
     * @return boolean
     */
    private function checkData($array, $value)
    {
        if ($array === null) {
            return true;
        }

        foreach ($array as &$item) {
            if ($value === $item) {
                return true;
            }
        }

        return false;
    }
}
