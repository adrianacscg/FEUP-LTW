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
	password TEXT NOT NULL,	
	cartaoCred TEXT,
	caminho TEXT
);


drop table if exists Moradia;
create table Moradia(
	idMoradia INTEGER PRIMARY KEY AUTOINCREMENT,
	nome TEXT,
	descricao TEXT,
	preco INTEGER,
	localizacao TEXT,
	morada TEXT,
	tipo TEXT,
	cancelamento INTEGER check (cancelamento>=0),
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
	caminho TEXT,
	idMoradia INTEGER REFERENCES Moradia(idMoradia) ON DELETE set null ON UPDATE cascade	
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
	resposta TEXT,
	rating REAL,
	idUtilizador INTEGER REFERENCES Utilizador(idUtilizador) ON DELETE set null ON UPDATE cascade,
	idMoradia INTEGER REFERENCES Moradia(idMoradia) ON DELETE set null ON UPDATE cascade,
	PRIMARY KEY (idUtilizador,idMoradia)

);

CREATE TABLE Chat (
  idMensagem INTEGER PRIMARY KEY AUTOINCREMENT,
  idRemetente INTEGER REFERENCES Utilizador(idUtilizador) ON DELETE set null ON UPDATE cascade,
  idRecetor INTEGER REFERENCES Utilizador(idUtilizador) ON DELETE set null ON UPDATE cascade,
  date INTEGER NOT NULL,
  texto TEXT
);