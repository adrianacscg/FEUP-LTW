PRAGMA foreign_keys = ON;
.mode columns
.headers on
.nullvalue NULL


drop table if exists Indisponibilidade;
create table Indisponibilidade(
	idInd INTEGER PRIMARY KEY AUTOINCREMENT,
	dataInicio DATE,
	dataFim DATE 

);


drop table if exists Utilizador;
create table Utilizador(
	idUtilizador INTEGER PRIMARY KEY AUTOINCREMENT,
	nomeCompleto TEXT,
	email TEXT UNIQUE,
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
