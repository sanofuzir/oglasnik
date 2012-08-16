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
        $form    = new Default_Form_Registration();
 
        $this->view->form = $form;
    }

    public function loginAction()
    {
        $form    = new Default_Form_Login();
 
        $this->view->form = $form;
    }
    public function logoutAction()
    {
        // action body
    }


}





