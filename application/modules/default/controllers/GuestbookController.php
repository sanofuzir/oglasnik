<?php

class GuestbookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form    = new Form_Guestbook();
 
        $this->view->form = $form;
    }

}