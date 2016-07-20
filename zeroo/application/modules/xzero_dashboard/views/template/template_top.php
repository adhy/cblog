<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $title; ?>">
    <meta name="author" content="root" >
    <title><?php echo $title.' - '.$text; ?></title>
    <link href="<?php echo base_url('asset/root/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/root/css/bootstrap-social.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/root/css/metisMenu.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/root/css/uniform.default.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('asset/root/css/dataTables.bootstrap.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('asset/root/css/dataTables.responsive.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/root/css/bootstrap-select.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/root/css/font-awesome.css');?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('asset/root/css/formValidation.css');?>" rel="stylesheet" />
	<link href="<?php echo base_url('asset/root/css/chosen.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('asset/root/css/datepicker.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('asset/root/css/admin-costum.css');?>" rel="stylesheet">

	<link rel="shortcut icon" href="<?php echo base_url('asset/root/img/logo.png');?>" />
	<script type="text/javascript">
		function dataicon() {
			     
      var xhr = new XMLHttpRequest();

		if(xhr.readyState==0||xhr.readyState==4){
			var url = "<?php echo site_url('zero/view-comment/icon'); ?>";
			//xhr.open("GET", url, true);
			xhr.onreadystatechange = function () {
				if(xhr.readyState==4 && xhr.status==200){
					myFunction(xhr.responseText);	
				}			
			
			}
			xhr.open("GET", url, true);
			xhr.send();
			function myFunction(response) {
				var arr = JSON.parse(response);
				var i;
				var out="";
				for(i=0;i<arr.length;i++)
				{
				out +=" "+arr[i].iconf+" ";				
				}
				out +="";
				document.getElementById("notif").innerHTML=out;
				var outt="";
				for(i=0;i<arr.length;i++)
				{
				outt +=" "+arr[i].iconff+" ";				
				}
				outt +="";
				document.getElementById("kuta").innerHTML=outt;
				var summ="";
				for(i=0;i<arr.length;i++)
				{
				summ +=" "+arr[i].sum+" ";				
				}
				summ +="";
				document.getElementById("sum").innerHTML=summ;			
				var summc="";
				for(i=0;i<arr.length;i++)
				{
				summc +=" "+arr[i].sumc+" ";				
				}
				summc +="";
				document.getElementById("sumc").innerHTML=summc;
			
			}
		}
		var waktu=setTimeout("dataicon()",1000);
		}
                               </script>  
</head>
<body onload="dataicon()">