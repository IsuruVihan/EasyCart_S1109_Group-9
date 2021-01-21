<?php

echo "
    <html>
        <head>
            <style>
                input[type=text], select, textarea {
                    width: 100%;
                    padding: 12px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    resize: vertical;
                }

                label {
                    padding: 12px 12px 12px 0;
                    display: inline-block;
                }

                input[type=submit] {
                    background-color: #4CAF50;
                    color: white;
                    padding: 12px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    float: right;
                }

                input[type=submit]:hover {
                    background-color: #45a049;
                }

                .container {
                    border-radius: 10px;
                    background-color: #f2f2f2;
                    padding: 20px;
                }

                .col-25 {
                    float: left;
                    width: 25%;
                    margin-top: 6px;
                }

                .col-75 {
                    float: left;
                    width: 75%;
                    margin-top: 6px;
                }

                .row:after {
                    content: '';
                    display: table;
                    clear: both;
                }

                @media screen and (max-width: 600px) {
                    .col-25, .col-75, input[type=submit] {
                        width: 100%;
                        margin-top: 0;
                    }
                }
            </style>
        </head>
        <body>
            <div class='container' style='margin: 1em; margin-right: 3em; width: 95%; position: sticky'>
                <form action='products.php' method='post' style='position: sticky;'>
                    <center>
                        <h1 style='margin: 0.7em'>Publish a product</h1>
                    </center>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='productname'>Product Name</label>
                        </div>
                        <div class='col-75'>
                            <input type='text' id='productname' name='productname' placeholder='Product name...'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='description'>Description</label>
                        </div>
                        <div class='col-75'>
                            <textarea id='description' name='description' placeholder='Product description...' style='height:200px' maxlength='40'></textarea>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='price'>Price (Rs.)</label>
                        </div>
                        <div class='col-75'>
                            <input type='text' id='price' name='price' placeholder='Product price...'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-25'>
                            <label for='productcategory'>Choose the product category</label>
                        </div>
                        <div class='col-75'>
                            <select id='productcategory' name='productcategory'>
                                <option value='Category1'>Category1</option>
                                <option value='Category2'>Category2</option>
                                <option value='Category3'>Category3</option>
                                <option value='Category4'>Category4</option>
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <input type='submit' id='submitproduct' value='Submit' name='submitproduct' style='background: #e0ac1c'>
                    </div>
                </form>
            </div>
        </body>
    </html>";

?>