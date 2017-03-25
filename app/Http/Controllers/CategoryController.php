<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Api\ApiController;
use App\Managers\CategoryManager;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    protected $categoryManager ;

    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->categoryManager = new CategoryManager();
    }

    public function index()
    {
        return view('categories.all');
    }

    /**
     * return single category with posts
     * @param $categoryId
     * @return Api\response
     */
    public function getDataForSingleCategory($categoryId)
    {
        $data = $this->categoryManager->getSingleCategoryWithPosts($categoryId);

        if(!$data)
            return $this->setStatusCode(404)->respondWithError('Category Not Found!');

        return $this->setStatusCode(200)->respond($data);
    }

    /**
     * return all categories data
     * @return array response
     */
    public function getData()
    {
        $data = $this->categoryManager->getAllCategories();

        return $this->setStatusCode(200)->respond($data);
    }

    public function show($categoryId)
    {
        return view('categories.category', ['categoryId' => $categoryId]);
    }

}
