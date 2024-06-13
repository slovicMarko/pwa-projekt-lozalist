-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 05:35 PM
-- Server version: 8.4.0
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lozalist`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int NOT NULL,
  `ime` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `dozvola` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `username`, `password`, `dozvola`) VALUES
(15, 'admin', 'admin', 'admin', '$2y$10$17mnZBiSTHmx5CkP0YCbfehzDPB0/GX7CYbltVmy2qHMQi9kxEiZe', 1),
(16, 'test', 'test', 'test', '$2y$10$ow9EpoDqfyp7shu6YBxLU.XKU4OFwPwoRABdaiqQgvDe68Gzd1kOy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sorte`
--

CREATE TABLE `sorte` (
  `id` int NOT NULL,
  `naziv` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `kratkiOpis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `duziOpis` varchar(800) COLLATE utf8mb4_general_ci NOT NULL,
  `boja` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `slatkoca` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `slika` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `preporucenaJela` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `datumObjavljivanja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sorte`
--

INSERT INTO `sorte` (`id`, `naziv`, `kratkiOpis`, `duziOpis`, `boja`, `slatkoca`, `slika`, `preporucenaJela`, `datumObjavljivanja`) VALUES
(1, 'Malvazija Istarska', 'Aromatično bijelo vino iz Istre.', 'Malvazija Istarska je jedno od najpoznatijih vina iz Istre, s karakterističnim aromama cvijeća i voća. Ovo vino se uzgaja u Istri već stoljećima, a prvi zapisi o Malvaziji datiraju iz 14. stoljeća. Malvazija je poznata po svojoj svježini, mineralnosti i složenim aromama koje uključuju note bijelog cvijeća, breskve i marelice.', 'bijelo', 'suho', '../img/malvazija.jpeg', 'Riba, bijelo meso, lagana jela.', '2024-06-05 22:43:00'),
(2, 'Graševina', 'Najpopularnije bijelo vino u Hrvatskoj.', 'Graševina, poznata i kao Welschriesling, je najrasprostranjenija bijela sorta vina u Hrvatskoj, posebno u Slavoniji i Podunavlju. Vino je svježe, s voćnim aromama zelene jabuke, citrusa i ponekad blagim notama badema. Povijest Graševine u Hrvatskoj seže nekoliko stoljeća unatrag, a danas se koristi za proizvodnju raznih stilova vina, od laganih i svježih do kompleksnih i odležanih.', 'bijelo', 'suho', '../img/grasevina.jpg', 'Salate, riba, bijelo meso.', '2024-06-04 16:22:00'),
(3, 'Plavac Mali', 'Najpoznatija crna sorta Dalmacije.\r\n', 'Plavac Mali je najvažnija crna sorta grožđa u Dalmaciji, poznata po svojim bogatim i kompleksnim vinima. Ovo vino ima bogate arome tamnog voća poput šljive i kupine, s notama začina i često blagim tragovima dima i čokolade. Povijest Plavca Malog povezana je s drugim poznatim sortama kao što su Zinfandel i Primitivo. Vina Plavac Mali često su robusna i taninska, što ih čini idealnima za sparivanje s crvenim mesom, divljači i zrelim sirevima.', 'crno', 'suho', '../img/plavac_mali.jpg', 'Crveno meso, divljač, zreli sirevi.', '2024-06-05 11:16:00'),
(4, 'Pošip', 'Bijelo vino s otoka Korčule.', 'Pošip je autohtona sorta bijelog grožđa s otoka Korčule. Ovo vino je poznato po svojoj aromatičnosti, s notama breskve, marelice i mediteranskog bilja. Prvi put je otkriveno u divljini te je kasnije kultivirano. Pošip je prvo hrvatsko vino koje je dobilo zaštićeno geografsko porijeklo. Vino je svježe i mineralno, često s laganim notama citrusa i meda, što ga čini savršenim uz ribu, plodove mora i lagana tjesteninska jela.', 'bijelo', 'suho', '../img/posip.jpg', 'Riba, plodovi mora, lagana tjestenina.', '2024-06-03 17:24:00'),
(5, 'Teran', 'Crno vino iz Istre.', 'Teran je autohtona istarska sorta crnog grožđa poznata po svojoj intenzivnoj boji i bogatom okusu. Teran ima povijest koja seže u antičko doba, a karakteriziraju ga arome crnog bobičastog voća, začina i ponekad zemljane note. Ovo vino je poznato po visokom sadržaju tanina i izraženoj kiselosti, što mu daje dugovječnost i kompleksnost. Teran je idealan uz crveno meso, divljač i pikantna jela.', 'Crno', 'suho', '../img/teran.jpeg', 'Crveno meso, divlja', '2024-06-04 23:00:00'),
(6, 'Debit', 'Bijelo vino iz Dalmacije.', 'Debit je bijela sorta grožđa koja se uzgaja u Dalmaciji, posebno u okolici Šibenika. Ovo vino je lagano i svježe, s notama citrusa, zelene jabuke i ponekad blagim herbalnim tonovima. Povijest Debita nije toliko poznata kao kod nekih drugih sorti, ali je u posljednje vrijeme doživio ponovnu popularnost među vinogradarima i vinoljupcima. Debit je izvrsno vino za sparivanje s ribom, salatama i laganim jelima.', 'Bijelo', 'suho', '../img/1717592610_debit.jpg', 'Riba, salate, lagana jela.', '2024-06-05 17:12:00'),
(7, 'Zlatan Plavac', 'Vrhunsko crno vino s Hvara.', 'Zlatan Plavac je jedno od najprestižnijih vina proizvedenih od sorte Plavac Mali. Dolazi s južnih padina Hvara, gdje sunce i kamen daju jedinstvenu karakteristiku ovom vinu. Zlatan Plavac je poznat po svojim bogatim aromama tamnog voća, začina i blagih nota čokolade i vanilije. Ovo vino često odležava u hrastovim bačvama, što mu daje dodatnu kompleksnost i dubinu. Idealno je uz crveno meso, divljač i zrele sireve.', 'Crno', 'suho', '../img/1717593069_zlatni_plavac.jpg', 'Crveno meso, divljač, zreli sirevi.', '2024-06-05 12:37:00'),
(9, 'Maraština', 'Bijelo vino iz Dalmacije.', 'Maraština, poznata i kao Rukatac, je bijela sorta grožđa koja se uzgaja duž dalmatinske obale. Ovo vino je lagano i aromatično, s notama breskve, marelice i mediteranskog bilja. Povijest Maraštine seže u rimsko doba, a danas je omiljena zbog svoje svježine i lakoće. Vino je često polusuho, što ga čini izvrsnim za sparivanje s ribom, bijelim mesom i salatama.', 'Bijelo', 'polusuho', '../img/1718126671_marastina.jpg', 'Riba, bijelo meso, salate.', '2024-06-11 19:31:41'),
(11, 'Frankovka', 'Crno vino iz Slavonije.', 'Frankovka je popularna sorta crnog grožđa uzgajana u Slavoniji i Podunavlju. Poznata po svojim dubokim crvenim bojama i bogatim aromama, Frankovka često ima note višnje, šljive i crnog papra. Povijest Frankovke u Hrvatskoj seže do srednjeg vijeka, a danas je prepoznata po svojim složenim i taninskim vinima koja odlično prate jela od divljači, crvenog mesa i pikantna jela. Ovo vino često odležava u hrastovim bačvama, što mu daje dodatnu dubinu i složenost.', 'Crno', 'suho', '../img/1718286373_frankovka.jpg', 'Crveno meso, divljač, pikantna jela.', '2024-06-13 15:46:13'),
(26, 'Škrlet', 'Autohtono bijelo vino iz Moslavine.\r\n', 'Škrlet je autohtona sorta bijelog grožđa iz Moslavine, poznata po svojim svježim i laganim vinima. Ovo vino ima delikatne arome citrusa, zelene jabuke i cvijeća, s blagom mineralnošću. Povijest Škrleta seže u daleku prošlost, a u novije vrijeme doživljava preporod zahvaljujući predanosti lokalnih vinara. Škrlet je idealan uz lagane obroke, ribu i salate, te je izvrstan kao aperitiv.', 'Bijelo', 'suho', '../img/1718292176_skrlet.jpg', 'Lagana jela, riba, salate.', '2024-06-13 17:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int NOT NULL,
  `naziv` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `kratkiOpis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `duziOpis` varchar(800) COLLATE utf8mb4_general_ci NOT NULL,
  `datumObjave` datetime NOT NULL,
  `slika` varchar(64) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naziv`, `kratkiOpis`, `duziOpis`, `datumObjave`, `slika`) VALUES
(1, 'Vinogradarska plijesan', 'Ozbiljna bolest koja može nanijeti veliku štetu vinogradima.', 'Detaljniji opis bolesti, možete uključiti informacije poput uzroka, simptoma, posljedica i načina liječenja. Na primjer, \"Vinogradarska plijesan, poznata i kao Botrytis cinerea, je gljivična bolest koja napada listove, grozdove i plodove vinove loze. Uzrokovan gljivicom Botrytis cinerea, ova bolest se obično javlja u uvjetima visoke vlažnosti i niske ventilacije. Simptomi uključuju sivo-smeđe mrlje na lišću i plodovima, te truljenje grozdova. Neadekvatno liječenje može dovesti do velikih gubitaka uroda i kvalitete vina. Preventivne mjere uključuju primjenu fungicida i poboljšanje cirkulacije zraka u vinogradu.', '2024-06-05 16:50:58', '../img/1717599058_bolest.jpg'),
(2, 'Crna trulež grožđa', 'Gljivična bolest koja uzrokuje propadanje grožđa i može znatno smanjiti kvalitetu i količinu proizvedenog vina', 'Crna trulež grožđa uzrokovana je gljivicom Guignardia bidwellii. Gljiva napada grozdove i lišće vinove loze, stvarajući tamne mrlje koje se šire i uzrokuju trulež plodova. Simptomi uključuju crne ili smeđe mrlje na grozdovima, praćene omekšanjem i truljenjem plodova. Ova bolest obično napreduje u uvjetima visoke vlage i topline. Prevencija uključuje primjenu fungicida i održavanje vinograda suhim i dobro prozračenim', '2024-06-05 16:52:14', '../img/1717599134_crnatrulez.jpg'),
(5, 'Pepelnica', 'Gljivična bolest koja napada vinovu lozu, ostavljajući bijeli, praholiki premaz na lišću, grozdovima i izbojcima.', 'Pepelnica je uzrokovana gljivicom Erysiphe necator. Ova bolest manifestira se kao bijeli, praholiki premaz na lišću, izbojcima i grozdovima vinove loze. Napadnuti dijelovi biljke postaju osjetljivi na stres i mogu dovesti do smanjenja prinosa i kvalitete grožđa. Pepelnica se obično pojavljuje u uvjetima visoke vlage i niske ventilacije. Prevencija uključuje primjenu fungicida i održavanje vinograda suhim i dobro prozračenim.', '2024-06-05 16:53:27', '../img/1717599207_pepelnica.jpg'),
(14, 'Inovacije u Vinogradarstvu', 'Nove tehnologije i tehnike za unapređenje vinograda.', 'Vinogradarstvo se stalno razvija, a nove tehnologije i tehnike donose mnoge prednosti. U našem članku za 2024. godinu, predstavljamo vam inovacije koje će vam pomoći poboljšati efikasnost i kvalitetu proizvodnje. Od dronova za nadzor vinograda do naprednih sustava za navodnjavanje i analizu tla, saznajte kako možete iskoristiti ove alate za optimizaciju vašeg vinograda. Također, predstavljamo nove sorte vinove loze otporne na bolesti koje mogu revolucionirati vaš pristup vinogradarstvu.', '2024-06-13 15:37:55', '../img/1718285875_tehnologije.jpg'),
(15, 'Održiva Vinogradarska Praksa', 'Savjeti za ekološki održivo vinogradarstvo.', 'Održivo vinogradarstvo nije samo trend, već nužnost za budućnost poljoprivrede. U ovom članku donosimo vam ključne prakse koje će vam pomoći smanjiti ekološki otisak vašeg vinograda. Naučite kako koristiti prirodne resurse efikasnije, smanjiti upotrebu kemijskih sredstava i uvesti biodiverzitet u vaš vinograd. Predstavljamo vam konkretne primjere uspješnih održivih vinogradarskih praksi i savjete za primjenu istih u vašem vinogradu. Održivost nije samo dobra za prirodu, već može povećati i vaš prinos te kvalitetu grožđa.', '2024-06-13 15:48:20', '../img/1718286500_odrzivo.jpg'),
(18, 'Tajne Vrhunske Berbe', 'Ključni koraci za postizanje vrhunske kvalitete grožđa.', 'Berba je kruna rada svakog vinogradara, a kvaliteta grožđa u velikoj mjeri određuje kvalitetu vina. U našem detaljnom vodiču, otkrivamo vam tajne vrhunske berbe. Naučite kako odrediti pravo vrijeme za berbu, koje tehnike koristiti i kako pravilno rukovati grožđem nakon berbe. Saznajte koje su najbolje prakse za minimaliziranje oštećenja plodova i očuvanje njihove svježine i kvalitete. Uz naše savjete, vaša berba će biti uspješna, a vino izvanredno!', '2024-06-13 17:21:44', '../img/1718292104_berba.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sorte`
--
ALTER TABLE `sorte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sorte`
--
ALTER TABLE `sorte`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
