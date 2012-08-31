<?php

class Form_Login extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
 
        // Add an username element
        $this->addElement('text', 'username', array(
            'label'      => 'Username:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));
        
        // Add an password element
        $this->addElement('password', 'password', array(
            'label'      => 'Password:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
        ));
}

}