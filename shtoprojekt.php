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
        if (isset($_POST['shto'])) {
            shtoProjekt($_POST['projektiid'],
            $_POST['dataefillimit'],$_POST['dataembarimit'], $_POST['pershkrimi']);
        }

        ?>
        <form id="projekti" method="post">
            <legend>Forma per regjistrim</legend>
            <fieldset>
                <label>Emri i projektit: </label>
                <select name="projektiid">
                    <option value="">Zgjedh projektin</option>
                    <?php
                        $projektet=merrProjektet();
                        while ($projekti= mysqli_fetch_assoc($projektet)) {
                            $emri=$projekti['emri'];
                            echo "<option value='{$emri}'>{$emri}</option>"; 
                        }
                    ?>
                </select>
            </fieldset>
            <fieldset>
                <label>Data e fillimit: </label>
                <input type="date" name="dataefillimit" id="dataefillimit">
            </fieldset>
            <fieldset>
                <label>Data e mbarimit: </label>
                <input type="date" name="dataembarimit" id="dataembarimit">
            </fieldset>
            <fieldset>
                <label>Pershkrimi: </label>
                <textarea name="pershkrimi" id="pershkrimi"></textarea>
            </fieldset>
            <input type="submit" name="shto" id="shto" value="Regjistrohu">
        </form>
    </section>
</main>
<?php include 'inc/footer.php' ?>