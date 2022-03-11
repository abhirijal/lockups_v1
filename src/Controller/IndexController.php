<?php
// src/Controller/indexController.php

namespace App\Controller;


use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Lockups;
use App\Entity\LockupsFields;
use App\Entity\LockupTemplates;
use App\Entity\LockupTemplatesCategories;
use App\Entity\LockupTemplatesFields;
use App\Entity\Svg;
use Doctrine\ORM\Cache\Lock;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;
use WDN\Bundle\FrameworkBundle\Controller\BaseController;
use App\Controller\LockupsGeneratorController;
use phpCAS;


class IndexController extends BaseController
{
    /**
     * @Route("/", name="homePage", methods={"GET"})
     */
    public function homePage(ManagerRegistry $doctrine): Response
    {
        $lockups = $doctrine->getRepository(LockupTemplates::class)->findAll();
        $lockups_fields = $doctrine->getRepository(LockupTemplatesFields::class)->findAll();
        $lockups_categories = $doctrine->getRepository(LockupTemplatesCategories::class)->findAll();

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($lockups_fields, 'json', [AbstractNormalizer::ATTRIBUTES => ['slug', 'Uppercase', 'Value']]);

        return $this->render('base.html.twig', [
            'page_template' => "createLockups.html.twig",
            'page_name' => "CreateLockups",
            'lockups' => $lockups,
            'lockups_fields' => $lockups_fields,
            'json_lockups_fields' => $jsonContent,
            'categories' => $lockups_categories
        ]);
    }

    /**
     * @Route("/", name="addLockup", methods={"POST"})
     */
    public function addLockup(Request $request, ManagerRegistry $doctrine, ValidatorInterface $validator, ): RedirectResponse
    {
        $fields = $doctrine->getRepository(LockupTemplatesFields::class)->findAll();

        $entityManager = $doctrine->getManager();

        $lockuptemplate = (int)$request->request->get('lockuptemplate');
        $approver = (int)$request->request->get('approver');
        $lockups = new Lockups();
        $template = $doctrine->getRepository(LockupTemplates::class)->find($lockuptemplate);
        $arr = [];
        $count = 0;


        $lockups->setApprover($approver);
        $lockups->setTemplate($template);
        $lockups->setStatus(0);
        $lockups->setUser(0);
        $errors = $validator->validate($lockups);
        if (count($errors) > 0) {
            return $this->render('base.html.twig', [
                'page_template' => "createLockups.html.twig",
                'page_name' => "CreateLockups"
            ]);
        }

        $entityManager->persist($lockups);
        foreach ($fields as $item) {
            if (($request->request->get($item->getSlug())) != "") {
                $arr[$count] = new LockupsFields;
                $arr[$count]->setLockup($lockups);
                $arr[$count]->setFields($item);
                $arr[$count]->setValue($request->request->get($item->getSlug()));
                $entityManager->persist($arr[$count]);
                $count++;
            }
        }
        $entityManager->flush();

        $lockup_fields = $doctrine->getRepository(LockupsFields::class)->findAll($lockups->getId());
        $svg = new Svg();
        $svg->setValue($this->forward('App\Controller\LockupsGeneratorController::createLockup', [
            'template'  => $template->getSlug(),
            'lockup' => $arr,
            'orient' => $template->getStyle(),
        ]));
        // $svg->setValue(LockupsGenerator::createLockup($template->getSlug(), $arr, $template->getStyle()));
        $entityManager->persist($svg);
        $entityManager->flush();

        // save it in the database and redirect to the manage lockups page
        return $this->redirectToRoute('manageLockups', [], 302);
    }
    /**
     * @Route("/lockups/create", name="createLockups")
     */
    public function createLockups(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>The create lockups route Lucky number: ' . $number . '</body></html>'
        );
    }
    /**
     * @Route("/lockups/manage", name="manageLockups")
     */
    public function manageLockups(ManagerRegistry $doctrine): Response
    {
        phpCAS::setVerbose(true);
        if (!phpCAS::isInitialized()) {
            phpCAS::client(CAS_VERSION_2_0, 'shib.unl.edu', 443, 'idp/profile/cas');
            //\phpCAS::setCasServerCACert(self::$cas_cert_path);
            phpCAS::setNoCasServerValidation();
        }
        phpCAS::forceAuthentication();

        $user = phpCAS::getUser();

        $product = $doctrine->getRepository(Lockups::class)->findAll();
        return $this->render('base.html.twig', [
            'page_template' => "manageLockups.html.twig",
            'page_name' => "ManageLockups",
            'lockups_array' => $product,
            'user' => $user
        ]);
    }

    /**
     * @Route("/lockups/delete/", name="deleteLockups", methods={"POST"})
     */
    public function deleteLockups(ManagerRegistry $doctrine, Request $request): RedirectResponse
    {
        $id = $request->request->get('id');
        $lockups = $doctrine->getRepository(Lockups::class)->find($id);
        $lockup_fields = $doctrine->getRepository(LockupsFields::class)->findAll($lockups->getId());
        $entityManager = $doctrine->getManager();

        foreach ($lockup_fields as $item) {
            $entityManager->remove(($item));
        }
        $entityManager->remove($lockups);
        $entityManager->flush();

        return $this->redirectToRoute('manageLockups', [], 302);
    }
    /**
     * @Route("/lockups/edit/{id}", name="editLockups")
     */
    public function editLockups(int $id): Response
    {

        return $this->render('base.html.twig', [
            'page_template' => "editLockups.html.twig",
            'page_name' => "ManageLockups"
        ]);
    }
    /**
     * @Route("/lockups/library", name="lockupsLibrary")
     */
    public function lockupsLibrary(): Response
    {
        return $this->render('base.html.twig', [
            'page_name' => "LockupsLibrary"
        ]);
    }
}
