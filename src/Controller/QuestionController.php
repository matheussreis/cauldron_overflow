<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(Environment $twigEnvironment)
    {
        //Fun example of using the Twig service directly
        // $html = $twigEnvironment->render('question/homepage.html.twig');
        // return new Response($html);

        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route("/questions/{slug}", name="app_question_show")
     */
    public function show($slug)
    {
        $answers = [
            'Make sure your cat is sitting purrrfectly still 🤣',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];

        dump($slug, $this);

        //The render() method returns a response object with HTML inside.
        //The first parameter is the filename of the template and the second
        //is an array with variables that we want to pass into our template.
       return $this->render('question/show.html.twig', [
           'question' => ucwords(str_replace('-', ' ', $slug)),
           'answers' => $answers,
       ]);
    }
}
