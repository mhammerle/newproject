function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
    document.getElementById("querySQL").value = document.getElementById("query").innerText;

}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    var select_btn = document.getElementById("select");
    var item_btn = document.getElementById(data).id;
    if(select_btn.innerHTML.indexOf(item_btn) != -1){
        select_btn.innerHTML = select_btn.innerHTML.replace(item_btn,"");
    } else {
        select_btn.innerHTML = select_btn.innerHTML + "," + item_btn;
    }

    select_btn.innerHTML = select_btn.innerHTML.replace(",,",",").replace(' ','_');
    select_btn.innerHTML = select_btn.innerHTML.replace(",,",",").replace(' ','_');

    if(select_btn.innerHTML.substr(-1,1) === ","){
        select_btn.innerHTML = select_btn.innerHTML.substr(0,(select_btn.innerHTML.length - 1)).replace(' ','_');
    }
    if(select_btn.innerHTML.substr(0,1) === ","){
        select_btn.innerHTML = select_btn.innerHTML.substr(1,(select_btn.innerHTML.length - 1)).replace(' ','_');
    }

    var select_btn_dual = document.getElementById("select_dual");
    var item_btn_dual = document.getElementById(data).id;
    if(select_btn_dual.innerHTML.indexOf(item_btn_dual) != -1){
        select_btn_dual.innerHTML = "'" + select_btn_dual.innerHTML.replace(item_btn_dual,"") + "'";
    } else {
        select_btn_dual.innerHTML = select_btn_dual.innerHTML + ",'" + item_btn_dual +"'";
    }


    select_btn_dual.innerHTML = select_btn_dual.innerHTML.replace(",,",",");
    select_btn_dual.innerHTML = select_btn_dual.innerHTML.replace(",,",",");

    if(select_btn_dual.innerHTML.substr(-1,1) === ","){
        select_btn_dual.innerHTML = select_btn_dual.innerHTML.substr(0,(select_btn_dual.innerHTML.length - 1)).replace(' ','_');
    }
    if(select_btn_dual.innerHTML.substr(0,1) === ","){
        select_btn_dual.innerHTML = select_btn_dual.innerHTML.substr(1,(select_btn_dual.innerHTML.length - 1)).replace(' ','_');
    }



    document.getElementById("querySQL").value = document.getElementById("query_dual").innerText+ " " + document.getElementById("query").innerText;
}

function selectType(type){
    var from_btn = document.getElementById("from");
    document.getElementById("select").innerHTML = "";
    document.getElementById("select_dual").innerHTML = "";
    document.getElementById("div2").innerHTML = "<span>Itens que serão incluidos no relatório</span><hr>";

    if (type === 'multas'){
        from_btn.innerHTML = " from MULTAS";
        document.getElementById("divButttons").style.display = "block";
        document.getElementById("div2").style.display = "block";
        document.getElementById("div_multas").style.display = "block";
        document.getElementById("div_manutencao").style.display = "none";
        document.getElementById("div_locacao").style.display = "none";
        document.getElementById("div_veiculograma").style.display = "none";
        document.getElementById("divContent").style.height = "25000px";
        document.getElementById("querySQL").value = document.getElementById("query_dual").innerText+ " " + document.getElementById("query").innerText;
        document.getElementById("name_xls").value = 'multas';
        document.getElementById("dropdownMenuButtonModulo").innerText = 'Multas';
    } else if (type === 'manutencao') {
        from_btn.innerHTML = " from MANUTENCAO";
        document.getElementById("divButttons").style.display = "block";
        document.getElementById("div2").style.display = "block";
        document.getElementById("div_multas").style.display = "none";
        document.getElementById("div_manutencao").style.display = "block";
        document.getElementById("div_locacao").style.display = "none";
        document.getElementById("div_veiculograma").style.display = "none";
        document.getElementById("divContent").style.height = "2500px";
        document.getElementById("querySQL").value = document.getElementById("query_dual").innerText+ " " + document.getElementById("query").innerText;
        document.getElementById("name_xls").value = 'manutencao';
        document.getElementById("dropdownMenuButtonModulo").innerText = 'Manutenção';

    } else if (type === 'locacao'){
        from_btn.innerHTML = " from LOCACAO";
        document.getElementById("divButttons").style.display = "block";
        document.getElementById("div2").style.display = "block";
        document.getElementById("div_multas").style.display = "none";
        document.getElementById("div_manutencao").style.display = "none";
        document.getElementById("div_locacao").style.display = "block";
        document.getElementById("div_veiculograma").style.display = "none";
        document.getElementById("divContent").style.height = "2500px";
        document.getElementById("querySQL").value = document.getElementById("query_dual").innerText+ " " + document.getElementById("query").innerText;
        document.getElementById("name_xls").value = 'locacao';
        document.getElementById("dropdownMenuButtonModulo").innerText = 'Locação';

    } else if (type === 'veiculograma') {
        from_btn.innerHTML = " from VEICULOGRAMA";
        document.getElementById("divButttons").style.display = "block";
        document.getElementById("div2").style.display = "block";
        document.getElementById("div_multas").style.display = "none";
        document.getElementById("div_manutencao").style.display = "none";
        document.getElementById("div_locacao").style.display = "none";
        document.getElementById("div_veiculograma").style.display = "block";
        document.getElementById("divContent").style.height = "2500px";
        document.getElementById("querySQL").value = document.getElementById("query_dual").innerText + " " + document.getElementById("query").innerText;
        document.getElementById("name_xls").value = 'veiculograma';
        document.getElementById("dropdownMenuButtonModulo").innerText = 'Veiculograma';

    }
}

function filtrar_tags(){
    var procurado = document.getElementById("texto_procurado").value.toUpperCase();
    var divName = document.getElementById('div_veiculograma');
    var className = divName.getElementsByClassName('tag_veiculograma');
    var classnameCount = className.length;
    for(var j = 0; j < classnameCount; j++){
        var idBtn = className[j].id.toUpperCase();
        if(idBtn.includes(procurado)){
            document.getElementById(idBtn).style.display = "inline";
        } else {
            document.getElementById(idBtn).style.display = "none";
        }
    }
}
