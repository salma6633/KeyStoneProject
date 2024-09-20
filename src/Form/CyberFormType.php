<?php

// src/Form/CyberIncidentFormType.php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CyberFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // Question 1.1
            ->add('policies_documented', ChoiceType::class, [
                'label' => 'Avez-vous documenté et publié vos politiques et normes de sécurité des informations ?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('policies_documents', TextareaType::class, [
                'label' => 'Veuillez fournir une copie de vos politiques et de vos normes de sécurité des informations.',
                'required' => false,
            ])
            // Question 1.1.1
            ->add('policies_review_date', TextType::class, [
                'label' => 'Date de la dernière révision effectuée',
                'required' => false,
            ])
            // Question 1.1.2
            ->add('security_exceptions_process', ChoiceType::class, [
                'label' => 'Avez-vous mis en place un processus pour gérer les exceptions liées à vos normes et politiques de sécurité des informations ?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            // Question 1.2
            ->add('security_team', TextareaType::class, [
                'label' => 'Disposez-vous d\'une personne ou d\'une équipe responsable du maintien de la sécurité des informations ?',
                'required' => false,
            ])
            // Question 1.3
            ->add('information_security_controls', ChoiceType::class, [
                'label' => 'Conservez-vous le contrôle des fonctions de sécurité de l\'information suivantes au sein de votre organisation ?',
                'choices' => [
                    'Gestion du pare-feu' => 'firewall_management',
                    'Gestion de la configuration de la sécurité' => 'security_configuration_management',
                    'Gestion des correctifs' => 'patch_management',
                    'Administration de la sécurité de l\'information (ISA)' => 'isa_administration',
                ],
                'expanded' => true,
                'multiple' => true,
            ])
            // Question 1.4
            ->add('self_assessment_process', TextareaType::class, [
                'label' => 'Suivez-vous un processus d\'auto-évaluation des contrôles périodiques documenté ?',
                'required' => false,
            ])
            // Question 1.4.1
            ->add('issue_management', TextareaType::class, [
                'label' => 'Comment gérez-vous les problèmes détectés lors de votre auto-évaluation des contrôles?',
                'required' => false,
            ])
            // Question 1.5
            ->add('independent_audit', ChoiceType::class, [
                'label' => 'Vos contrôles et vos processus de sécurité des informations sont-ils évalués par un vérificateur indépendant ?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            // Question 1.6
            ->add('information_classification_system', TextareaType::class, [
                'label' => 'Avez-vous un système de classification des informations documenté ?',
                'required' => false,
            ])
            // Question 4.3
            ->add('removable_media_policy', TextareaType::class, [
                'label' => 'Avez-vous une politique documentée qui interdit explicitement l\'utilisation de supports amovibles ?',
                'required' => false,
            ])
            // Question 5.1
            ->add('incident_management_standards', TextareaType::class, [
                'label' => 'Est-ce que vos normes et directives relatives à la gestion des incidents liés à la sécurité sont documentées ?',
                'required' => false,
            ])
            // Question 5.2
            ->add('incident_monitoring', ChoiceType::class, [
                'label' => 'Surveillez-vous les incidents liés à la sécurité 24 heures sur 24 et 7 jours sur 7 ?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            // Question 5.3
            ->add('incident_trends_evaluation', TextareaType::class, [
                'label' => 'Comment les tendances des incidents liés à la sécurité sont-elles évaluées ?',
                'required' => false,
            ])
            // Question 7.1
            ->add('security_training_program', TextareaType::class, [
                'label' => 'Disposez-vous d\'un programme documenté de formation et de sensibilisation à la sécurité de l\'information ?',
                'required' => false,
            ])
            // Question 7.1.1
            ->add('training_methods', TextareaType::class, [
                'label' => 'Quelles méthodes utilisez-vous pour dispenser la formation et comment mesurez-vous l\'efficacité de la formation?',
                'required' => false,
            ])
            // Question 7.1.2
            ->add('training_topics', TextareaType::class, [
                'label' => 'Pouvez-vous fournir une liste des sujets abordés dans votre programme de formation à la sécurité de l\'information?',
                'required' => false,
            ])
            // Question 10.1
            ->add('security_inspections', TextareaType::class, [
                'label' => 'De quelle façon les inspections de sécurité et de prévention des incendies sont-elles menées ?',
                'required' => false,
            ])
            // Question 12.2.2
            ->add('contract_security_provisions', TextareaType::class, [
                'label' => 'La langue de votre contrat avec votre sous-traitant couvre-t-elle toutes les dispositions suivantes ?',
                'required' => false,
            ])
            // Question 12.3
            ->add('subcontractor_security_evaluation', ChoiceType::class, [
                'label' => 'Souhaitez-vous que les sous-traitants nécessitent des évaluations de la sécurité des informations avant et après contrat?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            // Question 12.3.1
            ->add('subcontractor_evaluation_process', TextareaType::class, [
                'label' => 'Existe-t-il un processus d\'évaluation de la sécurité de l\'information des sous-traitants approuvé par la direction ?',
                'required' => false,
            ])
            // Question 12.3.2
            ->add('risk_assessment_questionnaire', TextareaType::class, [
                'label' => 'Les évaluations des risques liés aux SI sont-elles effectuées à l\'aide d\'un questionnaire d\'évaluation des SI ?',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here (e.g., data_class)
        ]);
    }
}
