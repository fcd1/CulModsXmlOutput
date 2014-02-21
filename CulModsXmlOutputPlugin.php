<?php

class CulModsXmlOutputPlugin extends Omeka_Plugin_AbstractPlugin
{

  protected $_filters = array('response_contexts',
                              'action_contexts');

  public function filterResponseContexts($contexts)
  {
    $contexts['cul-mods-xml'] = array(
				 'suffix'  => 'cul-mods-xml',
				 'headers' => array('Content-Type' => 'text/xml')
				 );

    return $contexts;
  }

  public function filterActionContexts($contexts, $controller)
  {
    if ($controller['controller'] instanceof ItemsController) {
      $contexts['show'][] = 'cul-mods-xml';
      $contexts['browse'][] = 'cul-mods-xml';
    }

    return $contexts;
  }

}

?>