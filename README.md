<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Projeto ainda em desenvolvimento!

<p><a href="#desenvolvido"># Desenvolvido até o momento</a></p>
<p><a href="#config"># Configuração Inicial do Projeto</a></p>
<p><a href="#admin"># Login Admin</a></p>
<p><a href="#tinker"># Caso tenha erro com o Login Admin</a></p>
<p><a href="#erros"># Possíveis erros ou bugs</a></p>

<hr>

<p id="config">

## Configurando o Projeto ...

 
        composer install --no-scripts
     
#Copie o arquivo .env.example

        cp .env.example .env

#Crie uma key para o projeto

        php artisan key:generate

#Configurar o arquivo .env com base no seu Banco de Dados e SMTP para recuperação de senhas 

#Execute as migrations

        php artisan migrate --seed
</p>    
<hr>

<p id="admin">

## Login Admin
#Após executar as migrates e os seeders acesse a URL 
            
        /admin/login 
        
        usuario: admin@gmail.com
        password: teste123
</p>

<hr>

<p id="tinker">

## Caso tenha algum erro com o Login e/ou Senha acima

#Criando um Login via Tinker

        php artisan tinker

#Acessando o user

        $admin = new App\Models\Admin();

#Definindo os dados de login

        $user->name = 'Teste';
        $user->email = 'teste@admin.com';
        $user->password = bcrypt('teste123');

#Adicionando ao Banco de Dados

        $user->save();
        
        // Caso obtenha sucesso na gravação dos dados, retornará 'true' 

</p>
    
<hr>

<p id="desenvolvido">

## Até o momento:

* Criada duas tabelas no Banco de Dados para Users e Admins,
* Configuração do template do Dashboard para usuários 'admins',
* Configuração do template Front-end Ecommerce,
* Configuração de uma dashboard simples para os clientes cadastrados,
* backend - Aba com CRUD para Brands,
* backend - Aba com CRUD para Categories, 
* backend - Aba com CRUD para Sub-Categories e Sub Sub-categories,
* backend - Aba com CRUD para Products,
* backend - Aba com CRUD para Sliders do Template Front-end,
* Habilitado o Multi-Language do Site, Configurado Sidenav e Navbar no Frontend, Slides e Aba de Novos Produtos,
* Configurado a Página de cada Produto + Detalhes,
* Configurado os Cards hot_deals, freatured, special_offer, special_deals,
* Criado rota para direcionar cara Produto para sua Página,
* Card Personalizado com uma Categoria de Produtos,
* view para as Tags de Produtos,
* view para sub-categorias e sub-sub-categorias
* select para cores e tamanhos dos produtos
* Card na view Detalhes de Produtos para Produtos Relacionados com o da Página
* Modal para Adicionar Produtos ao Carrinho (AJAX)
* Configurado Botão para adicionar produtos ao Carrinho (AJAX)
* MiniCarrinho no Header Configurado com Imagens, Valores (AJAX)
* Adicionando Produtos aos Favoritos (AJAX)
* View para Listar e Remover dos Favoritos (AJAX - Acesso somente com usuário 'user' autenticado)
* // No momento existe algum bug com caracteres especiais, será consertado logo. // *
* View para Carrinho de Compras finalizada (AJAX - Somente em inglês ainda)
* backend - Aba com CRUD para Adicionar Cupons de Desconto
* backend - Aba com CRUD para Divisão entre Distritos e Estados para utilizar no frete posteriormente
* Aplicando o Cupom de Desconto no carrinho de compras (AJAX)
* Configurado View para Checkout (Acesso somente com usuário 'user' autenticado)
* View CheckOut - Input para Nome e Localidade para envio (Acesso somente com usuário 'user' autenticado)
* View CheckOut - Dados dos Produtos, dados de envio

* // API Stripe 
    
        --> Acesse o Site https://stripe.com e crie uma conta, caso ainda não tenha.
        --> Acesse a url https://dashboard.stripe.com/test/apiskeys ou pelo menu, acesse Desenvolvedores->Chaves da API (Canto esquerdo da Tela)
        --> Copie a chave publicável e cole no SCRIPT presente no fim da view stripe.blade.php. - [resources/profile/checkout/payments/stripe.blade.php]
        --> Copie a chave secreta e cole em StripeController, 'index'. - [App/Http/Controllers/User/API/StripeController.php] 
        Acesse [App/Mail/OrderMail] e modifique conforme suas informações: from(' ... '), subject(' ... ')

* //

* Aba 'Meus Pedidos' na conta do usuário listado as compras feitas pelo usuário (Acesso somente com usuário 'user' autenticado)
* View para detalhes da Compra, listando endereço de envio, detalhes do pedido e dos produtos comprados (Acesso somente com usuário 'user' autenticado)
* Download da 'Fatura' com detalhes da Compra feita pelo usuário (Utilizado o DOMPDF)
* Configurado o método de pagamento 'Dinheiro'
* backend - Criado Aba para listar os Pedidos conforme seu status e um botão para mudar seu status e fazer um download da Fatura do Pedido
* frontend - Criada Aba para Pedidos Cancelados e Pedidos de Devolução na conta do usuário (Acesso somente com usuário 'user' autenticado)
* backend - Aba de Relatórios para listar e pesquisar por Data/Mês/Ano as Compras feitas


</p>
     
<hr>

<p id="erros">

## Possíveis Erros/Bugs 

* Ao criar uma categoria/sub-categoria/sub-sub-categoria ocorre algum bug com caracteres especiais (Será corrigido em breve)
</p>

