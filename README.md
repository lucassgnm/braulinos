# braulinosapp

<h3>O sistema do Salão de Beleza Braulin'os, foi feito em sua maior parte com um microframework inspirado no CodeIgniter(PHP), JQuery, e muito HTML/CSS.</h3>

Existem 2 usuários criados para teste:
> <p>login: usuario@usuario.com senha: usuario123</p>
> <p>login: admin@admin.com senha: admin123</p> 

<b>Features atuais:</b>
- [x] Quando a data do agendamento é passa, o agendamento não é mais mostrado na lista;
- [x] O sistema verifica se o horário escolhido pelo(a) cliente está disponivel no momento;
- [x] Existem 2 Dashboards, um designado para o Admin, que tem mais opções e outro para o usuário;
- [x] Durante o Login / Cadastro é feita todas as validações possiveis para que não haja erros;
- [x] No Dashboard do Administrador há um grafico gerado por Chart.js em comunicação direta com a Database;

<b>Proximas features:</b>
- [ ] Área de complemento de cadastro;
- [ ] Envio de email para confirmações;
- [ ] Terminar a documentação das funções;

Foram aplicados apenas testes funcionais.
<p><b>Diagrama da Database:</b></p>

![diagram](https://user-images.githubusercontent.com/47739034/90813265-b933bb80-e2fd-11ea-8242-99528ba7c2c4.png)

<p><b>Guia de instalação:</b></p>

* Ter o Xampp, Wamp ou outro;

* Clonar o repositório;

* Fazer o import do arquivo dump **_braulinosdb.sql_** / pasta raiz do projeto;

* Alterar as configurações do arquivo **_config.php_** para a sua configuração / pasta raiz do projeto;

* Iniciar a aplicação no caminho **_braulinos/login/_**.
