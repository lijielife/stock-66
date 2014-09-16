<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if ( ! function_exists('pr'))
	{
	    function pr($thing)
	    {
	        echo '<pre>';
	        var_dump($thing);
	        echo '</pre>';
	        die();        
	    }   
 
}