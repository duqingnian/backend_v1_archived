<?php

/* FrontBundle:Order:index.html.twig */
class __TwigTemplate_b22dc1f049fee753265e0b0da01928e1990400ce5b72400d9b3e3d816ae3569c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FrontBundle::page.html.twig", "FrontBundle:Order:index.html.twig", 1);
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
        $__internal_751893a69763674e1bbdb2cac6d8624b1d797d575fec9f8a0b28735806d4a0d2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_751893a69763674e1bbdb2cac6d8624b1d797d575fec9f8a0b28735806d4a0d2->enter($__internal_751893a69763674e1bbdb2cac6d8624b1d797d575fec9f8a0b28735806d4a0d2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FrontBundle:Order:index.html.twig"));

        // line 3
        $context["_url"] = (((((($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("front_order") . "?filter_channel_order_no=") . (isset($context["filter_channel_order_no"]) ? $context["filter_channel_order_no"] : $this->getContext($context, "filter_channel_order_no"))) . "&filter_plantform_order_no=") . (isset($context["filter_plantform_order_no"]) ? $context["filter_plantform_order_no"] : $this->getContext($context, "filter_plantform_order_no"))) . "&filter_merchant_order_no=") . (isset($context["filter_merchant_order_no"]) ? $context["filter_merchant_order_no"] : $this->getContext($context, "filter_merchant_order_no")));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_751893a69763674e1bbdb2cac6d8624b1d797d575fec9f8a0b28735806d4a0d2->leave($__internal_751893a69763674e1bbdb2cac6d8624b1d797d575fec9f8a0b28735806d4a0d2_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_f8e16cff4a95e2c27b3700bb439d07e5b0f9c78a9feafcfb6ba070901630ba0c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f8e16cff4a95e2c27b3700bb439d07e5b0f9c78a9feafcfb6ba070901630ba0c->enter($__internal_f8e16cff4a95e2c27b3700bb439d07e5b0f9c78a9feafcfb6ba070901630ba0c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 6
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
                        <td>编号</td>
                        <td style=\"width:120px\">三方订单</td>
                        <td style=\"width:120px\">平台订单</td>
                        <td style=\"width:120px\">商户订单</td>
                        <td>发起金额</td>
                        <td>实际到账</td>
                        <td style=\"width:100px;\">手续费</td>
                        <td>货币</td>
                        <td>订单时间</td>
                        <td>三方接口</td>
                        <td>三方->平台</td>
                        <td>平台->商户</td>
                        <td>订单状态</td>
                        <td>备注</td>
                        <td>管理操作</td>
                    </tr>
\t\t\t\t\t";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "data", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 63
            echo "                    <tr>
                        <td>";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "id", array()), "html", null, true);
            echo "</td>
                        <td><div class=\"cell\"><a href=\"#\">";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["order"], "channel", array()), "name", array()), "html", null, true);
            echo "</a><br />";
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "channel_order_no", array()), "html", null, true);
            echo "</div></td>
                        <td><div class=\"cell\">";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "plantform_order_no", array()), "html", null, true);
            echo "</div></td>
                        <td><div class=\"cell\"><a href=\"#\">";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["order"], "merchant", array()), "name", array()), "html", null, true);
            echo "</a><br />";
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "merchant_order_no", array()), "html", null, true);
            echo "</div></td>
                        <td>";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "amount", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 69
            echo twig_escape_filter($this->env, ($this->getAttribute($context["order"], "amount", array()) - $this->getAttribute($context["order"], "channel_fee", array())), "html", null, true);
            echo "</td>
                        <td>
\t\t\t\t\t\t\t<div class=\"cell\">
\t\t\t\t\t\t\t\t<div><span>三方:</span><span>";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "channel_fee", array()), "html", null, true);
            echo "</span></div>
\t\t\t\t\t\t\t\t<div><span>商户:</span><span>";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "merchant_fee", array()), "html", null, true);
            echo "</span></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
                        <td>";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "currency", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 77
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["order"], "created_at", array()), "Y-m-d H:i:s"), "html", null, true);
            echo "</td>
                        <td>
\t\t\t\t\t\t\t";
            // line 79
            if ((0 == $this->getAttribute($context["order"], "channel_api_code", array()))) {
                // line 80
                echo "\t\t\t\t\t\t\t\t<svg t=\"1692692611988\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"2606\" width=\"32\" height=\"32\"><path d=\"M874.155198 150.227545c-200.303393-200.303393-523.241517-200.303393-723.54491 0s-200.303393 523.241517 0 723.54491 523.241517 200.303393 723.54491 0S1072.414679 350.530938 874.155198 150.227545zM739.256994 383.233533 467.416675 655.073852c-2.043912 2.043912-4.087824 2.043912-8.175649 2.043912s-6.131737 0-8.175649-2.043912l-165.556886-165.556886c-4.087824-4.087824-4.087824-10.219561 0-14.307385s10.219561-4.087824 14.307385 0l159.42515 159.42515L724.949609 368.926148c4.087824-4.087824 10.219561-4.087824 14.307385 0S743.344819 379.145709 739.256994 383.233533z\" fill=\"#14cd21\" p-id=\"2607\"></path></svg>
\t\t\t\t\t\t\t";
            } else {
                // line 82
                echo "\t\t\t\t\t\t\t\t<a href=\"#\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order"], "channel_api_code", array()), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t";
            }
            // line 84
            echo "\t\t\t\t\t\t</td>
                        <td>
\t\t\t\t\t\t\t<div class=\"cell\">
\t\t\t\t\t\t\t\t<div><span>回调:</span><span>";
            // line 87
            if (("N" == $this->getAttribute($context["order"], "plantform_notify_hooked", array()))) {
                echo "<svg t=\"1692708782180\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"2276\" width=\"18\" height=\"18\"><path d=\"M512 85.333333c235.648 0 426.666667 191.018667 426.666667 426.666667s-191.018667 426.666667-426.666667 426.666667S85.333333 747.648 85.333333 512 276.352 85.333333 512 85.333333z m181.034667 185.301334L512 451.669333 330.965333 270.634667 270.634667 330.965333 451.669333 512l-181.034666 181.034667 60.330666 60.330666L512 572.330667l181.034667 181.034666 60.330666-60.330666L572.330667 512l181.034666-181.034667-60.330666-60.330666z\" fill=\"#ef3b24\" p-id=\"2277\"></path></svg>";
            } else {
                echo "<svg t=\"1692708925162\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"5018\" width=\"18\" height=\"18\"><path d=\"M512 1024C229.230592 1024 0 794.769408 0 512S229.230592 0 512 0s512 229.230592 512 512-229.230592 512-512 512zM254.12608 528.77312l172.396544 174.733312a0.607232 0.607232 0 0 0 0.864256 0.01536l342.540288-343.36768a0.311296 0.311296 0 0 0-0.003072-0.44032l-37.359616-37.285888a0.320512 0.320512 0 0 0-0.443392-0.02048l-304.47616 277.743616c-0.37376 0.340992-0.996352 0.357376-1.381376 0.027648L294.8608 487.48544a0.339968 0.339968 0 0 0-0.452608 0.022528l-40.27904 40.824832a0.3072 0.3072 0 0 0-0.004096 0.44032z\" fill=\"#14cd21\" p-id=\"5019\"></path></svg>";
            }
            echo "</span></div>
\t\t\t\t\t\t\t\t<div><span>跳转:</span><span>";
            // line 88
            if (("N" == $this->getAttribute($context["order"], "plantform_jump_hooked", array()))) {
                echo "<svg t=\"1692708782180\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"2276\" width=\"18\" height=\"18\"><path d=\"M512 85.333333c235.648 0 426.666667 191.018667 426.666667 426.666667s-191.018667 426.666667-426.666667 426.666667S85.333333 747.648 85.333333 512 276.352 85.333333 512 85.333333z m181.034667 185.301334L512 451.669333 330.965333 270.634667 270.634667 330.965333 451.669333 512l-181.034666 181.034667 60.330666 60.330666L512 572.330667l181.034667 181.034666 60.330666-60.330666L572.330667 512l181.034666-181.034667-60.330666-60.330666z\" fill=\"#ef3b24\" p-id=\"2277\"></path></svg>";
            } else {
                echo "<svg t=\"1692708925162\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"5018\" width=\"18\" height=\"18\"><path d=\"M512 1024C229.230592 1024 0 794.769408 0 512S229.230592 0 512 0s512 229.230592 512 512-229.230592 512-512 512zM254.12608 528.77312l172.396544 174.733312a0.607232 0.607232 0 0 0 0.864256 0.01536l342.540288-343.36768a0.311296 0.311296 0 0 0-0.003072-0.44032l-37.359616-37.285888a0.320512 0.320512 0 0 0-0.443392-0.02048l-304.47616 277.743616c-0.37376 0.340992-0.996352 0.357376-1.381376 0.027648L294.8608 487.48544a0.339968 0.339968 0 0 0-0.452608 0.022528l-40.27904 40.824832a0.3072 0.3072 0 0 0-0.004096 0.44032z\" fill=\"#14cd21\" p-id=\"5019\"></path></svg>";
            }
            echo "</span></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<div class=\"cell\">
\t\t\t\t\t\t\t\t<div><span>回调:</span><span>";
            // line 93
            if (("N" == $this->getAttribute($context["order"], "merchant_notify_hooked", array()))) {
                echo "<svg t=\"1692708782180\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"2276\" width=\"18\" height=\"18\"><path d=\"M512 85.333333c235.648 0 426.666667 191.018667 426.666667 426.666667s-191.018667 426.666667-426.666667 426.666667S85.333333 747.648 85.333333 512 276.352 85.333333 512 85.333333z m181.034667 185.301334L512 451.669333 330.965333 270.634667 270.634667 330.965333 451.669333 512l-181.034666 181.034667 60.330666 60.330666L512 572.330667l181.034667 181.034666 60.330666-60.330666L572.330667 512l181.034666-181.034667-60.330666-60.330666z\" fill=\"#ef3b24\" p-id=\"2277\"></path></svg>";
            } else {
                echo "<svg t=\"1692708925162\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"5018\" width=\"18\" height=\"18\"><path d=\"M512 1024C229.230592 1024 0 794.769408 0 512S229.230592 0 512 0s512 229.230592 512 512-229.230592 512-512 512zM254.12608 528.77312l172.396544 174.733312a0.607232 0.607232 0 0 0 0.864256 0.01536l342.540288-343.36768a0.311296 0.311296 0 0 0-0.003072-0.44032l-37.359616-37.285888a0.320512 0.320512 0 0 0-0.443392-0.02048l-304.47616 277.743616c-0.37376 0.340992-0.996352 0.357376-1.381376 0.027648L294.8608 487.48544a0.339968 0.339968 0 0 0-0.452608 0.022528l-40.27904 40.824832a0.3072 0.3072 0 0 0-0.004096 0.44032z\" fill=\"#14cd21\" p-id=\"5019\"></path></svg>";
            }
            echo "</span></div>
\t\t\t\t\t\t\t\t<div><span>跳转:</span><span>";
            // line 94
            if (("N" == $this->getAttribute($context["order"], "merchant_jump_hooked", array()))) {
                echo "<svg t=\"1692708782180\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"2276\" width=\"18\" height=\"18\"><path d=\"M512 85.333333c235.648 0 426.666667 191.018667 426.666667 426.666667s-191.018667 426.666667-426.666667 426.666667S85.333333 747.648 85.333333 512 276.352 85.333333 512 85.333333z m181.034667 185.301334L512 451.669333 330.965333 270.634667 270.634667 330.965333 451.669333 512l-181.034666 181.034667 60.330666 60.330666L512 572.330667l181.034667 181.034666 60.330666-60.330666L572.330667 512l181.034666-181.034667-60.330666-60.330666z\" fill=\"#ef3b24\" p-id=\"2277\"></path></svg>";
            } else {
                echo "<svg t=\"1692708925162\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"5018\" width=\"18\" height=\"18\"><path d=\"M512 1024C229.230592 1024 0 794.769408 0 512S229.230592 0 512 0s512 229.230592 512 512-229.230592 512-512 512zM254.12608 528.77312l172.396544 174.733312a0.607232 0.607232 0 0 0 0.864256 0.01536l342.540288-343.36768a0.311296 0.311296 0 0 0-0.003072-0.44032l-37.359616-37.285888a0.320512 0.320512 0 0 0-0.443392-0.02048l-304.47616 277.743616c-0.37376 0.340992-0.996352 0.357376-1.381376 0.027648L294.8608 487.48544a0.339968 0.339968 0 0 0-0.452608 0.022528l-40.27904 40.824832a0.3072 0.3072 0 0 0-0.004096 0.44032z\" fill=\"#14cd21\" p-id=\"5019\"></path></svg>";
            }
            echo "</span></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
                        <td>-</td>
                        <td></td>
                        <td></td>
                    </tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "                </table>

                <div class=\"Page flex mt15\" style=\"align-items: center; justify-content: space-between;\">
                    <nav class=\"pagination-outer\" aria-label=\"Page navigation\">
                        <ul class=\"pagination\">
                            <li class=\"page-item\">
                                <a href=\"";
        // line 108
        echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
        echo "&page=1\" class=\"page-link\" style=\"width: auto;\">首页</a>
                            </li>
                            <li class=\"page-item\">
                                <a href=\"";
        // line 111
        echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
        echo "&page=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "prev", array()), "html", null, true);
        echo "\" class=\"page-link\" style=\"width: auto;\">上一页</a>
                            </li>

\t\t\t\t\t\t\t";
        // line 114
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range($this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "min", array()), $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "max", array())));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 115
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
        // line 117
        echo "
                            <li class=\"page-item\">
                                <a href=\"";
        // line 119
        echo twig_escape_filter($this->env, (isset($context["_url"]) ? $context["_url"] : $this->getContext($context, "_url")), "html", null, true);
        echo "&page=";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["pager"]) ? $context["pager"] : $this->getContext($context, "pager")), "pager", array()), "next", array()), "html", null, true);
        echo "\" class=\"page-link\" style=\"width: auto;\">下一页</a>
                            </li>
                            <li class=\"page-item\">
                                <a href=\"";
        // line 122
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
\t\t});
\t\t
\t\t</script>
\t\t
\t\t<style>
\t\t.model tr td a{color:blue;}
\t\t</style>
";
        
        $__internal_f8e16cff4a95e2c27b3700bb439d07e5b0f9c78a9feafcfb6ba070901630ba0c->leave($__internal_f8e16cff4a95e2c27b3700bb439d07e5b0f9c78a9feafcfb6ba070901630ba0c_prof);

    }

    public function getTemplateName()
    {
        return "FrontBundle:Order:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  275 => 122,  267 => 119,  263 => 117,  246 => 115,  242 => 114,  234 => 111,  228 => 108,  220 => 102,  202 => 94,  194 => 93,  182 => 88,  174 => 87,  169 => 84,  163 => 82,  159 => 80,  157 => 79,  152 => 77,  148 => 76,  142 => 73,  138 => 72,  132 => 69,  128 => 68,  122 => 67,  118 => 66,  112 => 65,  108 => 64,  105 => 63,  101 => 62,  43 => 6,  37 => 5,  30 => 1,  28 => 3,  11 => 1,);
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

{% set _url = path(\"front_order\") ~ \"?filter_channel_order_no=\" ~ filter_channel_order_no ~ \"&filter_plantform_order_no=\" ~ filter_plantform_order_no ~ \"&filter_merchant_order_no=\" ~ filter_merchant_order_no %}

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
                        <td>编号</td>
                        <td style=\"width:120px\">三方订单</td>
                        <td style=\"width:120px\">平台订单</td>
                        <td style=\"width:120px\">商户订单</td>
                        <td>发起金额</td>
                        <td>实际到账</td>
                        <td style=\"width:100px;\">手续费</td>
                        <td>货币</td>
                        <td>订单时间</td>
                        <td>三方接口</td>
                        <td>三方->平台</td>
                        <td>平台->商户</td>
                        <td>订单状态</td>
                        <td>备注</td>
                        <td>管理操作</td>
                    </tr>
\t\t\t\t\t{% for order in pager.data %}
                    <tr>
                        <td>{{ order.id }}</td>
                        <td><div class=\"cell\"><a href=\"#\">{{ order.channel.name }}</a><br />{{ order.channel_order_no }}</div></td>
                        <td><div class=\"cell\">{{ order.plantform_order_no }}</div></td>
                        <td><div class=\"cell\"><a href=\"#\">{{ order.merchant.name }}</a><br />{{ order.merchant_order_no }}</div></td>
                        <td>{{ order.amount }}</td>
                        <td>{{ order.amount - order.channel_fee }}</td>
                        <td>
\t\t\t\t\t\t\t<div class=\"cell\">
\t\t\t\t\t\t\t\t<div><span>三方:</span><span>{{ order.channel_fee }}</span></div>
\t\t\t\t\t\t\t\t<div><span>商户:</span><span>{{ order.merchant_fee }}</span></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
                        <td>{{ order.currency }}</td>
                        <td>{{ order.created_at|date('Y-m-d H:i:s') }}</td>
                        <td>
\t\t\t\t\t\t\t{% if 0 == order.channel_api_code %}
\t\t\t\t\t\t\t\t<svg t=\"1692692611988\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"2606\" width=\"32\" height=\"32\"><path d=\"M874.155198 150.227545c-200.303393-200.303393-523.241517-200.303393-723.54491 0s-200.303393 523.241517 0 723.54491 523.241517 200.303393 723.54491 0S1072.414679 350.530938 874.155198 150.227545zM739.256994 383.233533 467.416675 655.073852c-2.043912 2.043912-4.087824 2.043912-8.175649 2.043912s-6.131737 0-8.175649-2.043912l-165.556886-165.556886c-4.087824-4.087824-4.087824-10.219561 0-14.307385s10.219561-4.087824 14.307385 0l159.42515 159.42515L724.949609 368.926148c4.087824-4.087824 10.219561-4.087824 14.307385 0S743.344819 379.145709 739.256994 383.233533z\" fill=\"#14cd21\" p-id=\"2607\"></path></svg>
\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<a href=\"#\">{{ order.channel_api_code }}</a>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</td>
                        <td>
\t\t\t\t\t\t\t<div class=\"cell\">
\t\t\t\t\t\t\t\t<div><span>回调:</span><span>{% if 'N' == order.plantform_notify_hooked %}<svg t=\"1692708782180\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"2276\" width=\"18\" height=\"18\"><path d=\"M512 85.333333c235.648 0 426.666667 191.018667 426.666667 426.666667s-191.018667 426.666667-426.666667 426.666667S85.333333 747.648 85.333333 512 276.352 85.333333 512 85.333333z m181.034667 185.301334L512 451.669333 330.965333 270.634667 270.634667 330.965333 451.669333 512l-181.034666 181.034667 60.330666 60.330666L512 572.330667l181.034667 181.034666 60.330666-60.330666L572.330667 512l181.034666-181.034667-60.330666-60.330666z\" fill=\"#ef3b24\" p-id=\"2277\"></path></svg>{% else %}<svg t=\"1692708925162\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"5018\" width=\"18\" height=\"18\"><path d=\"M512 1024C229.230592 1024 0 794.769408 0 512S229.230592 0 512 0s512 229.230592 512 512-229.230592 512-512 512zM254.12608 528.77312l172.396544 174.733312a0.607232 0.607232 0 0 0 0.864256 0.01536l342.540288-343.36768a0.311296 0.311296 0 0 0-0.003072-0.44032l-37.359616-37.285888a0.320512 0.320512 0 0 0-0.443392-0.02048l-304.47616 277.743616c-0.37376 0.340992-0.996352 0.357376-1.381376 0.027648L294.8608 487.48544a0.339968 0.339968 0 0 0-0.452608 0.022528l-40.27904 40.824832a0.3072 0.3072 0 0 0-0.004096 0.44032z\" fill=\"#14cd21\" p-id=\"5019\"></path></svg>{% endif %}</span></div>
\t\t\t\t\t\t\t\t<div><span>跳转:</span><span>{% if 'N' == order.plantform_jump_hooked %}<svg t=\"1692708782180\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"2276\" width=\"18\" height=\"18\"><path d=\"M512 85.333333c235.648 0 426.666667 191.018667 426.666667 426.666667s-191.018667 426.666667-426.666667 426.666667S85.333333 747.648 85.333333 512 276.352 85.333333 512 85.333333z m181.034667 185.301334L512 451.669333 330.965333 270.634667 270.634667 330.965333 451.669333 512l-181.034666 181.034667 60.330666 60.330666L512 572.330667l181.034667 181.034666 60.330666-60.330666L572.330667 512l181.034666-181.034667-60.330666-60.330666z\" fill=\"#ef3b24\" p-id=\"2277\"></path></svg>{% else %}<svg t=\"1692708925162\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"5018\" width=\"18\" height=\"18\"><path d=\"M512 1024C229.230592 1024 0 794.769408 0 512S229.230592 0 512 0s512 229.230592 512 512-229.230592 512-512 512zM254.12608 528.77312l172.396544 174.733312a0.607232 0.607232 0 0 0 0.864256 0.01536l342.540288-343.36768a0.311296 0.311296 0 0 0-0.003072-0.44032l-37.359616-37.285888a0.320512 0.320512 0 0 0-0.443392-0.02048l-304.47616 277.743616c-0.37376 0.340992-0.996352 0.357376-1.381376 0.027648L294.8608 487.48544a0.339968 0.339968 0 0 0-0.452608 0.022528l-40.27904 40.824832a0.3072 0.3072 0 0 0-0.004096 0.44032z\" fill=\"#14cd21\" p-id=\"5019\"></path></svg>{% endif %}</span></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<div class=\"cell\">
\t\t\t\t\t\t\t\t<div><span>回调:</span><span>{% if 'N' == order.merchant_notify_hooked %}<svg t=\"1692708782180\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"2276\" width=\"18\" height=\"18\"><path d=\"M512 85.333333c235.648 0 426.666667 191.018667 426.666667 426.666667s-191.018667 426.666667-426.666667 426.666667S85.333333 747.648 85.333333 512 276.352 85.333333 512 85.333333z m181.034667 185.301334L512 451.669333 330.965333 270.634667 270.634667 330.965333 451.669333 512l-181.034666 181.034667 60.330666 60.330666L512 572.330667l181.034667 181.034666 60.330666-60.330666L572.330667 512l181.034666-181.034667-60.330666-60.330666z\" fill=\"#ef3b24\" p-id=\"2277\"></path></svg>{% else %}<svg t=\"1692708925162\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"5018\" width=\"18\" height=\"18\"><path d=\"M512 1024C229.230592 1024 0 794.769408 0 512S229.230592 0 512 0s512 229.230592 512 512-229.230592 512-512 512zM254.12608 528.77312l172.396544 174.733312a0.607232 0.607232 0 0 0 0.864256 0.01536l342.540288-343.36768a0.311296 0.311296 0 0 0-0.003072-0.44032l-37.359616-37.285888a0.320512 0.320512 0 0 0-0.443392-0.02048l-304.47616 277.743616c-0.37376 0.340992-0.996352 0.357376-1.381376 0.027648L294.8608 487.48544a0.339968 0.339968 0 0 0-0.452608 0.022528l-40.27904 40.824832a0.3072 0.3072 0 0 0-0.004096 0.44032z\" fill=\"#14cd21\" p-id=\"5019\"></path></svg>{% endif %}</span></div>
\t\t\t\t\t\t\t\t<div><span>跳转:</span><span>{% if 'N' == order.merchant_jump_hooked %}<svg t=\"1692708782180\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"2276\" width=\"18\" height=\"18\"><path d=\"M512 85.333333c235.648 0 426.666667 191.018667 426.666667 426.666667s-191.018667 426.666667-426.666667 426.666667S85.333333 747.648 85.333333 512 276.352 85.333333 512 85.333333z m181.034667 185.301334L512 451.669333 330.965333 270.634667 270.634667 330.965333 451.669333 512l-181.034666 181.034667 60.330666 60.330666L512 572.330667l181.034667 181.034666 60.330666-60.330666L572.330667 512l181.034666-181.034667-60.330666-60.330666z\" fill=\"#ef3b24\" p-id=\"2277\"></path></svg>{% else %}<svg t=\"1692708925162\" class=\"icon\" viewBox=\"0 0 1024 1024\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" p-id=\"5018\" width=\"18\" height=\"18\"><path d=\"M512 1024C229.230592 1024 0 794.769408 0 512S229.230592 0 512 0s512 229.230592 512 512-229.230592 512-512 512zM254.12608 528.77312l172.396544 174.733312a0.607232 0.607232 0 0 0 0.864256 0.01536l342.540288-343.36768a0.311296 0.311296 0 0 0-0.003072-0.44032l-37.359616-37.285888a0.320512 0.320512 0 0 0-0.443392-0.02048l-304.47616 277.743616c-0.37376 0.340992-0.996352 0.357376-1.381376 0.027648L294.8608 487.48544a0.339968 0.339968 0 0 0-0.452608 0.022528l-40.27904 40.824832a0.3072 0.3072 0 0 0-0.004096 0.44032z\" fill=\"#14cd21\" p-id=\"5019\"></path></svg>{% endif %}</span></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
                        <td>-</td>
                        <td></td>
                        <td></td>
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
\t\t});
\t\t
\t\t</script>
\t\t
\t\t<style>
\t\t.model tr td a{color:blue;}
\t\t</style>
{% endblock %}", "FrontBundle:Order:index.html.twig", "/www/wwwroot/backend.wuziceshi.xyz/src/FrontBundle/Resources/views/Order/index.html.twig");
    }
}
