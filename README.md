<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Projeto ainda em desenvolvimento!

### Existe alguns erros ainda não resolvidos por enquanto, para contornar-los leia mais abaixo.

Até o momento:

* Criada duas tabelas no Banco de Dados para Users e Admins,
* Configuração do template do Dashboard para usuários 'admins',
* Configuração do template Front-end Ecommerce,
* Configuração de uma dashboard simples para os clientes cadastrados,
* Aba com CRUD para Brands,
* Aba com CRUD para Categories, 
* Aba com CRUD para Sub-Categories e Sub Sub-categories,
* Aba com CRUD para Products,
* Aba com CRUD para Sliders do Template Front-end,
* Habilitando o Multi-Language do Site, Configurando Sidenav e Navbar no Frontend, Slides e Aba de Novos Produtos,
* Configurar a Página de cada Produto + Detalhes,
* Configurar os Cards hot_deals, freatured, special_offer, special_deals,
* Criando uma rota para direcionar cara Produto para sua Página,
* Card Personalizado com uma Categoria de Produtos,
* view para as Tags de Produtos,
* view para sub-categorias e sub-sub-categorias
* select para cores e tamanhos dos produtos
* Card na view Detalhes de Produtos para Produtos Relacionados com o da Página

<hr>

### Evite alguns erros: 

// Solução 01

    - Acesse Primeiramente a Rota 

            /admin/login 
            
    - Adicione 4/5 Brands(Marcas) e 2/3 Categorias-SubCategorias-SubSubCategorias e então adicione alguns produtos 


### Motivo: 

// Solução 02

- Alguns cards estão configurados no IndexController para que mostre apenas as Categorias Filtradas, 
  caso queira acessar a Rota '127.0.0.1/8000' sem adicionar Marcas/Categorias/Produtos, faça:


        1° Acesse app/Http/Frontend/IndexController e comente:
            [
                $skip_cat = Category::skip(0)->first();
                $skip_prod = Product::where('status', 1)->where('category_id', $skip_cat->id)->inRandomOrder()->limit(10)->get();  

                $skip_cat_two = Category::skip(1)->first();
                $skip_prod_two = Product::where('status', 1)->where('category_id', $skip_cat_two->id)->inRandomOrder()->limit(10)->get();  

                $skip_bd = Brand::skip(4)->first();
                $skip_bd_prod = Product::where('status', 1)->where('brand_id', $skip_bd->id)->inRandomOrder()->limit(10)->get(); 
            ]

        -- Remova as mesmas em Compact(...)


        2° Acesse resources/views/app/index.blade.php e comente as sections:

        [
            <!-- ========= 01 SKIP CATEGORY/PRODUCTS ============ -->,
            <!-- ========= 02 SKIP CATEGORY/PRODUCTS ============ -->,
            <!-- ========= 02 SKIP BRAND/PRODUCTS ============ -->
        ]

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


<hr>

## Caso tenha algum erro com o Login e/ou Senha acima

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
        
        // Caso obtenha sucesso na gravação dos dados, retornará 'true' 
     

