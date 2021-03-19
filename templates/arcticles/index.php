
<h1>Nos articles</h1>
<?php
foreach ($articles as $article) : ?>
    <h2><?php $article['title'] ?></h2>
    <small>Ecrit le <?php $article['created_at'] ?></small>
    <p><?php $article['introduction'] ?></p>
    <a href="article.php?id=<?php $article['id'] ?>">Lire la suite</a>
    <a href="delete-article.php?id=<?php $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?`)">Supprimer</a>
<?php endforeach ?>
