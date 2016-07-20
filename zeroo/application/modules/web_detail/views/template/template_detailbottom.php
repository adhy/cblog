    <script src="<?php echo base_url('asset/public/js/jquery-1.9.1.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/jquery-ui-1.10.0.custom.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/formValidation.min.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/framework/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/language/id_ID.js');?>"></script>
    <script src="<?php echo base_url('asset/public/js/public.js');?>"></script>
    <script type="text/javascript">    

function page_detail(){
		var loaddetail = new XMLHttpRequest();
		if(loaddetail.readyState==0||loaddetail.readyState==4){
			var urll = "<?php echo site_url('parse/json/view/home/page/'.$link.''); ?>";
			loaddetail.open("GET", urll, true);
			loaddetail.onreadystatechange =respon;
			loaddetail.send();
		}
	function respon(){
		if(loaddetail.readyState==4 ){
			if(loaddetail.status==200){
			var view = JSON.parse(loaddetail.responseText);
				var a;
				var out='';
				for(a=0;a<view.length;a++){
					if(view[a].by_me==null){
						out +='';
					}else{
					out +='<h1 ><small><a href="#" style="text-transform: capitalize;">'+view[a].judul+'</a></small></h1>';
					out +='<p><i class="fa fa-user"></i> by <a href="<?php echo site_url("about"); ?>" style="text-transform: capitalize;"> '+view[a].by_me+' </a> | <i class="fa fa-folder"></i> Category <a href="<?php echo site_url("category/'+view[a].link_categories+'"); ?>" style="text-transform: capitalize;">'+view[a].name_c+'</a> | <i class="fa fa-calendar"></i> '+view[a].date_post+'</p><hr>';
					out +='<div class="row"><div class="col-md-12"><a href="'+view[a].image_cont+'"><img class="img-responsive img-hover" src="'+view[a].image_cont+'" alt="'+view[a].judul+'" style="width: 100%;height: 140px;padding: 0px;margin: 0px;"></a></div></div>';
					out +='<div class="row"><div class="col-md-12"><p>'+view[a].isi+'</p><div class="tag-cloud unstyled">Tags : ';
					var tag=view[a].tag_cont;
					if(tag==null){
						out +='';
					}else{
						for(b=0;b<tag.length;b++){
							out +='<span class="label label-primary disabled taglabel">'+tag[b].name_tag+'</span>';
						}
					}
					out +='<div class="user-info media box"><div class="pull-left"><img src="<?php echo base_url("asset/public/img/logo.png");?>" alt="logo" style="width: 60px;height:60px;"></div><div class="media-body"><p class="end">Terima kasih telah membaca artikel yang saya tulis. Apabila ada kesalahan dalam penulisan saya mohon maaf sebesar-besarnya. Bagi rekan-rekan yang ingin menulis ulang artikel ini dimohon mencantumkan alamat submer.</p></div></div><br/>';
					var comment_all=view[a].comment_all;
					if(comment_all==null){
						out +='';
					}else {
						for(c=0;c<comment_all.length;c++){
							out +='<div class="comments-list"><div class="comment media"><div class="media-body"><strong>Posted by <a href="#'+comment_all[c].name_user+'">'+comment_all[c].name_user+'</a></strong><br>';
                     out += '<small>'+comment_all[c].date_comment+'</small><br><span>'+comment_all[c].text_comment+'</span></div>';
                     var replay_comment=comment_all[c].replay_comment;
                     if(replay_comment==null){
								out +='';
							}else {
								
									out +='<ul style="list-style: outside none none;margin: 0px 0px 0px 75px;"><li><div class="media-body"><strong>Replay by <a href="<?php echo site_url("about"); ?>">'+replay_comment['by_me']+'</a></strong><br>';
									out +='<span>'+replay_comment['replay_text']+'</span></div></li></ul>';
								
							}
							out +='</div></div>';       
						}
					}
					out +='<br>';
					}
				}
				out +='';
				document.getElementById("detail").innerHTML=out;
			
			}else{
						var not_found='';
						not_found +='<div class="row"><div class="col-md-12"><p>Category Not Found </p><br/></div></div>';
						not_found +='<div class="row"><hr class="bdc"></div>';
						document.getElementById("detail").innerHTML=not_found;
			}
		}
	}
}		
	$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#bilanganganjil').html([randomNumber(1, 700), '+', randomNumber(1, 500), '='].join(' '));

    	 $('#postcomment').formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		locale: 'id_ID',
        fields: {
            namac: {
                validators: {
                    notEmpty: {
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                    },
                    stringLength: {
                        min: 3,
                        max: 7,
                    }
                }
            },
            websitec: {
                validators: {
                    notEmpty: {
                        
                    },
                    uri: {
                        
                    }
                }
            },
            emailc: {
                validators: {
                    notEmpty: {
                        
                    },
                    emailAddress: {
                        
                    }
                }
            },
            komentarp: {
                validators: {
                    notEmpty: {
                        
                    },
                    stringLength: {
                    		min: 3,
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Jawaban Salah !',
                        callback: function(value, validator, $field) {
                            var items = $('#bilanganganjil').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
            agree: {
                validators: {
                    notEmpty: {
                        
                    }
                }
            }
        }
    });
});
   </script> 

</body>

</html>
