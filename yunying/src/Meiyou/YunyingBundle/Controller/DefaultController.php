<?php

namespace Meiyou\YunyingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MeiyouYunyingBundle:Default:index.html.twig');
    }
}
