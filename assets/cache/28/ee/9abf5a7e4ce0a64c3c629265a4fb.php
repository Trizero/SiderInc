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
\t<meta charset=\"utf-8\" />

  \t<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame Remove this if you use the .htaccess -->
  \t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />

  \t<title>";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, 'titolo'), "html");
        echo "</title>
  \t<!-- <link rel=\"stylesheet\" href=\"http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.css\" /> -->
 \t<!-- <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-1.6.4.min.js\"></script> -->
\t<!-- <script type=\"text/javascript\" src=\"http://code.jquery.com/mobile/1.0rc2/jquery.mobile-1.0rc2.min.js\"></script> -->
  \t<meta name=\"description\" content=\"\" />
  \t<meta name=\"author\" content=\"Fabio Bosisio\" />

  \t<meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0\" />

  \t<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  \t<link rel=\"shortcut icon\" href=\"/favicon.ico\" />
\t<link rel=\"apple-touch-icon\" href=\"/apple-touch-icon.png\" />
</head>

<body>

<div align=\"center\" style=\" margin:0 auto; padding-bottom:20px;\">
\t<img src=\"assets/images/icon.png\"></img>
</div>

<div>
\t<h2>Welcome in ";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, 'projectName'), "html");
        echo " Project</h2>
\t<p>If you see this page, everything is ok!</p>
</div>

<div>
\t<a href=\"list_famiglia.php\">Lista Famiglie</a>
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
