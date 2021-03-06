    DROP DATABASE IF EXISTS MCDPPE;
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
    fermer TINYINT,
    idUser INT NOT NULL,
    PRIMARY KEY(idThread)
);

ALTER TABLE Commentaire
ADD CONSTRAINT Commentaire_idThread
FOREIGN KEY(idThread)
REFERENCES Thread(idThread);

ALTER TABLE Thread
ADD CONSTRAINT Thread_idUser
FOREIGN KEY(idUser)
REFERENCES Utilisateur(idUser);

ALTER TABLE Commentaire 
ADD CONSTRAINT Commentaire_idUser
FOREIGN KEY(idUser)
REFERENCES Utilisateur(idUser);

INSERT INTO Utilisateur(idUser, pseudo, cheminAvatar, mdp, ban, admin) VALUES
(1, "idram", "cheminAvatar", "motdepasse", 0, 0),
(2, "cortana", "cheminAvatar", "azerty", 0, 1);

INSERT INTO Thread(idThread, sujet, text, dateParution, fermer, idUser) VALUES
(1, "CoronaVirus", "Le coronavirus fbuzdiezbzufb", CURDATE(), 0, 1),
(2, "49.3", "reforme retraite dezjfezfz  gerg egr ", CURDATE(), 0, 2);

INSERT INTO Commentaire(idCommentaire, content, dateCommentaire, idUser, idThread) VALUES
(1, "Oh c la panique", CURDATE(), 1, 1),
(2, "Tout il faudrait tout oublier", CURDATE(), 2, 2);