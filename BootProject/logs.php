<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'conn.php' ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="./style/new-style.css">


    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #DDD;

        }

        html,
        body {
            color: #fff;

        }

        select {
            color: white;
        }

        label {
            color: white;
        }

        button {
            width: auto;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {

            color: #fff;

        }
    </style>
</head>

<body class="">
    <main class="container">
        <button onclick="location.href='./admindashboard.php';">Back</button>
        <h2>Logs</h2>
        <table id="tableID">
            <thead>
                <tr>
                    <th>LogID</th>
                    <th>Username</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql1 = "SELECT logs.logID, logs.createdAt, logs.userID, logs.logEntry, users.name FROM logs
                INNER JOIN users on users.ID = logs.userID
                ORDER BY createdAt DESC";
                $stmt = mysqli_query($conn, $sql1);

                while ($row = mysqli_fetch_assoc($stmt)) {
                    echo "<tr>
                    <td>" . $row['logID'] . "</td>
                    <td>" . $row['name'] . "</td>" .
                        "<td>" . $row['createdAt'] . "</td>
                    <td>" . $row['logEntry'] . "</td>
                    </tr>";
                }
                $stmt = mysqli_query($conn, $sql1);
                $json;
                $selectData;
                $arrList = array();
                // output data of each row
                while ($row = mysqli_fetch_assoc($stmt)) {
                    $arr = array(
                        "createdAt" => $row['createdAt'],
                        "logEntry" => $row['logEntry']
                    );
                    array_push($arrList, $arr);
                }
                $json = json_encode($arrList);
                ?>
            </tbody>
        </table>

        <?php
        if($_SESSION['userrole'] == 2)
        {?>
        <button onclick=exportDataToTxtFile()>Export as .txt</button>
        <button onclick=exportDataToXlsFile()>Export as .xls</button>
        <?php
        }
        ?>
        <script>
            function getJsonData() {
                return <?php echo $json; ?>;
            }

            function exportDataToXlsFile(tableID = 'tableID', filename = 'logs') {
                var downloadLink;
                var dataType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                // Specify file name
                filename = filename ? filename + '.xls' : 'excel_data.xls';

                // Create download link element
                downloadLink = document.createElement("a");

                document.body.appendChild(downloadLink);

                if (navigator.msSaveOrOpenBlob) {
                    var blob = new Blob(['\ufeff', tableHTML], {
                        type: dataType
                    });
                    navigator.msSaveOrOpenBlob(blob, filename);
                } else {
                    // Create a link to the file
                    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                    // Setting the file name
                    downloadLink.download = filename;

                    //triggering the function
                    downloadLink.click();
                }
            }

            function exportDataToTxtFile() {
                let json = getJsonData();
                let logFile;
                if (json.length > 0) {
                    json.forEach(log => {
                        let logEntry = "<" + log.createdAt + "> " + log.logEntry + "\n";
                        if (logFile == undefined) {
                            logFile = logEntry;
                        } else {
                            logFile = logFile + logEntry;
                        }
                    });
                    // Convert the text to BLOB.
                    const textToBLOB = new Blob([logFile], {
                        type: 'text/plain'
                    });
                    const sFileName = 'logs.txt'; // The file to save the data.

                    let newLink = document.createElement("a");
                    newLink.download = sFileName;

                    if (window.webkitURL != null) {
                        newLink.href = window.webkitURL.createObjectURL(textToBLOB);
                    } else {
                        newLink.href = window.URL.createObjectURL(textToBLOB);
                        newLink.style.display = "none";
                        document.body.appendChild(newLink);
                    }

                    newLink.click();
                }
            }
            $(document).ready(function() {
                $('#tableID').DataTable({
                    "pageLength": 20,
                    lengthMenu: [
                        [10, 20, 25, 50, -1],
                        [10, 20, 25, 50, 'All'],
                    ],
                });
            });
        </script>
    </main>
</body>

</html>
