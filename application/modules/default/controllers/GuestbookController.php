<?php

class GuestbookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        require_once '../application/modules/default/forms/Guestbook.php';
        $form    = new Default_Form_Guestbook();
 
        $this->view->form = $form;
    }

}