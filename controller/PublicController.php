<?php
# controller/PublicController.php

$articles = getArticles($db,true);

include_once "../view/homepage.html.php";