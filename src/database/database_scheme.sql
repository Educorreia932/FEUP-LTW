DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS AdoptionPosts;
DROP TABLE IF EXISTS Pets;
DROP TABLE IF EXISTS PetSpecies;

CREATE TABLE Users (
    Username TEXT PRIMARY KEY,  
    Password TEXT,
    Name TEXT
);

CREATE TABLE AdoptionPosts (
    ID INTEGER PRIMARY KEY,
    Title TEXT,
    Description TEXT,
    Location TEXT,
);

CREATE TABLE Pets (
    ID INTEGER PRIMARY KEY,
    Name TEXT,
    Gender INTEGER,
    Age INTEGER,
    URL TEXT,
    SpeciesID INTEGER REFERENCES PetSpecies(ID),
    AdoptionPostsID INTEGER REFERENCES AdoptionPosts(ID)
);

CREATE TABLE PetSpecies (
    ID INTEGER PRIMARY KEY,
    SpeciesName TEXT,
    Symbol TEXT
);

CREATE TABLE Comments (
    ID INTEGER PRIMARY KEY,
    Text TEXT
)

