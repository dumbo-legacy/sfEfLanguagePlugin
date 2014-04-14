<?php

if (sfConfig::get('app_language_routes_register', true) && in_array('language', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('languageRouting', 'listenToRoutingLoadConfigurationEvent'));
}

