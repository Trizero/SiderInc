<?php

/* famiglia/add.twig */
class __TwigTemplate_7227e47b73cf711e64f4feb10c02fbba extends Twig_Template
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
  \t<link href=\"assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
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

<div align\"center\" style=\"margin: 0 auto; width: 100%;\">
\t
\t<fieldset>
\t\t<legend>
\t\t\tInserisci una nuova Famiglia
\t\t</legend>
\t\t<form method=\"post\">
\t\t\t<label for=\"descrizione\">Descrizione Famiglia</label>
\t\t\t<input type=\"text\" id=\"descrizione\" name=\"descrizione\" required/>
\t\t\t<br/>
\t\t\t<input type=\"submit\" name=\"submit\" value=\"Salva\"/>
\t\t</form>
\t</fieldset>

</div>

</body>

</html>";
    }

    public function getTemplateName()
    {
        return "famiglia/add.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
