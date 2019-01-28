//Documento esté cargado totalmente
$(function(){

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
		    },
		    {	//Celda mostrar detalles de la orden
		        targets: 5,
		        orderable:false,
		        createdCell: function (td, cellData, rowData, row, col) {
		        	//Como row inicia desde 0, se le incrementa 1
		            //$(td).html(++row);
		            console.log(td);
		            console.log(cellData);
		            console.log(rowData);
		            console.log(row);
		            console.log(col);
		        }
		    }
	    ]
	});
	
});

function deleteFila(id){
	//console.log(id);
	//console.log(window.laravel.url);

	bootbox.confirm({
    message: "¿Está seguro de eliminar el registro?",
    buttons: {
        confirm: {
            label: 'Si',
            className: 'btn-danger'
        },
        cancel: {
            label: 'No',
            className: 'btn-info'
        }
    },
	callback: function (result) {
	        console.log(result);
	        //Si oprime "si", devuelve true, entonces entra al if para hacer el ajax
	        if(result){
	        	$.ajax({
					url:window.laravel.url+'/usuario/'+id,
					type: 'POST',
					data: {_token:window.laravel.token,
						   _method:'DELETE'},
				})
				.done(function(res) {
					console.log(res);//Ver en la consola lo que devuelve el metodo del controller consultado∫
					console.log("Ajax ok.");
					
					//Si el status es TRUE, se eliminó correctamente
					if(res.status){
						/*APLICA PARA CUANDO NO SE UTILIZABA DATATABLE
						$('#fila'+res.id).remove();*/

						//Con DATATABLE, se debe recargar la tabla
						$('#tUsuarios').DataTable().ajax.reload();
					}else{
						alert(res.msj);
					}
				}).fail(function(res) {
					console.log("error:");
					console.log(res);
				});
	        }
	    }
	});	
}

/*FORMA SIN ESPERAR LA RESPUESTA DEL AJAX
$('.remove').on('click',function(){
		$(this).parents('tr').remove();
})*/