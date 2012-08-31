<?php

use Oglasnik\Entities\User;
use Oglasnik\Entities\Image;
use Oglasnik\Entities\Category;
use Oglasnik\Entities\Ad;
use Oglasnik\Entities\News;

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
        $User = new Zend_Session_Namespace('Default');
        if (isset($User->Username))
        {
            $cur_user = $User->Username;
        }else
        {
            $this->_helper->redirector('login');
        }
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->findOneByUsername($cur_user);
        $this->view->user = $user;
        
        //oglasi uporabnika
        setlocale(LC_ALL, 'sl_SI');
        $this->view->ads = $user->getAds();
    }
    public function profilAction()
    {
        $User = new Zend_Session_Namespace('Default');
        if (isset($User->Username))
        {
            $cur_user = $User->Username;
            $user = $this->_em->getRepository('Oglasnik\Entities\User')->findOneByUsername($cur_user);
            $this->view->user = $user;  
        }else
        {
            $this->_helper->redirector('login');
        }       
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
        
        if ($this->getRequest()->isPost()) {
           if ($form->isValid($this->getRequest()->getPost())) {
               $data = $form->getValues();

               $this->_authenticate($data);
              
               $this->_helper->flashMessenger->addMessage('Prijava uspešna!');
           } else {
               $this->_helper->flashMessenger->addMessage('Podatki niso veljavni');
           }
       }  
    }
    public function _authenticate($data)
    {        
        $Username = $data['username'];
        $Password = $data['password'];

        $dql = 'SELECT count(DISTINCT u.id) FROM Oglasnik\Entities\User u WHERE u.username =:username AND u.password =:password';
        $query = $this->_em->createQuery($dql);
        $query->setParameter('username', $Username);
        $query->setParameter('password', $Password);
        $results = $query->getResult();    
        
        if($results[0][1] != 1)
        {
            $this->_helper->flashMessenger->addMessage('Podatki niso veljavni');
            $this->_helper->redirector('login');
        }
        else 
        {
            $User = new Zend_Session_Namespace('Default');
 
            if (isset($User->Username)) 
            {
                unset($User->Username);
                $this->_helper->flashMessenger->addMessage('Prijava Neuspešna!');
                $this->_helper->redirector('login');
            } else 
            {
                $User->Username = $Username;
                $this->_helper->flashMessenger->addMessage('Prijava uspešna!');
                $this->_helper->redirector('profil'); 
            } 
        }
        
        /*
        $request    = $this->getRequest();
        $registry   = Zend_Registry::getInstance();
        $auth       = Zend_Auth::getInstance(); 
        $DB = $registry['DB'];

        $authAdapter = new Zend_Auth_Adapter_DbTable($DB);
        $authAdapter->setTableName('user')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password');    
        // Set the input credential values
        $uname = $data['username'];
        $paswd = $data['password'];
        $authAdapter->setIdentity($uname);
        $authAdapter->setCredential($paswd);

        // Perform the authentication query, saving the result
        $result = $auth->authenticate($authAdapter);

        if($result->isValid()){
            $data = $authAdapter->getResultRowObject(null,'password');
            $auth->getStorage()->write($data);
            $this->_helper->redirector('index');
        }else{
            $this->_redirect('login');
        }
        */
    }
    public function logoutAction()
    {
        $User = new Zend_Session_Namespace('Default');
        unset($User->Username);
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
        $ad->setStatus('active');
        $ad->setCreated($datum);
        $ad->setImage($image);

        //vnos v bazo
        $this->_em->persist($image);
        $this->_em->persist($ad);
        $this->_em->flush();
    }

    public function _saveNews($data)
    {        
        $UserId = 1;
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->find($UserId);
        
        $news = new News;
        $news->setName($data['name']);
        $news->setText($data['text']);
        $news->setActive('inactive');
        $news->setUser($user);
        
        //vnos v bazo
        $this->_em->persist($news);
        $this->_em->flush();
        
    }
    public function editAction()
    {
        $form = new Form_Add();
        $this->view->form = $form;
        
        $cur_id = $this->_getParam('id');
        $ad = $this->_em->getRepository('Oglasnik\Entities\Ad')->find($cur_id);
        $this->view->id =$ad;
        
        if ($this->getRequest()->isPost()) {
           if ($form->isValid($this->getRequest()->getPost())) {
               $data = $form->getValues();
               $img_location = $form->image->getFileName();
               $this->_editeAd($cur_id, $data, $img_location);
              
               $this->_helper->flashMessenger->addMessage('Podatki so uspešno shranjeni');
               $this->_helper->redirector('index');
           } else {
               $this->_helper->flashMessenger->addMessage('Podatki niso veljavni');
           }
       }        
    }
    public function _editeAd($cur_id, $data, $img_location)
    {        
        //nastavitev novih podatkov
        $UserId = 1;
        //nastavitve za sliko
        $image = new Image(); 
        $image->setName($img_location); 
        $cur_cat = $data['category'];

        $category = $this->_em->getRepository('Oglasnik\Entities\Category')->find($cur_cat);
        $user = $this->_em->getRepository('Oglasnik\Entities\User')->find($UserId);

        $this->date = $user->setCreated();
        $datum = $this->date;
        
        //update oglasa
        $ad = $this->_em->getRepository('Oglasnik\Entities\Ad')->find($cur_id);
        $ad->setUser($user);
        $ad->setCategory($category);
        $ad->setName($data['name']);
        $ad->setPrice($data['price']);
        $ad->setDescription($data['description']);
        $ad->setStatus('actice');
        $ad->setCreated($datum);
        
        if($img_location != NULL)
        {
            $ad->setImage($image);
            $this->_em->persist($image);
            $this->_em->flush();
        }else
        {
            //slika že obstaja in ne bo zamenjana!
            //vnos v bazo
            $this->_em->persist($ad);
            $this->_em->flush();
        }
    }
    public function _deleteImage($id)
    {
        $image = new Image;
        $image = $this->_em->getRepository('Oglasnik\Entities\Image')->findOneById($id); 
        $this->_em->remove($image);
        $this->_em->flush();
        
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
        $imageId = $ad->getImage();
        
        $image = new Image;
        $image = $this->_em->getRepository('Oglasnik\Entities\Image')->findOneById($imageId);
        $this->_em->remove($ad);
        $this->_em->flush();
        $this->_em->remove($image);
        $this->_em->flush();
        
        $filename = $image->getName();
        unlink($filename);
        
    }
    public function newsAction()
    {        
        $query = $this->_em->createQuery('SELECT n.name, n.text, n.id FROM Oglasnik\Entities\News n');
        $news = $query->getResult();
        $this->view->news =$news;
    }
    public function addnewsAction()
    {
        $form = new Form_Addnews();
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
           if ($form->isValid($this->getRequest()->getPost())) {
               $data = $form->getValues();

               $this->_saveNews($data);
              
               $this->_helper->flashMessenger->addMessage('Podatki so uspešno shranjeni');
               $this->_helper->redirector('index');
           } else {
               $this->_helper->flashMessenger->addMessage('Podatki niso veljavni');
           }
       }
    }
    public function deletenewsAction ()
    {
        $cur_id = $this->_getParam('id');
        $id = $this->_em->getRepository('Oglasnik\Entities\News')->find($cur_id);
        $this->view->id =$id;
        //brisanje oglasa
        $this->_deleteNews($id); 
    }
    public function _deleteNews($id)
    {
        $news = new News;
        $news = $this->_em->getRepository('Oglasnik\Entities\News')->findOneById($id);
        $this->_em->remove($news);
        $this->_em->flush();
    }
    public function activenewsAction()
    {
        //pridobivanje id-ja novice
        $cur_id = $this->_getParam('id');
        //postavitev vseh statusov active v vseh novicah na inactive razen v novici kijo aktiviramo
        $this->_inactive_action($cur_id);
        //update Novice
        $this->_activate($cur_id);
        
    }
    public function _activate($cur_id)
    {
        $news = $this->_em->getRepository('Oglasnik\Entities\News')->findOneById($cur_id);
        $news->setActive('active');

        //vnos v bazo
        $this->_em->persist($news);
        $this->_em->flush();
    }
    public function _inactive_action($cur_id)
    {
        $news = $this->_em->getRepository('Oglasnik\Entities\News')->findOneById($cur_id);
        $this->id = $news;
        $id = $this->id->getId();
        
        $query = $this->_em->createQuery("UPDATE Oglasnik\Entities\News n SET n.active ='inactive' WHERE n.id !=:id");
        $query->setParameter('id', $id);
        $newsUpdated = $query->execute();
    }
}
