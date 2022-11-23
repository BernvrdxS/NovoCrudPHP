function validate() {

    let hoje = new Date(); //data atual
    let dtNasc = new Date(dataNascimento.value);

    let idade = hoje.getFullYear() - dtNasc.getFullYear();
    let m = hoje.getMonth() - dtNasc.getMonth();
    if (m < 0 || (m === 0 && hoje.getDate() < dtNasc.getDate())) {
        idade--;
    }
    if (idade >= 0) document.getElementById('idade').value = idade + ' anos ';
    else document.getElementById('idade').value = "Essa data não é válida"

}
