<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_32f9ef86a88f5138f47cad2d36f0fe291eb6f7cebf16d2cb31f9a93ea64ffa83 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4f3aa56b96160a7273ce768402f042cacd2cdf92da579794ac7cfd47d359643a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4f3aa56b96160a7273ce768402f042cacd2cdf92da579794ac7cfd47d359643a->enter($__internal_4f3aa56b96160a7273ce768402f042cacd2cdf92da579794ac7cfd47d359643a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Security:login.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/fos/frameworks.css"), "html", null, true);
        echo "\" media=\"all\" rel=\"stylesheet\" />
        <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/fos/github.css"), "html", null, true);
        echo "\" media=\"all\" rel=\"stylesheet\" />
        <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/fos/site.css"), "html", null, true);
        echo "\" media=\"all\" rel=\"stylesheet\" />
        <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery-3.2.1.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/layer/layer.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/base.js"), "html", null, true);
        echo "\"></script>
        <title>登录后台</title>
        <script>
        \$(document).ready(function(){
            \$('#login_btn').click(function(){
                login();
            });
            
            \$(\"html\").on(\"keydown\",function(event){
                if(event.keyCode==13){
                    login();
                }
            });
        });
        
        function login()
        {
            var o = {};
            o.username = \$('#username').val();
            o.password = \$('#password').val();
            o._csrf_token = \"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\";
            if(\"\" == o.username)
            {
                layer.alert(\"请输入账号\");
            }else{
                if(\"\" == o.password)
                {
                    layer.alert(\"请输入密码\");
                }else{
                    var url = \"";
        // line 39
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_auth");
        echo "\";
                    layer.load(1);
                    ajax(url,o,function(json){
                        if(json.code == 0)
                        {
                            //登录成功，直接跳转
                            window.location.href=\"";
        // line 45
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_homepage");
        echo "\";
                        }else{
                            //登录失败，弹窗
                            layer.closeAll('loading');
                            layer.alert(\"登录失败，\"+json.msg);
                        }
                    });
                }
            }
        }
        </script>
    </head>
    
    <body class=\"logged-out env-production page-responsive min-width-0 session-authentication intent-mouse\" style=\"background: #f2f2f2;\">
    <div style=\"    position: absolute;left: 0;right: 0;top: 0;bottom: 0;background: url(/images/login_bg.svg);\">
        <div class=\"position-relative js-header-wrapper \">
            <div class=\"header header-logged-out width-full pt-5 pb-4\" role=\"banner\">
                <div class=\"container clearfix width-full text-center\">
                    <a class=\"header-logo\" href=\"#\">
                        <svg aria-hidden=\"true\" class=\"octicon octicon-mark-github\" height=\"48\" version=\"1.1\" viewBox=\"0 0 16 16\" width=\"48\"><path fill-rule=\"evenodd\" d=\"M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z\"></path></svg>
                    </a>
                </div>
            </div>
        </div>

        
        <div class=\"auth-form px-3\" id=\"login\">
            <div class=\"auth-form-header p-0\">
                <h1>请输入账号密码登录后台</h1>
            </div>
            <div class=\"auth-form-body mt-3\" style=\"position: absolute;width: 360px;left: 50%;margin-left: -180px;top: 50%;margin-top: -118px !important;height: 236px;\">
                <form id=\"login_form\" method=\"POST\" action=\"\">
                    <label for=\"username\">账号：</label>
                    <input autocapitalize=\"off\" autocorrect=\"off\" autofocus=\"autofocus\" class=\"form-control input-block\" id=\"username\" name=\"login\" tabindex=\"1\" type=\"text\">
                    <label for=\"password\">密码：</label>
                    <input class=\"form-control form-control input-block\" id=\"password\" name=\"password\" tabindex=\"2\" type=\"password\">
                </form>
                <input class=\"btn btn-primary btn-block\" id=\"login_btn\" name=\"commit\" tabindex=\"3\" type=\"submit\" value=\"提交\">
            </div>
        </div>
    </div>   
    
    <div class=\"footer container-lg p-responsive py-6 mt-6 f6\" style=\"position: absolute;right:0px;left: 0px;bottom:10px;height: 50px;text-align:center;\">
        &copy;";
        // line 88
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " 版权所有
    </div>
     
    </body>
</html>
    ";
        
        $__internal_4f3aa56b96160a7273ce768402f042cacd2cdf92da579794ac7cfd47d359643a->leave($__internal_4f3aa56b96160a7273ce768402f042cacd2cdf92da579794ac7cfd47d359643a_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 88,  92 => 45,  83 => 39,  71 => 30,  48 => 10,  44 => 9,  40 => 8,  36 => 7,  32 => 6,  28 => 5,  22 => 1,);
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
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <link href=\"{{asset('css/fos/frameworks.css')}}\" media=\"all\" rel=\"stylesheet\" />
        <link href=\"{{asset('css/fos/github.css')}}\" media=\"all\" rel=\"stylesheet\" />
        <link href=\"{{asset('css/fos/site.css')}}\" media=\"all\" rel=\"stylesheet\" />
        <script src=\"{{asset('js/jquery-3.2.1.min.js')}}\"></script>
        <script src=\"{{asset('js/layer/layer.js')}}\"></script>
        <script src=\"{{asset('js/base.js')}}\"></script>
        <title>登录后台</title>
        <script>
        \$(document).ready(function(){
            \$('#login_btn').click(function(){
                login();
            });
            
            \$(\"html\").on(\"keydown\",function(event){
                if(event.keyCode==13){
                    login();
                }
            });
        });
        
        function login()
        {
            var o = {};
            o.username = \$('#username').val();
            o.password = \$('#password').val();
            o._csrf_token = \"{{ csrf_token }}\";
            if(\"\" == o.username)
            {
                layer.alert(\"请输入账号\");
            }else{
                if(\"\" == o.password)
                {
                    layer.alert(\"请输入密码\");
                }else{
                    var url = \"{{path('fos_user_security_auth')}}\";
                    layer.load(1);
                    ajax(url,o,function(json){
                        if(json.code == 0)
                        {
                            //登录成功，直接跳转
                            window.location.href=\"{{path('front_homepage')}}\";
                        }else{
                            //登录失败，弹窗
                            layer.closeAll('loading');
                            layer.alert(\"登录失败，\"+json.msg);
                        }
                    });
                }
            }
        }
        </script>
    </head>
    
    <body class=\"logged-out env-production page-responsive min-width-0 session-authentication intent-mouse\" style=\"background: #f2f2f2;\">
    <div style=\"    position: absolute;left: 0;right: 0;top: 0;bottom: 0;background: url(/images/login_bg.svg);\">
        <div class=\"position-relative js-header-wrapper \">
            <div class=\"header header-logged-out width-full pt-5 pb-4\" role=\"banner\">
                <div class=\"container clearfix width-full text-center\">
                    <a class=\"header-logo\" href=\"#\">
                        <svg aria-hidden=\"true\" class=\"octicon octicon-mark-github\" height=\"48\" version=\"1.1\" viewBox=\"0 0 16 16\" width=\"48\"><path fill-rule=\"evenodd\" d=\"M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z\"></path></svg>
                    </a>
                </div>
            </div>
        </div>

        
        <div class=\"auth-form px-3\" id=\"login\">
            <div class=\"auth-form-header p-0\">
                <h1>请输入账号密码登录后台</h1>
            </div>
            <div class=\"auth-form-body mt-3\" style=\"position: absolute;width: 360px;left: 50%;margin-left: -180px;top: 50%;margin-top: -118px !important;height: 236px;\">
                <form id=\"login_form\" method=\"POST\" action=\"\">
                    <label for=\"username\">账号：</label>
                    <input autocapitalize=\"off\" autocorrect=\"off\" autofocus=\"autofocus\" class=\"form-control input-block\" id=\"username\" name=\"login\" tabindex=\"1\" type=\"text\">
                    <label for=\"password\">密码：</label>
                    <input class=\"form-control form-control input-block\" id=\"password\" name=\"password\" tabindex=\"2\" type=\"password\">
                </form>
                <input class=\"btn btn-primary btn-block\" id=\"login_btn\" name=\"commit\" tabindex=\"3\" type=\"submit\" value=\"提交\">
            </div>
        </div>
    </div>   
    
    <div class=\"footer container-lg p-responsive py-6 mt-6 f6\" style=\"position: absolute;right:0px;left: 0px;bottom:10px;height: 50px;text-align:center;\">
        &copy;{{\"now\"|date('Y')}} 版权所有
    </div>
     
    </body>
</html>
    ", "FOSUserBundle:Security:login.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/vendor/friendsofsymfony/user-bundle/Resources/views/Security/login.html.twig");
    }
}
