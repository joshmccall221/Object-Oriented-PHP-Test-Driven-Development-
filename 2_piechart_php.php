<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?php
    include('Chart.php');


    // demonstration of pie chart and simple array
    $chart = new Chart('PieChart');

    $data = array(
        array('Letter', 'Count'),
        array('A', 11),
        array('B', 2),
        array('C', 2),
        array('D', 2),
        array('E', 7)
    );
    $chart->load($data, 'array');

    $options = array('title' => 'Letter Count', 'is3D' => true, 'width' => 900, 'height' => 500);
    echo $chart->draw('Letter Count', $options);
    ?>

</head>
<body>


<div id="Letter Count"></div>

</body>
</html>