<?php

namespace App\Http\Controllers;

use App\Models\CasaDeSemente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CasaDeSementeController extends Controller
{
    /**
     * Mostra a página principal com o mapa.
     */
    public function index()
    {
        return view('mapa.index');
    }

    /**
     * Mostra o formulário para cadastrar um novo ponto.
     */
    public function create()
    {
        return view('mapa.create');
    }

    /**
     * Salva o novo ponto no banco de dados.
     */
    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string',
        'latitude' => 'required|numeric|between:-90,90',
        'longitude' => 'required|numeric|between:-180,180',
        'responsavel' => 'nullable|string|max:255',
        'telefone' => 'nullable|string|max:20', // NOVO
        'cultivos_principais' => 'nullable|array', // NOVO
        'cultivos_principais.*' => 'string|in:Milho,Feijão,Arroz,Hortaliças,Frutíferas' // NOVO
    ]);

    CasaDeSemente::create($request->all()); // Simples assim! O $fillable e o $casts no Model cuidam do resto.

    return Redirect::route('mapa.index')
        ->with('success', 'Cadastro enviado com sucesso! Aguardando aprovação.');
}

    /**
     * Endpoint da API que retorna os pontos aprovados em formato GeoJSON.
     */
    public function getPontos()
    {
        $pontos = CasaDeSemente::where('aprovado', true)->get();

        $features = $pontos->map(function ($ponto) {
            
            // Verifique se os dados de latitude e longitude não estão nulos no seu banco
            if (is_null($ponto->latitude) || is_null($ponto->longitude)) {
                return null; // Pula este ponto se não tiver coordenadas
            }

            return [
                'type' => 'Feature',
                'geometry' => [ // <-- A CORREÇÃO ESTÁ AQUI
                    'type' => 'Point', // Esta linha é essencial
                    'coordinates' => [ // As coordenadas precisam estar dentro deste objeto
                        (float)$ponto->longitude,
                        (float)$ponto->latitude
                    ]
                ],
                'properties' => [
                    'nome' => $ponto->nome,
                    'descricao' => $ponto->descricao,
                    'responsavel' => $ponto->responsavel,
                    'contato' => $ponto->contato,
                    'cultivos_principais' => $ponto->cultivos_principais,
                ],
            ];
        })->filter(); // O ->filter() remove os itens nulos que podem ter sido gerados acima

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $features->values(), // Usar values() para reindexar o array
        ]);
    }
}