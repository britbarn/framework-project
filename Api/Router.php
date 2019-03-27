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
    
      //check the route array for both the method and the requiest URI
      //if it matches the current server method and URI, we have a route match
      if($route[2] == $this->method && $route[0] == $this->request){

        //call the function that is defined in the array
        var_dump($this->routes[$key][1]);

        //this is where the program stops. The next step is to call the corresponding function in the UsersController
        call_user_func(array($this->routes[$key][1]),'1');

        $match = true;
        break;
      }
    }
    //let user know that there were no matching routes
    if(!$match){
      echo "No routes found";
    }
  }

  //only want this class to be able to add to the routes array
  private function add_route($route){
    $this->routes[] = $route;
  }

  //add the called method to the routes array
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

    //only want this class to be able to see the routes list
   private function list_routes(){
    return $this->routes;
  }

}