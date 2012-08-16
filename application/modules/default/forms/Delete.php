<?php

class Default_Form_Add extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
 
        // Add an name element
        $this->addElement('text', 'name', array(
            'label'      => 'Ime:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'name',
            )
        ));
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Izbriši Oglas',
        ));
 
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}

