<?php 
session_start();
$dbconn="";

function dbConnection() {
    global $dbconn;
    $dbconn = mysqli_connect("localhost", "root", "", "smp");
    if (!$dbconn) {
        die(mysqli_error($dbconn));
    }
}

dbConnection();

function login($email,$fjalekalimi){
    global $dbconn;
    $sql = "SELECT antariid,emri,mbiemri,email,roli FROM antaret";
    $sql.= " WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $res = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($res) == 1) {
        $anetari=array();
        $antariData=mysqli_fetch_assoc($res);
        $anetari['antariid']=$antariData['antariid'];
        $anetari['emrimbiemri']=$antariData['emri'] . " " . $antariData['mbiemri'];
        $anetari['roli']=$antariData['roli'];
        $_SESSION['antari']=$anetari;
        header("Location: punet.php");
    }else{
        echo "Nuk ka perdorues me keto shenime";
    }
}

/* Funksionet per antaret */

function merrAntaret() {
    global $dbconn;
    $sql = "SELECT antariid,emri,mbiemri,email,telefoni FROM antaret";
   return $res = mysqli_query($dbconn, $sql);
}

function merrAntarId($antariid){
    global $dbconn;
    $sqla = "SELECT antariid,emri,mbiemri,email,telefoni,fjalekalimi FROM antaret";
    $sqla .= " WHERE antariid=$antariid";
    return $res = mysqli_query($dbconn, $sqla);
}

function shtoAntar($emri,$mbiemri,$telefoni,$email,$fjalekalimi){
    global $dbconn;
    $sql="INSERT INTO antaret(emri,mbiemri,telefoni,email,fjalekalimi) VALUES";
            $sql .="('$emri','$mbiemri','$telefoni','$email','$fjalekalimi')";
            $antari=mysqli_query($dbconn,$sql);
            if ($antari) {
                echo "Antari u shtua me sukses";
            } else {
                echo "Shtimi i antarit deshtoi";
            }
}

function fshijAntar($antariid) {
    global $dbconn;
    $sql = "DELETE FROM antaret WHERE antariid=$antariid";
            $res = mysqli_query($dbconn, $sql);
            if ($res) {
                echo "Anetari u fshi me sukses";
            } else {
                die("Deshtoi fshirja e anetarit" .  mysqli_error($dbconn));
            }
}

function modifikoAnetar($antariid,$emri,$mbiemri,$telefoni,$email,$fjalekalimi){
    global $dbconn;
    $sql="UPDATE antaret SET emri = '$emri',mbiemri = '$mbiemri', ";
    $sql.="telefoni = '$telefoni', email='$email',fjalekalimi='$fjalekalimi' ";
    $sql.=" WHERE antariid=$antariid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        echo "Anetari u modifikua me sukses";
    }else{
        die("Deshtoi modifikimi i anetarit" .  mysqli_error($dbconn) );
    }
}

/* Punet */
function merrPunet()
{
    $antariid=$_SESSION['antari']['antariid'];
    global $dbconn;
    $sql = "SELECT p.punaid, pr.projektiid, pr.emri, p.datapunet, p.pershkrimi";
    $sql.= " FROM punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid";
    if($_SESSION['antari']['roli']==0){
        $sql.=" WHERE antariid=$antariid";
    }
    $res = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($res) > 0) {
        return $res;
    } else {
        echo "Nuk ka shenime";
    }

    if(isset($_GET['argument'])){
        if($_GET['argument']=='dalja'){
            session_destroy();
            echo "Projekti-probit.php";
        }
        else if($_GET['argument']=='mesazhi'){
            unset($_SESSION['mesazhi']);
        }
    }
}
function shtoPune($projektiid,$datapune,$pershkrimi){
    $antariid=$_SESSION['antari']['antariid'];
    global  $dbconn;
    $sql = "INSERT INTO punet (antariid,projektiid,datapunet,pershkrimi) VALUES ";
    $sql .= "($antariid,$projektiid,$datapune,'$pershkrimi')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['mesazhi'] = "Puna u shtua me sukses";
        header("Location: punet.php");
    } else {
        echo "Deshtoi shtimi i Punes"  . mysqli_error($dbconn);
    }
}

function merrPuneId($punaid)
{
    global  $dbconn;
    $sql = "SELECT p.punaid, pr.projektiid,pr.emri,p.datapunet,p.pershkrimi";
    $sql.= " FROM punet p INNER JOIN projektet pr On p.projektiid=pr.projektiid";
    $sql.= " WHERE punaid=$punaid";
    return $res = mysqli_query($dbconn, $sql);
}

function modifikoPune($punaid,$emri,$datapunet,$pershkrimi){
    global $dbconn;
    $sql="UPDATE punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid SET pr.emri = '$emri',p.datapunet = '$datapunet', ";
    $sql.="p.pershkrimi = '$pershkrimi'";
    $sql.=" WHERE punaid=$punaid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        echo "Puna u modifikua me sukses";
    }else{
        die("Deshtoi modifikimi i punes" .  mysqli_error($dbconn) );
    }
}


function fshijPune($punaid) {
    global $dbconn;
    $sql = "DELETE FROM punet WHERE punaid=$punaid";
            $res = mysqli_query($dbconn, $sql);
            if ($res) {
                echo "Puna u fshi me sukses";
            } else {
                die("Deshtoi fshirja e punes" .  mysqli_error($dbconn));
            }
}
/** Funksionet per Projektet */
function merrProjektet()
{
    global $dbconn;
    $sql = "SELECT projektiid,emri,dataefillimit,dataembarimit,pershkrimi FROM projektet";
    $res = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($res) > 0) {
        return $res;
    } else {
        echo "Nuk ka shenime";
    }
}

function shtoProjekt($projektiid,$dataefillimit,$dataembarimit,$pershkrimi){
    global  $dbconn;
    $sql = "INSERT INTO projektet (emri,dataefillimit,dataembarimit,pershkrimi) VALUES ";
    $sql .= "('$projektiid','$dataefillimit','$dataembarimit','$pershkrimi')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['mesazhi'] = "Projekti u shtua me sukses";
        header("Location: projektet.php");
    } else {
        echo "Deshtoi shtimi i Projektit"  . mysqli_error($dbconn);
    }
}

function fshijProjekt($projektiid) {
    global $dbconn;
    $sql = "DELETE FROM projektet WHERE projektiid=$projektiid";
            $res = mysqli_query($dbconn, $sql);
            if ($res) {
                echo "Projekti u fshi me sukses";
            } else {
                die("Deshtoi fshirja e projektit" .  mysqli_error($dbconn));
            }
}

function merrProjektId($projektiid)
{
    global  $dbconn;
    $sql = "SELECT projektiid,emri,dataefillimit,dataembarimit,pershkrimi";
    $sql.= " FROM projektet WHERE projektiid=$projektiid";
    return $res = mysqli_query($dbconn, $sql);
}

function modifikoProjekt($projektiid,$emri,$dataefillimit,$dataembarimit,$pershkrimi){
    global $dbconn;
    $sql="UPDATE projektet  SET emri = '$emri',dataefillimit = '$dataefillimit',dataembarimit = '$dataembarimit', ";
    $sql.="pershkrimi = '$pershkrimi'";
    $sql.=" WHERE projektiid=$projektiid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        echo "Projekti u modifikua me sukses";
    }else{
        die("Deshtoi modifikimi i projektit" .  mysqli_error($dbconn) );
    }
}





function regjistrohu($emri,$mbiemri,$dataelindjs,$nrpersonal,$telefoni,$email,$fjalekalimi,$roli){
    global $dbconn;
    $sql="INSERT INTO antaret(emri,mbiemri,dataelindjs,nrpersonal,telefoni,email,fjalekalimi,roli) VALUES";
            $sql .="('$emri','$mbiemri',$dataelindjs,$nrpersonal,'$telefoni','$email','$fjalekalimi',$roli)";
            $antari=mysqli_query($dbconn,$sql);
            if ($antari) {
                echo "Antari u regjistrua me sukses";
            } else {
                echo "Regjistrimi i antarit deshtoi";
            }
}

function merrAntariPunet($antariid)
{
    global $dbconn;
    if(isset($_GET['aid'])){
        $antariid=$_GET['aid'];
        $sql = "SELECT p.punaid, pr.projektiid, pr.emri, p.datapunet, p.pershkrimi";
        $sql.= " FROM punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid";
            $sql.=" WHERE antariid=$antariid";
        $res = mysqli_query($dbconn, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            echo "Nuk ka shenime";
        }
   }
}

function kerkoAntaret($keyword) {
    global $dbconn;
    $sql = "SELECT * FROM antaret WHERE emri LIKE '%$keyword%' OR email LIKE '%$keyword%' OR telefoni LIKE '%$keyword%'";
    $res = mysqli_query($dbconn, $sql);
    if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            echo "<p>" . $row['emri'] . " " . $row['mbiemri'] . "</p>";
            echo "<p>" . $row['email'] . "</p>";
            echo "<p>" . $row['telefoni'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Nuk u gjet asnje rezultat";
    }
}
