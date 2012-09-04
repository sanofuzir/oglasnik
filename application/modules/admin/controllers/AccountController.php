<?php

use Oglasnik\Entities\User;
use Oglasnik\Entities\Ad;


class Admin_AccountController extends Zend_Controller_Action
{
    private $_em;
    
    static private $utc = null;
    
    public function init()
    {
        /* Initialize action controller here */
        $this->_em = \Zend_Registry::get('em');
        $UserId = 1;
    }

    public function indexAction()
    {        
        //index action
    }
    public function listAction()
    {
        setlocale(LC_ALL, 'sl_SI');        
        $dql = 'SELECT a FROM Oglasnik\Entities\Ad a';
        $query = $this->_em->createQuery($dql);
        $results = $query->getResult();  
        $this->view->ads = $results;
    }
    public function profilAction()
    {
        $User = new Zend_Session_Namespace('Zend_Auth');
        if (isset($User->Username))
        {
            $cur_user = $User->Username;
            $user = $this->_em->getRepository('Oglasnik\Entities\User')->findOneByUsername($cur_user);
            $this->view->user = $user;  
        }else
        {
            $this->_helper->redirector('login');
        }
        $dql = 'SELECT u FROM Oglasnik\Entities\User u';
        $query = $this->_em->createQuery($dql);
        $results = $query->getResult();  
        $this->view->users = $results;
    }
    public function deleteAction()
    {
        $user_id = $this->_getParam('id');
        $user = new User;
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->findOneById($user_id); 
        $this->_em->remove($user);
        $this->_em->flush();
        
        $this->_helper->flashMessenger->addMessage('Podatki so uspešno izbrisani');
        $this->_helper->redirector('profil');
    }
}
