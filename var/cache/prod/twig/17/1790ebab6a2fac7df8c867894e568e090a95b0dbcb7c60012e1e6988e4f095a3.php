<?php

/* FrontBundle::layout.html.twig */
class __TwigTemplate_38570c1b67ed033ec8a3722e476fbb13f2f9595f7b5349e0102522b7b26e42ff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_10cbca8bb5caa7dd4dca06a933461d29e3dff5d7d87916b8d08174200d07444b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_10cbca8bb5caa7dd4dca06a933461d29e3dff5d7d87916b8d08174200d07444b->enter($__internal_10cbca8bb5caa7dd4dca06a933461d29e3dff5d7d87916b8d08174200d07444b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle::layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta name=\"renderer\" content=\"webkit\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"viewport\"
        content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0\">
    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("ui_core/layui/css/layui.css"), "html", null, true);
        echo "\" media=\"all\">
    <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("ui_core/style/admin.css"), "html", null, true);
        echo "\" media=\"all\">
\t<script>
\t\t";
        // line 13
        $context["_route"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method");
        // line 14
        echo "\t\tvar _route=\"";
        echo twig_escape_filter($this->env, (isset($context["_route"]) ? $context["_route"] : $this->getContext($context, "_route")), "html", null, true);
        echo "\";
\t</script>
\t<script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("ui_core/layui/layui.js"), "html", null, true);
        echo "\"></script>
</head>
<body class=\"layui-layout-body\">
\t";
        // line 19
        $this->displayBlock('content', $context, $blocks);
        // line 20
        echo "</body>
</html>";
        
        $__internal_10cbca8bb5caa7dd4dca06a933461d29e3dff5d7d87916b8d08174200d07444b->leave($__internal_10cbca8bb5caa7dd4dca06a933461d29e3dff5d7d87916b8d08174200d07444b_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_54b4944baebe452b5415166c371c7bbda2d1050fb67ceb475def3f2f6ef29eb7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_54b4944baebe452b5415166c371c7bbda2d1050fb67ceb475def3f2f6ef29eb7->enter($__internal_54b4944baebe452b5415166c371c7bbda2d1050fb67ceb475def3f2f6ef29eb7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "TITLE";
        
        $__internal_54b4944baebe452b5415166c371c7bbda2d1050fb67ceb475def3f2f6ef29eb7->leave($__internal_54b4944baebe452b5415166c371c7bbda2d1050fb67ceb475def3f2f6ef29eb7_prof);

    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        $__internal_548ebf19850b8541afbab52bf22defc0c9feab69ad4433574a664aef435372f2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_548ebf19850b8541afbab52bf22defc0c9feab69ad4433574a664aef435372f2->enter($__internal_548ebf19850b8541afbab52bf22defc0c9feab69ad4433574a664aef435372f2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_548ebf19850b8541afbab52bf22defc0c9feab69ad4433574a664aef435372f2->leave($__internal_548ebf19850b8541afbab52bf22defc0c9feab69ad4433574a664aef435372f2_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 19,  71 => 5,  63 => 20,  61 => 19,  55 => 16,  49 => 14,  47 => 13,  42 => 11,  38 => 10,  30 => 5,  24 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>{% block title %}TITLE{% endblock %}</title>
    <meta name=\"renderer\" content=\"webkit\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"viewport\"
        content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0\">
    <link rel=\"stylesheet\" href=\"{{ asset('ui_core/layui/css/layui.css') }}\" media=\"all\">
    <link rel=\"stylesheet\" href=\"{{ asset('ui_core/style/admin.css') }}\" media=\"all\">
\t<script>
\t\t{% set _route = app.request.attributes.get('_route') %}
\t\tvar _route=\"{{ _route }}\";
\t</script>
\t<script src=\"{{ asset('ui_core/layui/layui.js') }}\"></script>
</head>
<body class=\"layui-layout-body\">
\t{% block content %}{% endblock %}
</body>
</html>", "FrontBundle::layout.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/layout.html.twig");
    }
}
