<?php

namespace App\Controller;

use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;

class MovieController extends AbstractController
{
    /**
     *
     * @Route("/movies", name="app_movie_list")
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $movieRepository = $this->getDoctrine()->getRepository(Movie::class);

        $allMoviesQuery = $movieRepository->createQueryBuilder('p')->getQuery();

        $movies = $paginator->paginate(
            $allMoviesQuery,
            $request->query->getInt('page', 1),
            20
        );

        return $this->render('movie-list.html.twig', ['movies' => $movies]);
    }
}