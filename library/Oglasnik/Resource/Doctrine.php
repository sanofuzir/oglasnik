<?php

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\EntityManager;

/**
 * Zend Application Resource Doctrine class
 *
 */

class Oglasnik_Application_Resource_Doctrine extends Zend_Application_Resource_ResourceAbstract
{
    /**
     * Initializes Doctrine Context.
     *
     * @return Doctrine\ORM\EntityManager
     */

    public function init()
    {
        $config = $this->getOptions();

        $classLoader = new \Doctrine\Common\ClassLoader('Doctrine', realpath(APPLICATION_PATH . '/../library'));
        $classLoader->register();

        $cfig = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
                array(realpath(APPLICATION_PATH . '/../library/Oglasnik/Entities')),
                true,realpath(APPLICATION_PATH . '/../library/Oglasnik/Proxies') );
        $em = \Doctrine\ORM\EntityManager::create($config, $cfig);
        \Zend_Registry::set('em',$em);

        return $em;
    }
}
