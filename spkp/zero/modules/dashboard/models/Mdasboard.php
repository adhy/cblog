<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mweb_home extends CI_Model {
	function __constuct()
	{
		parent::__constuct();  // Call the Model constructor 
		loader::database();    // Connect to current database setting.
	}
}