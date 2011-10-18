<?php

/* index.twig */
class __TwigTemplate_28ee9abf5a7e4ce0a64c3c629265a4fb extends Twig_Template
{
    protected function doGetParent(array $context)
    {
        return false;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <title>Welcome</title>
  <meta name=\"description\" content=\"\" />
  <meta name=\"author\" content=\"Mauro Bolis\" />

  <meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0\" />
  <link rel=\"shortcut icon\" href=\"/favicon.ico\" />
  <link rel=\"apple-touch-icon\" href=\"/apple-touch-icon.png\" />
</head>

<body>
  <div>
\t<h2>Welcome in ";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, 'projectName'), "html");
        echo " Project</h2>
\t<p>If you see this page, everything is ok!</p>
  </div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
