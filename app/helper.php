<?php

use Illuminate\Support\Facades\Session;

function displayAlert()
{
      if (Session::has('message')){
         list($type, $message) = explode('|', Session::get('message'));
         return sprintf('<script>toastr.%s("%s")</script>', $type, $message);
        }
}
