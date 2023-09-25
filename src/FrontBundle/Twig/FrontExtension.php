<?php
namespace FrontBundle\Twig;

class FrontExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            'red' => new \Twig_Function_Method($this, 'red'),
        );
    }

    public function red($text,$replace="")
    {
        if($replace=="")
        {
            return $text;
        }else{
            return str_replace($replace,'<font style="color:red;font-weight:bold;"><b>'.$replace.'</b></font>',$text);
        }
    }

    public function getName()
    {
        return 'font_extension';
    }
}