<?php

/* FrontBundle:Channel:index.html.twig */
class __TwigTemplate_bcd41fc79239637f945f9793bbd97fde2be162c469a82da13da391cdd2ca1050 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::page.html.twig", "FrontBundle:Channel:index.html.twig", 1);
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
        $__internal_104fc5797924bbe834ffe7691ff46049aebcec6edfcdfb62b96d210fb980aa7d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_104fc5797924bbe834ffe7691ff46049aebcec6edfcdfb62b96d210fb980aa7d->enter($__internal_104fc5797924bbe834ffe7691ff46049aebcec6edfcdfb62b96d210fb980aa7d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Channel:index.html.twig"));

        // line 2
        $context["_url"] = (($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_channel") . "?filter_name=") . (isset($context["filter_name"]) ? $context["filter_name"] : $this->getContext($context, "filter_name")));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_104fc5797924bbe834ffe7691ff46049aebcec6edfcdfb62b96d210fb980aa7d->leave($__internal_104fc5797924bbe834ffe7691ff46049aebcec6edfcdfb62b96d210fb980aa7d_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_931bc6619e09bc775c50a0d2a2b2b3ed2f7c4b5e37190d02e8021787c4795297 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_931bc6619e09bc775c50a0d2a2b2b3ed2f7c4b5e37190d02e8021787c4795297->enter($__internal_931bc6619e09bc775c50a0d2a2b2b3ed2f7c4b5e37190d02e8021787c4795297_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 4
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
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "total", array()), "html", null, true);
        echo " 个通道</span>
                    ";
        // line 26
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()) == 1)) {
            echo "<button class=\"layui-btn layuiadmin-btn-list btn_prepare\" data-id=\"0\">添加通道</button>";
        }
        // line 27
        echo "                </div>
                <table class=\"model\">
                    <tr>
                        <td>编号</td>
                        <td>名称</td>
                        <td>代收比例</td>
                        <td>支付类型</td>
                        <td>国家</td>
                        <td>货币</td>
                        <td>状态</td>
                        ";
        // line 37
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()) == 1)) {
            echo "<td>管理操作</td>";
        }
        // line 38
        echo "                    </tr>
\t\t\t\t\t";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "data", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 40
            echo "                   <tr id=\"tr-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "id", array()), "html", null, true);
            echo "\">
                        <td>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "name", array()), "html", null, true);
            echo "(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "slug", array()), "html", null, true);
            echo ")</td>
                        <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "percent", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "pay_type", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "country", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "currency", array()), "html", null, true);
            echo "</td>
                        <td>
\t\t\t\t\t\t\t";
            // line 48
            if ($this->getAttribute($context["c"], "is_active", array())) {
                // line 49
                echo "\t\t\t\t\t\t\t\t<svg t=\"1692254573030\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"4776\" width=\"32\" height=\"32\"><path d=\"M512 964.213335c-249.349021 0-452.209242-202.864314-452.209242-452.218452 0-249.349021 202.860221-452.209242 452.209242-452.209242 249.350045 0 452.210265 202.860221 452.210265 452.209242 0 249.354138-202.860221 452.218452-452.210265 452.218452z m0-838.95554c-213.247802 0-386.737088 173.489286-386.737088 386.737088 0 213.251895 173.489286 386.745275 386.737088 386.745275s386.738112-173.493379 386.738112-386.745275c0-213.247802-173.491333-386.737088-386.738112-386.737088z\" fill=\"#14cd21\" p-id=\"4777\"></path><path d=\"M512 959.862237c-246.951415 0-447.858144-200.916962-447.858144-447.867354 0-246.950392 200.907753-447.858144 447.858144-447.858144s447.858144 200.906729 447.858144 447.858144c0.001023 246.951415-200.906729 447.867354-447.858144 447.867354z m0-838.954516c-215.645408 0-391.088186 175.441754-391.088186 391.087162 0 215.646432 175.441754 391.095349 391.088186 391.09535s391.088186-175.450964 391.088186-391.09535c0-215.645408-175.441754-391.087163-391.088186-391.087162z\" fill=\"#14cd21\" p-id=\"4778\"></path><path d=\"M290.62817 532.063965l46.291303-46.291303 134.173862 134.163629 220.99423-319.384097 53.838185 37.254485-265.645172 383.919926z\" fill=\"#14cd21\" p-id=\"4779\"></path><path d=\"M479.669664 714.962551l-182.889377-182.898586 40.139186-40.138163 134.784776 134.775566 221.48644-320.094272 46.680159 32.302707z\" fill=\"#14cd21\" p-id=\"4780\"></path></svg>
\t\t\t\t\t\t\t";
            } else {
                // line 51
                echo "\t\t\t\t\t\t\t\t<svg t=\"1692254615637\" class=\"icon\" viewBox=\"0 0 1025 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"5953\" width=\"32\" height=\"32\"><path d=\"M982.668821 313.74918c-25.810101-60.752236-62.714-115.373446-109.685763-162.346233-46.972787-46.971763-101.593997-83.875662-162.346233-109.685763C647.666853 14.966132 580.925912 1.401699 512.268258 1.401699S376.868639 14.966132 313.898667 41.717184c-60.752236 25.810101-115.373446 62.714-162.346233 109.685763-46.971763 46.972787-83.875662 101.593997-109.685763 162.346233C15.115619 376.719151 1.551186 443.460092 1.551186 512.118771S15.115619 647.517366 41.866671 710.487337c25.810101 60.75326 62.714 115.37447 109.685763 162.346233 46.971763 46.972787 101.592974 83.876686 162.346233 109.685763 62.969971 26.752076 129.710912 40.316509 198.369591 40.316509s135.398595-13.564433 198.368567-40.316509c60.75326-25.809077 115.37447-62.712976 162.346233-109.685763 46.972787-46.971763 83.876686-101.592974 109.685763-162.346233 26.752076-62.969971 40.316509-129.710912 40.316509-198.368567S1009.419873 376.719151 982.668821 313.74918zM937.435615 691.271058c-23.333323 54.923257-56.71096 104.317532-99.204249 146.811845-42.494313 42.493289-91.888588 75.870926-146.811845 99.204249-56.8584 24.155503-117.133505 36.403219-179.152287 36.403219-62.018782 0-122.293887-12.247716-179.152287-36.403219-54.923257-23.333323-104.317532-56.71096-146.810821-99.204249-42.493289-42.494313-75.870926-91.888588-99.204249-146.811845C62.944374 634.412658 50.697682 574.136529 50.697682 512.118771c0-62.018782 12.247716-122.293887 36.403219-179.152287 23.333323-54.923257 56.709936-104.317532 99.204249-146.810821s91.888588-75.870926 146.810821-99.204249c56.8584-24.155503 117.133505-36.403219 179.152287-36.403219 62.017758 0 122.292863 12.247716 179.152287 36.403219 54.923257 23.333323 104.317532 56.709936 146.810821 99.204249 42.494313 42.493289 75.870926 91.888588 99.205273 146.810821 24.155503 56.8584 36.403219 117.134529 36.403219 179.152287S961.591118 634.412658 937.435615 691.271058z\" fill=\"#d81e06\" p-id=\"5954\"></path><path d=\"M704.62457 319.769626c-9.997216-9.996192-26.203273-9.996192-36.199466 0L512.382933 475.810773 356.341786 319.769626c-9.996192-9.996192-26.204297-9.996192-36.199466 0-9.996192 9.996192-9.996192 26.203273 0 36.199466l156.041147 156.041147L320.14232 668.05241c-9.996192 9.997216-9.996192 26.204297 0 36.199466 4.997584 4.998608 11.549426 7.496888 18.100245 7.496888s13.101637-2.49828 18.100245-7.496888l156.041147-156.041147L668.424081 704.251876c4.998608 4.998608 11.548403 7.496888 18.100245 7.496888s13.101637-2.49828 18.100245-7.496888c9.996192-9.996192 9.996192-26.203273 0-36.199466L548.583423 512.011263l156.041147-156.041147C714.620762 345.973923 714.620762 329.765818 704.62457 319.769626z\" fill=\"#d81e06\" p-id=\"5955\"></path></svg>
\t\t\t\t\t\t\t";
            }
            // line 53
            echo "\t\t\t\t\t\t</td>
                        ";
            // line 54
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()) == 1)) {
                // line 55
                echo "\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<button class=\"button button-blue btn_prepare mr10\"  data-id=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "id", array()), "html", null, true);
                echo "\" data-name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "name", array()), "html", null, true);
                echo "\">编辑</button>
\t\t\t\t\t\t\t<button class=\"button button-red btn_delete\"         data-id=\"";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "id", array()), "html", null, true);
                echo "\" data-name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "name", array()), "html", null, true);
                echo "\" data-token=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "token", array()), "html", null, true);
                echo "\">删除</button>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t";
            }
            // line 60
            echo "                    </tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "                </table>

                <div class=\"Page flex mt15\" style=\"align-items: center; justify-content: space-between;\">
                    <nav class=\"pagination-outer\" aria-label=\"Page navigation\">
                        <ul class=\"pagination\">
                            <li class=\"page-item\">
                                <a href=\"";
        // line 68
        echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
        echo "&page=1\" class=\"page-link\" style=\"width: auto;\">首页</a>
                            </li>
                            <li class=\"page-item\">
                                <a href=\"";
        // line 71
        echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
        echo "&page=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "prev", array()), "html", null, true);
        echo "\" class=\"page-link\" style=\"width: auto;\">上一页</a>
                            </li>

\t\t\t\t\t\t\t";
        // line 74
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range($this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "min", array()), $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "max", array())));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 75
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
        // line 77
        echo "
                            <li class=\"page-item\">
                                <a href=\"";
        // line 79
        echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
        echo "&page=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "next", array()), "html", null, true);
        echo "\" class=\"page-link\" style=\"width: auto;\">下一页</a>
                            </li>
                            <li class=\"page-item\">
                                <a href=\"";
        // line 82
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
\t\t\t\tprepare(0 == id ? \"添加通道\" : \"编辑通道\",\"";
        // line 105
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_channel");
        echo "?action=prepare&id=\"+id,'460px',\"92%\");
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
        // line 119
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_channel");
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
        
        $__internal_931bc6619e09bc775c50a0d2a2b2b3ed2f7c4b5e37190d02e8021787c4795297->leave($__internal_931bc6619e09bc775c50a0d2a2b2b3ed2f7c4b5e37190d02e8021787c4795297_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Channel:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 119,  253 => 105,  225 => 82,  217 => 79,  213 => 77,  196 => 75,  192 => 74,  184 => 71,  178 => 68,  170 => 62,  163 => 60,  153 => 57,  147 => 56,  144 => 55,  142 => 54,  139 => 53,  135 => 51,  131 => 49,  129 => 48,  124 => 46,  120 => 45,  116 => 44,  112 => 43,  106 => 42,  102 => 41,  97 => 40,  93 => 39,  90 => 38,  86 => 37,  74 => 27,  70 => 26,  66 => 25,  43 => 4,  37 => 3,  30 => 1,  28 => 2,  11 => 1,);
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
{% set _url = path(\"front_channel\") ~ \"?filter_name=\" ~ filter_name %}
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
\t\t\t\t\t<span>共 {{ pager.pager.total }} 个通道</span>
                    {% if app.user.id == 1 %}<button class=\"layui-btn layuiadmin-btn-list btn_prepare\" data-id=\"0\">添加通道</button>{% endif %}
                </div>
                <table class=\"model\">
                    <tr>
                        <td>编号</td>
                        <td>名称</td>
                        <td>代收比例</td>
                        <td>支付类型</td>
                        <td>国家</td>
                        <td>货币</td>
                        <td>状态</td>
                        {% if app.user.id == 1 %}<td>管理操作</td>{% endif %}
                    </tr>
\t\t\t\t\t{% for c in pager.data %}
                   <tr id=\"tr-{{ c.id }}\">
                        <td>{{ c.id }}</td>
                        <td>{{ c.name }}({{ c.slug }})</td>
                        <td>{{ c.percent }}</td>
                        <td>{{ c.pay_type }}</td>
                        <td>{{ c.country }}</td>
                        <td>{{ c.currency }}</td>
                        <td>
\t\t\t\t\t\t\t{% if c.is_active %}
\t\t\t\t\t\t\t\t<svg t=\"1692254573030\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"4776\" width=\"32\" height=\"32\"><path d=\"M512 964.213335c-249.349021 0-452.209242-202.864314-452.209242-452.218452 0-249.349021 202.860221-452.209242 452.209242-452.209242 249.350045 0 452.210265 202.860221 452.210265 452.209242 0 249.354138-202.860221 452.218452-452.210265 452.218452z m0-838.95554c-213.247802 0-386.737088 173.489286-386.737088 386.737088 0 213.251895 173.489286 386.745275 386.737088 386.745275s386.738112-173.493379 386.738112-386.745275c0-213.247802-173.491333-386.737088-386.738112-386.737088z\" fill=\"#14cd21\" p-id=\"4777\"></path><path d=\"M512 959.862237c-246.951415 0-447.858144-200.916962-447.858144-447.867354 0-246.950392 200.907753-447.858144 447.858144-447.858144s447.858144 200.906729 447.858144 447.858144c0.001023 246.951415-200.906729 447.867354-447.858144 447.867354z m0-838.954516c-215.645408 0-391.088186 175.441754-391.088186 391.087162 0 215.646432 175.441754 391.095349 391.088186 391.09535s391.088186-175.450964 391.088186-391.09535c0-215.645408-175.441754-391.087163-391.088186-391.087162z\" fill=\"#14cd21\" p-id=\"4778\"></path><path d=\"M290.62817 532.063965l46.291303-46.291303 134.173862 134.163629 220.99423-319.384097 53.838185 37.254485-265.645172 383.919926z\" fill=\"#14cd21\" p-id=\"4779\"></path><path d=\"M479.669664 714.962551l-182.889377-182.898586 40.139186-40.138163 134.784776 134.775566 221.48644-320.094272 46.680159 32.302707z\" fill=\"#14cd21\" p-id=\"4780\"></path></svg>
\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<svg t=\"1692254615637\" class=\"icon\" viewBox=\"0 0 1025 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"5953\" width=\"32\" height=\"32\"><path d=\"M982.668821 313.74918c-25.810101-60.752236-62.714-115.373446-109.685763-162.346233-46.972787-46.971763-101.593997-83.875662-162.346233-109.685763C647.666853 14.966132 580.925912 1.401699 512.268258 1.401699S376.868639 14.966132 313.898667 41.717184c-60.752236 25.810101-115.373446 62.714-162.346233 109.685763-46.971763 46.972787-83.875662 101.593997-109.685763 162.346233C15.115619 376.719151 1.551186 443.460092 1.551186 512.118771S15.115619 647.517366 41.866671 710.487337c25.810101 60.75326 62.714 115.37447 109.685763 162.346233 46.971763 46.972787 101.592974 83.876686 162.346233 109.685763 62.969971 26.752076 129.710912 40.316509 198.369591 40.316509s135.398595-13.564433 198.368567-40.316509c60.75326-25.809077 115.37447-62.712976 162.346233-109.685763 46.972787-46.971763 83.876686-101.592974 109.685763-162.346233 26.752076-62.969971 40.316509-129.710912 40.316509-198.368567S1009.419873 376.719151 982.668821 313.74918zM937.435615 691.271058c-23.333323 54.923257-56.71096 104.317532-99.204249 146.811845-42.494313 42.493289-91.888588 75.870926-146.811845 99.204249-56.8584 24.155503-117.133505 36.403219-179.152287 36.403219-62.018782 0-122.293887-12.247716-179.152287-36.403219-54.923257-23.333323-104.317532-56.71096-146.810821-99.204249-42.493289-42.494313-75.870926-91.888588-99.204249-146.811845C62.944374 634.412658 50.697682 574.136529 50.697682 512.118771c0-62.018782 12.247716-122.293887 36.403219-179.152287 23.333323-54.923257 56.709936-104.317532 99.204249-146.810821s91.888588-75.870926 146.810821-99.204249c56.8584-24.155503 117.133505-36.403219 179.152287-36.403219 62.017758 0 122.292863 12.247716 179.152287 36.403219 54.923257 23.333323 104.317532 56.709936 146.810821 99.204249 42.494313 42.493289 75.870926 91.888588 99.205273 146.810821 24.155503 56.8584 36.403219 117.134529 36.403219 179.152287S961.591118 634.412658 937.435615 691.271058z\" fill=\"#d81e06\" p-id=\"5954\"></path><path d=\"M704.62457 319.769626c-9.997216-9.996192-26.203273-9.996192-36.199466 0L512.382933 475.810773 356.341786 319.769626c-9.996192-9.996192-26.204297-9.996192-36.199466 0-9.996192 9.996192-9.996192 26.203273 0 36.199466l156.041147 156.041147L320.14232 668.05241c-9.996192 9.997216-9.996192 26.204297 0 36.199466 4.997584 4.998608 11.549426 7.496888 18.100245 7.496888s13.101637-2.49828 18.100245-7.496888l156.041147-156.041147L668.424081 704.251876c4.998608 4.998608 11.548403 7.496888 18.100245 7.496888s13.101637-2.49828 18.100245-7.496888c9.996192-9.996192 9.996192-26.203273 0-36.199466L548.583423 512.011263l156.041147-156.041147C714.620762 345.973923 714.620762 329.765818 704.62457 319.769626z\" fill=\"#d81e06\" p-id=\"5955\"></path></svg>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</td>
                        {% if app.user.id == 1 %}
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<button class=\"button button-blue btn_prepare mr10\"  data-id=\"{{ c.id }}\" data-name=\"{{ c.name }}\">编辑</button>
\t\t\t\t\t\t\t<button class=\"button button-red btn_delete\"         data-id=\"{{ c.id }}\" data-name=\"{{ c.name }}\" data-token=\"{{ c.token }}\">删除</button>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t{% endif %}
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
\t\t\t\tprepare(0 == id ? \"添加通道\" : \"编辑通道\",\"{{ path(\"front_channel\") }}?action=prepare&id=\"+id,'460px',\"92%\");
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
\t\t\t\t\tajax(\"{{ path(\"front_channel\") }}?action=delete&id=\"+id,{id:id,token:token},function(json){
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
{% endblock %}", "FrontBundle:Channel:index.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/Channel/index.html.twig");
    }
}
