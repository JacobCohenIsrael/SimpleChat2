<?php
namespace diwip\Chat\Util;

use diwip\Base\Http\Controller\Controller;
use diwip\Base\Http\Response;

class UtilController extends Controller
{
    /**
     * @return \diwip\Base\Http\Response
     */
    public function scripts()
    {
        $directory = new \RecursiveDirectoryIterator(DIWIP_PROJECT_PATH . '/public/chat');
        $recIterator = new \RecursiveIteratorIterator($directory);
        $regex = new \RegexIterator($recIterator, '/\/*.js$/i');
        
        foreach($regex as $item) {
            $buffer[] = file_get_contents($item);
        }
        $response =  new Response(implode("\n/*-----*/\n", $buffer));
        return $response->setJavascript();
    }
}
