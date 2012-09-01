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
        
        //pot za izpis oglasov po kategorijah
        $router = $frontController->getRouter();

        $viewRoute = new Zend_Controller_Router_Route('ads/:category',
        array('module' => 'default',
        'controller' => 'ads',
        'action' => 'index'));
        $router->addRoute('viewad',$viewRoute);

        //pot za posamezen oglas
        $id_router = $frontController->getRouter();

        $id_Route = new Zend_Controller_Router_Route('ads/view/:id',
        array('module' => 'default',
        'controller' => 'ads',
        'action' => 'view'));
        $id_router->addRoute('viewid',$id_Route);
        
        //pot za profil uporabnika
        $list_router = $frontController->getRouter();

        $list_Route = new Zend_Controller_Router_Route('account/profil',
        array('module' => 'default',
        'controller' => 'account',
        'action' => 'profil'));
        $list_router->addRoute('viewlist',$list_Route);
        
        //pot za ogled oglasov uporabnika
        $ads_list_router = $frontController->getRouter();

        $ads_list_Route = new Zend_Controller_Router_Route('account/list/:id',
        array('module' => 'default',
        'controller' => 'account',
        'action' => 'list'));
        $ads_list_router->addRoute('viewadslist',$ads_list_Route);
        
        //pot za izbris oglasov uporabnika
        $ads_del_router = $frontController->getRouter();

        $ads_del_Route = new Zend_Controller_Router_Route('account/delete/:id',
        array('module' => 'default',
        'controller' => 'account',
        'action' => 'delete'));
        $ads_del_router->addRoute('viewadslist',$ads_del_Route);
        
        //pot za registracijo uporabnika
        $register_router = $frontController->getRouter();

        $register_Route = new Zend_Controller_Router_Route('account/register',
        array('module' => 'default',
        'controller' => 'account',
        'action' => 'register'));
        $register_router->addRoute('viewlist',$register_Route);
        
        //pot za logiranje uporabnika
        $login_router = $frontController->getRouter();

        $login_Route = new Zend_Controller_Router_Route('account/login',
        array('module' => 'default',
        'controller' => 'account',
        'action' => 'login'));
        $login_router->addRoute('viewlist',$login_Route);
        
        //pot za urejanje novic
        $news_router = $frontController->getRouter();

        $news_Route = new Zend_Controller_Router_Route('account/news/',
        array('module' => 'default',
        'controller' => 'account',
        'action' => 'news'));
        $news_router->addRoute('viewadslist',$news_Route);
        
        //pot za brisanje novic
        $news_del_router = $frontController->getRouter();

        $news_del_Route = new Zend_Controller_Router_Route('account/news/delete/:id',
        array('module' => 'default',
        'controller' => 'account',
        'action' => 'news'));
        $news_del_router->addRoute('viewadslist',$news_del_Route);
        
        //za brisanje uporanikov (admin modul)
        $profil_del_router = $frontController->getRouter();

        $profil_del_Route = new Zend_Controller_Router_Route('account/delete/:id',
        array('module' => 'admin',
        'controller' => 'account',
        'action' => 'delete'));
        $profil_del_router->addRoute('viewadslist',$profil_del_Route);
  
    }

  
}

