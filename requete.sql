-- Création de l'utilisateur 'admin_api' avec tous les privilèges
CREATE USER 'admin_api'@'%' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON `api`.* TO 'admin_api'@'%' WITH GRANT OPTION;

-- Création de l'utilisateur 'read_only' avec le privilège SELECT seulement
CREATE USER 'read_only'@'%' IDENTIFIED BY 'read_only';
GRANT SELECT ON `api`.* TO 'read_only'@'%';

-- Liste des univers [ nom - description ]
SELECT universe.name, universe.description 
FROM universe;

-- Liste des personnages et de leur univers [ personnage - univers ]
SELECT `character`.name, universe.name
FROM `character`
JOIN universe ON `character`.id_universe = universe.id;

-- Nombre de personnages pour chaque univers [ univers - nb_personnages ]
SELECT COUNT(`character`.id), universe.name
FROM `character`
JOIN universe ON `character`.`id_universe` = universe.id
GROUP BY universe.name;

-- Liste de personnages classés par popularité [ nom - nb_messages_reçus ]
SELECT `character`.name, COUNT(message.id)
FROM `character`
JOIN conversation ON conversation.id_character = `character`.`id`
JOIN message ON message.id_conversation = conversation.id
WHERE message.is_human = 1
GROUP BY `character`.name
ORDER BY COUNT(message.id) DESC;

-- Liste des universe auxquels sont rattachés au moins 4 personnages [ nom - nb_personnages ]
SELECT universe.name, COUNT(`character`.id) as Nb_Personnage
FROM universe
JOIN `character` ON `character`.id_universe = universe.id
GROUP BY universe.name
HAVING Nb_Personnage > 4;

-- Nombre moyen de messages envoyés par mois [ nb_message_mensuel ]
SELECT IFNULL(COUNT(*) / NULLIF(TIMESTAMPDIFF(MONTH, MIN(message.created_at), NOW()), 0),
              COUNT(*)
             ) AS Nb_Message_Month
FROM message
WHERE message.is_human = 1;

-- Nombre moyen de messages envoyés par semaine [ nb_message_hebdomadaire ]
SELECT COUNT(*) / (DATEDIFF(NOW(), MIN(message.created_at)) / 7) as Nb_message_Hebo
FROM message
WHERE is_human = 1;

-- Liste des personnages faisant partie d'un univers ayant au moins un autre personnage [ personnage - univers - nb_personnages ]
SELECT c.name AS character_name, u.name AS universe_name, COUNT(c2.id) AS nb_characters_in_universe
FROM `character` c
JOIN universe u ON c.id_universe = u.id
JOIN `character` c2 ON c.id_universe = c2.id_universe
GROUP BY c.name, u.name
HAVING nb_characters_in_universe > 1
ORDER BY u.name;

-- Liste des personnages ayant d'autres personnages avec un nom de la même longueur [ personnage - nb_personnages_similaires ]
SELECT c1.`name` AS nom_personnage, LENGTH(c1.`name`) AS nb_caracteres, COUNT(c2.`id`) AS nb_personnages_similaires
FROM `character` c1
JOIN `character` c2 ON LENGTH(c1.`name`) = LENGTH(c2.`name`) AND c1.`id` != c2.`id`
GROUP BY c1.`id`
HAVING nb_personnages_similaires > 0
ORDER BY nb_personnages_similaires DESC;

-- Création d'une vue d'activité des utilisateur [ nom - nb_conversation ]
CREATE VIEW activities AS
SELECT users.nickname, COUNT(conversation.id)
FROM users
JOIN conversation ON conversation.id_user = users.id
GROUP BY users.nickname;

-- Création D'une fonction retournant le nombre de personnages d'un univers donné [ countCharacter(idUniverse) ]
DELIMITER //

CREATE FUNCTION countCharacter(idUniverse INT) 
RETURNS INT
BEGIN
    DECLARE CharacterCount INT;

    SELECT COUNT(`character`.id)
    INTO CharacterCount
    FROM `character`
    WHERE `character`.id_universe = idUniverse;

    RETURN CharacterCount;
END //

DELIMITER ;
