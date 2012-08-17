<?php

class AccountController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        //manjaka pridobivanje podatkov o uporabniku iz baze!
    }

    public function registerAction()
    {
        require_once '../application/forms/Registration.php';
        $form    = new Default_Form_Registration();
 
        $this->view->form = $form;
    }

    public function loginAction()
    {
        require_once '../application/forms/login.php';
        $form    = new Default_Form_Login();
 
        $this->view->form = $form;
    }
    public function logoutAction()
    {
        // action body
    }


}





