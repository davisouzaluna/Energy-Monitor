<p align="center">
<a href="#">
<img src="aplicacao/public/img/Logotipo.png" height="20%" width="20%" alt="Logo Energy Monitor" />
</a>
</p>
<h1 align="center">Energy Monitor</h1>
<p align="center">Tenha o controle do consumo dos seus eletrodomésticos com o Energy Monitor. 🚀</p>
<br/>

<h2 align="center">Tecnologias utilizadas</h2>
<div align="center">
<div style="display: inline_block"><br> 
<img align="center" alt="Energy-Js" height="30" width="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-plain.svg">

<img align="center" alt="Energy-python" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" />
<img align="center" alt="Energy-php" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" />
<img align="center" alt="Energy-laravel" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain-wordmark.svg" />
<img align="center" alt="Energy-mysql" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg" />
</div>

## Visão Geral

<p align = "left">O Energy Monitor é uma aplicação de monitoramento de energia em tempo real que permite que o usuário tenha controle dos gastos na conta de energia
</p>

<h2 align='center'> 📋 Pré-requisitos (Necessário instalar)</h2>
<ul align='left'>
<li>Python3</li>
<li>MySql</li>
<li>PHP 8.2</li>
<li>Laravel</li>
<li>Node</li>
<li>Git</li>
<li>NPM na versão estável</li>
</ul>


<h2 align='center'> 🔧 Executando o Projeto</h2>

<h3 align='left'>1 - Acesse um terminal(uma janeja) e execute os seguintes comandos:</h3>

```bash
git clone https://github.com/davifurao/Energy-Monitor.git
cd Energy-Monitor
cd IOT
sudo apt-get update && sudo apt-get upgrade
bash verificacao.sh
```
<h3 align='left'>2 - Acesse outro terminal e execute os seguintes comandos:</h3>

```bash
cd Energy-Monitor
cd IOT
python3 publisher.py
```
<h3 align='left'>3 - Acesse o terceiro terminal e execute os seguintes comandos:</h3>

```bash
cd Energy-Monitor
cd IOT
python3 subscriber-with-BD.py
```


<h3 align='left'>4 - Em sua IDE (visual studio code ou afins) , abra a pasta Aplicação:</h3>

Copie o arquivo .env.example renomeando sua cópia para .env
Abra o .env e insira as informações referentes ao Banco de Dados

<h3 align='left'>6 - Acesse o quinto terminal e execute os seguintes comandos:</h3>

```bash
cd Energy-Monitor
cd aplicacao
composer update
npm install && npm run dev 
```
<h3 align='left'>7 - Acesse o sexto terminal e execute os seguintes comandos:</h3>

```bash
cd Energy-Monitor
cd aplicacao
php artisan migrate
php artisan serve
```




## 📄 Licença

Este projeto está sob a licença <a href='https://github.com/davifurao/Energy-Monitor/blob/main/LICENSE'>MIT</a>.

## 🎁 Agradecimentos

<p>Obrigado a todos que participaram, estão participando e irão participar, vocês são incríveis :grin: </p>

