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
  <meta charset=\"utf-8\" />

  
  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />

  <title>";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, 'titolo'), "html");
        echo "</title>
  <link href=\"assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
  <meta name=\"description\" content=\"\" />
  <meta name=\"author\" content=\"Fabio Bosisio\" />

  <meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0\" />

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel=\"shortcut icon\" href=\"/favicon.ico\" />
  <link rel=\"apple-touch-icon\" href=\"/apple-touch-icon.png\" />
</head>

<body>
    <div align=\"center\" style=\" margin:0 auto; padding-bottom:20px;\">
        <img src=\"assets/images/icon.png\"></img>
       </div>
 <div align\"center\" style=\"margin: 0 auto; width: 100%;\">

<fieldset>
\t<legend>
\t\tInserisci una nuova Famiglia
\t</legend>
\t<form method=\"post\">
\t\t<label for=\"descrizione\">Descrizione Famiglia</label>
\t\t<input type=\"text\" id=\"descrizione\" name=\"descrizione\" required/>
\t\t<br/>
\t\t<input type=\"submit\" name=\"submit\" value=\"Salva\"/>
\t</form>
</fieldset>

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
