"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var Utilidades = (function () {
    function Utilidades($) {
        this.$ = $;
    }
    Utilidades.prototype.viewAlert = function (mensaje, error) {
        if (error === void 0) { error = 1; }
        var type = error == 1 ? "danger" : "success";
        this.$.notify({
            message: mensaje
        }, {
            type: type,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            newest_on_top: true,
        });
    };
    Utilidades.prototype.validateAction = function (url, swal) {
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
        }, function (isConfirm) {
            if (isConfirm) {
                location.href = url;
            }
        });
    };
    Utilidades.prototype.setDataTable = function (clase, options) {
        this.$("." + clase).DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No existen resultados",
                "info": "Mostrando _PAGE_ de _PAGES_ página(s)",
                "infoEmpty": "No existe información para mostrar",
                "infoFiltered": "(Buscando from _MAX_ total registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "<<",
                    "last": ">>",
                    "next": ">",
                    "previous": "<"
                },
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
            },
            "scrollX": true,
            "ordering": true,
            "autoWidth": false
        });
    };
    return Utilidades;
}());
exports.Utilidades = Utilidades;
