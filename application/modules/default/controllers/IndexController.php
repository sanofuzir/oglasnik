<?php
use Oglasnik\Entities\News;

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
    }


}

