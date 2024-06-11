-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 03:46 PM
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
  `email` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(5, 'Teran', 'Crno vino iz Istre.', 'Teran je autohtona istarska sorta crnog gro', 'Crno', 'suho', '../img/teran.jpeg', 'Crveno meso, divlja', '2024-06-04 23:00:00'),
(6, 'Debit', 'Bijelo vino iz Dalmacije.', 'Debit je bijela sorta grožđa koja se uzgaja u Dalmaciji, posebno u okolici Šibenika. Ovo vino je lagano i svježe, s notama citrusa, zelene jabuke i ponekad blagim herbalnim tonovima. Povijest Debita nije toliko poznata kao kod nekih drugih sorti, ali je u posljednje vrijeme doživio ponovnu popularnost među vinogradarima i vinoljupcima. Debit je izvrsno vino za sparivanje s ribom, salatama i laganim jelima.', 'Bijelo', 'suho', '../img/1717592610_debit.jpg', 'Riba, salate, lagana jela.', '2024-06-05 17:12:00'),
(7, 'Zlatan Plavac', 'Vrhunsko crno vino s Hvara.', 'Zlatan Plavac je jedno od najprestižnijih vina proizvedenih od sorte Plavac Mali. Dolazi s južnih padina Hvara, gdje sunce i kamen daju jedinstvenu karakteristiku ovom vinu. Zlatan Plavac je poznat po svojim bogatim aromama tamnog voća, začina i blagih nota čokolade i vanilije. Ovo vino često odležava u hrastovim bačvama, što mu daje dodatnu kompleksnost i dubinu. Idealno je uz crveno meso, divljač i zrele sireve.', 'Crno', 'suho', '../img/1717593069_zlatni_plavac.jpg', 'Crveno meso, divljač, zreli sirevi.', '2024-06-05 12:37:00');

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
(1, 'Vinogradarska plijesan', 'Vinogradarska plijesan je ozbiljna bolest koja može nanijeti veliku štetu vinogradima.', 'Detaljniji opis bolesti, možete uključiti informacije poput uzroka, simptoma, posljedica i načina liječenja. Na primjer, \"Vinogradarska plijesan, poznata i kao Botrytis cinerea, je gljivična bolest koja napada listove, grozdove i plodove vinove loze. Uzrokovan gljivicom Botrytis cinerea, ova bolest se obično javlja u uvjetima visoke vlažnosti i niske ventilacije. Simptomi uključuju sivo-smeđe mrlje na lišću i plodovima, te truljenje grozdova. Neadekvatno liječenje može dovesti do velikih gubitaka uroda i kvalitete vina. Preventivne mjere uključuju primjenu fungicida i poboljšanje cirkulacije zraka u vinogradu.', '2024-06-05 16:50:58', '../img/1717599058_bolest.jpg'),
(2, 'Crna trulež grožđa', 'Crna trulež grožđa je gljivična bolest koja uzrokuje propadanje grožđa i može znatno smanjiti kvalitetu i količinu proizvedenog vina', 'Crna trulež grožđa uzrokovana je gljivicom Guignardia bidwellii. Gljiva napada grozdove i lišće vinove loze, stvarajući tamne mrlje koje se šire i uzrokuju trulež plodova. Simptomi uključuju crne ili smeđe mrlje na grozdovima, praćene omekšanjem i truljenjem plodova. Ova bolest obično napreduje u uvjetima visoke vlage i topline. Prevencija uključuje primjenu fungicida i održavanje vinograda suhim i dobro prozračenim', '2024-06-05 16:52:14', '../img/1717599134_crnatrulez.jpg'),
(3, 'Pepelnica', 'Pepelnica je gljivična bolest koja napada vinovu lozu, ostavljajući bijeli, praholiki premaz na lišću, grozdovima i izbojcima.', 'Pepelnica je uzrokovana gljivicom Erysiphe necator. Ova bolest manifestira se kao bijeli, praholiki premaz na lišću, izbojcima i grozdovima vinove loze. Napadnuti dijelovi biljke postaju osjetljivi na stres i mogu dovesti do smanjenja prinosa i kvalitete grožđa. Pepelnica se obično pojavljuje u uvjetima visoke vlage i niske ventilacije. Prevencija uključuje primjenu fungicida i održavanje vinograda suhim i dobro prozračenim.', '2024-06-05 16:53:27', '../img/1717599207_pepelnica.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sorte`
--
ALTER TABLE `sorte`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
