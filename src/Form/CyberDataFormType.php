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
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\CyberIncident;


class CyberDataFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // Question 1.1
            ->add('policies_documented', ChoiceType::class, [
                'label' => '1. Avez-vous documenté et publié vos politiques et normes de sécurité des informations ?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('policies_documents', FileType::class, [
                'label' => 'Veuillez fournir une copie de vos politiques et de vos normes de sécurité des informations.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('policies_review_date', DateType::class, [
                'label' => '2. Date de la dernière révision effectuée de l\'efficacité de vos politiques et normes de sécurité des informations',
                'widget' => 'single_text',
                'required' => false,
                'input' => 'datetime',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('security_exceptions_process', ChoiceType::class, [
                'label' => '3. Avez-vous mis en place un processus pour gérer les exceptions liées à vos normes et politiques de sécurité des informations ?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('security_exceptions_documentation', FileType::class, [
                'label' => 'Veuillez fournir une documentation sur le processus de gestion des exceptions.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('any_security_team', ChoiceType::class, [
                'label' => '4. Disposez-vous d\'une personne ou d\'une équipe responsable du maintien de la sécurité des informations ?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('security_team', TextareaType::class, [
                'label' => 'Si oui, quel est leur titre ou leur poste ?',
                'required' => false,
            ])
            
            ->add('security_team_exigence', TextareaType::class, [
                'required' => false,
            ])
            ->add('security_team_documentation', FileType::class, [
                'label' => 'Veuillez fournir une documentation',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('information_security_controls', ChoiceType::class, [
                'label' => '5. Conservez-vous le contrôle des fonctions de sécurité de l\'information suivantes au sein de votre organisation ?',
                'choices' => [
                    'Gestion du pare-feu' => 'Gestion du pare-feu', 
                    'Gestion de la configuration de la sécurité' => 'Gestion de la configuration de la sécurité',
                    'Gestion des correctifs' => 'Gestion des correctifs',
                    'Administration de la sécurité de l\'information (ISA)' => 'Administration de la sécurité de l\'information (ISA)',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('information_security_controls_documentation', FileType::class, [
                'label' => 'Veuillez fournir des preuves du contrôle des fonctions de sécurité de l\'information.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('self_assessment_process', TextareaType::class, [
                'label' => '6. Suivez-vous un processus d\'auto-évaluation des contrôles périodiques documenté qui évalue les opérations commerciales impliquant des informations de la banque pour la conformité à vos politiques et normes ?',
                'required' => false,
            ])
            ->add('self_assessment_process_documentation', FileType::class, [
                'label' => 'Veuillez fournir la documentation décrivant le processus d\'auto-évaluation des contrôles périodiques.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('issue_management', TextareaType::class, [
                'label' => '7. Comment gérez-vous les problèmes détectés lors de votre auto-évaluation des contrôles? Attribuez-vous un niveau de risque aux problèmes identifiés?',
                'required' => false,
            ])
            ->add('issue_management_documentation', FileType::class, [
                'label' => 'Veuillez fournir des informations sur la gestion des problèmes détectés.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('independent_audit', ChoiceType::class, [
                'label' => '8. Vos contrôles et vos processus de sécurité des informations sont-ils évalués par un vérificateur indépendant ?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('independent_audit_documentation', FileType::class, [
                'label' => 'Veuillez fournir des preuves que les contrôles sont évalués par un vérificateur indépendant.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('information_classification_system', TextareaType::class, [
                'label' => '9. Avez-vous un système de classification des informations documenté qui comprend une description de chaque niveau de classification?',
                'required' => false,
            ])
            ->add('information_classification_system_documentation', FileType::class, [
                'label' => 'Veuillez fournir la documentation sur le système de classification des informations.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('removable_media_policy', ChoiceType::class, [
                'label' => '10. Avez-vous une politique documentée qui interdit explicitement l\'utilisation de supports amovibles? Si des exceptions sont autorisées, une telle utilisation a-t-elle un processus d\'approbation de la direction documenté qui inclut la justification commerciale exigeant l\'utilisation de supports amovibles?',
              'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('removable_media_policy_documentation', FileType::class, [
                'label' => 'Veuillez fournir la documentation sur la politique d\'utilisation des supports amovibles.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('incident_management_standards', TextareaType::class, [
                'label' => '11. Est-ce que vos normes et directives relatives à la gestion des incidents liés à la sécurité sont documentées ?',
                'required' => false,
            ])
            ->add('incident_management_standards_documentation', FileType::class, [
                'label' => 'Veuillez fournir la documentation sur les normes et directives de gestion des incidents.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('incident_monitoring', ChoiceType::class, [
                'label' => '12. Surveillez-vous les incidents liés à la sécurité 24 heures sur 24 et 7 jours sur 7 ?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('incident_trends_evaluation', TextareaType::class, [
                'label' => '13. Comment les tendances des incidents liés à la sécurité sont-elles évaluées ?',
                'required' => false,
            ])
            ->add('incident_trends_evaluation_documentation', FileType::class, [
                'label' => 'Veuillez fournir des informations sur l\'évaluation des tendances des incidents.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('security_training_program', ChoiceType::class, [
                'label' => '14. Disposez-vous d\'un programme documenté de formation et de sensibilisation à la sécurité de l\'information qui exige que tous les employés suivent la formation dans les 30 jours suivant l\'embauche et chaque année par la suite ?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('security_training_program_documentation', FileType::class, [
                'label' => 'Veuillez fournir la documentation sur le programme de formation à la sécurité.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('training_methods', TextareaType::class, [
                'label' => '15. Quelles méthodes utilisez-vous pour dispenser la formation et comment mesurez-vous l\'efficacité de la formation?',
                'required' => false,
            ])
            ->add('training_topics', TextareaType::class, [
                'label' => '16. Pouvez-vous fournir une liste des sujets abordés dans votre programme de formation à la sécurité de l\'information?',
                'required' => false,
            ])
            ->add('security_inspections', TextareaType::class, [
                'label' => '17. De quelle façon les inspections de sécurité et de prévention des incendies visant à surveiller l’efficacité et l’application des programmes de sécurité physique et de prévention des incendies sont-elles menées dans toutes les installations qui traitent, conservent ou transmettent des informations de  la banque?',
                'required' => false,
            ])
            ->add('security_inspections_documentation', FileType::class, [
                'label' => 'Veuillez fournir la documentation sur les inspections de sécurité et de prévention des incendies.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('contract_security_provisions', TextareaType::class, [
                'label' => '18. La langue de votre contrat avec votre sous-traitant couvre-t-elle toutes les dispositions suivantes ?<br>
                         <ul>  - L\'obligation de protéger les données de la banque contre toute perte ou mauvaise utilisation.<br>
                           - Le droit d\'inspecter régulièrement les contrôles du sous-traitant<br>
                           - L\'obligation du sous-traitant de vous signaler immédiatement toute violation possible ou confirmée des informations de la banque<br>
                           - L\'obligation du sous-traitant de renvoyer ou de détruire immédiatement toutes les informations reçues de la banque dont il n\'a plus besoin<br>
                           - Le droit de résilier le contrat si vos exigences en matière de sécurité changent et que le sous-traitant refuse d\'accepter les modifications apportées</ul>',
                'required' => false,
                'label_html' => true,
            ])
            
            ->add('contract_security_provisions_documentation', FileType::class, [
                'label' => 'Veuillez fournir des preuves que le contrat couvre toutes les dispositions de sécurité.',
                'required' => false,
                'mapped' => false,
                'attr' => ['accept' => '.pdf,.doc,.docx,.txt'],
            ])
            ->add('subcontractor_security_evaluation', ChoiceType::class, [
                'label' => '19. Souhaitez-vous que les sous-traitants nécessitent des évaluations de la sécurité des informations avant et après contrat?',
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('subcontractor_evaluation_process', TextareaType::class, [
                'label' => '20. Existe-t-il un processus d\'évaluation de la sécurité de l\'information des sous-traitants approuvé par la direction qui couvre toutes les étapes depuis le début de l\'évaluation jusqu\'à la gestion des problèmes?',
                'required' => false,
            ])
            ->add('risk_assessment_questionnaire', TextareaType::class, [
                'label' => '21. Les évaluations des risques liés aux SI sont-elles effectuées à l\'aide d\'un questionnaire d\'évaluation des SI ou d\'un outil équivalent couvrant les domaines des SI qui s\'alignent sur ceux couverts par le questionnaire d\'évaluation des SI de  la banque ?',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false, // Désactive CSRF protection
            'data_class' => CyberIncident::class,
        ]);
    }
}
