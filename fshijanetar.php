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
     
        if (isset($_GET['aid'])) {
            $antariid = $_GET['aid'];
            $antari=merrAntarId($antariid);
           if($antari){
            $antari = mysqli_fetch_assoc($antari);
            $antariid = $antari['antariid'];
            $emri = $antari['emri'];
            $mbiemri = $antari['mbiemri'];
            $email = $antari['email'];
            $telefoni = $antari['telefoni'];
            $fjalekalimi = $antari['fjalekalimi'];
        }
    }
        if (isset($_POST['fshij'])) {
            $antariid = $_POST['antariid'];
            fshijAntar($antariid);
        }
        ?>
        <form id="anetari" method="post">
            <legend>Forma per regjistrim</legend>
            <input readonly type="hidden" name="antariid" id="antariid" value="<?php if (!empty($antariid)) echo $antariid; ?>">
            <fieldset>
                <label>Emri: </label>
                <input disabled type="text" name="emri" id="emri" value="<?php if (!empty($emri)) echo $emri; ?>">
            </fieldset>
            <fieldset>
                <label>Mbiemri: </label>
                <input disabled type="text" name="mbiemri" id="mbiemri" value="<?php if (!empty($mbiemri)) echo $mbiemri; ?>">
            </fieldset>
            <fieldset>
                <label>Telefoni: </label>
                <input disabled type="text" name="telefoni" id="telefoni" value="<?php if (!empty($telefoni)) echo $telefoni; ?>">
            </fieldset>
            <fieldset>
                <label>Email: </label>
                <input disabled type="email" name="email" id="email" value="<?php if (!empty($email)) echo $email; ?>">
            </fieldset>
            <fieldset>
                <label>Fjalekalimi: </label>
                <input disabled type="password" name="fjalekalimi" id="fjalekalimi" value="<?php if (!empty($fjalekalimi)) echo $fjalekalimi; ?>">
            </fieldset>
            <input type="submit" name="fshij" id="fshij" value="Fshije">
        </form>
        </tbody>
        </table>
    </section>
</main>
<?php include 'inc/footer.php' ?>