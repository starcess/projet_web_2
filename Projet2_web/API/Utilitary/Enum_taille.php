<?php
class Enum_taille
{
    const TAILLE_44 = '44';
    const TAILLE_46 = '46';
    const TAILLE_48 = '48';
    const TAILLE_50 = '50';
    const TAILLE_52 = '52';
    const TAILLE_54 = '54';
    const TAILLE_56 = '56';
    const TAILLE_CRAVATTE_UNIQUE = "150";
}

// Utilisation de l'énumération
// $selectedSize = Enum_taille::TAILLE_50;

// if ($selectedSize >= Enum_taille::TAILLE_44 && $selectedSize <= Enum_taille::TAILLE_56 && ($selectedSize - Enum_taille::TAILLE_44) % 2 == 0) {
//     echo "Taille sélectionnée : $selectedSize";
// } else {
//     echo "La taille sélectionnée n'est pas reconnue.";
// }

?>