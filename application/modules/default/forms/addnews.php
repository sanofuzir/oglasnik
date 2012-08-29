<?php

class Form_Addnews extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
 
        // Add an name element
        $this->addElement('text', 'name', array(
            'label'      => 'Ime:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));

        // Add the description element
        $this->addElement('textarea', 'text', array(
            'label'      => 'Text:',
            'required'   => true
        ));
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Vnesi Novico',
        ));
    }
}

