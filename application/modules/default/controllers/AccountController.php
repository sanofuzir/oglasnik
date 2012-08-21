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
        $request = $this->getRequest();
        $form    = new Form_Add();
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $values = $form->getValues();
                
                $this->values = $values;
                
                $Name = $this->values->???
                $Price = $this->values->???
                $Category = $this->values->???
                $Description = $this->values->???
                
                return $this->_helper->redirector('add');
            }
        }
 
        $this->view->form = $form;
        
        /*
        //forma
        $form    = new Form_Add(); 
        $this->view->form = $form;

        require_once "/Oglasnik/Resource/doctrine.php";
        
        $UserId = 1;
        $category_id = 2;
        //nastavitve za sliko
        $img = new Image(); 
        $img->setName('img.jpg'); 
        $category = $this->_em->getRepository('Oglasnik\Entities\Category')->find($category_id);
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->find($UserId);
        
        //pretvorba datuma

        $datum = '2012-08-20 18:49:00';
        
        //dodajanje oglasa
        $ad = new Ad;
        $ad->setUser($user);
        $ad->setCategory($category);
        $ad->setName('Hisa');
        $ad->setPrice('100111');
        $ad->setDescription('Opis hise test');
        $ad->setStatus('actice');
        $ad->setCreated('2012-08-20 18:49:00');
        $ad->setImage($img);

        //vnos v bazo
        $this->_em->persist($img);
        $this->_em->persist($ad);
        $this->_em->flush();

        echo "Created Ad with ID " . $ad->getId();

        */
    }
    public function editAction()
    {
        $form    = new Form_Add();
 
        $this->view->form = $form;

    }
    
    
    /*
    public function deleteAction()
   {
       if ($this->getRequest()->isGet()) {
           $id = $this->getRequest()->getParam('id');
           $certPurchase = new Application_Model_DbTable_CertPurchase();
           if ($certPurchase->deleteOrder($id)) {
               $this->helper->flashMessenger->addMessage(array('success'=>$this->_t->('Certificates order deleted successfuly.')));
           }
       }
       $this->_helper->redirector('index');
   }
   public function addAction()
   {
       
       $type = $this->getRequest()->getParam('type');
       if ($type == 'extended') {
           $form = new Application_Form_ExtendedWarranty();
           $form->getElement('warrantyType')->setValue('extended');
           $this->view->title = $this->t->("Add new extended warranty");
       } else {
           $form = new Application_Form_Warranty();
           $form->getElement('warrantyType')->setValue('general');
           $this->view->title = $this->t->("Add new warranty");
       }
       $this->view->form = $form;
       if ($this->getRequest()->isPost()) {
           $formData = $this->getRequest()->getPost();
           if ($form->isValid($formData)) { 
               $warranty = new Application_Model_DbTable_Warranty();
               $warranty->addWarranty($form);
               $this->helper->flashMessenger->addMessage(array('success'=>$this->_t->('Warranty saved successfuly.')));
               $this->_helper->redirector('index');
           } else {
               $this->helper->flashMessenger->addMessage(array('error'=>$this->_t->('Submited data is not valid.')));
               $form->populate($formData);
           }
       }
   }
*/
}





