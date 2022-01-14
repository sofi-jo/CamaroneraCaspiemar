$(document).ready(function(){
    var pathname = window.location.pathname;
    
    var ruta = '/CamaroneraCaspiemar/proyecto/includes/'

    if((ruta + 'cosechas.php') == pathname){
        $('#cosechas').addClass('active');
    }else if((ruta + 'reportes.php') == pathname){
        $('#reportes').addClass('active');
    }else if((ruta + 'crudDB.php') == pathname){
        $('#crudDB').addClass('active');
    }
        
})
