<?php

/* FrontBundle:Default:index.html.twig */
class __TwigTemplate_2df1b3e92ddba8f34aa8c15378eb7ffb40b7023da125493d2f40363da9a8c854 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::layout.html.twig", "FrontBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FrontBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_85997af6a640bd015217281a2da8e952677187ab9f89fd0f58a05ff3ff13fbdc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_85997af6a640bd015217281a2da8e952677187ab9f89fd0f58a05ff3ff13fbdc->enter($__internal_85997af6a640bd015217281a2da8e952677187ab9f89fd0f58a05ff3ff13fbdc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_85997af6a640bd015217281a2da8e952677187ab9f89fd0f58a05ff3ff13fbdc->leave($__internal_85997af6a640bd015217281a2da8e952677187ab9f89fd0f58a05ff3ff13fbdc_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_34535780020fad953fde396f1d990997a40b2a93a7b97b0749f808dc3f95460c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_34535780020fad953fde396f1d990997a40b2a93a7b97b0749f808dc3f95460c->enter($__internal_34535780020fad953fde396f1d990997a40b2a93a7b97b0749f808dc3f95460c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "平台管理端";
        
        $__internal_34535780020fad953fde396f1d990997a40b2a93a7b97b0749f808dc3f95460c->leave($__internal_34535780020fad953fde396f1d990997a40b2a93a7b97b0749f808dc3f95460c_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_850973986cf113d5de0addd2261ac95130b82b54f0808af7be860b90ff878c53 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_850973986cf113d5de0addd2261ac95130b82b54f0808af7be860b90ff878c53->enter($__internal_850973986cf113d5de0addd2261ac95130b82b54f0808af7be860b90ff878c53_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "    <div id=\"LAY_app\">
        <div class=\"layui-layout layui-layout-admin\">
            <div class=\"layui-header\">
                <!-- 头部区域 -->
                <ul class=\"layui-nav layui-layout-left\">
                    <li class=\"layui-nav-item layadmin-flexible\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"flexible\" title=\"侧边伸缩\">
                            <i class=\"layui-icon layui-icon-shrink-right\" id=\"LAY_app_flexible\"></i>
                        </a>
                    </li>
                    <li class=\"layui-nav-item\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"refresh\" title=\"刷新\">
                            <i class=\"layui-icon layui-icon-refresh-3\"></i>
                        </a>
                    </li>
                    <li class=\"layui-nav-item layui-hide-xs\" lay-unselect>
                        <input type=\"text\" placeholder=\"搜索...\" autocomplete=\"off\" class=\"layui-input layui-input-search\"
                            layadmin-event=\"serach\" lay-action=\"template/search.html?keywords=\">
                    </li>
                </ul>
                <ul class=\"layui-nav layui-layout-right\" lay-filter=\"layadmin-layout-right\">

                    <li class=\"layui-nav-item\" lay-unselect>
                        <a lay-href=\"app/message/index.html\" layadmin-event=\"message\" lay-text=\"消息中心\">
                            <i class=\"layui-icon layui-icon-notice\"></i>

                            <!-- 如果有新消息，则显示小圆点 -->
                            <span class=\"layui-badge-dot\"></span>
                        </a>
                    </li>
                    <li class=\"layui-nav-item layui-hide-xs\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"note\">
                            <i class=\"layui-icon layui-icon-note\"></i>
                        </a>
                    </li>
                    <li class=\"layui-nav-item layui-hide-xs\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"fullscreen\">
                            <i class=\"layui-icon layui-icon-screen-full\"></i>
                        </a>
                    </li>
                    <li class=\"layui-nav-item\" lay-unselect>
                        <a href=\"javascript:;\">
                            <cite>";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "displayName", array()), "html", null, true);
        echo "</cite>
                        </a>
                        <dl class=\"layui-nav-child\">
                            <dd><a lay-href=\"#\">基本资料</a></dd>
                            <dd><a lay-href=\"#\">修改密码</a></dd>
                            <hr>
                            <dd style=\"text-align: center;\"><a href=\"";
        // line 54
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_logout");
        echo "\">退出</a></dd>
                        </dl>
                    </li>

                    <li class=\"layui-nav-item layui-hide-xs\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"about\"><i
                                class=\"layui-icon layui-icon-more-vertical\"></i></a>
                    </li>
                    <li class=\"layui-nav-item layui-show-xs-inline-block layui-hide-sm\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"more\"><i
                                class=\"layui-icon layui-icon-more-vertical\"></i></a>
                    </li>
                </ul>
            </div>

            <!-- 侧边菜单 -->
            <div class=\"layui-side layui-side-menu\">
                <div class=\"layui-side-scroll\">
                    <div class=\"layui-logo\" lay-href=\"home/console.html\">
                        <span>平台端</span>
                    </div>

\t\t\t\t\t<!-- 活跃li用 layui-nav-itemed class -->
                    <ul class=\"layui-nav layui-nav-tree\" lay-shrink=\"all\" id=\"LAY-system-side-menu\" lay-filter=\"layadmin-system-side-menu\">
                        <!--<li data-name=\"home\" class=\"layui-nav-item\">
                            <a lay-href=\"";
        // line 79
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_home");
        echo "\" lay-tips=\"主页\"><i class=\"layui-icon layui-icon-home\"></i><cite>主页</cite></a>
                        </li>
                        <li data-name=\"tongji\" class=\"layui-nav-item\">
                            <a lay-href=\"";
        // line 82
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_tongji");
        echo "\" lay-tips=\"统计\"><i class=\"layui-icon layui-icon-template-1\"></i><cite>统计</cite></a>
                        </li>-->
                        <li data-name=\"user\" class=\"layui-nav-item\">
                            <a href=\"javascript:;\" lay-tips=\"订单\" lay-direction=\"2\">
                                <i class=\"layui-icon layui-icon-component\"></i><cite>订单管理</cite>
                            </a>
                            <dl class=\"layui-nav-child\">
                                <dd><a lay-href=\"";
        // line 89
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_order");
        echo "\">代收</a></dd>
                                <dd><a lay-href=\"#\">代付</a></dd>
                            </dl>
                        </li>
                        <li data-name=\"channel\" class=\"layui-nav-item\">
                            <a lay-href=\"";
        // line 94
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_channel");
        echo "\" lay-tips=\"渠道管理\">
\t\t\t\t\t\t\t\t<i class=\"layui-icon layui-icon-templeate-1\"></i><cite>渠道管理</cite>
\t\t\t\t\t\t\t</a>
                        </li>
                        <li data-name=\"user\" class=\"layui-nav-item\">
                            <a href=\"javascript:;\" lay-tips=\"商户\" lay-direction=\"2\">
                                <i class=\"layui-icon layui-icon-user\"></i><cite>商户管理</cite>
                            </a>
                            <dl class=\"layui-nav-child\">
                                <dd><a lay-href=\"";
        // line 103
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_merchant");
        echo "?action=index\">商户</a></dd>
                                <dd><a lay-href=\"user/administrators/list.html\">代理</a></dd>
                            </dl>
                        </li>
                        <li data-name=\"user\" class=\"layui-nav-item\">
                            <a href=\"javascript:;\" lay-tips=\"下发\" lay-direction=\"2\">
                                <i class=\"layui-icon layui-icon-upload-drag\"></i><cite>下发管理</cite>
                            </a>
                            <dl class=\"layui-nav-child\">
                                <dd><a lay-href=\"user/user/list.html\">提现</a></dd>
                                <dd><a lay-href=\"user/administrators/list.html\">充值</a></dd>
                            </dl>
                        </li>
                        <li data-name=\"user\" class=\"layui-nav-item\">
                            <a href=\"javascript:;\" lay-tips=\"后台\" lay-direction=\"2\">
                                <i class=\"layui-icon layui-icon-set\"></i><cite>后台管理</cite>
                            </a>
                            <dl class=\"layui-nav-child\">
                                <dd><a lay-href=\"user/user/list.html\">用户管理</a></dd>
                            </dl>
                        </li>



                        
                    </ul>
                </div>
            </div>

            <!-- 页面标签 -->
            <div class=\"layadmin-pagetabs\" id=\"LAY_app_tabs\">
                <div class=\"layui-icon layadmin-tabs-control layui-icon-prev\" layadmin-event=\"leftPage\"></div>
                <div class=\"layui-icon layadmin-tabs-control layui-icon-next\" layadmin-event=\"rightPage\"></div>
                <div class=\"layui-icon layadmin-tabs-control layui-icon-down\">
                    <ul class=\"layui-nav layadmin-tabs-select\" lay-filter=\"layadmin-pagetabs-nav\">
                        <li class=\"layui-nav-item\" lay-unselect>
                            <a href=\"javascript:;\"></a>
                            <dl class=\"layui-nav-child layui-anim-fadein\">
                                <dd layadmin-event=\"closeThisTabs\"><a href=\"javascript:;\">关闭当前标签页</a></dd>
                                <dd layadmin-event=\"closeOtherTabs\"><a href=\"javascript:;\">关闭其它标签页</a></dd>
                                <dd layadmin-event=\"closeAllTabs\"><a href=\"javascript:;\">关闭全部标签页</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
                <div class=\"layui-tab\" lay-unauto lay-allowClose=\"true\" lay-filter=\"layadmin-layout-tabs\">
                    <ul class=\"layui-tab-title\" id=\"LAY_app_tabsheader\">
                        <li lay-id=\"home/console.html\" lay-attr=\"home/console.html\" class=\"layui-this\"><i
                                class=\"layui-icon layui-icon-home\"></i></li>
                    </ul>
                </div>
            </div>


            <!-- 主体内容 -->
            <div class=\"layui-body\" id=\"LAY_app_body\">
                <div class=\"layadmin-tabsbody-item layui-show\">
                    <iframe src=\"";
        // line 160
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_home");
        echo "\" frameborder=\"0\" class=\"layadmin-iframe\"></iframe>
                </div>
            </div>

            <!-- 辅助元素，一般用于移动设备下遮罩 -->
            <div class=\"layadmin-body-shade\" layadmin-event=\"shade\"></div>
        </div>
    </div>

    <script src=\"";
        // line 169
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("ui_core/layui/layui.js"), "html", null, true);
        echo "\"></script>
    <script>
        layui.config({
            base: '";
        // line 172
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("ui_core"), "html", null, true);
        echo "/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use('index');
    </script>
";
        
        $__internal_850973986cf113d5de0addd2261ac95130b82b54f0808af7be860b90ff878c53->leave($__internal_850973986cf113d5de0addd2261ac95130b82b54f0808af7be860b90ff878c53_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 172,  242 => 169,  230 => 160,  170 => 103,  158 => 94,  150 => 89,  140 => 82,  134 => 79,  106 => 54,  97 => 48,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"FrontBundle::layout.html.twig\" %}

{% block title %}平台管理端{% endblock %}

{% block content %}
    <div id=\"LAY_app\">
        <div class=\"layui-layout layui-layout-admin\">
            <div class=\"layui-header\">
                <!-- 头部区域 -->
                <ul class=\"layui-nav layui-layout-left\">
                    <li class=\"layui-nav-item layadmin-flexible\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"flexible\" title=\"侧边伸缩\">
                            <i class=\"layui-icon layui-icon-shrink-right\" id=\"LAY_app_flexible\"></i>
                        </a>
                    </li>
                    <li class=\"layui-nav-item\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"refresh\" title=\"刷新\">
                            <i class=\"layui-icon layui-icon-refresh-3\"></i>
                        </a>
                    </li>
                    <li class=\"layui-nav-item layui-hide-xs\" lay-unselect>
                        <input type=\"text\" placeholder=\"搜索...\" autocomplete=\"off\" class=\"layui-input layui-input-search\"
                            layadmin-event=\"serach\" lay-action=\"template/search.html?keywords=\">
                    </li>
                </ul>
                <ul class=\"layui-nav layui-layout-right\" lay-filter=\"layadmin-layout-right\">

                    <li class=\"layui-nav-item\" lay-unselect>
                        <a lay-href=\"app/message/index.html\" layadmin-event=\"message\" lay-text=\"消息中心\">
                            <i class=\"layui-icon layui-icon-notice\"></i>

                            <!-- 如果有新消息，则显示小圆点 -->
                            <span class=\"layui-badge-dot\"></span>
                        </a>
                    </li>
                    <li class=\"layui-nav-item layui-hide-xs\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"note\">
                            <i class=\"layui-icon layui-icon-note\"></i>
                        </a>
                    </li>
                    <li class=\"layui-nav-item layui-hide-xs\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"fullscreen\">
                            <i class=\"layui-icon layui-icon-screen-full\"></i>
                        </a>
                    </li>
                    <li class=\"layui-nav-item\" lay-unselect>
                        <a href=\"javascript:;\">
                            <cite>{{ app.user.displayName }}</cite>
                        </a>
                        <dl class=\"layui-nav-child\">
                            <dd><a lay-href=\"#\">基本资料</a></dd>
                            <dd><a lay-href=\"#\">修改密码</a></dd>
                            <hr>
                            <dd style=\"text-align: center;\"><a href=\"{{ path('fos_user_security_logout') }}\">退出</a></dd>
                        </dl>
                    </li>

                    <li class=\"layui-nav-item layui-hide-xs\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"about\"><i
                                class=\"layui-icon layui-icon-more-vertical\"></i></a>
                    </li>
                    <li class=\"layui-nav-item layui-show-xs-inline-block layui-hide-sm\" lay-unselect>
                        <a href=\"javascript:;\" layadmin-event=\"more\"><i
                                class=\"layui-icon layui-icon-more-vertical\"></i></a>
                    </li>
                </ul>
            </div>

            <!-- 侧边菜单 -->
            <div class=\"layui-side layui-side-menu\">
                <div class=\"layui-side-scroll\">
                    <div class=\"layui-logo\" lay-href=\"home/console.html\">
                        <span>平台端</span>
                    </div>

\t\t\t\t\t<!-- 活跃li用 layui-nav-itemed class -->
                    <ul class=\"layui-nav layui-nav-tree\" lay-shrink=\"all\" id=\"LAY-system-side-menu\" lay-filter=\"layadmin-system-side-menu\">
                        <!--<li data-name=\"home\" class=\"layui-nav-item\">
                            <a lay-href=\"{{ path('front_home') }}\" lay-tips=\"主页\"><i class=\"layui-icon layui-icon-home\"></i><cite>主页</cite></a>
                        </li>
                        <li data-name=\"tongji\" class=\"layui-nav-item\">
                            <a lay-href=\"{{ path('front_tongji') }}\" lay-tips=\"统计\"><i class=\"layui-icon layui-icon-template-1\"></i><cite>统计</cite></a>
                        </li>-->
                        <li data-name=\"user\" class=\"layui-nav-item\">
                            <a href=\"javascript:;\" lay-tips=\"订单\" lay-direction=\"2\">
                                <i class=\"layui-icon layui-icon-component\"></i><cite>订单管理</cite>
                            </a>
                            <dl class=\"layui-nav-child\">
                                <dd><a lay-href=\"{{ path('front_order') }}\">代收</a></dd>
                                <dd><a lay-href=\"#\">代付</a></dd>
                            </dl>
                        </li>
                        <li data-name=\"channel\" class=\"layui-nav-item\">
                            <a lay-href=\"{{ path('front_channel') }}\" lay-tips=\"渠道管理\">
\t\t\t\t\t\t\t\t<i class=\"layui-icon layui-icon-templeate-1\"></i><cite>渠道管理</cite>
\t\t\t\t\t\t\t</a>
                        </li>
                        <li data-name=\"user\" class=\"layui-nav-item\">
                            <a href=\"javascript:;\" lay-tips=\"商户\" lay-direction=\"2\">
                                <i class=\"layui-icon layui-icon-user\"></i><cite>商户管理</cite>
                            </a>
                            <dl class=\"layui-nav-child\">
                                <dd><a lay-href=\"{{ path('front_merchant') }}?action=index\">商户</a></dd>
                                <dd><a lay-href=\"user/administrators/list.html\">代理</a></dd>
                            </dl>
                        </li>
                        <li data-name=\"user\" class=\"layui-nav-item\">
                            <a href=\"javascript:;\" lay-tips=\"下发\" lay-direction=\"2\">
                                <i class=\"layui-icon layui-icon-upload-drag\"></i><cite>下发管理</cite>
                            </a>
                            <dl class=\"layui-nav-child\">
                                <dd><a lay-href=\"user/user/list.html\">提现</a></dd>
                                <dd><a lay-href=\"user/administrators/list.html\">充值</a></dd>
                            </dl>
                        </li>
                        <li data-name=\"user\" class=\"layui-nav-item\">
                            <a href=\"javascript:;\" lay-tips=\"后台\" lay-direction=\"2\">
                                <i class=\"layui-icon layui-icon-set\"></i><cite>后台管理</cite>
                            </a>
                            <dl class=\"layui-nav-child\">
                                <dd><a lay-href=\"user/user/list.html\">用户管理</a></dd>
                            </dl>
                        </li>



                        
                    </ul>
                </div>
            </div>

            <!-- 页面标签 -->
            <div class=\"layadmin-pagetabs\" id=\"LAY_app_tabs\">
                <div class=\"layui-icon layadmin-tabs-control layui-icon-prev\" layadmin-event=\"leftPage\"></div>
                <div class=\"layui-icon layadmin-tabs-control layui-icon-next\" layadmin-event=\"rightPage\"></div>
                <div class=\"layui-icon layadmin-tabs-control layui-icon-down\">
                    <ul class=\"layui-nav layadmin-tabs-select\" lay-filter=\"layadmin-pagetabs-nav\">
                        <li class=\"layui-nav-item\" lay-unselect>
                            <a href=\"javascript:;\"></a>
                            <dl class=\"layui-nav-child layui-anim-fadein\">
                                <dd layadmin-event=\"closeThisTabs\"><a href=\"javascript:;\">关闭当前标签页</a></dd>
                                <dd layadmin-event=\"closeOtherTabs\"><a href=\"javascript:;\">关闭其它标签页</a></dd>
                                <dd layadmin-event=\"closeAllTabs\"><a href=\"javascript:;\">关闭全部标签页</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
                <div class=\"layui-tab\" lay-unauto lay-allowClose=\"true\" lay-filter=\"layadmin-layout-tabs\">
                    <ul class=\"layui-tab-title\" id=\"LAY_app_tabsheader\">
                        <li lay-id=\"home/console.html\" lay-attr=\"home/console.html\" class=\"layui-this\"><i
                                class=\"layui-icon layui-icon-home\"></i></li>
                    </ul>
                </div>
            </div>


            <!-- 主体内容 -->
            <div class=\"layui-body\" id=\"LAY_app_body\">
                <div class=\"layadmin-tabsbody-item layui-show\">
                    <iframe src=\"{{ path('front_home') }}\" frameborder=\"0\" class=\"layadmin-iframe\"></iframe>
                </div>
            </div>

            <!-- 辅助元素，一般用于移动设备下遮罩 -->
            <div class=\"layadmin-body-shade\" layadmin-event=\"shade\"></div>
        </div>
    </div>

    <script src=\"{{ asset('ui_core/layui/layui.js') }}\"></script>
    <script>
        layui.config({
            base: '{{ asset('ui_core') }}/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use('index');
    </script>
{% endblock %}", "FrontBundle:Default:index.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/Default/index.html.twig");
    }
}
