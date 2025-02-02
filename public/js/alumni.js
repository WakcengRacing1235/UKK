// script.js
document.getElementById('burgerMenu').addEventListener('click', function () {
  const dropdown = document.getElementById('dropdownMenu');
  dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
});

// Optional: Close menu when clicking outside
document.addEventListener('click', function (event) {
  const menu = document.getElementById('dropdownMenu');
  const button = document.getElementById('burgerMenu');
  if (!menu.contains(event.target) && !button.contains(event.target)) {
    menu.style.display = 'none';
  }
});
document.addEventListener("DOMContentLoaded", function () {
  const diagram = document.querySelector('#tracerChart').getAttribute('data-id')
  // console.log( JSON.parse(diagram))
  const labelsdefault =[
    { name: 'Kerja', color: '#4caf50' },
    { name: 'Kuliah', color: '#2196f3' },
    { name: 'Tidak Aktif', color: '#ff9800' }
];
  const data = JSON.parse(diagram);
  
  // Pemetaan antara labels dan kunci data
  const mapping = {
    'Kerja': 'kerja',
    'Kuliah': 'kuliah',
    'Tidak Aktif': 'tidakaktif'
  };

  // Filter labels berdasarkan nilai di data menggunakan mapping
  const filteredLabels = labelsdefault.filter(label => {
    const key = mapping[label.name];
    return data[key] !== 0;
});

// Membuat array untuk `name` dan `color`
const names = filteredLabels.map(label => label.name);


  const dummyData = data;

  const ctx = document.getElementById('tracerChart').getContext('2d');
  const tracerChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Kerja', 'Kuliah', 'Belum Mengisi'],
      datasets: [{
        data: [dummyData.kerja, dummyData.kuliah, dummyData.belum_mengisi],
        backgroundColor: filteredLabels.map(label => label.color),
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false // Hilangkan legenda default
        },
      }
    }
  });

  // Buat legenda manual
  const legendList = document.getElementById('legendList');
  const labels = names;
  const colors = filteredLabels.map(label => label.color);

  labels.forEach((label, index) => {
    const legendItem = document.createElement('li');
    legendItem.innerHTML = `<span style="background-color: ${colors[index]}; width: 15px; height: 15px; display: inline-block; margin-right: 10px;"></span>${label}`;
    legendList.appendChild(legendItem);
  });
});

