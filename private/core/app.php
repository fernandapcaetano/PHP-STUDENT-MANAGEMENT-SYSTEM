<?php
/**
 * MAIN APP FILE
 */

class App{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = array();

    public function __construct(){
        $url = $this->getUrl();
        if (file_exists("../private/controllers/".$url[0].".php")) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }
        require "../private/controllers/".$this->controller.".php";
        $this->controller = new $this->controller();

        if (isset($url[1])) 
        {
            if (method_exists($this->controller,$url[1])) 
            {
                $this->method = ucfirst($url[1]);
                unset($url[1]);
            }
        }
        
        $url = array_values($url);
        $this->params = $url;
        call_user_func_array([$this->controller, $this->method],$this->params);
        
    }

    private function getUrl(){
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode('/', filter_var(trim($url, "/")), FILTER_SANITIZE_URL);
    }
}
