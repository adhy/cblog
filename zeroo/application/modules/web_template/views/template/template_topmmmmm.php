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
      var xhr = new XMLHttpRequest();
      function menuleft(){
		if(xhr.readyState==0||xhr.readyState==4){
			var url = "<?php echo site_url('parse/json/view/home/menu-left'); ?>";
			//xhr.open("GET", url, true);
			xhr.onreadystatechange = function () {
				if(xhr.readyState==4 && xhr.status==200){
					myFunction(xhr.responseText);	
				}						
			}
			xhr.open("GET", url, true);
			xhr.send();
			function myFunction(response) {
				var view = JSON.parse(response);
				var i;
				var out='';
				var tingkat1=view[0];
				for(b=0;b<tingkat1.length;b++){
					out +='<li><a href="<?php echo site_url("categories/'+tingkat1[b].colomleft['nomer']+'");?>">';				
					out +=''+tingkat1[b].colomleft['name_c']+'</a>';				
					out +='('+tingkat1[b].colomleft['total']+')</li>';				
				}
				out +='';
				document.getElementById("left").innerHTML=out;
				var out='';
				var tingkat2=view[1];
				for(b=0;b<tingkat2.length;b++){
					out +='<li><a href="<?php echo site_url("category/'+tingkat2[b].colomright['nomer']+'");?>">';				
					out +=''+tingkat2[b].colomright['name_c']+'</a>';				
					out +='('+tingkat2[b].colomright['total']+')</li>';				
				}
				out +='';
				document.getElementById("right").innerHTML=out;
				var out='<ul class="tag-cloud unstyled">';
				var tingkat3=view[2];
				for(b=0;b<tingkat3.length;b++){
					out +='<li><a href="<?php echo site_url("tag/'+tingkat3[b].tag['nomer']+'");?>" class="btn btn-primary btn-xs">';				
					out +=''+tingkat3[b].tag['name_t']+'</a></li>';								
				}
				out +='</ul>';
				document.getElementById("tag").innerHTML=out;
				var out='';
				var tingkat4=view[3];
				for(b=0;b<tingkat4.length;b++){
					out +='<div class="widget-blog-item media"><div class="pull-left"><div class="date"><span class="month">'+tingkat4[b].top_post['bulan']+'</span>';				
					out +='<span class="day">'+tingkat4[b].top_post['tanggal']+'</span></div></div><div class="media-body">';								
					out +='<a href="<?php echo site_url("categories/page/'+tingkat4[b].top_post['nomer']+'");?>">';								
					out +='<h5>'+tingkat4[b].top_post['judul']+'</h5></a></div></div>';								
				}
				out +='';
				document.getElementById("top").innerHTML=out;
			}
		}
	}
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
<body onload="menuleft();menunavigasi();about();">