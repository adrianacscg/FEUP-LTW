
drop table if exists Indisponibilidade;
create table Indisponibilidade(
	idInd INTEGER PRIMARY KEY AUTOINCREMENT,
	dataInicio DATE,
	dataFim DATE 

);


drop table if exists Utilizador;
create table Utilizador(
	idUtilizador INTEGER PRIMARY KEY AUTOINCREMENT,
	username TEXT UNIQUE,
	nomeCompleto TEXT,
	password TEXT UNIQUE NOT NULL,
	dataNasc DATE,
	cartaoCred TEXT,
	imagem TEXT,
	idImage INTEGER REFERENCES ImagemUtilizador(idImage) ON DELETE set null ON UPDATE cascade
);


drop table if exists Moradia;
create table Moradia(
	idMoradia INTEGER PRIMARY KEY AUTOINCREMENT,
	nome TEXT,
	preco INTEGER,
	localizacao TEXT,
	tipo TEXT,
	cancelamento INTEGER	check (cancelamento>=0),
	rating REAL check (rating>=0),
	idUtilizador INTEGER REFERENCES Utilizador(idUtilizador) ON DELETE set null ON UPDATE cascade
);


drop table if exists Reserva;
create table Reserva (
	idReserva INTEGER PRIMARY KEY AUTOINCREMENT, 
	precoTotal INTEGER,
	dataInicio DATE,
	dataFim Date,
	idMoradia INTEGER REFERENCES Moradia(idMoradia) ON DELETE set null ON UPDATE cascade,
	idUtilizador INTEGER REFERENCES Utilizador(idUtilizador) ON DELETE set null ON UPDATE cascade
);


drop table if exists ImagemMoradia;
create table ImagemMoradia (
	caminho TEXT
	idMoradia INTEGER REFERENCES Moradia(idMoradia) ON DELETE set null ON UPDATE cascade	
);


drop table if exists ImagemUtilizador;
create table ImagemUtilizador(
	idImage INTEGER PRIMARY KEY AUTOINCREMENT,
	idUtilizador INTEGER REFERENCES Utilizador(idUtilizador) ON DELETE set null ON UPDATE cascade
	
);


drop table if exists Comodidade;
create table Comodidade(
	idComodidade INTEGER PRIMARY KEY AUTOINCREMENT,
	tipo TEXT
);


drop table if exists MoradiaComodidade;
create table MoradiaComodidade(
	idMoradia INTEGER REFERENCES Moradia(idMoradia) ON DELETE set null ON UPDATE cascade,
	idComodidade INTEGER REFERENCES Comodidade(idComodidade) ON DELETE set null ON UPDATE cascade,
	PRIMARY KEY (idMoradia,idComodidade)
);


drop table if exists Calendario;
create table Calendario(
	idInd INTEGER REFERENCES Indisponibilidade(idInd) ON DELETE set null ON UPDATE cascade,
	idMoradia INTEGER REFERENCES Moradia(idMoradia) ON DELETE set null ON UPDATE cascade,
	PRIMARY KEY (idInd, idMoradia)
);


drop table if exists Critica;
create table Critica(
	
	comentario TEXT,
	rating DOUBLE,
	idUtilizador INTEGER REFERENCES Utilizador(idUtilizador) ON DELETE set null ON UPDATE cascade,
	idMoradia INTEGER REFERENCES Moradia(idMoradia) ON DELETE set null ON UPDATE cascade,
	PRIMARY KEY (idUtilizador,idMoradia)

);

INSERT INTO Calendario (
                           idInd,
                           idMoradia
                       )
                       VALUES (
                           1215,
                           455182
                       );

INSERT INTO Comodidade (
                           idComodidade,
                           tipo
                       )
                       VALUES (
                           154557,
                           'Apartamento'
                       );


INSERT INTO Critica (
                        comentario,
                        rating,
                        idUtilizador,
                        idMoradia
                    )
                    VALUES (
                        'Fantástico! 5*',
                        10.0,
                        4541604,
                        455182
                    );


INSERT INTO ImagemMoradia (
                              caminho
                          )
                          VALUES (
                              455182
                          );

INSERT INTO ImagemUtilizador (
                                 idImage,
                                 idUtilizador
                             )
                             VALUES (
                                 1521,
                                 4541604
                             );

INSERT INTO Indisponibilidade (
                                  idInd,
                                  dataInicio,
                                  dataFim
                              )
                              VALUES (
                                  1215,
                                  '2019-05-01',
                                  '2019-05-05'
                              );

INSERT INTO Moradia (
                        idMoradia,
                        nome,
                        preco,
                        localizacao,
                        tipo,
                        cancelamento,
                        rating,
                        idUtilizador
                    )
                    VALUES (
                        455182,
                        'Suite Apartment',
                        120,
                        'Lisboa',
                        'Apartamento',
                        'Sim',
                        '9,8',
                        4541604
                    );

INSERT INTO MoradiaComodidade (
                                  idMoradia,
                                  idComodidade
                              )
                              VALUES (
                                  455182,
                                  154557
                              );

INSERT INTO Reserva (
                        idReserva,
                        precoTotal,
                        dataInicio,
                        dataFim,
                        idMoradia,
                        idUtilizador
                    )
                    VALUES (
                        2019152,
                        '587,99',
                        '2019-05-01',
                        '2019-05-05',
                        455182,
                        4541604
                    );

INSERT INTO Utilizador (
                           idUtilizador,
                           username,
                           nomeCompleto,
                           password,
                           dataNasc,
                           cartaoCred,
                           imagem,
                           idImage
                       )
                       VALUES (
                           4541604,
                           'joaonunes999',
                           'João Paulo Ribeiro Nunes',
                           'joao01',
                           '1999-09-02',
                           '4714144125892589',
                           'https://bompenteados.com/wp-content/uploads/2018/04/fcf0bf8ef14804fa059853968871d654.jpeg',
                           1521
                       );
