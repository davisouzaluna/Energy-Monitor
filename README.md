<p align="center">
<a href="#">
<img src="/img/Logo.png" height="150" width="175" alt="Logo Energy Monitor" />
</a>
</p>

<p align="center">Tenha o controle do consumo dos seus eletrodomésticos com o Energy Monitor. 🚀</p>

<div align="center">
<div style="display: inline_block"><br> 
<img align="center" alt="Energy-Js" height="30" width="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-plain.svg">
<img align="center" alt="Energy-HTML" height="30" width="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original.svg">
<img align="center" alt="Energy-CSS" height="30" width="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original.svg">
<img align="center" alt="Energy-python" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" />
<img align="center" alt="Energy-php" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" />
<img align="center" alt="Energy-Composer" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/composer/composer-original.svg" /> 
<img align="center" alt="Energy-laravel" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain-wordmark.svg" />
<img align="center" alt="Energy-mysql" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg" />
<img align="center" alt="Energy-figma" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" />
<img align="center" alt="Energy-canva" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/canva/canva-original.svg" />
<img align="center" alt="Energy-git" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" />
<img align="center" alt="Energy-github" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original-wordmark.svg" />
<img align="center" alt="Energy-linux" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linux/linux-original.svg" />
<img align="center" alt="Energy-node" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original-wordmark.svg" />
<img align="center" alt="Energy-npm" height="30" width="40" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/npm/npm-original-wordmark.svg" />
</div>

## Visão Geral

O Energy Monitor é um aplicativo Laravel para monitorar corrente elétrica em dispositivos e informar o consumo ao usuário por meio de relatórios e gráficos. O Energy Monitor oferece uma solução eficiente e personalizável. Ele permite que os usuários tomem decisões informadas para reduzir desperdícios e otimizar o uso de energia. Experimente o Energy Monitor e gerencie seu consumo de energia de forma consciente e eficiente.

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

Consulte **[Implantação](#-implanta%C3%A7%C3%A3o)** para saber como implantar o projeto.

### 📋 Pré-requisitos (Necessário instalar)

Linux
Pip
Python3
Paho
Mosquitto
Mosquitto-client
Pymysql
MySql
PHP
Laravel
Composer
Node
Git
NPM

```
Windows 10 ou superior (atualizado)

```

### 🔧 Executar o Projeto

1 - Acesse um terminal e execute os seguintes comandos:

cd ~
mkdir workspace
cd workspace
git clone https://github.com/davifurao/Energy-Monitor.git
cd Energy-Monitor
cd IOT
sudo apt-get update && sudo apt-get upgrade
bash verificacao.sh

2 - Acesse outro terminal e execute os seguintes comandos:

cd Energy-Monitor
cd IOT
python3 publisher.py

3 - Acesse o terceiro terminal e execute os seguintes comandos:

cd Energy-Monitor
cd IOT
python3 subscriber-with-BD.py

4 - Acessar o Banco de Dados:

- Via Terminal:

service mysqld start
mysql -u root -p
Usar o Script SQL que está na pasta BD para criar o Banco de Dados

- Via Workbench:

Usar o Script SQL que está na pasta BD para criar o Banco de Dados

5 - Em seu editor de texto, abra a pasta Aplicação:

Copie o arquivo .env.example renomeando sua cópia para .env
Abra o .env e insira as informações referentes ao Banco de Dados

6 - Acesse o quinto terminal e execute os seguintes comandos:

cd Energy-Monitor
cd aplicacao
composer update
npm install && npm run dev 

7 - Acesse o sexto terminal e execute os seguintes comandos:

cd Energy-Monitor
cd aplicacao
php artisan migrate
php artisan serve

## 📦 Implantação

Adicione notas adicionais sobre como implantar isso em um sistema ativo

## 🛠️ Construído com

Mencione as ferramentas que você usou para criar seu projeto

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - O framework web usado
* [Maven](https://maven.apache.org/) - Gerente de Dependência
* [ROME](https://rometools.github.io/rome/) - Usada para gerar RSS

## 📌 Versão

Nós usamos [SemVer](http://semver.org/) para controle de versão. Para as versões disponíveis, observe as [tags neste repositório](https://github.com/suas/tags/do/projeto). 

## ✒️ Autores

Mencione todos aqueles que ajudaram a levantar o projeto desde o seu início

* **Um desenvolvedor** - *Trabalho Inicial* - [umdesenvolvedor](https://github.com/linkParaPerfil)
* **Fulano De Tal** - *Documentação* - [fulanodetal](https://github.com/linkParaPerfil)

Você também pode ver a lista de todos os [colaboradores](https://github.com/usuario/projeto/colaboradores) que participaram deste projeto.

## 📄 Licença

Este projeto está sob a licença (sua licença) - veja o arquivo [LICENSE.md](https://github.com/usuario/projeto/licenca) para detalhes.

## 🎁 Expressões de gratidão

* Conte a outras pessoas sobre este projeto 📢;
* Um agradecimento publicamente 🫂;
* etc.