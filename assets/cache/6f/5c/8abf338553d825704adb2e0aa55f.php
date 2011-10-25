<?php

/* famiglia/list.twig */
class __TwigTemplate_6f5c8abf338553d825704adb2e0aa55f extends Twig_Template
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

";
        // line 27
        if ($this->getContext($context, 'esito')) {
            // line 28
            echo " \t<div>";
            echo twig_escape_filter($this->env, $this->getContext($context, 'esito'), "html");
            echo "</div>
";
        }
        // line 30
        echo "
<div align\"center\" style=\"margin: 0 auto; width: 100%;\">

\tRecord Trovati ";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, 'numero'), "html");
        echo "
        
    <table>
  \t\t<tr>
    \t\t<th>ID</th>
    \t\t<th>Descrizione</th>
  \t\t</tr>
\t\t";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'famiglie'));
        foreach ($context['_seq'] as $context['_key'] => $context['famiglia']) {
            echo " 
  \t\t<tr>
    \t\t<td>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'famiglia'), "id", array(), "any", false), "html");
            echo "</td>
    \t\t<td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'famiglia'), "descrizione", array(), "any", false), "html");
            echo "</td>
  \t\t</tr>
  \t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['famiglia'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 46
        echo "\t</table>

</div>
 
<div>
\t<a href=\"index.php\">Home Page</a> - <a href=\"add_famiglia.php\">Crea Famiglia</a> 
</div>
 
</body>

</html>";
    }

    public function getTemplateName()
    {
        return "famiglia/list.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
