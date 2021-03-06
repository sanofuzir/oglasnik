<?php

class Default_Form_Add extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
 
        // Add an name element
        $this->addElement('select', 'name', array(
            'label'      => 'Ime:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'name',
            )
        ));
        
        // Add an price element
        $this->addElement('text', 'price', array(
            'label'      => 'Cena:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'price',
            )
        ));
        
        // Add an category element
        $this->addElement('text', 'category', array(
            'label'      => 'Kategorija:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'category',
            )
        ));
        
        // Add an subcategory element
        $this->addElement('text', 'subcategory', array(
            'label'      => 'Pod-kategorija:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'subcategory',
            )
        ));
        
        // Add the description element
        $this->addElement('textarea', 'description', array(
            'label'      => 'Opis:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Uredi Oglas',
        ));
 
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}

