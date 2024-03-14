<?php

if (isset($_FILES['csvFile']['tmp_name'])) {

    $csvFile = $_FILES['csvFile']['tmp_name'];

    $handle = fopen($csvFile, 'r');

    if ($handle !== FALSE) {
        echo '<div class="container"><div class="row justify-content-center"><div class="col-md-6">';
        echo '<table class="table table-bordered mt-5">'; 

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            echo '<tr>';

            foreach ($data as $cell) {
                echo '<td>' . htmlspecialchars($cell) . '</td>';
            }
            
            echo '</tr>'; 
        }

        echo '</table>'; 
        echo '</div></div></div>';

        fclose($handle);
    }
}
?>