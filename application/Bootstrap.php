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
        array('module' => 'default',
        'controller' => 'ads',
        'action' => 'index'));
        $router->addRoute('viewad',$viewRoute);


        $id_router = $frontController->getRouter();

        $id_Route = new Zend_Controller_Router_Route('ads/view/:id',
        array('module' => 'default',
        'controller' => 'ads',
        'action' => 'view'));
        $id_router->addRoute('viewid',$id_Route);
  
    }

  
}

