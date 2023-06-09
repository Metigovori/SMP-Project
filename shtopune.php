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
            shtoPune($_POST['projektiid'],$_POST['datapune'], $_POST['pershkrimi']);
        }

        ?>
        <form id="pune" method="post">
            <legend>Forma per regjistrim</legend>
            <fieldset>
                <label>Emri i projektit: </label>
                <select name="projektiid">
                    <option value="">Zgjedh projektin</option>
                    <?php
                        $projektet=merrProjektet();
                        while ($projekti= mysqli_fetch_assoc($projektet)) {
                            $projektiid=$projekti['projektiid'];
                            $emri=$projekti['emri'];
                            echo "<option value='{$projektiid}'>{$emri}</option>"; 
                        }
                    ?>
                </select>
            </fieldset>
            <fieldset>
                <label>Data e punes: </label>
                <input type="date" name="datapune" id="datapune">
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