<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportPDFController extends Controller
{
    public function postInstruction(Request $request){
        $instructions = $request->input('content');
//        return response()->json($instructions);
        return view('check', compact('instructions'));
    }
    public function exportPDF(Request $request){
        $instructions = $request->query('instructions');
        $pdf = Pdf::loadView('check', compact('instructions'));
        return $pdf->download('instructions.pdf');
    }
}