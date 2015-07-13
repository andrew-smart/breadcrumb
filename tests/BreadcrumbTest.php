<?php

class BreadcrumbTest extends PHPUnit_Framework_TestCase
{
    protected $_breadcrumb;

    public function setUp()
    {
        $this->_breadcrumb = new Smartie\Breadcrumb();
    }

    public function testAddCrumb()
    {
        $this->assertInstanceOf('Smartie\Breadcrumb',
            $this->_breadcrumb->addCrumb('home', array(
                'url' => '/'
            ))
        );

        $this->assertEquals(1, count($this->_breadcrumb->getCrumbs()));
    }
    
    public function testAddAfter()
    {
        $this->_breadcrumb
            ->addCrumb('a', array())
            ->addCrumb('b', array())
            ->addCrumb('c', array(), 'a')
            ->addCrumb('d', array(), '')
            ->addCrumb('e', array(), 'dummy');

        $this->assertEquals(array('d', 'a', 'c', 'b', 'e'),
            array_keys($this->_breadcrumb->getCrumbs())
        );
    }
    
    public function testDelete()
    {
        $this->_breadcrumb
            ->addCrumb('a')
            ->addCrumb('b')
            ->deleteCrumb('a');
        
        $this->assertEquals(array('b'), array_keys($this->_breadcrumb->getCrumbs()));
    }
}
