/*
 ===========================================================
 INICIO VALIDADOR CAMPOS DO EQUIPAMENTO
 ===========================================================
 */
/* global M, form_chamado, M, form_equip */
function valida() {
    var numeroSerie = form_equip.numeroSerie.value;
    var fabricante = form_equip.fabricante.value;
    var nome = form_equip.nome.value;
    var dataFabricacao = form_equip.dataFabricacao.value;
    var valor = form_equip.valor.value;

    if (numeroSerie == "") {
        M.toast({html: 'Número de série deve conter 10 caracteres alfanúmerico!'});
        form_equip.numeroSerie.focus();
        return false;
    }

    if (fabricante == "") {
        M.toast({html: 'Preencha o fabricante!'});
        form_equip.fabricante.focus();
        return false;
    }

    if (nome == "") {
        M.toast({html: 'Preencha o nome!'});
        form_equip.nome.focus();
        return false;
    }

    if (dataFabricacao == "" || dataFabricacao == "1970-01-01") {
        M.toast({html: 'Verifique a data de Fabricação!'});
        form_equip.dataFabricacao.focus();
        return false;
    }

    if (valor == "" || valor < 0 || valor == 0) {
        M.toast({html: 'Verifique o valor do produto!\nNão podendo ser zero!'});
        form_equip.valor.focus();
        return false;
    }
}
/*
 ===========================================================
 FIM VALIDA CAMPOS EQUIPAMENTO
 ===========================================================
 */





/*
 ===========================================================
 INICIO VALIDA CAMPO CPF LOGIN
 ===========================================================
 */
function VerificaCPF() {
    var cpf = document.form_login.cpf.value;
    var senha = document.form_login.senha.value;

    if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999") {
        M.toast({html: 'Preencher corretamente o campo cpf!'});
        form_login.cpf.focus();
        return false;
    }
    if (cpf.length == 11) {
        if (vercpf(document.form_login.cpf.value)) {
            document.form_login.submit();
        }
    } else {
        M.toast({html: 'cpf deve conter 11 caracteres!'});
        form_login.cpf.focus();
        return false;
    }
    if (senha == "") {
        M.toast({html: 'Campos senha deve ser preenchido!'});
        form_login.senha.focus();
        return false;
    }
}

function vercpf(cpf) {
    add = 0;
    for (i = 0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10))) {
        M.toast({html: 'cpf inválido!'});
        document.getElementById('cpf').value = "";
        form_login.cpf.focus();
        return false;
    }
}
/*
 ===========================================================
 FIM VALIDA CAMPO CPF LOGIN
 ===========================================================
 */





/*
 ===========================================================
 INICIO VALIDA CAMPOS CHAMADO
 ===========================================================
 */
function validaChamado() {
    var titulo = form_chamado.titulo.value;
    var descricao = form_chamado.descricao.value;
    var dataAbertura = form_chamado.dataAbertura.value;
    var dataFechamento = form_chamado.dataFechamento.value;
    var numeroSerieEquipamento = form_chamado.numeroSerieEquipamento.value;

    if (titulo == "") {
        M.toast({html: 'Preencha campo título!'});
        form_chamado.titulo.focus();
        return false;
    }

    if (descricao == "") {
        M.toast({html: 'Preencha o descrição!'});
        form_chamado.descricao.focus();
        return false;
    }

    if (dataAbertura === "1970-01-01") {
        M.toast({html: 'Escol a data de Fabricação!'});
        form_chamado.dataAbertura.focus();
        return false;
    }

    if (dataFechamento < dataAbertura) {
        M.toast({html: 'Data de fechamento deve ser maior ou igual a data de abertura!'});
        form_chamado.dataFechamento.focus();
        return false;
    }


    if (numeroSerieEquipamento == "Selecione um Equipamento") {
        M.toast({html: 'Selecione um Equipamento!'});
        form_chamado.numeroSerieEquipamento.focus();
        return false;
    }

    if (status == "Aberto") {
        M.toast({html: 'Este chamado encontra-se em aberto!'});
        form_chamado.status.focus();
        return false;
    }
}
/*
 ===========================================================
 FIM VALIDA CAMPOS CHAMADO
 ===========================================================
 */