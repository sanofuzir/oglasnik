<?php
use Oglasnik\Entities\Category;

class AdsController extends Zend_Controller_Action
{
    private $_em;

    public function init()
    {
        /* Initialize action controller here */
        $this->_em = \Zend_Registry::get('em');
    }

    public function indexAction()
    {
        // action body
        setlocale(LC_ALL, 'sl_SI');
        $cur_category = $this->_getParam('category');
        $category = $this->_em->getRepository('Oglasnik\Entities\Category')->findOneByName($cur_category);
        $this->view->category = $category->getName();
        $this->view->ads = $category->getAds();
    }

    public function viewAction()
    {
        setlocale(LC_ALL, 'sl_SI');
        $cur_id = $this->_getParam('id');
        $id = $this->_em->getRepository('Oglasnik\Entities\Ad')->find($cur_id);
        $this->view->id = $id->getId();
        $this->view->name = $id->getName();
        $this->view->price = $id->getPrice();
        $this->view->description = $id->getDescription();
        $this->view->creation_date = $id->getCreated();
        
        $image_id = $this->_getParam('id');
        $image = $this->_em->getRepository('Oglasnik\Entities\Image')->find($image_id);
        $this->view->image = $image->getName();
    }

    public function addAction()
    {
        $form    = new Form_Add();
 
        $this->view->form = $form;

    }

    
}