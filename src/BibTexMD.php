<?php

use erusev\Parsedown;

class BibTexMD extends Parsedown {

  function __construct(){
    $this->InlineTypes['@'][]= 'BibTex';

    $this->inlineMarkerList .= '@';
  }

  protected function inlineBibTex($excerpt){
    $regular_expression = '/^{c:([#\w]\w+)}(.*?){\/c}/';

    if (preg_match($regular_expression, $excerpt['text'], $matches)){
      return array(
        'extent' => strlen($matches[0]),
        'element' => array(
          'name' => 'span',
          'text' => $matches[2],
          'attributes' => array(
            'style' => 'color: ' . $matches[1],
          ),
        )
      );
    }
  }
}
