CREATE DATABASE MCDPPE;
USE MCDPPE;

CREATE TABLE Commentaire
(
    idCommentaire INT AUTO_INCREMENT NOT NULL,
    content VARCHAR(64),
    dateCommentaire DATE,
    idUser int (11),
    idThread INT,
    PRIMARY KEY(idCommentaire)
);

CREATE TABLE User
(
    idUser INT AUTO_INCREMENT NOT NULL,
    nomUser VARCHAR(64),
    prenomUser VARCHAR(64),
    pseudoUser VARCHAR(64),
    dateNaissanceUser DATE,
    emailUser VARCHAR(64),
    cheminAvatarUser VARCHAR(64),
    mdpUser VARCHAR(64),
    ban TINYINT,
    admin TINYINT,
    PRIMARY KEY(idUser),
);

CREATE TABLE Thread 
(
    idThread INT AUTO_INCREMENT NOT NULL,
    sujet VARCHAR(64) NOT NULL,
    text TEXT NOT NULL,
    dateParution DATE,
    PRIMARY KEY(idThread)
);

CREATE TABLE UserThread /*Participer*/
(
    idUser INT NOT NULL,
    idThread INT NOT NULL,
    PRIMARY KEY(idUtilisateur, idThread)
);

ALTER TABLE Commentaire
ADD CONSTRAINT Commentaire_idThread
FOREIGN KEY(idThread)
REFERENCES Thread (idThread);

ALTER TABLE UserThread
ADD CONSTRAINT UserThread_idUser
FOREIGN KEY(idUser)
REFERENCES User(idUser);

ALTER TABLE UserThread
ADD CONSTRAINT UserThread_idThread
FOREIGN KEY(idThread)
REFERENCES Thread(idThread);

ALTER TABLE Commentaire 
ADD CONSTRAINT Commentaire_idUser
FOREIGN KEY(idUser)
REFERENCES User(idUser);