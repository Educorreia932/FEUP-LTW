DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Pets;

CREATE TABLE Users (
    Username TEXT PRIMARY KEY,  
    Password TEXT,
    Name TEXT
);

CREATE TABLE Pets (
    ID PRIMARY KEY,
    Name TEXT,
    Gender INTEGER,
    Age INTEGER,
    URL TEXT
);

INSERT INTO Pets
VALUES(
    NULL,
    "Hamilton",
    1,
    1,
    "https://i.insider.com/5654150584307663008b4ed8?width=1100&format=jpeg&auto=webp"
);

INSERT INTO Pets
VALUES(
    NULL,
    "Grumpy Cat",
    1,
    1,
    "https://media.wired.com/photos/5cdefb92b86e041493d389df/1:1/w_988,h_988,c_limit/Culture-Grumpy-Cat-487386121.jpg"
);

INSERT INTO Pets
VALUES(
    NULL,
    "Maya Polar Bear",
    1,
    1,
    "https://ourfunnylittlesite.com/wp-content/uploads/2018/07/1-4.jpg"
);


INSERT INTO Pets
VALUES(
    NULL,
    "Herbee",
    1,
    1,
    "https://i2-prod.mirror.co.uk/incoming/article20090958.ece/ALTERNATES/s1227b/0_JS193011867.jpg"
);
