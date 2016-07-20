<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $title; ?>">
    <meta name="author" content="root" >
    <title><?php echo $title.' - '.$text; ?></title>
    <link href="<?php echo base_url('asset/public/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/public/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/public/css/public.css');?>" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url('asset/public/img/logo.png');?>" />
   <script type="text/javascript">    
	var load = new XMLHttpRequest();
	function menunavigasi(){

		if(load.readyState==0||load.readyState==4){
			var urll = "<?php echo site_url('parse/json/view/home/menu-top'); ?>";
			//xhr.open("GET", url, true);
			load.onreadystatechange = function () {
				if(load.readyState==4 && load.status==200){
					myCategories(load.responseText);	
					}			
			
			}
			load.open("GET", urll, true);
			load.send();
			function myCategories(response) {
				//var jsonstring = '@ViewBag.jsonstring';
				//var jsonString = '@Html.Raw(Model.ToJson())';
				//var response = '@ViewBag.response(Model.ToJson().Replace("\\", ""))';
				var view = JSON.parse(response);
				var i;
				var out='';
				for(i=0;i<view.length;i++){		
					out +='<li><?php echo anchor("category/'+view[i].nomer+'","'+view[i].name_c+'"); ?> </li>';				
				}
				out +='';
				document.getElementById("nav-c").innerHTML=out;

			}
		}
		
	}

   </script>    
</head>
<body onload="menunavigasi();">