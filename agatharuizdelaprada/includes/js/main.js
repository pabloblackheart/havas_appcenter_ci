function validatxt(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " ÃƒÆ’Ã‚Â¡ÃƒÆ’Ã‚Â©ÃƒÆ’Ã‚Â­ÃƒÆ’Ã‚Â³ÃƒÆ’Ã‚ÂºabcdefghijklmnÃƒÆ’Ã‚Â±opqrstuvwxyz";
   especiales = [8,37,39,46];

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}

function validanum(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
$(document).ready(function(){
    $(".compartir").click(function(e){
	  e.preventDefault();
	  FB.ui({
	    method: 'feed',
	    name        : 'Nombre',
	    link        : 'https://www.facebook.com/hmgdev/app_249006448595649',
	    picture     : '',
	    caption     : '',
	    description : 'Descriptión compartir'
	  });
	  return false;
	});

    $(".invitar").click(function(e){
      e.preventDefault();
      FB.ui({ method: 'apprequests',
        message: 'Mensaje invitar',
        filters: ['app_non_users'],
        title: 'Titulo invitar',
      	max_recipients: '50'
      });
    });
});	