<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CyberIncidentRepository")
 */
class CyberIncident
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $policiesDocumented;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $policiesDocuments; // Path to the document

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $policiesReviewDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $securityExceptionsProcess;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anySecurityTeam;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $securityTeam;
     /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $securityTeamExigence;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $securityTeamDocumentation;
   /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $informationSecurityControls = [];

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $informationSecurityControlsDocumentation; // Path to the document
    private $selfAssessmentProcess;
 /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $selfAssessmentProcessDocumentation; // Path to the document
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $issueManagement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $issueManagementDocumentation; // Path to the document

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $independentAudit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $independentAuditDocumentation; // Path to the document

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $informationClassificationSystem;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $informationClassificationSystemDocumentation; // Path to the document

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $removableMediaPolicy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $removableMediaPolicyDocumentation; // Path to the document

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $incidentManagementStandards;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $incidentManagementStandardsDocumentation; // Path to the document

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $incidentMonitoring;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $incidentTrendsEvaluation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $incidentTrendsEvaluationDocumentation; // Path to the document

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $securityTrainingProgram;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $securityTrainingProgramDocumentation; // Path to the document

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $trainingMethods;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $trainingTopics;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $securityInspections;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $securityInspectionsDocumentation; // Path to the document

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contractSecurityProvisions;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contractSecurityProvisionsDocumentation; // Path to the document

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subcontractorSecurityEvaluation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $subcontractorEvaluationProcess;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $riskAssessmentQuestionnaire;


/**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $policiesDocumentedScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $policiesReviewDateScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $securityExceptionsProcessScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $AnySecurityTeamScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $informationSecurityControlsScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $selfAssessmentProcessScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $issueManagementScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $independentAuditScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $informationClassificationSystemScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $removableMediaPolicyScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $incidentManagementStandardsScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $incidentMonitoringScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $incidentTrendsEvaluationScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $securityTrainingProgramScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trainingMethodsScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $trainingTopicsScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $securityInspectionsScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contractSecurityProvisionsScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $subcontractorSecurityEvaluationScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $subcontractorEvaluationProcessScore;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $riskAssessmentQuestionnaireScore;
   /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $globalScore;

    // Getters and Setters



    public function getGlobalScore(): ?int
    {
        return $this->globalScore;
    }

    public function setGlobalScore(?int $globalScore): self
    {
        $this->globalScore = $globalScore;

        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoliciesDocumented(): ?string
    {
        return $this->policiesDocumented;
    }

    public function setPoliciesDocumented(?string $policiesDocumented): self
    {
        $this->policiesDocumented = $policiesDocumented;
        return $this;
    }

    public function getPoliciesDocuments(): ?string
    {
        return $this->policiesDocuments;
    }

    public function setPoliciesDocuments(?string $policiesDocuments): self
    {
        $this->policiesDocuments = $policiesDocuments;
        return $this;
    }

    public function getPoliciesReviewDate(): ?\DateTimeInterface
    {
        return $this->policiesReviewDate;
    }

    public function setPoliciesReviewDate(?\DateTimeInterface $policiesReviewDate): self
    {
        $this->policiesReviewDate = $policiesReviewDate;
        return $this;
    }

    public function getSecurityExceptionsProcess(): ?string
    {
        return $this->securityExceptionsProcess;
    }

    public function setSecurityExceptionsProcess(?string $securityExceptionsProcess): self
    {
        $this->securityExceptionsProcess = $securityExceptionsProcess;
        return $this;
    }

    public function getAnySecurityTeam(): ?string
    {
        return $this->anySecurityTeam;
    }

    public function setAnySecurityTeam(?string $anySecurityTeam): self
    {
        $this->anySecurityTeam = $anySecurityTeam;
        return $this;
    }

    public function getSecurityTeam(): ?string
    {
        return $this->securityTeam;
    }

    public function setSecurityTeam(?string $securityTeam): self
    {
        $this->securityTeam = $securityTeam;
        return $this;
    }

    public function getSecurityTeamExigence(): ?string
    {
        return $this->securityTeamExigence;
    }

    public function setSecurityTeamExigence(?string $securityTeamExigence): self
    {
        $this->securityTeamExigence = $securityTeamExigence;
        return $this;
    }

    public function getSecurityTeamDocumentation(): ?string
    {
        return $this->securityTeamDocumentation;
    }

    public function setSecurityTeamDocumentation(?string $securityTeamDocumentation): self
    {
        $this->securityTeamDocumentation = $securityTeamDocumentation;
        return $this;
    }


    public function getInformationSecurityControls(): ?array
    {
        return $this->informationSecurityControls;
    }

    public function setInformationSecurityControls(?array $informationSecurityControls): self
    {
        $this->informationSecurityControls = $informationSecurityControls;

        return $this;
    }

    public function getInformationSecurityControlsDocumentation(): ?string
    {
        return $this->informationSecurityControlsDocumentation;
    }

    public function setInformationSecurityControlsDocumentation(?string $informationSecurityControlsDocumentation): self
    {
        $this->informationSecurityControlsDocumentation = $informationSecurityControlsDocumentation;
        return $this;
    }

    public function getSelfAssessmentProcess(): ?string
    {
        return $this->selfAssessmentProcess;
    }

    public function setSelfAssessmentProcess(?string $selfAssessmentProcess): self
    {
        $this->selfAssessmentProcess = $selfAssessmentProcess;
        return $this;
    }

    public function getSelfAssessmentProcessDocumentation(): ?string
    {
        return $this->selfAssessmentProcessDocumentation;
    }

    public function setSelfAssessmentProcessDocumentation(?string $selfAssessmentProcessDocumentation): self
    {
        $this->selfAssessmentProcessDocumentation = $selfAssessmentProcessDocumentation;
        return $this;
    }


    public function getIssueManagement(): ?string
    {
        return $this->issueManagement;
    }

    public function setIssueManagement(?string $issueManagement): self
    {
        $this->issueManagement = $issueManagement;
        return $this;
    }

    public function getIssueManagementDocumentation(): ?string
    {
        return $this->issueManagementDocumentation;
    }

    public function setIssueManagementDocumentation(?string $issueManagementDocumentation): self
    {
        $this->issueManagementDocumentation = $issueManagementDocumentation;
        return $this;
    }

    public function getIndependentAudit(): ?string
    {
        return $this->independentAudit;
    }

    public function setIndependentAudit(?string $independentAudit): self
    {
        $this->independentAudit = $independentAudit;
        return $this;
    }

    public function getIndependentAuditDocumentation(): ?string
    {
        return $this->independentAuditDocumentation;
    }

    public function setIndependentAuditDocumentation(?string $independentAuditDocumentation): self
    {
        $this->independentAuditDocumentation = $independentAuditDocumentation;
        return $this;
    }

    public function getInformationClassificationSystem(): ?string
    {
        return $this->informationClassificationSystem;
    }

    public function setInformationClassificationSystem(?string $informationClassificationSystem): self
    {
        $this->informationClassificationSystem = $informationClassificationSystem;
        return $this;
    }

    public function getInformationClassificationSystemDocumentation(): ?string
    {
        return $this->informationClassificationSystemDocumentation;
    }

    public function setInformationClassificationSystemDocumentation(?string $informationClassificationSystemDocumentation): self
    {
        $this->informationClassificationSystemDocumentation = $informationClassificationSystemDocumentation;
        return $this;
    }

    public function getRemovableMediaPolicy(): ?string
    {
        return $this->removableMediaPolicy;
    }

    public function setRemovableMediaPolicy(?string $removableMediaPolicy): self
    {
        $this->removableMediaPolicy = $removableMediaPolicy;
        return $this;
    }

    public function getRemovableMediaPolicyDocumentation(): ?string
    {
        return $this->removableMediaPolicyDocumentation;
    }

    public function setRemovableMediaPolicyDocumentation(?string $removableMediaPolicyDocumentation): self
    {
        $this->removableMediaPolicyDocumentation = $removableMediaPolicyDocumentation;
        return $this;
    }

    public function getIncidentManagementStandards(): ?string
    {
        return $this->incidentManagementStandards;
    }

    public function setIncidentManagementStandards(?string $incidentManagementStandards): self
    {
        $this->incidentManagementStandards = $incidentManagementStandards;
        return $this;
    }

    public function getIncidentManagementStandardsDocumentation(): ?string
    {
        return $this->incidentManagementStandardsDocumentation;
    }

    public function setIncidentManagementStandardsDocumentation(?string $incidentManagementStandardsDocumentation): self
    {
        $this->incidentManagementStandardsDocumentation = $incidentManagementStandardsDocumentation;
        return $this;
    }

    public function getIncidentMonitoring(): ?string
    {
        return $this->incidentMonitoring;
    }

    public function setIncidentMonitoring(?string $incidentMonitoring): self
    {
        $this->incidentMonitoring = $incidentMonitoring;
        return $this;
    }

    public function getIncidentTrendsEvaluation(): ?string
    {
        return $this->incidentTrendsEvaluation;
    }

    public function setIncidentTrendsEvaluation(?string $incidentTrendsEvaluation): self
    {
        $this->incidentTrendsEvaluation = $incidentTrendsEvaluation;
        return $this;
    }

    public function getIncidentTrendsEvaluationDocumentation(): ?string
    {
        return $this->incidentTrendsEvaluationDocumentation;
    }

    public function setIncidentTrendsEvaluationDocumentation(?string $incidentTrendsEvaluationDocumentation): self
    {
        $this->incidentTrendsEvaluationDocumentation = $incidentTrendsEvaluationDocumentation;
        return $this;
    }

    public function getSecurityTrainingProgram(): ?string
    {
        return $this->securityTrainingProgram;
    }

    public function setSecurityTrainingProgram(?string $securityTrainingProgram): self
    {
        $this->securityTrainingProgram = $securityTrainingProgram;
        return $this;
    }

    public function getSecurityTrainingProgramDocumentation(): ?string
    {
        return $this->securityTrainingProgramDocumentation;
    }

    public function setSecurityTrainingProgramDocumentation(?string $securityTrainingProgramDocumentation): self
    {
        $this->securityTrainingProgramDocumentation = $securityTrainingProgramDocumentation;
        return $this;
    }

    public function getTrainingMethods(): ?string
    {
        return $this->trainingMethods;
    }

    public function setTrainingMethods(?string $trainingMethods): self
    {
        $this->trainingMethods = $trainingMethods;
        return $this;
    }

    public function getTrainingTopics(): ?string
    {
        return $this->trainingTopics;
    }

    public function setTrainingTopics(?string $trainingTopics): self
    {
        $this->trainingTopics = $trainingTopics;
        return $this;
    }

    public function getSecurityInspections(): ?string
    {
        return $this->securityInspections;
    }

    public function setSecurityInspections(?string $securityInspections): self
    {
        $this->securityInspections = $securityInspections;
        return $this;
    }

    public function getSecurityInspectionsDocumentation(): ?string
    {
        return $this->securityInspectionsDocumentation;
    }

    public function setSecurityInspectionsDocumentation(?string $securityInspectionsDocumentation): self
    {
        $this->securityInspectionsDocumentation = $securityInspectionsDocumentation;
        return $this;
    }

    public function getContractSecurityProvisions(): ?string
    {
        return $this->contractSecurityProvisions;
    }

    public function setContractSecurityProvisions(?string $contractSecurityProvisions): self
    {
        $this->contractSecurityProvisions = $contractSecurityProvisions;
        return $this;
    }

    public function getContractSecurityProvisionsDocumentation(): ?string
    {
        return $this->contractSecurityProvisionsDocumentation;
    }

    public function setContractSecurityProvisionsDocumentation(?string $contractSecurityProvisionsDocumentation): self
    {
        $this->contractSecurityProvisionsDocumentation = $contractSecurityProvisionsDocumentation;
        return $this;
    }

    public function getSubcontractorSecurityEvaluation(): ?string
    {
        return $this->subcontractorSecurityEvaluation;
    }

    public function setSubcontractorSecurityEvaluation(?string $subcontractorSecurityEvaluation): self
    {
        $this->subcontractorSecurityEvaluation = $subcontractorSecurityEvaluation;
        return $this;
    }

    public function getSubcontractorEvaluationProcess(): ?string
    {
        return $this->subcontractorEvaluationProcess;
    }

    public function setSubcontractorEvaluationProcess(?string $subcontractorEvaluationProcess): self
    {
        $this->subcontractorEvaluationProcess = $subcontractorEvaluationProcess;
        return $this;
    }

    public function getRiskAssessmentQuestionnaire(): ?string
    {
        return $this->riskAssessmentQuestionnaire;
    }

    public function setRiskAssessmentQuestionnaire(?string $riskAssessmentQuestionnaire): self
    {
        $this->riskAssessmentQuestionnaire = $riskAssessmentQuestionnaire;
        return $this;
    }

    public function getPoliciesDocumentedScore(): ?int
    {
        return $this->policiesDocumentedScore;
    }

    public function setPoliciesDocumentedScore(?int $policiesDocumentedScore): self
    {
        $this->policiesDocumentedScore = $policiesDocumentedScore;
        return $this;
    }

    public function getPoliciesReviewDateScore(): ?int
    {
        return $this->policiesReviewDateScore;
    }

    public function setPoliciesReviewDateScore(?int $policiesReviewDateScore): self
    {
        $this->policiesReviewDateScore = $policiesReviewDateScore;
        return $this;
    }

    public function getSecurityExceptionsProcessScore(): ?int
    {
        return $this->securityExceptionsProcessScore;
    }

    public function setSecurityExceptionsProcessScore(?int $securityExceptionsProcessScore): self
    {
        $this->securityExceptionsProcessScore = $securityExceptionsProcessScore;
        return $this;
    }

    public function getAnySecurityTeamScore(): ?int
    {
        return $this->AnySecurityTeamScore;
    }

    public function setAnySecurityTeamScore(?int $AnySecurityTeamScore): self
    {
        $this->AnySecurityTeamScore = $AnySecurityTeamScore;
        return $this;
    }

    public function getInformationSecurityControlsScore(): ?int
    {
        return $this->informationSecurityControlsScore;
    }

    public function setInformationSecurityControlsScore(?int $informationSecurityControlsScore): self
    {
        $this->informationSecurityControlsScore = $informationSecurityControlsScore;
        return $this;
    }

    public function getSelfAssessmentProcessScore(): ?int
    {
        return $this->selfAssessmentProcessScore;
    }

    public function setSelfAssessmentProcessScore(?int $selfAssessmentProcessScore): self
    {
        $this->selfAssessmentProcessScore = $selfAssessmentProcessScore;
        return $this;
    }

    public function getIssueManagementScore(): ?int
    {
        return $this->issueManagementScore;
    }

    public function setIssueManagementScore(?int $issueManagementScore): self
    {
        $this->issueManagementScore = $issueManagementScore;
        return $this;
    }

    public function getIndependentAuditScore(): ?int
    {
        return $this->independentAuditScore;
    }

    public function setIndependentAuditScore(?int $independentAuditScore): self
    {
        $this->independentAuditScore = $independentAuditScore;
        return $this;
    }

    public function getInformationClassificationSystemScore(): ?int
    {
        return $this->informationClassificationSystemScore;
    }

    public function setInformationClassificationSystemScore(?int $informationClassificationSystemScore): self
    {
        $this->informationClassificationSystemScore = $informationClassificationSystemScore;
        return $this;
    }

    public function getRemovableMediaPolicyScore(): ?int
    {
        return $this->removableMediaPolicyScore;
    }

    public function setRemovableMediaPolicyScore(?int $removableMediaPolicyScore): self
    {
        $this->removableMediaPolicyScore = $removableMediaPolicyScore;
        return $this;
    }

    public function getIncidentManagementStandardsScore(): ?int
    {
        return $this->incidentManagementStandardsScore;
    }

    public function setIncidentManagementStandardsScore(?int $incidentManagementStandardsScore): self
    {
        $this->incidentManagementStandardsScore = $incidentManagementStandardsScore;
        return $this;
    }

    public function getIncidentMonitoringScore(): ?int
    {
        return $this->incidentMonitoringScore;
    }

    public function setIncidentMonitoringScore(?int $incidentMonitoringScore): self
    {
        $this->incidentMonitoringScore = $incidentMonitoringScore;
        return $this;
    }

    public function getIncidentTrendsEvaluationScore(): ?int
    {
        return $this->incidentTrendsEvaluationScore;
    }

    public function setIncidentTrendsEvaluationScore(?int $incidentTrendsEvaluationScore): self
    {
        $this->incidentTrendsEvaluationScore = $incidentTrendsEvaluationScore;
        return $this;
    }

    public function getSecurityTrainingProgramScore(): ?int
    {
        return $this->securityTrainingProgramScore;
    }

    public function setSecurityTrainingProgramScore(?int $securityTrainingProgramScore): self
    {
        $this->securityTrainingProgramScore = $securityTrainingProgramScore;
        return $this;
    }

    public function getTrainingMethodsScore(): ?int
    {
        return $this->trainingMethodsScore;
    }

    public function setTrainingMethodsScore(?int $trainingMethodsScore): self
    {
        $this->trainingMethodsScore = $trainingMethodsScore;
        return $this;
    }

    public function getTrainingTopicsScore(): ?int
    {
        return $this->trainingTopicsScore;
    }

    public function setTrainingTopicsScore(?int $trainingTopicsScore): self
    {
        $this->trainingTopicsScore = $trainingTopicsScore;
        return $this;
    }

    public function getSecurityInspectionsScore(): ?int
    {
        return $this->securityInspectionsScore;
    }

    public function setSecurityInspectionsScore(?int $securityInspectionsScore): self
    {
        $this->securityInspectionsScore = $securityInspectionsScore;
        return $this;
    }

    public function getContractSecurityProvisionsScore(): ?int
    {
        return $this->contractSecurityProvisionsScore;
    }

    public function setContractSecurityProvisionsScore(?int $contractSecurityProvisionsScore): self
    {
        $this->contractSecurityProvisionsScore = $contractSecurityProvisionsScore;
        return $this;
    }

    public function getSubcontractorSecurityEvaluationScore(): ?int
    {
        return $this->subcontractorSecurityEvaluationScore;
    }

    public function setSubcontractorSecurityEvaluationScore(?int $subcontractorSecurityEvaluationScore): self
    {
        $this->subcontractorSecurityEvaluationScore = $subcontractorSecurityEvaluationScore;
        return $this;
    }

    public function getSubcontractorEvaluationProcessScore(): ?int
    {
        return $this->subcontractorEvaluationProcessScore;
    }

    public function setSubcontractorEvaluationProcessScore(?int $subcontractorEvaluationProcessScore): self
    {
        $this->subcontractorEvaluationProcessScore = $subcontractorEvaluationProcessScore;
        return $this;
    }

    public function getRiskAssessmentQuestionnaireScore(): ?int
    {
        return $this->riskAssessmentQuestionnaireScore;
    }

    public function setRiskAssessmentQuestionnaireScore(?int $riskAssessmentQuestionnaireScore): self
    {
        $this->riskAssessmentQuestionnaireScore = $riskAssessmentQuestionnaireScore;
        return $this;
    }





}
