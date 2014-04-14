<?php

/**
 *
 * @package    sfEfLanguagePlugin   
 * @subpackage plugin
 * @author     Yaismel Miranda Pons <yaismelmp@googlemail.com>
 * @version    SVN: $Id$
 */
class languageActions extends sfActions
{
  public function executeChangeLanguage(sfWebRequest $request)
  {  
    $pURL = str_replace('/'.$this->getUser()->getCulture().'/', '', $request->getReferer());
    
    $form = new sfEfFormLanguage($this->getUser(), array('languages' => array('en', 'es')));
    
    $form->process($request);
    
    return $this->redirect( ( $pURL != '') ? $pURL : '@localized_homepage');
    //return $this->redirect('@localized_homepage');
  }
  
  public function executeIndex(sfWebRequest $request)
  {  
  }
}

