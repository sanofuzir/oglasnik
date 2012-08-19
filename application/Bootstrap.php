<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
    protected function _initAutoload()
    {
        $moduleLoader = new Zend_Application_Module_Autoloader(array(
                        'namespace' => '',
                        'basePath' => APPLICATION_PATH . '/modules/default'));

        return $moduleLoader;        
        
    }
    protected function _initRoutes() 
    {
        
        $frontController = Zend_Controller_Front::getInstance();
        
        $router = $frontController->getRouter();
        
        $viewRoute = new Zend_Controller_Router_Route('ads/:category',
                                     array('controller' => 'ad',
                                           'action' => 'view'));
  
    }

  
}

