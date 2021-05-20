<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Category;
use App\Entity\Question;
use App\Form\AnswerType;
use App\Form\CategoryType;
use App\Form\QuestionType;
use App\Repository\CategoryRepository;
use App\Repository\QuestionRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionnaireController extends AbstractController
{
    #[Route('/questionnaire', name: 'questionnaire')]
    public function index(QuestionRepository $repo): Response
    {
        $questions = $repo->findAll();

        return $this->render('questionnaire/index.html.twig', [
            'questions' => $questions,
        ]);
        
    }

    #[Route('/question/new', name: 'question_create')]
    public function create(Request $request, ObjectManager $manager): Response
    {      
       
        $question = new Question();
        $answer1 = new Answer();
        $answer1->setTitle('Réponse 1');
        $answer1->setStatus(0);
        $question->addAnswer($answer1);
        $answer2 = new Answer();
        $answer2->setTitle('Réponse 2');
        $answer2->setStatus(0);
        $question->addAnswer($answer2);
        $answer3 = new Answer();
        $answer3->setTitle('Réponse 3');
        $answer3->setStatus(0);
        $question->addAnswer($answer3);
        $answer4 = new Answer();
        $answer4->setTitle('Réponse 4');
        $answer4->setStatus(0);
        $question->addAnswer($answer4);
        
        $form = $this->createForm(QuestionType::class, $question);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($question);
            $manager->flush();

            return $this->redirectToRoute('question_show', ['id' => $question->getId()]);
        }
 
        return $this->render('questionnaire/create.html.twig', [
            'formQuestion' => $form->createView(),
        ]);
        
    }

    #[Route('/question/{id}/edit', name: 'question_edit')]
    public function edit(Question $question, Request $request, ObjectManager $manager): Response
    {             
        $form = $this->createForm(QuestionType::class, $question);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($question);
            $manager->flush();

            return $this->redirectToRoute('questionnaire');
        }
 
        return $this->render('questionnaire/edit.html.twig', [
            'formQuestion' => $form->createView(),
            'question' => $question,
            'answers' => $question->getAnswers(),
        ]);
        
    }

    #[Route('/question/{id}', name: 'question_show')]
    public function questionShow(Question $question): Response
    {  
        return $this->render('questionnaire/question.html.twig', [
            'controller_name' => 'QuestionnaireController',
            'question' => $question,
        ]);
        
    }

   
}
