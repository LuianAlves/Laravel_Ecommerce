<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Projeto ainda em desenvolvimento!

Até o momento:

* Criada duas tabelas no Banco de Dados para Users e Admins
* Configuração do template do Dashboard para usuários 'admins'
* Configuração do template Front-end Ecommerce
* Configuração de uma dashboard simples para os clientes cadastrados
* Aba com CRUD para Brands
* Próxima Etapa | Backend | => Aba com CRUD para Categories e Sub-categories

<hr>

## Instalação do Projeto ...

 #Instalando o Composer:
 
     $ composer install --no-scripts
     
#Copie o arquivo .env.example

    $ cp .env.example .env

#Crie uma key para o projeto

    $ php artisan key:generate

#Configurar o arquivo .env com base no seu Banco de Dados e SMTP para recuperação de senhas 

#Execute as migrations

    $ php artisan migrate --seed
    
<hr>

#Após executar as migrates e os seeders acesse a URL 
            
        /admin/login 
        
        usuario: admin@gmail.com
        password: teste123


##Caso tenha algum erro com este login e/ou senha

#Criando um Login via Tinker

    $ php artisan tinker

#Acessando o user

        $admin = new App\Models\Admin();

#Definindo os dados de login

        $user->name = 'Teste';
        $user->email = 'teste@admin.com';
        $user->password = bcrypt('teste123');

#Adicionando ao Banco de Dados

        $user->save();
        
        // Caso obtenha sucesso na gravação dos dados, retornará 'true' ...
     
        
        


