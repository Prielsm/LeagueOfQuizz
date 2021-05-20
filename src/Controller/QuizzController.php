<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Game;
use App\Repository\AnswerRepository;
use App\Repository\QuestionRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizzController extends AbstractController
{
    #[Route('/', name: 'quizz')]
    public function index(): Response
    {
        return $this->render('quizz/modes.html.twig', [
            'controller_name' => 'QuizzController',
        ]);
    }

    #[Route('/quizz/normal', name: 'quizzNormal')]
    public function quizzNormal(): Response
    {
        return $this->render('quizz/normal.html.twig', [
            'controller_name' => 'QuizzController',
        ]);
    }

    #[Route('/quizz/classe', name: 'quizzClasse')]
    public function quizzClasse(): Response
    {
        return $this->render('quizz/classe.html.twig', [
            'controller_name' => 'QuizzController',
        ]);
    }

    #[Route('/quizz/normal/choixmult', name: 'choix_mult')]
    public function choixMult(QuestionRepository $repo): Response
    {
        $questions = $repo->findByCategory(1);
        shuffle($questions);
        $questions5 = array_slice($questions, 0, 5);
        return $this->render('quizz/choixmult.html.twig', [
            'questions' => $questions5,
        ]);
    }

    #[Route('/quizz/normal/results', name: 'results_quizz')]
    public function results(Request $request, ObjectManager $manager, AnswerRepository $repo): Response
    {
        $answers = [];

        //BOUCLES POUR EVITER LA REPETITION MAIS NE MARCHE PAS
        // for ($i=1; $i < 6; $i++) { 
        //     $answerId[$i] = $request->request->get('group'.[$i]);
        //     $answer[$i] = $repo->find($answerId[$i]);
        //     array_push($answers, $answer[$i]);
        // }

        
        $answerId1 = $request->request->get('group1');
        $answerId2 = $request->request->get('group2');
        $answerId3 = $request->request->get('group3');
        $answerId4 = $request->request->get('group4');
        $answerId5 = $request->request->get('group5');

        
        $answer1 = $repo->find($answerId1);
        array_push($answers, $answer1);

        
        $answer2 = $repo->find($answerId2);
        array_push($answers, $answer2);

        
        $answer3 = $repo->find($answerId3);
        array_push($answers, $answer3);

        $answer4 = $repo->find($answerId4);
        array_push($answers, $answer4);
        
        $answer5 = $repo->find($answerId5);
        array_push($answers, $answer5);
        
        $score = 0;
        foreach ($answers as $key => $value) {
            if ($value->getStatus() == 1) {
                $score += 1;
            }
        }

        $message="";

        if ($this->getUser()) {
            $game = new Game();
            $game->setType('normal');
            $game->setUser($this->getUser());
            $game->setUserPoint(0);
            $game->setScore($score);
            $game->setCreatedAt(new \DateTime());

            $manager->persist($game);
            $manager->flush();

            $message="Votre score a bien été enregistré";
        }


        return $this->render('quizz/results.html.twig', [
            'answers' => $answers,
            'score' => $score,
            'message' => $message,
        ]);
    }
}
