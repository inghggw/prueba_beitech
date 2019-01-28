//Documento esté cargado totalmente
$(function(){

	/**
	 * [AjaxForm: permite realizar un form con ajax GENERICO]
	 * @param  <button type="submit" class="formAjax"> y esté dentro del <form class="form-ajax"></form>
	 * @return [object r]{r.responseJSON}
	 */
	$(document).on("click",".formAjax",function(e){

		/*Limpiar la class y div de error*/
		$('.form-ajax *').removeClass('is-invalid');
		$('.form-ajax .invalid-feedback').remove();
		/*Bloquear boton ejecutado*/ 
    	$(this).css('pointer-events', 'none');

		$.ajax({
			url: $('.form-ajax').attr('action'),
			type: $('.form-ajax').attr('method'),			
			data: $('.form-ajax').serialize()
		})
		.always(function(r) {
			console.log(r);
			/*Activar boton ejecutado*/
	    	$('.formAjax').css('pointer-events', 'visible');
	    	if(r.status==200){
	    		outAjax(r);
	    	}else if (r.status==422){
	    		cargarError(r.responseJSON.errors);
	    	}else{
	    		msj='Ocurrió una interrupción, '
				  +'por favor intente nuevamente.<br><br>'
				  +'Si el problema persiste, '
				  +'contacte a soporte técnico.';
				bootbox.alert({title:'¡Atención!',message:msj});
	    	}
		});
  	});

  	/*Select Multiple(sm) Products*/
   	$('#products').multiSelect({
	  afterSelect: function(values){
	  	var r = values[0].split('|');
	  	var t = $('input[name="total"]').val();
	  	var sum = parseInt(r[1])+parseInt(t);
	  	$('input[name="total"]').val(sum);	    
	  },
	  afterDeselect: function(values){
	  	var r = values[0].split('|');
	  	var t = $('input[name="total"]').val();
	  	var res = parseInt(t)-parseInt(r[1]);
	  	$('input[name="total"]').val(res);
	  }
	});

   	$('.datePickerMin').datepicker({uiLibrary:'bootstrap4',format:'yyyy-mm-dd'});

	$('.datePicker').datepicker({ 
		uiLibrary: 'bootstrap4',
		format: 'yyyy-mm-dd',
		change:function (e) {
				if ($(this).val()!=''){
					$('.datePickerMin').removeAttr('disabled placeholder')
							.css('background-color','unset');
			}
		} 
 	});
	

	//************************* DataTables *************************

	//Table Customers
	$('#tCustomers').DataTable({
		responsive:true,
		processing: true,
        serverSide: true,
        aaSorting: [],/*Evita ordenar por defecto primer columna*/
        ajax: {
            url: $('#tCustomers').data('route'),
            type: "POST",
            data: {"_token":window.laravel.token}
        },
        columns: [
            { data: 'customer_id', name: 'customer.customer_id' },
            { data: 'customer_id', name: 'customer.customer_id' },
            { data: 'name', name: 'customer.name' },
            { data: 'email', name: 'customer.email' }
        ],
        columnDefs: [
		    {	//Celda botones
		        targets: 0,
		        orderable:false,
		        createdCell: function (td, cellData, rowData, row, col){
		        	//Mostrar botones con los id de cada registro
		        	var html = '<a class="link mr-4" title="Create Order by Customer"'
		        			  +'href="'+window.laravel.url+'/order/create/'+cellData+'">'
					  		  +'<i class="fas fa-cart-plus"></i></a>'
					          +'<a class="link" title="Show Orders by Customer"'
					          +'href="'+window.laravel.url+'/order/show/'+cellData+'">'
					          +'<i class="fas fa-tasks"></i></a>';
					$(td).html(html);
		        }
		    },
		    {	//Celda Consecutivo Número de Registro, OJO NO ES EL ID
		        targets: 1,
		        orderable:false,
		        createdCell: function (td, cellData, rowData, row, col) {
		        	//Como row inicia desde 0, se le incrementa 1
		            $(td).html(++row);
		        }
		    }
	    ]
	});

	//Table Customers
	$('#tOrderCustomer').DataTable({
		responsive:true,
		processing: true,
        serverSide: true,
        aaSorting: [],/*Evita ordenar por defecto primer columna*/
        ajax: {
            url: $('#tOrderCustomer').data('route'),
            type: "POST",
            data: {"_token":window.laravel.token}
        },
        columns: [
            { data: 'order_id', name: 'order.order_id' },
            { data: 'creation_date', name: 'order.creation_date' },
            { data: 'order_id', name: 'order.order_id' },
            { data: 'total', name: 'order.total' },
            { data: 'delivery_address', name: 'order.delivery_address' },
            { data: 'orderDetails', name: 'orderDetails.product_description' }
            
        ],
        columnDefs: [
		    {	//Celda Consecutivo Número de Registro, OJO NO ES EL ID
		        targets: 0,
		        orderable:false,
		        createdCell: function (td, cellData, rowData, row, col) {
		        	//Como row inicia desde 0, se le incrementa 1
		            $(td).html(++row);
		        }
		    }
	    ]
	});
	
});

/*Mostrar los errores de validación del formulario enviado*/
function cargarError(errors){
	spop({
		template: 'Please, check the fields in red...',
		group: 'submit-satus',
		style: 'error',
		autoclose: 3000
	});
	$.each(errors,function(name, val) {
		//Agregar el mensaje de errores debajo de cada elemento del form
		var msj = val[0].charAt(0).toUpperCase()+ val[0].slice(1);
		var divMsj = '<div class="invalid-feedback">'+msj+'</div>'
		$('.form-ajax [name*='+name+']').addClass('is-invalid');
		$('.form-ajax [name*='+name+']').parent().append(divMsj);
	});
}

/*Salida del AjaxForm*/
function outAjax(r){
	if (r.out=='modalRedirect'){
		bootbox.dialog({
		    message: r.html,
		    buttons: {ok: {label:'Ok',className:'btn-success',
		    		  callback: function(){document.location = r.route;}}}
		});		
	}else if (r.out=='reload'){
		document.location.reload();
	}
}