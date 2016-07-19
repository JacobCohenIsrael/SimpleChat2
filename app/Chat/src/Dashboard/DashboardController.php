<?php
namespace diwip\Chat\Dashboard;

use diwip\Base\Http\Response;
use diwip\Base\View\Template;
use diwip\Base\Http\Controller\Controller;
use diwip\Base\Http\HttpSession;

class DashboardController extends Controller
{
    public function index(HttpSession $httpSession) 
    {
        //$user = ['id' => $this->request()->query->id];
        //$httpSession->set('user', $user);
        $view = new Template(DIWIP_VIEWS_PATH . '/dashboard/index.php');
        return new Response($view);
    }
}
 