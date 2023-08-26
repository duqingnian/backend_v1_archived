<?php

/* FrontBundle:Merchant:prepare.html.twig */
class __TwigTemplate_b51225090a27da85f80964fba3040005fa6605a832936a1628ec46530d0ebb87 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::page.html.twig", "FrontBundle:Merchant:prepare.html.twig", 1);
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
        $__internal_e4771fba868be422bab93831d659a1614b3928e1ce9a365b84c036d77b86aa1a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e4771fba868be422bab93831d659a1614b3928e1ce9a365b84c036d77b86aa1a->enter($__internal_e4771fba868be422bab93831d659a1614b3928e1ce9a365b84c036d77b86aa1a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Merchant:prepare.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e4771fba868be422bab93831d659a1614b3928e1ce9a365b84c036d77b86aa1a->leave($__internal_e4771fba868be422bab93831d659a1614b3928e1ce9a365b84c036d77b86aa1a_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_0b9bb1f4bda7f97ed332b3f4bde1888926a22f709eeedce2b12596d0b0aee71a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0b9bb1f4bda7f97ed332b3f4bde1888926a22f709eeedce2b12596d0b0aee71a->enter($__internal_0b9bb1f4bda7f97ed332b3f4bde1888926a22f709eeedce2b12596d0b0aee71a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "\t<div class=\"layui-card\">
\t\t<!--<div class=\"layui-card-header\">商户添加</div>-->
\t\t<div class=\"layui-card-body\">
\t\t\t<form class=\"layui-form\" id=\"std-form\" lay-filter=\"component-form-element\">
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">账号：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"username\" id=\"username\" lay-verify=\"required\" placeholder=\"请输入账号\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

                <div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">密码：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"password\" id=\"password\" lay-verify=\"required\" placeholder=\"请输入密码\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

                <div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">商户名称：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"dispaly_name\" id=\"dispaly_name\" lay-verify=\"required\" placeholder=\"请输入商户名称\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">渠道选择：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<select name=\"channel_id\" id=\"channel_id\">
\t\t\t\t\t\t\t\t";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
        foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
            // line 41
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "name", array()), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                </div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">代收费率\t：</label>
\t\t\t\t\t\t<div class=\"layui-input-block flex\" style=\"align-items: center;justify-content: flex-start;\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"percent\" id=\"percent\" lay-verify=\"required\" placeholder=\"0.00\" autocomplete=\"off\" class=\"layui-input\" style=\"width:80px\"><span class=\"ml10\" style=\"font-weight:bold;font-size:14px;\">%</span>
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
        // line 66
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo ");
\t\t\$(document).ready(function () {
\t\t\tsubmit();
\t\t\t";
        // line 69
        if (((isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")) > 0)) {
            // line 70
            echo "\t\t\t\t\$('#username').val(\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username", array()), "html", null, true);
            echo "\");
\t\t\t\t\$('#dispaly_name').val(\"";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "displayName", array()), "html", null, true);
            echo "\");
\t\t\t\t\$('#channel_id').val(\"";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["merchant"]) ? $context["merchant"] : $this->getContext($context, "merchant")), "channelId", array()), "html", null, true);
            echo "\");
\t\t\t\t\$('#percent').val(\"";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["merchant"]) ? $context["merchant"] : $this->getContext($context, "merchant")), "percent", array()), "html", null, true);
            echo "\");
\t\t\t";
        }
        // line 75
        echo "\t\t});
\t\t
\t\tfunction submit()
\t\t{
\t\t\t\$('#btn_submit').click(function(){
\t\t\t\tlet can_submit = true;
\t\t\t\tif(can_submit&& \"\" == \$('#username').val())
\t\t\t\t{
\t\t\t\t\tcan_submit = false;
\t\t\t\t\tlayer.msg(\"请输入账号\");
\t\t\t\t}
\t\t\t\tif(0 == id)
\t\t\t\t{
\t\t\t\t\tif(can_submit && '' == \$('#password').val())
\t\t\t\t\t{
\t\t\t\t\t\tcan_submit = false;
\t\t\t\t\t\tlayer.msg(\"请输入密码:\"+id);
\t\t\t\t\t}
\t\t\t\t}
\t\t\t\t
\t\t\t\tif(can_submit)
\t\t\t\t{
\t\t\t\t\tajax(\"";
        // line 97
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_merchant");
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
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("ui_core"), "html", null, true);
        echo "/'}).extend({index: 'lib/index'}).use(['index', 'form'], function(){
\t\t\tvar admin = layui.admin,element = layui.element,form = layui.form;

\t\t\tform.render(null, 'component-form-element');
\t\t\telement.render('breadcrumb', 'breadcrumb');
\t\t});
\t</script>
";
        
        $__internal_0b9bb1f4bda7f97ed332b3f4bde1888926a22f709eeedce2b12596d0b0aee71a->leave($__internal_0b9bb1f4bda7f97ed332b3f4bde1888926a22f709eeedce2b12596d0b0aee71a_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Merchant:prepare.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 110,  168 => 97,  144 => 75,  139 => 73,  135 => 72,  131 => 71,  126 => 70,  124 => 69,  118 => 66,  93 => 43,  82 => 41,  78 => 40,  40 => 4,  34 => 3,  11 => 1,);
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
\t\t<!--<div class=\"layui-card-header\">商户添加</div>-->
\t\t<div class=\"layui-card-body\">
\t\t\t<form class=\"layui-form\" id=\"std-form\" lay-filter=\"component-form-element\">
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">账号：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"username\" id=\"username\" lay-verify=\"required\" placeholder=\"请输入账号\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

                <div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">密码：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"password\" id=\"password\" lay-verify=\"required\" placeholder=\"请输入密码\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

                <div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">商户名称：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"dispaly_name\" id=\"dispaly_name\" lay-verify=\"required\" placeholder=\"请输入商户名称\" autocomplete=\"off\" class=\"layui-input\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">渠道选择：</label>
\t\t\t\t\t\t<div class=\"layui-input-block\">
\t\t\t\t\t\t\t<select name=\"channel_id\" id=\"channel_id\">
\t\t\t\t\t\t\t\t{% for channel in channels %}
\t\t\t\t\t\t\t\t<option value=\"{{ channel.id }}\">{{ channel.name }}</option>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                </div>
\t\t\t\t
\t\t\t\t<div class=\"layui-row layui-col-space10 layui-form-item\">
\t\t\t\t\t<div class=\"layui-col-lg6\">
\t\t\t\t\t\t<label class=\"layui-form-label\">代收费率\t：</label>
\t\t\t\t\t\t<div class=\"layui-input-block flex\" style=\"align-items: center;justify-content: flex-start;\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"percent\" id=\"percent\" lay-verify=\"required\" placeholder=\"0.00\" autocomplete=\"off\" class=\"layui-input\" style=\"width:80px\"><span class=\"ml10\" style=\"font-weight:bold;font-size:14px;\">%</span>
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
\t\t\t\t\$('#username').val(\"{{ user.username }}\");
\t\t\t\t\$('#dispaly_name').val(\"{{ user.displayName }}\");
\t\t\t\t\$('#channel_id').val(\"{{ merchant.channelId }}\");
\t\t\t\t\$('#percent').val(\"{{ merchant.percent }}\");
\t\t\t{% endif %}
\t\t});
\t\t
\t\tfunction submit()
\t\t{
\t\t\t\$('#btn_submit').click(function(){
\t\t\t\tlet can_submit = true;
\t\t\t\tif(can_submit&& \"\" == \$('#username').val())
\t\t\t\t{
\t\t\t\t\tcan_submit = false;
\t\t\t\t\tlayer.msg(\"请输入账号\");
\t\t\t\t}
\t\t\t\tif(0 == id)
\t\t\t\t{
\t\t\t\t\tif(can_submit && '' == \$('#password').val())
\t\t\t\t\t{
\t\t\t\t\t\tcan_submit = false;
\t\t\t\t\t\tlayer.msg(\"请输入密码:\"+id);
\t\t\t\t\t}
\t\t\t\t}
\t\t\t\t
\t\t\t\tif(can_submit)
\t\t\t\t{
\t\t\t\t\tajax(\"{{ path(\"front_merchant\") }}?action=prepare&id={{ id }}\",\$('#std-form').serialize(),function(json){
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
", "FrontBundle:Merchant:prepare.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/Merchant/prepare.html.twig");
    }
}
