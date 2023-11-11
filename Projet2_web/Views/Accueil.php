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

    <!-- </div> -->


</body>


</html>