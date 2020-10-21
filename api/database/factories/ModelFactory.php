<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Domain\Galerias\Galeria;
use Domain\Itens\Item;
use Domain\Lances\Lance;
use Domain\Leiloes\Leilao;
use Domain\Pacotes\Pacote;
use Domain\Plano_Pacotes\Plano_Pacote;
use Domain\Produtos\Produto;
use Domain\Servicos\Servico;
use Domain\TiposLeiloes\TipoLeilao;
use \Domain\Usuarios\Usuario;
use \Domain\Administrador\Administrador;
use \Domain\Categorias\Categoria;
use \Domain\Cliente\Cliente;
use \Domain\Compras\Compra;
use \Domain\Forma_Pagtos\Forma_Pagto;
use \Domain\Contatos\Contato;
use \Domain\Enderecos\Endereco;
use \Domain\Especificacoes\Especificacao;
use Domain\Vendedores\Vendedor;

$factory->define(Usuario::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $type = $faker->randomElement($array = ['Domain\\Administrador\\Administrador', 'Domain\\Cliente\\Cliente']);
    $owner = factory($type)->create();
    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->username,
        'password' => bcrypt(12345678),
        'data_nascimento' => $faker->date($format = 'Y-m-d',$min = 'now'),
        'avatar' => url('/imagens/usuarios/default.jpg'),
        'remember_token' => str_random(20),
        'confirm_token' => str_random(20),
        'usuario_id' => $owner->id,
        'usuario_type' => $type
    ];
});

$factory->define(Administrador::class, function(Faker\Generator $faker){
    return [
        'funcao'=>$faker->word
    ];
});

$factory->define(Categoria::class, function (Faker\Generator $faker){
    return [
        'nome'=>$faker->word,
        'descricao'=>$faker->sentence(5)
    ];
});

$factory->define(Cliente::class, function(Faker\Generator $faker){
    return [
        'data_assinatura'=> $faker->dateTimeThisMonth($max = 'now'),
        'ip_assinatura'=> $faker->ipv4,
        'aceita'=>$faker->randomDigit([0,1])
    ];
});

$factory->define(Compra::class, function(Faker\Generator $faker){
    $forma_pagto = factory(Forma_Pagto::class)->create();
    $usuario = factory(Usuario::class)->create();
    return [
        'forma_pagto_id'=>$forma_pagto->id,
        'usuario_id'=>$usuario->id,
        'data'=>$faker->date($format = 'Y-m-d',$min = 'now'),
        'hora'=>$faker->time($format = 'H:i:s'),
        'codigo'=>$faker->randomDigit(10),
        'descricao'=>$faker->sentence(10),
        'quantidade'=>$faker->randomDigit(2,3),
        'token'=>$faker->str_random(20)
    ];
});

$factory->define(Contato::class,function(Faker\Generator $faker){
    $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));
    $usuario = factory(Usuario::class)->create();
    $tipo = $faker->randomElement($array = ['email','celular','telefone','site']);
    switch($tipo){
        case 'email':
            $descricao = $faker->safeEmail;
            break;
        case 'celular':
            $descricao = $faker->cellPhoneNumber(false);
            break;
        case 'telefone':
            $descricao = $faker->landlineNumber(false);
            break;
        case 'site':
            $descricao = $faker->domainName;
            break;
    }
    return [
        'usuario_id'=>$usuario->id,
        'tipo_contato'=>$tipo,
        'descricao'=>$descricao,
        'nome_contato'=>$faker->name,
        'observacao'=>$faker->sentence(10)
    ];
});

$factory->define(Endereco::class, function(Faker\Generator $faker){
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
    $usuario = factory(Usuario::class)->create();
    return [
        'usuario_id'=>$usuario->id,
        'endereco'=>$faker->streetName,
        'numero'=>$faker->randomDigit(1,5),
        'complemento'=>$faker->word,
        'bairro'=>$faker->cityPrefix,
        'cidade'=>$faker->city,
        'uf'=>$faker->stateAbbr,
        'cep'=>$faker->postcode
    ];
});

$factory->define(Especificacao::class, function(Faker\Generator $faker){
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $categoria = factory(Categoria::class)->create();
    return [
        'categoria_id'=>$categoria->id,
        'nome'=>$faker->name,
        'descricao'=>$faker->sentences(5)
    ];
});

$factory->define(Forma_Pagto::class, function(Faker\Generator $faker){
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    return [
        'descricao'=>$faker->randomElement(['cartão','boleto'])
    ];
});

$factory->define(Galeria::class, function(Faker\Generator $faker){
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $item = factory(Item::class)->create();
    return [
        'item_id'=>$item->id,
        'imagem'=>$faker->randomElement($array = ['https://images-americanas.b2w.io/produtos/01/00/item/122533/9/122533921_1GG.png','https://media.playstation.com/is/image/SCEA/playstation-4-slim-vertical-product-shot-01-us-07sep16?$TwoColumn_Image$','https://cdn.www.singtelshop.com/images/image/iphone-7-silver-med.jpg','https://images-americanas.b2w.io/produtos/01/00/item/129167/7/129167776SZ.jpg'])
    ];
});

$factory->define(Item::class, function(Faker\Generator $faker){
    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $type = $faker->randomElement($array = ['Domain\\Produtos\\Produto', 'Domain\\Servicos\\Servico']);
    $item = factory($type)->create();
    $usuario = factory(Usuario::class)->create();
    $categoria = factory(Categoria::class)->create();
    return [
        'item_type' => $type,
        'item_id' => $item->id,
        'usuario_id' => $usuario->id,
        'categoria_id' => $categoria->id,
        'nome' => $faker->name,
        'descricao' => $faker->sentence(5),
        'valor' => $faker->randomFloat(2,0,1000),
        'quantidade' => $faker->randomDigit(1),
        'slug'=>$faker->slug(5,true)
    ];
});

$factory->define(Lance::class, function(Faker\Generator $faker){
    $usuario = factory(Usuario::class)->create();
    $leilao  = factory(Leilao::class)->create();
    return [
        'usuario_id' => $usuario->id,
        'leilao_id' => $leilao->id,
        'hora' => $faker->date($format = 'y-m-d H:i:s', $max = 'now')
    ];
});

$factory->define(Leilao::class, function(Faker\Generator $faker){
    $tipo_leilao = factory(TipoLeilao::class)->create();
    $vendedor    = factory(Vendedor::class)->create();
    $item        = factory(Item::class)->create();
    return [
        'tipo_leilao_id' => $tipo_leilao->id,
        'vendedor_id' => $vendedor->id,
        'item_id' => $item->id,
        'data_inicio'=>$faker->dateTimeBetween($startDate = '-30 hours', $endDate = '+2 hours'),
        'data_final'=>$faker->dateTimeBetween($startDate = '-3 hours', $endDate = '+20 hours'),
        'hora_inicio'=>$faker->dateTimeBetween($startDate = '-30 hours', $endDate = '+2 hours'),
        'hora_final'=>$faker->dateTimeBetween($startDate = '-3 hours', $endDate = '+20 hours'),
        'quant_lances' => $faker->randomDigit(2,5),
        'status' => $faker->randomElement($array = ['andamento','fechado','pendente']),
        'frete' => $faker->randomElement($array = ['sim','não'])
    ];
});

$factory->define(Pacote::class, function(Faker\Generator $faker){
   $plano_pacote = factory(Plano_Pacote::class)->create();
    return [
        'plano_pacote_id' => $plano_pacote->id,
        'nome' => $faker->word,
        'descricao' => $faker->sentence(5),
        'valor' => $faker->randomFloat(2,0,5),
        'qtd_lances' => $faker->randomDigit(2,3)
    ];
});

$factory->define(Plano_Pacote::class, function(Faker\Generator $faker){
   return [
       'nome' => $faker->word,
       'descricao' => $faker->sentence(5)
   ];
});

$factory->define(Produto::class, function(Faker\Generator $faker){
    return [
        'peso' => $faker->randomFloat(3,0,10),
        'largura' => $faker->randomFloat(2,0,10),
        'altura' => $faker->randomFloat(2,0,10),
        'profundidade' => $faker->randomFloat(2,0,10),
        'cor' => $faker->word
    ];
});

$factory->define(Servico::class, function(Faker\Generator $faker){
    return [
        'carga_horaria' => $faker->randomDigit(2),
        'area_cobertura' => $faker->word(3)
    ];
});

$factory->define(TipoLeilao::class, function(Faker\Generator $faker){
    return [
        'nome'=> $faker->word,
        'tipo'=>$faker->randomElement(['tempo','surpresa']),
        'valor'=>$faker->randomDigit(5),
        'descricao'=> $faker->sentence(5)
    ];
});

$factory->define(Vendedor::class, function(Faker\Generator $faker){
    $usuario = factory(Usuario::class)->create();
    return [
        'usuario_id' => $usuario->id,
        'reputacao' => $faker->randomDigit(1)
    ];
});