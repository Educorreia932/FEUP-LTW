
sqlite3 src/database/pets.db < src/database/database_scheme.sql
sqlite3 src/database/pets.db < src/database/populate_database.sql
 
cd src & php -S localhost:8000