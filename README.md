# Aplicação de Lista de Usuários com Laravel

Esta é uma aplicação baseada no Laravel, projetada para atender aos requisitos do teste técnico. Ela consome uma API para obter uma lista de usuários e os exibe em uma tabela paginada. Os usuários também podem ser editados e excluídos.

## Índice

- [Requisitos](#requisitos)
  - [Configuração do Laravel](#configuração-do-laravel)
  - [Divisão de Tarefas](#divisão-de-tarefas)
  - [Consumo da API](#consumo-da-api)
  - [Tabela de Usuários Paginada](#tabela-de-usuários-paginada)
  - [Implementação Técnica](#implementação-técnica)
- [Passos para Instalação](#passos-para-instalação)
- [Notas Adicionais](#notas-adicionais)
- [Conclusão](#conclusão)

## Requisitos

### Configuração do Laravel

Esta aplicação foi construída em Laravel, que deve estar instalado no seu ambiente de desenvolvimento. O ambiente está configurado para executar o Laravel corretamente.

### Divisão de Tarefas

Aqui está uma lista passo a passo das tarefas concluídas para alcançar os objetivos do projeto:

1. Instalado o Laravel e configurado o ambiente.
2. Configurado o roteamento para consumir a API.
3. Criado um controlador que consome a API e aplica lógica de paginação.
4. Criadas as visualizações para exibir os dados do usuário em uma tabela paginada.
5. Estilizada a tabela e a página usando o Bootstrap.

### Consumo da API

A aplicação utiliza o cliente HTTP do Laravel para fazer solicitações à API. A API usada é [URL da API](https://run.mocky.io/v3/ce47ee53-6531-4821-a6f6-71a188eaaee0).

### Tabela de Usuários Paginada

Os dados do usuário obtidos da API são exibidos em uma tabela paginada, mostrando 10 usuários por página. Rotas, controladores e visualizações são desenvolvidos em Laravel para alcançar isso.

### Implementação Técnica

- O Laravel é usado no backend para configurar o ambiente, criar rotas, controladores e visualizações.
- Funcionalidades do Laravel são utilizadas para fazer solicitações HTTP à API.
- Lógica de paginação é implementada para exibir os dados do usuário em grupos (10 usuários por página).
- Bootstrap é usado para estilização.

## Passos para Instalação

1. Clone o repositório
2. Execute `composer install`
3. Execute `php artisan serve`

## Notas Adicionais

- A aplicação segue as melhores práticas do Laravel em relação à estrutura do projeto, organização do código e uso de bibliotecas.
- Não foram encontradas limitações ou suposições significativas durante o desenvolvimento.

## Conclusão

Esta aplicação consome com sucesso a API e exibe os dados do usuário em uma tabela paginada, cumprindo os requisitos de avaliação para configurar o Laravel, consumir APIs e criar interfaces de usuário.


## Licença

O framework Laravel é um software de código aberto licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).
