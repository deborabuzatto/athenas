
const labels = [
'Acima de 18 anos',
'Entre 16 e 18 anos',
'Abaixo de 16 anos'
];

const data = {
labels: labels,
datasets: [{
    label: 'My First dataset',
    backgroundColor:[
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(255, 99, 132)'
      ],
    data: [11, 36, 79],
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

const Categoria = [
'Letares',
'Dias',
'Intríseca'
];

const generos = {
labels: Categoria,
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
);
