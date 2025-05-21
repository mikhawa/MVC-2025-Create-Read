<?php
# model/ArticleModel.php

/**
 * @param PDO $connection
 * @param bool $publish = true
 * @return array
 *  Fonction qui récupère tous les articles de la table article
 *  par article_date_published DESC, l'argument publish à true
 *  ne récupère pas les articles qui ne sont pas publiés (0)
 */
function getArticles(PDO $connection, bool $publish = true): array
{
    $sql="
    SELECT a.idarticle, a.article_title, a.article_text, a.article_date_published, 
           a.article_date_created, a.article_is_published, u.iduser, u.user_name    
    FROM article a
    JOIN user u 
        ON a.user_iduser = u.iduser
    WHERE article_is_published = ?
    ORDER BY article_date_published DESC, article_date_created DESC ;
    ";
    $query = $connection->prepare($sql);
    try{
        $publish = $publish ? 1 : 0;
        $query->execute([$publish]);
        $response = $query->fetchAll();
        $query->closeCursor();
        return $response;
    }catch(Exception $e){
        die($e->getMessage());
    }
}