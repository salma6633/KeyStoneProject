<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\CyberIncident;

class NoteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('policiesDocumentedScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('policiesReviewDateScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('securityExceptionsProcessScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('anySecurityTeamScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('informationSecurityControlsScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('selfAssessmentProcessScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('issueManagementScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('independentAuditScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('informationClassificationSystemScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('removableMediaPolicyScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('incidentManagementStandardsScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('incidentMonitoringScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('incidentTrendsEvaluationScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('securityTrainingProgramScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('trainingMethodsScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('trainingTopicsScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('securityInspectionsScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('contractSecurityProvisionsScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('subcontractorSecurityEvaluationScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('subcontractorEvaluationProcessScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
            ->add('riskAssessmentQuestionnaireScore', IntegerType::class, [
                'required' => false,
                'label' => false, // Remove the label
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
