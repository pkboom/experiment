<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController extends Controller
{
    public function index()
    {
        $dompdf = new Dompdf();
        $dompdf->setPaper('letter');
        $dompdf->loadHtml(View::make('welcome')->render());

        $dompdf->render();

        $output = $dompdf->output();

        return new Response($output, 200, [
            'Content-Disposition' => 'inline',
            // 'Content-Disposition' => 'attachment; filename=csdf.pdf',
            'Content-Type' => 'application/pdf',
        ]);
    }
}
