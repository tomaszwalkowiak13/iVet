<?php

namespace App\Http\Controllers;

use App\iVet\Interfaces\FrontendRepositoryInterface;
use Illuminate\Http\Request;
use App\iVet\Gateways\FrontendGateway;
use Illuminate\Support\Facades\{Redirect, URL};

class FrontendController extends Controller
{
    public function __construct(FrontendRepositoryInterface $fR, FrontendGateway $fG)
    {
        $this->middleware('auth')->only('like', 'unlike', 'addComment');

        $this->fG = $fG;
        $this->fR = $fR;
    }

    public function index()
    {
        $articles = $this->fR->getArticleForMainPage();
        $employees = $this->fR->getEmployeesForMainPage();

        return view('frontend.index', ['articles' => $articles, 'employees' => $employees]);
    }

    public function article($id)
    {
        $article = $this->fR->getArticle($id);

        return view('frontend.subpages.article_page', ['article' => $article]);
    }

    public function offer()
    {
        return view('frontend.subpages.offer_page');
    }

    public function contact()
    {
        return view('frontend.subpages.contact_page');
    }

    public function services()
    {
        $services = $this->fR->getServices();

        return view('frontend.subpages.services_page', ['services' => $services]);
    }

    public function privacy_policy()
    {
        return view('frontend.subpages.privacy_policy_page');
    }

    public function person($id)
    {
        $user = $this->fR->getPerson($id);

        return view('frontend..subpages.person_page', ['user' => $user]);
    }
}
