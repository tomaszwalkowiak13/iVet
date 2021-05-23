<?php

namespace App\iVet\Interfaces;

interface FrontendRepositoryInterface
{
    public function getArticleForMainPage();
    public function getArticle($id);
}
