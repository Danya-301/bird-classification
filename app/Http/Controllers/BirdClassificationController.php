<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BirdClassificationController extends Controller
{
    public function showForm()
    {
        return view('bird-classification');
    }

    public function classifyBird(Request $request)
    {
        // Validar que se ha subido una imagen
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Subir la imagen a la API de Flask
        $response = Http::attach(
            'image', file_get_contents($request->file('image')), 'image.jpg'
        )->post('http://127.0.0.1:5000/predict'); // Dirección de la API de Flask

        // Verificar si la respuesta es correcta
        if ($response->successful()) {
            $data = $response->json();
            return view('bird-classification', [
                'prediction' => $data['predicted_class'],
                'confidence' => $data['confidence']
            ]);
        } else {
            return back()->withErrors(['error' => 'No se pudo obtener la predicción de la API.']);
        }
    }
}

