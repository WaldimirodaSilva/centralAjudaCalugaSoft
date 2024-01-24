var btn = document.querySelector('#escoderMostrar');
var mostrar = document.querySelector('.conteudo-artigo');

btn.addEventListener('click', function () {
    if(mostrar.style.display === 'block'){
        mostrar.style.display = 'none';
    }else{
        mostrar.style.display = 'block';
        mostrar1.style.display = 'none';
        mostrar2.style.display = 'none';
    }
});


var btn1 = document.querySelector('#escoderMostrar1');
var mostrar1 = document.querySelector('.conteudo-artigo1');

btn1.addEventListener('click', function () {
    if(mostrar1.style.display === 'block'){
        mostrar1.style.display = 'none';
    }else{
        mostrar1.style.display = 'block';
        mostrar.style.display = 'none';
        mostrar2.style.display = 'none';
    }
});

var btn2 = document.querySelector('#escoderMostrar2');
var mostrar2 = document.querySelector('.conteudo-artigo2');

btn2.addEventListener('click', function () {
    if(mostrar2.style.display === 'block'){
        mostrar2.style.display = 'none';
    }else{
        mostrar2.style.display = 'block';
        mostrar.style.display = 'none';
        mostrar1.style.display = 'none';
    }
});
