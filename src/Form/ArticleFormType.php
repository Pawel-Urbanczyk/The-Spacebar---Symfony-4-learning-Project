<?php


namespace App\Form;


use App\Entity\Article;
use App\Entity\User;
use function Clue\StreamFilter\fun;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'help'=>'Choose something catchy!',
                'label'=>'Title of Yours article',
                'attr'=>['placeholder'=>'Type Something Funny...']
            ])
            ->add('content', TextareaType::class)
            ->add('publishedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('author',EntityType::class,[
                'class'=>User::class,
                'choice_label'=>function(User $user){
                    return sprintf('(%d) %s', $user->getId(), $user->getEmail());
                },
                'placeholder'=>'Choose an atuhor'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class'=>Article::class
        ]);
    }


}