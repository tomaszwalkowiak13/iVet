<?php

namespace App\iVet\Gateways;

use App\iVet\Interfaces\FrontendRepositoryInterface;
use App\Article;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Symfony\Component\HttpFoundation\Request;

class FrontendGateway
{
    use ValidatesRequests;

    public function __construct(FrontendRepositoryInterface $fR)
    {
        $this->fR = $fR;
    }

    public function getArticleForMainPage()
    {
        return Article::with('photos')->ordered()->get();
    }

    public function addComment($commentable_id, $type, Request $request)
    {
        $this->validate($request, [
            'content' => "required|string|max:500"
        ]);

        return $this->fR->addComment($commentable_id, $type, $request);
    }
}
