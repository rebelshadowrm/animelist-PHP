<?php


class FrontController extends Controller
{
    private $controller;
    private $view;
    
    public function __construct(Router $router, $routeName, $action = null, $param1 = null, $param2 = null) 
    {
        $route = $router->getRoute($routeName);
        $modelName = $route->model;
        $controllerName = $route->controller;
        $viewName = $route->view;
        
        $model = new $modelName;
        $this->controller = new $controllerName($model);
        $this->view = new $viewName($routeName, $model);
        
		$this->loggedin = isset($_SESSION['username']);
		
		if ($param1 != null && !empty($action) && $param2 != null) {$this->controller->{$action}($param1, $param2);}
		else if ($param1 != null && !empty($action)) {$this->controller->{$action}($param1);}
		else if (!empty($action)) {$this->controller->{$action}();}
		
    }
    
    public function output() 
    {
        return $this->view->output();
    }
    
    public function outputTitle()
    {
        return $this->view->outputTitle();
    }
    
    public function getEditable()
    {
        return $this->view->getEditable();
    }
    
} 