<?php
function renderLayout($view, $resultado = null)
{
    $viewFile = __DIR__ . '/../views/' . $view . '.php';
    if (file_exists($viewFile)) {
        include __DIR__ . '/../views/layout.php';
    } else {
        echo "<h2>La vista '$view' no existe.</h2>";
    }
}

function renderFunctionLayout($function)
{
    $viewFile = __DIR__ . '/../functions/' . $function . '.php';
    if (file_exists($viewFile)) {
        include __DIR__ . '/../views/layout.php';
    } else {
        echo "<h2>La vista '$function' no existe.</h2>";
    }
}