<?php
// src/Controller/indexController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Lockups;
use App\Entity\LockupTemplates;
use App\Entity\LockupTemplatesCategories;
use App\Entity\LockupTemplatesFields;
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




class IndexController extends AbstractController
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
            'json_lockups_fields'=> $jsonContent,
            'categories' => $lockups_categories
        ]);
    }

    /**
     * @Route("/", name="addLockup", methods={"POST"})
     */
    public function addLockup(Request $request, ManagerRegistry $doctrine, ValidatorInterface $validator): RedirectResponse
    {
        $entityManager = $doctrine->getManager();

        $lockuptemplate = $request->request->get('lockuptemplate');
        $org_first_line = $request->request->get('org_first_line');
        $org_second_line = $request->request->get('org_second_line');
        $approver = $request->request->get('approver');
        $lockups = new Lockups();

        if ($approver == "") {
            $approver = 1;
        }

        $lockups->setApprover($approver);
        $lockups->setOrgFirstLine($org_first_line);
        $lockups->setTemplateId($lockuptemplate);
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
        $product = $doctrine->getRepository(Lockups::class)->findAll();
        return $this->render('base.html.twig', [
            'page_template' => "manageLockups.html.twig",
            'page_name' => "ManageLockups",
            'lockups_array' => $product
        ]);
    }

    /**
     * @Route("/lockups/delete/", name="deleteLockups", methods={"POST"})
     */
    public function deleteLockups(ManagerRegistry $doctrine, Request $request): RedirectResponse
    {
        $id = $request->request->get('id');
        $product = $doctrine->getRepository(Lockups::class)->find($id);

        $entityManager = $doctrine->getManager();
        $entityManager->remove($product);
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
