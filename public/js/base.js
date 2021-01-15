function cargarComboProvincia(_id) {
      let _type = $(document).find("select#provincia_id");
      $(document).find("select#distrito_id").html('');
      
      let _html = "";
      if (_type) {
          $.ajax({
              url: _url_web_+'/consulta/departamento/getProvincias',
              type: 'GET',
              dataType: 'json',
              data:{id:_id},
              success: function(data) {
                //console.log(data);
                  _html += `<option value="">Elige</option>`;
                  $(data).each(function(index, el) {
                      

                          _html += `<option value="${el.id}">${el.nombre}</option>`;
                      
                  });
                  _type.html(_html);
                  
              }
          });

      }
  }

  function cargarComboDistrito(_id) {
      let _type = $(document).find("select#distrito_id");
      let _html = "";
      if (_type) {
          $.ajax({
              url: _url_web_+'/consulta/provincia/getDistritos',
              type: 'GET',
              dataType: 'json',
              data: {id:_id},
              success: function(data) {
                   _html += `<option value="">Elige</option>`;
                  $(data).each(function(index, el) {
                      

                          _html += `<option value="${el.id}">${el.nombre}</option>`;
                      
                  });
                  _type.html(_html);
              }
          });

      }
  }
  
  function cargarComboUbigeo($dep,$prov,$dis){
    //console.log($dep);
    $(document).find('select#departamento_id').val($dep);
    $.ajax({
        url: _url_web_+'/consulta/departamento/getProvincias',
        type: 'GET',
        dataType: 'json',
        data: { id:$dep},
        success: function(data) {
            _html = `<option value="">Elige</option>`;
            $(data).each(function(index, el) {
                

                    _html += `<option value="${el.id}">${el.nombre}</option>`;
                
            });
             $(document).find('select#provincia_id').html(_html);
             $(document).find('select#provincia_id').val($prov);
             $.ajax({
                url: _url_web_+'/consulta/provincia/getDistritos',
                type: 'GET',
                dataType: 'json',
                data: { id: $prov},
                success: function(data) {
                    _html = `<option value="">Elige</option>`;
                    $(data).each(function(index, el) {
                        

                            _html += `<option value="${el.id}">${el.nombre}</option>`;
                        
                    });
                     $(document).find('select#distrito_id').html(_html);
                     $(document).find('select#distrito_id').val($dis);

                }
            });
        }
    });
  }

  function preview_img(input){
    let destino = input.closest('.form-group').find("img");
    console.log(destino)
    if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
        destino.attr('src', e.target.result);

      }
      reader.readAsDataURL(input.files[0]);
    }

  }

  $(document).ready(function(){
    $(document).on('change', 'select#departamento_id', function(){

      cargarComboProvincia($(this).val());


    });

    $(document).on('change', 'select#provincia_id', function(){

      cargarComboDistrito($(this).val());
      

    });

    $(document).on('change', 'input#img_input', function(){

      //console.log(this);
      preview_img($(this));
      

    });

  })