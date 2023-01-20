
CREATE TABLE User (
                id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT ,
                sub_date DATE NOT NULL,
                last_connection_date DATE NOT NULL,
                pseudo VARCHAR(64) NOT NULL,
                email VARCHAR(64) NOT NULL,
                pass VARCHAR(64) NOT NULL,
                status VARCHAR(64) NOT NULL
);


CREATE TABLE Post (
                id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT  ,
                content TEXT NOT NULL,
                header VARCHAR(180) NOT NULL,
                image VARCHAR(1024),
                userId INTEGER NOT NULL,
                create_date DATE NOT NULL,
                last_edit_date DATE NOT NULL,
                title VARCHAR(1024) NOT NULL
);


CREATE TABLE Reaction (
                id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
                postId INTEGER NOT NULL,
                userId INTEGER NOT NULL,
                reaction VARCHAR(64) NOT NULL
);


CREATE TABLE Comment (
                id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT ,
                postId INTEGER NOT NULL,
                userId INTEGER NOT NULL,
                content TEXT
);


ALTER TABLE Post ADD CONSTRAINT User_Post_fk
FOREIGN KEY (userId)
REFERENCES User (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Comment ADD CONSTRAINT User_Comment_fk
FOREIGN KEY (userId)
REFERENCES User (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Reaction ADD CONSTRAINT User_Reaction_fk
FOREIGN KEY (userId)
REFERENCES User (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Comment ADD CONSTRAINT Post_Comment_fk
FOREIGN KEY (postId)
REFERENCES Post (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Reaction ADD CONSTRAINT Post_Reaction_fk
FOREIGN KEY (postId)
REFERENCES Post (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
