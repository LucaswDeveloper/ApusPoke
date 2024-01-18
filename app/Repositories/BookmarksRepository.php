<?php

namespace App\Repositories;

use App\Models\Bookmark as Model;
use Illuminate\Support\Facades\Auth;

class BookmarksRepository
{
    /**
     * @param Model $model
     */
    public function __construct(private Model $model)
    { }

    /**
     * @return mixed
     */
    public function getAll(): mixed
    {
        $result = $this->model->all();
        if (count($result)) {
            return $result;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getByUser(): mixed
    {
        $userId = Auth::id();
        if (!$userId) {
            return false;
        }

        $result = $this->model->where('user_id', $userId)->get();
        return count($result) ? $result : false;
    }

    /**
     * @param array $request
     * @return boolean
     */
    public function store(array $request): bool
    {
        $arrData = [
            'name' => ucfirst(trim(strip_tags($request['name']))),
            'image' => $request['image'],
            'weight' =>$request['weight'],
            'height' => $request['height'],
            'types' => $request['types'],
            'user_id' => Auth::id()
        ];

        $insert = $this->model->create($arrData);
        if ($insert) {
            return true;
        }

        return false;
    }

    /**
     * @param [type] $id
     * @return void
     */
    public function destroy($id): bool
    {
        $result = $this->model->find($id);
        $result->delete();
        return true;
    }
}
