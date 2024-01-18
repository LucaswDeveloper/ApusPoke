<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\PokemonApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BackendController extends Controller
{
    /**
     * @param PokemonApiController $pokemonApiController
     */
    public function __construct(private PokemonApiController $pokemonApiController)
    { }

    /**
     * @return \Illuminate\View\View
     */
    public function dashboard(): \Illuminate\Contracts\View\View
    {
        return view('dashboard');
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function search(Request $request): \Illuminate\Contracts\View\View
    {
        return view('search');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function searchPost(Request $request): mixed
    {
        $messages = [
            'busca.required' => 'Informe o nome do Pokemon.',
            'busca.string' => 'O nome deve ser uma sequência de caracteres.',
        ];

        $validator = Validator::make($request->all(), [
            'busca' => 'required|string',
        ], $messages);

        if ($validator->fails()) {
            return redirect('/search')
                    ->withErrors($validator)
                    ->withInput();
        }

        $term = strtolower($request->input('busca'));
        $statusCode = 200;
        $message = null;
        $status = true;
        $result = false;

        if ($term) {

            $resultApi = $this->pokemonApiController->getPokemon($term);
            $resultContent = $resultApi->getData(true);

            if ($resultApi->getStatusCode() < 200 || $resultApi->getStatusCode() > 400) {
                $status = false;
                $statusCode = $resultApi->getStatusCode();
                $message = $resultContent['message'];
                $resultContent = null;
            }

            $result = [
                'status' => $status,
                'statusCode' => $statusCode,
                'message' => $message,
                'term' => $term,
                'data' => $resultContent,
            ];
        }

        return view('search', ['result' => $result]);
    }
}
