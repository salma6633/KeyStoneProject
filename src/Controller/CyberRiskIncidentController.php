<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CyberIncident;
use App\Form\CyberDataFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use App\Form\CyberFormType;
use App\Form\NoteFormType;
use Doctrine\ORM\EntityManagerInterface;



class CyberRiskIncidentController extends AbstractController
{
    private $authorizationChecker;

    public function __construct(AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    #[Route('/cyber/risk/incident', name: 'app_cyber_risk')]
    public function new(Request $request): Response
    {
        if (!$this->authorizationChecker->isGranted('ROLE_CLIENT')) {
            throw new AccessDeniedException('You must have the ROLE_CLIENT to access this page.');
        }

        $cyberRiskIncident = new CyberIncident();
        $form = $this->createForm(CyberDataFormType::class, $cyberRiskIncident);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $controls = $form->get('information_security_controls')->getData();
            if (is_array($controls)) {
                $data->setInformationSecurityControls($controls); // Store as array
            }

            $entityManager = $this->getDoctrine()->getManager();

            // Handle file uploads
            $uploadedFiles = [
                'policies_documents' => $form->get('policies_documents')->getData(),
                'security_exceptions_documentation' => $form->get('security_exceptions_documentation')->getData(),
                'security_team_documentation' => $form->get('security_team_documentation')->getData(),
                'information_security_controls_documentation' => $form->get('information_security_controls_documentation')->getData(),
                'self_assessment_process_documentation' => $form->get('self_assessment_process_documentation')->getData(),
                'issue_management_documentation' => $form->get('issue_management_documentation')->getData(),
                'independent_audit_documentation' => $form->get('independent_audit_documentation')->getData(),
                'information_classification_system_documentation' => $form->get('information_classification_system_documentation')->getData(),
                'removable_media_policy_documentation' => $form->get('removable_media_policy_documentation')->getData(),
                'incident_management_standards_documentation' => $form->get('incident_management_standards_documentation')->getData(),
                'incident_trends_evaluation_documentation' => $form->get('incident_trends_evaluation_documentation')->getData(),
                'security_training_program_documentation' => $form->get('security_training_program_documentation')->getData(),
                'security_inspections_documentation' => $form->get('security_inspections_documentation')->getData(),
                'contract_security_provisions_documentation' => $form->get('contract_security_provisions_documentation')->getData()
            ];

            foreach ($uploadedFiles as $field => $file) {
                if ($file) {
                    $fileName = uniqid() . '.' . $file->guessExtension();
                    $file->move(
                        $this->getParameter('uploads_directory'),
                        $fileName
                    );

                    $setter = 'set' . str_replace('_', '', ucwords($field, '_'));
                    if (method_exists($cyberRiskIncident, $setter)) {
                        $cyberRiskIncident->$setter($fileName);
                    }
                }
            }

            $entityManager->persist($cyberRiskIncident);
            $entityManager->flush();
            $this->addFlash('success', 'Cyber risk incident has been recorded successfully.');

            return $this->redirectToRoute('app_cyber_risk');
        }

        return $this->render('cyber_risk_incident/data.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/admin/cyber/risk/incidents', name: 'admin_cyber_risk_list')]
    public function listAdmin(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $repository = $this->getDoctrine()->getRepository(CyberIncident::class);
        $incidents = $repository->findAll();

        return $this->render('cyber_risk_incident/cyberAdmin.html.twig', [
            'incidents' => $incidents,
        ]);
    }

  

    #[Route('/client/cyber/risk/incidents', name: 'client_cyber_risk_list')]
    public function listClient(): Response
    {
        if (!$this->authorizationChecker->isGranted('ROLE_CLIENT')) {
            throw new AccessDeniedException('You must have the ROLE_CLIENT to access this page.');
        }

        $repository = $this->getDoctrine()->getRepository(CyberIncident::class);
        $incidents = $repository->findAll();

        return $this->render('cyber_risk_incident/cyberClient.html.twig', [
            'incidents' => $incidents,
        ]);
    }

   
    #[Route('/incident/{id}', name: 'incident_detail')]
    public function show(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $incident = $entityManager->getRepository(CyberIncident::class)->find($id);
    
        if (!$incident) {
            throw $this->createNotFoundException('The incident does not exist');
        }
    
        // Create the form with the incident data
        $form = $this->createForm(NoteFormType::class, $incident);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            
            // Debug: Check if scores are being retrieved correctly
            $scores = [
                $data->getPoliciesDocumentedScore(),
                $data->getPoliciesReviewDateScore(),
                $data->getSecurityExceptionsProcessScore(),
                $data->getAnySecurityTeamScore(),
                $data->getInformationSecurityControlsScore(),
                $data->getSelfAssessmentProcessScore(),
                $data->getIssueManagementScore(),
                $data->getIndependentAuditScore(),
                $data->getInformationClassificationSystemScore(),
                $data->getRemovableMediaPolicyScore(),
                $data->getIncidentManagementStandardsScore(),
                $data->getIncidentMonitoringScore(),
                $data->getIncidentTrendsEvaluationScore(),
                $data->getSecurityTrainingProgramScore(),
                $data->getTrainingMethodsScore(),
                $data->getTrainingTopicsScore(),
                $data->getSecurityInspectionsScore(),
                $data->getContractSecurityProvisionsScore(),
                $data->getSubcontractorSecurityEvaluationScore(),
                $data->getSubcontractorEvaluationProcessScore(),
                $data->getRiskAssessmentQuestionnaireScore()
            ];
            
            $globalScore = array_sum($scores)/21;
        
            // Debug: Check the calculated global score
            dump($globalScore);
        
            $data->setGlobalScore($globalScore);  // Set the global score in the entity
        
            $entityManager->flush();
        
            $this->addFlash('success', 'Les scores ont été mis à jour avec succès.');
        
            return $this->redirectToRoute('incident_detail', ['id' => $id]);
        }
        
    
        return $this->render('cyber_risk_incident/incident_detail.html.twig', [
            'incident' => $incident,
            'form' => $form->createView(),
        ]);
    }
    






}
