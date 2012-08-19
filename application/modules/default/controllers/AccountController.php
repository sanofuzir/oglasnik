<?php
use Oglasnik\Entities\User;

class AccountController extends Zend_Controller_Action
{
    private $_em;
    
    public function init()
    {
        /* Initialize action controller here */
        $this->_em = \Zend_Registry::get('em');
        $UserId = 1;
    }

    public function indexAction()
    {
        // action body
    }
    public function profilAction()
    {
        $cur_user = $this->_getParam('id');
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->findOneById($cur_user);
        $this->view->user = $user->getId();
        $this->view->users = $user->getUser();
        
    }

    public function registerAction()
    {
        $form    = new Form_Register();
 
        $this->view->form = $form;
    }

    public function loginAction()
    {
        $form    = new Form_Login();
 
        $this->view->form = $form;
    }
    public function logoutAction()
    {
        // action body
    }


}





