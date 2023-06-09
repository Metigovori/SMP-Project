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
    <section id="projects">
    <h3 class="title">Projektet e Fundit</h3>
    <div class="slider">
    <?php
                $projektet = merrProjektet();
                $i = 0;
                while ($projekti = mysqli_fetch_assoc($projektet)) {
                    $projektiid = $projekti['projektiid'];
                    $emri = $projekti['emri'];
                    $pershkrimi = $projekti['pershkrimi'];
                    if (strlen($pershkrimi) > 120) {
                        $pershkrimi = substr($pershkrimi, 0, 100) . "...";
                    }
                    echo "<div class='card-info'>";
                    echo "<div class='card-img'>";
                    echo "<img src='images/project{$i}.jpg' alt='Projekti i pare'>";
                    echo "</div>";
                    echo "<div class='card-title'>";
                    echo "<h4>{$emri}</h4>";
                    echo "</div>";
                    echo "<div class='card-footer'><p>{$pershkrimi}</p></div>";
                    echo "<a class='meShume' href='projektiDetajet.php?projektiid={$projektiid}'>me shume &#8658;</a>";
                    echo "</div>";
                    $i++;
                    if ($i == 3) $i = 0;
                }
                ?>
    </div>
  </section>
        <table id="members">
            <tbody>
                <tr>
                    <th>Emri dhe Mbiemri</th>
                    <th>Telefoni</th>
                    <th>Email</th>
                    <th>Detaje</th>
                </tr>
               <?php 
               
               $anetaret=merrAntaret();
               $i=0;
               while ($antari=mysqli_fetch_assoc($anetaret)) {
              
                   if($i==6) break;
                   echo "<tr>";
                   echo "<td>". $antari['emri']. " " . $antari['mbiemri'] ."</td>";
                   echo "<td>". $antari['telefoni'] ."</td>";
                   echo "<td>". $antari['email'] ."</td>";
                   echo "<td><a href='antariDetajet.php?aid={$antari['antariid']}'>Detaje</a></td>";
                   echo "</tr>";
                   $i++;
               }

               ?>
                <tr>
                    <th>Emri dhe Mbiemri</th>
                    <th>Telefoni</th>
                    <th>Email</th>
                    <th>Detaje</th>
                </tr>
            </tbody>
        </table>
    </section>
</main>
<?php include 'inc/footer.php' ?>