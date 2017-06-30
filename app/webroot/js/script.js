"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var ClassStatLat = require("./custom.js");


jQuery(document).ready(function ($) {

    var statlat = new ClassStatLat.StatLat($);
    var utilidades = statlat.Utilidades;

    if ($("p#errorMessajeFlash").length){
        utilidades.viewAlert($("#errorMessajeFlash").html());
    }
    if ($("p#successMessajeFlash").length){
        utilidades.viewAlert($("#successMessajeFlash").html(), 0);
    }
    $("body").on('click', '.changeState', function(event) {
    	event.preventDefault();
    	utilidades.validateAction($(this).attr("href"),swal);
    });

    if($(".D_table").length)
    	utilidades.setDataTable("D_table");

});
