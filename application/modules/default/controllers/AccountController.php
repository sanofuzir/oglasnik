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
        //index action
    }
    public function listAction()
    {
        //podatki o uporabniku
        $cur_user = $this->_getParam('id');
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->findOneById($cur_user);
        $this->view->user = $user;
        
        //oglasi uporabnika
        setlocale(LC_ALL, 'sl_SI');
        $ads = $this->_em->getRepository('Oglasnik\Entities\Ad')->findOneById($cur_user);
        $this->view->ads = $user->getAds();
    }
    public function profilAction()
    {
        $cur_user = $this->_getParam('id');
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->findOneById($cur_user);
        $this->view->user = $user;        
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
    public function addAction()
    {
        $form    = new Form_Add();
 
        $this->view->form = $form;

    }
    public function editAction()
    {
        $form    = new Form_Add();
 
        $this->view->form = $form;

    }
    public function deleteAction()
    {

    }

}





