<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/defi/open-data")
 */
class OpenDataController extends Controller
{
    /**
     * @Route("/", name="open_data")
     */
    public function projetAction(Request $request)
    {
        // replace this example code with whatever you need
        $data = file_get_contents("https://www.data.gouv.fr/api/1/reuses/immigration/");
		$json = json_decode($data);
		$liste = $json->{'datasets'};
		$desc = $json->{'description'};
		$date = $json->{'created_at'};

		/*foreach($liste as $article){
			$title = $article->{"title"};
			$uri = $article->{"page"};
			echo "<a href='$uri'>$title</a>";
		}*/
        return $this->render('open-data/index.html.twig', array(
        	'liste' => $liste,
        	'desc' => $desc,
        	'date' => $date,));
    }
}
