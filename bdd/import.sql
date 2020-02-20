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
    idCommentaire INT,
    PRIMARY KEY(idUser),
);

CREATE TABLE Admin
(
    idAdmin INT AUTO_INCREMENT NOT NULL,
    nomAdmin VARCHAR(64),
    prenomAdmin VARCHAR(64),
    dateNaissanceAdmin DATE,
    emailAdmin VARCHAR(64),
    pseudoAdmin VARCHAR(64),
    mdpAdmin VARCHAR(64),
    cheminAvatarAdmin VARCHAR(64),
    PRIMARY KEY(idAdmin)
);

CREATE TABLE Thread 
(
    idThread INT AUTO_INCREMENT NOT NULL,
    sujet VARCHAR(64) NOT NULL,
    text TEXT NOT NULL,
    dateParution DATE,
    PRIMARY KEY(idThread)
);

CREATE TABLE AdminCommentaire /*Supprimer*/
(
    idAdmin INT NOT NULL,
    idCommentaire INT NOT NULL,
    PRIMARY KEY(idAdmin, idCommentaire)
);

CREATE TABLE AdminUser /*Ban/deban*/
(
    idAdmin INT NOT NULL,
    idUser INT NOT NULL,
    PRIMARY KEY(idAdmin, idUtilisateur)
);

CREATE TABLE AdminThread /*Ouvrir/fermer*/
(
    idAdmin INT NOT NULL,
    idThread INT NOT NULL,
    PRIMARY KEY(idAdmin, idThread)
);

CREATE TABLE UserThread /*Participer*/
(
    idUser INT NOT NULL,
    idThread INT NOT NULL,
    PRIMARY KEY(idUtilisateur, idThread)
);

ALTER TABLE User
ADD CONSTRAINT User_idCommentaire
FOREIGN KEY(idCommentaire)
REFERENCES Commentaire(idCommentaire);

ALTER TABLE Commentaire
ADD CONSTRAINT Commentaire_idThread
FOREIGN KEY(idThread)
REFERENCES Thread (idThread);

ALTER TABLE AdminCommentaire
ADD CONSTRAINT AdminCommentaire_idAdmin
FOREIGN KEY(idAdmin)
REFERENCES Admin(idAdmin);

ALTER TABLE AdminCommentaire
ADD CONSTRAINT AdminCommentaire_idCommentaire
FOREIGN KEY(idCommentaire)
REFERENCES Commentaire(idCommentaire);

ALTER TABLE AdminUser
ADD CONSTRAINT AdminUser_idAdmin
FOREIGN KEY(idAdmin)
REFERENCES Admin(idAdmin);

ALTER TABLE AdminUser
ADD CONSTRAINT AdminUser_idUser
FOREIGN KEY(idUser)
REFERENCES User(idUser);

ALTER TABLE AdminThread
ADD CONSTRAINT AdminThread_idAdmin
FOREIGN KEY(idAdmin)
REFERENCES Admin(idAdmin);

ALTER TABLE AdminThread
ADD CONSTRAINT AdminThread_idThread
FOREIGN KEY(idThread)
REFERENCES Thread(idThread);

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