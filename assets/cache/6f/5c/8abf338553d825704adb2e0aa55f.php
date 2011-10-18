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
 ";
        // line 28
        if ($this->getContext($context, 'esito')) {
            // line 29
            echo " \t<div>";
            echo twig_escape_filter($this->env, $this->getContext($context, 'esito'), "html");
            echo "</div>
 ";
        }
        // line 31
        echo " Record Trovati ";
        echo twig_escape_filter($this->env, $this->getContext($context, 'numero'), "html");
        echo "
        
        <table>

        ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'famiglie'));
        foreach ($context['_seq'] as $context['_key'] => $context['famiglia']) {
            echo " 
            ";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'famiglia'), "id", array(), "any", false), "html");
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'famiglia'), "descrizione", array(), "any", false), "html");
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['famiglia'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 37
        echo "       \t     
            
        </table>
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
