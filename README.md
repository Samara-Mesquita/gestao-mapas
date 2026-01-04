# 🗺️ Mapa Interativo

Projeto web para criação e gerenciamento de mapas personalizados com pontos geográficos, permitindo interação visual entre frontend e backend de forma simples e intuitiva.

---

## 📌 Descrição do Projeto

O **Mapa Interativo** permite que usuários criem mapas, adicionem pontos geográficos através de cliques no mapa e gerenciem esses pontos de forma dinâmica. Cada mapa possui sua própria lista de pontos, exibidos tanto visualmente no mapa quanto em uma lista auxiliar.

O projeto foi desenvolvido com foco em:
- Integração entre frontend e backend  
- Persistência de dados em banco de dados  
- Usabilidade e interação com mapas  
- Organização e clareza de código  

---

## 🚀 Funcionalidades

### 📍 Tela 1 – Listagem de Mapas
- Listagem de todos os mapas cadastrados
- Exibição do nome do mapa
- Quantidade de pontos cadastrados por mapa
- Criação de novos mapas
- Acesso a mapas existentes

### 🗺️ Tela 2 – Detalhe do Mapa (Cadastro de Pontos)
- Mapa interativo
- Lista de pontos cadastrados
- Indicador do total de pontos do mapa
- Adição de novos pontos ao clicar no mapa
- Modal de cadastro com:
  - Nome do ponto
  - Latitude e longitude preenchidas automaticamente
- Exibição dos pontos no mapa e na lista
- Edição do nome do ponto
- Exclusão de um ponto específico
- Exclusão de todos os pontos do mapa

> ⚠️ A posição (latitude e longitude) do ponto não pode ser alterada após o cadastro.

---

## 🛠️ Tecnologias Utilizadas

### Frontend
- HTML5  
- CSS3  
- JavaScript  
- Biblioteca de mapas Leaflet

### Backend
- PHP  
- API REST

### Banco de Dados
- MySQL'

---

##  🗂️ Estrutura do projeto

mapa/
├── css/
│   ├── base.css        # Estilos globais
│   ├── index.css       # Estilos da tela de listagem de mapas
│   └── mapa.css        # Estilos da tela do mapa
│
├── js/
│   ├── base.js         # Funções utilitárias e configurações globais
│   ├── index.js        # Lógica da tela de listagem de mapas
│   └── mapa.js         # Lógica do mapa interativo
│
├── images/
│   └── favicon.png
│
├── conexao.php     # Conexão com o banco de dados
├── criar_mapa.php
├── listar_mapa.php
├── listar_ponto.php
├── editar_ponto.php
├── delete_ponto.php
├── delete_todos.php
├── index.php           # Tela inicial (listagem de mapas)
├── mapa.php            # Tela de detalhes do mapa
├── tela_mapas.html
└── README.md
