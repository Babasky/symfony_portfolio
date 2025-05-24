<?php

namespace App\Controller\Admin;

use App\Entity\Tech;
use App\Entity\About;
use App\Entity\Outil;
use App\Entity\Skill;
use App\Entity\Accueil;
use App\Entity\Contact;
use App\Entity\Project;
use App\Entity\Parcours;
use App\Entity\Experience;
use App\Entity\SocialNetwork;
use App\Entity\InformationContact;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\AccueilCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // 1.1) If you have enabled the "pretty URLs" feature:
        // return $this->redirectToRoute('admin_user_index');
        //
        // 1.2) Same example but using the "ugly URLs" that were used in previous EasyAdmin versions:
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(AccueilCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirectToRoute('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Html');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fas fa-home', Accueil::class);
        yield MenuItem::linkToCrud('Outil', 'fas fa-list', Outil::class);
        yield MenuItem::linkToCrud('Projets', 'fas fa-list', Project::class);
        yield MenuItem::linkToCrud('Compétences', 'fas fa-list', Skill::class);
        yield MenuItem::linkToCrud('Technologies', 'fas fa-list', Tech::class);
        yield MenuItem::linkToCrud('À propos', 'fas fa-list', About::class);
        yield MenuItem::linkToCrud('Expériences', 'fas fa-list', Experience::class);
        yield MenuItem::linkToCrud('Parcours', 'fas fa-list', Parcours::class);
        yield MenuItem::linkToCrud('Contact info', 'fas fa-list', InformationContact::class);
        yield MenuItem::linkToCrud('Réseaux sociaux', 'fas fa-list', SocialNetwork::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-phone', Contact::class);
    }
}
