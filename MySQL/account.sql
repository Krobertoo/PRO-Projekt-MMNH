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
  ('George Orwell','1903'),
  ('J.K. Rowling','1965'),
  ('H.G. Wells','1866'),
  ('William Faulkner','1897'),
  ('Leo Tolstoj','1828'),
  ('Jane Austen','1775'),
  ('Albert Camus','1913'),
  ('F. Scott Fitzgerald','1896'),
  ('Gabriel Garcia Marquez','1927'),
  ('Harper Lee','1926'),
  ('Karel Čapek','1890'),
  ('Franz Kafka','1883'),
  ('Mark Twain','1835');
INSERT INTO knihy (nazev,vydani,ISBN,autor_id,pocet_stran,zanr)
  VALUES 
  ('Krysař','1998','978-1234567890',1,'320','Román'),
  ('Vraždy na postranní koleji','2000','978-2345678901',2,'400','Krimi'),
  ('Vesmírná odysea','1968','978-3456789012',3,'350','Sci-fi'),
  ('Pán prstenů: Společenstvo prstenu','1954','978-4567890123,4,'450','Fantasy'),
  ('Záhadný písař','1950','978-5678901234,2,'280','Krimi'),
  ('1984','1949','978-6789012345',5,'328','Dystopie'),
  ('Harry Potter a Kámen mudrců','1997','978-7890123456',6,'320','Fantasy'),
  ('Válka světů','1898','978-8901234567',7,'248','Sci-fi'),
  ('Zvuk a vztek','1897','978-9012345678',8,'326','Roman'),
  ('Vojna a mír','1869','978-0123456789',9,'1225','Roman').
  ('Pýcha a předsudek','1813','978-1234567890',10,'432','Roman'),
  ('Cizinec','1942','978-2345678901',11,'123','Existencialismus'),
  ('Velký Gatsby','1925','978-3456789012',12,'218','Roman'),
  ('Sto roků samoty','1967','978-4567890123',13,'417','Magický realismus'),
  ('To Kill a Mockingbird','1960','978-5678901234',14,'281','Roman'),
  ('R.U.R.','1920','978-6789012345',15,'143','Sci-fi'),
  ('Proměna','1915','978-7890123456',16,'55','Existencialismus'),
  ('Láska v době cholery','1985','978-8901234567',13,'368','Magický realismus'),
  ('Dobrodružství Toma Sawyera','1876','978-9012345678',17,'220','Dobrodružný roman');
INSERT INTO ukazky (uziv_id,datum_add,knihy_id)
  VALUES ();
INSERT INTO uzivatel (jmeno,prezdivka,narozeni)
  VALUES ()
