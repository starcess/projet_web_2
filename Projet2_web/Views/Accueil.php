<?php

session_start();

// print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/index_styles.css">
    <title>Page Acceuil</title>
</head>

<!-- https://codepen.io/onion2k/pen/xxZYBVj -->

<body>

    <?php include('header.php'); ?>


    <!-- <div class="body"> -->

    <div class="body_container">
        <div class="carousel_container">
            <input type="radio" name="position" checked />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <main id="carousel">
                <div id="item1" class="item">
                </div>
                <div id="item2" class="item"></div>
                <div id="item3" class="item"></div>
                <div id="item4" class="item"></div>
                <div id="item5" class="item"></div>
            </main>
        </div>

        <!-- 
            <div class="description">
                Rich Ricasso, le célèbre cravatier et chemisier,
                souhaite lancer sa boutique en ligne pour présenter sa
                nouvelle gamme d'été en soie unisexe. Son style,
                inspiré du mouvement vaporwave et vaporfashion accentue les
                tons pastel tels que le bleu ciel, le rose poudré
                et le violet lavande, et a ainsi conquis le monde de l'ultra-luxe.
                Il souhaite maintenant ouvrir sa gamme au grand public.
            </div> -->

    </div>

    <?php include('./Components/Caroussel.php'); ?>

    <div id="AccueilContainer">
        <div id="ImageRich">
            <img src="..\Ressource\Images\Rich_Ricasso.png" alt="Rich Ricasso">
        </div>
        <div id="texteBienvenue">
            <h1> 🌟 Bienvenue chez VaporWave Vogue 🌟</h1>

            <h2>Embrassez l'Élégance Rétro-Futuriste !</h2>
            <br>
            <p>Salut à toi, voyageur du temps passionné de mode,</p>
            <br>

            <p>Es-tu prêt(e) à embarquer pour un voyage à travers les couloirs éclairés au néon du style et de la
                nostalgie ? Bienvenue chez VaporWave Vogue, où le passé et le futur se rejoignent dans une symphonie
                d'esthétiques.</p>
            <br>
            <p>✨ Ce qui t'attend ✨</p>
            <br>
            <ol id="list">
                <li>💫 Vibes Vaporwave : Plonge dans le monde captivant de la mode inspirée de la vaporwave. Pense à des
                    couleurs audacieuses, à des graphiques glitchés et à une touche de nostalgie des années 90. Découvre
                    des vêtements aussi uniques que toi.</li>

                <li>🌐 Sorties Exclusives : Sois le premier à être informé de nos clilections de mode vaporwave
                    exclusives. Mets la main sur des pièces en édition limitée qui te feront briller dans n'importe
                    quelle époque.</li>
                <li>🎨 Expressions Artistiques : Explore l'intersection entre la mode et l'art. Notre infliettre met en
                    avant le travail d'artistes et de designers talentueux partageant notre passion pour l'esthétique
                    vaporwave.</li>
                <li>🌴 Rencontres Virtuelles : Rejoins notre communauté en ligne de passionnés de mode partageant les
                    mêmes idées. Connecte-toi avec d'autres personnes qui apprécient les vibes oniriques et surréalistes
                    de la vaporwave.</li>
                <li>🎁 Concours et Cadeaux : Gagne des prix fabuleux, des cartes-cadeaux et des articles uniques dans
                    nos concours et cadeaux inspirés de la vaporwave.</li>
            </ol>
            <br>
            <p>Prêt(e) à te téléporter dans le passé du futur avec nous ? Inscris-toi à notre infolettre dès maintenant
                et deviens partie intégrante du mouvement VaporWave Vogue.</p>
            <br>
            <h2>🚀 Comment nous rejoindre 🚀</h2>
            <br>
            <p>Faire partie de VaporWave Vogue est aussi facile que de piloter un hoverboard :</p>
            <br>
            <ul>
                <li> Rends-toi sur notre site web et trouve le formulaire d'inscription – il brille aussi fort qu'une
                    enseigne au néon.</li>
                <li> Saisis ton adresse e-mail et prépare-toi à partir pour un voyage stylé.</li>
                <li> Consulte régulièrement ta boîte de réception pour nos mises à jour exclusives et nos offres.</li>
            </ul>
            <br>
            <p>Partageons ensemble l'univers vaporwave et redéfinissons la mode de la manière la plus cool qui soit.</p>
            <p>Merci de nous rejoindre dans cette aventure haute en couleur !</p>
            <br>
            <p>Rester rétro-fabuleux,</p>
            <p>L'équipe de VaporWave Vogue 🌐✨</p>


        </div>

    </div>
    <!-- </div> -->
</body>





<script>
    const url = '/projet_web_2/Projet2_web/liste_produit';
    // echo "URI : " . $uri . "<br>";
    // echo "Méthode : " . $method . "<br>";
    // console.log("hi");
    fetch(url)
        .then(response => {
            if (response.status !== 200) {
                console.log('Error: Non-200 status code');
                return [];
            }
            // console.log(response.json())
            return response.json();
        }).then(data => {
            if (data.length > 0) {
                // data.forEach(data => {
                // html += `<p>${flower}</p>`;
                // console.log(data.image)
                addCarouselImages(data);
                // });
            }


        })
        .catch(error => console.log(error));



    function addCarouselImages(data) {
        let existingNumbers = new Array();
        let carouselName = "item";
        let carrouselDiv
        let img
        let imageList = new Array();
        let randomInt
        if (data.length > 0) {
            data.forEach(data => {
                imageList.push(data.image)
            });
            console.log("DB_9235", imageList)

            for (let i = 2; i < 6; i++) {
                randomInt = createRandomNumber(existingNumbers)
                chosenImg = "" + imageList[randomInt]
                console.log("DB_9234", chosenImg);
                img = document.createElement('img');
                img.src = '../Ressource/Images/' + chosenImg;
                img.alt = chosenImg;
                img.id = chosenImg;
                img.style.width = '100%';
                img.style.height = '100%';
                img.className = 'carousselImg';
                carouselName = "item" + i;
                carrouselDiv = document.getElementById(carouselName)
                carrouselDiv.appendChild(img);
                console.log(carrouselDiv)
            }
            let btn_AboutMe = document.createElement('button');
            btn_AboutMe.textContent = "A propos de moi";
            btn_AboutMe.id = "click"
            btn_AboutMe.style.position = 'absolute';
            img = document.createElement('img');
            img.src = '../Ressource/Images/designer_m_1.png';
            img.alt = 'designer_m_1';
            img.id = 'designer_m_1';
            img.style.width = '100%';
            img.style.height = '100%';
            img.className = 'carousselImg';
            carouselName = "item" + 1;
            carrouselDiv = document.getElementById(carouselName)
            carrouselDiv.appendChild(btn_AboutMe);
            carrouselDiv.appendChild(img);


            // <div id="click">About Me</div>
            console.log(carrouselDiv)
        }
    }



    function createRandomNumber(existingNumbers) {
        let randomInt;
        do {
            randomInt = Math.floor(Math.random() * 8);
            // console.log("DB_976", randomInt);
        } while (existingNumbers.includes(randomInt));
        console.log("DB_977", randomInt);
        existingNumbers.push(randomInt);
        console.log("DB_978", existingNumbers);
        return randomInt;
    }

</script>



</html>