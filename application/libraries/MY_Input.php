<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Input extends CI_Input
{
  function MY_Input()
  {
    parent::CI_Input();
  }

  function is_ajax_request()
  {
    $requested_with = $this->server('HTTP_X_REQUESTED_WITH');
    if($requested_with != false)
    {
      if(strtolower($requested_with) == 'xmlhttprequest')
      {
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }
}

?>