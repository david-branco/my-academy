/*** INSERTS ***/

/** ADMIN **/
INSERT INTO Admin (password, email) 
VALUES ('1a1dc91c907325c69271ddf0c944bc72','admin@gmail.com');

/** DOCENTE **/
/*INSERT INTO Docente (nome, password, email, website, foto, contato, info_pessoal, info_academica, info_hobbies) 
VALUES ('','','','','','','','','');*/

INSERT INTO Docente (nome, password, email, website, foto, contato, info_pessoal, info_academica, info_hobbies) 
VALUES ('José Carlos Ramalho', '1a1dc91c907325c69271ddf0c944bc72', 'jcr2@di.uminho.pt', 
	'http://www.di.uminho.pt/~jcr/', '/uploads/photos/teacher/teacherphoto1.jpg', 'Phone: +351 253 604479', 
	'José Carlos Ramalho graduated in 1991 as a Systems and Informatics Engineer. During his graduation he has worked as a freelancer software developer and as a network technician for Apple. During this time he also taught several courses about computer programming for several public institutions.In 1991 he joined the Department of Informatics as an Assistent and started his MSc work. He has worked as a teacher since 1991 until the present. 
	 He also has been a researcher of Algoritmis Research Center until 2004. In 2004 he moved from Algoritmi to the newly created CCTC Research Center.He finishes his Phd in 2000 under the subject "Structured Documents Semantics". From 1996 until the present he has been researching in Structured Documents area (currently he is coordinating several projects in Digital Archives and Libraries field). He was responsible for the creation of the 
	 conference series called XATA (starting in 2003 until now). He wrote two books and many articles presented in internacional and nacional conferences.During 2008, together with two former post-graduation students he launches KEEP Solutions, a spin-off software company focusing Information Archiving, Information Management, Information Access and Information Deployment.',
	'(2000-1996) Phd: "Anotação Estrutural de Documentos e sua Semântica" at University of Minho.(1993-1991) Msc: "Um Compilador para o GLiTCH" at University of Minho.(1991-1985) Graduation: Systems and Informatics Engineering. at University of Minho.',
	'My Sax Adventure, My Sports Log, Squash, Geocaching');

INSERT INTO Docente (nome, password, email, website, foto, contato) 
VALUES ('Pedro Rangel Henriques', '1a1dc91c907325c69271ddf0c944bc72', 'prh2@di.uminho.pt', 'http://www3.di.uminho.pt/~prh/', '/uploads/photos/teacher/teacherphoto2.jpg', 'Telef: +351-253604470');



/** SUPERVISAO **/
/*INSERT INTO Supervisao (docente_id, estado, tipo, local, nome_estudante, descricao, endereco, titulo, doi, nome_coadjuvante, instituicao_coadjuvante, data_inicial, data_final) 
VALUES ('', '', '', '', '', '', '', '', '', '', '', '', '');*/

INSERT INTO Supervisao (docente_id, estado, tipo, nome_estudante, descricao, titulo, nome_coadjuvante, instituicao_coadjuvante, data_inicial) 
VALUES ('1', '1', '1', 'Luís Francisco da Cunha Cardoso de Faria', 'PDI - Programa Doutoral em Informática',
		 'Automated Watch for Digital Preservation', 'José Miguel Araújo Ferreira', 'KEEP SOLUTIONS LDA', '2011-01-01');

INSERT INTO Supervisao (docente_id, estado, tipo, local, nome_estudante, descricao, endereco, titulo, doi, data_inicial, data_final) 
VALUES ('1', '2', '1', 'Universidade do Minho', 'Ricardo Freitas', 'MAP-i', 'http://map.edu.pt/', 'Relational Databases Digital Preservation', 
		'http://hdl.handle.net/1822/25655','2009-01-01', '2013-01-01');

INSERT INTO Supervisao (docente_id, estado, tipo, local, nome_estudante, descricao, titulo, data_inicial) 
VALUES ('1', '1', '2', 'Dep. Informática - Universidade do Minho', 'João Meira', 'MI - Mestrado em Informática',
		 '???', '2012');

INSERT INTO Supervisao (docente_id, estado, tipo, local, nome_estudante, descricao, titulo, doi, data_inicial, data_final) 
VALUES ('1', '2', '2', 'Dep. Informática, Universidade do Minho', 'Luis Miguel Neiva Sá Ferros',
		 'MSDPA - Mestrado em Sistemas de Dados e Processamento Analítico', 'Extracção e Concentração de Metainformação distribuída por vários Repositórios',
		  'http://hdl.handle.net/1822/11066', '2009-01-01', '2009-01-01');

INSERT INTO Supervisao (docente_id, estado, tipo, local, nome_estudante, titulo, data_inicial, data_final) 
VALUES ('2', '2', '1', 'Dep. Informática - Universidade do Minho', 'José Carlos Ramalho', 'Anotação Estrutural de Documentos e sua Semântica', '03-07-1995', '06-01-2000');

INSERT INTO Supervisao (docente_id, estado, tipo, nome_estudante, titulo, doi, data_inicial, data_final) 
VALUES ('2', '2', '1', 'Giovani Rubert Librelotto', 'Topic maps : da sintaxe à semântica', 'http://hdl.handle.net/1822/4822', '15-06-2010', '12-03-2011');

INSERT INTO Supervisao (docente_id, estado, tipo, local, nome_estudante, descricao, titulo, data_inicial) 
VALUES ('2', '1', '1', 'Dep. Informática - Universidade do Minho', 'Tiago Pereira', 'MI - Mestrado em Informática', '???', '20-09-2010');


/** EXAME **/
/*INSERT INTO Exame (docente_id, tipo, nome_estudante, id_estudante, titulo, tese_url, instituicao, data_exame) 
VALUES ('', '', '', '', '', '', '', '', '');*/

INSERT INTO Exame (docente_id, tipo, nome_estudante, titulo, instituicao, data_exame) 
VALUES ('1', '1', 'Luís Miguel Gomes dos Santos Reis Leitão', 'Duplicate Detection in XML Databases', 'Instituto Superior Técnico da Universidade Técnica de Lisboa (IST/UTL)', '2013-07-01');
    
INSERT INTO Exame (docente_id, tipo, nome_estudante, titulo, instituicao, data_exame) 
VALUES ('1', '1', 'Ricardo Alexandre Peixoto de Queirós', 'A framework for practice-based learning applied to computer programmming', 'Faculdade de Ciências da Universidade do Porto', '2012-09-14');

INSERT INTO Exame (docente_id, tipo, nome_estudante, titulo, instituicao, data_exame) 
VALUES ('1', '2', 'Alda Renata Fangueiro Canito', 'Evaluating the Combination of Relaxation and Argumentation in Ontology Matching Negotiation', 'Instituto Superior de Engenharia do Porto (ISEP)', '2013-11-15');

INSERT INTO Exame (docente_id, tipo, nome_estudante, titulo, instituicao, data_exame) 
VALUES ('2', '1', 'Jana Jagodic', 'The Role of an ICT Change Agent in ICT Diffusion within Technology Projects in Public and Private Sector Settings', 'Doctorate of Business Administration (DBA), School of Business, University of Ballarat, Australia', '01-08-2008');

INSERT INTO Exame (docente_id, tipo, nome_estudante, titulo, instituicao, data_exame) 
VALUES ('2', '1', 'Gustavo Vasconcelos Arnold', 'Automatization of the Code Generation for Different Industrial Robots', 'Escola de Engenharia da Universidade do Minho', '06-06-2008');


/** LIVRO **/
/*INSERT INTO Livro (docente_id, autores, editores, titulo, capitulo, paginas, editora, data_data, volume, isbn, doi) 
VALUES ('', '', '', '', '', '', '', '', '', '', '');*/

INSERT INTO Livro (docente_id, autores, titulo, capitulo, paginas, editora, data_data) 
VALUES ('1', 'José Carlos Ramalho', 'EINE\'99 - II Escola de Informática da Sociedade Brasileira de Computação', 'Extensible Markup Language (XML)- A promessa e a esperança?...',
 '49-76', 'Sociedade Brasileira de Computação (SBC)', '1999-11-24');

INSERT INTO Livro (docente_id, autores, editores, titulo, capitulo, paginas, editora, data_data, volume, isbn, doi) 
VALUES ('1', 'José Carlos Ramalho, Giovani Rubert Librelotto, Pedro Rangel Henriques', 'Lutz Maicher, Jack Park', 'Lecture Notes in Computer Science',
		 'Metamorphosis - A Topic Maps Based Environment to Handle Heterogeneous Information Resources', '14-25', 'Springer-Verlag GmbH',
		  '2006-02-01', '3873 / 2006', '3-540-32527-1', '10.1007/11676904_2');

INSERT INTO Livro (docente_id, autores, editores, titulo, capitulo, paginas, editora, data_data, doi) 
VALUES ('2', 'Pedro Rangel Henriques, Ricardo Freitas, José Carlos Ramalho', 'Ricardo Queirós', 'Innovations in XML Applications and Metadata Management: Advancing Technologies', 'New Dimension in Relational Database Preservation: Using Ontologies', '160-173', 'IGI Global', '2013-06-08', '10.4018/978-1-4666-2669-0.ch009');

INSERT INTO Livro (docente_id, autores, editores, titulo, capitulo, paginas, editora, data_data, volume, isbn, doi) 
VALUES ('2', 'Pedro Rangel Henriques, José Carlos Ramalho, Giovani Rubert Librelotto', 'Lutz Maicher, Jack Park', 'Lecture Notes in Computer Science', 'Metamorphosis - A Topic Maps Based Environment to Handle Heterogeneous Information Resources', '14-25', 'Springer-Verlag GmbH', '2006-02-01', '3873 / 2006', '3-540-32527-1', '10.1007/11676904_2');


/** PROCEDIMENTO **/
/*INSERT INTO Procedimento (docente_id, autores, local, titulo, titulo_livro, data_data, urls, isbn, doi) 
VALUES ('', '', '', '', '', '', '', '', '');*/

INSERT INTO Procedimento (docente_id, autores, titulo, titulo_livro, data_data, urls) 
VALUES ('1', 'José Carlos Ramalho, Giovani Rubert Librelotto, Pedro Rangel Henriques', 'Ontology driven Websites - Metamorphosis: a framework to specify and manage ontology driven websites', 
		'Electronic Publishing 2003: From information to knowledge', '2003-06-25', 'http://www.di.uminho.pt/~jcr/XML/publicacoes/artigos/2003/epublishing-tm.pdf');

INSERT INTO Procedimento (docente_id, autores, local, titulo, titulo_livro, data_data, isbn, doi) 
VALUES ('1', 'José Carlos Ramalho, Luis Miguel Alves Domingues', 'Portalegre - Portugal','Especificação e Geração Automática de Navegadores para Redes Semânticas Baseados em Interfaces Web', 'XATA - XML: Aplicações e Tecnologias Associadas',
		 '2006-02-09', '972-99166-2-4', 'http://hdl.handle.net/1822/4576');

INSERT INTO Procedimento (docente_id, autores, local, titulo, titulo_livro, data_data, doi) 
VALUES ('2', 'Pedro Rangel Henriques, Luis Miguel Ferros, Luis Faria', 'Washington DC, Estados Unidos', 'Guidelines for legacy repository migration', 'IST Archiving 2013', '2005-02-04', 'http://hdl.handle.net/1822/23978');

INSERT INTO Procedimento (docente_id, autores, titulo, titulo_livro, data_data, urls) 
VALUES ('2', 'Pedro Rangel Henriques, José Carlos Ramalho, Giovani Rubert Librelott', 'Ontology driven Websites - Metamorphosis: a framework to specify and manage ontology driven websites', 'Electronic Publishing 2003: From information to knowledg', '2003-06-25', 'http://www.di.uminho.pt/~jcr/XML/publicacoes/artigos/2003/epublishing-tm.pdf');


/** ARTIGO **/
/*INSERT INTO Artigo (docente_id, autores, titulo, publicacao, volume, data_data, editora, issn, urls, doi) 
VALUES ('', '', '', '', '', '', '', '', '', '');*/

INSERT INTO Artigo (docente_id, autores, titulo, publicacao, data_data, editora, issn, doi) 
VALUES ('1', 'José Carlos Ramalho, Giovani Rubert Librelotto, Pedro Rangel Henriques', 'Topic maps constraint languages : understanding and comparing',
		 'International Journal of Reasoning-based Intelligent Systems', '2009-01-01', 'Inderscience', '1755-0556', 'http://hdl.handle.net/1822/9741');

INSERT INTO Artigo (docente_id, autores, titulo, publicacao, data_data, editora, issn, doi) 
VALUES ('1', 'José Carlos Ramalho, Miguel Ferreira, Ana Alice Baptista', 'An intelligent decision support system for digital preservation', 'International Journal on Digital Libraries',
		 '2007-05-01', 'Springer Berlin / Heidelberg', '1432-5012 (Print) 1432-1300 (Online)', 'http://hdl.handle.net/1822/6648');

INSERT INTO Artigo (docente_id, autores, titulo, publicacao, volume, data_data) 
VALUES ('2', 'Pedro Rangel Henriques, J. M. Fernandes, A. J. Proença', 'A Heterogeneous Computer Vision Architecture: Implementation Issues', 'Computing Systems in Engineering', '6', '1995-05-03');

INSERT INTO Artigo (docente_id, autores, titulo, publicacao, data_data, editora, issn, doi) 
VALUES ('2', 'Pedro Rangel Henriques, José Carlos Ramalho, Giovani Rubert Librelotto', 'Topic maps constraint languages : understanding and comparing', 'International Journal of Reasoning-based Intelligent Systems', '2009-01-01', 'Inderscience', '1755-0556', 'http://hdl.handle.net/1822/9741');



/** INVESTIGACAO **/
/*INSERT INTO Investigacao (docente_id, nome, periodo, descricao, sites_relacionados, publicacoes) 
VALUES ('', '', '', '', '', '');*/

INSERT INTO Investigacao (docente_id, nome, periodo, descricao, sites_relacionados) 
VALUES ('1', 'CRAV: Consulta Real em Ambiente Virtual', '2006-2007', 'The CRAV project is being developed jointly by the OPorto Archive and the University of Minho and aims at building a technological infrastructure for delivering online services to the archive\'s customers.',
 		'http://www.adporto.org/, http://www.uminho.pt/, http://www.adporto.org/, ');

INSERT INTO Investigacao (docente_id, nome, periodo, descricao, sites_relacionados) 
VALUES ('1', ' RODA: Repositório de Objectos Digitais Autênticos', '2006-2007', 'The RODA project is being developed by the National Archives Directory Board (Direcção Geral de Arquivos Nacionais/Torre do Tombo) and the University of Minho and aims at raising awareness within public administration institutions on the issues of digital preservation and implementing an environment to ensure that. From this project will result a digital repository system capable of preseverving authentic digital objects. After its conclusion the National Archives will be able to ingest digital objects (e.g. still images, relational databases, text documents) produced by associated public institutions.',
	    'http://www.iantt.pt/, http://www.uminho.pt/, http://roda.iantt.pt/');

INSERT INTO Investigacao (docente_id, nome, periodo, descricao, sites_relacionados, publicacoes) 
VALUES ('2', 'Quixote', '2010-2012', 'Desenvolvimento de modelos do domínio do problema para inter-relacionar as vistas operacional e comportamental em sistemas de software (bilateral Cooperation Project (Argentina-Portugal))', 'http://www3.di.uminho.pt/~gepl/QUIXOTE/', 'http://www3.di.uminho.pt/~gepl/QUIXOTE/FreitasJL2011thesis.pdf');

INSERT INTO Investigacao (docente_id, nome, periodo, descricao, sites_relacionados) 
VALUES ('2', 'LEPAForM', '2013', 'Languages and Environments for the pragmatic application of Formal Methods (ICCTI project)', 'http://mcs.open.ac.uk/lmb3/tsc.html');



/** COMUNICACAO **/
/*INSERT INTO Comunicacao (docente_id, tipo, autores, titulo, evento, local, data_data, url) 
VALUES ('', '', '', '', '', '', '', '');*/

INSERT INTO Comunicacao (docente_id, tipo, autores, titulo, evento, local, data_data, url) 
VALUES ('1', '1', 'José Carlos Ramalho', 'Arquivos digitais na 3ª geração da Web : uma ideia com mais de 20 anos', 'VII Encontro CTDI', 'ESEIG ,Vila do Conde, Portugal', '2013-01-01', 'http://hdl.handle.net/1822/23979');

INSERT INTO Comunicacao (docente_id, tipo, autores, titulo, evento, local, data_data) 
VALUES ('1', '2', 'José Carlos Ramalho, Miguel Ferreira', 'Sistemas de suporte à Governação Electrónica: Preservação a longo-prazo de informação digital', 'Seminário: Governação na Era Digital', ' Centro Pastoral de Amarante, Amarante, Portugal', '2008-02-27');

INSERT INTO Comunicacao (docente_id, tipo, autores, titulo, evento, local, data_data, url) 
VALUES ('2', '1', 'Pedro Rangel Henriques', 'Maratonas de Programação e outros Desafios Lúdicos (baseados em computador): o seu papel na educação', 'XIII Jornadas de Informática da UBI', 'Covilhã', '2004-03-01', 'http://www.di.uminho.pt/~prh/palUBI04.ppt');

INSERT INTO Comunicacao (docente_id, tipo, autores, titulo, evento, local, data_data, url) 
VALUES ('2', '1', 'Pedro Rangel Henriques', 'O Ciclo de Tratamento Informático das Histórias de Vida: da recolha à disponiblização a experiência do Núcleo Português do MP', '1º Simpósio Internacional "Memória, Rede e Mudança Social', 'São Paulo, Brasil', '2003-08-08', 'http://www.di.uminho.pt/~prh/palSIMRMS03.ppt');


/** EVENTO **/
/*INSERT INTO Evento (docente_id, nome, tipo_participacao, data_data, local, descricao) 
VALUES ('', '', '', '', '', '');*/

INSERT INTO Evento (docente_id, nome, tipo_participacao, data_data, local)  
VALUES ('1', 'XATA\'08 - XML: Aplicações e Tecnologias Associadas', 'Organization', '2008-01-01', 'Évora University, Évora, Portugal');

INSERT INTO Evento (docente_id, nome, tipo_participacao, data_data, local) 
VALUES ('1', 'Extreme 2007 - Extreme Markup Languages', 'PC Member and/or Reviewer', '2007-01-01', 'Montréal, Canada');

INSERT INTO Evento (docente_id, nome, tipo_participacao, data_data, local) 
VALUES ('2', 'Concurso/encontro Nacional de Programação Lógica e Funcional', 'Member of the Scientific Committee and organizer of CNPLf', '2007-07-07', 'Portugal');

INSERT INTO Evento (docente_id, nome, tipo_participacao, data_data, local) 
VALUES ('2', 'Workshop on Language Processing: OO-approaches and Parallelism', 'Program chair and organizer of WoLP', '1993-10-03', 'Braga');


/** ENSINO **/
/*INSERT INTO Ensino (docente_id, nome, periodo, instituicao, curso, nalunos, url) 
VALUES ('', '', '', '', '', '', '');*/

INSERT INTO Ensino (docente_id, nome, periodo, instituicao, curso, nalunos, url) 
VALUES ('1', 'Engenharia de Linguagens (PED)', '2013/2014', 'Universidade do Minho', 'MEI - 1º ano', '20', 'http://www3.di.uminho.pt/~jcr/AULAS/engweb2013/');

INSERT INTO Ensino (docente_id, nome, periodo, instituicao, curso, nalunos, url) 
VALUES ('1', 'Algoritmos e Paradigmas de Computação ', '2012/2013', 'Universidade do Minho', 'Mestrado em Educação e Informática - MEINF', '26', 'http://www.di.uminho.pt/~jcr/AULAS/ensprog2013');

INSERT INTO Ensino (docente_id, nome, periodo, instituicao, curso, nalunos, url) 
VALUES ('2', 'Introdução à Informática', '2003/2011', 'Universidade do Minho', 'Arqueologia, 1ºano-1ºsem', '100', 'http://www3.di.uminho.pt/~prh/curiia09.html');

INSERT INTO Ensino (docente_id, nome, periodo, instituicao, curso, nalunos, url) 
VALUES ('2', 'Paradigmas da Programação', '2010/2011', 'Universidade do Minho', 'MiECom, 2ºano-Anual', '25', 'http://www3.di.uminho.pt/~prh/curECpp09.html');


/** GESTAO **/
/*INSERT INTO Gestao (docente_id, instituicao, cargo, referente, periodo, descricao) 
VALUES ('', '', '', '', '', '');*/

INSERT INTO Gestao (docente_id, instituicao, cargo, referente, periodo) 
VALUES ('1','Universidade do Minho','Presidente','Departamento de Informática','2012/2013');

INSERT INTO Gestao (docente_id, instituicao, cargo, referente, periodo) 
VALUES ('1','Universidade do Minho','Director de Curso','Licenciatura em Ciências da Computação','2011/2012');

INSERT INTO Gestao (docente_id, instituicao, cargo, referente, periodo) 
VALUES ('2', 'Universidade do Minho', 'Reitor', 'Universidade do Minho', '2013/2014');

INSERT INTO Gestao (docente_id, instituicao, cargo, referente, periodo) 
VALUES ('2', 'Universidade do Minho', 'Director de Curso', 'Engenharia Informática', '2000/2001');