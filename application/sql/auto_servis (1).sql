-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 12. dub 2021, 13:43
-- Verze serveru: 10.4.17-MariaDB
-- Verze PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `auto_servis`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktura tabulky `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `majitel`
--

CREATE TABLE `majitel` (
  `idmajitel` int(11) NOT NULL,
  `jméno` varchar(45) DEFAULT NULL,
  `příjmení` varchar(45) DEFAULT NULL,
  `adresa` varchar(45) DEFAULT NULL,
  `telefon` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `majitel`
--

INSERT INTO `majitel` (`idmajitel`, `jméno`, `příjmení`, `adresa`, `telefon`, `email`) VALUES
(1, 'Ctibor', 'Tichopádek', 'Brumlovka 15, Praha 4', '999 999 999', 'CtiborTichopadek@seznam.cz'),
(2, 'Martin', 'Fenin', 'Náměstí míru 88, Praha 10', '777 777 777', 'MartinFenin@seznam.cz'),
(3, 'Šimon', 'Nejezchleba', 'Náplavka 48, Praha 6', '888 888 888', 'SimonNejezchleba@seznam.cz');

-- --------------------------------------------------------

--
-- Struktura tabulky `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `polozka_menu` varchar(45) DEFAULT NULL,
  `displej_nazev` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `menu`
--

INSERT INTO `menu` (`id_menu`, `polozka_menu`, `displej_nazev`) VALUES
(1, 'home', 'Domů');

-- --------------------------------------------------------

--
-- Struktura tabulky `nahradni_dily`
--

CREATE TABLE `nahradni_dily` (
  `id` int(11) NOT NULL,
  `nazev_dilu` varchar(115) DEFAULT NULL,
  `auto` varchar(75) DEFAULT NULL,
  `cena` varchar(50) DEFAULT NULL,
  `pocet_kusu_na_sklade` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `nahradni_dily`
--

INSERT INTO `nahradni_dily` (`id`, `nazev_dilu`, `auto`, `cena`, `pocet_kusu_na_sklade`) VALUES
(1, 'Klika', 'Audi', '1 000Kč', '8'),
(2, 'Brzdové destičky', 'Mercedes', '12 000Kč', '15'),
(3, 'Žhavení', 'Škoda', '1000Kč', '1');

-- --------------------------------------------------------

--
-- Struktura tabulky `nahradni_dily_has_opravy`
--

CREATE TABLE `nahradni_dily_has_opravy` (
  `nahradni_dily_idnahradni_dily` int(11) NOT NULL,
  `opravy_idopravy` int(11) NOT NULL,
  `opravy_vozidlo_idvozidlo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `opravy`
--

CREATE TABLE `opravy` (
  `id` int(11) NOT NULL,
  `datum` varchar(60) DEFAULT NULL,
  `zamestnanec` varchar(60) DEFAULT NULL,
  `popis_zavady` varchar(700) DEFAULT NULL,
  `vymenene_soucastky` varchar(350) DEFAULT NULL,
  `cas_opravy` varchar(60) DEFAULT NULL,
  `naklady_na_opravu` varchar(60) DEFAULT NULL,
  `naklady_za_cas` varchar(60) DEFAULT NULL,
  `vozidlo_idvozidlo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `opravy`
--

INSERT INTO `opravy` (`id`, `datum`, `zamestnanec`, `popis_zavady`, `vymenene_soucastky`, `cas_opravy`, `naklady_na_opravu`, `naklady_za_cas`, `vozidlo_idvozidlo`) VALUES
(1, '20.3. 2021', 'Libor Dlouhý', 'Nejde zatahovat okýnko', 'výměna kliky', '3 hodiny', '800Kč', '100Kč', 1),
(2, '15.1.2021', 'Jiří Šmicer', 'Špatné brzdy', 'výměna brzdových destiček', '2 hodina', '300Kč', '100Kč', 2),
(3, '7.3.2021', 'Karel Kročil', 'Špatné žhavení', 'výměna žhavení', '1 hodina', '250Kč', '100Kč', 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `opravy_has_zamestnanci`
--

CREATE TABLE `opravy_has_zamestnanci` (
  `opravy_idopravy` int(11) NOT NULL,
  `opravy_vozidlo_idvozidlo` int(11) NOT NULL,
  `zamestnanci_idzamestnanci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$/4vNuD.i4sPEUNmzTMrlgOwnjvMQYcEm2EBeDErql2VNAA9J0tfnm', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1618227625, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Struktura tabulky `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `vozidlo`
--

CREATE TABLE `vozidlo` (
  `id` int(11) NOT NULL,
  `reg_znacka` varchar(60) DEFAULT NULL,
  `vyrobce` varchar(60) DEFAULT NULL,
  `typ` varchar(75) DEFAULT NULL,
  `rok_vyroby` varchar(45) DEFAULT NULL,
  `barva` varchar(45) DEFAULT NULL,
  `obsah_motoru` varchar(60) DEFAULT NULL,
  `typ_prevodovky` varchar(60) DEFAULT NULL,
  `majitel_idmajitel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `vozidlo`
--

INSERT INTO `vozidlo` (`id`, `reg_znacka`, `vyrobce`, `typ`, `rok_vyroby`, `barva`, `obsah_motoru`, `typ_prevodovky`, `majitel_idmajitel`) VALUES
(1, '5MM 8888', 'Audi', 'Sedan', '2015', 'Bílá', '2,0 kubíků', 'automat', 1),
(2, '6E1 5555', 'Mercedes', 'Kombi', '2005', 'stříbrná', '2,0 kubíků', 'automat', 2),
(3, '6B2 3333', 'Škoda', 'Kombi', '2015', 'modrá', '1,6 kubíků', 'automat', 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `vozidlo_has_nahradni_dily`
--

CREATE TABLE `vozidlo_has_nahradni_dily` (
  `vozidlo_idvozidlo` int(11) NOT NULL,
  `vozidlo_majitel_idmajitel` int(11) NOT NULL,
  `nahradni_dily_idnahradni_dily` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `zakaznici`
--

CREATE TABLE `zakaznici` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(45) DEFAULT NULL,
  `prijmeni` varchar(45) DEFAULT NULL,
  `adresa` varchar(80) DEFAULT NULL,
  `telefon` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `zakaznici`
--

INSERT INTO `zakaznici` (`id`, `jmeno`, `prijmeni`, `adresa`, `telefon`, `email`) VALUES
(1, 'David', 'Trávníček', 'Brumlovka 15, Praha 4', '795 655 566', 'DavidTravnicek@seznam.cz'),
(2, 'Tomáš', 'Svěcený', 'Náměstí míru 96, Praha 5', '789 454 484', 'TomasSveceny@seznam.cz'),
(3, 'Libor', 'Podmol', 'Boršická 365, Praha 10', '185 454 545', 'PodmolLibor@seznam.cz');

-- --------------------------------------------------------

--
-- Struktura tabulky `zamestnanci`
--

CREATE TABLE `zamestnanci` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(45) DEFAULT NULL,
  `prijmeni` varchar(45) DEFAULT NULL,
  `osobni_cislo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `zamestnanci`
--

INSERT INTO `zamestnanci` (`id`, `jmeno`, `prijmeni`, `osobni_cislo`) VALUES
(1, 'Libor', 'Dlouhý', '1'),
(2, 'Jíří', 'Šmicer', '2'),
(3, 'Karel', 'Kročil', '3');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `majitel`
--
ALTER TABLE `majitel`
  ADD PRIMARY KEY (`idmajitel`);

--
-- Klíče pro tabulku `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Klíče pro tabulku `nahradni_dily`
--
ALTER TABLE `nahradni_dily`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `nahradni_dily_has_opravy`
--
ALTER TABLE `nahradni_dily_has_opravy`
  ADD PRIMARY KEY (`nahradni_dily_idnahradni_dily`,`opravy_idopravy`,`opravy_vozidlo_idvozidlo`);

--
-- Klíče pro tabulku `opravy`
--
ALTER TABLE `opravy`
  ADD PRIMARY KEY (`id`,`vozidlo_idvozidlo`);

--
-- Klíče pro tabulku `opravy_has_zamestnanci`
--
ALTER TABLE `opravy_has_zamestnanci`
  ADD PRIMARY KEY (`opravy_idopravy`,`opravy_vozidlo_idvozidlo`,`zamestnanci_idzamestnanci`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Klíče pro tabulku `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Klíče pro tabulku `vozidlo`
--
ALTER TABLE `vozidlo`
  ADD PRIMARY KEY (`id`,`majitel_idmajitel`);

--
-- Klíče pro tabulku `vozidlo_has_nahradni_dily`
--
ALTER TABLE `vozidlo_has_nahradni_dily`
  ADD PRIMARY KEY (`vozidlo_idvozidlo`,`vozidlo_majitel_idmajitel`,`nahradni_dily_idnahradni_dily`);

--
-- Klíče pro tabulku `zakaznici`
--
ALTER TABLE `zakaznici`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `zamestnanci`
--
ALTER TABLE `zamestnanci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `majitel`
--
ALTER TABLE `majitel`
  MODIFY `idmajitel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `nahradni_dily`
--
ALTER TABLE `nahradni_dily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `opravy`
--
ALTER TABLE `opravy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `vozidlo`
--
ALTER TABLE `vozidlo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `zakaznici`
--
ALTER TABLE `zakaznici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pro tabulku `zamestnanci`
--
ALTER TABLE `zamestnanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
