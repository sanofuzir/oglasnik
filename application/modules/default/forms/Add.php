<?php

use Oglasnik\Entities\Category;

class Form_Add extends Zend_Form
{
    private $_em;

    public function init()
    {
        $this->_em = \Zend_Registry::get('em');
        $query = $this->_em->createQuery('SELECT c.id, c.title FROM Oglasnik\Entities\Category c');
        $categorys = $query->getResult();
        
        
        
        
        // Set the method for the display form to POST
        $this->setMethod('post');
 
        // Add an name element
        $this->addElement('text', 'name', array(
            'label'      => 'Ime:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));
        
        // Add an price element
        $this->addElement('text', 'price', array(
            'label'      => 'Cena:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));
        
        // Add an category element
        $category = new Zend_Form_Element_Select('category');
        
        $category->setLabel('Kategorija:')
                 ->setRequired(true)->addValidator('NotEmpty', true);
        
        foreach ($categorys as $cat):
            $category->addMultiOption($cat['id'], $cat['title']);
        endforeach;

              
        
        $this->addElements(array($category));
        
        // Add the description element
        $this->addElement('textarea', 'description', array(
            'label'      => 'Opis:',
            'required'   => true
        ));
        
        //Add file upload 
        $element = new Zend_Form_Element_File('image');
        $element->setLabel('Pripni sliko:')
                ->setDestination('/Diploma/Oglasnik/public/img')
                ->setRequired(false);
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        $element->addValidator('Extension', false, 'jpg,png,gif,JPG');
        $this->addElement($element, 'image');
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Vnesi Oglas',
        ));
    }
}

