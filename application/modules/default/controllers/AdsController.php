<?php

class AdsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    public function apartmentAction()
    {
        // action body
    }
    public function houseAction()
    {
        // action body
    }
    public function landAction()
    {
        // action body
    }
    public function realestateAction()
    {
        // action body
    }
    public function carAction()
    {
        // action body
    }
    public function truckAction()
    {
        // action body
    }
    public function bikeAction()
    {
        // action body
    }
    public function motorhomeAction()
    {
        // action body
    }
    public function automobileAction()
    {
        // action body
    }
    public function speakerAction()
    {
        // action body
    }
    public function equipmentAction()
    {
        // action body
    }
    public function audiovideoAction()
    {
        // action body
    }
    public function pcAction()
    {
        // action body
    }
    public function macAction()
    {
        // action body
    }
    public function serverAction()
    {
        // action body
    }
    public function tableAction()
    {
        // action body
    }
    public function computingAction()
    {
        // action body
    }
    public function otherAction()
    {
        // action body
    }
    public function addAction()
    {
        require_once '../application/forms/Add.php';
        $form    = new Default_Form_Add();
 
        $this->view->form = $form;
    }
    public function editAction()
    {
        require_once '../application/forms/Edit.php';
        $form    = new Default_Form_Add();
 
        $this->view->form = $form;
    }
    public function deleteAction()
    {
        require_once '../application/forms/Delete.php';
        $form    = new Default_Form_Add();
 
        $this->view->form = $form;
    }

}