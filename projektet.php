<?php include 'inc/header.php'; 
if(!isset($_SESSION['antari'])){
    header("Location: index.php");
}
?>

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

        <h3 class="title">Lista e puneve</h3>
        <a href="shtoprojekt.php">Shto</a>
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
                $projektet = merrProjektet();
                while ($projekti = mysqli_fetch_assoc($projektet)) {
                    //print_r($anetari); echo "<br><br>";
                    $projektiid = $projekti['projektiid'];
                    echo "<tr>";
                    echo "<td>" . $projekti['emri'] . "</td>";
                    echo "<td>" . $projekti['dataefillimit'] . "-" . $projekti['dataembarimit'] . "</td>";
                    echo "<td>" . $projekti['pershkrimi'] . "</td>";
                    echo "<td><a href='modifikoprojekt.php?pid={$projektiid}'>Edit</a></td>";
                    echo "<td><a href='fshijprojekt.php?pid={$projektiid}'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</main>
<?php include 'inc/footer.php' ?>