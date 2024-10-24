<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudad;

class CiudadController extends Controller
{
    public function index()
    {
        // Obtener todas las ciudades
        $ciudades = Ciudad::all();
        return view('index', compact('ciudades'));
    }

    public function getClimaYCambio(Request $request)
{
    $ciudad = Ciudad::where('nombre', $request->input('ciudad'))->first();

    if (!$ciudad) {
        return response()->json(['error' => 'Ciudad no encontrada'], 404);
    }

    $presupuesto = $request->input('presupuesto');
    $apiKey = '6798d92ccdffd2e4456da81c0b768de7';
    
    $clima = @file_get_contents("https://api.openweathermap.org/data/2.5/weather?q={$ciudad->nombre}&appid={$apiKey}&units=metric");

    if ($clima === FALSE) {
        return response()->json(['error' => 'Error al llamar a la API'], 500);
    }

    $clima = json_decode($clima);

    // Agregar validación adicional
    if (!isset($clima->main)) {
        return response()->json(['error' => 'Datos climáticos no disponibles'], 500);
    }

    if (isset($clima->cod) && $clima->cod != 200) {
        return response()->json(['error' => 'No se pudo obtener el clima para la ciudad: ' . $ciudad->nombre], 500);
    }

    $monto_local = $presupuesto * $ciudad->tasa_cambio;

    return response()->json([
        'temperatura' => $clima->main->temp,
        'moneda' => $ciudad->moneda_local,
        'simbolo' => $ciudad->simbolo_moneda,
        'monto_local' => number_format($monto_local, 2) . " " . $ciudad->simbolo_moneda,
        'tasa_cambio' => $ciudad->tasa_cambio,
    ]);
}


}
