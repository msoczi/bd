
-- Insert: Filmy
INSERT INTO Filmy VALUES (1, 'Zaginiona dziewczyna', 2014, 'David Fincher', 'Thriller', 149, 'W rocznicę ślubu kobieta znika bez śladu, jej mąż staje się głównym podejrzanym.');
INSERT INTO Filmy VALUES (2, 'Joe Black', 1998, 'Martin Brest', 'Melodramat', 181, 'Śmierć pod pseudonimem Joe Black zjawia się po Williama.');
INSERT INTO Filmy VALUES (3, 'Twój Vincent', 2017, 'Dorota Kobiela', 'Kryminal', 95, 'Bohaterowie obrazów Vincenta van Gogha przedstawiają historię życia artysty.');
INSERT INTO Filmy VALUES (4, 'Leon zawodowiec', 1994, 'Luc Besson', 'Kryminal', 110, 'Płatny morderca ratuje dwunastoletnią dziewczynkę.');
INSERT INTO Filmy VALUES (5, 'Koneser', 2013, 'Giuseppe Tornatore', 'Dramat', 171, 'Dziewczyna zleca wycenę spadku panu Oldmanowi, właścicielowi domu aukcyjnego.');
INSERT INTO Filmy VALUES (6, 'Gran Torino', 2008, 'Clint Eastwood', 'Dramat', 116, 'Spokój emeryta zostaje zburzony przez nowych sąsiadów, których syn chce ukraść jego auto.');
INSERT INTO Filmy VALUES (7, 'Bękarty wojny', 2009, 'Quentin Tarantino', 'Wojenny', 153, 'Oddział złożony z Amerykanów żydowskiego pochodzenia planuje zamach na Hitlera.');
INSERT INTO Filmy VALUES (8, 'Dwunastu gniewnych ludzi', 1957, 'Sidney Lumet', 'Dramat sądowy', 96, 'Dwunastu przysięgłych ma wydać wyrok w procesie o morderstwo.');
INSERT INTO Filmy VALUES (9, 'W pogoni za szczęściem', 2006, 'Gabriele Muccino', 'Dramat', 117, 'Samotny ojciec, stara się mimo przeciwności losu o posadę w biurze maklerskim.');
INSERT INTO Filmy VALUES (10, 'Nienawistna ósemka', 2015, 'Quentin Tarantino', 'Western', 187, 'Dwaj łowcy głów wplątani zostają w splot krwawych wydarzeń.');
INSERT INTO Filmy VALUES (11, 'Siedem dusz', 2008, 'Gabriele Muccino', 'Dramat', 123, 'Urzędnik podatkowy pojawia się w domach siedmiu śmiertelnie chorych dłużników.');
INSERT INTO Filmy VALUES (12, 'Dzień próby', 2001, 'Antoine Fuqua', 'Kryminal', 122, 'Młody policjant trafia pod skrzydła doświadczonego detektywa z wydziału narkotykowego.');
INSERT INTO Filmy VALUES (13, 'Gladiator', 2000, 'Ridley Scott', 'Dramat historyczny', 155, 'Generał Maximus w jednej chwili traci wszystko. Musi walczyć na arenie o przeżycie.');
INSERT INTO Filmy VALUES (14, 'Django', 2012, 'Quentin Tarantino', 'Western', 165, 'Niewolnik Django wyrusza w podróż, aby odbić żonę z rąk bezlitosnego Calvina.');
INSERT INTO Filmy VALUES (15, 'Nietykalni', 2011, 'Olivier Nakache', 'Dramat', 112, 'Sparaliżowany milioner zatrudnia do opieki byłego więźnia.');
INSERT INTO Filmy VALUES (16, 'Ojciec chrzestny', 1972, 'Francis Ford Coppola', 'Gangsterski', 175, 'Opowieść o nowojorskiej rodzinie mafijnej.');
INSERT INTO Filmy VALUES (17, 'Pianista', 2002, 'Roman Polański', 'Dramat wojenny', 150, 'Podczas wojny polski pianista, stara się przeżyć w okupowanej Warszawie.');
INSERT INTO Filmy VALUES (18, 'American Gangster', 2007, 'Ridley Scott', 'Biograficzny', 157, 'Frank Lucas buduje w Nowym Jorku ogromne narkotykowe imperium.');
INSERT INTO Filmy VALUES (19, 'Buntownik z wyboru', 1997, 'Gus Van Sant', 'Dramat', 126, 'Matematyczny geniusz zostaje oskarżony o pobicie policjanta.');
INSERT INTO Filmy VALUES (20, 'Prestiż', 2006, 'Christopher Nolan', 'Thriller', 130, 'Dwaj iluzjoniści stają się śmiertelnymi wrogami.');
INSERT INTO Filmy VALUES (21, 'Skazani na Shawshank', 1994, 'Frank Darabont', 'Dramat', 142, 'Niesłusznie skazany bankier, stara się przetrwać w więziennym świecie.');
INSERT INTO Filmy VALUES (22, 'Prawnik z Lincolna', 2011, 'Brad Furman', 'Kryminal', 118, 'Ceniony prawnik angażuje się w sprawę pobicia prostytutki.');
INSERT INTO Filmy VALUES (23, 'Szkoła dla łobuzów', 2003, 'Aisling Walsh', 'Dramat', 100, 'Do zakładu poprawczego dla chłopców przybywa nowy nauczyciel.');

-- Insert: Kasjerzy
INSERT INTO Kasjerzy VALUES (1, 775599, 'haslokasjera1');
INSERT INTO Kasjerzy VALUES (2, 975310, 'haslokasjera2');

-- Insert: Klienci
INSERT INTO Klienci VALUES (1, 123456, 'hasloklienta1');
INSERT INTO Klienci VALUES (2, 987654, 'hasloklienta2');
INSERT INTO Klienci VALUES (3, 494969, 'hasloklienta3');

-- Insert: Sale
INSERT INTO Sale VALUES (1, 60);
INSERT INTO Sale VALUES (2, 50);
INSERT INTO Sale VALUES (3, 45);

-- Insert: Seanse
INSERT INTO Seanse VALUES (1, 1, 'niedziela', '11:00', 8);
INSERT INTO Seanse VALUES (2, 1, 'niedziela', '13:00', 15);
INSERT INTO Seanse VALUES (3, 1, 'niedziela', '15:15', 5);
INSERT INTO Seanse VALUES (4, 1, 'niedziela', '18:00', 3);
INSERT INTO Seanse VALUES (5, 1, 'niedziela', '11:00', 2);
INSERT INTO Seanse VALUES (6, 1, 'poniedzialek', '15:00', 8);
INSERT INTO Seanse VALUES (7, 1, 'poniedzialek', '16:45', 6);
INSERT INTO Seanse VALUES (8, 1, 'poniedzialek', '19:00', 15);
INSERT INTO Seanse VALUES (9, 1, 'poniedzialek', '21:30', 4);
INSERT INTO Seanse VALUES (10, 1, 'wtorek', '15:00', 7);
INSERT INTO Seanse VALUES (11, 1, 'wtorek', '17:45', 9);
INSERT INTO Seanse VALUES (12, 1, 'wtorek', '20:00', 3);
INSERT INTO Seanse VALUES (13, 1, 'wtorek', '21:45', 11);
INSERT INTO Seanse VALUES (14, 1, 'sroda', '15:00', 10);
INSERT INTO Seanse VALUES (15, 1, 'sroda', '18:15', 6);
INSERT INTO Seanse VALUES (16, 1, 'sroda', '20:30', 12);
INSERT INTO Seanse VALUES (17, 1, 'czwartek', '15:00', 5);
INSERT INTO Seanse VALUES (18, 1, 'czwartek', '17:30', 11);
INSERT INTO Seanse VALUES (19, 1, 'czwartek', '19:45', 4);
INSERT INTO Seanse VALUES (20, 1, 'czwartek', '21:45', 4);
INSERT INTO Seanse VALUES (22, 1, 'piatek', '15:00', 14);
INSERT INTO Seanse VALUES (23, 1, 'piatek', '18:00', 13);
INSERT INTO Seanse VALUES (24, 1, 'piatek', '21:00', 15);
INSERT INTO Seanse VALUES (25, 1, 'sobota', '11:00', 7);
INSERT INTO Seanse VALUES (26, 1, 'sobota', '14:00', 1);
INSERT INTO Seanse VALUES (27, 1, 'sobota', '17:00', 14);
INSERT INTO Seanse VALUES (28, 1, 'sobota', '12:00', 10);

INSERT INTO Seanse VALUES (29, 2, 'niedziela', '11:00', 18);
INSERT INTO Seanse VALUES (30, 2, 'niedziela', '14:00', 11);
INSERT INTO Seanse VALUES (31, 2, 'niedziela', '16:30', 3);
INSERT INTO Seanse VALUES (32, 2, 'niedziela', '18:30', 12);
INSERT INTO Seanse VALUES (33, 2, 'niedziela', '21:00', 23);
INSERT INTO Seanse VALUES (34, 2, 'poniedzialek', '15:00', 15);
INSERT INTO Seanse VALUES (35, 2, 'poniedzialek', '17:15', 16);
INSERT INTO Seanse VALUES (36, 2, 'poniedzialek', '20:30', 17);
INSERT INTO Seanse VALUES (37, 2, 'wtorek', '15:00', 18);
INSERT INTO Seanse VALUES (38, 2, 'wtorek', '18:00', 20);
INSERT INTO Seanse VALUES (39, 2, 'wtorek', '20:30', 21);
INSERT INTO Seanse VALUES (40, 2, 'sroda', '15:00', 10);
INSERT INTO Seanse VALUES (41, 2, 'sroda', '18:15', 22);
INSERT INTO Seanse VALUES (42, 2, 'sroda', '20:30', 19);
INSERT INTO Seanse VALUES (43, 2, 'czwartek', '15:00', 10);
INSERT INTO Seanse VALUES (44, 2, 'czwartek', '18:30', 4);
INSERT INTO Seanse VALUES (45, 2, 'czwartek', '21:00', 6);
INSERT INTO Seanse VALUES (46, 2, 'piatek', '15:00', 14);
INSERT INTO Seanse VALUES (47, 2, 'piatek', '18:00', 21);
INSERT INTO Seanse VALUES (48, 2, 'piatek', '20:45', 3);
INSERT INTO Seanse VALUES (49, 2, 'sobota', '11:00', 21);
INSERT INTO Seanse VALUES (50, 2, 'sobota', '14:00', 8);
INSERT INTO Seanse VALUES (51, 2, 'sobota', '16:00', 21);
INSERT INTO Seanse VALUES (52, 2, 'sobota', '18:45', 11);
INSERT INTO Seanse VALUES (53, 2, 'sobota', '21:15', 19);

INSERT INTO Seanse VALUES (54, 3, 'niedziela', '11:00', 18);
INSERT INTO Seanse VALUES (55, 3, 'niedziela', '14:00', 11);
INSERT INTO Seanse VALUES (56, 3, 'niedziela', '16:30', 3);
INSERT INTO Seanse VALUES (57, 3, 'niedziela', '18:30', 12);
INSERT INTO Seanse VALUES (58, 3, 'niedziela', '21:00', 23);
INSERT INTO Seanse VALUES (59, 3, 'poniedzialek', '15:00', 15);
INSERT INTO Seanse VALUES (60, 3, 'poniedzialek', '17:15', 16);
INSERT INTO Seanse VALUES (61, 3, 'poniedzialek', '20:30', 17);
INSERT INTO Seanse VALUES (62, 3, 'wtorek', '15:00', 18);
INSERT INTO Seanse VALUES (63, 3, 'wtorek', '18:00', 20);
INSERT INTO Seanse VALUES (64, 3, 'wtorek', '20:30', 21);
INSERT INTO Seanse VALUES (65, 3, 'sroda', '15:00', 10);
INSERT INTO Seanse VALUES (66, 3, 'sroda', '18:15', 22);
INSERT INTO Seanse VALUES (67, 3, 'sroda', '20:30', 19);
INSERT INTO Seanse VALUES (68, 3, 'czwartek', '15:00', 10);
INSERT INTO Seanse VALUES (69, 3, 'czwartek', '18:30', 4);
INSERT INTO Seanse VALUES (70, 3, 'czwartek', '21:00', 6);
INSERT INTO Seanse VALUES (71, 3, 'piatek', '15:00', 14);
INSERT INTO Seanse VALUES (72, 3, 'piatek', '18:00', 21);
INSERT INTO Seanse VALUES (73, 3, 'piatek', '20:45', 3);
INSERT INTO Seanse VALUES (74, 3, 'sobota', '11:00', 21);
INSERT INTO Seanse VALUES (75, 3, 'sobota', '14:00', 8);
INSERT INTO Seanse VALUES (76, 3, 'sobota', '16:00', 21);
INSERT INTO Seanse VALUES (77, 3, 'sobota', '18:45', 11);
INSERT INTO Seanse VALUES (78, 3, 'sobota', '21:15', 19);

-- Insert: Rezerwacje
INSERT INTO Rezerwacje VALUES(1, 2, 1, 1, 1, TRUE);
INSERT INTO Rezerwacje VALUES(2, 1, 1, 2, 1, TRUE);
INSERT INTO Rezerwacje VALUES(3, 1, 2, 2, 2, TRUE);
INSERT INTO Rezerwacje VALUES(4, 4, 3, 1, 2, TRUE);
INSERT INTO Rezerwacje VALUES(5, 3, 16, 3, 1, TRUE);
INSERT INTO Rezerwacje VALUES(6, 3, 22, 3, 2, TRUE);
INSERT INTO Rezerwacje VALUES(7, 4, 1, 3, 1, TRUE);
INSERT INTO Rezerwacje VALUES(8, 12, 34, 1, 1, TRUE);
INSERT INTO Rezerwacje VALUES(9, 2, 48, 2, 2, TRUE);
INSERT INTO Rezerwacje VALUES(10, 1, 9, 2, NULL, FALSE);
INSERT INTO Rezerwacje VALUES(11, 1, 7, 1, NULL, FALSE);
INSERT INTO Rezerwacje VALUES(12, 3, 23, 3, NULL, FALSE);
INSERT INTO Rezerwacje VALUES(13, 4, 6, 1, NULL, FALSE);
