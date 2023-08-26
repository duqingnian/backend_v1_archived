<?php

/* FrontBundle:Merchant:detail.html.twig */
class __TwigTemplate_c8f1c69575be5d2a289e8589df6fd0fbda5caf966a3535e5e221c901ac57037b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::page.html.twig", "FrontBundle:Merchant:detail.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FrontBundle::page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_33bb261da0f6e25b9261a3a0d1b7b59bd2fc5f7d4f252035401c50f192f248fd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_33bb261da0f6e25b9261a3a0d1b7b59bd2fc5f7d4f252035401c50f192f248fd->enter($__internal_33bb261da0f6e25b9261a3a0d1b7b59bd2fc5f7d4f252035401c50f192f248fd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Merchant:detail.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_33bb261da0f6e25b9261a3a0d1b7b59bd2fc5f7d4f252035401c50f192f248fd->leave($__internal_33bb261da0f6e25b9261a3a0d1b7b59bd2fc5f7d4f252035401c50f192f248fd_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_b1afc8765a8825fa0287f53b31f6c069d5b878159cab1a9e4cbe1003170c7eee = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b1afc8765a8825fa0287f53b31f6c069d5b878159cab1a9e4cbe1003170c7eee->enter($__internal_b1afc8765a8825fa0287f53b31f6c069d5b878159cab1a9e4cbe1003170c7eee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "\t<div class=\"layui-card\">
\t\t<div class=\"layui-card-body\">
\t\t\t<table class=\"model\">
\t\t\t\t<tr>
\t\t\t\t\t<td style=\"text-align:left;font-weight:bold;\">appid:</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td style=\"text-align:left;font-family: Courier New;\">";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["merchant"]) ? $context["merchant"] : $this->getContext($context, "merchant")), "appid", array()), "html", null, true);
        echo "</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td style=\"text-align:left;font-weight:bold;\">app_secret:</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td style=\"text-align:left;font-family: Courier New;\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["merchant"]) ? $context["merchant"] : $this->getContext($context, "merchant")), "appSecret", array()), "html", null, true);
        echo "</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</div>
\t</div>

";
        
        $__internal_b1afc8765a8825fa0287f53b31f6c069d5b878159cab1a9e4cbe1003170c7eee->leave($__internal_b1afc8765a8825fa0287f53b31f6c069d5b878159cab1a9e4cbe1003170c7eee_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Merchant:detail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 17,  49 => 11,  40 => 4,  34 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"FrontBundle::page.html.twig\" %}

{% block content %}
\t<div class=\"layui-card\">
\t\t<div class=\"layui-card-body\">
\t\t\t<table class=\"model\">
\t\t\t\t<tr>
\t\t\t\t\t<td style=\"text-align:left;font-weight:bold;\">appid:</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td style=\"text-align:left;font-family: Courier New;\">{{ merchant.appid }}</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td style=\"text-align:left;font-weight:bold;\">app_secret:</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td style=\"text-align:left;font-family: Courier New;\">{{ merchant.appSecret }}</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</div>
\t</div>

{% endblock %}
", "FrontBundle:Merchant:detail.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/Merchant/detail.html.twig");
    }
}
