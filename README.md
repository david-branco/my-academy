## My Academy: an Academic Curriculum Manager
Project developed under the discipline of Web Engineering of the Master's Degree in Informatics Engineering (University of Minho).

This project consists in the implementation of a management system for academic curricula of University Teachers.<br>
There are 3 types of entities that are characterized by different roles and functionalities: Administrator (manages the entire system), Teacher (manages the information pertaining to their curriculum) and the generic User whose only goal is to seek and consult CVs. Were also considered different categories of information that depend on the activities carried out by the Teacher, such as: teaching (e.g. type of course, publication of pedagogical material), research (e.g. orientation of postgraduate studies, participation in juries), management (e.g. direction of courses, organization of events) and extension (e.g. provision of services abroad, creation of spin-offs). 

Used Technologies: PHP, CodeIgniter, MVC, MySQL, JavaScript, JQuery, HTML, XML, CSS, Bootstrap, JSON, phpMyAdmin, NetBeans, GitHub, Trello, LaTeX, BibTeX, Texmaker, among others.

![Public Profile](https://raw.githubusercontent.com/david-branco/my-academy/master/screenshots/public_profile.png)<br>

[More Screenshots](https://github.com/david-branco/my-academy/tree/master/screenshots)<br>
[Database Model](https://raw.githubusercontent.com/david-branco/my-academy/master/BD/BD.png)

The system has among its main functionalities:
- Responsive Web interface to the various usual formats;
- Application made available using the SaaS model (Software as a Service);
- Authentication service for the users and administrators;
- Persistence of the information inserted in data repositories;
- Forms for the system information management with validation of the inserted data;
- Interface that allows the exploitation of public information by third parties (machines or humans);
- Service layer that allows its integration with third party systems (interoperability);
- Import and export information to BibTeX and PDF format;
- Navigation bar for fast and efficient access to the multiple features;
- Among other features.

The system can be used by 3 types of entities that have roles with different functionalities:
- Administrator:
    * Manage the entire system through the interface, forms and mechanisms created for that purpose;
    * All the features of the remaining users;
    * Among other options.

- Registered User:
    * CRUD of personal account;
    * CRUD of all information related to the academic curriculum;
    * Change the activities status between a Public and Private state;
    * Automatically generate and export publications to BibTeX and PDF format;
    * Automatically obtain a custom public profile;
    * All the features of a user without an account in the system;
    * Among other options.

- Unregistered User:
    * Create account in the system;
    * Search for academic curricula submitted by registered users in the system;
    * Among other options.

---

## My Academy: um Gestor de Currículos Académicos
Projecto desenvolvido no âmbito da disciplina de Engenharia Web do Mestrado em Engenharia Informática (Universidade do Minho).

Este projecto consiste na implementação de um sistema de gestão de currículos académicos de Docentes universitários. 
Existem 3 tipos de entidades que se caracterizam por terem papéis e funcionalidades distintas: Administrador (consegue gerir a totalidade do sistema), Docente (consegue gerir a informação referente ao seu currículo) e ainda o Utilizador genérico que têm somente como objectivo procurar e consultar CVs. 
Foram também consideradas diferentes categorias de informação que dependem das actividades efectuadas pelo Docente, tais como: Ensino (e.g. tipo de curso, publicação de material pedagógico), Investigação (e.g. orientação de trabalhos de pós-graduação, participação em júris), Gestão (e.g. direcção de cursos, organização de eventos) e Extensão (e.g. prestação de serviços ao exterior, criação de spin-offs). 

Tecnologias Utilizadas: PHP, CodeIgniter, MVC, MySQL, JavaScript, JQuery, HTML, XML, CSS, Bootstrap, JSON, phpMyAdmin, NetBeans, GitHub, Trello, LaTeX, BibTeX, Texmaker, entre outros.

![Perfil Público](https://raw.githubusercontent.com/david-branco/my-academy/master/screenshots/public_profile.png)<br>

[Mais Screenshots](https://github.com/david-branco/my-academy/tree/master/screenshots)<br>
[Modelo Base de Dados](https://raw.githubusercontent.com/david-branco/my-academy/master/BD/BD.png)

O sistema possui entre as suas funcionalidades principais:
- Interface Web responsive para os vários formatos usuais;
- Aplicação disponibilizada utilizando o modelo SaaS (Software as a Service);
- Serviço de autenticação para utilizadores e administradores;
- Persistência da informação em repositórios de dados;
- Formulários para gestão de informação do sistema com validação dos dados inseridos;
- Interface que permite a exploração da informação pública por terceiras partes (máquinas ou humanos);
- Camada de serviços que permite a sua integração com sistemas de terceiras partes (interoperabilidade);
- Importação e exportação de informação para formato BibTeX e PDF;
- Barra de navegação para um rápido e eficiente acesso às múltiplas funcionalidades;
- Entre outras opções.

O sistema pode ser utilizado por 3 tipos entidades que possuem papéis com funcionalidades distintas: 
- Administrador:
    * Gerir todo o sistema através do interface, formulários e mecanismos criados para o efeito;
    * Todas as opções permitidas aos restantes utilizadores;
    * Entre outras opções.

- Utilizador registado no sistema:
    * CRUD e login/logout da sua conta;
    * CRUD de toda a informação relacionada com o seu currículo académico;
    * Alterar o estado das suas actividades entre um estado Público e Privado;
    * Gerar automaticamente e exportar as suas publicações em formato BibTeX e PDF;
    * Obter automaticamente um perfil público personalizado;
    * Usufruir de todas as funcionalidades de um utilizador sem conta no sistema;
    * Entre outras opções.

- Utilizador não registado no sistema:
    * Criar conta no sistema;
    * Pesquisar por currículos académicos submetidos por utilizadores registados no sistema.
    * Entre outras opções.