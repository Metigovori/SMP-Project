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
    
    
    <form method="get" action="" class="searchbar">
        <input type="text" name="search" class="searchbar_i" placeholder="Kerko anetarin...">
        <button type="submit" class="searchbar_b">Kerko</button>
    </form>

        <h3 class="title">Lista e anetareve</h3>
        <a href="shtoanetaret.php">Shto</a>
        <table id="members">
            <tbody>
                <tr>
                    <th>Emri dhe Mbiemri</th>
                    <th>Telefoni</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                    if(isset($_GET['search'])) {
                        $keyword = $_GET['search'];
                        kerkoAntaret($keyword);
                    } else {
                        $res=merrAntaret();
                        if (mysqli_num_rows($res) > 0) {
                            $i=0;
                            while ($antari = mysqli_fetch_assoc($res)) {
                                if($i%2==0) {echo "<tr>";}else{echo "<tr class='alt'>";}
                                $antariid=$antari['antariid'];
                                echo "<td>". $antari['emri'] . " " . $antari['mbiemri'] . "</td>";
                                echo "<td>". $antari['telefoni'] . "</td>";
                                echo "<td>". $antari['email'] . "</td>";
                                echo "<td><a href='modifikoanetaret.php?aid={$antariid}'>Edit</a></td>";
                                echo "<td><a href='fshijanetar.php?aid={$antariid}'>Delete</a></td>";
                                echo "</tr>";
                                $i++;
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