-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 10:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE `artikli` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artikli`
--

INSERT INTO `artikli` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(96, '27.05.2021.', 'Prijatelji', 'Gledali smo najiščekivaniji TV show: ‘Prijatelji‘', 'Baš kao pravi sladunjavi dnevni show američke televizije. Kombinacija Oprah Winfrey i Ellen DeGeneres, samo što je meni iz nedokučivih razloga ovdje domaćin James Corden. Govorim o dugoočekivanom specijalu „Prijatelji: Ponovno zajedno“ (Friends: The Reunion) koji od danas možete vidjeti na HBO Go. I koliko god sam se na početku pitala pa kome je to trebalo, kraj gotovo dvosatne emisije ipak dočekate ganuti.', 'friends.jpg', 'kultura', 0),
(97, '30.05.2021.', 'U DOBI OD 79 GODINA', 'Umro mađarski animator Marcell Jankovics, jedan od autora kultne crtane serije Gustav', 'Slavni mađarski animator, scenarist i redatelj Marcell Jankovics, jedan od autora kultne crtane serije Gustav, preminuo je u subotu u dobi od 79 godina.', 'gustav.jpg', 'kultura', 0),
(98, '30.05.2021.', 'KULTURAMA', 'Trevor Noah napisao je knjigu o tome kako je bilo odrastati ni crn ni bijel u Južnoj Africi', 'Trevor Noah južnoafrički je komičar koji je 2015. godine naslijedio Johna Stewarta na mjestu voditelja The Daily Showa, popularnog večernjeg formata koji se prikazuje na Comedy Centralu. ', 'kulturama.jpg', 'kultura', 0),
(99, '30.05.2021.', 'FANOVI UŽASNUTI', 'Cruella iz ‘101 Dalmatinca‘ u novom nastavku ne smije pušiti', 'Kultni Disneyjev film \'101 Dalmatinac\' po mnogima ne bi bio to što jest bez famozne Cruelle de Vil (Glen Close), koja nikad nije viđena bez cigaršpica u ruci ili ustima.', 'cruella.jpg', 'kultura', 0),
(100, '30.05.2021.', 'VIRTUOZ IZ BIH', '‘Jedan dan, jedna noć‘: Novi hit Dine Merlina inspiriran istinitom ljubavnom pričom', 'Glazbeni čarobnjak Dino Merlin tempira objave novih pjesama na prijelazima iz mjeseca u mjesec na kojima uvijek iznova zanese svoju međunarodnu publiku.', 'dino_merlin.jpg', 'kultura', 1),
(101, '30.05.2021.', 'EKSKLUZIVNO ZA SN', 'IVAN RAKITIĆ: ‘ČEKAO SAM DALIĆEV POZIV DO KRAJA! ŽAO MI JE, ALI VIŠE NIKAD NEĆU ODJENUTI NAJLJEPŠI DRES‘', 'Jedan od najvećih hrvatskih nogometaša svih vremena ovog ljeta ima vremena za odmor više nego ikad otkako profesionalno igra nogomet. Ivan Rakitić uspješno je zaključio sezonu u Sevilli s kojom ima ugovor do 2024. godine.', 'rakitic.jpg', 'sport', 0),
(102, '30.05.2021.', 'PLAN JE JASAN', 'Wilderov menadžer uvjeren u uspjeh: ‘Fury će ovog puta biti zaustavljen‘', 'Dok su se mnogi čudili što Deontay Wilder čeka te zašto nije nastupio još od veljače prošle godine i poraza od Tysona Furyja, njegov tim i on imali su veliki plan. Od početka su vjerovali u pozitivan ishod arbitraže kojom bi on izborio pravo na treći meč protiv Furyja, odnosno Furyjevu obavezu da isti odradi i na kraju su u tome uspjeli. Unatoč tome što je Furyjev tim cijelo vrijeme tvrdio kako je tako što nemoguće.', 'Wilder_vs_Fury.jpg', 'sport', 0),
(103, '30.05.2021.', 'ZANIMLJIVO OBJAŠNJENJE', 'Bisping ne vjeruje u povratak starog McGregora: ‘To jednostavno više nije moguće‘', 'Nakon što je Dustin Poirier u siječnju ove godine upisao pobjedu nad Conorom McGregorom, počelo se postavljati pitanje ima li Irac i dalje sve što je potrebno za nastupe na najvišoj razini. Već sam opušteni pristup borbi donio je jednog drugačijeg Conora, a i sam poraz kao da mu nije teško pao.', 'connor.jpg', 'sport', 0),
(104, '30.05.2021.', '\'ON NEMA PUNO TRIKOVA\'', 'Colby Covington: Georges St-Pierre bi za mene bio vrlo laka borba', 'Iako je Georges St-Pierre već neko vrijeme u mirovini, najuspješniji borac u povijesti UFC-ove velter kategorije i dalje je česta tema. Posebno među borcima koji bi mu, da se nastavio boriti, bili potencijalni protivnici. Svatko od njih je gledao GSP-a, učio od njega te sigurno razmišljao na koji bi način pristupio međusobnoj borbi ako bi se ona dogodila. ', 'colby.jpg', 'sport', 0),
(105, '30.05.2021.', 'DO SADA JE BIO MIRAN', 'Adesanya prekinuo šutnju i uputio prvu provokaciju Vettoriju, svoju verziju dodao i Darren Till', 'Inače brbljavi Israel Adesanya u posljednje vrijeme ostavlja dojam kao da za dva tjedna nema novu borbu i to protiv borca koji nema problema svako malo putem medija baciti koju otvorenu strelicu. Je li razlog toga što je postao ponizniji nakon prvog poraza u karijeri? Je li Adesanya odlučio odustao od svog dosadašnjeg ophođenja?', 'adesanya.jpg', 'sport', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'T', 'T', 'tt', '$2y$10$XJNPEFjelWyOsoDBnsYF9e8S.YtMEEgQoxLvma.2zFbCEa8/8bkuW', 0),
(2, 'Tin', 'Milakovic', 'admin', '$2y$10$iVQlQn9Y5stsh1MzVX6T4eP07yhC9x3ONo23h6vkn7d5DAzf2KR/K', 1),
(3, 't', 't', 'ttt', '$2y$10$9Z1pIDJuwCsbh9/HiOXq9O3C7qgYUbYOs/a71nXzfX6ZnG/bCivWK', 0),
(4, 'a', 'b', 'ac', '$2y$10$yDV2cn25.0.gZhZkCzj1CuaQS0BqtUSmrLOyZcmhdcfksJC3BEfrC', 0),
(5, 'test', 'test', 'test', '$2y$10$xORZAT.cap0CiTzXxc4kEe6DQPabikOAoVeBWQZSru3i0NWtz5Q7C', 0),
(6, 'b', 'b', 'b', '$2y$10$1chi7blcIBMPPr/eKGMKZeetYDeINUqmDLhay5sdaCy3cC8FcwWcC', 0),
(7, 'a', 'a', 'a', '$2y$10$Dah0KdhXvNr6XCE5XAZy8.Aqw2HMqAxmAZ73Hsa8.5lB4bK.pN1/C', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikli`
--
ALTER TABLE `artikli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikli`
--
ALTER TABLE `artikli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
