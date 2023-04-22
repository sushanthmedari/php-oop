<?php

namespace Controllers; 

use Models\Product;

Class ProductController extends Controller
{
    
    public function index()
    {
        $product = new Product($this->getDB());
        $products = $product->all();

        return $this->view('main.main',compact('products'));
    }


    public function add()
    {
        $product = new Product($this->getDB());
        $products = $product->all();

        $sku = [];
        foreach ($products as $post) {
            array_push($sku, $post->__get('sku'));
        }
        return $this->view('main.productadd',compact('sku'));

    }

    public function createPost()
    {
        $post = new Product($this->getDB());
        $result = $post->create($_POST);

        // $posts = $_POST;

        // return $this->view('main.test', compact('posts'));
  
        if ($result) {
            return header('Location: /');
        } 

        // else {
        //     var_dump($_POST);
        // }
    }

    public function destroy(string $ids)
    {
        $post = new Product($this->getDB());
        $result = $post->destroy($ids);

        if ($result) {
            return header('Location: /');
        } 
    }

}