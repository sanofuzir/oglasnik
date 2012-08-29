<?php
use Oglasnik\Entities\News;
use Oglasnik\Entities\Ad;

class IndexController extends Zend_Controller_Action
{
    private $_em;

    public function init()
    {
        /* Initialize action controller here */
        $this->_em = \Zend_Registry::get('em');
    }

    public function indexAction()
    {
        // Izpis novice
        $status='active';
        $news = $this->_em->getRepository('Oglasnik\Entities\News')->findOneByActive($status);
        $this->view->news = $news;
        
        //zadnji dodan oglas najden po najmlajčemu datumu
        $query = $this->_em->createQuery('SELECT MAX(a.created), a.id FROM Oglasnik\Entities\Ad a ');
        $created = $query->getResult();
        
        //id zahtevanega oglasa
        $query2 = $this->_em->createQuery('SELECT a.id FROM Oglasnik\Entities\Ad a WHERE a.created = :created');
        $query2->setParameter('created', $created[0][1]);
        $id = $query2->getResult();
        
        //oglas
        $ad = $this->_em->getRepository('Oglasnik\Entities\Ad')->findOneById($id[0]['id']);
        $this->view->ad = $ad;
    }


}

