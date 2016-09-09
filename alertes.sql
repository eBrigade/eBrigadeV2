-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 09 Septembre 2016 à 15:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ebrigadev2`
--

-- --------------------------------------------------------

--
-- Structure de la table `alertes`
--

CREATE TABLE IF NOT EXISTS `alertes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipe` varchar(255) NOT NULL,
  `list` longtext NOT NULL,
  `message` longtext NOT NULL,
  `success` tinyint(4) NOT NULL DEFAULT '0',
  `liste` tinyint(4) NOT NULL,
  `date_envoi` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `alertes`
--

INSERT INTO `alertes` (`id`, `equipe`, `list`, `message`, `success`, `liste`, `date_envoi`) VALUES
(8, 'PC Secours', '33646251172\r\n0687505196', '', 0, 1, '0000-00-00 00:00:00'),
(14, 'Concurrents du 200 km', '33646457071\r\n33675663362\r\n33628501216\r\n33678844695\r\n33672572832\r\n33777256753\r\n33664781552\r\n33658541378\r\n33658020126\r\n33664109133\r\n33618666768\r\n33632220474\r\n32498469123\r\n33695974351\r\n33607097373\r\n32498821009\r\n32474789229\r\n33636156588\r\n33648701696\r\n33607243105\r\n33622179819\r\n33617183806\r\n33623381861\r\n33682036687\r\n33640152468\r\n33785234889\r\n33651630471\r\n41796113602\r\n32494987313\r\n33613867572\r\n33615084339\r\n33652978313\r\n33669938735\r\n33684814185\r\n33686824623\r\n33651918962\r\n33608019798\r\n33614388308\r\n33640934023\r\n33672447916\r\n33634074508\r\n32474920824\r\n41796881234\r\n33688915209\r\n32488573077\r\n33688770855\r\n33623158646\r\n32498884620\r\n33622511124\r\n33622107519\r\n33608564335\r\n33681179103\r\n33783933460\r\n33783957874\r\n33674537138\r\n33698601169\r\n33652754848\r\n33611246488\r\n33601740866\r\n33616790854\r\n33688077161\r\n33609927871\r\n33601977033\r\n33675479315\r\n33646199429\r\n33622941256\r\n33659589574\r\n33660546396\r\n33669469763\r\n33626778154\r\n33674408750\r\n33650876993\r\n33615873130\r\n33684486776\r\n33638335300\r\n33676866310\r\n33783786763\r\n4917647258485\r\n32472388786\r\n33658470361\r\n32496673357\r\n33622047361\r\n33687295574\r\n33648707884\r\n33681673335\r\n33662530750\r\n33617160728\r\n33777988021\r\n33678641860\r\n33770908567\r\n33624561825\r\n33638668700\r\n33658523629\r\n33682697823\r\n33635546553\r\n33607398659\r\n33640148008\r\n33647469371\r\n33640915384\r\n33680241363\r\n33621710929\r\n33684619829\r\n33615629955\r\n33682336637\r\n33672693865\r\n33695346087\r\n33667050482\r\n33651663256\r\n33612960057\r\n33685527033\r\n33682867507\r\n33634092071\r\n33781224325\r\n33671716603\r\n33663266646\r\n33682848988\r\n33675785798\r\n33678929192\r\n33619437941\r\n33617610811\r\n33616702201\r\n33689895540\r\n33612813121\r\n33633925466\r\n33613761566\r\n33682777387\r\n33633566632\r\n33634556908\r\n32478566927\r\n33685204664\r\n33684114088\r\n33682149259\r\n33620505083\r\n33627351293\r\n32492912904\r\n33618464880\r\n33608937869\r\n33630707137\r\n33611938795\r\n33608732176\r\n33688060647\r\n33662181277\r\n33631190186\r\n33786291869\r\n33648911076\r\n4917635973630', '', 0, 1, '0000-00-00 00:00:00'),
(12, 'PC Secours', '33646251172\r\n0687505196\r\n', 'Test', 0, 0, '0000-00-00 00:00:00'),
(15, 'Vendredi - 12h - 00h - 4x4 - 4', '0649413621\r\n0689628326\r\n0637058830\r\n0762283567', 'Kerem\r\nSilana\r\nArthur\r\n', 0, 1, '2016-09-10 02:00:00'),
(16, 'Vendredi - 12h - 00h - Ambulance - 2', '0626660029\r\n0613825163', 'Marie-Christine											\r\nPriscillia											\r\n', 0, 1, '2016-09-10 02:00:00'),
(17, 'Equipe Ambu - vendredi - 12h - 00h + Equipe 4x4 - vendredi - 12h - 00h', '0626660029\r\n0613825163\r\n0649413621\r\n0689628326\r\n0637058830\r\n0762283567', 'Relève \r\n- Equipe ambu : Priscillia Et MC\r\n- Equipe 4x4 : Kerem (Chef), Valentin, Arthur, Silana\r\n- Mêmes consignes, Positions à venir', 1, 0, '0000-00-00 00:00:00'),
(18, 'Equipe Ambu - vendredi - 12h - 00h + Equipe 4x4 - vendredi - 12h - 00h + PC Secours + ', '0626660029\r\n0613825163\r\n0649413621\r\n0689628326\r\n0637058830\r\n0762283567\r\n33646251172\r\n0687505196', 'Bis repetita : Relève - Equipe ambu : Priscillia Et MC - Equipe 4x4 : Kerem (Chef), Valentin, Arthur, Silana - Mêmes consignes, Positions à venir ', 1, 0, '0000-00-00 00:00:00'),
(19, 'Equipe Ambu - vendredi - 12h - 00h + Equipe 4x4 - vendredi - 12h - 00h + PC Secours + ', '0626660029\r\n0613825163\r\n0649413621\r\n0689628326\r\n0637058830\r\n0762283567\r\n33646251172\r\n0687505196\r\n', 'Consignes - Ambu au centre de Cornimont - 4x4 Ermitage Frère Joseph', 1, 0, '0000-00-00 00:00:00'),
(20, 'Equipe Ambu - vendredi - 12h - 00h + Equipe 4x4 - vendredi - 12h - 00h + PC Secours + ', '0626660029\r\n0613825163\r\n0649413621\r\n0689628326\r\n0637058830\r\n0762283567\r\n33646251172\r\n0687505196\r\n', 'Consignes - Ambulance maintien position cornimont assure couverture jusque haut du col d''oderen - 4x4 descends à Kruth', 1, 0, '0000-00-00 00:00:00'),
(21, 'PC Secours + ', '33646251172\r\n0687505196\r\n', 'Tets', 1, 0, '0000-00-00 00:00:00'),
(24, 'Samedi - 0h - 12h - 4x4 - 4', '0675678949\r\n0628057506\r\n0687305729\r\n0620952359', 'Lucas\r\nElla\r\nAmandine\r\nNeslihan', 0, 1, '2016-09-10 14:00:00'),
(23, 'Vendredi - 19h - 22h - Fiat - 2', '0620290319\r\n0628602876', 'Christelle			\r\nMargaux		\r\n', 0, 1, '2016-09-09 23:30:00'),
(25, 'Samedi - 0h - 12h - Ambulance - 2', '0643165003\r\n0663695680', 'Reynald\r\nLéo', 0, 1, '2016-09-10 14:00:00'),
(26, 'Samedi - 12h - 0h - Equipe 4x4', '0640120364\r\n0643896941\r\n0667087872\r\n0762283567', 'Cyprien\r\nClémence\r\nJordan\r\nValentin', 0, 1, '2016-09-11 02:00:00'),
(27, 'Dimanche - 0h - 12h - 4x4 - 2', '0675678949\r\n0663695680', 'Lucas\r\nLéo', 0, 1, '0000-00-00 00:00:00'),
(28, 'Vendredi - 12h - 00h - Ambulance - 2 + Vendredi - 12h - 00h - 4x4 - 4 + PC Secours + ', '0626660029\r\n0613825163\r\n0649413621\r\n0689628326\r\n0637058830\r\n0762283567\r\n33646251172\r\n0687505196', 'Consignes : Ambu va à Frère Joseph - 4x4 reste à Kruth pendant 20 min (attention 1er au Markstein)', 1, 0, '2016-09-09 13:09:00'),
(29, 'Dimanche - 13h - 17h - Ambu - 4', '0762283567\r\n0658939353\r\n0675532616\r\n0620952359', 'Valentin\r\nThibault\r\nPhilippe\r\nNeslihan', 0, 1, '2016-09-11 18:00:00'),
(30, 'Samedi - 8h - 19h - Ambulance - 4', '0675532616\r\n0689628326\r\n0637414323\r\n0786096071', 'Philippe\r\nSilana\r\nJean-Michel\r\nAude\r\n', 0, 1, '2016-09-10 22:00:00'),
(31, 'Dimanche - 8h - 13h - Ambu - 4', '0602652130\r\n0675532616\r\n0689628326\r\n0628602876', 'Dominique\r\nPhilippe\r\nSilana\r\nMargaux\r\n', 0, 1, '2016-09-11 14:30:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
