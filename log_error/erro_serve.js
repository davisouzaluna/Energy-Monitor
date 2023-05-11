const express = require('express');
const app = express();
const mysql = require('mysql');

const db = mysql.createConnection({
  host: 'localhost',
  user: 'aline',
  password: 'aline123',
  database: 'energy_monitor'
});

db.connect((err) => {
  if (err) {
    throw err;
  }

  console.log('Conectado ao banco de dados MySQL');
});

app.get('/log_erro', (req, res) => {
  const sql = 'SELECT * FROM log_erro';

  db.query(sql, (err, result) => {
    if (err) {
      throw err;
    }

    res.json(result);
  });
});

app.listen(3000, () => {
  console.log('Servidor iniciado na porta 3000');
});
