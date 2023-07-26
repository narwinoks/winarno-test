<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CheckFactorController extends Controller
{
    public function index(Request $request)
    {
        return view('features.checkNumber.index');
    }
    public function check(Request $request)
    {
        // validate form
        $validator = Validator::make($request->all(), [
            'number' => 'required|min:2|integer',
        ]);

        // return error validation
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST);
        }
        $number = $request->number;
        $factors = [];
        for ($i = 2; $i <= $number; $i++) {
            if ($number % $i == 0) {
                $factors[] = $number / $i;
            }
        }
        $factors[] = (int) $number;
        rsort($factors);
        return view('features.checkNumber.data', compact('number', 'factors'));
    }
}
