<?php
/**
 *
 * @package    sfEfLanguage
 * @subpackage plugin
 * @author     Yaismel Miranda Pons <yaismelmp@googlemail.com>
 */
 
class languageRouting
{
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   */
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();
    
    // preprend our routes
    $r->prependRoute('localized_homepage', new sfRoute('/:sf_culture/', 
          array('module' => 'principal', 'action' => 'index'),
          array('sf_culture' => '(?:fr|en|es)')
    ));
    
    $r->prependRoute('change_language', new sfRoute('/change_language', 
          array('module' => 'language', 'action' => 'changeLanguage')
    ));
  }

}
