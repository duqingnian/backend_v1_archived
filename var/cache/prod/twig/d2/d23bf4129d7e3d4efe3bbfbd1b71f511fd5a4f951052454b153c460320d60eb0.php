<?php

/* FrontBundle::page.html.twig */
class __TwigTemplate_3419e66b4a00ba82edca99094b40b041671de6e2e4775b77c3e62135b89ddf69 extends Twig_Template
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
        $__internal_fe240a0ece728a32c8214e13e51a9e285c725ca6350ad1036dabd3c7de00b64c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_fe240a0ece728a32c8214e13e51a9e285c725ca6350ad1036dabd3c7de00b64c->enter($__internal_fe240a0ece728a32c8214e13e51a9e285c725ca6350ad1036dabd3c7de00b64c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle::page.html.twig"));

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
\t<script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery/jquery-3.6.0.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/layer/layer.js"), "html", null, true);
        echo "?v=1\"></script>
\t<script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("ui_core/layui/layui.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/base.js"), "html", null, true);
        echo "\"></script>
\t<script>
\t\t";
        // line 17
        $context["_route"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method");
        // line 18
        echo "\t\tvar _route=\"";
        echo twig_escape_filter($this->env, (isset($context["_route"]) ? $context["_route"] : $this->getContext($context, "_route")), "html", null, true);
        echo "\";
\t</script>
</head>
<body>
<div class=\"layui-fluid\">
    <div class=\"layui-row layui-col-space15\">
\t\t<div class=\"layui-col-md12\">";
        // line 24
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
\t</div>
</div>

<style>
.model tr td{
    box-sizing: border-box;
    text-overflow: ellipsis;
    vertical-align: middle;
    position: relative;
}
.model .cell {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    word-break: break-all;
    line-height: 20px;
    padding-left: 1px;
    padding-right: 1px;
}
</style>

</body>
</html>";
        
        $__internal_fe240a0ece728a32c8214e13e51a9e285c725ca6350ad1036dabd3c7de00b64c->leave($__internal_fe240a0ece728a32c8214e13e51a9e285c725ca6350ad1036dabd3c7de00b64c_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_5e9897e2dffd76cd245bfbb0ce804fcd3aeec018aa3fa604e024e62704a323c1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5e9897e2dffd76cd245bfbb0ce804fcd3aeec018aa3fa604e024e62704a323c1->enter($__internal_5e9897e2dffd76cd245bfbb0ce804fcd3aeec018aa3fa604e024e62704a323c1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "TITLE";
        
        $__internal_5e9897e2dffd76cd245bfbb0ce804fcd3aeec018aa3fa604e024e62704a323c1->leave($__internal_5e9897e2dffd76cd245bfbb0ce804fcd3aeec018aa3fa604e024e62704a323c1_prof);

    }

    // line 24
    public function block_content($context, array $blocks = array())
    {
        $__internal_0eb6e8277673f7f72974e6b4b0731cec64729137b499b9a7a243b0c02e8e6908 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0eb6e8277673f7f72974e6b4b0731cec64729137b499b9a7a243b0c02e8e6908->enter($__internal_0eb6e8277673f7f72974e6b4b0731cec64729137b499b9a7a243b0c02e8e6908_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_0eb6e8277673f7f72974e6b4b0731cec64729137b499b9a7a243b0c02e8e6908->leave($__internal_0eb6e8277673f7f72974e6b4b0731cec64729137b499b9a7a243b0c02e8e6908_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle::page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 24,  108 => 5,  75 => 24,  65 => 18,  63 => 17,  58 => 15,  54 => 14,  50 => 13,  46 => 12,  42 => 11,  38 => 10,  30 => 5,  24 => 1,);
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
\t<script src=\"{{ asset('js/jquery/jquery-3.6.0.min.js') }}\"></script>
\t<script src=\"{{ asset('js/layer/layer.js') }}?v=1\"></script>
\t<script src=\"{{ asset('ui_core/layui/layui.js') }}\"></script>
\t<script src=\"{{ asset('js/base.js') }}\"></script>
\t<script>
\t\t{% set _route = app.request.attributes.get('_route') %}
\t\tvar _route=\"{{ _route }}\";
\t</script>
</head>
<body>
<div class=\"layui-fluid\">
    <div class=\"layui-row layui-col-space15\">
\t\t<div class=\"layui-col-md12\">{% block content %}{% endblock %}</div>
\t</div>
</div>

<style>
.model tr td{
    box-sizing: border-box;
    text-overflow: ellipsis;
    vertical-align: middle;
    position: relative;
}
.model .cell {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    word-break: break-all;
    line-height: 20px;
    padding-left: 1px;
    padding-right: 1px;
}
</style>

</body>
</html>", "FrontBundle::page.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/page.html.twig");
    }
}
