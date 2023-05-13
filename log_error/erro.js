const table = document.getElementById('erros-table').querySelector('tbody');


fetch('/log_erro')
  .then(response => response.json())
  .then(data => {
   
    data.forEach(erro => {
      const row = table.insertRow();
      row.insertCell().textContent = erro.id;
      row.insertCell().textContent = erro.tipo;
      row.insertCell().textContent = erro.mensagem;
      row.insertCell().textContent = erro.data_hora;
    });
  })
  .catch(error => console.error(error));


