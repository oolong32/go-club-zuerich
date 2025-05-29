<?php

// das Plugin aus dem Kirby-Cookbook, das die Platzhalter
// für die Success-Seite bereitstellen soll, funktioniert nicht, siehe:
// getkirby.com/docs/cookbook/forms/creating-pages-from-frontend
// Chat-GPT behauptet, der dort verwendete Webhook greife zu spät.

return function ($page) {
    $session = kirby()->session();

    $referer = $session->get('referer');
    $name    = $session->get('regName');
    // $ back link 

    $turnierTitle = '';
    if ($referer && $refPage = page(urldecode($referer))) {
        $turnier = $refPage->title()->value();
    }

    return array(
      'name'    => $name,
      'turnier' => $turnier
    );
};
