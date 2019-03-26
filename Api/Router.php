<?php

namespace Api;

use Api\Controllers\UsersController;

class Router {

  //when router is called, set the method and uri
  function __construct(){
    $this->get_uri();
    $this->get_method();
  }

  private function get_uri(){    
    $this->request = $_SERVER['REQUEST_URI'];
  }

  private function get_method(){
    $this->method = $_SERVER['REQUEST_METHOD'];
  }

  public function execute(){
    $match = false;
    foreach ($this->list_routes() as $key => $route) {
    
      //if the method in the route array matches what the server sent over
      //and the request in the route array matches what came from the server
      if($route[2] == $this->method && $route[0] == $this->request){
        //call the function that is defined in the array
        // $function = $this->routes[$key][1];
        // $function();
        var_dump($this->routes[$key][1]);
        // call_user_func_array($this->routes[$key][1], '');
        // call_user_func_array([$this->controller, $this->method], $this->parameters);
        call_user_func(array('UsersController','getUser'),'1');

        $match = true;
        break;
      }
    }
    //let user know that there were no matching routes
    if(!$match){
      echo "No routes found matching this path";
    }
  }

  private function list_routes(){
    return $this->routes;
  }

  private function add_route($route){
    $this->routes[] = $route;
  }

  public function get($route){
    $route[] = 'GET';
    $this->add_route($route);
  }

  public function put($route){
    $route[] = 'PUT';
    $this->add_route($route);
  }

  public function post($route){
    $route[] = 'POST';
    $this->add_route($route);
  }

  public function delete($route){
    $route[] = 'DELETE';
    $this->add_route($route);
  }

}