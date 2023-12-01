<?php

namespace App\Controllers\Api;

use App\Models\CategoryModel;
use App\Models\BlogModel;
use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController
{
//POST
    public function createCategory()
{
    //validation
    $rules = [
        "name" => "required|is_unique[categories.name]"
    ];

    if(!$this->validate($rules))    {
        //failed to validate
        $response = [
            "status" => 500,
            "message" => $this->validator->getErrors(),
            "data" =>[],
            "error" =>true,
        ];
    }
    else{
        //validated
        $category_obj = new CategoryModel();    
        $data = [
            "name" => $this->request->getVar("name"),
            "status" => $this->request->getVar("status"),
        ];
        
        if($category_obj->insert($data)) {
            //data has been saved to database
            $response = [
                "status"=> 200,
                "message"=> "Category has been created successfully",
                "data"=> [],
                "error"=>false,
            ];
        }
        else{
            //data failed to save
            $response = [
                "status"=> 500,
                "message"=> "Failed to create category",
                "data"=> [],
                "error"=>true,
            ];
        }
    }
    return $this->respondCreated($response);
}
//GET
public function listCategory(){
    $category_object = new CategoryModel();

    $response = [
        "status" => 200,
        "message" => "List Categories",
        "data" => $category_object->findAll(),
        "error" => false,
    ];
    return $this->respondCreated($response);

}
//POST
public function createBlog(){
    $rules = [
        "category_id" => "required",
        "title" => "required" 
    ];
    if(!$this->validate($rules)){
        //error in validation
        $response = [
            "status" => 500,
            "message" => $this->validator->getErrors(),
            "data" => [],
            "error" => true,
        ];
    }
    else{
        //validated
        $category_obj = new CategoryModel();
        $is_exists = $category_obj->find($this->request->getVar("category_id"));
        if(!$is_exists){
            //category does not exists
            $response = [
                "status" => 404,
                "message" => "Category not found",
                "data" => [],
                "error" => true,
            ];
        }
        else{
            //category exists
            $blog_obj = new BlogModel();
            $data = [
                "category_id" => $this->request->getVar("category_id"),
                "title" => $this->request->getVar("title"),
                "content" => $this->request->getVar("content"),
            ];
            if( $blog_obj->insert($data)){
                // new blog created successsfully
                $response = [
                    "status" => 200,
                    "message" => "Blog created successfully",
                    "data" => [],
                    "error" => false,
                ];
            }
            else{
                //failed to create blog.
                $response = [
                    "status" => 500,
                    "message" =>"Failed to create a blog",
                    "data" => [],
                    "error" => true,
                ];
            }

        }
    }
    return $this->respondCreated($response);

}
//GET
public function listBlogs(){
}
//GET
public function singleBlogDetail($blog_id){

}
//POST->PUT
public function updateBlog($blog_id)
{

}
//DELETE
public function deleteBlog($blog_id){
}
}
