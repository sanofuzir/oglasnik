<?php

class Form_Register extends Zend_Form
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
        
        // Add an email element
        $this->addElement('text', 'email', array(
            'label'      => 'Email:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));
        
        // Add an name element
        $this->addElement('text', 'name', array(
            'label'      => 'Name:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));
        
        // Add an surname element
        $this->addElement('text', 'surname', array(
            'label'      => 'Surname:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));
        
        // Add an telephone element
        $this->addElement('text', 'telephone', array(
            'label'      => 'Telephone:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));
        
        // Add a captcha
        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Prosim vnesi spodnjih 5 črk:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Registracija',
        ));
 
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}

