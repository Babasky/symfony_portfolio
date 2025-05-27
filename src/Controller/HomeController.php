<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Repository\TechRepository;
use App\Repository\AboutRepository;
use App\Repository\SkillRepository;
use App\Repository\AccueilRepository;
use App\Repository\ProjectRepository;
use App\Repository\ParcoursRepository;
use App\Repository\ExperienceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\InformationContactRepository;
use App\Repository\SocialNetworkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

final class HomeController extends AbstractController
{
    public function __construct(
        private AccueilRepository $accueilRepository,
        private ProjectRepository $projectRepository,
        private SkillRepository $skillRepository,
        private TechRepository $techRepository,
        private AboutRepository $aboutRepository,
        private ExperienceRepository $experienceRepository,
        private ParcoursRepository $parcoursRepository,
        private InformationContactRepository $informationContactRepository,
        private SocialNetworkRepository $socialRepository,
        private TranslatorInterface $translator
    )
    {
        
    }
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $accueil = $this->accueilRepository->findAll()[0] ?? null;
        $projects = $this->projectRepository->findAll();
        $skills = $this->skillRepository->findAll();
        $technologies = $this->techRepository->findAll();
        $about = $this->aboutRepository->findAll()[0] ?? null;
        $experiences = $this->experienceRepository->findAll();
        $parcours = $this->parcoursRepository->findAll();
        $informationContact = $this->informationContactRepository->findAll()[0] ?? null;
        $socials = $this->socialRepository->findAll();
        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();
            $message = $this->translator->trans('Message sent successfully!');
            $this->addFlash('green', $message);
            $contact = new Contact(); // Reset the form
            $form = $this->createForm(ContactFormType::class, $contact);
        }
        
        return $this->render('home/index.html.twig', [
            'accueil' => $accueil,
            'projects' => $projects,
            'skills' => $skills,
            'technologies' => $technologies,
            'about' => $about,
            'experiences' => $experiences,
            'parcours' => $parcours,
            'informationContact' => $informationContact,
            'socials' => $socials,
            'form' => $form,
        ]);
    }

    #[Route('/translation/{locale}', name: 'app_translation')]
    public function translation(string $locale, Request $request, TranslatorInterface $translator): Response
    {
       $request->getSession()->set('_locale', $locale);
        return $this->redirect($request->headers->get('referer') ?? $this->generateUrl('app_home'));
    }
}
