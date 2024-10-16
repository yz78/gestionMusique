<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtisteController extends AbstractController
{
    #[Route('admin/artistes', name:"admin_artistes", methods:("GET"))]
    public function listeArtistes(ArtisteRepository $repo): Response
    {
        $artistes=$repo->listeArtistesComplete();
        return $this->render('artiste/ListeArtistes.html.twig', [
            'lesArtistes' => $artistes
        ]);
    }
}
