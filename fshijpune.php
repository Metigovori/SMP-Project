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
    <section id="content" >
        <?php
     
        if (isset($_GET['pid'])) {
            $punaid = $_GET['pid'];
           $puna=merrPuneId($punaid);
           if($puna){
            $puna = mysqli_fetch_assoc($puna);
            $punaid = $puna['punaid'];
            $emri = $puna['emri'];
            $datapunet = $puna['datapunet'];
            $pershkrimi = $puna['pershkrimi'];
        }
    }
        if (isset($_POST['fshij'])) {
            $punaid = $_POST['punaid'];
            fshijPune($punaid);
        }
        ?>
        <form id="puna" method="post">
            <legend>Te Dhenat Per Punen</legend>
            <input readonly type="hidden" name="punaid" id="punaid" value="<?php if (!empty($punaid)) echo $punaid; ?>">
            <fieldset>
                <label>Emri: </label>
                <input disabled type="text" name="emri" id="emri" value="<?php if (!empty($emri)) echo $emri; ?>">
            </fieldset>
            <fieldset>
                <label>Data: </label>
                <input disabled type="text" name="datapunet" id="datapunet" value="<?php if (!empty($datapunet)) echo $datapunet; ?>">
            </fieldset>
            <fieldset>
                <label>Pershkrimi: </label>
                <input disabled type="text" name="pershkrimi" id="pershkrimi" value="<?php if (!empty($pershkrimi)) echo $pershkrimi; ?>">
            </fieldset>
            <input type="submit" name="fshij" id="fshij" value="Fshije">
        </form>
        </tbody>
        </table>
    </section>
</main>
<?php include 'inc/footer.php' ?>