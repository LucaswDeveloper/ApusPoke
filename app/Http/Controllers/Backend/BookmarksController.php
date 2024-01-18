<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\BookmarksRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BookmarksController extends Controller
{
    /**
     * @param BookmarksRepository $bookmarkRepository
     * @param Request $request
     */
    public function __construct(
        private BookmarksRepository $bookmarkRepository,
        private Request $request)
    { }

    /**
     * @return View
     */
    public function index(): View
    {
        $results = $this->bookmarkRepository->getByUser();
        return view('bookmarks',['results' => $results]);
    }

    /**
     * @return View
     */
    public function store(): mixed
    {
        $request = $this->request->all();
        $resultStore = $this->bookmarkRepository->store($request);

        if($resultStore){
            return redirect()->to(url('/favoritos'));
        }

        return view('search', ['bookError' => "Não conseguimos favoritar seu Pokemon :/"]);
    }

    /**
     * @return void
     */
    public function destroy()
    {
        $requestId = $this->request->input('id');
        $result =  $this->bookmarkRepository->destroy($requestId);
        return redirect()->to(url('/favoritos'));
    }
}
