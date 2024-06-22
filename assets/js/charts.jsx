 const ctx = document.getElementById('myChart');

    new Chart(ctx, {
    type: 'line',
    data: {
    labels: ['jan', 'feb','mar','apr'],
    datasets: [{
    label: '# of users',
    data: [2],
    borderWidth: 1
}]
},
    options: {
    scales: {
    y: {
    beginAtZero: true
}
}
}
});
