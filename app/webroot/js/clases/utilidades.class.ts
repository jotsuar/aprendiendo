export class Utilidades{
	$;
	constructor($) {
		this.$ = $;
	}

	viewAlert(mensaje:string,error = 1){

		let type = error == 1 ? "danger" : "success";

		this.$.notify({
			message:mensaje 
		},{
			type: type,
			delay: 5000,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
			newest_on_top: true,
		});
	}

	validateAction(url:string,swal){
		swal({
		  title: "Confirmar",
		  text: "¿Esta seguro de realizar esta acción?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#00a65a",
		  confirmButtonText: "Aceptar",
		  cancelButtonText: "Cancelar",
		  closeOnConfirm: true,
		  closeOnCancel: true
		},
		function(isConfirm){
		  if (isConfirm) {
		     location.href = url;
		  } 
		});
	}

	setDataTable(clase:string,options:object){
		this.$("."+clase).DataTable(
			{
				"language": {
		            "lengthMenu"	: "Mostrar _MENU_ registros por página",
		            "zeroRecords"	: "No existen resultados",
		            "info"			: "Mostrando _PAGE_ de _PAGES_ página(s)",
		            "infoEmpty"		: "No existe información para mostrar",
		            "infoFiltered"	: "(Buscando from _MAX_ total registros)",
		            "search"		: "Buscar:",
		            "paginate"		: {
		                				"first":      "<<",
		                				"last":       ">>",
		                				"next":       ">",
		                				"previous":   "<"
		            				},
		            "loadingRecords": "Cargando...",
		            "processing":     "Procesando...",
		        },

	      		"scrollX": true,
	      		"ordering": true,
	      		"autoWidth": false
	        }
		);
	}

}

