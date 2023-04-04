const form = document.getElementById('form');
form.addEventListener('submit', (e) => {
  e.preventDefault();
  const name = document.getElementById('name').value;
  const phone = document.getElementById('phone').value;
  const email = document.getElementById('email').value;
  const problem = document.getElementById('problem').value;

  function guncelleModeller(markaSecim) {
  var modeller = {};
  modeller["Apple"] = ["iPhone 11", "iPhone 12", "iPhone SE", "iPhone XR", "iPhone XS"];
  modeller["Samsung"] = ["Galaxy A51", "Galaxy A71", "Galaxy Note10", "Galaxy S20", "Galaxy S21"];
  modeller["Xiaomi"] = ["Mi 10", "Mi 10T", "Mi 11", "Poco X3 Pro", "Redmi Note 10"];

  var modelSecim = document.getElementById("model");

  // Model seçeneklerini temizle
  modelSecim.innerHTML = "";

  // Seçilen markaya göre model seçeneklerini doldur
  if (markaSecim.value !== "") {
    for (var i = 0; i < modeller[markaSecim.value].length; i++) {
      var option = document.createElement("option");
      option.text = modeller[markaSecim.value][i];
      option.value = modeller[markaSecim.value][i];
      modelSecim.add(option);
    }
  }
  
}
  const data = {
    name,
    phone,
    email,
    problem
  };

  fetch('submit.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
  
  .then(response => response.text())
  .then(data => {
    console.log(data);
    window.print();
  })
  .catch((error) => {
    console.error('Error:', error);
  });
// verileri çekme
$.getJSON('veriler.php', function(data) {
    var html = '';
    $.each(data, function(key, val) {
        html += '<div class="card mb-3">';
        html += '<div class="card-body">';
        html += '<h5 class="card-title">' + val.adsoyad + '</h5>';
        html += '<h6 class="card-subtitle mb-2 text-muted">' + val.marka + ' ' + val.model + '</h6>';
        html += '<p class="card-text">' + val.ariza + '</p>';
        html += '<p class="card-text">Ücret: ' + val.ucret + ' TL</p>';
        html += '<a href="duzenle.php?id=' + val.id + '" class="card-link">Düzenle</a>';
        html += '<a href="sil.php?id=' + val.id + '" class="card-link">Sil</a>';
        html += '</div></div>';
    });
    $('#veriler').html(html);
});
