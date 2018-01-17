<?php

if(preg_match("#gUitare#i", "Je n'ai jamais joué a la guitare"))
{
    echo 'Le mot que vous cherchez se trouve dans la chaine';
}
else
{
    echo 'Le mot que vous cherchez ne se trouve pas dans la chaine';
}

// preg_match : permet de verifier si un mot ou une phrase se trouve dans la string a tester "# #" sert de delimiteur
// et i est une options qui evite " la casse "

// "|" permet de mettre plusieurs recherche ex: #guitare|piano# va chercher guitare OU piano

// "^" indique le debut d'une chaine, "$" indique la fin d'une chaine
// ex: une chaine qui commence par Bonjour = #^Bonjour#
// ex: une chaine qui se termine par zero = #zero$#

// #gr[io]s# les crochets sont une classe de caractères, cela signifie qu'une des deux lettre suffis
// ex: gros et gris renverront vrai car "i" ou "o" sont dans les crochets, gras renverra faux car "a" n'y es pas

// on peut utiliser le signe "-" pour signifier qu'on veut faire une recherche specifique dans un ensemble
// ex: #[azerty]# devient [a-z] et renverra vrai si une des lettre se trouve dans la string
// cela fonctionne egalement sur les chiffre et les majuscules
// ex: #[a-zA-Z0-9]# permet de chercher toutes les lettres de a à z en minuscules ET majuscules mais aussi les chiffres de 0 à 9
// bien penser quand on utilise la methode au dessus de ne pas séparer par un espace quand on change de verification

// si on ne veut pas d'un caractére dans une chaine on doit mettre le signe ^ DANS la classe de caractère
// ex: #^[a-z]# verifie que la chaine de caractères commencent par une lettre en minuscule
// ex: #[^a-z]# verifie que la chaine ne contient aucune lettre
// ex: #^[^a-z# verifie que la chaine de caractéres ne commencent pas par une lettre en minuscules

// le "?" indique qu'une lettre est falcultative
// ex: #a?# reconnait 0 à 1 <<a>>

// le "+" indique que la lettre est obligatoire, elle doit apparaitre une ou plusieurs fois
// ex: #a+# reconnait <<a>>, <<aa>>, <<aaa>>, <<aaaa>> etc...

// le "*" indique que la lettre est facultative mais peut apparaitre plusieurs fois
// ex: #a*# reconnait <<a>>, <<aa>> etc... mais fonctionne également si le <<a>> n'apparaît pas

// si on veut reconnaitre plusieurs lettre ou un mot il faut mettre ou un mot devant ou alors mettre entre parentheses
// ex: #chien?# reconnaitra chien ou chiens
// ex: #Ay(ay)*# reconnaitra <<Ay>>, <<Ayay>>, <<Ayayayay>> etc...

// cela fonctionne avec les chiffres également
// ex: #[0-9]+# reconnaît n'importe quel nombre du moment qu'il y a un chiffre

// 3 façons d'utiliser les accolades pour rendre la recherche plus précise
// ex 1: {3} veut dire que la lettre ou le chiffre doit être repeter 3 fois exactement #a{3}# fonctionne donc pour la chaine <<aaa>>
// ex 2: {3,5} veut dire qu'on peut avoir la lettre ou le chiffre 3 à 5 fois, #a{3,5}# fonctionne donc pour <<aaa>>, <<aaaa>> ou <<aaaaa>>
// ex 3: {3,} si on met une virgule mais pas de deuxieme nombre, cela veut dire 3 fois ou plus , #a{3,}# fonctionne donc pour <<aaa>>, <<aaaa>> etc...

// metacaractères à connaître pour une regex : # ! ^ $ ( ) [ ] { } ? + * . \ |

// si on veut reconnaître un caractère special, il faut ou alors mettre un antislash devant
// ex: on recherche "Quoi ?" , cela donne #Quoi \?#

// ou alors on peut preciser dans une chaine de caractères
// ex: #[a-z?+*{}]# précise qu'on a le doit de mettre une lettre, un point d'interrogation, un signe + etc...

// 3 cas particuliers
// ex 1: "#" signifie la fin de la regex donc si on veut le rechercher il faut un antislash devant, \#
// ex 2: "]# signifie la fin de la chaine de caractères , donc même traitement que le dièse
// ex 3: "-" signifie un intervalle de classe donc si on veut le rechercher il faut le mettre a la fin, #[a-z0-9-]# cherchera une lettre, un chiffre ou un tiret

// les classe abrégées
// "\d" indique un chiffre, cela revient a taper [0-9]
// "\D" indique que ce n'est PAS un chiffre, cela revient a taper [^0-9]
// "\w" indique un caractères alphanumérique ou un soulignement, cela revient a taper [a-zA-Z0-9_]
// "\W" indique que ce n'est PAS un mot, cela revient a taper [^a-zA-Z0-9_]
// "\t" indique un tabulation
// "\n" indique une nouvelle ligne
// "\r" indique un retour chariot
// "\s" indique un espace blanc
// "\S" indique que ce n'est PAS un espace blanc ( \t, \n, \r)
// "." indique n'importe quel caractère, autorise donc TOUT

// pour le point, il existe une exception, il indique tout sauf les entrées, pour qu'il les reconnaisse, il faut utiliser les options "s" a la fin ( voir "i" pour application )
