/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function()
{
    $("#provincia").change(function(){
        hacerPeticion();
    });
});

function hacerPeticion()
{
    var id=$("#provincia").val();
    var url="municipios.php?id="+id;
     $.get(url, function(data, status){
    
    parsearJSON(data);
  });
}
function  parsearJSON(datos)
{
    console.log(datos);
    var obj_json=JSON.parse(datos);
    var combo="<select id='municipio'>";
    var municipios=obj_json.municipios;
    for (i=0; i<municipios.length; i++)
    {
        var m=municipios[i];
        combo+="<option value="+m.id+">"+m.nombre+"</option>";
    }
    combo+="</select>";
          
    $("#capa_municipios").html(combo);
}

