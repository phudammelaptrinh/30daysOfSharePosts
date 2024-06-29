<?php
  class Pages extends Controller{
    private $postModel;

    public function __construct(){
     
  }

    // http://localhost:89/mvc-2/
    public function index(){

      if(isLoggedIn()){
        redirect('posts');
      }
      
     
      $data = [
        'title'=>'SharePosts', 
        'description'=>'Simple social network built on the PHP framework ',
      ];
     
      
      $this->view('pages/index',$data);
    }
    public function about(){
      $data = [
        'title'=>'About us ',
        'description'=>'App to share posts with other users ',
      
      ];
      $this->view('pages/about',$data);
      
    }
  }
?>