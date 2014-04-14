<?php

class languageComponents extends sfComponents
{
  public function executeLanguage(sfWebRequest $request)
  {
    $this->form = new sfEfFormLanguage($this->getUser(), array('languages' => array('en', 'es')));
  }
  
  public function executeJavascriptHTML()
  {
    $this->_javascriptHTML;
    $this->_varName;
    $this->_name = (isset ($this->_varName) && $this->_varName != null) ? $this->_varName : 'javascriptMessages';
  }  
}
