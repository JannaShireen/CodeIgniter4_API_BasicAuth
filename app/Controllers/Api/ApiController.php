<?php

namespace App\Controllers\Api;

use App\Models\CategoryModel;
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

}
//POST
public function createBlog(){

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
