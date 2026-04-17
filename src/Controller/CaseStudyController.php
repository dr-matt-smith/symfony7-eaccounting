<?php

namespace App\Controller;

use App\Entity\Make;
use App\Form\MakeType;
use App\Repository\CaseStudyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/case_study')]
class CaseStudyController extends AbstractController
{
    #[Route('/', name: 'case_study_index', methods: ['GET'])]
    public function index(CaseStudyRepository $caseStudyRepository): Response
    {
        return $this->render('case_study/index.html.twig', [
            'case_studies' => $caseStudyRepository->findAll(),
        ]);
    }

/* --------------------------------------------------------- */

    public function showAction($id)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $case_study = $em->find('ItbEaccountingBundle:CaseStudy', $id);
        $name = $case_study->getName();
        $introduction = $case_study->getIntroduction();

        $params = array('id' => $id, 'name' => $name, 'introduction' => $introduction);
        return $this->render('ItbEaccountingBundle:CaseStudy:show.html.twig', $params);
    }

}
