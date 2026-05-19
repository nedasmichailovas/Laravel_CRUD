<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $students = Student::with('city', 'group')->get();

        $pdf = Pdf::loadView('pdf.students', compact('students'));

        return $pdf->download('studentai.pdf');
    }
}