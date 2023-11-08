<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/infolettre_styles.css">
    <title>Infolettre</title>
</head>

<body>
    <!-- <details> -->
    <!-- <button id="open-popup">Open Popup</button> -->

    <div id="popup-form" class="form-container" style="display: block;">
        <button id="close-popup" class="close-button">x</button>
        <div>Subscribe to Our Newsletter</div>
        <form>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Subscribe">
        </form>
    </div>
    <!-- </details> -->


    <script>
        // document.getElementById("open-popup").addEventListener("click", function () {
        //     var popupForm = document.getElementById("popup-form");
        //     if (popupForm.style.display === "none") {
        //         popupForm.style.display = "block";
        //     } else {
        //         popupForm.style.display = "none";
        //     }
        // });

        document.getElementById("close-popup").addEventListener("click", function () {
            var popupForm = document.getElementById("popup-form");
            popupForm.style.display = "none";
        });
    </script>



</body>

</html>