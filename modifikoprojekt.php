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

        if (isset($_GET['projektiid'])) {
            $projektiid = $_GET['projektiid'];
           $projekti=merrProjektId($projektiid);
           if($projekti){
            $projekti = mysqli_fetch_assoc($projekti);
            $projektiid = $projekti['projektiid'];
            $emri = $projekti['emri'];
            $dataefillimit = $projekti['dataefillimit'];
            $dataembarimit = $projekti['dataembarimit'];
            $pershkrimi = $projekti['pershkrimi'];
           }
        }
        if (isset($_POST['modifiko'])) {
            modifikoProjekt($_POST['projektiid'],$_POST['emri'], $_POST['dataefillimit'],$_POST['dataembarimit'], $_POST['pershkrimi']);
        }
        ?> 
       <form id="puna" method="post">
            <legend>Te Dhenat Per Projektin</legend>
            <input readonly type="hidden" name="projektiid" id="projektiid" value="<?php if (!empty($projektiid)) echo $projektiid; ?>">
            <fieldset>
                <label>Emri: </label>
                <input  type="text" name="emri" id="emri" value="<?php if (!empty($emri)) echo $emri; ?>">
            </fieldset>
            <fieldset>
                <label>Data E Fillimit: </label>
                <input type="text" name="dataefillimit" id="dataefillimit" value="<?php if (!empty($dataefillimit)) echo $dataefillimit; ?>">
            </fieldset>
            <fieldset>
                <label>Data E Mbarimit: </label>
                <input type="text" name="dataembarimit" id="dataembarimit" value="<?php if (!empty($dataembarimit)) echo $dataembarimit; ?>">
            </fieldset>
            <fieldset>
                <label>Pershkrimi: </label>
                <input type="text" name="pershkrimi" id="pershkrimi" value="<?php if (!empty($pershkrimi)) echo $pershkrimi; ?>">
            </fieldset>
            <input type="submit" name="modifiko" id="modifiko" value="Modifiko">
        </form>
    </section>
</main>
<?php include 'inc/footer.php' ?>