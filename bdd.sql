-- une table film
CREATE TABLE IF NOT EXISTS `film` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `titre` varchar(255) NOT NULL,
    `annee` int(11) NOT NULL,
    `realisateur` varchar(255) NOT NULL,
    `acteur` varchar(255) NOT NULL,
    `synopsis` text NOT NULL,
    `image` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- une table utilisateurs
CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `role` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- --------------------------------------------------------
-- ajout des données
-- --------------------------------------------------------
INSERT INTO
    `film` (
        `id`,
        `titre`,
        `annee`,
        `realisateur`,
        `acteur`,
        `synopsis`,
        `image`
    )
VALUES
    (
        1,
        "Le seigneur des anneaux",
        2001,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord.jpg"
    ),
    (
        2,
        "Le seigneur des anneaux 2",
        2002,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord2.jpg"
    ),
    (
        3,
        "Le seigneur des anneaux 3",
        2003,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord3.jpg"
    ),
    (
        4,
        "Le seigneur des anneaux 4",
        2004,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord4.jpg"
    ),
    (
        5,
        "Le seigneur des anneaux 5",
        2005,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord5.jpg"
    ),
    (
        6,
        "Le seigneur des anneaux 6",
        2006,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord6.jpg"
    ),
    (
        7,
        "Le seigneur des anneaux 7",
        2007,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Segneur des Ténèbres.",
        "lord7.jpg"
    ),
    (
        8,
        "Le seigneur des anneaux 8",
        2008,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord8.jpg"
    ),
    (
        9,
        "Le seigneur des anneaux 9",
        2009,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord9.jpg"
    ),
    (
        10,
        "Le seigneur des anneaux 10",
        2010,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord10.jpg"
    ),
    (
        11,
        "Le seigneur des anneaux 11",
        2011,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord11.jpg"
    ),
    (
        12,
        "Le seigneur des anneaux 12",
        2012,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord12.jpg"
    ),
    (
        13,
        "Le seigneur des anneaux 13",
        2013,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord13.jpg"
    ),
    (
        14,
        "Le seigneur des anneaux 14",
        2014,
        "Peter Jackson",
        "Elijah Wood, Ian McKellen, Liv Tyler",
        "Frodon Sacquet, un Hobbit, hérite d\'un anneau magique. Il est alors entraîné dans une aventure pour détruire l\'anneau avant qu\'il ne tombe entre les mains du Seigneur des Ténèbres.",
        "lord14.jpg"
    ),
);