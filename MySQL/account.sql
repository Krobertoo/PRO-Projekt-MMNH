CREATE TABLE `autor` (
  `autor_id` int(11) NOT NULL,
  `jmeno` varchar(50) NOT NULL,
  `prezdivka` varchar(50),
  `narozeni` date NOT NULL
) 

CREATE TABLE `knihy` (
  `knihy_id` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `vydani` date NOT NULL,
  `ISBN` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `pocet_stran` int(11) NOT NULL,
  `zanr` varchar(50) NOT NULL,
  FOREIGN KEY (autor_id) REFERENCES autor(autor_id)
) 

CREATE TABLE `ukazky` (
  `ukazky_id` int(11) NOT NULL,
  `uziv_id` int(11) NOT NULL,
  `datum_add` date NOT NULL,
  `knihy_id` int(11) NOT NULL,
  FOREIGN KEY (uziv_id) REFERENCES uzivatel(uziv_id),
  FOREIGN KEY (knihy_id) REFERENCES knihy(knihy_id)
) 

CREATE TABLE `uzivatel` (
  `uziv_id` int(11) NOT NULL,
  `jmeno` varchar(50) NOT NULL,
  `prezdivka` varchar(50) NOT NULL,
  `narozeni` date NOT NULL
) 

ALTER TABLE `autor`
  ADD PRIMARY KEY (`autor_id`);

ALTER TABLE `knihy`
  ADD PRIMARY KEY (`knihy_id`);

ALTER TABLE `ukazky`
  ADD PRIMARY KEY (`ukazky_id`);

ALTER TABLE `uzivatel`
  ADD PRIMARY KEY (`uziv_id`);

ALTER TABLE `autor`
  MODIFY `autor_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `knihy`
  MODIFY `knihy_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ukazky`
  MODIFY `ukazky_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `uzivatel`
  MODIFY `uziv_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


INSERT INTO autor (jmeno,narozeni)
  VALUES 
  ('Viktor Dyk','1877'),
  ('Agatha Christie','1890'),
  ('Arthur C. Clarke','1917'),
  ('J.R.R. Tolkien','1892'),
  ('George Orwell','1903');
INSERT INTO knihy (nazev,vydani,ISBN,autor_id,pocet_stran,zanr)
  VALUES 
  ('Krysař','1998','978-1234567890','1','320','Román'),
  ('Vraždy na postranní koleji','2000','978-2345678901','2','400','Krimi'),
  ('Vesmírná odysea','1968','978-3456789012,'3','350','Sci-fi'),
  ('Pán prstenů: Společenstvo prstenu','1954','978-4567890123,'4','450','Fantasy'),
  ('Záhadný písař','1950','978-5678901234,'2','280','Krimi'),
  ('1984','1949','978-6789012345','5','328','Dystopie');
INSERT INTO ukazky (uziv_id,datum_add,knihy_id)
  VALUES ();
INSERT INTO uzivatel (jmeno,prezdivka,narozeni)
  VALUES ()
