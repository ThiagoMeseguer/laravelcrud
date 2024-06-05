<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Exports\ListExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportPDF(Request $request)
    {
        $students = json_decode($request->input('students'));
        //dd($students);
        if (!empty($students)) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml(view('exports.pdf', compact('students')));
            $dompdf->render();
            $dompdf->stream('Reporte.pdf', ['Attachment' => false]);
        }else{
            return redirect()->route('students.index')->withError('Ocurrió un error al generar el archivo PDF.');
        }
    }
    
    public function exportExcel(Request $request) 
    {
        $students = json_decode($request->input('students'));
        if (!empty($students)) {
        Excel::download(new ListExport($students), 'reporte.xlsx');
        return redirect()->route('students.index')->withsuccess('El archivo Excel se ha generado correctamente');
        }else{
            return redirect()->route('students.index')->withError('Ocurrió un error al generar el archivo Excel.');
        }
    }
}










