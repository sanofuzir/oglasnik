<?php

class Form_Add extends Zend_Form
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
        
        // Add an price element
        $this->addElement('text', 'price', array(
            'label'      => 'Cena:',
            'required'   => true,
            'filters'    => array('StringTrim')
        ));
        
        // Add an category element
        $category = new Zend_Form_Element_Select('category');
        //dopolni, da bo bralo podatke iz baze-> poizvedba vseh kategorij in nato 
        //s foreach zpisovanje Id-jev in title
        $category->setLabel('Kategorija:')
                 ->setMultiOptions(array(
                                        1=>'Stanovanja',
                                        2=>'Hiše',
                                        3=>'Parcele',
                                        5=>'Avtomobili',
                                        6=>'Tovorna vozila',
                                        7=>'Motorna kolesa',
                                        8=>'Avtodomi',
                                        10=>'Zvočniki',
                                        11=>'Oprema',
                                        13=>'PC',
                                        14=>'Mac',
                                        15=>'Strežniki',
                                        16=>'Tablice'
                  ))

              ->setRequired(true)->addValidator('NotEmpty', true);
        
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

