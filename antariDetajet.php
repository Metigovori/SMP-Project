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

        if(isset($_GET['aid'])){
            $antariid=$_GET['aid'];
            $anetari=merrAntarId($antariid);
            if($anetari){
            $antari=mysqli_fetch_assoc($anetari);
            $antariid=$antari['antariid'];
            $emri=$antari['emri'];    
            $mbiemri=$antari['mbiemri'];
            $email=$antari['email'];
            $telefoni=$antari['telefoni'];
           }
        }


    
        ?> 
       <form id="anetari" method="post">
            <legend>Detajet</legend>
            <input type="hidden" name="antariid" id="antariid" 
            value="<?php if(!empty($antariid)) echo $antariid; ?>">
            <input type="hidden" name="antariid" id="antariid" 
            value="<?php if(!empty($antariid)) echo $antariid; ?>">
            <fieldset>
                <label>Emri: </label>
                <input disabled type="text" name="emri" id="emri" 
                value="<?php if(!empty($emri)) echo $emri; ?>">
            </fieldset>
            <fieldset>
                <label>Mbiemri: </label>
                <input disabled type="text" name="mbiemri" id="mbiemri" value="<?php if(!empty($mbiemri)) echo $mbiemri; ?>">
            </fieldset>
            <fieldset>
                <label>Telefoni: </label>
                <input disabled type="text" name="telefoni" id="telefoni" value="<?php if(!empty($telefoni)) echo $telefoni; ?>">
            </fieldset>
            <fieldset>
                <label>Email: </label>
                <input disabled type="email" name="email" id="email" value="<?php if(!empty($email)) echo $email; ?>">
            </fieldset>
        </form>

    <section id="content" >
    <h3 class="title">Punet E Kryera</h3>
    <a href="shtopune.php">Shto</a>
    <table id="members">
        <tbody>
            <tr>
                <th>Emri i Projektit</th>
                <th>Data e Punes</th>
                <th>Pershkrimi</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $punet = merrAntariPunet($_GET['aid']);
            if (mysqli_num_rows($punet) > 0) {
            while ($puna = mysqli_fetch_assoc($punet)) {
                $punaid = $puna['punaid'];
                echo "<tr>";
                echo "<td>" . $puna['emri'] . "</td>";
                echo "<td>" . $puna['datapunet'] . "</td>";
                echo "<td>" . $puna['pershkrimi'] . "</td>";
                echo "<td><a href='modifikopune.php?pid={$punaid}'>Edit</a></td>";
                echo "<td><a href='fshijpune.php?pid={$punaid}'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "Nuk ka shenime";
        }
     
            ?>
        </tbody>
    </table>
  </section>   
</section>
</main>



<?php include 'inc/footer.php' ?>