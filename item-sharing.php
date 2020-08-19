<?php
include 'access/useraccesscontrol.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'lander-pages/csslink.php'; ?>

    <style>  
        th,td { 
        padding: 5px; 
        text-align:center; 
        } 
    </style> 

</head>

<body>
<div class="container">
    <div class="col-md-12 page-header text-center">
        <h2>ITEM LIST</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
             
            <table class="table table-bordered">
            
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Number</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>123</td>
                    <td>xyz</td>
                    <td>500</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>456</td>
                    <td>abc</td>
                    <td>1000</td>
                </tr>
            </tbody>
            </table>


        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-danger btn-lg">Print List</button>
        </div>
    </div>
</div>

</body>


</html>