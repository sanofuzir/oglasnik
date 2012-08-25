<?php

use Oglasnik\Entities\User;
use Oglasnik\Entities\Image;
use Oglasnik\Entities\Category;
use Oglasnik\Entities\Ad;

class AccountController extends Zend_Controller_Action
{
    private $_em;
    
    static private $utc = null;
    
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
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->find($UserId);
        $this->view->user = $user;
        
        //oglasi uporabnika
        setlocale(LC_ALL, 'sl_SI');
        $this->view->ads = $user->getAds();
    }
    public function profilAction()
    {
        $cur_user = $this->_getParam('id');
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->find($cur_user);
        $this->view->user = $user;        
    }

    public function registerAction()
    {
        $form    = new Form_Register();
 
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
           if ($form->isValid($this->getRequest()->getPost())) {
               $data = $form->getValues();

               $this->_save_user($data);
              
               $this->_helper->flashMessenger->addMessage('Podatki so uspešno shranjeni');
               $this->_helper->redirector('index');
           } else {
               $this->_helper->flashMessenger->addMessage('Podatki niso veljavni');
           }
       }
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
       $form = new Form_Add();
       $this->view->form = $form;

       if ($this->getRequest()->isPost()) {
           if ($form->isValid($this->getRequest()->getPost())) {
               $data = $form->getValues();
               $location = $form->image->getFileName();
               $this->_save($data, $location);
              
               $this->_helper->flashMessenger->addMessage('Podatki so uspešno shranjeni');
               $this->_helper->redirector('index');
           } else {
               $this->_helper->flashMessenger->addMessage('Podatki niso veljavni');
           }
       }
    }
    public function _save_user($data)
    {
        $user = new User;
        $user->setUsername($data['username']);
        $user->setPassword($data['password']);
        $user->setEmail($data['email']);
        $user->setStatus('active');
        $user->setName($data['name']);
        $user->setSurname($data['surname']);
        $user->setTelephon($data['telephone']);

        //vnos v bazo
        $this->_em->persist($user);
        $this->_em->flush();        
    }
        
    public function _save($data, $location) 
    {   
        $UserId = 1;
        //nastavitve za sliko
        $image = new Image(); 
        $image->setName($location); 
        $cur_cat = $data['category'];
        
        $category = $this->_em->getRepository('Oglasnik\Entities\Category')->find($cur_cat);
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->find($UserId);

        
        $this->date = $user->setCreated();
        $datum = $this->date;
        //dodajanje oglasa
        $ad = new Ad;
        $ad->setUser($user);
        $ad->setCategory($category);
        $ad->setName($data['name']);
        $ad->setPrice($data['price']);
        $ad->setDescription($data['description']);
        $ad->setStatus('actice');
        $ad->setCreated($datum);
        $ad->setImage($image);

        //vnos v bazo
        $this->_em->persist($image);
        $this->_em->persist($ad);
        $this->_em->flush();
    }

    public function editAction()
    {
        $form    = new Form_Add();
 
        $this->view->form = $form;

    }
    public function deleteAction()
    {           
        $cur_id = $this->_getParam('id');
        $id = $this->_em->getRepository('Oglasnik\Entities\Ad')->find($cur_id);
        $this->view->id =$id;
        //brisanje oglasa
         $this->_deleteAd($id);        
    }
    public function _deleteAd($id)
    {        
        $ad = new Ad;
        $ad = $this->_em->getRepository('Oglasnik\Entities\Ad')->findOneById($id);
        $this->_em->remove($ad);
        $this->_em->flush();
    }
}
