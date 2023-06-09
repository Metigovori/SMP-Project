<?php include 'inc/header.php'; 
if(!isset($_SESSION['antari'])){
    header("Location: Projekti-probit.php");
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

    <form method="get" action="" class="searchbar">
        <input type="text" name="search" class="searchbar_i" placeholder="Kerko punen...">
        <button type="submit" class="searchbar_b">Kerko</button>
    </form>
 
        <h3 class="title">Lista e puneve</h3>
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
                if (isset($_GET['search'])) {
                    $keyword = $_GET['search'];
                        kerkoPunet($keyword);
                } else {
                $punet = merrPunet();
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
         }
                ?>
            </tbody>
        </table>
    </section>
</main>
<?php include 'inc/footer.php' ?>