<?php include 'inc/header.php' ?>
<!--Main Part-->
<main class="container page">
    <article id="maininfo">
        <h2 class="title">SMP Projekti Pershkrimi</h2>
        <p> Sistemi për menaxhimin e projekteve mundëson një kompanie menaxhimin e punëve
            nga punëtorët e saj për projektet që ajo ka. Sistemi ofron menaxhimin e stafit: shtimin,
            modifikimin fshirjen, paraqitjen e stafit, menaxhimin e projekteve: shtimin,
            modifikimin fshirjen, paraqitjen e projekteve dhe menaxhimin e punëve ë bën stafi në
            kuadër të projekteve.
        </p>
    </article>
    <?php include 'inc/sidebar.php' ?>
    <section id="content">
        <?php
           if(isset($_POST['shto'])){
            shtoAntar($_POST['emri'],$_POST['mbiemri'],$_POST['telefoni'],$_POST['email'],$_POST['fjalekalimi']);
        }
        
        ?>
        <form id="anetari" method="post">
            <legend>Forma per regjistrim</legend>
            <fieldset>
                <label>Emri: </label>
                <input type="text" name="emri" id="emri">
            </fieldset>
            <fieldset>
                <label>Mbiemri: </label>
                <input type="text" name="mbiemri" id="mbiemri">
            </fieldset>
            <fieldset>
                <label>Telefoni: </label>
                <input type="text" name="telefoni" id="telefoni">
            </fieldset>
            <fieldset>
                <label>Email: </label>
                <input type="email" name="email" id="email">
            </fieldset>
            <fieldset>
                <label>Fjalekalimi: </label>
                <input type="password" name="fjalekalimi" id="fjalekalimi">
            </fieldset>
            <input type="submit" name="shto" id="shto" value="Regjistrohu">
        </form>

    </section>
</main>
<?php include 'inc/footer.php' ?>