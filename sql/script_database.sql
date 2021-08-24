
DROP TRIGGER IF EXISTS trigcheck ON Klienci;
DROP TRIGGER IF EXISTS trigcheck2 ON Klienci;
DROP TRIGGER IF EXISTS trigcheck3 ON Kasjerzy;
DROP TRIGGER IF EXISTS trigcheck4 ON Kasjerzy;
DROP TABLE IF EXISTS Rezerwacje;
DROP TABLE IF EXISTS Klienci;
DROP TABLE IF EXISTS Kasjerzy;
DROP TABLE IF EXISTS Seanse;
DROP TABLE IF EXISTS Sale;
DROP TABLE IF EXISTS Filmy;

-- Table: Filmy
CREATE TABLE Filmy (
    id_filmu int  NOT NULL,
    tytul varchar(60)  NOT NULL,
    rok_prod int,
    rezyser varchar(40),
    typ varchar(25),
    czas_trwania int,
    opis text,
    PRIMARY KEY (id_filmu)
);

CREATE TABLE Kasjerzy (
    id_kasjera int  NOT NULL,
    login int  NOT NULL,
    haslo varchar(40)  NOT NULL,
    PRIMARY KEY (id_kasjera)
);

CREATE TABLE Klienci (
    id_klienta int  NOT NULL,
    login int  NOT NULL,
    haslo varchar(40)  NOT NULL,
    PRIMARY KEY (id_klienta)
);

CREATE TABLE Sale (
    nr int  NOT NULL,
    ilosc_miejsc int  NOT NULL,
    PRIMARY KEY (nr)
);

CREATE TABLE Seanse (
    id_seansu int  NOT NULL,
    sala int  NOT NULL,
    dzien varchar(15)  NOT NULL,
    godz_rozpocz time  NOT NULL,
    film int  NOT NULL,
    PRIMARY KEY (id_seansu),
    FOREIGN KEY(sala) REFERENCES Sale,
    FOREIGN KEY(film) REFERENCES Filmy
);

CREATE TABLE Rezerwacje (
    id_rezerwacji int  NOT NULL,
    liczba_miejsc int  NOT NULL,
    seans int  NOT NULL,
    klient int  NOT NULL,
    kasjer int,
    stan boolean NOT NULL,
    PRIMARY KEY (id_rezerwacji),
    FOREIGN KEY(seans) REFERENCES Seanse,
    FOREIGN KEY(klient) REFERENCES Klienci,
    FOREIGN KEY(kasjer) REFERENCES Kasjerzy
);


-- WYZWALACZE

-- Wyzwalacz sprawdzający czy haslo klienta przy rejestracji ma conajmniej 6 znakow.
create or replace function sprhaslo() returns trigger as $$
BEGIN
    IF (LENGTH(NEW.haslo) < 6) THEN
        RAISE EXCEPTION 'Haslo musi miec co najmniej 6 liter!';
    END IF;
    RETURN NEW;
END;
$$ language 'plpgsql';

create trigger trigcheck before insert or update on Klienci
    for each row
    execute procedure sprhaslo();
    

-- Wyzwalacz sprawdzający czy login klienta przy rejestracji ma dokładnie 6 znakow.
create or replace function sprlogin() returns trigger as $$
BEGIN
    IF (LENGTH(CAST(NEW.login AS TEXT)) != 6) THEN
        RAISE EXCEPTION 'Login musi skladac sie z dokladnie 6 cyfr';
    END IF;
    RETURN NEW;
END;
$$ language 'plpgsql';

create trigger trigcheck2 before insert or update on Klienci
    for each row
    execute procedure sprlogin();

    
-- Wyzwalacz sprawdzający czy login kasjera przy rejestracji ma dokładnie 6 znakow.
create trigger trigcheck3 before insert or update on Kasjerzy
    for each row
    execute procedure sprlogin();
    
    
 -- Wyzwalacz sprawdzający czy haslo klienta przy rejestracji ma conajmniej 6 znakow.
create trigger trigcheck4 before insert or update on Kasjerzy
    for each row
    execute procedure sprhaslo();
