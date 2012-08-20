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
        $UserId = $this->_getParam('id');
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->findOneById($UserId);
        $this->view->user = $user;
        
        //oglasi uporabnika
        setlocale(LC_ALL, 'sl_SI');
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
        //forma
        //$form    = new Form_Add(); 
        //$this->view->form = $form;
        
        $UserId = 1;

        $img = new Image(); 
        $img->setName('img.jpg'); 
        $category = $this->_em->getRepository('Oglasnik\Entities\Category')->find($category_id);
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->find($UserId);
         
        //dodajanje oglasa
        $ad = new Ad;
        $ad->setUser($UserId);
        $ad->setCategory($category);
        $ad->setName('Hisa');
        $ad->setPrice('100111');
        $ad->setDescription('Opis hise test');
        $ad->setStatus('actice');
        $ad->setCreated('2012-08-20 18:49:00');
        $ad->setImage($img);
        
        $em->persist($ad);
        $em->flush();

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





