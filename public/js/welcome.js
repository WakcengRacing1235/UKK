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
  const dummyData = {
    kerja: 45,
    kuliah: 30,
    belum_mengisi: 25
  };

  const ctx = document.getElementById('tracerChart').getContext('2d');
  const tracerChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Kerja', 'Kuliah', 'Belum Mengisi'],
      datasets: [{
        data: [dummyData.kerja, dummyData.kuliah, dummyData.belum_mengisi],
        backgroundColor: ['#4caf50', '#2196f3', '#ff9800'],
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
  const labels = ['Kerja', 'Kuliah', 'Belum Mengisi'];
  const colors = ['#4caf50', '#2196f3', '#ff9800'];

  labels.forEach((label, index) => {
    const legendItem = document.createElement('li');
    legendItem.innerHTML = `<span style="background-color: ${colors[index]}; width: 15px; height: 15px; display: inline-block; margin-right: 10px;"></span>${label}`;
    legendList.appendChild(legendItem);
  });
});
document.addEventListener("DOMContentLoaded", function () {
  // Data sementara
  const dummyData = {
    jakarta: 200,
    bandung: 150,
    surabaya: 100,
    yogyakarta: 150
  };

  // Inisialisasi chart
  const ctx = document.getElementById('tracerChart-kerja').getContext('2d');
  const tracerChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta'],
      datasets: [{
        data: [
          dummyData.jakarta, 
          dummyData.bandung, 
          dummyData.surabaya, 
          dummyData.yogyakarta
        ],
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50'],
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false // Hilangkan legenda bawaan
        },
        tooltip: {
          enabled: false // Nonaktifkan tooltip
        }
      }
    }
  });

  // Buat legenda manual
  const legendList = document.getElementById('legendList-kerja');
  const labels = ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta'];
  const colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50'];

  labels.forEach((label, index) => {
    const legendItem = document.createElement('li');
    legendItem.innerHTML = `
      <span style="background-color: ${colors[index]}; 
                   width: 15px; 
                   height: 15px; 
                   display: inline-block; 
                   margin-right: 10px;"></span>
      ${label}: ${dummyData[Object.keys(dummyData)[index]]}
    `;
    legendList.appendChild(legendItem);
  });
});
