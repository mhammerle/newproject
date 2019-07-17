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
    if (select_btn.innerHTML.indexOf(item_btn) != -1) {
        select_btn.innerHTML = select_btn.innerHTML.replace(item_btn, "");
    } else {
        select_btn.innerHTML = select_btn.innerHTML + "," + item_btn;
    }

    select_btn.innerHTML = select_btn.innerHTML.replace(",,", ",").replace(' ', '_');
    select_btn.innerHTML = select_btn.innerHTML.replace(",,", ",").replace(' ', '_');

    if (select_btn.innerHTML.substr(-1, 1) === ",") {
        select_btn.innerHTML = select_btn.innerHTML.substr(0, (select_btn.innerHTML.length - 1)).replace(' ', '_');
    }
    if (select_btn.innerHTML.substr(0, 1) === ",") {
        select_btn.innerHTML = select_btn.innerHTML.substr(1, (select_btn.innerHTML.length - 1)).replace(' ', '_');
    }

    var select_btn_dual = document.getElementById("select_dual");
    var item_btn_dual = document.getElementById(data).id;
    if (select_btn_dual.innerHTML.indexOf(item_btn_dual) != -1) {
        select_btn_dual.innerHTML = "'" + select_btn_dual.innerHTML.replace(item_btn_dual, "") + "'";
    } else {
        select_btn_dual.innerHTML = select_btn_dual.innerHTML + ",'" + item_btn_dual + "'";
    }


    select_btn_dual.innerHTML = select_btn_dual.innerHTML.replace(",,", ",");
    select_btn_dual.innerHTML = select_btn_dual.innerHTML.replace(",,", ",");

    if (select_btn_dual.innerHTML.substr(-1, 1) === ",") {
        select_btn_dual.innerHTML = select_btn_dual.innerHTML.substr(0, (select_btn_dual.innerHTML.length - 1)).replace(' ', '_');
    }
    if (select_btn_dual.innerHTML.substr(0, 1) === ",") {
        select_btn_dual.innerHTML = select_btn_dual.innerHTML.substr(1, (select_btn_dual.innerHTML.length - 1)).replace(' ', '_');
    }


    document.getElementById("querySQL").value = document.getElementById("query_dual").innerText + " " + document.getElementById("query").innerText;
}

function selectType(type) {
    var from_btn = document.getElementById("from");
    document.getElementById("select").innerHTML = "";
    document.getElementById("select_dual").innerHTML = "";

    if (type === 'multas') {
        from_btn.innerHTML = " from MULTAS";
        document.getElementById("div_multas").style.display = "block";
        document.getElementById("div_manutencao").style.display = "none";
        document.getElementById("div_locacao").style.display = "none";
        document.getElementById("div_veiculograma").style.display = "none";
        document.getElementById("querySQL").value = document.getElementById("query_dual").innerText + " " + document.getElementById("query").innerText;
        document.getElementById("name_xls").value = 'multas';
    } else if (type === 'manutencao') {
        from_btn.innerHTML = " from MANUTENCAO";
        document.getElementById("div_multas").style.display = "none";
        document.getElementById("div_manutencao").style.display = "block";
        document.getElementById("div_locacao").style.display = "none";
        document.getElementById("div_veiculograma").style.display = "none";
        document.getElementById("querySQL").value = document.getElementById("query_dual").innerText + " " + document.getElementById("query").innerText;
        document.getElementById("name_xls").value = 'manutencao';

    } else if (type === 'locacao') {
        from_btn.innerHTML = " from LOCACAO";
        document.getElementById("div_multas").style.display = "none";
        document.getElementById("div_manutencao").style.display = "none";
        document.getElementById("div_locacao").style.display = "block";
        document.getElementById("div_veiculograma").style.display = "none";
        document.getElementById("querySQL").value = document.getElementById("query_dual").innerText + " " + document.getElementById("query").innerText;
        document.getElementById("name_xls").value = 'locacao';

    } else if (type === 'veiculograma') {
        from_btn.innerHTML = " from VEICULOGRAMA";
        document.getElementById("div_multas").style.display = "none";
        document.getElementById("div_manutencao").style.display = "none";
        document.getElementById("div_locacao").style.display = "none";
        document.getElementById("div_veiculograma").style.display = "block";
        document.getElementById("querySQL").value = document.getElementById("query_dual").innerText + " " + document.getElementById("query").innerText;
        document.getElementById("name_xls").value = 'veiculograma';

    }
}

function filtrar_tags(tbox,divs, tags) {
    var procurado = document.getElementById(tbox).value.toUpperCase();
    var divName = document.getElementById(divs);
    var className = divName.getElementsByClassName(tags);
    var classnameCount = className.length;
    for (var j = 0; j < classnameCount; j++) {
        var idBtn = className[j].id.toUpperCase();
        if (idBtn.includes(procurado)) {
            document.getElementById(idBtn).style.display = "inline";
        } else {
            document.getElementById(idBtn).style.display = "none";
        }
    }
}

function openFullscreen(id) {
    var elem = document.getElementById(id);
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) { /* Firefox */
        elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { /* IE/Edge */
        elem.msRequestFullscreen();
    }
}

function aguardando() {
    document.getElementById("aguardando").classList.add("active");
    document.getElementById("atendimento").classList.remove("active");
    document.getElementById("encerrado").classList.remove("active");
    document.getElementById("tb_aguardando").style.display = "block";
    document.getElementById("tb_atendimento").style.display = "none";
    document.getElementById("tb_encerrado").style.display = "none";
}

function atendimento() {
    document.getElementById("aguardando").classList.remove("active");
    document.getElementById("atendimento").classList.add("active");
    document.getElementById("encerrado").classList.remove("active");
    document.getElementById("tb_aguardando").style.display = "none";
    document.getElementById("tb_atendimento").style.display = "block";
    document.getElementById("tb_encerrado").style.display = "none";
}

function encerrado() {
    document.getElementById("aguardando").classList.remove("active");
    document.getElementById("atendimento").classList.remove("active");
    document.getElementById("encerrado").classList.add("active");
    document.getElementById("tb_aguardando").style.display = "none";
    document.getElementById("tb_atendimento").style.display = "none";
    document.getElementById("tb_encerrado").style.display = "block";
}

function toogleMonth(mes,ano){
    document.getElementById('pdf_frame').src = 'pages/estaticos/'+ano+'/pdfs/21201_Relatorio_AVON_'+ano+'-'+mes+'.pdf';
}

function activeBtn(btnID){
    if(document.getElementById(btnID).classList.contains("btn-secundary")){
        document.getElementById(btnID).classList.remove("btn-secundary");
        document.getElementById(btnID).classList.add("btn-success");
    } else if(document.getElementById(btnID).classList.contains("btn-success")){
        document.getElementById(btnID).classList.remove("btn-success");
        document.getElementById(btnID).classList.add("btn-secundary");
    }
    
}

