<?php

/**
 * sfEfWidgetFormLanguage represents *
 *
 * @package    symfony
 * @subpackage widget
 * @author     Yaismel Miranda Pons <yaismelmp@googlemail.com>
 */
class sfEfWidgetFormLanguage extends sfWidgetFormI18nChoiceLanguage
{
  /**
   * Configures the current widget.
   *
   * Available options:
   *
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {     
    parent::configure($options, $attributes);
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The date displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {  
    $dirImages  = "/sfEfLanguagePlugin/images/";    
    $planguajes = $this->getOption('choices');    
    $imagesList = "<ul id='languageflags'>";
    foreach($this->getOption('languages') as $planguage)
    {
      $imagesList .= "<li class='".$planguage."'><a title='".$planguajes[$planguage]."' href='javascript:{}'><img width='16' height='11' alt='".$planguajes[$planguage]."' src='".$dirImages.$planguage.".jpg'/></a></li>";
    }
    $imagesList .="</ul>";
    
    return parent::render($name).$imagesList.
sprintf(<<<EOF
<script type="text/javascript"> 
  var Language = {
      init: function() {
          var languageFlags = $("#languageflags");
              languageFlags.find('li').css('opacity','0.4').removeClass('selected_language');

          var activeLang = languageFlags.find('li[class=%s]:first');
              activeLang.css('opacity','').addClass('selected_language');
          
          languageFlags.delegate("li", "click", function(){
            var lang = $(this).attr('class');
            $("#%s option[value="+ lang +"]").attr("selected", "selected");
            $("#paolang").submit();
          });
      }
  };
  Language.init();
</script>
EOF
   , $this->getOption('culture'), $name);
  }
  
  /**
   * Gets the stylesheet paths associated with the widget.
   *
   * @return array An array of stylesheet paths
   */
  public function getStylesheets()
  {
    return array('/sfEfLanguagePlugin/css/language.css' => 'all');
  }
  
}
