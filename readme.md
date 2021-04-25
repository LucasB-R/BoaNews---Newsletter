![Laravel][laravel-shield]
![PHP][php-shield]]
![Composer][composer-shield]


<br />

# BoaNews - Newsletter

  <h3 align="center">✉ Sistema de Newsletter ✉</h3>

#### Lógica do envio de e-mails: 
Os E-Mails são colocados em uma textarea lá o AJAX e o JAVASCRIPT 
são responsáveis por separar os e-mails e enviar para a API.
A API pega o E-Mail Chama o Job e o coloca em fila para ser enviado e 
logo após a API faz todas as relações de dados necessárias.

#### PHP Unit Testando o Mail com MAIL:FAKE


### Screenshots
![Screenshot][Screenshot]


### Instalação

1. Clone este repositório
   ```sh
   git clone https://github.com/LucasB-R/BoaNews---Newsletter.git
   ```

2. Instale as dependêcias
   ```sh
   composer install
   ```

3. Configure o arquivo .env corretamente com os dados do SMTP

4. Adicione as tabelas ao banco de dados
   ```sh
   php artisan migrate
   ```

5. Vá em app/Mail/EnviaNewsMail na linha 43 altere o e-mail que será o remetente

6. Inicie o Servidor!

7. Inicie as Queues
   ```sh
   php artisan queue:work
   ```

8. Ao criar sua conta altere na tabela do usuário o admin para 1





[laravel-shield]: https://img.shields.io/badge/LARAVEL-v5.8.38-orange
[php-shield]: https://img.shields.io/badge/PHP-7.4.16-red
[composer-shield]: https://img.shields.io/badge/Composer-v2.0.9-red
[Screenshot]: /screenshots/screenshot.png
