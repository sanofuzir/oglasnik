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
               $this->_helper->redirector('list');
           } else {
               $this->_helper->flashMessenger->addMessage('Podatki niso veljavni');
           }
       }
    }
    public function _save_user($data)
    {
        require_once "/Oglasnik/Resource/doctrine.php";
        
        $username=($data["username"]);
        $password=($data["password"]);
        $email=($data["email"]);
        $status='active';
        $name=($data["name"]);
        $surname=($data["surname"]);
        $telephone=($data["telephone"]);

        $user = new User;
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setEmail($email);
        $user->setStatus($status);
        $user->setName($name);
        $user->setSurname($surname);
        $user->setTelephon($telephone);

        //vnos v bazo
        $this->_em->persist($user);
        $this->_em->flush();        
    }
        
    public function _save($data, $location) 
    {
        require_once "/Oglasnik/Resource/doctrine.php";
        
        $name=($data["name"]);
        $price=($data["price"]);
        $category=($data["category"]);
        $description=($data["description"]);

        $UserId = 1;
        //nastavitve za sliko
        $image = new Image(); 
        
        //manjka se dobiti ime slike iz forme:
        $image->setName($location); 
        
        $category = $this->_em->getRepository('Oglasnik\Entities\Category')->find($category);
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->find($UserId);

        $datum = '2012-08-20 18:49:00';
        
        //dodajanje oglasa
        $ad = new Ad;
        $ad->setUser($user);
        $ad->setCategory($category);
        $ad->setName($name);
        $ad->setPrice($price);
        $ad->setDescription($description);
        $ad->setStatus('actice');
        $ad->setCreated('2012-08-20 18:49:00');
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
