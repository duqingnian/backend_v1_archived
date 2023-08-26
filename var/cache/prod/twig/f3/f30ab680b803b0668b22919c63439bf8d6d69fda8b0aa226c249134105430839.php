<?php

/* FrontBundle:Tongji:index.html.twig */
class __TwigTemplate_2cb83b3f213c41a23bb791ff88cc83541d34f008bfc44ad93339bc0f2158e85b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::page.html.twig", "FrontBundle:Tongji:index.html.twig", 1);
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
        $__internal_9ece70a2138b87805fa53abb1353dda7e8857dfb17f60dd37c8309a1d98c5cfc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9ece70a2138b87805fa53abb1353dda7e8857dfb17f60dd37c8309a1d98c5cfc->enter($__internal_9ece70a2138b87805fa53abb1353dda7e8857dfb17f60dd37c8309a1d98c5cfc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Tongji:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9ece70a2138b87805fa53abb1353dda7e8857dfb17f60dd37c8309a1d98c5cfc->leave($__internal_9ece70a2138b87805fa53abb1353dda7e8857dfb17f60dd37c8309a1d98c5cfc_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_5e02442a726740a72d8eeef328a7c3fa7951e6d04c767c518a346e89329d2399 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5e02442a726740a72d8eeef328a7c3fa7951e6d04c767c518a346e89329d2399->enter($__internal_5e02442a726740a72d8eeef328a7c3fa7951e6d04c767c518a346e89329d2399_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "<div class=\"layui-card\">
            <div class=\"layui-form layui-card-header layuiadmin-card-header-auto\">
                <div class=\"layui-form-item\">

                    <div class=\"layui-inline\">
                        <label class=\"layui-form-label\">三方订单号:</label>
                        <div class=\"layui-input-inline\">
                            <input type=\"text\" name=\"name\" placeholder=\"三方订单号\" autocomplete=\"off\" class=\"layui-input\">
                        </div>
                    </div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"layui-inline\">
                        <label class=\"layui-form-label\">平台订单号:</label>
                        <div class=\"layui-input-inline\">
                            <input type=\"text\" name=\"name\" placeholder=\"平台订单号\" autocomplete=\"off\" class=\"layui-input\">
                        </div>
                    </div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"layui-inline\">
                        <label class=\"layui-form-label\">商户订单号:</label>
                        <div class=\"layui-input-inline\">
                            <input type=\"text\" name=\"name\" placeholder=\"商户订单号\" autocomplete=\"off\" class=\"layui-input\">
                        </div>
                    </div>

                    <div class=\"layui-inline\">
                        <button class=\"layui-btn layuiadmin-btn-list\" lay-submit lay-filter=\"LAY-app-contlist-search\">
                            <i class=\"layui-icon layui-icon-search layuiadmin-button-btn\"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class=\"layui-card-body\">
                <!--<div style=\"padding-bottom: 10px;align-items: center;\" class=\"flex\">
\t\t\t\t\t<span>共1条数据</span>
                    <button class=\"layui-btn layuiadmin-btn-list btn_prepare\" data-id=\"0\">添加</button>
                </div>-->
                <table class=\"model\">
                    <tr>
                        <td>11</td>
                        <td>11</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>11</td>
                        <td>11</td>
                    </tr>
                </table>

                <div class=\"Page flex mt15\" style=\"align-items: center; justify-content: space-between;\">
                    <nav class=\"pagination-outer\" aria-label=\"Page navigation\">
                        <ul class=\"pagination\">
                            <li class=\"page-item\">
                                <div data-page=\"1\" class=\"page-link\" style=\"width: auto;\">首页</div>
                            </li>
                            <li class=\"page-item\">
                                <div data-page=\"0\" class=\"page-link\" style=\"width: auto;\">上一页</div>
                            </li>
                            <li class=\"page-item active\">
                                <div class=\"page-link\" data-page=\"1\">1</div>
                            </li>
                            <li class=\"page-item\">
                                <div class=\"page-link\" data-page=\"2\">2</div>
                            </li>

                            <li class=\"page-item\">
                                <div class=\"page-link\" data-page=\"2\" style=\"width: auto;\">下一页</div>
                            </li>
                            <li class=\"page-item\">
                                <div class=\"page-link\" data-page=\"12\" style=\"width: auto;\">尾页</div>
                            </li>
                        </ul>
                    </nav>
                </div>

                </script>
            </div>
        </div>
\t\t
\t\t<script>
\t\t\$(document).ready(function(){
\t\t\tprepare_dialog();
\t\t});
\t\t
\t\t</script>
";
        
        $__internal_5e02442a726740a72d8eeef328a7c3fa7951e6d04c767c518a346e89329d2399->leave($__internal_5e02442a726740a72d8eeef328a7c3fa7951e6d04c767c518a346e89329d2399_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Tongji:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 4,  34 => 3,  11 => 1,);
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
<div class=\"layui-card\">
            <div class=\"layui-form layui-card-header layuiadmin-card-header-auto\">
                <div class=\"layui-form-item\">

                    <div class=\"layui-inline\">
                        <label class=\"layui-form-label\">三方订单号:</label>
                        <div class=\"layui-input-inline\">
                            <input type=\"text\" name=\"name\" placeholder=\"三方订单号\" autocomplete=\"off\" class=\"layui-input\">
                        </div>
                    </div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"layui-inline\">
                        <label class=\"layui-form-label\">平台订单号:</label>
                        <div class=\"layui-input-inline\">
                            <input type=\"text\" name=\"name\" placeholder=\"平台订单号\" autocomplete=\"off\" class=\"layui-input\">
                        </div>
                    </div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"layui-inline\">
                        <label class=\"layui-form-label\">商户订单号:</label>
                        <div class=\"layui-input-inline\">
                            <input type=\"text\" name=\"name\" placeholder=\"商户订单号\" autocomplete=\"off\" class=\"layui-input\">
                        </div>
                    </div>

                    <div class=\"layui-inline\">
                        <button class=\"layui-btn layuiadmin-btn-list\" lay-submit lay-filter=\"LAY-app-contlist-search\">
                            <i class=\"layui-icon layui-icon-search layuiadmin-button-btn\"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class=\"layui-card-body\">
                <!--<div style=\"padding-bottom: 10px;align-items: center;\" class=\"flex\">
\t\t\t\t\t<span>共1条数据</span>
                    <button class=\"layui-btn layuiadmin-btn-list btn_prepare\" data-id=\"0\">添加</button>
                </div>-->
                <table class=\"model\">
                    <tr>
                        <td>11</td>
                        <td>11</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>11</td>
                        <td>11</td>
                    </tr>
                </table>

                <div class=\"Page flex mt15\" style=\"align-items: center; justify-content: space-between;\">
                    <nav class=\"pagination-outer\" aria-label=\"Page navigation\">
                        <ul class=\"pagination\">
                            <li class=\"page-item\">
                                <div data-page=\"1\" class=\"page-link\" style=\"width: auto;\">首页</div>
                            </li>
                            <li class=\"page-item\">
                                <div data-page=\"0\" class=\"page-link\" style=\"width: auto;\">上一页</div>
                            </li>
                            <li class=\"page-item active\">
                                <div class=\"page-link\" data-page=\"1\">1</div>
                            </li>
                            <li class=\"page-item\">
                                <div class=\"page-link\" data-page=\"2\">2</div>
                            </li>

                            <li class=\"page-item\">
                                <div class=\"page-link\" data-page=\"2\" style=\"width: auto;\">下一页</div>
                            </li>
                            <li class=\"page-item\">
                                <div class=\"page-link\" data-page=\"12\" style=\"width: auto;\">尾页</div>
                            </li>
                        </ul>
                    </nav>
                </div>

                </script>
            </div>
        </div>
\t\t
\t\t<script>
\t\t\$(document).ready(function(){
\t\t\tprepare_dialog();
\t\t});
\t\t
\t\t</script>
{% endblock %}", "FrontBundle:Tongji:index.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/Tongji/index.html.twig");
    }
}
