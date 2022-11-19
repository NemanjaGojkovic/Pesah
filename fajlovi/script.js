let select1 = document.getElementById("exampleFormControlSelect1");
let select2 = document.getElementById("exampleFormControlSelect2");
let form1 = document.getElementById("search-form1");
let form2 = document.getElementById("search-form2");

if (select1 != null) {
  select1.addEventListener('change', (event) => {
    let vrstaSorta = event.target.value;

    $.ajax({
      url: 'sort.php',
      type: 'POST',
      data: {
        vrstaSorta: vrstaSorta,
        table: "figure"
      },
      success: (response) => {
        let figure = JSON.parse(response);
        let html = "";

        figure.forEach(figura => {
          html += `<div class="col-md-4 col-sm-6 col-12 mt-4">
          <div class="card">
            <div class="card-img">
            <img src="${figura.slika}" alt="" style="max-height: 255px; max-width: 333px; width: 100%; height: auto;">
            </div>
            <div class="card-sadrzaj">
                        <h4 class="card-naziv">${figura.drvo} ${figura.naziv}</h4>
                        <p class="card-cena" style="color: black; font-weight: 700;">Cena: ${figura.cena} €</p>
                        <p class="card-opis">${figura.opis.substring(0, 250)}</p>
            </div>
          </div>
        </div>`;
        });

        document.getElementById('figure-container').innerHTML = html;
      }
    });
  });
}


if (select2 != null) {
  select2.addEventListener('change', (event) => {
    let vrstaSorta = event.target.value;

    $.ajax({
      url: 'sort.php',
      type: 'POST',
      data: {
        vrstaSorta: vrstaSorta,
        table: "tableSah"
      },
      success: (response) => {
        console.log(response);
        let tableSah = JSON.parse(response);
        let html = "";

        tableSah.forEach(tabla => {
          html += `<div class="col-md-4 col-sm-6 col-12 mt-4">
                    <div class="card">
                      <div class="card-img">
                        <img src="${tabla.slika}" alt="" style="max-height: 255px; max-width: 333px; width: 100%; height: auto;">
                      </div>
                      <div class="card-sadrzaj">
                        <h4 class="card-naziv">${tabla.drvo} ${tabla.naziv}</h4>
                        <p class="card-cena" style="color: black; font-weight: 700;">Cena: ${tabla.cena} €</p>
                        <p class="card-opis">${tabla.opis.substring(0, 250)}</p>
                      </div>
                    </div>
                  </div>`;
        });

        document.getElementById('table-container').innerHTML = html;
      }
    });
  });
}

if (form1 != null) {
  form1.addEventListener('submit', (event) => {
    event.preventDefault();

    let unetTekst = document.getElementById('search-input').value;

    $.ajax({
      url: 'search.php',
      type: 'POST',
      data: {
        unetTekst: unetTekst,
        table: "figure"
      },
      success: (response) => {
        console.log(response);
        let figure = JSON.parse(response);
        let html = "";

        figure.forEach(figura => {
          html += `<div class="col-md-4 col-sm-6 col-12 mt-4">
                    <div class="card">
                      <div class="card-img">
                        <img src="${figura.slika}" alt="" style="max-height: 255px; max-width: 333px; width: 100%; height: auto;">
                      </div>
                      <div class="card-sadrzaj">
                        <h4 class="card-naziv">${figura.drvo} ${figura.naziv}</h4>
                        <p class="card-cena" style="color: black; font-weight: 700;">Cena: ${figura.cena} €</p>
                        <p class="card-opis">${figura.opis.substring(0, 250)}</p>
                      </div>
                    </div>
                  </div>`;
        });

        document.getElementById('figure-container').innerHTML = html;
      }
    });
  });
}


if (form2 != null) {
  form2.addEventListener('submit', (event) => {
    event.preventDefault();

    let unetTekst = document.getElementById('search-input').value;

    $.ajax({
      url: 'search.php',
      type: 'POST',
      data: {
        unetTekst: unetTekst,
        table: "tableSah"
      },
      success: (response) => {
        console.log(response);
        let tableSah = JSON.parse(response);
        let html = "";

        tableSah.forEach(tabla => {
          html += `<div class="col-md-4 col-sm-6 col-12 mt-4">
                    <div class="card">
                      <div class="card-img">
                        <img src="${tabla.slika}" alt="" style="max-height: 255px; max-width: 333px; width: 100%; height: auto;">
                      </div>
                      <div class="card-sadrzaj">
                        <h4 class="card-naziv">${tabla.drvo} ${tabla.naziv}</h4>
                        <p class="card-cena" style="color: black; font-weight: 700;">Cena: ${tabla.cena} €</p>
                        <p class="card-opis">${tabla.opis.substring(0, 250)}</p>
                      </div>
                    </div>
                  </div>`;
        });

        document.getElementById('table-container').innerHTML = html;
      }
    });
  });
}
