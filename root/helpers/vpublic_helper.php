<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 if( !function_exists('is_cuswid') ) {
		function is_cuswid($input_filter) {
	    // Get current CodeIgniter instance
	    $CI =& get_instance();
	    switch ($input_filter) {
		case null:
		case false:
		case '':
	    	 $CI->data['is_me']= $CI->template->is_me();
	    	 return $CI->data['is_me'];
	    	break;	
	    	case 'is_navv':
	    	 $CI->data['is_navv']= $CI->template->is_navrek($CI->template->parent,$CI->template->hasil);
	    	 return $CI->data['is_navv'];
	    	break;
	    case 'leaft_cat':
	    	$CI->data['leaft_cat']= $CI->template->is_leaftcat();
	    	return $CI->data['leaft_cat'];
	    	break;
	    	case 'is_tag':
	    		$CI->data['is_tag']= $CI->template->is_tags();
	    		return $CI->data['is_tag'];
	    		break;
	    	case 'is_leafpop':
	    		 $CI->data['is_leafpop']= $CI->template->is_leafpop();
	    		 return $CI->data['is_leafpop'];
	    		break;
	    	case 'is_leafrec':
	    		$CI->data['is_leafrec']= $CI->template->is_leafrec();
	    		return $CI->data['is_leafrec'];
	    		break;
	    	case 'is_buttrec':
	    		$CI->data['is_buttrec']= $CI->template->is_buttrec();
	    		return $CI->data['is_buttrec'];
	    		break;
	    	case 'is_rand':
	    		$CI->data['is_rand']= $CI->template->is_rand();
	    		return $CI->data['is_rand'];
	    		break;
	    	default:
				$defautl_system='null';
				return $defautl_system;
			break;
	    }
	}
  }	

?> 