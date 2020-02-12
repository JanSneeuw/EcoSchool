-- MySQL dump 10.13  Distrib 5.6.45, for Linux (x86_64)
--
-- Host: treason.store.d0m.de    Database: DB4037078
-- ------------------------------------------------------
-- Server version	5.6.42-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `requirements` text NOT NULL,
  `image` longtext NOT NULL,
  `recipe` text NOT NULL,
  `adder_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (41,'Chili Sin Carne','Een simpel chili sin carne recept, heerlijk vegetarisch.','200 gram kidneybonen uit een glazen pot\r\neen klein blikje mais\r\n250 gram kastanjechampignons, in plakjes gesneden\r\n1 rode paprika, in kleine blokjes gesneden\r\n1 groene paprika, in kleine blokjes gesneden\r\n1 rode peper, fijngesneden\r\n1 ui, grof gesneden\r\n2 teentjes knoflook, geperst\r\n 400 gram gepelde tomaten uit blik\r\nblikje tomatenpuree (140 gram)\r\nsnuf kaneel, ongeveer 1/4 van een theelepel\r\ntheelepel komijnzaad\r\nolijfolie om in te bakken','Chili.jpg','Hoe maak je deze chili sin carne?\r\n\r\neen grote pan bij voorkeur een gietijzeren pan\r\n\r\nZet de pan op het vuur en verhit hierin wat olie.\r\nBak hierin de ui en de knoflook totdat de ui glazig ziet.\r\nVoeg nu de peper toe (laat de zaadjes weg als je niet van pittig houdt) en daarna de champignons. Bak dit aan totdat de champignons bruin zijn.\r\nZet nu het vuur laag en schep de tomatenpuree samen met de komijnzaad en de kaneel er doorheen. Bak het zo’n 2 minuten op laag vuur.\r\nVoeg de stukjes paprika toe en schep het er goed doorheen.\r\nNu is het tijd om de gepelde tomaten toe te voegen. Vul daarna het blik tot 1/4 met water en voeg dit er ook aan toe. Schep alles goed door en breng het aan de kook. Als het net kookt zet je het vuur lager en laat je het voor 15 minuten rustig garen.\r\nVoeg na 15 minuten de kidneybonen en de mais toe en laat deze voor 10 minuten mee pruttelen. Je kan natuurlijk altijd deze chili langer laten pruttelen hoe langer hoe lekkerder.\r\nErg lekker met zilvervliesrijst, nacho’s en wat guacamole.',1),(44,'Pasta met broccoli','Een vegetarische pasta gemaakt met broccoli. Heerlijk en simpel.','- 150 gram pasta (ik ga zelf uit van 75 gram pasta per persoon)\r\n- 1 stronk broccoli, in roosjes\r\n150 gram kastanje champignons, fijngesneden\r\n- 1 ui, fijngesneden\r\n- 2 teentjes knoflook, fijngesneden\r\n- 70 gram tomatenpuree\r\n- 1 eetlepel Provençaalse kruiden\r\npeper naar smaak\r\n- 2 theelepels balsamicoazijn\r\nolijfolie\r\n- ter garnering parmezaanse kaas, geraspte kaas of als je het gerecht vegan wil houden edelgist vlokken','pasta_brocolli.jpg','1. Zet een pan water op het vuur voor de pasta. Kook de pasta volgens de aanwijzingen op de verpakking. Ik heb zelf rijstpasta gebruikt. En doe er altijd een snufje zout bij.\r\n\r\n2. Kook of stoom de broccoliroosjes voor zo’n 2 minuten in een andere pan.\r\n\r\n3. Zet een grote koekenpan op het vuur en doe wat olie in de pan. Fruit hierin de ui en de knoflook. Voeg daarna de champignons toe en breng op smaak met peper.\r\n\r\n4. Als de champignons gaar zijn, zet dan het vuur laag, voeg dan het blikje tomatenpuree, een scheutje water, de Provençaalse kruiden en de balsamicoazijn toe. Roer dit goed door elkaar en laat dit een paar minuutjes zachtjes pruttelen. \r\n\r\n5. Roer nu de pasta en broccoli er goed doorheen. Laat dit nog 1 minuut op laag vuur staan zodat alles goed warm is. \r\n\r\n6. Garneer met kaas of edelgist vlokken.',1),(45,'Vegetarische Tikka Masala','Een heerlijke vegetarische tikka masala met zoete aardappel.','Voor 4 - 6 personen:\r\n\r\n- 400 gram bloemkoolroosjes\r\n- 2 zoete aardappels, in blokjes\r\n- 1 rode paprika, in stukjes\r\n- 1/2 groene of rode chilipeper, zonder zaadjes en fijngehakt\r\n- 400 ml kokosmelk\r\n- 400 gram kikkererwten\r\n- 1 ui, gesnipperd\r\n- 3 tenen knoflook, fijngehakt\r\n- 2 theelepels fijngehakte gember\r\n- 4 eetlepels tomatenpuree\r\n- 2 theelepels garam masala\r\n- 2,5 theelepel kerrie\r\n- 1 theelepel paprikapoeder\r\n- Zonnebloemolie\r\n- Zout\r\n\r\nVoor erbij:\r\n- Koriander, fijngehakt\r\n- Yoghurt (eventueel kokosyoghurt)\r\n- Cashewnoten, geroosterd\r\n- Naanbrood of basmatirijst','tikka.jpg','Verwarm de oven voor op 180 graden.\r\n\r\nVerdeel de blokjes zoete aardappel, de paprika en de bloemkoolroosjes over een bakplaat. Hussel ze door elkaar met een eetlepel zonnebloemolie en een flinke snuf zout. Rooster de groenten in ongeveer 15 minuten gaar en lichtbruin.\r\n\r\nMaak ondertussen de kruidenpasta. Pureer in een keukenmachine de ui, knoflook, gember en groene chilipeper met ongeveer 2 eetlepels water tot een gladde pasta. Je kunt dit natuurlijk ook met een staafmixer doen.\r\n\r\nVerhit twee eetlepels zonnebloemolie in een wok of grote pan op medium vuur. Doe de kruiden pasta erin, samen met de garam masala, het kerriepoeder en het paprikapoeder. Bak de kruidenpasta ongeveer 4 minuten, tot ‘ie geurig is en ingedikt. Voeg dan de tomatenpuree toe, een snufje zout en 240 ml water.\r\n\r\nBreng de saus aan de kook en zet het vuur lager. Laat 10 tot 15 minuten zachtjes inkoken tot een dikke saus. Doe de geroosterde groenten erbij, samen met de kikkererwten. Voeg ook de kokosmelk toe en laat nog 5 minuten zachtjes doorkoken.\r\n\r\nServeer de vegetarische tikka masala met wat fijngehakte koriander, een lekkere klodder yoghurt en het naanbrood.',1),(46,'Spaanse aardappelomelet','Een heerlijke luchtige tortilla voor elk moment van de dag. In Spanje wordt het vaak bij het ontbijt gegeten of als Tapas.','Voor 2 personen:\r\n\r\n- 300 gram aardappelen,  geschild en in blokjes gesneden\r\n- 1 stuks uien, (fijn) gesneden\r\n- 4 stuks eieren\r\n- verse peterselie\r\n- 2 teentjes knoflook, geperst of in dunne plakjes gesneden\r\nzout en peper\r\n- olijfolie','omelet.png','Bereidingstijd: tot 45 minuten\r\n\r\nKook de aardappelblokjes vijf minuten voor.\r\n\r\nVerhit de olijfolie in een koekenpan. Bak de ui glazig en voeg dan de aardappelblokjes toe. Verwarm op een zacht vuur zo’n 5 minuten, af en toe roeren.\r\n\r\nKlop de eieren met zout en peper, een beetje peterselie en de knoflook in een kom los. Voeg het eimengsel toe in de pan. De aardappelen moeten bedekt zijn met het eimengsel, voeg eventueel meer ei toe.\r\n\r\n\r\nBak de tortilla gaar in een minuut of 10, draai dan voorzichtig om en laat nog 15 minuten garen. Voeg eventueel extra ingrediënten aan de tortilla toe.\r\n\r\n\r\nEen prima manier om van restjes af te komen! Denk aan blokjes rode paprika, fijngehakte olijven, ringetjes prei of bosui. Serveer met (volkoren) stokbrood, aioli en een groene salade.\r\n\r\n\r\nTip: als je dit gerecht voor meer dan 2 personen maakt, gebruik dan meerdere koekenpannen. De aardappelomelet wordt dan beter gaar.',1);
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_answers`
--

DROP TABLE IF EXISTS `user_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_answers` (
  `user_id` int(11) NOT NULL,
  `answer_0` int(11) NOT NULL,
  `answer_1` varchar(255) NOT NULL,
  `answer_2` tinyint(1) NOT NULL,
  `answer_3` int(11) NOT NULL,
  `answer_4` int(11) NOT NULL,
  `answer_5` int(11) NOT NULL,
  `answer_6` int(11) NOT NULL,
  `answer_7` int(11) NOT NULL,
  `answer_8` int(11) NOT NULL,
  `answer_9` int(11) NOT NULL,
  `answer_10` int(11) NOT NULL,
  `answer_11` int(11) NOT NULL,
  `answer_12` int(11) NOT NULL,
  `score` float NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_answers`
--

LOCK TABLES `user_answers` WRITE;
/*!40000 ALTER TABLE `user_answers` DISABLE KEYS */;
INSERT INTO `user_answers` VALUES (1,1,'<1000',0,0,0,0,0,0,0,10,0,0,0,8.8);
/*!40000 ALTER TABLE `user_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test','test','test','test','$2y$12$YbGK2vdQcW/EcxpufBN5ZuWswrqnRMZz0e9nhCCZ5GJoRVL9s0AEi',1),(2,'Sven','van der Zwet','jansneeuw','sven@zwet.net','$2y$12$rNjLsLkLi97H6V2Jn2wK7OXliFiPRCp7hsVfrAHKpYzcYaKaVFYZe',0),(4,'Sven','van der Zwet','admin','admin@jansneeuw.nl','$2y$12$/c7g1bT9YwwTRqOcQH28PeE.pQwkYZhoy0d7YK5JI2zgXKy68hYJS',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-12 14:14:40
