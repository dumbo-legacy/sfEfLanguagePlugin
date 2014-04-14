<?php

/**
 * sfEfFormLanguage is a form to change the symfony user culture.
 *
 * @package    sfEfWidgetFormLanguage
 * @subpackage form
 * @author     Yaismel Miranda Pons <yaismelmp@googlemail.com> 
 */
 
class sfEfFormLanguage extends BaseForm
{
  protected
    $user = null;

  /**
   * Constructor.
   *
   * @param sfUser A sfUser instance
   * @param array  An array of options
   * @param string A CSRF secret (false to disable CSRF protection, null to use the global CSRF secret)
   *
   * @see sfForm
   */
  public function __construct(sfUser $user, $options = array(), $CSRFSecret = null)
  {
    $this->user = $user;

    if (!isset($options['languages']))
    {
      throw new RuntimeException(sprintf('%s requires a "languages" option.', get_class($this)));
    }

    parent::__construct(array('language' => $user->getCulture()), $options, $CSRFSecret);
  }

  /**
   * Changes the current user culture.
   */
  public function save()
  {
    $this->user->setCulture($this->getValue('language'));
  }

  /**
   * Processes the current request.
   *
   * @param  sfRequest A sfRequest instance
   *
   * @return Boolean   true if the form is valid, false otherwise
   */
  public function process(sfRequest $request)
  {  
    $data = array('language' => $request->getParameter('language'));
    if ($request->hasParameter(self::$CSRFFieldName))
    { 
      $data[self::$CSRFFieldName] = parent::getCSRFToken();
    }

    $this->bind($data);

    if ($isValid = $this->isValid())
    {
      $this->save();
    }
    
    return $isValid;
  }

  /**
   * @see sfForm
   */
  public function configure()
  {
    $this->setValidators(array(
      'language' => new sfValidatorI18nChoiceLanguage(array('languages' => $this->options['languages'])),
    ));

    $this->setWidgets(array(
      'language' => new sfEfWidgetFormLanguage(array('culture' => $this->user->getCulture(), 'languages' => $this->options['languages']), array('style' => 'display: none')),
    ));
  }
}
