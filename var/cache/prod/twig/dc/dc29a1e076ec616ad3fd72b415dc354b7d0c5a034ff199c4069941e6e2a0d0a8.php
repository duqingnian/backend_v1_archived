<?php

/* FrontBundle:Merchant:index.html.twig */
class __TwigTemplate_6d7cb5cf8d9ad70feb1a6208e4044d869e3e830623343eb8eb72c47691c8aaad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::page.html.twig", "FrontBundle:Merchant:index.html.twig", 1);
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
        $__internal_6d7888f3c13b18de27b2f49530850b7ca52ff324068ed47d72a589f1b0b9c6d4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6d7888f3c13b18de27b2f49530850b7ca52ff324068ed47d72a589f1b0b9c6d4->enter($__internal_6d7888f3c13b18de27b2f49530850b7ca52ff324068ed47d72a589f1b0b9c6d4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Merchant:index.html.twig"));

        // line 3
        $context["_url"] = (($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_merchant") . "?filter_name=") . (isset($context["filter_name"]) ? $context["filter_name"] : $this->getContext($context, "filter_name")));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6d7888f3c13b18de27b2f49530850b7ca52ff324068ed47d72a589f1b0b9c6d4->leave($__internal_6d7888f3c13b18de27b2f49530850b7ca52ff324068ed47d72a589f1b0b9c6d4_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_f867b5e58deae880e09fb22a255a1e8dcb97a3e197fb58e3be1490a4a4fba36c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f867b5e58deae880e09fb22a255a1e8dcb97a3e197fb58e3be1490a4a4fba36c->enter($__internal_f867b5e58deae880e09fb22a255a1e8dcb97a3e197fb58e3be1490a4a4fba36c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "\t<div class=\"layui-card\">
            <div class=\"layui-form layui-card-header layuiadmin-card-header-auto\">
                <div class=\"layui-form-item\">

                    <div class=\"layui-inline\">
                        <label class=\"layui-form-label\">名称:</label>
                        <div class=\"layui-input-inline\">
                            <input type=\"text\" name=\"name\" placeholder=\"请输入\" autocomplete=\"off\" class=\"layui-input\">
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
                <div style=\"padding-bottom: 10px;align-items: center;\" class=\"flex\">
\t\t\t\t\t<span>共 ";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "total", array()), "html", null, true);
        echo " 个商户</span>
                    <button class=\"layui-btn layuiadmin-btn-list btn_prepare\" data-id=\"0\">添加商户</button>
                </div>
                <table class=\"model\">
                    <tr>
                        <td>编号</td>
                        <td>名称</td>
                        <td>通道</td>
                        <td>代收费率\t</td>
                        <td>代收</td>
                        <td>代付</td>
                        <td>提现</td>
                        <td>充值</td>
                        <td>管理操作</td>
                    </tr>
\t\t\t\t\t";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "data", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["mt"]) {
            // line 43
            echo "                   <tr id=\"tr-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "id", array()), "html", null, true);
            echo "\">
                        <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "display_name", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "channel", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["mt"], "merchant", array()), "percent", array()), "html", null, true);
            echo "%</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>
\t\t\t\t\t\t\t<button class=\"button button-orange btn_detail mr10\" data-id=\"";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "id", array()), "html", null, true);
            echo "\" data-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "display_name", array()), "html", null, true);
            echo "\">详情</button>
\t\t\t\t\t\t\t<button class=\"button button-blue btn_prepare mr10\"  data-id=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "id", array()), "html", null, true);
            echo "\" data-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "display_name", array()), "html", null, true);
            echo "\">编辑</button>
\t\t\t\t\t\t\t<button class=\"button button-red btn_delete\"         data-id=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "id", array()), "html", null, true);
            echo "\" data-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "display_name", array()), "html", null, true);
            echo "\" data-token=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["mt"], "token", array()), "html", null, true);
            echo "\">删除</button>
\t\t\t\t\t\t</td>
                    </tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "                </table>

                <div class=\"Page flex mt15\" style=\"align-items: center; justify-content: space-between;\">
                    <nav class=\"pagination-outer\" aria-label=\"Page navigation\">
                        <ul class=\"pagination\">
                            <li class=\"page-item\">
                                <a href=\"";
        // line 65
        echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
        echo "&page=1\" class=\"page-link\" style=\"width: auto;\">首页</a>
                            </li>
                            <li class=\"page-item\">
                                <a href=\"";
        // line 68
        echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
        echo "&page=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "prev", array()), "html", null, true);
        echo "\" class=\"page-link\" style=\"width: auto;\">上一页</a>
                            </li>

\t\t\t\t\t\t\t";
        // line 71
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range($this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "min", array()), $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "max", array())));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 72
            echo "\t\t\t\t\t\t\t\t<li class=\"page-item ";
            if (($context["p"] == $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "page", array()))) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
            echo "&page=";
            echo twig_escape_filter($this->env, $context["p"], "html", null, true);
            echo "\" class=\"page-link\">";
            echo twig_escape_filter($this->env, $context["p"], "html", null, true);
            echo "</a></li>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "
                            <li class=\"page-item\">
                                <a href=\"";
        // line 76
        echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
        echo "&page=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "next", array()), "html", null, true);
        echo "\" class=\"page-link\" style=\"width: auto;\">下一页</a>
                            </li>
                            <li class=\"page-item\">
                                <a href=\"";
        // line 79
        echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
        echo "&page=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "pages", array()), "html", null, true);
        echo "\" class=\"page-link\" style=\"width: auto;\">尾页</a>
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
\t\t\tinit_detail();
\t\t\tinit_delete();
\t\t});
\t\t
\t\t
\t\t//添加 编辑
\t\tfunction prepare_dialog()
\t\t{
\t\t\t\$('.btn_prepare').click(function(){
\t\t\t\tvar id = \$(this).attr('data-id');
\t\t\t\tprepare(0 == id ? \"添加\" : \"编辑\",\"";
        // line 102
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_merchant");
        echo "?action=prepare&id=\"+id,'460px',\"92%\");
\t\t\t});
\t\t}
\t\t
\t\t//商户详情
\t\tfunction init_detail()
\t\t{
\t\t\t\$('.btn_detail').click(function(){
\t\t\t\tvar id = \$(this).attr('data-id');
\t\t\t\tvar name = \$(this).attr('data-name');
\t\t\t\tprepare(\"商户详情 - \"+name,\"";
        // line 112
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_merchant");
        echo "?action=detail&id=\"+id,'680px',\"92%\");
\t\t\t});
\t\t}
\t\t
\t\t//删除
\t\tfunction init_delete()
\t\t{
\t\t\t\$('.btn_delete').click(function(){
\t\t\t\tvar id = \$(this).attr('data-id');
\t\t\t\tvar name = \$(this).attr('data-name');
\t\t\t\tvar token = \$(this).attr('data-token');

\t\t\t\tlayer.confirm(\"确定删除:\"+name+\"吗？\", {btn: ['确定','取消']}, function(index){
\t\t\t\t\tajax(\"";
        // line 125
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_merchant");
        echo "?action=delete&id=\"+id,{id:id,token:token},function(json){
\t\t\t\t\t\tlayer.close(index);
\t\t\t\t\t\tlayer.msg(json.msg);
\t\t\t\t\t\tif(0 == json.code)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$('#tr-'+id).remove();
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t});
\t\t\t});
\t\t}
\t\t</script>
";
        
        $__internal_f867b5e58deae880e09fb22a255a1e8dcb97a3e197fb58e3be1490a4a4fba36c->leave($__internal_f867b5e58deae880e09fb22a255a1e8dcb97a3e197fb58e3be1490a4a4fba36c_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Merchant:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  252 => 125,  236 => 112,  223 => 102,  195 => 79,  187 => 76,  183 => 74,  166 => 72,  162 => 71,  154 => 68,  148 => 65,  140 => 59,  126 => 55,  120 => 54,  114 => 53,  105 => 47,  101 => 46,  97 => 45,  93 => 44,  88 => 43,  84 => 42,  66 => 27,  43 => 6,  37 => 5,  30 => 1,  28 => 3,  11 => 1,);
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

{% set _url = path(\"front_merchant\") ~ \"?filter_name=\" ~ filter_name %}

{% block content %}
\t<div class=\"layui-card\">
            <div class=\"layui-form layui-card-header layuiadmin-card-header-auto\">
                <div class=\"layui-form-item\">

                    <div class=\"layui-inline\">
                        <label class=\"layui-form-label\">名称:</label>
                        <div class=\"layui-input-inline\">
                            <input type=\"text\" name=\"name\" placeholder=\"请输入\" autocomplete=\"off\" class=\"layui-input\">
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
                <div style=\"padding-bottom: 10px;align-items: center;\" class=\"flex\">
\t\t\t\t\t<span>共 {{ pager.pager.total }} 个商户</span>
                    <button class=\"layui-btn layuiadmin-btn-list btn_prepare\" data-id=\"0\">添加商户</button>
                </div>
                <table class=\"model\">
                    <tr>
                        <td>编号</td>
                        <td>名称</td>
                        <td>通道</td>
                        <td>代收费率\t</td>
                        <td>代收</td>
                        <td>代付</td>
                        <td>提现</td>
                        <td>充值</td>
                        <td>管理操作</td>
                    </tr>
\t\t\t\t\t{% for mt in pager.data %}
                   <tr id=\"tr-{{ mt.id }}\">
                        <td>{{ mt.id }}</td>
                        <td>{{ mt.display_name }}</td>
                        <td>{{ mt.channel }}</td>
                        <td>{{ mt.merchant.percent }}%</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>
\t\t\t\t\t\t\t<button class=\"button button-orange btn_detail mr10\" data-id=\"{{ mt.id }}\" data-name=\"{{ mt.display_name }}\">详情</button>
\t\t\t\t\t\t\t<button class=\"button button-blue btn_prepare mr10\"  data-id=\"{{ mt.id }}\" data-name=\"{{ mt.display_name }}\">编辑</button>
\t\t\t\t\t\t\t<button class=\"button button-red btn_delete\"         data-id=\"{{ mt.id }}\" data-name=\"{{ mt.display_name }}\" data-token=\"{{ mt.token }}\">删除</button>
\t\t\t\t\t\t</td>
                    </tr>
\t\t\t\t\t{% endfor %}
                </table>

                <div class=\"Page flex mt15\" style=\"align-items: center; justify-content: space-between;\">
                    <nav class=\"pagination-outer\" aria-label=\"Page navigation\">
                        <ul class=\"pagination\">
                            <li class=\"page-item\">
                                <a href=\"{{ _url }}&page=1\" class=\"page-link\" style=\"width: auto;\">首页</a>
                            </li>
                            <li class=\"page-item\">
                                <a href=\"{{ _url }}&page={{ pager.pager.prev }}\" class=\"page-link\" style=\"width: auto;\">上一页</a>
                            </li>

\t\t\t\t\t\t\t{% for p in pager.pager.min..pager.pager.max %}
\t\t\t\t\t\t\t\t<li class=\"page-item {% if p == pager.pager.page %}active{% endif %}\"><a href=\"{{ _url }}&page={{ p }}\" class=\"page-link\">{{ p }}</a></li>
\t\t\t\t\t\t\t{% endfor %}

                            <li class=\"page-item\">
                                <a href=\"{{ _url }}&page={{ pager.pager.next }}\" class=\"page-link\" style=\"width: auto;\">下一页</a>
                            </li>
                            <li class=\"page-item\">
                                <a href=\"{{ _url }}&page={{ pager.pager.pages }}\" class=\"page-link\" style=\"width: auto;\">尾页</a>
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
\t\t\tinit_detail();
\t\t\tinit_delete();
\t\t});
\t\t
\t\t
\t\t//添加 编辑
\t\tfunction prepare_dialog()
\t\t{
\t\t\t\$('.btn_prepare').click(function(){
\t\t\t\tvar id = \$(this).attr('data-id');
\t\t\t\tprepare(0 == id ? \"添加\" : \"编辑\",\"{{ path(\"front_merchant\") }}?action=prepare&id=\"+id,'460px',\"92%\");
\t\t\t});
\t\t}
\t\t
\t\t//商户详情
\t\tfunction init_detail()
\t\t{
\t\t\t\$('.btn_detail').click(function(){
\t\t\t\tvar id = \$(this).attr('data-id');
\t\t\t\tvar name = \$(this).attr('data-name');
\t\t\t\tprepare(\"商户详情 - \"+name,\"{{ path(\"front_merchant\") }}?action=detail&id=\"+id,'680px',\"92%\");
\t\t\t});
\t\t}
\t\t
\t\t//删除
\t\tfunction init_delete()
\t\t{
\t\t\t\$('.btn_delete').click(function(){
\t\t\t\tvar id = \$(this).attr('data-id');
\t\t\t\tvar name = \$(this).attr('data-name');
\t\t\t\tvar token = \$(this).attr('data-token');

\t\t\t\tlayer.confirm(\"确定删除:\"+name+\"吗？\", {btn: ['确定','取消']}, function(index){
\t\t\t\t\tajax(\"{{ path(\"front_merchant\") }}?action=delete&id=\"+id,{id:id,token:token},function(json){
\t\t\t\t\t\tlayer.close(index);
\t\t\t\t\t\tlayer.msg(json.msg);
\t\t\t\t\t\tif(0 == json.code)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$('#tr-'+id).remove();
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t});
\t\t\t});
\t\t}
\t\t</script>
{% endblock %}", "FrontBundle:Merchant:index.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/Merchant/index.html.twig");
    }
}
