<?php

/* FrontBundle:Channel:prepare.html.twig */
class __TwigTemplate_4d04677b5676debac0df1a11891a46ad07b0bcfe9253746146960e8ac06202d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::page.html.twig", "FrontBundle:Channel:prepare.html.twig", 1);
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
        $__internal_cb379adbe05f2bb9daaf01272df423bf0c9187e56d0f95b9a013fc9a50121c44 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cb379adbe05f2bb9daaf01272df423bf0c9187e56d0f95b9a013fc9a50121c44->enter($__internal_cb379adbe05f2bb9daaf01272df423bf0c9187e56d0f95b9a013fc9a50121c44_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Channel:prepare.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_cb379adbe05f2bb9daaf01272df423bf0c9187e56d0f95b9a013fc9a50121c44->leave($__internal_cb379adbe05f2bb9daaf01272df423bf0c9187e56d0f95b9a013fc9a50121c44_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_0936c11ab64d40382e9533b3213cd1bef5d61444ced42c740aa77329632587f0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0936c11ab64d40382e9533b3213cd1bef5d61444ced42c740aa77329632587f0->enter($__internal_0936c11ab64d40382e9533b3213cd1bef5d61444ced42c740aa77329632587f0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "\t<div class=\"layui-card\">
\t\t<div class=\"layui-card-body\">
\t\t\t<form class=\"layui-form\" id=\"std-form\" lay-filter=\"component-form-element\">
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">名称：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"name\" id=\"name\" lay-verify=\"required\" placeholder=\"请输入名称\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

                <div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">比率：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"percent\" id=\"percent\" lay-verify=\"required\" placeholder=\"请输入比率\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">支付类型：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"radio\" id=\"PAY_TYPE_AJAX\" name=\"pay_type\" value=\"AJAX\" title=\"AJAX\" />
\t\t\t\t\t\t\t<input type=\"radio\" id=\"PAY_TYPE_JUMP\" name=\"pay_type\" value=\"JUMP\" title=\"跳转\" checked />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">别名：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"slug\" id=\"slug\" lay-verify=\"required\" placeholder=\"请输入别名\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">国家：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"country\" id=\"country\" lay-verify=\"required\" placeholder=\"请输入国家\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">货币：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"currency\" id=\"currency\" lay-verify=\"required\" placeholder=\"请输入货币\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

                <div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\"></label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"is_active\" id=\"is_active\" title=\"激活\" lay-skin=\"primary\" checked=\"\">
\t\t\t\t\t\t\t<div class=\"layui-unselect layui-form-checkbox\" lay-skin=\"primary\">
\t\t\t\t\t\t\t\t<span>激活</span>
\t\t\t\t\t\t\t\t<i class=\"layui-icon layui-icon-ok\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t</form>
\t\t\t<div class=\"layui-form-item\">
\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t<button class=\"layui-btn\" id=\"btn_submit\">提交</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<script>
\t\tvar id = parseInt(";
        // line 84
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo ");
\t\t\$(document).ready(function () {
\t\t\tsubmit();
\t\t\t";
        // line 87
        if (((isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")) > 0)) {
            // line 88
            echo "\t\t\t\t\$('#name').val(\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Channel"]) ? $context["Channel"] : $this->getContext($context, "Channel")), "name", array()), "html", null, true);
            echo "\");
\t\t\t\t\$('#percent').val(\"";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Channel"]) ? $context["Channel"] : $this->getContext($context, "Channel")), "percent", array()), "html", null, true);
            echo "\");
\t\t\t\t";
            // line 90
            if ($this->getAttribute((isset($context["Channel"]) ? $context["Channel"] : $this->getContext($context, "Channel")), "isActive", array())) {
                // line 91
                echo "\t\t\t\t\t\$('#is_active').attr('checked','checked');
\t\t\t\t";
            } else {
                // line 93
                echo "\t\t\t\t\t\$('#is_active').removeAttr('checked');
\t\t\t\t";
            }
            // line 95
            echo "\t\t\t\t
\t\t\t\t\$('#PAY_TYPE_AJAX').removeAttr('checked');
\t\t\t\t\$('#PAY_TYPE_JUMP').removeAttr('checked');
\t\t\t\t";
            // line 98
            if (($this->getAttribute((isset($context["Channel"]) ? $context["Channel"] : $this->getContext($context, "Channel")), "payType", array()) == "AJAX")) {
                echo "\$('#PAY_TYPE_AJAX').attr('checked','checked');";
            }
            // line 99
            echo "\t\t\t\t";
            if (($this->getAttribute((isset($context["Channel"]) ? $context["Channel"] : $this->getContext($context, "Channel")), "payType", array()) == "JUMP")) {
                echo "\$('#PAY_TYPE_JUMP').attr('checked','checked');";
            }
            // line 100
            echo "\t\t\t\t\$('#slug').val(\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Channel"]) ? $context["Channel"] : $this->getContext($context, "Channel")), "slug", array()), "html", null, true);
            echo "\");
\t\t\t\t\$('#currency').val(\"";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Channel"]) ? $context["Channel"] : $this->getContext($context, "Channel")), "currency", array()), "html", null, true);
            echo "\");
\t\t\t\t\$('#country').val(\"";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["Channel"]) ? $context["Channel"] : $this->getContext($context, "Channel")), "country", array()), "html", null, true);
            echo "\");
\t\t\t";
        }
        // line 104
        echo "\t\t});
\t\t
\t\tfunction submit()
\t\t{
\t\t\t\$('#btn_submit').click(function(){
\t\t\t\tlet can_submit = true;
\t\t\t\tif(can_submit&& \"\" == \$('#name').val())
\t\t\t\t{
\t\t\t\t\tcan_submit = false;
\t\t\t\t\tlayer.msg(\"请输入名称\");
\t\t\t\t}
\t\t\t\tif(can_submit && '' == \$('#percent').val())
\t\t\t\t{
\t\t\t\t\tcan_submit = false;
\t\t\t\t\tlayer.msg(\"请输入比例\");
\t\t\t\t}
\t\t\t\t
\t\t\t\tif(can_submit)
\t\t\t\t{
\t\t\t\t\tajax(\"";
        // line 123
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_channel");
        echo "?action=prepare&id=";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\",\$('#std-form').serialize(),function(json){
\t\t\t\t\t\tlayer.alert(json.msg,{},function(){
\t\t\t\t\t\t\tif(0 == json.code)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tparent.window.location.reload();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t});
\t\t\t\t}
\t\t\t});
\t\t}
\t</script>
\t<script>
\t\tlayui.config({base: '";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("ui_core"), "html", null, true);
        echo "/'}).extend({index: 'lib/index'}).use(['index', 'form'], function(){
\t\t\tvar admin = layui.admin,element = layui.element,form = layui.form;

\t\t\tform.render(null, 'component-form-element');
\t\t\telement.render('breadcrumb', 'breadcrumb');
\t\t});
\t</script>
";
        
        $__internal_0936c11ab64d40382e9533b3213cd1bef5d61444ced42c740aa77329632587f0->leave($__internal_0936c11ab64d40382e9533b3213cd1bef5d61444ced42c740aa77329632587f0_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Channel:prepare.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 136,  198 => 123,  177 => 104,  172 => 102,  168 => 101,  163 => 100,  158 => 99,  154 => 98,  149 => 95,  145 => 93,  141 => 91,  139 => 90,  135 => 89,  130 => 88,  128 => 87,  122 => 84,  40 => 4,  34 => 3,  11 => 1,);
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
\t\t\t<form class=\"layui-form\" id=\"std-form\" lay-filter=\"component-form-element\">
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">名称：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"name\" id=\"name\" lay-verify=\"required\" placeholder=\"请输入名称\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

                <div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">比率：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"percent\" id=\"percent\" lay-verify=\"required\" placeholder=\"请输入比率\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">支付类型：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"radio\" id=\"PAY_TYPE_AJAX\" name=\"pay_type\" value=\"AJAX\" title=\"AJAX\" />
\t\t\t\t\t\t\t<input type=\"radio\" id=\"PAY_TYPE_JUMP\" name=\"pay_type\" value=\"JUMP\" title=\"跳转\" checked />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">别名：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"slug\" id=\"slug\" lay-verify=\"required\" placeholder=\"请输入别名\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">国家：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"country\" id=\"country\" lay-verify=\"required\" placeholder=\"请输入国家\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">货币：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"currency\" id=\"currency\" lay-verify=\"required\" placeholder=\"请输入货币\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

                <div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\"></label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"is_active\" id=\"is_active\" title=\"激活\" lay-skin=\"primary\" checked=\"\">
\t\t\t\t\t\t\t<div class=\"layui-unselect layui-form-checkbox\" lay-skin=\"primary\">
\t\t\t\t\t\t\t\t<span>激活</span>
\t\t\t\t\t\t\t\t<i class=\"layui-icon layui-icon-ok\"></i>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t</form>
\t\t\t<div class=\"layui-form-item\">
\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t<button class=\"layui-btn\" id=\"btn_submit\">提交</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<script>
\t\tvar id = parseInt({{ id }});
\t\t\$(document).ready(function () {
\t\t\tsubmit();
\t\t\t{% if id > 0 %}
\t\t\t\t\$('#name').val(\"{{ Channel.name }}\");
\t\t\t\t\$('#percent').val(\"{{ Channel.percent }}\");
\t\t\t\t{% if Channel.isActive %}
\t\t\t\t\t\$('#is_active').attr('checked','checked');
\t\t\t\t{% else %}
\t\t\t\t\t\$('#is_active').removeAttr('checked');
\t\t\t\t{% endif %}
\t\t\t\t
\t\t\t\t\$('#PAY_TYPE_AJAX').removeAttr('checked');
\t\t\t\t\$('#PAY_TYPE_JUMP').removeAttr('checked');
\t\t\t\t{% if Channel.payType == \"AJAX\" %}\$('#PAY_TYPE_AJAX').attr('checked','checked');{% endif %}
\t\t\t\t{% if Channel.payType == \"JUMP\" %}\$('#PAY_TYPE_JUMP').attr('checked','checked');{% endif %}
\t\t\t\t\$('#slug').val(\"{{ Channel.slug }}\");
\t\t\t\t\$('#currency').val(\"{{ Channel.currency }}\");
\t\t\t\t\$('#country').val(\"{{ Channel.country }}\");
\t\t\t{% endif %}
\t\t});
\t\t
\t\tfunction submit()
\t\t{
\t\t\t\$('#btn_submit').click(function(){
\t\t\t\tlet can_submit = true;
\t\t\t\tif(can_submit&& \"\" == \$('#name').val())
\t\t\t\t{
\t\t\t\t\tcan_submit = false;
\t\t\t\t\tlayer.msg(\"请输入名称\");
\t\t\t\t}
\t\t\t\tif(can_submit && '' == \$('#percent').val())
\t\t\t\t{
\t\t\t\t\tcan_submit = false;
\t\t\t\t\tlayer.msg(\"请输入比例\");
\t\t\t\t}
\t\t\t\t
\t\t\t\tif(can_submit)
\t\t\t\t{
\t\t\t\t\tajax(\"{{ path(\"front_channel\") }}?action=prepare&id={{ id }}\",\$('#std-form').serialize(),function(json){
\t\t\t\t\t\tlayer.alert(json.msg,{},function(){
\t\t\t\t\t\t\tif(0 == json.code)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tparent.window.location.reload();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t});
\t\t\t\t}
\t\t\t});
\t\t}
\t</script>
\t<script>
\t\tlayui.config({base: '{{ asset('ui_core') }}/'}).extend({index: 'lib/index'}).use(['index', 'form'], function(){
\t\t\tvar admin = layui.admin,element = layui.element,form = layui.form;

\t\t\tform.render(null, 'component-form-element');
\t\t\telement.render('breadcrumb', 'breadcrumb');
\t\t});
\t</script>
{% endblock %}
", "FrontBundle:Channel:prepare.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/Channel/prepare.html.twig");
    }
}
