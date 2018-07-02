<?php

function include_forms ($settings, $_this)
{
  switch (isset($settings['slider_stl'])?$settings['slider_stl']:''){
      case 'style_1':
          $html=View::make($_this->slug."::forms.slider_style_1",compact('settings'))->render();
            break;
      case 'style_2':
          $html=View::make($_this->slug."::forms.slider_style_2",compact('settings'))->render();
          break;

      default: return false;
  }

  return $html;
}