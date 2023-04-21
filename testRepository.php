<?php

use Model\Comments;
use Repository\RepositoryCommentsImpl;

require_once __DIR__ . "/utility/connection.php";
require_once __DIR__ . "/Model/Comments.php";
require_once __DIR__ . "/Repository/RepositoryComments.php";

$connection = getConnection();
$repository = new RepositoryCommentsImpl($connection);
// test insert comment
// $comment = new Comments(email: "ahds@test.com", comment: "haii");
// $newComment = $repository->insert($comment);

// var_dump($newComment->getId());

// test findById
// $comment = $repository->findById(11);
// var_dump($comment);

// test findAll
$comments = $repository->findAll();
var_dump($comments);

$connection = null;