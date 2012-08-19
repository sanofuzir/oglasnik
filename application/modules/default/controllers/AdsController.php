<?php

class AdsController extends Zend_Controller_Action
{
    private $em;

    public function init()
    {
        /* Initialize action controller here */
        \Zend_Registry::get('em');
    }

    public function indexAction()
    {
        // action body
    }
    public function addAction()
    {
        $form    = new Form_Add();
 
        $this->view->form = $form;

    }

    
}