//AUTOCOMPLETE  - JSON + MYSQL + PHP + jquery

// $(function () {
//     $("#g_autocomplete").autocomplete({
//         source: "./php/upGenres.php",
//         minLength: 2
//     });
// });


var tagContHabilidade = document.querySelector('.tag-cont-habilidade');
var inputHabilidade = document.querySelector('.tag-cont-habilidade input');
var tagsHabilidade = [];

function createTagHabilidade(label) {
    var div = document.createElement('div');
    div.setAttribute('class', 'tagHabilidade');
    var span = document.createElement('span');
    span.innerHTML = label;
    var closeBtn = document.createElement('i');
    closeBtn.setAttribute('class', 'material-icons');
    closeBtn.setAttribute('data-itemHabilidade', label);
    closeBtn.innerHTML = 'close';

    div.appendChild(span);
    div.appendChild(closeBtn);
    return div;
}

function resetHabilidade() {
    document.querySelectorAll('.tagHabilidade').forEach(function (tagHabilidade) {
        tagHabilidade.parentElement.removeChild(tagHabilidade);
    });
};

function addTagsHabilidade() {
    resetHabilidade();
    tagsHabilidade.slice().reverse().forEach(function (tagHabilidade) {
        var inputHabilidade = createTagHabilidade(tagHabilidade);
        tagContHabilidade.prepend(inputHabilidade);
    });
}

var upHabilidade = function (e) {
    if (e.key == 'Enter') {
        tagsHabilidade.push(inputHabilidade.value);
        addTagsHabilidade();
        inputHabilidade.value = '';
    }
};

inputHabilidade.addEventListener("keyup", upHabilidade);


document.addEventListener('click', function (e) {
    console.log(e.target.tagName);
    if (e.target.tagName == 'I') {
        const tagLabel = e.target.getAttribute('data-itemHabilidade');
        const index = tagsHabilidade.indexOf(tagLabel);
        tagsHabilidade = [...tagsHabilidade.slice(0, index), ...tagsHabilidade.slice(index + 1)];
        addTagsHabilidade();
    }
})


//CANCELAR O ENTER NOS INPUTS
$("input, select", "form") // busca input e select no form
    .keypress(function (e) { // evento ao presionar uma tecla válida keypress

        var k = e.which || e.keyCode; // pega o código do evento

        if (k == 13) { // se for ENTER
            e.preventDefault(); // cancela o submit
            $(this)
                .closest('tr') // seleciona a linha atual
                .next() // seleciona a próxima linha
                .find('input, select') // busca input ou select
                .first() // seleciona o primeiro que encontrar
                .focus(); // foca no elemento
        }

    });





