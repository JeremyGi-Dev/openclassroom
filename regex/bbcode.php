
<?php
// changement de balise de style comme gras ou italique

$texte = '<p>' . 'Ce texte est [b]important[/b], il faut me [b]comprendre[/b] !' . '</p>';
echo $texte;
$texte = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $texte);
$texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte);

echo $texte;

?>

<?php
//changement de couleur du texte

$texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', '<span style="color:$1">$2</span>', $texte);

?>

<?php
// lien http:// cliquable

$texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $texte);
