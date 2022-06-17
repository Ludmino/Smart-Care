<?php
    require  'connexion.php';
    unset($time);
    unset($Value);
    $sqlprep = "SELECT `Valeur`,`Date` FROM `$table` WHERE id_user = ? ORDER BY Date";
    $sql = $conn->prepare($sqlprep);
    $sql->bind_param("i", $_SESSION['id']);
    $sql->execute();
    $result = $sql->get_result();

    foreach($result as $data){
        $time[] = $data['Date'];
        $Value[] = $data['Valeur'];
    }
?>

<script type='text/javascript'>
labels = <?php echo json_encode($time);?>;
 data = {
  labels: labels,
  datasets: [{
    label: <?php echo json_encode($titregraphe);?>,
    data: <?php echo json_encode($Value);?>,
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1,
  }]
};
 config = {
    type: 'line',
    data: data,
  };

    baseGraphid="";
    actualGraphid = 'myChart';
    targetGraphid=baseGraphid.concat(baseGraphid,actualGraphid,<?php echo json_encode($table);?>);
  
    var myChart = new Chart(
    document.getElementById(targetGraphid),
    config
    );

</script>