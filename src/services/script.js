
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
    data: [dados[0], dados[1], dados[2]],
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

