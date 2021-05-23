<?php

namespace App\iVet\Repositories;

use App\{Article, User, Employee, Service};
use App\iVet\Interfaces\FrontendRepositoryInterface;

class FrontendRepository implements FrontendRepositoryInterface
{

    public function getArticleForMainPage()
    {
        return Article::with('photos')->orderBy('created_at', 'desc')->get();
    }

    public function getEmployeesForMainPage()
    {
        return Employee::all();
    }

    public function getServices()
    {
        return Service::all();
    }

    public function getArticle($id)
    {
        return Article::with('users.photos', 'comments.user')->find($id);
    }

    public function getPerson($id)
    {
        return User::with(['comments.commentable', 'articles', 'liked_articles'])->find($id);
    }
}
