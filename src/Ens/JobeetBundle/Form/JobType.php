<?php

namespace Ens\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ens\JobeetBundle\Entity\Job as Job;
class JobType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('category')
                ->add('type', 'choice', array('choices' => Job::getTypes(), 'expanded' => true))

                ->add('company')
                ->add('file', 'file', array(
                         'label' => 'Company logo', 
                         'required' => false))
                ->add('url')
                ->add('position')
                ->add('location')
                ->add('description')
                ->add('howToApply', null, array('label' => 'How to apply?'))
                ->add('isPublic', null, array('label' => 'Public?'))
                ->add('email')
                
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Ens\JobeetBundle\Entity\Job'
        ));
    }

    public function getName() {
        return 'ens_jobeetbundle_jobtype';
    }

}
