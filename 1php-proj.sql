-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 16 mars 2023 à 21:06
-- Version du serveur : 8.0.32-0ubuntu0.22.10.2
-- Version de PHP : 8.1.7-1ubuntu3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `1php-proj`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `panier` varchar(255) DEFAULT NULL,
  `achats` varchar(255) DEFAULT NULL,
  `argent` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `type`, `code`, `panier`, `achats`, `argent`) VALUES
(1, 'admin', 'admin@admin.admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '', '6,3,26,25,24,15,15,12,13,2,4,1,5,', 150),
(2, 'user', 'user@user.user', 'user', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', ',6,8', '10,16,5,', 150),
(3, 'user1', 'user1@user1.com', 'user', '0a041b9462caa4a31bac3567e0b6e6fd9100787db2ab433d96f6d178cabfce90', NULL, NULL, 150),

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` int NOT NULL,
  `cathegorie` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `annee` year NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `realisateur` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `acteurs` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `prix` int NOT NULL,
  `spoiler` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telechargement` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `cathegorie`, `annee`, `titre`, `realisateur`, `acteurs`, `description`, `image`, `prix`, `spoiler`, `telechargement`) VALUES
(1, 'science fiction', 1974, 'Soleil vert', 'Richard Fleischer', 'Charlton Heston; Leigh Taylor-Young; Edward G. Robinson; Chuck Connors', 'En 2022, les hommes ont épuisé les ressources naturelles. Seul le soleil vert, sorte de pastille, parvient à nourrir une population miséreuse qui ne sait pas comment créer de tels aliments. Omniprésente et terriblement répressive, la police assure l\'ordre.', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSQJcQ-FngvFYcU_dFK41ZTkZnRaNuGCGUHotChejRrPWR-Da_v', 3, '0LcT6D2kqJM', 'pari'),
(2, 'action', 2008, 'Wall-E', 'Andrew Stanton', 'WALL-E; EVE', 'Wall E, un petit robot, est le dernier être sur Terre ! 700 ans plus tôt, l\'humanité a déserté notre planète en lui laissant le soin de nettoyer la Terre. Mais Wall E a développé un petit défaut technique : une forte personnalité ! Curieux et indiscret, il est surtout très seul. Sa vie va être bouleversée avec l\'arrivée d\'Eve, une petite robote. Wall E va tout mettre en uvre pour la séduire.', 'https://images-na.ssl-images-amazon.com/images/S/pv-target-images/4c8b6c0f9b929fa057f14048c20ffb2047ed3a55761de22b21d9f4ac3eff1d92._RI_V_TTW_.jpg', 4, 'twS3hYLmQI4', 'dumb'),
(3, 'action', 2008, 'Kung Fu Panda', 'John Stevenson', 'Jack Black; Dustin Hoffman; Angelina Jolie; Ian McShane; Jackie Chan', 'Passionné, costaud et quelque peu maladroit, Po est sans conteste le plus grand fan de kung fu. Serveur dans le restaurant de nouilles de son père, son habileté reste encore à prouver. Elu pour accomplir une ancienne prophétie, Po rejoint le monde du kung fu afin d\'apprendre les arts martiaux auprès de ses idoles, les légendaires `Cinq Cyclones\' : Tigresse, Grue, Mante, Vipère et Singe, sous les ordres de leur professeur et entraîneur, maître Shifu.', 'https://fr.web.img4.acsta.net/medias/nmedia/18/36/20/29/18944269.jpg', 5, 'yt9r0Q5za38', 'magie'),
(4, 'romance', 1997, 'Titanic', 'James Cameron', 'Leonardo DiCaprio; Kate Winslet', 'En 1997, l\'épave du Titanic est l\'objet d\'une exploration fiévreuse, menée par des chercheurs de trésor en quête d\'un diamant bleu qui se trouvait à bord. Frappée par un reportage télévisé, l\'une des rescapées du naufrage, âgée de 102 ans, Rose DeWitt, se rend sur place et évoque ses souvenirs. 1912.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgA13CwSXM1k2yx2WGeLVXksg03vzvSrRpr5ZvXrZRX2d6NPlb', 9, 'Quf4qIkD3KY', 'lapinx'),
(5, 'action', 2020, 'Artemis Fowl', 'Kenneth Branagh', 'Ferdia Shaw; Colin Farrell; Josh Gad; Judi Dench', 'À la suite de la mystérieuse disparition de son père, Artemis Fowl, 12 ans, découvre un journal qui l\'amène à croire que les histoires que lui racontait son paternel sur les fées et les nains sont réelles.', 'https://fr.web.img2.acsta.net/pictures/20/04/17/15/29/2446287.jpg', 12, 'B-sd2YFyN0s', 'dumb'),
(6, 'action', 1962, 'La Guerre des boutons', 'Yves Robert', 'André Treton; Michel Isella; Martin Lartigue; Michel Galabru; Jean Richard', 'Comme tous les ans, à chaque rentrée des classes, les enfants de Longeverne se querellent avec ceux de Velrans. Cette année sera différente puisque Lebrac (André Treton) et ses camarades viennent d\'avoir l\'idée d\'arracher les boutons et les bretelles de leurs ennemis afin de les faire rosser par leurs parents et, eux-mêmes, combattent entièrement nus et gardent les boutons arrachés à leurs ennemis comme trésor de guerre dans une cabane.', 'https://medias.unifrance.org/medias/202/123/97226/format_page/media.jpg', 2, 'KmsHWA7TZO0', 'lapin'),
(7, 'romance', 1984, 'Rive droite, rive gauche', 'Philippe Labro', 'Gérard Depardieu; Nathalie Baye; Carole Bouquet', 'Pour l\'amour de Sasha, jeune femme divorcée de la Rive Gauche, Paul, avocat d\'affaires de la Rive Droite, provoque un scandale politique, éclaboussant son plus gros client, le célèbre financier Pervillard.', 'https://fr.web.img6.acsta.net/medias/nmedia/18/66/61/67/18944091.jpg', 2, 'eNrrP1M-TbM', 'lapinx'),
(8, 'action', 2004, 'T\'choupi', 'Michel Fessler', 'Gwénael Sommier; Clovis Mahouden; Héloïse Jadoul', 'Accompagné de son extraordinaire confident Doudou, T\'choupi découvre avec émerveillement le petit village du bord de mer où il va habiter. Les beaux jours de l\'été, la plage, la liberté... Très vite, les vacances se révèlent riches en rencontres et en aventures.\r\n\r\nIl partage avec Doudou tous les événements de sa vie, où se mêlent joie et jalousie ; la famille s\'agrandit, T\'choupi a maintenant une petite soeur, Fanny. Mais une ombre mystérieuse trouble le bonheur des enfants du village en dérobant leurs jouets préférés. Avec Pilou et Lalou, ses nouveaux amis, T\'choupi va mener une enquête palpitante pour démasquer le coupable.\r\n', 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/35/20/57/18374973.jpg', 3, 'jMMpTCbjKTI', 'magie'),
(9, 'action', 2018, 'La Reine des neiges', 'Chris Buck', 'Elsa; Anna; Olaf; Kristoff; Hans', 'Anna, une jeune fille aussi audacieuse qu\'optimiste, se lance dans un incroyable voyage en compagnie de Kristoff, un montagnard expérimenté, et de son fidèle renne Sven, à la recherche de sa soeur, Elsa, la reine des neiges qui a plongé le royaume d\'Arendelle dans un hiver éternel.', 'https://fr.web.img5.acsta.net/pictures/210/521/21052146_20131023144339759.jpg', 6, 'uyP70r9PS6A', 'dumb'),
(10, 'romance', 1955, 'La Belle et le Clochard', 'Wilfred Jackson', 'Jock; Clochard; Peg; César; Lady', 'Malgré leurs milieux différents, une chienne cocker gâtée et un cabot jovial partagent amour et aventures dans ce classique. Ces aventures amoureuses sont perturbées par tante Sarah et ses deux adorables chats siamois, Si et Am, diaboliques et sournois.', 'https://fr.web.img6.acsta.net/medias/nmedia/18/35/90/85/18798038.jpg', 7, 'pFhOBObXh9k', 'pari'),
(11, 'romance', 2001, 'Le fabuleux destin d\'Amélie POULAIN', 'Jean-Pierre Jeunet', 'Audrey Tautou; Mathieu Kassovitz; Rufus', 'Amélie, une jeune serveuse dans un bar de Montmartre, passe son temps à observer les gens et à laisser son imagination divaguer. Elle s\'est fixé un but : faire le bien de ceux qui l\'entourent. Elle invente alors des stratagèmes pour intervenir incognito dans leur existence.\r\nLe chemin d\'Amélie est jalonné de rencontres : Georgette, la buraliste hypocondriaque ; Lucien, le commis d\'épicerie ; Madeleine Wallace, la concierge portée sur le porto et les chiens empaillés ; Raymond Dufayel alias \"l\'homme de verre\", son voisin qui ne vit qu\'à travers une reproduction d\'un tableau de Renoir.\r\nCette quête du bonheur amène Amélie à faire la connaissance de Nino Quincampoix, un étrange \"prince charmant\". Celui-ci partage son temps entre un train fantôme et un sex-shop, et cherche à identifier un inconnu dont la photo réapparaît sans cesse dans plusieurs cabines de Photomaton.', 'https://fr.web.img2.acsta.net/c_310_420/medias/nmedia/00/02/24/66/69198162_af.jpg', 8, 'ICglc80ZRho', 'lapinx'),
(12, 'action', 1984, 'Le Flic de Beverly Hills', 'Martin Brest', 'Judge Reinhold, Judge Reinhold, John Ashton, Lisa Eilbacher, Ronny Cox', 'Axel Foley, un policier désinvolte et indiscipliné de la ville de Détroit, vient de se faire réprimander par son patron pour avoir essayé d\'arrêter des trafiquants de cigarettes sans l\'avoir informé de son projet, ce qui a nui à son infiltration dans le réseau, faisant ainsi échouer sa mission non autorisée.', 'https://www.themoviedb.org/t/p/w500/mZzoUerHfazvLfBO8e2eNNE4wHd.jpg', 4, '1UV-lUZIyQk', 'magie'),
(13, 'action', 2007, 'Transformers', 'Michael Bay', 'Shia LaBeouf, Megan Fox, Peter Cullen, Josh Duhamel, Tyrese Gibson, Hugo Weaving', 'À bord d\'Air Force One, un poste de radio se transforme en robot (Frenzy) et pirate un ordinateur mais le virus est aussitôt détecté par Maggie et son équipe.', 'https://c8.alamy.com/zoomsfr/9/91c50b8df1cc4819a15aaf3436087c7c/pmb402.jpg', 4, '_XKAU3tYO9M', 'pari'),
(14, 'action', 1986, 'Top Gun', 'Tony Scott', 'Tom Cruise, Kelly McGillis, Val Kilmer, Anthony Edwards, Tom Skerritt', 'Jeune as du pilotage et tête brûlée d\'une école réservée à l\'élite de l\'aéronavale US (\"Top Gun\"), Pete Mitchell, dit \"Maverick\", tombe sous le charme d\'une instructrice alors qu\'il est en compétition pour le titre du meilleur pilote...', 'https://cdn.unitycms.io/images/5iTuiuwo4nJ9OoCx-jqtYk.jpg', 555, 'i8sEGppZX-s', 'lapin'),
(15, 'action', 2022, 'Top Gun Maverick', 'Joseph Kosinski', 'Tom Cruise, Miles Teller, Jennifer Connelly, Jon Hamm', 'Après avoir été l’un des meilleurs pilotes de chasse de la Marine américaine pendant plus de trente ans, Pete “Maverick\" Mitchell continue à repousser ses limites en tant que pilote d\'essai. Il refuse de monter en grade, car cela l’obligerait à renoncer à voler. Il est chargé de former un détachement de jeunes diplômés de l’école Top Gun pour une mission spéciale qu’aucun pilote n\'aurait jamais imaginée. Lors de cette mission, Maverick rencontre le lieutenant Bradley “Rooster” Bradshaw, le fils de son défunt ami, le navigateur Nick “Goose” Bradshaw. Face à un avenir incertain, hanté par ses fantômes, Maverick va devoir affronter ses pires cauchemars au cours d’une mission qui exigera les plus grands des sacrifices.', 'https://images.affiches-et-posters.com//albums/3/58999/medium/poster-film-top-gun-maverick.jpg', 666, 'V4gQdk1nAn0', 'dumb'),
(16, 'action', 2009, 'Là-haut', 'Pete Docter', 'Charles Aznavour; Edward Asner; Tom Trouffier', 'Quand Carl, un grincheux de 78 ans, décide de réaliser le rêve de sa vie en attachant des milliers de ballons à sa maison pour s\'envoler vers l\'Amérique du Sud, il ne s\'attendait pas à embarquer avec lui Russell, un jeune explorateur de neuf ans, toujours très enthousiaste et assez envahissant.', 'https://fr.web.img5.acsta.net/medias/nmedia/18/66/97/50/19104240.jpg', 100, 'p-TdCD6DBfM', 'lapin'),
(17, 'action', 2016, 'Warcraft Le Commencement', 'Duncan Jones', 'Travis Fimmel, Toby Kebbell, Paula Patton', 'Le pacifique royaume d\'Azeroth est au bord de la guerre alors que sa civilisation doit faire face à une redoutable race d’envahisseurs: des guerriers Orcs fuyant leur monde moribond pour en coloniser un autre. Alors qu’un portail s’ouvre pour connecter les deux mondes, une armée fait face à la destruction et l\'autre à l\'extinction. De côtés opposés, deux héros vont s’affronter et décider du sort de leur famille, de leur peuple et de leur patrie.', 'https://www.themoviedb.org/t/p/original/51ghTkfKRttjOk01h3ye14JQFwY.jpg', 11, '5mdzcxbZC4A', 'lapin'),
(18, 'humour', 2016, 'Deadpool', 'Tim Miller', 'Ryan Reynolds, Morena Baccarin, Ed Skrein', 'Deadpool, est l\'anti-héros le plus atypique de l\'univers Marvel. A l\'origine, il s\'appelle Wade Wilson : un ancien militaire des Forces Spéciales devenu mercenaire. Après avoir subi une expérimentation hors norme qui va accélérer ses pouvoirs de guérison, il va devenir Deadpool. Armé de ses nouvelles capacités et d\'un humour noir survolté, Deadpool va traquer l\'homme qui a bien failli anéantir sa vie.', 'https://www.themoviedb.org/t/p/original/3E53WEZJqP6aM84D8CckXx4pIHw.jpg', 41, 'XWtH7anz7io', 'pari'),
(19, 'action', 2016, 'War Dogs', 'Todd Phillips', 'Miles Teller, Jonah Hill, Ana de Armas', 'Deux copains âgés d\'une vingtaine d\'années vivant à Miami Beach à l\'époque de la guerre en Irak, profitent d\'un dispositif méconnu du gouvernement fédéral, permettant à de petites entreprises de répondre à des appels d\'offres de l\'armée américaine. Si leurs débuts sont modestes, ils ne tardent pas à empocher de grosses sommes d\'argent et à mener la grande vie. Mais les deux amis sont totalement dépassés par les événements lorsqu\'ils décrochent un contrat de 300 millions de dollars destiné à armer les soldats afghans. Car, pour honorer leurs obligations, ils doivent entrer en contact avec des individus très peu recommandables… dont certains font partie du gouvernement américain…', 'https://www.themoviedb.org/t/p/original/3QsSKLq6yewtII9wx3yWVU92rxs.jpg', 19, 'kmXo1Ncy0aM', 'dumb'),
(20, 'action', 2023, 'Super Mario Bros', 'Aaron Horvath, Michael Jelenic', 'Aaron Horvath, Michael Jelenic', 'Un film basé sur l’univers du célèbre jeu : Super Mario Bros.', 'https://fr.web.img6.acsta.net/pictures/23/02/06/09/28/4212244.jpg', 26, 'DAwm8ioRRuU', 'lapinx'),
(21, 'action', 2023, 'Le Loup de Wall Street', 'Martin Scorsese', 'Leonardo DiCaprio, Jonah Hill, Margot Robbie', 'Jordan Belfort est un jeune trader ambitieux qui rêve de devenir riche. Il se lance dans le monde de la bourse et devient rapidement un trader hors pair. Mais il va vite se rendre compte que la bourse est un monde impitoyable et qu’il va devoir faire des sacrifices pour réussir.', 'https://image.tmdb.org/t/p/original/dQIQZbJXn1pflQw3nwvXLJX0dHa.jpg', 530, 'GT9UfSqBz9o', 'magie'),
(22, 'action', 2021, 'Bac Nord', 'Olivier Marchal', 'Jean Reno, Roschdy Zem, Olivier Marchal', '2012. Les quartiers Nord de Marseille détiennent un triste record : la zone au taux de criminalité le plus élevé de France. Poussée par sa hiérarchie, la BAC Nord, brigade de terrain, cherche sans cesse à améliorer ses résultats. Dans un secteur à haut risque, les flics adaptent leurs méthodes, franchissant parfois la ligne jaune. Jusqu’au jour où le système judiciaire se retourne contre eux…', 'https://www.themoviedb.org/t/p/original/r2NnRp4mi4G3e0x9zINQIcnGNd8.jpg', 12, 'iyVLnChTs8w', 'pari'),
(23, 'action', 2003, 'Le Seigneur des Anneaux : Le Retour du Roi', 'Peter Jackson', 'Elijah Wood, Ian McKellen, Viggo Mortensen', 'Frodon et Sam poursuivent leur route vers Mordor pour détruire l’Anneau unique, tandis que Aragorn, Legolas et Gimli, aidés de Merry et Pippin, continuent à se battre pour le roi Théoden. Ensemble, ils doivent affronter l’armée de Sauron, commandée par le Nazgûl, et affronter le terrible Gollum.', 'https://image.tmdb.org/t/p/original/4fcgHdNryRuvEpsldjYifFEVX2i.jpg', 43, 'nalLU8i4zgs', 'magie'),
(24, 'action', 2015, 'Diversion', 'Glenn Ficarra, John Requa', 'Will Smith, Margot Robbie, Rodrigo Santoro', 'Nicky Spurgeon est un escroc ’professionnel’ à la tête d’une équipe de nombreux arnaqueurs et pickpockets. Un soir, il croise Jess Barrett, une arnaqueuse débutante. Nicky décide de l’intégrer pour un gros coup à La Nouvelle-Orléans. Trois ans plus tard, il la retrouve sur sa route à Buenos Aires...', 'https://www.themoviedb.org/t/p/original/AfKm745YiKJ14yp4UfA4jowBIPi.jpg', 9, '_NxDVVyxyjU', 'dumb'),
(25, 'humour', 2012, 'Ted', 'Seth MacFarlane', 'Mark Wahlberg, Mila Kunis, JoeyStarr', 'À 8 ans, le petit John Bennett fit le voeu que son ours en peluche de Noël s’anime et devienne son meilleur ami pour la vie, et il vit son voeu exaucé. Presque 30 ans plus tard, l’histoire n’a plus vraiment les allures d’un conte de Noël. L’omniprésence de Ted aux côtés de John pèse lourdement sur sa relation amoureuse avec Lori. Bien que patiente, Lori voit en cette amitié exclusive, consistant principalement à boire des bières et fumer de l’herbe devant des programmes télé plus ringards les uns que les autres, un handicap pour John qui le confine à l’enfance, l’empêche de réussir professionnellement et de réellement s’investir dans leur couple. Déchiré entre son amour pour Lori et sa loyauté envers Ted, John lutte pour devenir enfin un homme, un vrai !', 'https://www.themoviedb.org/t/p/original/zdZKj5nqe3tEwuzEYbxAgMESFe7.jpg', 35, '3NPVAUxspdc', 'lapinx'),
(26, 'humour', 2015, 'Ted 2', 'Seth MacFarlane', 'Mark Wahlberg, Mila Kunis, JoeyStarr', 'Nouveaux mariés, Ted et Tami-Lynn essayent d’avoir un bébé et demandent à John d’être le donneur en vue d’une insémination artificielle. Cependant, s’il veut avoir la garde de l’enfant, Ted va devoir prouver devant un tribunal qu’il est véritablement humain.', 'https://www.themoviedb.org/t/p/original/kZ9cHlWbhtPx5IoR9R1n8UHozej.jpg', 45, 'Ewp9umK4V0E', 'lapin'),
(27, 'Science-Fiction', 2019, 'Avengers Endgame', 'Joe Russo, Anthony Russo', 'Robert Downey Jr, Chris Evans, Mark Ruffalo', 'Thanos ayant anéanti la moitié de l’univers, les Avengers restants resserrent les rangs dans ce vingt-deuxième film des Studios Marvel, grande conclusion d’un des chapitres de l’Univers Cinématographique Marvel.', 'https://www.themoviedb.org/t/p/original/or06FN3Dka5tukK1e9sl16pB3iy.jpg', 150, 'wV-Q0o2OQjQ', 'dumb'),
(28, 'action', 1993, 'Jurassic Park', 'Steven Spielberg', 'Sam Neill, Laura Dern, Jeff Goldblum, Samuel L. Jackson et Richard Attenborough', 'Ne pas réveiller le chat qui dort -- c\'est ce que le milliardaire John Hammond aurait dû se rappeler avant de se lancer dans le clonage de dinosaures. C\'est à partir d\'une goutte de sang absorbée par un moustique fossilisé que John Hammond et son équipe ont réussi à faire renaître une dizaine d\'espèces de dinosaures.', 'https://media.s-bol.com/l80qRKGMxYEM/j6qZzP/550x782.jpg', 4, '7cCbj-9Ww1o', 'dumb'),
(29, 'action', 2001, 'Harry Potter à l\'école des sorciers', 'Chris Columbus', 'Daniel Radcliffe, Rupert Grint, Emma Watson, Robbie Coltrane, Richard Harris', 'Harry Potter, un jeune orphelin, est élevé par son oncle et sa tante qui le détestent. Alors qu\'il était haut comme trois pommes, ces derniers lui ont raconté que ses parents étaient morts dans un accident de voiture.', 'https://static.posters.cz/image/1300/affiches-et-posters/harry-potter-a-l-ecole-des-sorciers-i104639.jpg', 3, 'P1BGgqhVGAI', 'magie'),
(30, 'comedie', 2011, 'HOP', 'Tim Hill', 'James Marsden, Russel Brand, Kaley Cuoco, Hank Azaria, Gary Cole, Elizabeth Perkins, Hugh Laurie', 'Sur l\'île de Pâques, dans une grande usine qui fabrique les confiseries pour les fêtes de Pâques, le célèbre lapin se prépare à passer le relais à son fils, E.B. Mais E.B n\'est pas intéressé par ce travail, il veut devenir batteur. Il va à Los Angeles où il rencontre Fred O\'Hare, un désoeuvré.', 'https://fr.web.img2.acsta.net/medias/nmedia/18/82/07/18/19659937.jpg', 8, 'curWoGl59SM', 'lapin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
