//AUTOCOMPLETE  - JSON + MYSQL + PHP + jquery

// $(function () {
//     $("#g_autocomplete").autocomplete({
//         source: "./php/upGenres.php",
//         minLength: 2
//     });
// });


var tagContCategoria = document.querySelector('.tag-cont-categoria');
var inputCategoria = document.querySelector('.tag-cont-categoria input');
var tagsCategoria = [];

function createTagCategoria(label) {
    var div = document.createElement('div');
    div.setAttribute('class', 'tagCategoria');
    var span = document.createElement('span');
    span.innerHTML = label;
    var closeBtn = document.createElement('i');
    closeBtn.setAttribute('class', 'material-icons');
    closeBtn.setAttribute('data-itemCategoria', label);
    closeBtn.innerHTML = 'close';

    div.appendChild(span);
    div.appendChild(closeBtn);
    return div;
}

function resetCategoria() {
    document.querySelectorAll('.tagCategoria').forEach(function (tagCategoria) {
        tagCategoria.parentElement.removeChild(tagCategoria);
    });
};

function addTagsCategoria() {
    resetCategoria();
    tagsCategoria.slice().reverse().forEach(function (tagCategoria) {
        var inputCategoria = createTagCategoria(tagCategoria);
        tagContCategoria.prepend(inputCategoria);
    });
}

var upCategoria = function (e) {
    if (e.key == 'Enter') {
        tagsCategoria.push(inputCategoria.value);
        addTagsCategoria();
        inputCategoria.value = '';
    }
};

inputCategoria.addEventListener("keyup", upCategoria);


document.addEventListener('click', function (e) {
    console.log(e.target.tagName);
    if (e.target.tagName == 'I') {
        const tagLabel = e.target.getAttribute('data-itemCategoria');
        const index = tagsCategoria.indexOf(tagLabel);
        tagsCategoria = [...tagsCategoria.slice(0, index), ...tagsCategoria.slice(index + 1)];
        addTagsCategoria();
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





