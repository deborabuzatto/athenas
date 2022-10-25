
const labels = [
'Acima de 18 anos',
'Entre 16 e 18 anos',
'Abaixo de 16 anos'
];

var dados = [];

for (var i = 0; i < 4; i++) {
    var item = document.getElementsByClassName('grafico')[i]?.value;
    var list = dados.push(item); 
}

const data = {
labels: labels,
datasets: [{
    label: 'My First dataset',
    backgroundColor:[
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(255, 99, 132)'
      ],
    data: [dados[1], dados[2], dados[3]],
}]
};

const config = {
    type: 'doughnut',
    data: data,
    options: {}
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);

///////////////////////////////////////////////////////////



const Categoria = ['1º lugar', '2º lugar', '3º lugar', '4º lugar', '5º lugar'];

var dados1 = [];

for (var i = 0; i < 4; i++) {
    var item1 = document.getElementsByClassName('avaliacoes')[i]?.value;
    var list1 = dados1.push(item1); 
}

const generos = {
labels: Categoria,
datasets: [{
    label: 'My Categories',
    backgroundColor:[
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(255, 99, 132)'
        ],
    data: [list1[1], list1[2], list1[3], list[4], list[5]],
}]
};

const expressa = {
    type: 'bar',
    data: generos,
    options: {}
};

const categoria = new Chart(
    document.getElementById('categoria'),
    expressa
);

///////////////////////////////////////////////////////////
/*
const Favoritos = [
    'Letares',
    'Dias',
    'Intríseca'
];

const favoritos = {
labels: Favoritos,
datasets: [{
    label: 'My Categories',
    backgroundColor:[
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(255, 99, 132)'
        ],
    data: [0.2, 0.2, 0.6],
}]
};

const favorito = {
    type: 'bar',
    data: favoritos,
    options: {}
};

const exibir = new Chart(
    document.getElementById('favorito'),
    favorito
);*/
