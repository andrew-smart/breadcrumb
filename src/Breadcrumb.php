<?php

namespace Smartie;

class Breadcrumb
{
    protected $_crumbs = array();

    public function addCrumb($name, $info = array(), $after = null)
    {
        if ($after !== null) {
            if (empty($after)) {
                $this->_crumbs = array($name => $info) + $this->_crumbs;
            } else {
                if (array_key_exists($after, $this->_crumbs)) {
                    $crumbs = [];
                    foreach ($this->_crumbs as $k => $v) {
                        $crumbs[$k] = $v;
                        if ($k === $after) {
                            $crumbs[$name] = $info;
                        }
                    }

                    $this->_crumbs = $crumbs;
                } else {
                    $this->_crumbs = array_merge($this->_crumbs, array($name => $info));
                }
            }
        } else {
            $this->_crumbs[$name] = $info;
        }
        
        return $this;
    }
    
    public function deleteCrumb($name)
    {
        foreach ($this->_crumbs as $k => $v) {
            if ($k == $name) {
                unset($this->_crumbs[$k]);
                break;
            }
        }
        
        return $this;
    }

    public function getCrumbs()
    {
        return $this->_crumbs;
    }
}
