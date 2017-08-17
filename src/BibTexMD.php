<?php

use erusev\parsedown\Parsedown;

class BibTexMD extends Parsedown {

  function __construct(){
    $this->InlineTypes['@'][]= 'BibTex';

    $this->inlineMarkerList .= '@';
  }

  protected function inlineBibTex($excerpt){
    $regular_expression = '/\@(\w+)\{(?:[^}{]+|\{(?:[^}{]+|\{[^}{]*\})*\})*\}/';

    if (preg_match($regular_expression, $excerpt['text'], $matches)){
      return array(
        'extent' => strlen($matches[0]),
        'element' => array(
          'name' => 'span',
          'text' => 'hola'
        )
      );
    }
  }
}
