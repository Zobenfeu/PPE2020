CREATE DATABASE MCDPPE;
USE MCDPPE;

CREATE TABLE Compte
(
	idCompte INT AUTO_INCREMENT NOT NULL,
	PRIMARY KEY (idCompte)
);

CREATE TABLE Message
(
	idMessage INT AUTO_INCREMENT NOT NULL,
	contenu VARCHAR (64),
	dateEnvoi DATE,
	PRIMARY KEY (idMessage)
);

CREATE TABLE Utilisateur
(
	idUtilisateur INT AUTO_INCREMENT NOT NULL,
	nom VARCHAR (64),
	prenom VARCHAR (64),
	pseudo VARCHAR (64),
	dateNaissance DATE,
	email VARCHAR (64),
	avatar VARCHAR (64),
	idUtilisateur INT,
	idDiscussion INT,
	PRIMARY KEY (idUtilisateur)
);

CREATE TABLE Administrateur
(
	idAdmin INT AUTO_INCREMENT NOT NULL,
	nom VARCHAR (64),
	prenom VARCHAR (64),
	dateNaissance DATE,
	email VARCHAR (64),
	pseudo VARCHAR (64),
	PRIMARY KEY (idAdmin)
);

CREATE TABLE Discussion
(
	idDiscussion INT AUTO_INCREMENT NOT NULL,
	sujet VARCHAR (64),
	idAdmin INT,
	idForum INT,
	PRIMARY KEY (idDiscussion)
);

CREATE TABLE Forum
(
	idForum INT AUTO_INCREMENT NOT NULL,
	nom VARCHAR (64),
	dateCreation DATE,
	PRIMARY KEY (idForum)
);

CREATE TABLE AdminMessage
(
	idAdmin INT NOT NULL,
	idMessage INT NOT NULL,
	PRIMARY KEY (idAdmin, idMessage)
);

CREATE TABLE AdminUtilisateur
(
	idAdmin INT NOT NULL,
	idUtilisateur INT NOT NULL,
	PRIMARY KEY (idAdmin, idUtilisateur)
);

CREATE TABLE UtilisateurDiscussion
(
	idUtilisateur INT NOT NULL,
	idDiscussion INT NOT NULL,
	PRIMARY KEY (idUtilisateur, idDiscussion)
);

CREATE TABLE AdminDiscussion
(
	idAdmin INT NOT NULL,
	idDiscussion INT NOT NULL,
	PRIMARY KEY (idAdmin, idDiscussion)
);

ALTER TABLE Message
ADD CONSTRAINT Message_idUtilisateur
FOREIGN KEY (idUtilisateur)
REFERENCES Utilisateur(idUtilisateur);

ALTER TABLE Discussion
ADD CONSTRAINT Discussion_idAdmin
FOREIGN KEY (idAdmin)
REFERENCES Administrateur(idAdmin);

ALTER TABLE Discussion
ADD CONSTRAINT Discussion_idForum
FOREIGN KEY (idForum)
REFERENCES Forum(idForum);

ALTER TABLE Utilisateur
ADD CONSTRAINT Utilisateur_idCompte
FOREIGN KEY (idCompte)
REFERENCES Compte(idCompte);

ALTER TABLE Message
ADD CONSTRAINT Message_idDiscussion
FOREIGN KEY (idDiscussion)
REFERENCES Discussion(idDiscussion);

































