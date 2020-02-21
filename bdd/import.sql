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

CREATE TABLE Utilisateur
(
    idUser INT AUTO_INCREMENT NOT NULL,
    pseudo VARCHAR(64),
    cheminAvatar VARCHAR(64),
    mdp VARCHAR(64),
    ban TINYINT,
    admin TINYINT,
    PRIMARY KEY(idUser)
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
    PRIMARY KEY(idUser, idThread)
);

ALTER TABLE Commentaire
ADD CONSTRAINT Commentaire_idThread
FOREIGN KEY(idThread)
REFERENCES Thread (idThread);

ALTER TABLE UserThread
ADD CONSTRAINT UserThread_idUser
FOREIGN KEY(idUser)
REFERENCES Utilisateur(idUser);

ALTER TABLE UserThread
ADD CONSTRAINT UserThread_idThread
FOREIGN KEY(idThread)
REFERENCES Thread(idThread);

ALTER TABLE Commentaire 
ADD CONSTRAINT Commentaire_idUser
FOREIGN KEY(idUser)
REFERENCES User(idUser);

INSERT INTO Utilisateur(idUser, pseudo, cheminAvatar, mdp, ban, admin)
VALUES(1, "idram", "cheminAvatar", "motdepasse", 0, 0);

INSERT INTO Utilisateur(idUser, pseudo, cheminAvatar, mdp, ban, admin)
VALUES(2, "cortana", "cheminAv", "azerty", 0, 1);