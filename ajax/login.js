
jQuery(document).on('submit','#formLg',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'controlador/login.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                 $('.botonlg').val('Validando....');

                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                if (!respuesta.error) {

                  if (respuesta.tipos=='31') {

                    location='vista/prende_apaga.php';


                  }else if (respuesta.tipos=='21') {
                    
                    location='vista/reporte.php';
            
                    
                  }else if (respuesta.tipos=='11') {
                    
                    location='vista/fidelizacion.php';
                   
                    
                  }else if (respuesta.tipos=='01') {
              
                      location='vista/registro.php';
       
                  }
                  
                else if (respuesta.tipos=='00') {
              
                      location='vista/apaga.php';
     
                  }
                  
          
                }else {
                  $('.error').slideDown('slow');
                  setTimeout(function(){
                  $('.error').slideUp('slow');
                },3000);
                $('.botonlg').val('Iniciar');
                }
              })
              .fail(function(resp){
                console.log(resp.responseText);
              })
              .always(function(){
                console.log("complete");
            });
      });

