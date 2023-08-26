<?php

/* FrontBundle:Home:index.html.twig */
class __TwigTemplate_8ddf125a9ff5989e0a6883d896b49feae524cbb954b5ed358329073e66a6aad8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::page.html.twig", "FrontBundle:Home:index.html.twig", 1);
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
        $__internal_20620e3a7d9b570c1236c966a40ca2e157ff9851560ccabe57189b0071b54373 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_20620e3a7d9b570c1236c966a40ca2e157ff9851560ccabe57189b0071b54373->enter($__internal_20620e3a7d9b570c1236c966a40ca2e157ff9851560ccabe57189b0071b54373_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Home:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_20620e3a7d9b570c1236c966a40ca2e157ff9851560ccabe57189b0071b54373->leave($__internal_20620e3a7d9b570c1236c966a40ca2e157ff9851560ccabe57189b0071b54373_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_86cd9b1d244f20174756db97acf287fcca807bb965e54c7f54a2e7b4b9bbce6b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_86cd9b1d244f20174756db97acf287fcca807bb965e54c7f54a2e7b4b9bbce6b->enter($__internal_86cd9b1d244f20174756db97acf287fcca807bb965e54c7f54a2e7b4b9bbce6b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "        <div class=\"layui-row layui-col-space15\">
          <div class=\"layui-col-md6\">
            <div class=\"layui-card\">
              <div class=\"layui-card-header\">快捷操作</div>
              <div class=\"layui-card-body\">
                
                <div class=\"layui-carousel layadmin-carousel layadmin-shortcut\">
                  <div carousel-item>
                    <ul class=\"layui-row layui-col-space10\">
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-console\"></i><cite>订单统计</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-chart\"></i><cite>代收订单</cite></a></li>
\t\t\t\t\t  <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-template-1\"></i><cite>代付订单</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-chat\"></i><cite>渠道管理</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-find-fill\"></i><cite>商户</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-survey\"></i><cite>代理</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-user\"></i><cite>下发-提现</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-set\"></i><cite>下发-充值</cite></a></li>
                    </ul>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class=\"layui-col-md6\">
            <div class=\"layui-card\">
              <div class=\"layui-card-header\">统计数据</div>
              <div class=\"layui-card-body\">

                <div class=\"layui-carousel layadmin-carousel layadmin-backlog\">
                  <div carousel-item>
                    <ul class=\"layui-row layui-col-space10\">
                      <li class=\"layui-col-xs6\">
                        <a lay-href=\"app/content/comment.html\" class=\"layadmin-backlog-body\">
                          <h3>代收</h3>
                          <p><cite>-</cite></p>
                        </a>
                      </li>
                      <li class=\"layui-col-xs6\">
                        <a lay-href=\"app/forum/list.html\" class=\"layadmin-backlog-body\">
                          <h3>代付</h3>
                          <p><cite>-</cite></p>
                        </a>
                      </li>
                      <li class=\"layui-col-xs6\">
                        <a lay-href=\"template/goodslist.html\" class=\"layadmin-backlog-body\">
                          <h3>下发提现</h3>
                          <p><cite>-</cite></p>
                        </a>
                      </li>
                      <li class=\"layui-col-xs6\">
                        <a href=\"javascript:;\" onclick=\"layer.tips('不跳转', this, {tips: 3});\" class=\"layadmin-backlog-body\">
                          <h3>下发充值</h3>
                          <p><cite>-</cite></p>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=\"layui-col-md12\">
            <div class=\"layui-card\">
              <div class=\"layui-card-header\">数据概览</div>
              <div class=\"layui-card-body\">
                
                <div class=\"layui-carousel layadmin-carousel layadmin-dataview\" data-anim=\"fade\" lay-filter=\"LAY-index-dataview\">
                  <div carousel-item id=\"LAY-index-dataview\">
                    <div><i class=\"layui-icon layui-icon-loading1 layadmin-loading\"></i></div>
                  </div>
                </div>
                
              </div>
            </div>

          </div>
        </div>
\t\t
\t\t
\t\t
\t\t<script>
  layui.config({
    base: '";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("ui_core"), "html", null, true);
        echo "/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'console']);
  </script>
  
";
        
        $__internal_86cd9b1d244f20174756db97acf287fcca807bb965e54c7f54a2e7b4b9bbce6b->leave($__internal_86cd9b1d244f20174756db97acf287fcca807bb965e54c7f54a2e7b4b9bbce6b_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Home:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 87,  40 => 4,  34 => 3,  11 => 1,);
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
        <div class=\"layui-row layui-col-space15\">
          <div class=\"layui-col-md6\">
            <div class=\"layui-card\">
              <div class=\"layui-card-header\">快捷操作</div>
              <div class=\"layui-card-body\">
                
                <div class=\"layui-carousel layadmin-carousel layadmin-shortcut\">
                  <div carousel-item>
                    <ul class=\"layui-row layui-col-space10\">
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-console\"></i><cite>订单统计</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-chart\"></i><cite>代收订单</cite></a></li>
\t\t\t\t\t  <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-template-1\"></i><cite>代付订单</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-chat\"></i><cite>渠道管理</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-find-fill\"></i><cite>商户</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-survey\"></i><cite>代理</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-user\"></i><cite>下发-提现</cite></a></li>
                      <li class=\"layui-col-xs3\"><a lay-href=\"#\"><i class=\"layui-icon layui-icon-set\"></i><cite>下发-充值</cite></a></li>
                    </ul>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class=\"layui-col-md6\">
            <div class=\"layui-card\">
              <div class=\"layui-card-header\">统计数据</div>
              <div class=\"layui-card-body\">

                <div class=\"layui-carousel layadmin-carousel layadmin-backlog\">
                  <div carousel-item>
                    <ul class=\"layui-row layui-col-space10\">
                      <li class=\"layui-col-xs6\">
                        <a lay-href=\"app/content/comment.html\" class=\"layadmin-backlog-body\">
                          <h3>代收</h3>
                          <p><cite>-</cite></p>
                        </a>
                      </li>
                      <li class=\"layui-col-xs6\">
                        <a lay-href=\"app/forum/list.html\" class=\"layadmin-backlog-body\">
                          <h3>代付</h3>
                          <p><cite>-</cite></p>
                        </a>
                      </li>
                      <li class=\"layui-col-xs6\">
                        <a lay-href=\"template/goodslist.html\" class=\"layadmin-backlog-body\">
                          <h3>下发提现</h3>
                          <p><cite>-</cite></p>
                        </a>
                      </li>
                      <li class=\"layui-col-xs6\">
                        <a href=\"javascript:;\" onclick=\"layer.tips('不跳转', this, {tips: 3});\" class=\"layadmin-backlog-body\">
                          <h3>下发充值</h3>
                          <p><cite>-</cite></p>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=\"layui-col-md12\">
            <div class=\"layui-card\">
              <div class=\"layui-card-header\">数据概览</div>
              <div class=\"layui-card-body\">
                
                <div class=\"layui-carousel layadmin-carousel layadmin-dataview\" data-anim=\"fade\" lay-filter=\"LAY-index-dataview\">
                  <div carousel-item id=\"LAY-index-dataview\">
                    <div><i class=\"layui-icon layui-icon-loading1 layadmin-loading\"></i></div>
                  </div>
                </div>
                
              </div>
            </div>

          </div>
        </div>
\t\t
\t\t
\t\t
\t\t<script>
  layui.config({
    base: '{{ asset('ui_core') }}/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'console']);
  </script>
  
{% endblock %}", "FrontBundle:Home:index.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/Home/index.html.twig");
    }
}
