<?php

/* layout.html */
class __TwigTemplate_6b2b10d4d26891baaddc52a5afc90c84ddc879ec7196dce7b09e2ec7133597e0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<body>
<header>header</header>
<content>
  ";
        // line 5
        $this->displayBlock('content', $context, $blocks);
        // line 8
        echo "</content>
<footer>footer</footer>
</body>
</html>
";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
  ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  39 => 6,  36 => 5,  28 => 8,  26 => 5,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
<body>
<header>header</header>
<content>
  {% block content %}

  {% endblock %}
</content>
<footer>footer</footer>
</body>
</html>
", "layout.html", "D:\\demo\\php\\SimpleFramework\\app\\views\\layout.html");
    }
}
