<?php
/**
 * User: boshurik
 * Date: 07.03.17
 * Time: 19:30
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PageController extends Controller
{
    /**
     * @Route("/{slug}.html", name="page")
     *
     * @param string $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($slug)
    {
        $template = sprintf('page/%s.html.twig', $slug);
        if (!$this->getTemplating()->exists($template)) {
            throw $this->createNotFoundException();
        }

        return $this->render($template);
    }

    /**
     * @return object|\Symfony\Bundle\TwigBundle\TwigEngine
     */
    private function getTemplating()
    {
        return $this->get('templating');
    }
}